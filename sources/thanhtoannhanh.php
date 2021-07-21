<?php  if(!defined('_source')) die("Error");		
	// thanh tieu de
	
	$keyword = 'Đặt hàng';
	$description = 'Đặt hàng';
	$title_bar='Đặt hàng';	
	

	
	if(!empty($_POST)){
		
		$hoten=$_POST['ten'];
		$dienthoai=$_POST['dienthoai'];
		$diachi=$_POST['diachi'];
		$email=$_POST['email'];
		$noidung=$_POST['noidung'];
		$httt=$_POST['httt'];	
		$id = $_POST['id_ten'];
		$solg = $_POST['solg'];
		
		
		//validate dữ liệu
	
	$hoten = trim(strip_tags($hoten));
	$dienthoai = trim(strip_tags($dienthoai));	
	$diachi = trim(strip_tags($diachi));	
	$email = trim(strip_tags($email));	
	$noidung = trim(strip_tags($noidung));	
	settype($httt,"int");

	if (get_magic_quotes_gpc()==false) {
		$hoten = mysql_real_escape_string($hoten);
		$dienthoai = mysql_real_escape_string($dienthoai);
		$diachi = mysql_real_escape_string($diachi);
		$email = mysql_real_escape_string($email);
		$noidung = mysql_real_escape_string($noidung);						
	}
	$coloi=false;		
	if ($hoten == NULL) { 
		$coloi=true; $error_hoten = "Bạn chưa nhập họ tên<br>";
	} 
	if ($dienthoai == NULL) { 
		$coloi=true; $error_dienthoai = "Bạn chưa nhập điện thoại<br>";
	}
	if ($diachi == NULL) { 
		$coloi=true; $error_diachi = "Bạn chưa nhập địa chỉ<br>";
	}	
	
	if ($email == NULL) { 
		$coloi=true; $error_email = "Bạn chưa nhập email<br>";
	}elseif (filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE) { 
		$coloi=true; $error_email="Bạn nhập email không đúng<br>";
	}
	if ($httt <1 and $httt>2) { 
		$coloi=true; $error_httt = "Bạn chưa chọn hình thức thanh toán<br>";
	}
	
	if ($coloi==FALSE) {
										
			 $body.='<table border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1; padding:5px;" width="100%">';
			
            	$body.='<tr bgcolor="#075992"><td align="center" style="font-weight:bold;color:#FFF">STT</td><td style="font-weight:bold;color:#FFF">Tên</td><td align="center" style="font-weight:bold;color:#FFF">Giá</td><td align="center" style="font-weight:bold;color:#FFF">Số lượng</td><td align="center" style="font-weight:bold;color:#FFF">Tổng giá</td></tr>';
				
					$pid=$id;
					$q=$solg;					
					$pname=get_place_name($pid,'vi');					
					if($q==0) continue;
            		$body.='<tr bgcolor="#FFFFFF"><td width="10%" align="center">'.($i+1).'</td>';
            		$body.='<td width="29%">'.$pname;				
					$body.='</td>';
                    $body.='<td width="20%">'.number_format(get_price($pid),0, ',', '.').'&nbsp;VNĐ</td>';
                    $body.='<td width="14%">'.$q.'</td>';                 
                    $body.='<td>'.number_format(get_price($pid)*$q,0, ',', '.') .'&nbsp;VNĐ</td>
                    </tr>
					<br/>';
			
				$body.='<tr><td colspan="5">
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
              <td style="text-align:left;"> '; 
               $body.=' <strong>Tổng giá bán:'. number_format(get_order_total(),0, ',', '.') .' &nbsp;VNĐ</strong></td>
              <td colspan="5" align="right">&nbsp;</td>
             </tr>
             </table>   
                </td></tr>';
           
       $body.='</table>';
       
  			
			$mahoadon=strtoupper (ChuoiNgauNhien(6));
			$ngaydangky=time();
			$tonggia=get_order_total();
			
			$sql = "INSERT INTO  table_donhang (madonhang,hoten,dienthoai,diachi,email,httt,tonggia,noidung,donhang,ngaytao,tinhtrang ) 
				  VALUES ('$mahoadon','$hoten','$dienthoai','$diachi','$email','$httt','$tonggia','$noidung','$body','$ngaydangky','1')";	
			mysql_query($sql) or die(mysql_error());
			$iduser = mysql_insert_id();
			
			if($httt==2){
				require_once("nganluong.php");
				 //Tài khoản nhận tiền
				$receiver="duyhung862000@yahoo.com";
				//Khai báo url trả về 
				$return_url="http://localhost/tich-hop-nang-cao/complete.php";
				//Giá của cả giỏ hàng 
				$price=$tonggia;
				//Mã giỏ hàng 
				$order_code=$mahoadon;
				//Thông tin giao dịch
				$transaction_info="Hãy lập trình thông tin giao dịch của bạn vào đây";
				//Khai báo đối tượng của lớp NL_Checkout
				$nl= new NL_Checkout();
				//Tạo link thanh toán đến nganluong.vn
				$url= $nl->buildCheckoutUrl($return_url, $receiver, $transaction_info,  $order_code, $price);
				redirect($url);	
			}else{
				
				 transfer("Đơn hàng của bạn đã được gửi", "index");
			}
			
			
			
	}
	
	}
?>