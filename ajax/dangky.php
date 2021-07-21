<?php 
@define ( '_lib' , './../quanly/lib/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	
	if( isset( $_GET['dienthoai'] ) ){
		$number=$_GET['dienthoai'];
		$number = str_replace(array('-', '.', ' '), '', $number);
		$pattern = '/^(01[2689]|09)[0-9]{8}$/';
		if(preg_match($pattern, $number, $match) == 1){
			// kiem tra ten trung
			$d->reset();
			$d->setTable('user');
			$d->setWhere('dienthoai', $number);
			$d->select();
			if($d->num_rows()>0) {
				$return = '<div class="thongbao-dangky"> <span class="fail" >Số điện thoại này đã được đăng ký</span></div>';
			}else{
			$return = '';
			}
		}
		else{
			$return = '<div class="thongbao-dangky"> <span class="fail" >Số điện thoại không hợp lệ!</span></div>';
		}
		}
	
	if( isset( $_GET['email'] ) ){
		$number=$_GET['email'];
		
		$pattern = '#^[a-z][a-z0-9\._]{2,31}@[a-z0-9\-]{3,}(\.[a-z]{2,4}){1,2}$#';
		if(preg_match($pattern, $number, $match) == 1){
			// kiem tra ten trung
			$d->reset();
			$d->setTable('user');
			$d->setWhere('email', $number);
			$d->select();
			if($d->num_rows()>0) {
				$return = '<div class="thongbao-dangky"> <span class="fail" >Email này đã được đăng ký</span></div>';
			}else{
			$return = '';
			}
		}
		else{
			$return = '<div class="thongbao-dangky"> <span class="fail" >Email không hợp lệ!</span></div>';
		}
		}

	echo $return;
	
	?>