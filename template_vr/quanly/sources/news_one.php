<?php
	$loaitin = $_REQUEST['loaitin'];
	if  (!empty($_POST)) {
		$file_name=fns_Rand_digit(0,9,6);
		$file_name2=fns_Rand_digit(0,9,6);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_tintuc,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], $menu[$loaitin]['width'], $menu[$loaitin]['height'], _upload_tintuc,$file_name,2);									
			$d->setTable('news');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tintuc.$row['photo']);	
				delete_file(_upload_tintuc.$row['thumb']);	
							
			}
		}
		if($urlfile = upload_image("file2", 'pdf|doc|docx', _upload_tintuc,$file_name2)){
			$data['urlfile'] = $urlfile;									
			$d->setTable('news');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tintuc.$row['urlfile']);	
				
							
			}
		}
		
		$data['ten'] = $_POST['ten'];$data['ten_rd'] = $_POST['ten_rd'];$data['ten_sd'] = $_POST['ten_sd'];

		$data['loaitin'] = $loaitin;	
		
		if($_POST['tenkhongdau']==$item['tenkhongdau'] and $_POST['tenkhongdau']!='')
		{
			$data['tenkhongdau']=$_POST['tenkhongdau'];
		}else
		{
			if ($_POST['tenkhongdau']==''  || !isset($_POST['tenkhongdau']) )
			{
				$tenkhongdau=changeTitle($_POST['ten']);
			}
			else
			{
				$tenkhongdau = changeTitle($_POST['tenkhongdau']);
			}
			$newname=$tenkhongdau;
		$d->reset();
			$d->setTable('news');
			$d->setWhere('id', $id);
			$d->setWhere('loaitin',$loaitin);
			$data0['tenkhongdau']='';
			$d->update($data0);
		for($i=0;$i<100;$i++){
			if( checklink($newname)==true ){
					
		
				$newname=$tenkhongdau."-".$i;
				
				
					}else{
							
		
						break;
					}
			}
			$data['tenkhongdau']=$newname;
		}
		
		$data['description'] = $_POST['description'];
		$data['title'] = $_POST['title'];
		$data['keyword'] = $_POST['keyword'];
		
		$data['noidung'] = mysql_real_escape_string($_POST['noidung']);
		$data['noidung_sd'] = mysql_real_escape_string($_POST['noidung_sd']);
		$data['noidung_rd'] = mysql_real_escape_string($_POST['noidung_rd']);

		$data['mota'] = mysql_real_escape_string($_POST['mota']);
		$data['mota_sd'] = mysql_real_escape_string($_POST['mota_sd']);
		$data['mota_rd'] = mysql_real_escape_string($_POST['mota_rd']);	
						
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('news');
		$d->setWhere('loaitin',$_REQUEST['loaitin']);
		$d->setLimit(1);
		$d->select();
		$item = $d->fetch_array();
		if ($item == null)
		{
			$d->insert($data)	;
			$d->reset();
			$d->setTable('news');
			$d->setOrder('id desc');
			$d->setLimit( 1 );
			$d->select();
			$item=$d->fetch_array();
		}
		else {
			$d->reset();
			$d->setTable('news');
			$d->setWhere('id',$item['id']);
			$d->update($data);
		}
		if (isset($_POST['qhack']))
			qsave_image('news',$id,_upload_tintuc,'');
	}//end save

	$d->reset();
	$d->setTable('news');
	$d->setWhere('loaitin',$_REQUEST['loaitin']);
	$d->setLimit(1);
	$d->select();
	$item = $d->fetch_array();
	$template = "news_one/item_add";
	
	
	function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

?>