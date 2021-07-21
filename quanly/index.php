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
	$login_name = 'vietnamvodich';
		include_once "./config.php";
	
	$d = new database($config['database']);
	
	switch($com){
		
		case 'thuoctinh':
			$source = "thuoctinh";
			break;
		
		case 'concept':
			$source = "concept";
			break;
		
		case 'danhgia':
			$source = "danhgia";
			break;

		
		case 'sliderindex':
			$source = "sliderindex";
			break;
		case 'user':
			$source = "user";
			break;
			
		case 'custom':
			$source = "custom";
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
					
		case '360':
			$source = "360";
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
			
		case 'chothue':
			$source = "chothue";
			break;
					
		case 'duan':
			$source = "duan";
			break;
						
		case 'place':
			$source = "place";
			break;					
		case 'brand':
			$source = "brand";
			break;
		case 'product':
			$source = "product";
			break;
					
		case 'haicot':
			$source = "haicot";
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

		case 'krpano':
			$source = "krpano";
			break;

		case 'lienhe':
			$source = "lienhe";
			break;
		
		case 'thongke':
			$source = "thongke_new";
			break;
		//---------------------------------------------------------
			
		default: 
			$source = "";
			$template = "index";
			break;
	}
	
	if((!isset($_SESSION[$login_name]) || $_SESSION[$login_name]==false)  && $act!="login"){
		
		redirect("index.php?com=user&act=login");
	
	}
	
	if($source!="") include _source.$source.".php";

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Website Administration</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<link href="media/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>

<script type="text/javascript" src="./ck/ck/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="media/scripts/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
<script>

	 $(document).ready(function(){   
				$('.edit_item').click(function(){
					var url      = window.location.href; 
				
							$.ajax({
													type:"post",
													url:"./vetrangcu.php",
													data:{url2:url},
													async:false,
													success:function(kq){
											
													
													}
												}) 
				})
	 })
</script>
<?php if(isset($_SESSION[$login_name]) && ($_SESSION[$login_name] == true)){?>  

<div id="wrapper">
	
    <div id="main"> 
		  <!-- Left col -->
		 <div id="leftcol">
          <div class="innertube">
           <?php include _template."menu_tpl.php";?>
         </div>
        </div>
        <!-- End Left col -->
        <!-- Right col -->
        <div id="contentwrapper">
			<div id="content">
				<?php include _template."header_tpl.php";?>
				<div id="content2">
					<?php include _template.$template."_tpl.php";?>
				</div>
			</div>
        </div>
        <!-- End right col -->
        
       
		
			<div class="clr"></div>
    </div>
  <!--<div id="footer">
		<?php include _template."footer_tpl.php";?>
	</div>-->
</div>
<?php }else{?>   
				<?php include _template.$template."_tpl.php";?>
		<?php }?>
		
	
</body>
</html>
