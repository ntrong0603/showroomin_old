<?php 
	
	$d->reset();
	$sql="select * from #_congty order by id desc";
	$d->query($sql);
	$congty=$d->result_array();
	


?>
<div class="wrap">

          
<div class="col-md-12 nopad">
    	<ul id="scroller">
        	<?php for($i=0;$i<count($congty);$i++){ ?>
           		<li><a href="<?php echo $congty[$i]['link']?>">  <img src="<?php echo _upload_hinhanh_l.$congty[$i]['photo']?>" /></a></li>
            <?php } ?>
                        
                    </ul>
</div>
<div class="clearfix"></div>    
</div>