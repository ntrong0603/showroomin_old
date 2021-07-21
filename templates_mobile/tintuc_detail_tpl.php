<div class="wapper">
	
    <div class="col-lg-9">
    	<div class="banner">
        	<?php include _template."layout/flas.php";?>
            <?php include _template."layout/banner.php";?>		
        </div>
        <div class="wapper_content">
        	<div class="title_wapper">
            	<a class="fleft" href="index"><?php echo _trangchu?> >></a>
                <a class="fright" href=""> <h1><?php echo $tintuc_detail[0]['ten_'.$lang]?></h1></a>
                <div class="clear"></div>
            </div>
            <div class="noidung">
            	 <?php echo $tintuc_detail[0]['noidung_'.$lang]?><br />           
                <div class="othernews">
                     <h2> <?php echo _cacbaikhac?></h2>
                     <ul>          
                        <?php foreach($tintuc_khac as $tinkhac){?>
                        <li>&raquo;&raquo;&nbsp;<a href="<?php echo $tinkhac['tenkhongdau']?>/<?php echo $tinkhac['id']?>_tt" style="text-decoration:none;" title="<?php echo htmlentities($tinkhac['ten'], ENT_QUOTES, "UTF-8")?>"><?php echo $tinkhac['ten_'.$lang]?></a> (<?php echo make_date($tinkhac['ngaytao'])?>)</li>
                        <?php }?>
                     </ul>
                </div>
            </div><!--end noidung -->
        </div>
    </div><!--end wapper right -->
    <div class="col-lg-3">
    	<?php include _template."layout/left.php";?>
    </div><!--end wapper left-->
    <div class="clear"></div>
    
   	<?php include _template."layout/slogan.php";?>
    

</div>
         