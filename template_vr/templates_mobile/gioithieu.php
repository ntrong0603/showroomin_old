<style>
.menu_gioithieu{
	display: block;
	color: white;
	background-color: green;
	position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    animation: c_animationDanhMuc 1s;
    animation-fill-mode: forwards;
    
}
.active_menuGioiThieu{
	animation: o_animationDanhMuc 1s;
	animation-fill-mode: forwards;
}
@keyframes o_animationDanhMuc{
	0%{
		left:-120vw;
	}
	100%{
		left:0vw;
	}
}
@keyframes c_animationDanhMuc{
	0%{
		left:0vw;
	}
	100%{
		left:-120vw;
	}
}
.menu_gioithieu li{
	list-style: none;

}

.menu_gioithieu li a{
	text-decoration: none;
    font-weight: 500;
    color: white;
    padding: 10px 30px;
        display: block;
}
.menu_gioithieu ul{
	margin: 0px;
	padding: 0px;
    width: max-content;
    width: intrinsic;
    width: -moz-max-content;
    width: -webkit-max-content;
    min-width: 100vw;
    overflow: auto;
	height: 90vh;
}
.menu_gioithieu li:hover{
	background-color: white;
}
.menu_gioithieu li:hover a{
	color: green;
}
.content_gioithieu{
	width: 80vw;
    position: absolute;
	height: 80vh;
    background-color: rgba(0, 0, 0, 0.6);	
    left: 0px;
    top: 2.8em;
    overflow: auto;
    padding: 1em 1em;
    display: none;
    color: white !important;
}
</style>
<script>
	$(document).ready(function(){
		setWidthContentMenu();
	});
	function setWidthContentMenu(){
		var widthBrowser=$(document).width();
		var returnWidthBrowser=(widthBrowser*93)/100;
		$(".content_gioithieu").css({"width": returnWidthBrowser});
	}
</script>
<div class="Menu_big" style="float: left;">
	<a href="javascript:void(0)" class="icon_menu_gioithieu"><img src="./../../template_vr/images/menu.png" alt="menu" title="menu" width="50px;"></a>
</div>
<div class="menu_gioithieu" style="">
	<div style="text-align: center;
    padding: 15px;
    border-bottom: 1px solid;
    font-size: 15px;
    font-weight: bold;
    position: relative;">
		<span>DANH MỤC SẢN PHẨM</span>
		<a style="    position: absolute;
    right: 0px;
    top: 0;
    display: block;
    color: white;
    background: green;
    padding: 15px 20px;
    border-left: 1px solid white;
    border-radius: 0px 10px 10px 0px;" class="icon_menu_gioithieu" href="javascript:void(0)">X</a>
	</div>
	<div>
		<ul class="fix-scorll-ball" style="">
			<?php  
				$sql="select * from table_product_danhmuc where id_place='"._idShowroom."'";
				$d->query($sql);
				$dsdanhmuc=$d->result_array();
				for($i=0;$i<count($dsdanhmuc);$i++){?>
			<li class="danhmucmenu">
				<a href="javascript:void(0)" onclick='gianhang(<?php echo $dsdanhmuc[$i]['id']; ?>)'><?php echo $dsdanhmuc[$i]['ten']; ?></a>
			</li>
			<?php }?>
		</ul>
	</div>
</div>

<!--<?php 
	$sql="select * from table_news where id_place='"._idShowroom."' and hienthi =1 order by stt asc, id desc";
	$d->query($sql);
	$result_menu=$d->result_array();
?>
<div class="menu_gioithieu" style="background-color: white;width: max-content;float: left;">
	<ul style="margin: 0px;padding: 0px;">
		<?php for($i=0;$i<count($result_menu);$i++){
			?>
		<li class="danhmucmenu">
			<a href="javascript:void(0)"><?php echo $result_menu[$i]['ten']; ?></a>
			<div class="content_gioithieu fix-scorll-ball">
				<?php echo $result_menu[$i]['noidung']; ?>
			</div>
		</li>
		<?php }?>
	</ul>
</div>-->
<div class="clearfix"></div>