<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
switch($act){
	//--=====-- krpano --=====--//
	case "man":
		get_items();
		$template = "krpano/items";
		break;
	case "add":
		get_items_video();	
		$template = "krpano/item_add";
		break;
	case "edit":
		get_items_video();		
		get_item();
		$template = "krpano/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	//--=====-- video --=====--//
	case "man_video":
		get_items_video();
		$template = "krpano/items_video";
		break;
	case "add_video":	
		$template = "krpano/item_add_video";
		break;
	case "edit_video":		
		get_item_video();
		$template = "krpano/item_add_video";
		break;
	case "save_video":
		save_item_video();
		break;
	case "delete_video":
		delete_item_video();
		break;
	//--=====-- audio --=====--//
	case "man_audio":
		get_items_audio();
		$template = "krpano/items_audio";
		break;
	case "add_audio":	
		$template = "krpano/item_add_audio";
		break;
	case "edit_audio":		
		get_item_audio();
		$template = "krpano/item_add_audio";
		break;
	case "save_audio":
		save_item_audio();
		break;
	case "delete_audio":
		delete_item_audio();
		break;
	//--=====-- spot --=====--//
	case "man_spot":
		get_items_spot();
		$template = "krpano/items_spot";
		break;
	case "add_spot":
		get_items();	
		$template = "krpano/item_add_spot";
		break;
	case "edit_spot":
		get_items();		
		get_item_spot();
		$template = "krpano/item_add_spot";
		break;
	case "save_spot":
		save_item_spot();
		break;
	case "delete_spot":
		delete_item_spot();
		break;

	default:
		$template = "index";
	//--=====-- Map --=====--//
	case "man_map":
		get_items_map();
		$template = "krpano/items_map";
		break;
	case "add_map":	
		$template = "krpano/item_add_map";
		break;
	case "edit_map":		
		get_item_map();
		$template = "krpano/item_add_map";
		break;
	case "save_map":
		save_item_map();
		break;
	case "delete_map":
		delete_item_map();
		break;

	default:
		$template = "index";
	//--=====-- Hotspot --=====--//
	case "man_hotspot":
		get_items_hotspot();
		$template = "krpano/items_hotspot";
		break;
	case "add_hotspot":
		get_items();
		get_items_audio();
		get_items_skinhotspot();
		$template = "krpano/item_add_hotspot";
		break;
	case "edit_hotspot":
		get_items();
		get_items_audio();
		get_items_skinhotspot();	
		get_item_hotspot();
		$template = "krpano/item_add_hotspot";
		break;
	case "save_hotspot":
		save_item_hotspot();
		break;
	case "delete_hotspot":
		delete_item_hotspot();
		break;

	//--=====-- Hotspot --=====--//
	case "man_skinhotspot":
		get_items_skinhotspot();
		$template = "krpano/items_skinhotspot";
		break;
	case "add_skinhotspot":
		$template = "krpano/item_add_skinhotspot";
		break;
	case "edit_skinhotspot":
		get_item_skinhotspot();
		$template = "krpano/item_add_skinhotspot";
		break;
	case "save_skinhotspot":
		save_item_skinhotspot();
		break;
	case "delete_skinhotspot":
		delete_item_skinhotspot();
		break;

	default:
		$template = "index";
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
//--=====-- krpano --=====--//
function get_items(){
	global $d, $items, $paging;	
	
	#----------------------------------------------------------------------------------------

	#-------------------------------------------------------------------------------
	$sql = "select * from #_krpano";	
	if((int)$_REQUEST['id_sp']!='')
	{
		$sql.=" where id=".(int)$_REQUEST['id_sp']."";
	}
	$sql.=" order by id desc";
	
	
	$d->query($sql);
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=krpano&act=man&id_sp=".$_GET['id_sp'];
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}
function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	
	$sql = "select * from #_krpano where id ='".$id."'";
	$d->query($sql);
	$kichthuot = $d->fetch_array();
	
	
	
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man");
	$sql = "select * from #_krpano where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=360&act=man");
	$item = $d->fetch_array();
}
function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		$namefolder=changeTitle(stripUnicode($_POST['title']));
		if($photo = upload_image("thumb", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_hinhanh.'/'.$namefolder.'/',$file_name)){
			$data['img_main'] = $photo;
			$data['thumburl'] = create_thumb($photo, 240, 240, _upload_hinhanh.'/'.$namefolder.'/',$file_name,2);									
			$d->setTable('krpano');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.'/'.$namefolder.'/'.$row['img_main']);	
				delete_file(_upload_hinhanh.'/'.$namefolder.'/'.$row['thumburl']);	
								
			}
		}
		
		
		$data['namefolderimg']=$namefolder;
		$data['name'] = $_POST['name'];	
		$data['title'] = $_POST['title'];	
		$data['idvideo'] = $_POST['idvideo'];
		$data['hlookat']=	$_POST['hlookat'];
		$data['vlookat']=	$_POST['vlookat'];
		$data['fov']=	$_POST['fov'];
		$data['fovmin']=	$_POST['fovmin'];
		$data['fovmax']=	$_POST['fovmax'];
		$data['maxpixelzoom']=	$_POST['maxpixelzoom'];
		$data['radarheading']=	$_POST['radarheading'];
		$data['previewurl']=	$_POST['previewurl'];
		$data['cubeurl']=	$_POST['cubeurl'];
		$data['cubemobileurl']=	$_POST['cubemobileurl'];

		$d->setTable('krpano');
		$d->setWhere('id', $id);

		if($d->update($data))
			redirect("index.php?com=krpano&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=krpano&act=man");
	}

	else
	{
		$namefolder=changeTitle(stripUnicode($_POST['title']));

		if($photo = upload_image("thumb", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_hinhanh.'/'.$namefolder.'/',$file_name))
		{
			$data['img_main'] = $photo;		
			$data['thumburl'] = create_thumb($photo, 240, 240, _upload_hinhanh.'/'.$namefolder.'/',$file_name,2);	
		}
		$file_name=fns_Rand_digit(0,9,6);
		
		$data['namefolderimg']=$namefolder;
		$data['name'] = $_POST['name'];	
		$data['title'] = $_POST['title'];	
		$data['idvideo'] = $_POST['idvideo'];
		$data['hlookat']=	$_POST['hlookat'];
		$data['vlookat']=	$_POST['vlookat'];
		$data['fov']=	$_POST['fov'];
		$data['fovmin']=	$_POST['fovmin'];
		$data['fovmax']=	$_POST['fovmax'];
		$data['maxpixelzoom']=	$_POST['maxpixelzoom'];
		$data['radarheading']=	$_POST['radarheading'];
		$data['previewurl']=	$_POST['previewurl'];
		$data['cubeurl']=	$_POST['cubeurl'];
		$data['cubemobileurl']=	$_POST['cubemobileurl'];

		$d->setTable('krpano');
		if($d->insert($data))
			redirect("index.php?com=krpano&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=krpano&act=man");
	}
}

