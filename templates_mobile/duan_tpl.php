
<div class="wap_left">
	
	<div class="duan_nb">
   	<div class="bar"><a href="index"> Tranh chủ >    </a> <h1>&nbsp;  <?php echo $title_ba; ?></h1></div>
    <div class="clear"></div>
    	<?php include _template."layout/duan.php";?>
    </div><!--end du an noi bat -->
    <div class="ds_nb">
        <div class="title_left">
           Dự án bất động sản
            <a href="nha-xuong" class="xem">Xem thêm >></a>
        </div>
        <div class="wap_duan">
        	<?php for($i=0;$i<count($tintuc);$i++){ ?>
                	<div class="item_sp ">
                    	<a href="./<?php echo $tintuc[$i]['tenkhongdau']?>" 
                        title="<?php echo $tintuc[$i]['ten'.$lang]?>">
                        	<div class="img_item_sp ">
                            	<img src="<?php echo _upload_tintuc_l.$tintuc[$i]['thumb']?>" title="<?php echo $tintuc[$i]['ten']?>" 
                                alt="<?php echo $tintuc[$i]['ten']?>" />
                            </div>
                            
                            <h2 class="name_tt">
                            	<?php echo $tintuc[$i]['ten']?>
                            </h2>
                            <div class="name_tt">
                            <?php 
							$d->reset();
							$d->setTable('tinhthanh_danhmuc');
							$d->setWhere('id',$tintuc[$i]['id_tinh']);
							$d->select();
							$tinh=$d->fetch_array();
							$d->reset();
							$d->setTable('tinhthanh_list');
							$d->setWhere('id',$tintuc[$i]['id_huyen']);
							$d->select();
							$huyen=$d->fetch_array();
							?>
                            	<?php echo $tintuc[$i]['diachi']?> <?php echo $huyen['ten']?> <?php echo $tinh['ten']?>
                            </div>
                            <h3 class="mota_tt">
                            	<?php echo $tintuc[$i]['mota']?>
                            </h3>
                            <span class="date_time"><?php echo make_date($tintuc[$i]['ngaytao'])?></span>
                        </a>
                        <div class="clear"></div>
                    </div>
                <?php }?>
            <div class="clear"></div>
        </div>
    </div><!--end dong san noi bat -->
    
</div><!--end wap left -->