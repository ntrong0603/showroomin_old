<style>
.menu_gioithieu{
	display: none;
	margin-top: 0.4em;
	font-family: myriad_pro;
	float: left;
}
.menu_gioithieu li{
	list-style: none;
    float: left;
    padding: 7.5px 30px;
    position: relative;
    background-color: #00a838;
	margin:0px 1px;
}
.menu_gioithieu li a{
	text-decoration: none;
    color: white;
}
.menu_gioithieu li:hover{
	background-color: white;
}
.menu_gioithieu li:hover a{
	color: #00a838;
}
.content_gioithieu{
	width: 500px;
    position: absolute;
	max-height: 15em;
    background-color: rgba(0, 0, 0, 0.6);	
    left: 0px;
    top: 2.4em;
    overflow: auto;
    padding: 1em 1em;
    display: none;
    color: white !important;
}
</style>
<div style="float: left;">
	<a href="javascript:void(0)" class="icon_menu_gioithieu"><img src="./../../template_vr/images/menu.png" alt="menu" title="menu" width="50px;"></a>
</div>
<?php 
	$sql="select * from table_news where id_place='"._idShowroom."' and hienthi =1 order by stt asc, id desc";
	$d->query($sql);
	$result_menu=$d->result_array();
?>
<div class="menu_gioithieu" style="">
	<ul style="margin: 0px;padding: 0px;">
		<?php for($i=0;$i<count($result_menu);$i++){
			?>
		<li class="danhmucmenu" onclick="toggelMenu()">
			<a href="javascript:void(0)"><?php echo $result_menu[$i]['ten']; ?></a>
			<div class="content_gioithieu fix-scorll-ball">
				<?php echo $result_menu[$i]['noidung']; ?>
			</div>
		</li>
		<?php }?>
	</ul>
</div>
<div class="clearfix"></div>