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

	
	if(isset($_POST['id'])){	
			$id = $_POST['id'];
			addtocart($id,1);
			if(isset($_SESSION['cart'])){
				$max=count($_SESSION['cart']);
				$sl = $max;
				}
			else{
				$sl = 0;
				}
				
			$jsonP = array('er' =>$sl);
			echo json_encode($jsonP);
	
		
	}

?>

    
    