function delete_item(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		//Xóa sản phẩm thuộc loại đó			
		$sql = "select * from #_krpano where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0)
		{
			while($row = $d->fetch_array())
			{
				if(is_dir(_upload_hinhanh.$row['namefolderimg']) )
				{
					rmdir($row['namefolderimg']);
				}
			}
		}
		$sql = "delete from #_krpano where id='".$id."'";
		
		if($d->query($sql))
			redirect("index.php?com=krpano&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=krpano&act=man");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();

				$sql = "select * from #_krpano where id='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0)
				{
					while($row = $d->fetch_array())
					{
						if(is_dir(_upload_hinhanh.$row['namefolderimg']) )
						{
							rmdir(_upload_hinhanh.$row['namefolderimg']);
						}
					}
				}

				$sql = "delete from #_krpano where id='".$id."'";
				$d->query($sql);
			
		} 
		redirect("index.php?com=krpano&act=man");
	} 
	else transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man");
}
//--=====-- video --=====--//
function get_items_video(){
	global $d, $items, $paging;	
	
	#----------------------------------------------------------------------------------------

	#-------------------------------------------------------------------------------
	$sql = "select * from #_krpano_video";	
	if((int)$_REQUEST['id_sp']!='')
	{
		$sql.=" where id=".(int)$_REQUEST['id_sp']."";
	}
	$sql.=" order by id desc";
	
	
	$d->query($sql);
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=krpano&act=man_video&id_sp=".$_GET['id_sp'];
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}
function get_item_video(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	
	$sql = "select * from #_krpano_video where id ='".$id."'";
	$d->query($sql);
	$kichthuot = $d->fetch_array();
	
	
	
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_video");
	$sql = "select * from #_krpano_video where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=krpano&act=man_video");
	$item = $d->fetch_array();
}
function save_item_video(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_video");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($video = upload_image("video", 'wma|WMA|mp4|MP4|avi|AVI', _upload_video,$file_name)){
			$data['videourl'] = $video;										
			$d->setTable('krpano_video');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				//delete_file(_upload_hinhanh.$row['photo']);	
				delete_file(_upload_video.$row['videourl']);	
							
			}
		}
		$data['name'] = $_POST['name'];
		$data['ath'] = $_POST['ath'];
		$data['atv'] = $_POST['atv'];
		$data['edge'] = $_POST['edge'];	
		$data['scale'] = $_POST['scale'];
		$data['scalemobile'] = $_POST['scalemobile'];
		$data['rx'] = $_POST['rx'];
		$data['ry'] = $_POST['ry'];
		$data['rz'] = $_POST['rz'];
		$data['loopvideo'] = $_POST['loopvideo'];
		$data['volume'] = $_POST['volume'];
		
		$d->setTable('krpano_video');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=krpano&act=man_video");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=krpano&act=man_video");
	}

	else
	{

		if($video = upload_image("video", 'wma|WMA|mp4|MP4|avi|AVI', _upload_video, $file_name))
		{
			$data['videourl'] = $video;		
		}
		$data['name'] = $_POST['name'];
		$data['ath'] = $_POST['ath'];
		$data['atv'] = $_POST['atv'];
		$data['edge'] = $_POST['edge'];	
		$data['scale'] = $_POST['scale'];
		$data['scalemobile'] = $_POST['scalemobile'];
		$data['rx'] = $_POST['rx'];
		$data['ry'] = $_POST['ry'];
		$data['rz'] = $_POST['rz'];
		$data['loopvideo'] = $_POST['loopvideo'];
		$data['volume'] = $_POST['volume'];

		$d->setTable('krpano_video');
		if($d->insert($data))
			redirect("index.php?com=krpano&act=man_video");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=krpano&act=man_video");
	}
}

