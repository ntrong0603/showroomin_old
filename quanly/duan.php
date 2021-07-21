<?php
	session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './lib/');

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";	
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$login_name = 'AMTECOL';
		include_once "./config.php";
	
	$d = new database($config['database']);
	
	switch($com){
		
		case 'thuoctinh':
			$source = "thuoctinh";
			break;
		case 'user':
			$source = "user";
			break;
		case 'url':
			$source = "url";
			break;
		case 'baiviet':
			$source = "baiviet";
			 if( $_GET['act']=='capnhat' ){$source='capnhatbaiviet';}
			break;	
		case 'lienhekhach':
			$source = "lienhekhach";
			break;
			
		case 'hinhsp':
			$source = "hinhsp";
			break;
			
		case 'order':
			$source = "donhang";
			break;
			
		case 'banggia':
			$source = "banggia";
			break;
			
		case 'news':
			$source = "news";
			break;
			
		case 'khaibao':
			$source = "khaibao";
			break;
			
		
		case 'newsletter':
			$source = "newsletter";
			break;
			
		case 'trogiup':
			$source = "trogiup";
			break;
			
		case 'tinhthanh':
			$source = "tinhthanh";
			break;
			
		case 'about':
			$source = "about";
			break;
			
		case 'letruot':
			$source = "letruot";
			break;
			
		case 'slider':
			$source = "slider";
			break;	
			
		case 'doitac':
			$source = "doitac";
			break;	
			
		case 'footer':
			$source = "footer";
			break;		
			
		case 'title':
			$source = "title";
			break;
			
		case 'meta':
			$source = "meta";
			break;
			
		case 'bannerqc':
			$source = "bannerqc";
			break;

		case 'quangcao':
			$source = "quangcao";
			break;
			
		case 'doitac':
			$source = "doitac";
			break;
			
		case 'place':
			$source = "place";
			break;
			
		case 'video':
			$source = "video";
			break;
			
		case 'catalog':
			$source = "catalog";
			break;
			
		case 'company':
			$source = "company";
			break;
			
		case 'tinnew':
			$source = "tinnew";
			break;
			
		case 'album':
			$source = "album";
			break;
			
		case 'yahoo':
			$source = "yahoo";
			break;
			
		case 'contact':
			$source = "contact";
			break;
		
		case 'hotline':
			$source = "hotline";
			break;
			
		case 'lienhe':
			$source = "lienhe";
			break;
		//---------------------------------------------------------
			
		default: 
			$source = "";
			$template = "index";
			break;
	}
	
	if((!isset($_SESSION[$login_name]) || $_SESSION[$login_name]==false) && $act!="login"){
		redirect("index.php?com=user&act=login");
	}
	
	if($source!="") include _source.$source.".php";
?>
<?php
	if( isset( $_POST['huyen'] ) ){
		$idphuong=$_POST['huyen'];
		$id_huyen_now = $_POST['id_huyen_now'];
		$d->reset();
		$sql="select * from table_news where loaitin='duan' and hienthi = 1 and id_huyen = '".$idphuong."'  order by stt";
		$d->query($sql);
		$duan = $d->result_array();
		
		
	}

?>

    <option value="0">---Có trong dự án không?---</option>
    <?php for($i=0,$count=count($duan);$i<$count;$i++){
		
    ?>
    <option  value="<?php echo $duan[$i]['id'];?>" <?php if($duan[$i]['id'] == $id_huyen_now) echo ' selected="selected"'; ?> ><?php echo $duan[$i]['ten'];?></option>
    <?php }?>
    

