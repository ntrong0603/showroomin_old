<div class="wrapper_content"><br>
    	
        <div class="clearfix"></div>
        
        <div class="col-md-8 col-xs-12 " >
            <div class="col-xs-7">
                
                   <img src="<?php echo _upload_tintuc_l.$chitietsanpham['thumb']?>" />
                 
                
            </div>
			<div class="col-xs-offset-1 col-xs-4">
                <h1 style="font-size:20px;color:#23527C;margin-bottom:10px;" ><?php echo $chitietsanpham['ten'.$lang];?></h1>
               
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
            
       
        <div class="col-md-3 col-md-offset-1 col-xs-12 similar nopad">
        <div class="tt-similar"><?php echo _sanphamcungloai?></div>
        <?php for($i=0;$i<count($sanpham);$i++){
			$id_danhmuc = $sanpham[$i]['id_danhmuc'];
			
			$sql = "select * from #_place_danhmuc where hienthi=1 and id='$id_danhmuc'";
			$d->query($sql);
			$row_danhmuc = $d->fetch_array();
			?>
        	<div class="sp">
            <a href="<?php if($row_danhmuc['tenkhongdau'] != ''){ echo $row_danhmuc['tenkhongdau'];} else{ echo 'san-pham-1'; }?>/<?php echo $sanpham[$i]['tenkhongdau']; ?>">
            <img src="<?php echo _upload_sanpham_l.$sanpham[$i]['thumb']?>">
            <div class="clearfix"></div>
            <strong><?php echo $sanpham[$i]['ten'.$lang]?></strong>
            </a>
        	</div>
        <?php }?>
        
         
    </div><!--san pham lien quan-->
        
         <div class="clearfix"></div>
    
    </div>


