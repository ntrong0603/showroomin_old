<div class="wrapper_content"><br>
    	
        <div class="clearfix"></div>
        <div class="col-md-1"></div>
        <div class="col-md-10 col-xs-12  " >
            <div class="col-xs-7 pro_del">
                
                   <img src="<?php echo _upload_sanpham_l.$chitietsanpham['thumb']?>" />
                 
                
            </div>
			<div class="col-xs-offset-1 col-xs-4">
                <h1 style="font-size:20px;color:#23527C;margin-bottom:10px;" ><?php echo $chitietsanpham['ten'.$lang];?></h1>
                <h3 class="pa"><span><?php echo _masp?>: </span><?php echo $chitietsanpham['kichthuoc'];?></h3>
                <h3 class="pa"><span><?php echo _gia?>: </span> <span class="red"><?php if($chitietsanpham['gia']!='')
						echo number_format($chitietsanpham['gia'],0, ',', '.').' VNĐ';else echo _lienhe ; ?> </span>
                </h3>
                <div class="mota"><?php echo $chitietsanpham['mota'.$lang];?></div>
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style" style="float:left;">
                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                    <a class="addthis_button_tweet"></a>
                    <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                    <a class="addthis_counter addthis_pill_style"></a>
                </div>
                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=undefined"></script>
                
                    <!-- AddThis Button END -->
                    <div class="clearfix"></div>
                 <a class="tt-similar" style="display:block; margin-top:10px;" href="lien-he"><?php echo _lienhe?></a>   
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-12 nopad">
            <div role="tabpanel" class="tabpanel">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs tab" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><strong><?php echo _thongsosanpham?></strong></a></li>
                
              </ul>
            
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <?php echo stripslashes($chitietsanpham['noidung'.$lang])?>
                </div>
                
              </div>
            
            </div>
    </div><!--detail-->
       </div>
            
       
        
         <div class="clearfix"></div>
    
    </div>


