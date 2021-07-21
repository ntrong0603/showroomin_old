<?php
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$d = new database($config['database']);
	
	$d->reset();
	$sql_setting = "select * from #_setting limit 0,1";
	$d->query($sql_setting);
	$row_setting= $d->fetch_array();
	
	switch($com){
		case 'ban-do':
			$source = "map";
			$template ="map";
			break;
		
		case 'gioi-thieu':
			$source = "about";
			$template = isset($_GET['id']) ? "about_detail" : "about";
			break;
		case 'thu-vien-anh':
			$source = "gallery";
			$template = isset($_GET['idc']) ? "gallery_detail" : "gallery";			
			break;
		
		case 'tin-tuc':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			break;
		
		case 'san-pham':
			$template = "cac_sanpham";
			break;
		case 'chitiet-sanpham':
			$source = "chitietsanpham";
			$template = isset($_GET['id']) ? "chitietsanpham" : "cacsanpham";
			break;
			
		case 'cac-tin-tuc':
			$source = "cactintuc";
			$template = isset($_GET['id']) ? "cactintuc_detail" : "cactintuc";
			break;
			
		case 'dich-vu':
			$source = "cacsukien";
			$template = "cacsukien_detail";
			break;
			
		case 'bao-gia':
			$source = "baogia";
			$template = "baogia";
			break;
			
		case 'chi-tiet-dich-vu':
			$source = "chitietsukien";
			$template = isset($_GET['id']) ? "chitietsukien" : "cacphongmach";
			break;
		
		case 'tuyen-dung':
			$source = "cactuyendung";
			$template = "cactuyendung_detail";
			break;
			
		case 'list':
			$source = "list";
			$template = "danhmuc";	
			break;
			
			
		case 'loai':
			$source = "loai";
			$template = "danhmuc";	
			break;
		
		case 'danh-muc-cap1':
			$source = "listsp_cap2";
			$template = isset($_GET['id']) ? "danhmucc2_detail" : "danhmuc";	
			break;
		
		case 'danh-muc':
			$source = "danh-muc";
			$template =	"danhmuc";	
			break;
		
		case 'chitiet-danhmuc':
			$source = "chitietdm";
			$template = isset($_GET['id']) ? "chitietdm" : "danhmuc";
			break;
			
		case 'chi-tiet-sp':
			$source = "chitietsp";
			$template = "chitiet-sanpham";	
			break;	
		
		case 'thiet-ke':
			$source = "thietke";
			$template = "danhmuc";	
			break;
		
		case 'noi-bat':
			$source = "noibat";
			$template = "danhmuc";	
			break;
			
		case 'hoat-dong':
			$source = "hoatdong";
			$template = isset($_GET['id']) ? "hoatdong_detail" : "hoatdong";				
			break;	
			
		case 'tu-van-thiet-ke':
			$source = "tv-thietke";
			$template = "tv-thietke";	
			break;
			
		case 'du-an':
			$source = "duan";
			$template = "duan";	
			break;
	
		case 'lien-he':
			$source = "contact";
			$template = "contact";
			break;
		
		case 'tim-kiem':
			$source = "timkiem";
			$template =  "timkiem";		
			break;	
		
		case 'chit-tiet-tim-kiem':
			$source = "chitiettimkiem";
			$template =  "chitiettimkiem";		
			break;	
			
		case 'san-pham-goc':
			$source = "place";
			$template =isset($_GET['id']) ? "place_detail" : "place";
			break;
			
		//gio hang
		case 'gio-hang':
			$template ="dathang";
			break;
			
		case 'dat-hang':
			$source = "dathang";
			$template ="dathang_chitiet";
			break;
		//-------------
			
		case 'ngonngu':
			
			if(isset($_GET['lang']))
			{
				switch($_GET['lang'])
					{
					case 'vi':
						$_SESSION['lang2'] = 'vi';						
						break;
					case 'en':
						$_SESSION['lang2'] = 'en';						
						break;

					default: 
						$_SESSION['lang2'] = 'vi';
						break;
					}
			}
			else{
				$_SESSION['lang2'] = 'vi';
			}	
			redirect($_SERVER['HTTP_REFERER']);
			break;
			
		
		default: 
			$source = "index";
			$template = "index";
			break;
	}
	
	if($source!="") include _source.$source.".php";
	
	if($_REQUEST['com']=='logout')
	{
		session_unregister($login_name);
		header("Location:index.php");
	}		
?>