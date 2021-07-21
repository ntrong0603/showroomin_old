 <!--planning-->
        <div class="wrap">
	        <div class="container">
                <section>
                	<div class="row pad5">
	                	<div class="col-lg-9">
                    		<div class="headduan">
                    		<h1><?php echo $chitietsanpham['ten'];?></h1>
		                        	<p>Địa chỉ: <?php echo $chitietsanpham['diadiem'].', '.diachi($chitietsanpham['id_tinh'],$chitietsanpham['id_huyen'],$chitietsanpham['id_phuong']);?></p>
		                        	<span class=" label label-warning">Giá thuê: <?php echo chuyentien($chitietsanpham['gia']);?> VNĐ/<?php if( $chitietsanpham['giacu']==0 ){echo "tháng";}else{echo "m2";}?></span>
										
		                        	 <span class="label label-success">66m2</span>
		                        </div>
                        	<div class="hinhanh">
	                        	
	                        	<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:480px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position:absolute;top:0px;left:0px;background:url('img/loading.gif') no-repeat 50% 50%;background-color:rgba(0, 0, 0, 0.7);"></div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:370px;overflow:hidden;">
           
             <?php for ($i=0;$i<count($hinhsp);$i++){?>
			<div>
                <img data-u="image" src="upload/sanpham/<?php echo $hinhsp[$i]['photo'];?>" alt="<?php echo $chitietsanpham['ten'];?>" />
                <img data-u="thumb" src="upload/sanpham/<?php echo $hinhsp[$i]['photo'];?>" alt="<?php echo $chitietsanpham['ten'];?>"/>
            </div>
			<?php } ?>
            <a data-u="any" href="https://www.jssor.com" style="display:none">bootstrap slider</a>
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort051" style="position:absolute;left:0px;bottom:0px;width:980px;height:90px;" data-autocenter="1" data-scale-bottom="0.75">
            <div data-u="slides">
                <div data-u="prototype" class="p" style="width:200px;height:100px;">
                    <div data-u="thumbnailtemplate" class="t"></div>
                </div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:162px;left:30px;" data-scale="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:162px;right:30px;" data-scale="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
            </svg>
        </div>
    </div>
                        	</div>
	                        	<div class="col-lg-12 info_duan">
		                        	
		                        	<div class="moreinfo">Thông tin liên hệ</div>
		                        	<!--<button class="datmua"><span class="label label-primary">Liên hệ tư vấn</span></button>-->
		                        	<form id="formdatmua" action="/lien-he/#wpcf7-f689-p25-o1" method="post" class="wpcf7-form" novalidate="novalidate">

<div class="form_1_2">
<span class="fullname"><input type="text" name="first-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="First Name *"></span>
</div>

<div class="clear"></div>
<div class="form_1_2">
<span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Your Email *"></span>
</div>
<div class="form_1_2 last">
<span class="wpcf7-form-control-wrap tel-879"><input type="tel" name="tel-879" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" placeholder="Your Phone Number *"></span>
</div>
<div class="clear"></div>