function delete_item_video(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		//Xóa sản phẩm thuộc loại đó			
		$sql = "select id,videourl from #_krpano_video where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0)
		{
			while($row = $d->fetch_array())
			{
				delete_file(_upload_video.$row['videourl']);
			}
		}
		$sql = "delete from #_krpano_video where id='".$id."'";
		
		if($d->query($sql))
			redirect("index.php?com=krpano&act=man_video");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=krpano&act=man_video");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();

				$sql = "select id,videourl from #_krpano_video where id='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0)
				{
					while($row = $d->fetch_array())
					{
						delete_file(_upload_video.$row['videourl']);	
					}
				}

				$sql = "delete from #_krpano_video where id='".$id."'";
				$d->query($sql);
			
		} 
		redirect("index.php?com=krpano&act=man_video");
	} 
	else transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_video");
}
//--=====-- audio --=====--//
function get_items_audio(){
	global $d, $audioitems, $paging;	
	
	#----------------------------------------------------------------------------------------

	#-------------------------------------------------------------------------------
	$sql = "select * from #_krpano_audio";	
	if((int)$_REQUEST['id_sp']!='')
	{
		$sql.=" where id=".(int)$_REQUEST['id_sp']."";
	}
	$sql.=" order by id desc";
	
	
	$d->query($sql);
	$audioitems = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=krpano&act=man_audio&id_sp=".$_GET['id_sp'];
	$maxR=20;
	$maxP=20;
	$paging=paging($audioitems, $url, $curPage, $maxR, $maxP);
	$audioitems=$paging['source'];
}
function get_item_audio(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	
	$sql = "select * from #_krpano_audio where id ='".$id."'";
	$d->query($sql);
	$kichthuot = $d->fetch_array();
	
	
	
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_audio");
	$sql = "select * from #_krpano_audio where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=krpano&act=man_audio");
	$item = $d->fetch_array();
}
function save_item_audio(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_audio");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($icon = upload_image("icon", 'png|PNG', _upload_audio, $file_name))
		{
			$data['icon'] = $icon;										
			$d->setTable('krpano_audio');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				//delete_file(_upload_hinhanh.$row['photo']);	
				delete_file(_upload_audio.$row['icon']);	
							
			}		
		}
		if($audio = upload_image("audio", 'mp3|MP3', _upload_audio,$file_name)){
			$data['audiourl'] = $audio;										
			$d->setTable('krpano_audio');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				//delete_file(_upload_hinhanh.$row['photo']);	
				delete_file(_upload_audio.$row['audiourl']);	
							
			}
		}
		$data['name'] = $_POST['name'];
		$data['x'] = $_POST['x'];
		$data['y'] = $_POST['y'];
		$data['alpha'] = $_POST['alpha'];	
		$data['scale'] = $_POST['scale'];
		$data['align'] = $_POST['align'];
		$data['volume'] = $_POST['volume'];
		
		$d->setTable('krpano_audio');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=krpano&act=man_audio");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=krpano&act=man_audio");
	}

	else
	{
		if($icon = upload_image("icon", 'png|PNG', _upload_audio, $file_name))
		{
			$data['icon'] = $icon;		
		}

		if($audio = upload_image("audio", 'mp3|MP3', _upload_audio, $file_name))
		{
			$data['audiourl'] = $audio;		
		}
		$data['name'] = $_POST['name'];
		$data['x'] = $_POST['x'];
		$data['y'] = $_POST['y'];
		$data['alpha'] = $_POST['alpha'];	
		$data['scale'] = $_POST['scale'];
		$data['align'] = $_POST['align'];
		$data['volume'] = $_POST['volume'];

		$d->setTable('krpano_audio');
		if($d->insert($data))
			redirect("index.php?com=krpano&act=man_audio");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=krpano&act=man_audio");
	}
}

