<div class="wrapper"><br>
    	<div class="nopad fixrow">
            <div class="col-xs-6"><img src="images/list.png"> <a href="index"><?php echo _trangchu?></a> &gt; <a href="gioi-thieu"><?php echo _tintuc?></a></div>
            <div class="col-xs-6 t-right"><a href="index.php?com=ngonngu&lang=st">VietNam</a> | <a href="index.php?com=ngonngu&lang=sd">English</a></div>
        </div>
        <div class="clearfix"></div>
        <?php include _template."layout/left.php";?>
        
        <div class="menu-right">
        	<div class="bar"><?php echo _tintuc?></div>
            <div class="clearfix"></div>
            <div class="noidung">
            
            	<?php for($i=0;$i<count($tintuc);$i++){ ?>
                	<div class="item_sp col-md-6 col-sm-6 col-xs-12">
                    	<a href="tin-tuc/<?php echo $tintuc[$i]['tenkhongdau']?>" 
                        title="<?php echo $tintuc[$i]['ten'.$lang]?>">
                        	<div class="img_item_sp col-md-6 col-sm-6 col-xs-12">
                            	<img src="<?php echo _upload_tintuc_l.$tintuc[$i]['thumb']?>" title="<?php echo $tintuc[$i]['ten'.$lang]?>" 
                                alt="<?php echo $tintuc[$i]['ten'.$lang]?>" />
                            </div>
                            
                            <h2 class="name_tt">
                            	<?php echo $tintuc[$i]['ten'.$lang]?>
                            </h2>
                            <h3 class="mota_tt">
                            	<?php echo $tintuc[$i]['mota'.$lang]?>
                            </h3>
                        </a>
                    </div>
                <?php }?>
            </div><!--end noidung -->
			<div class="clearfix"></div>
            
        </div><!--menu right-->
        <div class="clearfix"></div>
    </div>