<p><input type="submit" value="Gửi liên hệ" class="wpcf7-form-control wpcf7-submit btn btn-large btn-secondary"><img class="ajax-loader" src="http://apolatlegal.com/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Đang gửi ..." style="visibility: hidden;"></p>
<div class="wpcf7-response-output wpcf7-display-none"></div></form>



	                        	</div>
                    	
								
								<div class="col-lg-12 chitietduan"><h2>Mô tả chi tiết</h2>
								     <?php echo stripslashes($chitietsanpham['mota']);?>
								 <div id='' class='clearfix' >  </div>
								 
								  
                                
											
										  </div>
										  
										  
										  <div class="lcol-lg-12 list duanlienquan">
											<h3><a href='./cho-thue/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$chitietsanpham['id_tinh']);?>.html' alt='Nhà đất cho thuê <?php echo diachi($chitietsanpham['id_tinh'],0,0);?>' >Nhà đất cho thuê <?php echo diachi($chitietsanpham['id_tinh'],0,0);?></a></h3>
	                            	<div class="post">
                        	<?php if(count($chothue)>=6){$cou=6;}else{$cou=count($chothue);} for($i=0; $i<$cou;$i++){?>
                        <div class="col-lg-6">
				<div class="item_nhadat">
          <div class="img_nhadat"><a class="" href="cho-thue/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$chothue[$i]['id_tinh']);?>/<?php echo $chothue[$i]['tenkhongdau'];?>-<?php echo $chothue[$i]['id'];?>.html" >
		  
		  <img class="img-thongtin" src="./upload/chothue/<?php echo $chothue[$i]['photo'];?>" alt="<?php echo $chothue[$i]['ten'];?>"></a></div>
          <div class="nd_nhadat">
          	<a class="" href="cho-thue/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$chothue[$i]['id_tinh']);?>/<?php echo $chothue[$i]['tenkhongdau'];?>-<?php echo $chothue[$i]['id'];?>.html" ><h2><?php echo $chothue[$i]['ten'];?></h2></a>
		  	<span class="label label-success size16"><?php echo $chothue[$i]['dientich'];?>m2</span>
		  	<span class="label label-warning  size16"><?php echo chuyentien($chothue[$i]['gia']);?> /<?php if( $chothue[$i]['giacu']==0 ){echo "tháng";}else{echo "m2";}?></span>
		  	<div class="khuvuc"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><?php echo $chothue[$i]['diadiem'].', '.diachi($chothue[$i]['id_tinh'],$chothue[$i]['id_huyen'],$chothue[$i]['id_phuong']);?></div>
		  	<div class="times"><?php echo "Ngày ".date("d",$chothue[$i]['ngaytao'])." tháng ".date("m",$chothue[$i]['ngaytao'])." năm ".date("Y",$chothue[$i]['ngaytao']);?></div><div class="clearfix"></div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          
          </div></div>
		  <?php if ($i%2==1){ ?>
									 <div class="clearfix"></div>
								<?php } ?>
							<?php } ?>
		 
		 
		
		 
		 
		 
			<div class="lcol-lg-12 list duanlienquan">
											  <h3>Phòng trọ cho thuê cùng khu vực</h3>
	                            	<div class="post">
                        
                        <div class="col-lg-6">
				<div class="item_nhadat">
          <div class="img_nhadat"><a class="" href="#" ><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a></div>
          <div class="nd_nhadat">
          	<a class="" href="#" ><h2>Heading</h2></a>
		  	<span class="label label-success size16">62m2</span>
		  	<span class="label label-warning  size16">6 triệu / tháng</span>
		  	<div class="khuvuc"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>123 điện biên phủ, Quận 3, TP.HCM</div>
		  	<div class="times">Ngày 3 tháng 8 năm 2017</div><div class="clearfix"></div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          
          </div></div>
          <div class="col-lg-6">
				<div class="item_nhadat">
          <div class="img_nhadat"><a class="" href="#" ><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a></div>
          <div class="nd_nhadat">
          	<a class="" href="#" ><h2>Heading</h2></a>
		  	<span class="label label-success size16">62m2</span>
		  	<span class="label label-warning  size16">6 triệu / tháng</span>
		  	<div class="khuvuc"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>123 điện biên phủ, Quận 3, TP.HCM</div>
		  	<div class="times">Ngày 3 tháng 8 năm 2017</div><div class="clearfix"></div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          
          </div></div>
          <div class="col-lg-6">
				<div class="item_nhadat">
          <div class="img_nhadat"><a class="" href="#" ><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a></div>
          <div class="nd_nhadat">
          	<a class="" href="#" ><h2>Heading</h2></a>
		  	<span class="label label-success size16">62m2</span>
		  	<span class="label label-warning  size16">6 triệu / tháng</span>
		  	<div class="khuvuc"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>123 điện biên phủ, Quận 3, TP.HCM</div>
		  	<div class="times">Ngày 3 tháng 8 năm 2017</div><div class="clearfix"></div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          
          </div></div>
          <div class="col-lg-6">
				<div class="item_nhadat">
          <div class="img_nhadat"><a class="" href="#" ><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a></div>
          <div class="nd_nhadat">
          	<a class="" href="#" ><h2>Heading</h2></a>
		  	<span class="label label-success size16">62m2</span>
		  	<span class="label label-warning  size16">6 triệu / tháng</span>
		  	<div class="khuvuc"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>123 điện biên phủ, Quận 3, TP.HCM</div>
		  	<div class="times">Ngày 3 tháng 8 năm 2017</div><div class="clearfix"></div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          
          </div>
			</div>
			<div class="col-lg-6">
				<div class="item_nhadat">
          <div class="img_nhadat"><a class="" href="#" ><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a></div>
          <div class="nd_nhadat">
          	<a class="" href="#" ><h2>Heading</h2></a>
		  	<span class="label label-success size16">62m2</span>
		  	<span class="label label-warning  size16">6 triệu / tháng</span>
		  	<div class="khuvuc"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>123 điện biên phủ, Quận 3, TP.HCM</div>
		  	<div class="times">Ngày 3 tháng 8 năm 2017</div><div class="clearfix"></div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          
          </div>
			</div>
			<div class="col-lg-6">
				<div class="item_nhadat">
          <div class="img_nhadat"><a class="" href="#" ><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a></div>
          <div class="nd_nhadat">
          	<a class="" href="#" ><h2>Heading</h2></a>
		  	<span class="label label-success size16">62m2</span>
		  	<span class="label label-warning  size16">6 triệu / tháng</span>
		  	<div class="khuvuc"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>123 điện biên phủ, Quận 3, TP.HCM</div>
		  	<div class="times">Ngày 3 tháng 8 năm 2017</div><div class="clearfix"></div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          
          </div>
			</div></div></div>
										  
										  <div class="lcol-lg-12 list danhgialienquan">
											  
											  <div class="row row-content danhgiabds">
		<div class="wpb_wrapper">
				<div class="col-lg-12 headdanhgia"><h2>Bài đánh giá về dự án và khu vực này</h2></div>
				<div class="col-lg-6">
          <div class="col-lg-2 image-tin"><a class="" href="#"><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a></div><a class="" href="#">
          </a><div class="col-lg-10 noidungtin"><a class="" href="#">
          </a><a class="" href="#"><h2>Heading</h2></a>
          <div class="khuvucdanhgia"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Khu vực Quận 9</div>
          <div class="times">Ngày 3 tháng 8 năm 2017</div>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
          
          </div>
        </div><!-- /.col-lg-12 -->
        <div class="col-lg-6">
          <div class="col-lg-2 image-tin"><a class="" href="#"><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a></div>
          <div class="col-lg-10 noidungtin">
          <a class="" href="#"><h2>Heading</h2></a>
          <div class="khuvucdanhgia"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Khu vực Quận 9</div>
          <div class="times">Ngày 3 tháng 8 năm 2017</div>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
          
          </div>
        </div><!-- /.col-lg-12 -->
        <div class="col-lg-6">
          <div class="col-lg-2 image-tin"><a class="" href="#"><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a></div>
          <div class="col-lg-10 noidungtin">
          <a class="" href="#"><h2>Heading</h2></a>
          <div class="khuvucdanhgia"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Khu vực Quận 9</div>
          <div class="times">Ngày 3 tháng 8 năm 2017</div>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
          
          </div>
        </div><!-- /.col-lg-12 -->
        <div class="col-lg-6">
          <div class="col-lg-2 image-tin"><a class="" href="#"><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a></div>
          <div class="col-lg-10 noidungtin">
          <a class="" href="#"><h2>Heading</h2></a>
          <div class="khuvucdanhgia"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Khu vực Quận 9</div>
          <div class="times">Ngày 3 tháng 8 năm 2017</div>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
          
          </div>
        </div><!-- /.col-lg-12 -->
</div>
			</div>
						</div>				  
							
						</div></div></div>
						<div class="col-lg-3">
                        	 <?php include _template."layout/left.php";?>           
                        </div>
       
                           
                    </div>
                    	                	
                	
                </section>
            </div>
            
        </div>
        
        
        <!--Latest news-->
        <div class="wrap block">
        	<div class="container">
        		
        	</div>
        </div>
        <!--Latest news-->
        
        <!--latest posts-->
		 <?php include _template."layout/new.php";?>   
             
        <!--//latest posts--> 
        