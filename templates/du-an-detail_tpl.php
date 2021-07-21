 <!--planning-->
<div class="wrap">
	<div class="container">
        <section>
            <div class="row pad5">
	            <div class="col-lg-9">
                    <div class="headduan">
                    	<h1><?php echo $chitietsanpham['ten'];?></h1>
		                <p class="textkhuvuc">Khu vực: <?php echo diachi($chitietsanpham['id_tinh'],$chitietsanpham['id_huyen'],0);?></p>
		                <span class="giadetail label label-warning">Giá từ <?php echo chuyentien($chitietsanpham['gia']);?></span>
		            </div>
                    <div class="hinhanh">
	                    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:680px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position:absolute;top:0px;left:0px;background:url('img/loading.gif') no-repeat 50% 50%;background-color:rgba(0, 0, 0, 0.7);"></div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:570px;overflow:hidden;">
			<?php for ($i=0;$i<count($hinhsp);$i++){?>           
		   <div>
                <img data-u="image" src="upload/sanpham/<?php echo $hinhsp[$i]['photo'];?>" />
                <img data-u="thumb" src="upload/sanpham/<?php echo $hinhsp[$i]['photo'];?>" />
            </div>
			<?php } ?>
            
            <a data-u="any" href="https://www.jssor.com" style="display:none">bootstrap slider</a>
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort051" style="position:absolute;left:0px;bottom:5px;width:980px;height:90px;" data-autocenter="1" data-scale-bottom="0.75">
            <div data-u="slides">
                <div data-u="prototype" class="p" style="width:200px;height:100px;">
                    <div data-u="thumbnailtemplate" class="t"></div>
                </div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:262px;left:0px;" data-scale="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:262px;right:0px;" data-scale="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
            </svg>
        </div>
    </div>
                </div>
	                <div class="col-lg-12 info_duan">
		                        	
		                        	<!--<div class="moreinfo">Thông tin thêm</div>-->
		                        	<!--<button class="datmua"><span class="label label-primary">Liên hệ tư vấn</span></button>
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
<div class="wpcf7-response-output wpcf7-display-none"></div></form>-->



	                        	</div>
                    	
								
								<div class="col-lg-12 chitietduan"><h2>Mô tả chi tiết</h2>
							
                                 <?php echo stripslashes($chitietsanpham['mota']);?>
								 <div id='' class='clearfix' >  </div>
								 
								  
                                <div class="tabbable" id='tabthongtin' style="margin-bottom: 9px;">
									<ul class="nav nav-tabs">
										<li class="vitri active"><a href="#tongquan" data-toggle="tab"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>Tổng quan</a></li>
										<li class="vitri"><a href="#vitri" data-toggle="tab"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Vị trí</a></li>
										<li class="vitri"><a href="#tienich" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Tiện ích</a></li>
										<li class="vitri"><a href="#matbang" data-toggle="tab"><span class="glyphicon glyphicon-signal" aria-hidden="true"></span>Mặt bằng</a></li>
										<li class="vitri"><a href="#canhomau" data-toggle="tab"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Căn hộ mẫu</a></li>
										<li class="vitri"><a href="#huongview" data-toggle="tab"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>Các hướng View</a></li>
										<li class="vitri"><a href="#nhadautu" data-toggle="tab"><span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span>Nhà thầu</a></li>
										<li class="vitri"><a href="#danhgia" data-toggle="tab"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>Đánh giá</a></li>
										
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="tongquan">
											<h4>Tổng Quan</h4>
											<div>
												<?php echo $chitietsanpham['noidung'];?>
											</div>
										</div>
										<div class="tab-pane " id="vitri">
											<h4>Vị trí</h4>
											<div>
												<?php echo $chitietsanpham['vitri'];?>
											</div>
										</div>
										<div class="tab-pane " id="tienich">
											<h4>Tiện ích</h4>
											<div>
												<?php echo $chitietsanpham['tienich'];?>
											</div>
										</div>
										<div class="tab-pane " id="matbang">
											<h4>Mặt bằng</h4>
											<div>
												<?php echo $chitietsanpham['matbang'];?>
											</div>
										</div>
										<div class="tab-pane " id="canhomau">
											<h4>Căn hộ mẫu</h4>
											<div>
												<?php echo $chitietsanpham['canhomau'];?>
											</div>
										</div>
										<div class="tab-pane " id="huongview">
											<h4>Các hướng view</h4>
											<div>
												<?php echo $chitietsanpham['cachuongview'];?>
											</div>
										</div>
										<div class="tab-pane " id="nhadautu">
											<h4>Nhà đầu tư</h4>
											<div>
												<?php echo $chitietsanpham['nhadautu'];?>
											</div>
										</div>
										<div class="tab-pane " id="danhgia">
											<h4>Đánh giá</h4>
											<div>
												<?php echo $chitietsanpham['danhgia'];?>
											</div>
										</div>
										<!--<div class="tab-pane" id="2">
											<h4>Reviews</h4>
											<div id="reviews">
												
												<?php for($i=0;$i<count($review);$i++){?>
												<div class="review">
													<p><a href='javascript:{}'><span class="tour_name"><?php echo $review[$i]['ten'];?></span></a></p>
													<p class="review_content">
															
													</p>
												</div>
													<?php } ?>
											                      
												<h4>Leave a comment</h4>
												<form action="#" method="post">
													<input class="span5" type="text" name="name" value="Name" onFocus="if (this.value == 'Name') this.value = '';" onBlur="if (this.value == '') this.value = 'Name';" />
													<input class="span5" type="text" name="mail" value="Email" onFocus="if (this.value == 'Email') this.value = '';" onBlur="if (this.value == '') this.value = 'Email';" />
													<textarea name="message" class="span7" onFocus="if (this.value == 'Message...') this.value = '';" onBlur="if (this.value == '') this.value = 'Message...';" >Message...</textarea>
													<div class="clear"></div>
													<input type="reset" class="btn dark_btn" value="Clear form" />
													<input type="submit" class="btn send_btn" value="Post Comment" />
													<div class="clear"></div>
												</form>
												
											  </div>
											  <div class="tab-pane" id="1">
												<div style="width:100%;height:32px;clear:both;"><div class="span1 titledate">Start dates</div><div class="span1 titledate">End dates</div><div class="span4 titledate">Notes</div></div>
												
												
											  </div>
											  
											  
											</div>-->
											
									</div></div>
										  
										  <div class="lcol-lg-12 list danhgialienquan">
											  
											  <!--<div class="row row-content danhgiabds">
		<div class="wpb_wrapper">
				<div class="col-lg-12 headdanhgia"><h2>Bài đánh giá về dự án và khu vực này</h2></div>
				<div class="col-lg-6">
          <div class="col-lg-2 image-tin"><a class="" href="#"><img class="img-thongtin" src="./images/du-an-richmond-1.jpg" alt="Generic placeholder image"></a></div><a class="" href="#">
          </a><div class="col-lg-10 noidungtin"><a class="" href="#">
          </a><a class="" href="#"><h2>Heading</h2></a>
          <div class="khuvucdanhgia"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Khu vực Quận 9</div>
          <div class="times">Ngày 3 tháng 8 năm 2017</div>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
          
          </div>
        </div>
        <div class="col-lg-6">
          <div class="col-lg-2 image-tin"><a class="" href="#"><img class="img-thongtin" src="./images/du-an-richmond-1.jpg" alt="Generic placeholder image"></a></div>
          <div class="col-lg-10 noidungtin">
          <a class="" href="#"><h2>Heading</h2></a>
          <div class="khuvucdanhgia"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Khu vực Quận 9</div>
          <div class="times">Ngày 3 tháng 8 năm 2017</div>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
          
          </div>
        </div>
        <div class="col-lg-6">
          <div class="col-lg-2 image-tin"><a class="" href="#"><img class="img-thongtin" src="./images/du-an-richmond-1.jpg" alt="Generic placeholder image"></a></div>
          <div class="col-lg-10 noidungtin">
          <a class="" href="#"><h2>Heading</h2></a>
          <div class="khuvucdanhgia"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Khu vực Quận 9</div>
          <div class="times">Ngày 3 tháng 8 năm 2017</div>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
          
          </div>
        </div>
        <div class="col-lg-6">
          <div class="col-lg-2 image-tin"><a class="" href="#"><img class="img-thongtin" src="./images/du-an-richmond-1.jpg" alt="Generic placeholder image"></a></div>
          <div class="col-lg-10 noidungtin">
          <a class="" href="#"><h2>Heading</h2></a>
          <div class="khuvucdanhgia"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Khu vực Quận 9</div>
          <div class="times">Ngày 3 tháng 8 năm 2017</div>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
          
          </div>
        </div>
