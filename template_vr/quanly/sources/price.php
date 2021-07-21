<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "edit":		
		edit();
		$template = "price/price_add";
		break;
	case "save":
		save();
		break;
	case "delete":
		delete_price();
		break;		
	#===================================================
	
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


function edit(){
	global $d, $items, $paging;

	$sql = "select * from #_banggia";
	$sql.=" order by id desc";		
	$d->query($sql);
	$items = $d->fetch_array();
}

function save(){
		
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=price&act=edit");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($price = upload_image("file", 'doc|docx|DOC|DOCX|PDF|pdf|xlsx|XLSX|XLS|xls', _upload_price,$file_name)){
			$data['price'] = $price;			
			$d->setTable('banggia');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_price.$row['price']);					
			}
		}
		$data['ten_vi'] = $_POST['ten_vi'];
		$d->setTable('banggia');
		$d->setWhere('id', $id);
		if($d->update($data))
			transfer("Cập nhật dữ liệu thành công", "index.php?com=price&act=edit");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=price&act=edit");
	}else{
		if($price = upload_image("file", 'doc|docx|DOC|DOCX|PDF|pdf|xlsx|XLSX|XLS|xls', _upload_price,$file_name)){
			$data['price'] = $price;				
		}				
		$data['ten_vi'] = $_POST['ten_vi'];
		
		$d->setTable('banggia');
		if($d->insert($data))
			transfer("Lưu dữ liệu thành công", "index.php?com=price&act=edit");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=price&act=edit");
	}
}
function delete_price(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
			$d->query("select ten_vi,price from #_banggia where id=$id");
			$kt=$d->result_array();
			delete_file(_upload_price.$kt[0]['price']);	
			
			$sql = "delete from #_banggia where id='".$id."'";
			$d->query($sql);
			
		
		if($d->query($sql))
			redirect("index.php?com=price&act=edit");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=price&act=edit");
	}else transfer("Không nhận được dữ liệu", "index.php?com=price&act=edit");
}