function delete_item_audio(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		//Xóa sản phẩm thuộc loại đó			
		$sql = "select id,audiourl from #_krpano_audio where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0)
		{
			while($row = $d->fetch_array())
			{
				delete_file(_upload_audio.$row['audiourl']);
			}
		}
		$sql = "delete from #_krpano_video where id='".$id."'";
		
		if($d->query($sql))
			redirect("index.php?com=krpano&act=man_audio");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=krpano&act=man_audio");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();

				$sql = "select id,videourl from #_krpano_audio where id='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0)
				{
					while($row = $d->fetch_array())
					{
						delete_file(_upload_audio.$row['audiourl']);	
					}
				}

				$sql = "delete from #_krpano_audio where id='".$id."'";
				$d->query($sql);
			
		} 
		redirect("index.php?com=krpano&act=man_audio");
	} 
	else transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_audio");
}
	//--=====-- spot --=====--//
function get_items_spot(){
	global $d, $items, $paging;	
	
	#----------------------------------------------------------------------------------------

	#-------------------------------------------------------------------------------
	$sql = "select * from #_krpano_spot";	
	if((int)$_REQUEST['id_sp']!='')
	{
		$sql.=" where id=".(int)$_REQUEST['id_sp']."";
	}
	$sql.=" order by id desc";
	
	
	$d->query($sql);
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=krpano&act=man_spot&id_sp=".$_GET['id_sp'];
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}
function get_item_spot(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	
	$sql = "select * from #_krpano_spot where id ='".$id."'";
	$d->query($sql);
	$kichthuot = $d->fetch_array();
	
	
	
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_spot");
	$sql = "select * from #_krpano_spot where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=krpano&act=man_spot");
	$item = $d->fetch_array();
}
function save_item_spot(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_spot");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
	
		$data['name'] = $_POST['name'];
		$data['x'] = $_POST['x'];
		$data['y'] = $_POST['y'];	
		$data['style'] = $_POST['style'];
		$data['idkrpano'] = $_POST['idkrpano'];
		
		$d->setTable('krpano_spot');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=krpano&act=man_spot");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=krpano&act=man_spot");
	}

	else
	{

		$data['name'] = $_POST['name'];
		$data['x'] = $_POST['x'];
		$data['y'] = $_POST['y'];	
		$data['style'] = $_POST['style'];
		$data['idkrpano'] = $_POST['idkrpano'];

		$d->setTable('krpano_spot');
		if($d->insert($data))
			redirect("index.php?com=krpano&act=man_spot");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=krpano&act=man_spot");
	}
}

