<?php 
	
	$d->reset();
	$sql=" select * from table_news where hienthi = 1 and loaitin = 'tintuc' and noibat =1 order by stt,id limit 0,4";
	$d->query($sql);
	$duan=$d->result_array();
?>
<div id='' class='' >
<div id='' class='col-xs-12' >  
<div class="tintuc_index">
<div class="title_tin">Tin tức rèm cửa</div>
<?php for($i=0;$i<count($duan);$i++){?>

	<div class="item_tin col-lg-6 col-md-6 col-xs-12">
    	<div class="hinh_tin col-lg-4 col-md4 col-xs-4">
		<a href="tin-tuc/<?php echo $duan[$i]['tenkhongdau']?>">
        	<img src="<?php echo _upload_tintuc_l.$duan[$i]['thumb']?>"/>
			</a>
        </div>
        <div class="ten_mota col-lg-8 col-md-8 col-xs-8">
        	<div class="ten_tin">
			<a href="tin-tuc/<?php echo $duan[$i]['tenkhongdau']?>">
            	<?php echo $duan[$i]['ten'.$lang]?>
				</a>
            </div>
            <div class="mota_tin">
            	<?php echo $duan[$i]['mota'.$lang]?>
            </div>
            <div class="xem_tin ">
			<a class='redbold' href="tin-tuc/<?php echo $duan[$i]['tenkhongdau']?>">
            	<?php echo _chitiet?>
				</a>
            </div>
        </div>
    </div>
 
<?php }?>
<div class="clearfix"></div>
</div>            
</div>
  </div>