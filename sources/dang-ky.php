<?php  if(!defined('_source')) die("Error");
if(!empty($_POST))
		{
		
		$pas1= ($_POST['password1']);
		$pas2= ($_POST['password2']);
		$tenlienhe = $_POST['tenlienhe'];
		$dienthoai = $_POST['dienthoai'];
		$email = $_POST['email'];
		$diachi = $_POST['diachi'];
		
		$lan = $_POST['inlineRadioOptions'];
		$flas = 0;
		if($pas1 != $pas2){
				alert(_nhaplaimatkhau);
				$flas = 1;
				}
			else{
				$pas1 = md5($pas1);
				}
		if($flas == 0){
			$d->reset();
			$sql="select * from table_custom where email = '".$email."' ";
			$d->query($sql);
			$username = $d->result_array();
			
			if(count($username)>0){
				alert(_emailtontai);
				}
			else{
			
				$sql = "INSERT INTO table_custom (password,ten,dienthoai,email,diachi,lan) 
					  VALUES ('$pas1','$tenlienhe','$dienthoai','$email','$diachi','$lan')";	
				mysql_query($sql) or die(mysql_error());
				$iduser = mysql_insert_id();
				if($iduser != ''){
					alert(_dangkithanhcong);
					chuyentrang('dang-nhap');
					}
					
			}
			
		}
				
		}
			
		

?>