function delete_item_spot(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		//Xóa sản phẩm thuộc loại đó			
		$sql = "delete from #_krpano_spot where id='".$id."'";
		
		if($d->query($sql))
			redirect("index.php?com=krpano&act=man_spot");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=krpano&act=man_spot");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			$sql = "delete from #_krpano_spot where id='".$id."'";
			$d->query($sql);
			
		} 
		redirect("index.php?com=krpano&act=man_spot");
	} 
	else transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_spot");
}
//--=====-- map --=====--//
function get_items_map(){
	global $d, $items, $paging;	
	
	#----------------------------------------------------------------------------------------

	#-------------------------------------------------------------------------------
	$sql = "select * from #_krpano_map";	
	if((int)$_REQUEST['id_sp']!='')
	{
		$sql.=" where id=".(int)$_REQUEST['id_sp']."";
	}
	$sql.=" order by id desc";
	
	
	$d->query($sql);
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=krpano&act=man_map&id_sp=".$_GET['id_sp'];
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}
function get_item_map(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	
	$sql = "select * from #_krpano_map where id ='".$id."'";
	$d->query($sql);
	$kichthuot = $d->fetch_array();
	
	
	
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_map");
	$sql = "select * from #_krpano_map where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=krpano&act=man_map");
	$item = $d->fetch_array();
}

function save_item_map(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_map");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("icon_map", 'png|PNG', _upload_hinhanh,$file_name)){
			$data['icon_map'] = $photo;
											
			$d->setTable('krpano_map');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['icon_map']);	
								
			}
		}
		if($photo = upload_image("map", 'png|PNG', _upload_hinhanh,$file_name)){
			$data['map'] = $photo;
												
			$d->setTable('krpano_map');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.'/'.$namefolder.'/'.$row['map']);	
			}
		}
		$data['title'] = $_POST['title'];
		$data['icon_x'] = $_POST['icon_x'];
		$data['icon_y'] = $_POST['icon_y'];
		$data['align'] = $_POST['align'];	
		$data['icon_scale'] = $_POST['icon_scale'];
		$data['onhover'] = $_POST['onhover'];
		$data['map_x'] = $_POST['map_X'];
		$data['map_y'] = $_POST['map_y'];
		$data['map_scale'] = $_POST['map_scale'];
		$data['map_align'] = $_POST['map_align'];
				
		$d->setTable('krpano_map');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=krpano&act=man_map");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=krpano&act=man_map");
	}

	else
	{

		if($photo = upload_image("icon_map", 'png|PNG', _upload_hinhanh,$file_name)){
			$data['icon_map'] = $photo;								
		}
		if($photo = upload_image("map", 'png|PNG', _upload_hinhanh,$file_name)){
			$data['map'] = $photo;
		}
		$data['title'] = $_POST['title'];
		$data['icon_x'] = $_POST['icon_x'];
		$data['icon_y'] = $_POST['icon_y'];
		$data['align'] = $_POST['align'];	
		$data['icon_scale'] = $_POST['icon_scale'];
		$data['onhover'] = $_POST['onhover'];
		$data['map_x'] = $_POST['map_X'];
		$data['map_y'] = $_POST['map_y'];
		$data['map_scale'] = $_POST['map_scale'];
		$data['map_align'] = $_POST['map_align'];

		$d->setTable('krpano_map');
		if($d->insert($data))
			redirect("index.php?com=krpano&act=man_map");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=krpano&act=man_map");
	}
}

