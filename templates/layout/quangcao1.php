<?php
	$d->reset();
	$sql_banner_giua = "select * from #_quangcao where id=36  order by id desc";
	$d->query($sql_banner_giua);
	$qc1 = $d->result_array();
	
	$d->reset();
	$sql_banner_giua = "select * from #_quangcao where id=35  order by id desc";
	$d->query($sql_banner_giua);
	$qc2 = $d->result_array();
	
	$d->reset();
	$sql_banner_giua = "select * from #_quangcao where id=34  order by id desc";
	$d->query($sql_banner_giua);
	$qc3 = $d->result_array();
	

	
	
?>
<div class="wrap">
    	<div class="col-md-7 nopad quangcao">
        <a href="<?php echo $qc1[0]['mota']?>">
        	<img src="<?php echo _upload_hinhanh_l.$qc1[0]['photo']?>" class="img1">
			<input type="button" value="Đặt tour ngay" class="btndattour">
        </a>    
        </div>
        <div class="col-md-5 pal">
        <a href="<?php echo $qc2[0]['mota']?>">
        	<img src="<?php echo _upload_hinhanh_l.$qc2[0]['photo']?>" class="img1">
        </a>
        </div>
        <div class="col-md-5 pal pal2">
        <a href="<?php echo $qc3[0]['mota']?>">
        	<img src="<?php echo _upload_hinhanh_l.$qc3[0]['photo']?>" class="img1">
        </a>
        </div>
</div>
