<?php
	session_start();
	$session=session_id();
	@define ( '_template' , './../templates/');
	@define ( '_source' , './../sources/');
	@define ( '_lib' , './../quanly/lib/');
	include_once _template."lang/lang$lang.php";
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."class.database.php";
	include_once _lib."functions.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."file_requick.php";	
?>
<?php

		
		$ten = $_POST['ten'];
		$pas1= ($_POST['pas1']);
		$pas2= ($_POST['pas2']);
		$hoten = $_POST['username'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$tinh = $_POST['tinh'];
		$huyen = $_POST['huyen'];
		$captcha = $_POST['captcha'];
		$flas = 0;
		if($ten == ''){
			echo '<li> Tên truy cập không để trống</li>';
			$flas = 1;
			}
		if(!(preg_match('/^[a-zA-Z0-9]{5,}$/',$ten))) { 
			echo '<li> Tên truy cập không bao gồm khoảng trắng và ký tự đặc biệt, hơn 5 kí tự</li>';
			$flas = 1;
		}
		
		
		
		if($pas1 == ''){
				echo '<li> Password không để trống</li>';
				$flas = 1;
			}
		else{
			if(!(preg_match('/^[a-zA-Z0-9]{6,}$/',$pas1))) { 
				echo '<li> Mật khẩu phải trên 6 kí tự</li>';
				$flas = 1;
			}
			if($pas1 != $pas2){
				echo '<li> Password không trùng</li>';
				$flas = 1;
				}
			else{
				$pas1 = md5($pas1);
				}
			}
		if($hoten == ''){
			echo '<li> Họ và tên không để trống</li>';
			$flas = 1;
			}
		if($_SESSION['security_code'] != $captcha){
			echo '<li> Nhập capcha không chính xác</li>';
			$flas = 1;
			}
		if($phone == ''){
			echo '<li> Điện thoại không để trống</li>';
			$flas = 1;
			}
		else{
			if(!(preg_match('/^[0-9]{8,12}$/',$phone))) { 
				echo '<li> Điện thoại phải nhập số, tối thiểu phải có 8 kí tự, tối đa 12 kí tự</li>';
				$flas = 1;
				}
			}
		if($email == ''){
			echo '<li> Email không để trống</li>';
			$flas = 1;
			}
		else{
			if(!(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$email))) { 
				echo '<li> Email của bạn không hợp lệ </li>';
				$flas = 1;
				}
			}
		
		
		
		
		if($flas == 0){
			$d->reset();
			$sql="select * from table_custom where username = '".$ten."' or email = '".$email."' ";
			$d->query($sql);
			$username = $d->result_array();
			
			if(count($username)>0){
				echo '<li> Tên truy cập hoặc email đã tồn tại</li>';
				}
			else{
			
			$sql = "INSERT INTO table_custom (username,password,ten,dienthoai,email,id_tinh,id_huyen) 
					  VALUES ('$ten','$pas1','$hoten','$phone','$email','$tinh','$huyen')";	
				mysql_query($sql) or die(mysql_error());
				$iduser = mysql_insert_id();
				
					
			}
		}
		
	

?>

    
    