function delete_item_map(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		//Xóa sản phẩm thuộc loại đó			
		$sql = "select id,videourl from #_krpano_map where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0)
		{
			while($row = $d->fetch_array())
			{
				delete_file(_upload_hinhanh.$row['map']);
				delete_file(_upload_hinhanh.$row['icon_map']);
			}
		}
		$sql = "delete from #_krpano_map where id='".$id."'";
		
		if($d->query($sql))
			redirect("index.php?com=krpano&act=man_map");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=krpano&act=man_map");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();

				$sql = "select id,videourl from #_krpano_map where id='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0)
				{
					while($row = $d->fetch_array())
					{
						delete_file(_upload_hinhanh.$row['map']);
						delete_file(_upload_hinhanh.$row['icon_map']);	
					}
				}

				$sql = "delete from #_krpano_map where id='".$id."'";
				$d->query($sql);
			
		} 
		redirect("index.php?com=krpano&act=man_map");
	} 
	else transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_map");
}
//--=====-- Hotspot --=====--//
function get_items_hotspot(){
	global $d, $items, $paging;	
	
	#----------------------------------------------------------------------------------------
	if(!isset($_REQUEST['id_scene']) || $_REQUEST['id_scene']==''){
		transfer("Chọn phòng cần sửa đổi hotspot", "index.php?com=krpano&act=man");
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_krpano_hotspot";	
	if((int)$_REQUEST['id_scene']!='')
	{
		$sql.=" where id_main_scene=".(int)$_REQUEST['id_scene']."";
	}
	$sql.=" order by id desc";
	
	
	$d->query($sql);
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=krpano&act=man_hotspot&id_scene=".$_REQUEST['id_scene'];
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}
function get_item_hotspot(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	
	$sql = "select * from #_krpano_hotspot where id ='".$id."'";
	$d->query($sql);
	$kichthuot = $d->fetch_array();
	
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_hotspot");
	$sql = "select * from #_krpano_hotspot where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=krpano&act=man_hotspot");
	$item = $d->fetch_array();
}
function save_item_hotspot(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_hotspot");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	if($id){
		$id =  themdau($_POST['id']);
	
		$data['name'] = $_POST['name'];
		$data['ath'] = $_POST['ath'];
		$data['atv'] = $_POST['atv'];	
		$data['style'] = $_POST['style'];
		$data['id_main_scene'] = $_POST['id_main_scene'];
		$data['id_scene'] = $_POST['id_scene'];
		$data['id_audio'] = $_POST['id_audio'];
		
		$d->setTable('krpano_hotspot');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=krpano&act=man_hotspot&id_scene=".$_POST['id_main_scene']);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=krpano&act=man_hotspot");
	}
	else
	{
		$data['name'] = $_POST['name'];
		$data['ath'] = $_POST['ath'];
		$data['atv'] = $_POST['atv'];	
		$data['style'] = $_POST['style'];
		$data['id_main_scene'] = $_POST['id_main_scene'];
		$data['id_scene'] = $_POST['id_scene'];
		$data['id_audio'] = $_POST['id_audio'];

		$d->setTable('krpano_hotspot');
		if($d->insert($data))
			redirect("index.php?com=krpano&act=man_hotspot&id_scene=".$_POST['id_main_scene']);
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=krpano&act=man_hotspot");
	}
}

