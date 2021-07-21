<?php 
	date_default_timezone_set('Asia/Ho_Chi_Minh');

	require_once  "./../../Mobile-Detect/Mobile_Detect.php";	
	$mobile = "";
	$detect = new Mobile_Detect;
	if ( $detect->isMobile() ||  $detect->isTablet() ) {
		$mobile = '_mobile';
	}
	@define ( '_templates' , './../../template_vr/templates'.$mobile.'/');
	@define ( '_source' , './../../template_vr/sources'.$mobile.'/');
	@define ( '_lib' , './../../quanly/lib/');

	if(!isset($_SESSION['lang']))
	{
		$lang='_vn';
	}
	else
	{
		$lang=$_SESSION['lang'];
	} 
	$lg='';
    if($lang=='_sd'){
        $lg=$lang;
    }


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta http-equiv="x-ua-compatible" content="IE=edge" />
	<meta name="msapplication-TileColor" content="#FFFFFF"/>
	<link rel="stylesheet" type="text/css" href="./../../template_vr/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./../../template_vr/css/slick.css">
	<link rel="stylesheet" type="text/css" href="./../../template_vr/css/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="./../../template_vr/css/style<?php echo $mobile; ?>.css">
	
	<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
	

</head>
<body>
<script>
	function showMenuAndCart(){
		$('.Cart_big').show(200);
		$('.Menu_big').show(200);
	}
	function openLoadLogo(){
		closeTg();
		$('#loadpano').show();
	}
	function closeLoadLogo(){
		$('#loadpano').hide();
	}
</script>
<script src="tour.js"></script>
<div id="loadpano">
	<img src="images/logo.png" width="30vw" height="auto" style="width: 30vw;height: auto;margin: auto;display: block;margin-top: 25vh;">
</div>
<!--<div id="popup1">
	<?php //include _templates."gianhang.php"; ?>
</div>
<div id="popup2">
	<?php //include _templates."giohang.php"; ?>
</div>
<div id="popup3">
	<?php //include _templates."dathang.php"; ?>
</div>
<div id="popup4">
	<?php //include _templates."chitietsanpham.php"; ?>
</div>
<div id="popup5">
	<?php //include _templates."mau3d.php"; ?>
</div>
<div style="position: absolute;z-index: 2;top: 0.5em;left: 0.5em;">
	<?php //include _templates."gioithieu.php"; ?>
</div>
<div class="Cart_big" style="position: absolute;
    z-index: 1;
    right: 0.5em;
    top: 0.5em;">
	<a href="javascript:void(0)" class="" onclick="giohang()">
		<img src="./../../template_vr/images/cart_2_1.png" class="icon_giohang" alt="giohang" title="giohang" width="50px;">
		<span  style="position: absolute;top: 25%;right: 35%;color: red;font-size: 1em;font-weight: bold;"><!--<i class="capnhatslsp">0</i>--><!--</span>
	</a>
</div>-->
<?php include _templates."index_pc.php"; ?>
<!--///////////////// js //////////////////// -->
<script src="./../../template_vr/js/main<?php echo $mobile; ?>.js"></script>
<script src="./../../template_vr/js/slick.min.js"></script>
<script src="./../../template_vr/js/bootstrap.min.js"></script>
<script type="text/javascript">
	krpano = document.getElementById("krpanoSWFObject");
	$(document).ready(function(){

	});
	
	$( window ).load(function() {

	});
	function showProduct(){
		

		var sidsm=parseInt(<?php if(isset($_GET['iddm'])){
			echo $_GET['iddm'];
		}else{
			echo "0";
		}?>);
		var sidsp=parseInt(<?php if(isset($_GET['idsp'])){
			echo $_GET['idsp'];
		}else{
			echo "0";
		}?>);

		if(sidsm > 0){
			
			<?php  
				$sql="select * from table_product_danhmuc where id='".$_GET['iddm']."'";
				$d->query($sql);
				$canh=$d->fetch_array();	
			?>

			krpano.call("loadscene(<?php echo $canh['canh'] ?>,null,MERGE,BLEND(1));looktohotspot(<?php echo $canh['lookat'] ?>);");

			if(sidsp > 0){
				var idsp=sidsp;
				chitietsp(parseInt(idsp));
			}
			else{
				var iddm=sidsm;
				gianhang(parseInt(iddm));
			}
		}
	}
	function setButtonKrpano(){
		<?php  
			$sql="select * from table_product_danhmuc where id_place='"._idShowroom."'";
			$d->query($sql);
			$dsdanhmuc=$d->result_array();
			for($i=0;$i<count($dsdanhmuc);$i++){
				if($dsdanhmuc[$i]['lookat']!=""){
					?>
				krpano.call("set(hotspot[<?php echo $dsdanhmuc[$i]['lookat']; ?>].url, <?php echo './../../'._upload_sanpham_l.$dsdanhmuc[$i]['photo_icon']; ?>);");
				krpano.call("set(hotspot[<?php echo $dsdanhmuc[$i]['lookat']; ?>].onclick, js(gianhang(<?php echo $dsdanhmuc[$i]['id']; ?>)))");
				krpano.call("set(hotspot[<?php echo $dsdanhmuc[$i]['lookat']; ?>].onhover, showtext('<?php echo $dsdanhmuc[$i]['ten']; ?>',hotspottextstyle))");

				krpano.call("set(hotspot[<?php echo $dsdanhmuc[$i]['lookat']; ?>].onhover, showtext('<?php echo $dsdanhmuc[$i]['ten']; ?>',hotspottextstyle))");
				<?php if($dsdanhmuc[$i]['hienthi']==1){?>
					krpano.call("set(hotspot[<?php echo $dsdanhmuc[$i]['lookat']; ?>].visible, true");
				<?php }
				else{?>
					krpano.call("set(hotspot[<?php echo $dsdanhmuc[$i]['lookat']; ?>].visible, false");
				<?php } ?>
		<?php }}
		?>	
	}
</script>
<script>
	function CallIframe(){
		parent.reloadPage();
	}
	function capnhatslsp2(){
		parent.capnhatinMainPage();
	}
</script>			

</body>
</html>
