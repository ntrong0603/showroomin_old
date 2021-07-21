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
$d->reset();
	$d->setTable('user');
		$d->setWhere('id', $_SESSION['user']['id']);
  $uploadedFile = '';
    if(!empty($_FILES["file"]["type"])){
        $fileName = time().'_'.$_FILES['file']['name'];
        $valid_extensions = array("jpeg", "jpg", "png","PNG","JPG","JPEG");
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);
        if((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['file']['tmp_name'];
            $targetPath = "../upload/avatar/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile = $fileName;
            }
        }
    }
	$data['avatar']=$uploadedFile;
	if($d->update($data) and $uploadedFile!='' ){
					$sql = "select * from #_user where email='".$_SESSION['user']['email']."' ";
				$d->query($sql);
				$_SESSION['user']=$d->fetch_array();
	echo "Thay đổi Avatar thành công.";}else{
		echo "Thay đổi Avatar thất bại.";
	}
?>

    
   

