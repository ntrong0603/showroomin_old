<?php
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './../../quanly/lib/');

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";	
	include_once _lib."qhack.php";	
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$login_name = 'AMTECOL';
		include_once "./../../quanly/config.php";
	
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
		case 'popup':
			$source = "popup";
			break;
			
		case 'hinhsp':
			$source = "hinhsp";
			break;
			
		case 'hinh_cungsp':
			$source = "hinh_cungsp";
			break;
			
		case 'order':
			$source = "donhang";
			break;

		 case 'doitac':
            $source="doitac";
            break;

        case 'qlkhachhang':
            $source = "qlkhachhang";
             break;
			
		case 'banggia':
			$source = "banggia";
			break;

		case 'bkgroundvideo':
			$source = "bkgroundvideo";
			break;

		case 'photo':
			$source = "photo";
			break;

		case 'photo_thuonghieu':
			$source = "thuonghieu";
			break;

		case 'photo_quangcao':
			$source = "quangcao";
			break;
			
		case 'news':
			$source = "news";
			break;
			
		case 'dathang':
			$source = "dathang";
			break;

		case 'news_one':
			$source = "news_one";
			break;

		case 'nhanxetkh':
			$source = "nhanxetkh";
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

		case 'product':
			$source = "product";
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
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/DTD/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Website Administration</title>
	<link href="./../../quanly/css/style.css" rel="stylesheet" type="text/css" />
			
	<link href="./../../quanly/media/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="./../../quanly/tiny_mce/tiny_mce.js"></script>

	<script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="./../../quanly/media/scripts/jquery.js"></script>
</head>

<body>
<?php if(isset($_SESSION[$login_name]) && ($_SESSION[$login_name] == true)){?>  
<div id="wrapper">
	<?php echo $_SERVER["SERVER_NAME"]."/Showroom/"?>
	<?php include _template."header_tpl.php" ?>
    
    <div id="main" style="margin-bottom: 50px;"> 
		 
        <!-- Right col -->
        <div id="contentwrapper">
        <div id="content">
          <?php include _template.$template."_tpl.php" ?>
        </div>
        </div>
        <!-- End right col -->
        
        <!-- Left col -->
        <div id="leftcol">
          <div class="innertube">
           <?php include _template."menu_tpl.php"; ?>
          </div>
        </div>
        <!-- End Left col -->
		
			<div class="clr"></div>
    </div>
  <div id="footer" style="position: fixed;
    bottom: 0px;
    width: 100%;">
		<?php include _template."footer_tpl.php" ?>
	</div>
</div>
<?php }else{?>   
				<?php include _template.$template."_tpl.php" ?>
		<?php }?>
</body>
</html>
