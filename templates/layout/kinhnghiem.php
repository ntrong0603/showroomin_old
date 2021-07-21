<?php
	$d->reset();
	$sql="select * from table_news where loaitin = 'kinhnghiem' and hienthi = 1 and noibat =1 order by stt,id limit 0,4";
	$d->query($sql);
	$dm_km = $d->result_array();
	?>
<div class="title_kinhnghiem">
Kinh nghiệm
</div>
<div class="content_kinhnghiem">
<div class="img_kinhnghiem">
	<img src="<?php echo _upload_tintuc_l.$dm_km[0]['thumb']?>" />
</div>
<div class="wap_km">
	<a href="kinh-nghiem/<?php echo $dm_km[0]['tenkhongdau']?>">
	<div class="item_km1">
    	<h2 class="name_km1">
        <?php echo $dm_km[0]['ten']?>
        </h2>
        <h3 class="mota_km1">
        <?php echo $dm_km[0]['mota']?>
        </h3>
    </div>
    </a>
    <?php for($i=1;$i<count($dm_km);$i++){ ?>
    <a href="kinh-nghiem/<?php echo $dm_km[$i]['tenkhongdau']?>">
    	<div class="item_km">
        <?php echo $dm_km[$i]['ten']?>
        </div>
    </a>
    <?php }?>
</div><!--end wap km -->
<div class="clear"></div>
</div>