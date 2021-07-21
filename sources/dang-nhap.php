
<?php
if(!empty($_POST)){
		
		$ten = $_POST['email'];
		$pas= ($_POST['password1']);
		
		
		
		
			$d->reset();
			$sql="select * from table_custom where email = '".$ten."' and password = '".md5($pas)."' ";
			$d->query($sql);
			$username = $d->result_array();
			
			if(count($username)>0){
				$_SESSION['user']=array();
				$_SESSION['user']['id'] = $username[0]['id'];
				$_SESSION['user']['name'] = $username[0]['ten'];
				$_SESSION['user']['email'] = $username[0]['email'];
				$_SESSION['user']['dienthoai'] = $username[0]['dienthoai'];
				$_SESSION['user']['diachi'] = $username[0]['diachi'];
				alert(_dangnhapthanhcong);
				chuyentrang('index');
				}
				
			else{
			
				alert(_dungemailpass);
				
					
			}
}
		
	

?>

    
    

