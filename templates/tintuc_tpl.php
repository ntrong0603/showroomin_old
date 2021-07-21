
<div class="wapper">
	<div class="wapper_left">
    	<?php include _template."layout/left.php";?>
    </div><!--end wapper left-->
    <div class="wapper_right">
    	<div class="banner">
        	<?php include _template."layout/flas.php";?>
            <?php include _template."layout/banner.php";?>		
        </div>
        <div class="wapper_content">
        	<div class="title_wapper">
            	<a class="fleft" href="index"><?php echo _trangchu?> >></a>
                <?php if($title_cat ==''){?>
                <a class="fright" href="tin-tuc"> <h1> <?php echo _tintuc?></h1></a>
                 <?php }?>
                <?php if($title_cat !=''){?>
                	<a class="fright"> <h1> <?php echo $title_cat?></h1></a>
                <?php }?>
                
                <div class="clear"></div>
            </div>
            <div class="noidung">
            	<?php for($i=0;$i<count($place);$i++){ ?>
                	<div class="item_sp col-md-4 col-sm-6 col-xs-12 <?php if(($i+1)%2==0) echo 'item2';
					 elseif(($i+1)%3==0) echo 'item3'; else echo 'item1'; ?>">
                    	<a href="<?php echo $place[$i]['tenkhongdau']?>/<?php echo $place[$i]['id']?>_tt" 
                        title="<?php echo $place[$i]['ten_'.$lang]?>">
                        	<div class="img_item_sp">
                            	<img src="<?php echo _upload_tintuc_l.$place[$i]['thumb']?>" title="<?php echo $place[$i]['ten_'.$lang]?>" 
                                alt="<?php echo $place[$i]['ten_'.$lang]?>" />
                            </div>
                            
                            <h2 class="name_tt">
                            	<?php echo $place[$i]['ten_'.$lang]?>
                            </h2>
                        </a>
                    </div>
                <?php }?>
            </div><!--end noidung -->
        </div>
    </div><!--end wapper right -->
    <div class="clear"></div>
    
   	<?php include _template."layout/slogan.php";?>
    

</div>
