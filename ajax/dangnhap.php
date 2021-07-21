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
		$pas= ($_POST['pas']);
		
		
		
		
			$d->reset();
			$sql="select * from table_custom where username = '".$ten."' and password = '".md5($pas)."' ";
			$d->query($sql);
			$username = $d->result_array();
			
			if(count($username)>0){
				$_SESSION['user']=array();
				$_SESSION['user']['id'] = $username[0]['id'];
				$_SESSION['user']['name'] = $username[0]['ten'];
				if($username[0]['datenow'] !=''){
				$timesql = make_date($username[0]['datenow']);
				$timenow = make_date(time());
				if($timenow != $timesql){
					$data['datenow'] = time();
					$data['lan'] = 0;
					$d->reset();
					$d->setTable('custom');
					$d->setWhere('id', $_SESSION['user']['id'] );
					$d->update($data);
					}
				}
				
				else{
					$data['datenow'] = time();
					$data['lan'] = 0;
					$d->reset();
					$d->setTable('custom');
					$d->setWhere('id', $_SESSION['user']['id'] );
					$d->update($data);
					}
				
				
				}
			else{
			
			 echo 'Tên đăng nhập hoặc mật khẩu của bạn sai !!!';
				
					
			}
	
		
	

?>

    
    

