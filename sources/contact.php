<?php  if(!defined('_source')) die("Error");

	$d->reset();
	$sql_contact = "select * from #_lienhe ";
	$d->query($sql_contact);
	$company_contact = $d->fetch_array();	

	$d->reset();
	$d->setTable('baiviet');
	$d->setWhere('loaitin',$com);
	$d->select();
	$baiviet=$d->fetch_array();
	$title = $baiviet['title'];
	$description = $baiviet['description'];
	$keyword = $baiviet['keyword'];
	$title_bar = $baiviet['ten'.$lang];


	
	$d->reset();
	$sql = "select * from #_hotline";
	$d->query($sql);
	$email5 = $d->fetch_array();
		
		
		if(!empty($_POST))
		{
			
			include_once "phpmailer/class.phpmailer.php";

			$send['titlename'] = 'Gui Email';
			
			$send['toemail']   = $email5['email'];
			
			$send['reply']     = $_POST['email'];
			$send['replyname'] = 'Xác nhận thông tin';
			
			$send['body']      = 'Thông tin email gởi';
			$body = '	
				Thư liên hệ từ Website <br/>
					
				Họ tên: '.$_POST['tenlienhe'].' <br/>
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
			$mail->Subject    = "Có thông tin liên hệ mới";
			$mail->CharSet = "utf-8";
			$mail->AltBody = "To view the message!";
			//Content email
			$mail->MsgHTML($body);
			$mail->Send();
			$ten = $_POST['tenlienhe'];
			$dienthoai= $_POST['dienthoai'];
			$diachi = $_POST['diachi'];
			$email = $_POST['email'];
			$tieude = $_POST['tieude'];
			$noidung = $_POST['noidung'];
			$sql = "INSERT INTO  table_lienhekhach (ten,dienthoai,diachi,gmail,title,noidung) 
				  VALUES ('ten','$dienthoai','$diachi','$email','$tieude','$noidung')";	
			mysql_query($sql) or die(mysql_error());
			$iduser = mysql_insert_id();
			transfer("Thông tin liên hệ được gửi.<br>Cảm ơn.", "index.html");
			
			
		
		}
		
		$d->reset();
		$sql_hotline="select * from #_hotline limit 0,1";
		$d->query($sql_hotline);
		$result_hotline=$d->fetch_array();

?>


