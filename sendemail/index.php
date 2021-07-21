<?php 
include_once "phpmailer/class.phpmailer.php";

$send['titlename'] = 'Gui Email';

$send['toemail']   = 'thaokt.tsm@gmail.com';

$send['reply']     = 'thaokt.tsm@gmail.com';
$send['replyname'] = 'Xác nhận thông tin';

$send['body']      = 'Thông tin email gởi';

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
$mail->MsgHTML($send['body']);
$mail->Send();