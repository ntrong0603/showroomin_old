<?php 
if(isset($_POST['password'])  && is_array($_SESSION['user']) ){
	$d->reset();
	$d->setTable('custom');
	$d->setWhere('id',$_SESSION['user']['id']);
	$d->select();
	$pass_cu=$d->fetch_array();
	if($pass_cu['password'] == md5($_POST['password'])){
		$pas = $_POST['password1'];
		$pas1 = $_POST['password2'];
		if($pas == $pas1){
			$data['password'] = md5($_POST['password']);
			
			$d->reset();
			$d->setTable('custom');
			$d->setWhere('id', $_SESSION['user']['id'] );
			if($d->update($data)){
				alert('Đổi mật khẩu thành công');
				redirect('index');
			}
			else
				alert('Đã có lỗi xãy ra');
		}
			
		else{
			alert('Mật khẩu không giống nhau');
			}
	} else{
		alert('Mật khẩu cũ sai');
		}
		
}
if(!is_array($_SESSION['user'])){
	chuyentrang('index');
	}
?>