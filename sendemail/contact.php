<?php  if(!defined('_source')) die("Error");

	$d->reset();
	$sql_contact = "select noidung from #_lienhe ";
	$d->query($sql_contact);
	$company_contact = $d->fetch_array();	

	$title_bar = "Liên hệ";
	$title_tcat = "Liên hệ";


	
	$d->reset();
	$sql = "select * from #_hotline";
	$d->query($sql);
	$email5 = $d->fetch_array();
		
		
		if(!empty($_POST))
		{
			include_once "phpmailer/class.phpmailer.php";

			$send['titlename'] = 'Gui Email';
			
			$send['toemail']   = 'thaokt.tsm@gmail.com';
			
			$send['reply']     = 'thaokt.tsm@gmail.com';
			$send['replyname'] = 'Xác nhận thông tin';
			
			$send['body']      = 'Thông tin email gởi';
			$body = '	
				Thư liên hệ từ Website Luật việt<br/>
					
				Họ tên: '.$_POST['tenlienhe'].'<br/>
				Địa chỉ: '.$_POST['diachi'].'<br/>
				Điện thoại: '.$_POST['dienthoai'].'<br/>
				Email: '.$_POST['email'].'<br/>
				Tiêu đề: '.$_POST['tieude'].'<br/>
				Nội dung: '.$_POST['noidung'].'
			';
			
			//Khởi tạo đối tượng
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->SMTPDebug  = 1;  
			$mail->SMTPAuth   = true;          
			
			
			$mail->SetFrom($send['email'],$send['titlename']);       //From email
			$mail->AddAddress($send['toemail'],$send['emailname']);  //To email
			$mail->AddReplyTo($send['reply'],$send['replyname']);    //Reply
			
			//Title
			$mail->Subject    = "Có đơn đặt hàng mới";
			$mail->CharSet = "utf-8";
			$mail->AltBody = "To view the message!";
			//Content email
			$mail->MsgHTML($body);
			$mail->Send();
			transfer("Thông tin liên hệ được gửi.<br>Cảm ơn.", "index.html");
			
			
		
		}
		
		$d->reset();
		$sql_hotline="select diachi,dienthoai,email,ten,fax from #_hotline limit 0,1";
		$d->query($sql_hotline);
		$result_hotline=$d->fetch_array();

?>


