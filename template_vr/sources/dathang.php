<?php 
	session_start ();
	@define ( '_lib' , './lib/');

	include_once "../../quanly/lib/config.php";
	include_once "../../quanly/lib/constant.php";
	include_once "../../quanly/lib/class.database.php";
	include_once "../../quanly/lib/functions.php";
	include_once "../../quanly/lib/functions_giohang_2.php";
	include_once "../../quanly/lib/file_requick.php";
	include_once "../../quanly/lib/C_email.php";

	$d->reset();
	$d->setTable('hotline');
	$d->select();
	$setting=$d->fetch_array();

	$data['ten']= $_POST['hoten'];
	$data['diachi'] = $_POST['diachi'];
	$data['dienthoai'] = $_POST['dienthoai'];
	$data['email'] = $_POST['email'];
	$data['ghichunguoimua'] = $_POST['ghichu'];
	$data['date'] = time();
	
	$data['madonhang'] = maDH();
	
	$result_cart=$_SESSION['cart'];

	/*$sp="<table>";
		foreach($_SESSION['cart'] as $cart_id => $value):
			$sp.="<tr><th>Tên sản phẩm: </th><td>".get_product_name($value[ 'productid'])."</td>";
			$sp.="<th>Số lượng: </th><td>".$value['qty']."</td></tr>";
		endforeach;
	$sp.="<tr><th>tổng tiền:</th><td colspan='2'>".number_format(get_total_new_price(),0, '', ',')."</td></tr>";
	$sp.="</table>";
	$body = '<table>';
	
	$body .= '</table>';
	
	include_once "../../sendemail/phpmailer/class.phpmailer.php";
					
	$send['titlename'] = 'Email đặt hàng';
	
	$send['toemail']   = $_POST['email'];
	
	$send['reply']     = $_POST['email'];
	$send['replyname'] = $_POST['email'];

	$send['body']      = $body;
	//Khởi tạo đối tượng
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug  = 1;  
	$mail->SMTPAuth   = true;
	$mail->SetLanguage( 'en', '../sendemail/phpmailer/language/' );
	$mail->SetFrom($send['toemail'],$send['titlename']);       //From email
	$mail->AddAddress($setting['email'],$send['replyname']);  //To email
	$mail->AddReplyTo($send['reply'],$send['replyname']);    //Reply
	
	//Title
	$mail->Subject = $send['titlename'];
	$mail->CharSet = "utf-8";
	$mail->AltBody = "To view the message!";
	//Content email
	$mail->MsgHTML($send['body']);*/

	//if(!$mail->Send()) {
	//	echo "false";
	//}
	//else{
		nomoney($data);
		echo "true";
	//}
	

	function nomoney($data){
		
		global $tichluydiem, $d;

		$data['ghichu'] = 'Thanh toán khi giao hàng';
		
		$concept=array();
		
		if(get_total_new_price() >= $tichluydiem['donhang']){
			$data['tichluy'] = round(get_total_new_price() / $tichluydiem['donhang']) * $tichluydiem['tichluy'];
		}
		//echo (get_total_new_price() / $tichluydiem['donhang']);
		//echo "<pre>"; print_r($data); exit();
		$d->reset();
		$d->setTable('dathang');
		$dathang = $d->insert2($data);
		
		if( $dathang > 0 ){
			
			foreach( $_SESSION['cart'] as $cart ){
				$data_chitiet['id_dathang'] = $dathang;
				$data_chitiet['id_sanpham'] = $cart['productid'];
				$data_chitiet['soluong'] = $cart['qty'];

				$d->reset();
				$d->setTable('dathang_chitiet');
				$chitiet = $d->insert($data_chitiet);

				$sql = "UPDATE `table_product` SET `luotmua` = luotmua + ".$cart['qty']." WHERE `id` = ".$cart['productid'];
				
				$d->reset();
				$d->query($sql);
				
				/*======================*/
				
				$sql = "insert into table_thongkesanpham(id_sanpham,luotdathang, soluong) VALUES ('".$cart['productid']."','".time()."','".$cart['qty']."')";
				
				$d->reset();
				$d->query($sql);
				
				$sql = "select * from table_product where id='".$cart['productid']."'";
				
				$d->reset();
				$d->query($sql);
				$get_IDconcept=$d->fetch_array();
				
				
				if(empty($concept)){
					$concept[0]['id']=$get_IDconcept['id_place'];
					$concept[0]['qty']=$cart['qty'];
				}
				else{
					$check_id_concept=false;
					for($id_concept=0;$id_concept<count($concept);$id_concept++){
						if($concept[$id_concept]['id']==$get_IDconcept['id_place']){
							$concept[$id_concept]['qty']+=$cart['qty'];
							$check_id_concept=true;
							break;
						}
					}
					if($check_id_concept==false){
						$max_Arr=count($concept);
						$concept[$max_Arr]['id']=$get_IDconcept['id_place'];
						$concept[$max_Arr]['qty']=$cart['qty'];
					}
				}
				
				
				/*====================*/
				
				//chi tiet hoa don
				$data_hoadon['id_donhang'] = $dathang;
				//$data_hoadon['tencty'] = $_POST['tencty'];
				//$data_hoadon['diachicty'] = $_POST['diachicty'];
				//$data_hoadon['masothue'] = $_POST['masothue'];
				//$data_hoadon['ghichuhoadon'] = $_POST['ghichuhoadon'];

				$d->reset();
				$d->setTable('tt_hoadon');
				$d->insert($data_hoadon);
				
				$_SESSION['backup_cart_id'] = $dathang;
			}
			/*=====*/
			for($id_concept=0;$id_concept<count($concept);$id_concept++){
				$sql ="insert into table_thongkeconcept(id_place, id_donhang,luotdathang, soluong) VALUES ('".$concept[$id_concept]['id']."','".$dathang."','".time()."','".$concept[$id_concept]['qty']."')";
				$d->reset();
				$d->query($sql);
				
				$sql = "UPDATE `table_place` SET `luotdathang` = luotdathang + 1 WHERE `id` = ".$concept[$id_concept]['id'];
				
				$d->reset();
				$d->query($sql);
			}
			/*=====*/
			$_SESSION['backup_cart'] = $_SESSION['cart']; 
			$_SESSION['cart']=array();
			
		}
		
	}

	function maDH(){
		global $d;
		$sql="select madonhang from table_dathang order by id desc limit 1";
		$d->query($sql);
		$row  =  $d->fetch_array();
		$order_number = str_replace( 'HD' ,'', $row['madonhang']);
		if( is_numeric( (int) $order_number ) && $order_number  >= 4000 ){
			$order_number += 1;
			$maHD = 'HD'.$order_number;
		}else{
			$order_number = 4000;
			$maHD = 'HD'.$order_number;
		}
		return $maHD;
	
	}
	
?>