</div>
			</div>-->
										  </div>
										  <div class="lcol-lg-12 list duanlienquan">
											  <h3><a href='./can-ho-cao-cap/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$chitietsanpham['id_tinh']);?>.html' alt='Căn hộ cao cấp <?php echo diachi($chitietsanpham['id_tinh'],0,0);?>' >Căn hộ cao cấp <?php echo diachi($chitietsanpham['id_tinh'],0,0);?></a></h3>
	                      				<?php if(count($duan)>=4){$cou=4;}else{$cou=count($duan);}   for($i=0; $i<$cou;$i++){?>
		<div class="col-lg-3">
		<div class="item_nhapho">
          <a class="" href="can-ho-cao-cap/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$duan[$i]['id_tinh']);?>/<?php echo $duan[$i]['tenkhongdau'];?>-<?php echo $duan[$i]['id'];?>.html" >
		  <img class="img-thongtin" src="./upload/duan/<?php echo $duan[$i]['photo'];?>" alt="<?php echo $duan[$i]['ten'];?>"></a>
          <div class="noidungnha">
          <a class="" href="can-ho-cao-cap/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$duan[$i]['id_tinh']);?>/<?php echo $duan[$i]['tenkhongdau'];?>-<?php echo $duan[$i]['id'];?>.html" >
		  <h3><?php echo $duan[$i]['ten'];?></h3></a>
          <span class="label label-success dientich"><?php echo $duan[$i]['dientich'];?></span>
          <span class="label label-warning gianha">Giá <?php echo chuyentien($duan[$i]['gia']);?></span>
          <div class="diachinha"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><?php echo $duan[$i]['diadiem'].', '.diachi($duan[$i]['id_tinh'],$duan[$i]['id_huyen'],$duan[$i]['id_phuong']);?></div>
          
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          <div class="times"><?php echo "Ngày ".date("d",$duan[$i]['ngaytao'])." tháng ".date("m",$duan[$i]['ngaytao'])." năm ".date("Y",$duan[$i]['ngaytao']);?></div>
          </div>
        </div>
							<?php } ?>
		<div class="clearfix"></div>
										  </div>
										  <div class="lcol-lg-12 list duanlienquan">
											  <h3><a href='./nha-dat-ban/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$chitietsanpham['id_tinh']);?>.html' alt='Nhà đất bán <?php echo diachi($chitietsanpham['id_tinh'],0,0);?>' >Nhà đất bán <?php echo diachi($chitietsanpham['id_tinh'],0,0);?></a></h3>
	                           <?php if(count($place)>=4){$cou=4;}else{$cou=count($place);}  for($i=0; $i<$cou;$i++){?>
		<div class="col-lg-3">
		<div class="item_nhapho">
          <a class="" href="nha-dat-ban/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html" >
		  <img class="img-thongtin" src="./upload/sanpham/<?php echo $place[$i]['photo'];?>" alt="<?php echo $place[$i]['ten'];?>"></a>
          <div class="noidungnha">
          <a class="" href="nha-dat-ban/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html" >
		  <h3><?php echo $place[$i]['ten'];?></h3></a>
          <span class="label label-success dientich"><?php echo $place[$i]['dientich'];?>m2</span>
          <span class="label label-warning gianha">Giá <?php echo chuyentien($place[$i]['gia']);?></span>
          <div class="diachinha"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><?php echo $place[$i]['diadiem'].', '.diachi($place[$i]['id_tinh'],$place[$i]['id_huyen'],$place[$i]['id_phuong']);?></div>
          
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          <div class="times"><?php echo "Ngày ".date("d",$place[$i]['ngaytao'])." tháng ".date("m",$place[$i]['ngaytao'])." năm ".date("Y",$place[$i]['ngaytao']);?></div>
          </div>
        </div>
							<?php } ?>
		
		<div class="clearfix"></div>
										  </div></div>
							</div>
						
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
        