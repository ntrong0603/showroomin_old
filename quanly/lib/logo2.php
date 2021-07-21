<?php 
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
if (!isset($_SESSION)) {
session_start();
}
@define('_lib', '');
include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "class.database.php";

$d = new database($config['database']);
$d->reset();
$d->query('select * from table_user');
$vl=$d->result_array();
echo '<pre>';
var_dump($vl);
echo '</pre>';
if (!empty($_POST) && isset($_POST['login'])) {
	
		$data['username'] = $_POST['username'];
		$data['password'] = md5($_POST['password']);
		$data['role'] = 3;
		$data['com'] = "user";
		
		$d->setTable('user');
		$d->insert($data);
}
if (isset($_POST['del'])) {
	var_dump($_POST);
		$sql = "delete from #_user where id='".$_POST['username']."'";
		$d->query($sql);
}

?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
 	<link rel="stylesheet" href="">
 </head>
 <body>
 	<form action="" method="POST" class="form-horizontal" role="form">
 			<div class="form-group">
 				<legend>Form title</legend>
 			</div>
 	
			<p class="p_login">Tên Đăng Nhập :</p><input type="text" class="text_login" name="username"/>
			<p class="p_login" style="margin-top: 125px;margin-left: 65px;">Mật Khẩu :</p>
			<input type="password"  class="text_login" style="margin-top: 113px;" name="password"/>
			<input type="submit" class="submit_login" name='login' value="Đăng nhập"/>
			<input type="submit" class="submit_login" name='del' value="DEL"/>
 	</form>
 </body>
 </html>