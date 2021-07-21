<?php 
	session_start ();
	@define ( '_lib' , './lib/');
	
	include_once "../../quanly/lib/config.php";
	include_once "../../quanly/lib/constant.php";
	include_once "../../quanly/lib/class.database.php";
	include_once "../../quanly/lib/functions.php";
	include_once "../../quanly/lib/functions_giohang.php";
	include_once "../../quanly/lib/file_requick.php";
	
	$ten = $_POST['email'];
	$pas= $_POST['password1'];
		
	$d->reset();
	$sql="select * from table_user where username = '".$ten."' and password = '".md5($pas)."' ";
	$d->query($sql);
	$username = $d->result_array();
			
	if(count($username)>0){
		$_SESSION['user']=array();
		$_SESSION['user']['id'] = $username[0]['id'];
		$_SESSION['user']['name'] = $username[0]['ten'];
		$_SESSION['user']['email'] = $username[0]['email'];
		$_SESSION['user']['dienthoai'] = $username[0]['dienthoai'];
		$_SESSION['user']['diachi'] = $username[0]['diachi'];
		$_SESSION['thanhtoan_popup'] = 1;
		echo 'true';
	}
	else{
		echo 'false';
	}

?>