
<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man_photo":
		get_photos();
		$template = "upload/photos";
		break;
	case "add_photo":
		$template = "upload/photo_add";
		break;
	case "edit_photo":
		get_photo();
		$template = "upload/photo_edit";
		break;
	case "save_photo":
		save_photo();
		break;
	case "delete_photo":
		delete_photo();
		break;
		
	default:
		$template = "index";
}

function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}
function get_photos(){
	global $d, $items, $paging;
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
		$d->reset();
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_upload where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_upload SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_upload SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$d->setTable('upload');
	$d->setWhere('id_sp',$_GET['id_sp']);
	
	$d->setOrder('stt,id desc');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	//echo $curPage;
	//die();
	$url="index.php?com=upload&act=man_photo&id_sp=".$_GET['id_sp'];
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}
function get_photo(){
	global $d, $item, $list_cat;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=upload&act=man_photo");
	
	$d->setTable('upload');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=upload&act=man_photo");
	$item = $d->fetch_array();
	$d->reset();
	if($item['vitri'] == 1){
		$data['vitri'] = 0;		
		$d->setTable('upload');
		$d->setWhere('id', $id);
		$d->update($data);
		}	
}
function save_photo(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	if(!isset($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=upload&act=man_photo");
	
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){ // cap nhat
		
			if($photo = upload_image("file", 'rar,RAR,zip,ZIP', '../upload/files/',$file_name)){
				$data['photo'] = $photo;
			
				$d->setTable('upload');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);	
				}
			}
			$data['id'] = $_POST['id'];
			$data['id_sp'] = $_POST['id_sp'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['com'] = 'upload';
			$data['ten'] = $_POST['ten'];
			$data['mota'] = $_POST['mota'];
			$data['vitri'] = $_POST['vitri'];

			$d->reset();
			$d->setTable('upload');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=upload&act=man_photo");
			transfer("Lưu dữ liệu thành công", "index.php?com=upload&act=man_photo&id_sp=$_POST[id_sp]");
	}{ // them moi
			$temp = $_FILES;
			for( $i = 0; $i < count($temp['picture']['name']); $i++){
			
	
				$img['name'] = $temp['picture']['name'][$i];
				
				$img['type'] = $temp['picture']['type'][$i];
				
				$img['tmp_name'] = $temp['picture']['tmp_name'][$i];
	
				$img['error'] = $temp['picture']['error'][$i];
	
				$img['size'] = $temp['picture']['size'][$i];
				
				$filenameOnly = array_pop(array_reverse(explode(".", $img['name'])));
				
				$ten_pic=$filenameOnly."_".fns_Rand_digit(0,9,15);
				$_FILES['pic'] = $img;
				if ($photo = upload_image("pic", 'rar,RAR,zip,ZIP','../upload/files/', $ten_pic)) {

                  $data['photo'] = $photo;
				

              }     
			 
			  $data['ten'] = $img['name'];
			  $data['id_sp'] = $_GET['id_sp'];
			  
			  $d->setTable('upload');
			  if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=upload&act=man_photo");
			}
			transfer("Thêm thành công", "index.php?com=upload&act=man_photo&id_sp=".$_GET['id_sp'].
            		"&id_mau=".$_GET['id_mau']);
			
			
		
	}
}


function delete_photo(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('upload');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=upload&act=man_photo&id_sp=".id);
		$row = $d->fetch_array();
		delete_file('../upload/files/'.$row['photo']);
		delete_file('../upload/files/'.$row['thumb']);	
		if($d->delete())
		
			transfer("Xóa thành công","index.php?com=upload&act=man_photo&id_sp=$_GET[id_sp]");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=upload&act=man_photo");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select id,thumb, photo from #_upload where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				//delete_file('../upload/upload/'.$row['photo']);
				//delete_file('../upload/upload/'.$row['thumb']);
			}
			$sql = "delete from #_upload where id='".$id."'";
			$d->query($sql);
		}
			
		} redirect("index.php?com=upload&act=man_photo&id_sp=".$_GET['id_sp']);} else transfer("Không nhận được dữ liệu", "index.php?com=upload&act=man_photo&id_sp=".$_GET['id_sp']);
}

?>

	