function delete_item_hotspot(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		//Xóa sản phẩm thuộc loại đó			
		$sql = "delete from #_krpano_hotspot where id='".$id."'";
		
		if($d->query($sql))
			redirect("index.php?com=krpano&act=man_hotspot&id_scene=".@$_GET['id_scene']);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=krpano&act=man_hotspot&id_scene=".@$_GET['id_scene']);
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			$sql = "delete from #_krpano_hotspot where id='".$id."'";
			$d->query($sql);
			
		} 
		redirect("index.php?com=krpano&act=man_hotspot&id_scene=".@$_GET['id_scene']);
	} 
	else transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_hotspot&id_scene=".@$_GET['id_scene']);
}
//--=====-- Skin Hotspot --=====--//
function get_items_skinhotspot(){
	global $d, $skinitems, $paging;	
	
	#-------------------------------------------------------------------------------
	$sql = "select * from #_krpano_skinhotspot";	

	$sql.=" order by id desc";
	
	
	$d->query($sql);
	$skinitems = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=krpano&act=man_skinhotspot";
	$maxR=20;
	$maxP=20;
	$paging=paging($skinitems, $url, $curPage, $maxR, $maxP);
	$skinitems=$paging['source'];
}
function get_item_skinhotspot(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	
	$sql = "select * from #_krpano_skinhotspot where id ='".$id."'";
	$d->query($sql);
	$kichthuot = $d->fetch_array();
	
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_skinhotspot");
	$sql = "select * from #_krpano_skinhotspot where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=krpano&act=man_skinhotspot");
	$item = $d->fetch_array();
}
function save_item_skinhotspot(){
	global $d;
	$file_name=fns_Rand_digit(0,9,6);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_skinhotspot");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("url", 'png|PNG', _upload_hinhanh,$file_name)){
			$data['url'] = $photo;
											
			$d->setTable('krpano_skinhotspot');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['url']);	
								
			}
		}

		$data['name'] = $_POST['name'];
		$data['scale'] = $_POST['scale'];
		$data['edge'] = $_POST['edge'];
				
		$d->setTable('krpano_skinhotspot');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=krpano&act=man_skinhotspot");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=krpano&act=man_skinhotspot");
	}

	else
	{

		if($photo = upload_image("url", 'png|PNG', _upload_hinhanh,$file_name)){
			$data['url'] = $photo;								
		}

		$data['name'] = $_POST['name'];
		$data['scale'] = $_POST['scale'];
		$data['edge'] = $_POST['edge'];

		$d->setTable('krpano_skinhotspot');
		if($d->insert($data))
			redirect("index.php?com=krpano&act=man_skinhotspot");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=krpano&act=man_skinhotspot");
	}
}

function delete_item_skinhotspot(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		//Xóa sản phẩm thuộc loại đó			
		$sql = "select id,url from #_krpano_skinhotspot where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0)
		{
			while($row = $d->fetch_array())
			{
				delete_file(_upload_hinhanh.$row['url']);
			}
		}
		$sql = "delete from #_krpano_skinhotspot where id='".$id."'";
		
		if($d->query($sql))
			redirect("index.php?com=krpano&act=man_skinhotspot");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=krpano&act=man_skinhotspot");
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();

				$sql = "select id,url from #_krpano_skinhotspot where id='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0)
				{
					while($row = $d->fetch_array())
					{
						delete_file(_upload_hinhanh.$row['url']);
					}
				}

				$sql = "delete from #_krpano_skinhotspot where id='".$id."'";
				$d->query($sql);
			
		} 
		redirect("index.php?com=krpano&act=man_skinhotspot");
	} 
	else transfer("Không nhận được dữ liệu", "index.php?com=krpano&act=man_skinhotspot");
}
?>