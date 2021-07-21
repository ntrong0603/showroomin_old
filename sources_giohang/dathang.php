<?php 

	session_start ();

	@define ( '_lib' , './lib/');


	include_once "../vr/Vinmus/quanly/lib/config.php";
	include_once "../vr/Vinmus/quanly/lib/constant.php";
	include_once "../vr/Vinmus/quanly/lib/class.database.php";
	include_once "../vr/Vinmus/quanly/lib/functions.php";
	include_once "../vr/Vinmus/quanly/lib/functions_giohang.php";
	include_once "../vr/Vinmus/quanly/lib/file_requick.php";
	include_once "../vr/Vinmus/quanly/lib/C_email.php";

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

	$sp="<table>";
		foreach($_SESSION['cart'] as $cart_id => $value):
			$sp.="<tr><th>Tên sản phẩm: </th><td>".get_product_name($value[ 'productid'])."</td>";
			$sp.="<th>Số lượng: </th><td>".$value['qty']."</td></tr>";
		endforeach;
	$sp.="<tr><th>tổng tiền:</th><td colspan='2'>".number_format(get_total_new_price(),0, '', ',')."</td></tr>";
	$sp.="</table>";
	$body = '<table>';
	$body .= '
		<tr>
			<th colspan="2">&nbsp;</th>
		</tr>
		<tr>
			<th colspan="2">Thư đặt hàng từ website</th>
		</tr>
		<tr>
			<th colspan="2">&nbsp;</th>
		</tr>
		
		<tr>
			<th>Họ tên :</th><td>'.$_POST['hoten'].'</td>
		</tr>
		<tr>
			<th>Địa chỉ :</th><td>'.$_POST['diachi'].'</td>
		</tr>
		<tr>
			<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
		</tr>
		<tr>
			<th>Email :</th><td>'.$_POST['email'].'</td>
		</tr>	
		<tr>
			<th>Ghi chú :</th><td>'.$_POST['ghichu'].'</td>
		</tr>
		<tr>
			<th>Ngày đặt :</th><td>'.date('d/m/Y h:i:s',time()).'</td>
		</tr>
		<tr>
			<th>Đơn hàng</th><td>'.$sp.'</td>
		</tr>';
	$body .= '</table>';

	include_once "../phpmailer/class.phpmailer.php";
					
	$send['titlename'] = 'Email lien he';
	
	$send['toemail']   = $_POST['email'];
	
	$send['reply']     = $_POST['email'];
	$send['replyname'] = $_POST['email'];

	$send['body']      = $body;
	//Khởi tạo đối tượng
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPDebug  = 1;  
	$mail->SMTPAuth   = true;
	$mail->SetLanguage( 'en', '../phpmailer/language/' );
	$mail->SetFrom($send['toemail'],$send['titlename']);       //From email
	$mail->AddAddress($setting['email'],$send['replyname']);  //To email
	$mail->AddReplyTo($send['reply'],$send['replyname']);    //Reply
	
	//Title
	$mail->Subject = $send['titlename'];
	$mail->CharSet = "utf-8";
	$mail->AltBody = "To view the message!";
	//Content email
	$mail->MsgHTML($send['body']);

	if(!$mail->Send()) {
		echo "false";
	}
	else{
		nomoney($data);
		echo "true";
	}

	

	function nomoney($data){
		
		global $tichluydiem, $d;

		$data['ghichu'] = 'Thanh toán khi giao hàng';
		
		if(get_total_new_price() >= $tichluydiem['donhang']){
			$data['tichluy'] = round(get_total_new_price() / $tichluydiem['donhang']) * $tichluydiem['tichluy'];
		}
		//echo (get_total_new_price() / $tichluydiem['donhang']);
		//echo "<pre>"; print_r($data); exit();
		$d->reset();
		$d->setTable('dathang');
		$dathang = $d->insert($data);
		
		if( $dathang > 0 ){
			
			foreach( $_SESSION['cart'] as $cart ){
				$data_chitiet['id_dathang'] = $dathang;
				$data_chitiet['id_sanpham'] = $cart['productid'];
				$data_chitiet['soluong'] = $cart['qty'];

				$d->reset();
				$d->setTable('chitietdathang');
				$chitiet = $d->insert($data_chitiet);
				
				$sql = "UPDATE `table_product` SET `luotmua` = luotmua + ".$cart['qty']." WHERE `id` = ".$cart['productid'];
				
				$d->reset();
				$d->query($sql);
				
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