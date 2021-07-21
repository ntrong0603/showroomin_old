
<div id="hotro" class="cao" style="position:fixed;bottom:0px; left:10px; width:170px;background:#fff;z-index:999;box-shadow:0 0 3px #666;">
<div style="background:#dfdede; padding-bottom:10px;">
<div style="background:url(images/thanhhotro.png) bottom center no-repeat;padding-bottom:5px;text-align:center;padding-top:10px; text-transform:uppercase;font-weight:bold; cursor:pointer">
<?php echo _hotrotructuyen?>
</div>
<?php 
$d->reset();
	$sql_hotro="SELECT id,ten,dienthoai,yahoo,skype FROM #_yahoo WHERE hienthi=1 ORDER BY stt,id DESC";
	$d->query($sql_hotro);
	$hotro=$d->result_array();
	
$d->reset();
	$sql_phone="select dienthoai,email from #_hotline";
	$d->query($sql_phone);
	$phone=$d->fetch_array();
	

?>
<?php for($i=0;$i<count($hotro);$i++){ ?>
<div style="padding:5px 10px;height:35px; line-height:35px;">
<span style="float:left;"><?php echo $hotro[$i]['ten']?></span>
<a href="ymsgr:sendIM?<?php echo $hotro[$i]['yahoo']?>"><img src="images/yahoo.png" /></a>
   <a href="ymsgr:sendIM?<?php echo $hotro[$i]['skype']?>"><img src="images/sky.png" /></a>
</div>
<?php }?>
</div>
<div style="height:24px;line-height:24px;padding:10px;"><img src="images/phone.png" style="float:left;margin-right:15px;" /><span style="color:#F00;font-weight:bold;">HOTLINE</span></div>
<div style="margin:0px 20px; font-weight:bold;"><?php echo $phone['dienthoai']?></div>
</div>