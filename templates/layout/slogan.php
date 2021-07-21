<?php 
	
	$d->reset();
	$sql_banner_giua = "select * from #_hotline";
	$d->query($sql_banner_giua);
	$slogan = $d->result_array();
	
?>
<div class="slogan ">
<div class="container1">
	<div class="col-lg-5 col-xs-12">
        <MARQUEE scrolldelay="150"> 
        <?php echo $slogan[0]['slogan'.$lang]?>
        </MARQUEE>
    </div>
    <div class="col-lg-5 col-lg-offset-2 col-xs-12">
        <MARQUEE scrolldelay="150"> 
        Địa chỉ:  
        <?php echo $slogan[0]['diachi']?>
        </MARQUEE>
   </div>
</div>
<div class="clearfix"></div>
</div>
            