<?php	if(!defined('_source')) die("Error");
$template='baiviet/capnhat';
if( isset( $_GET['loaitin'] ) ){$loaitin=$_GET['loaitin'];}
		
		$d->reset();
		$d->setTable('baiviet');
		$d->setWhere('loaitin',$loaitin);
		$d->select();
		if( $d->num_rows()>0 ){
			$item=$d->fetch_array();
				$edit=1;
		}else { $edit=0;
		}
		
		if( isset( $_POST['save'] ) ){
			save_item();
			
		}


#====================================
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function save_item(){
	global $edit,$loaitin,  $d,$item;
	$file_name=fns_Rand_digit(0,9,6);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=baiviet&act=man");
	
	
	if($edit==1){
		
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 400, 400, _upload_tintuc,$file_name,2);									
			$d->setTable('baiviet');
			$d->setWhere('loaitin', $loaitin);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tintuc.$row['photo']);	
				delete_file(_upload_tintuc.$row['thumb']);	
							
			}
		}

			$data['loaitin']=$loaitin;
	
		
		
		
		$data['tenkhongdau'] = $_POST['tenkhongdau'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['ten'] = $_POST['ten'];
		$data['ten_rd'] = $_POST['ten_rd'];
		$data['ten_sd'] = $_POST['ten_sd'];	
		$data['noidung'] = addslashes($_POST['noidung']);
		$data['noidung_sd'] = addslashes($_POST['noidung_sd']);
		$data['noidung_rd'] = addslashes($_POST['noidung_rd']);
		$data['mota'] = addslashes($_POST['mota']);
		$data['mota_sd'] = addslashes($_POST['mota_sd']);
		$data['mota_rd'] = addslashes($_POST['mota_rd']);
		
		
						
		$data['stt'] = $_POST['stt'];
		
		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

		$data['ngaysua'] = time();
		
		
		if($d->update($data))
			transfer("Lưu thành công", "index.php?com=baiviet&act=capnhat&loaitin=".$loaitin);
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=baiviet&act=capnhat&loaitin=".$loaitin);
	}else{

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name))
		{
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 400, 400, _upload_tintuc,$file_name,2);	
		}
		$data['mota'] = addslashes($_POST['mota']);$data['mota_sd'] = addslashes($_POST['mota_sd']);$data['mota_rd'] = addslashes($_POST['mota_rd']);

				$data['loaitin']=$loaitin;
	
	
		$data['tenkhongdau'] = $_POST['tenkhongdau'];
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['ten'] = $_POST['ten'];
		$data['ten_rd'] = $_POST['ten_rd'];
		$data['ten_sd'] = $_POST['ten_sd'];	
		
		$data['noidung'] = addslashes($_POST['noidung']);
		$data['noidung_sd'] = addslashes($_POST['noidung_sd']);
		$data['noidung_rd'] = addslashes($_POST['noidung_rd']);		
		
		
		$data['stt'] = $_POST['stt'];
		

		$data['ngaytao'] = time();
		
		
		
		if($d->insert($data))
			transfer("Lưu thành công", "index.php?com=baiviet&act=capnhat&loaitin=".$loaitin);
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=baiviet&act=capnhat&loaitin=".$loaitin);
	}
}


#====================================

?>


