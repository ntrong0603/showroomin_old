<?php 
	
	$d->reset();
$d->setTable('quangcao');
$d->setWhere('id',42);
$d->select();
$qc_left=$d->fetch_array();

$d->reset();
$d->setTable('quangcao');
$d->setWhere('id',45);
$d->select();
$qc_right=$d->fetch_array();

$d->reset();
$d->setTable('quangcao');
$d->setWhere('id',43);
$d->select();
$qc_midle_top=$d->fetch_array();

$d->reset();
$d->setTable('quangcao');
$d->setWhere('id',44);
$d->select();
$qc_midle_bottom=$d->fetch_array();
?>

<div class="quangcao">
	<div class="qc_left qc col-md-4 col-xs-12">
    <a href="<?php echo $qc_left['mota'] ?>" target="_blank">
    	<div class="mang"></div>
    	
        	<img src="<?php echo _upload_hinhanh_l.$qc_left['photo'] ?>"/>
        </a>
    </div>
    <div class="qc_middle qc1 col-md-4 col-xs-12">
    <div class="qc">
    <a href="<?php echo $qc_midle_top['mota'] ?>"  target="_blank">
    <div class="mang"></div>
    	
        	<img src="<?php echo _upload_hinhanh_l.$qc_midle_top['photo'] ?>"/>
        </a>
     </div>
     <div class="qc">
     <a href="<?php echo $qc_midle_bottom['mota'] ?>"  target="_blank">
     <div class="mang"></div>
        
        	<img src="<?php echo _upload_hinhanh_l.$qc_midle_bottom['photo'] ?>"/>
        </a>
    </div>
    </div>
    <div class="qc_right qc col-md-4 col-xs-12">
    <a href="<?php echo $qc_right['mota'] ?>"  target="_blank">
    <div class="mang"></div>
    	
        	<img src="<?php echo _upload_hinhanh_l.$qc_right['photo'] ?>"/>
        </a>
    </div>
    
</div>