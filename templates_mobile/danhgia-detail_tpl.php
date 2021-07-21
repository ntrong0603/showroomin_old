<!--planning-->
<div class="wrap">
    <div class="container">
        <section>
            <div class="row pad5">
                <div class="col-lg-9">
                    		
                    		<h1>ĐÁNH GIÁ ABC <?php echo $chitietsanpham['ten'];?></h1>
		                        	<p>Khu vực: Quận 5, TP.HCM</p>
		                        	<p><a href="#">Dự Án ABC</a></p>
		                    <div class="nddanhgia">
			                    Nội dung ABC
		                    </div>
                        	
	                        	
                    	
								<!--<div id='' class='thongsotour' > 
									<table id='table_thongso'>
										<tr>
											<td class='title td18'>Tour code </td>
											<td class='td30'><?php echo $chitietsanpham['masp'];?> </td>
											<td class='title td16'>Road surfaces </td>
											<td class='td38'><?php echo $chitietsanpham['surfaces'];?> </td>
										</tr>
										<tr>
											<td class='title td18'>Tour lenth</td>
											<td class='td34'><?php echo $chitietsanpham['songay'];?> </td>
											<td class='title td16'>Cycling distance </td>
											<td class='td38'><?php echo $chitietsanpham['chieudai'];?> </td>
										</tr>
										<tr>
											<td class='title td18'>No. of cycling days </td>
											<td class='td30'><?php echo $chitietsanpham['songaydapxe'];?> </td>
											<td class='title td16'>Group size </td>
											<td class='td38'><?php echo $chitietsanpham['songuoi'];?> </td>
										</tr>
										<tr>
											<td class='title td18'>Tour meets </td>
											<td class='td30'><?php echo $chitietsanpham['noibatdau'];?> </td>
											<td class='title td16'>Tour ends </td>
											<td class='td38'><?php echo $chitietsanpham['noiketthuc'];?> </td>
										</tr>
										<tr>
											<td class='title td50 titlecenter' colspan='2'>What's included </td>
											<td class='title td50 titlecenter' colspan='2'>What's not included </td>
										</tr>
										<tr>
											<td class='td50 tdduoiphai'colspan='2'><?php echo stripslashes($chitietsanpham['included']);?> </td>
											<td class='td50 tdduoiphai'colspan='2'><?php echo stripslashes($chitietsanpham['notincluded']);?> </td>
										</tr>
									</table>
									<br/>
										
								<style>
								#table_thongso .title{
									font-weight: bold;
									background:#fcfcfc;
									line-height:30px;
									
								}
								#table_thongso .td16{
									width: 16%;
								}
								#table_thongso .td18{
									width: 18%;
								}
								#table_thongso .td30{
									width: 26%;
								}
								#table_thongso .td38{
									width: 43%;
								}
								#table_thongso .td50{
									width: 50%;
								}
								#table_thongso td{
									border: 1px dotted;
									padding-left: 5px;
								}
								#table_thongso td {
									vertical-align:middle;
								}
								.tdduoiphai {
									vertical-align:top !important;
									padding-top:8px;
								}
								
								</style>
    			
								</div>-->
								
								 <div id='' class='clearfix' >  </div>
								 
								  
                                <!--<div class="tabbable" id='lichtrinh' style="margin-bottom: 9px;">
											<ul class="nav nav-tabs">
												<li class="vitri"><a href="#tongquan" data-toggle="tab">Tổng quan</a></li>
												<li class="vitri"><a href="#vitri" data-toggle="tab">Vị trí</a></li>
												<li class="vitri"><a href="#tienich" data-toggle="tab">Tiện ích</a></li>
												<li class="vitri"><a href="#matbang" data-toggle="tab">Mặt bằng</a></li>
												<li class="vitri"><a href="#canhomau" data-toggle="tab">Căn hộ mẫu</a></li>
												<li class="vitri"><a href="#huongview" data-toggle="tab">Các hướng View</a></li>
												<li class="vitri"><a href="#danhgia" data-toggle="tab">Đánh giá</a></li>
											  <li class="<?php if( $_SESSION['active']=='' ){echo 'active';}?>"><a href="#2" data-toggle="tab">Reviews</a></li>
											  <li class="<?php if( $_SESSION['active']=='active' ){echo 'active';}?>"><a href="#1" data-toggle="tab">Dates</a></li>
											  <li class=""><a href="#4" data-toggle="tab">Routes</a></li>
											  <li class=""><a href="#3" data-toggle="tab">Send an Inquiry</a></li>
											</ul>
											<div class="tab-content">
											<div class="tab-pane <?php if( $_SESSION['active']=='' ){echo 'active';}?>" id="tongquan">
												
												<h4>Tổng Quan</h4>
												<div>
												Tổng Quan
													
													
												</div></div>
											<div class="tab-pane <?php if( $_SESSION['active']=='' ){echo 'active';$_SESSION['active']='';}?>?>" id="2">
												
												<h4>Reviews</h4>
												<div id="reviews">
												<?php 
												$d->query("select * from table_nhapkho where hienthi=1 and id_sp='lp_".$chitietsanpham['id']."' order by stt asc, id desc");
												$review=$d->result_array();
												?>
												<?php for($i=0;$i<count($review);$i++){?>
													<div class="review">
														<p><a href='javascript:{}'><span class="tour_name"><?php echo $review[$i]['ten'];?></span></a></p>
														
														<p class="review_content">
															<?php echo stripslashes($review[$i]['mota']);?>
														</p>
														
													</div>
													<?php } ?>
													
													
												</div>                        
												<!-- //reviews -->
												
												<!-- Leave a Comment -->
												<!--<h4>Leave a comment</h4>
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
											  <div class="tab-pane <?php if( $_SESSION['active']=='active' ){echo 'active';$_SESSION['active']='';}?>" id="1">
												<div style="width:100%;height:32px;clear:both;"><div class="span1 titledate">Start dates</div><div class="span1 titledate">End dates</div><div class="span4 titledate">Notes</div></div>
												<?php 
												$d->query("select * from table_giaphong where hienthi=1 and id_sp='gp_".$chitietsanpham['id']."' order by stt asc, id desc");
												$lichtrinh=$d->result_array();
												?>
												<?php for($i=0;$i<count($lichtrinh);$i++){?>
													<div class="span1"><?php echo date('d/m/Y',$lichtrinh[$i]['batdau']) ?></div>
													<div class="span1"><?php echo date('d/m/Y',$lichtrinh[$i]['ketthuc']) ?></div>
													<div class="span4"><?php echo $lichtrinh[$i]['mota'] ;?></div>
													<button class='btn dark_btn dattour' masp="<?php echo $chitietsanpham['id'];?>" ngaybatdau="<?php echo date('d/m/Y',$lichtrinh[$i]['batdau']) ?>" ngayketthuc="<?php echo date('d/m/Y',$lichtrinh[$i]['ketthuc']) ?>" tentour="<?php echo $chitietsanpham['ten'];?>" > Book Now </button>
													<div id='xuatform<?php echo $chitietsanpham['id'];?>' class='xuatform' >  </div>
												<?php } ?>
											  </div>
											  
											  <div class="tab-pane" id="4">
											    <?php echo stripslashes($chitietsanpham['mota_sd']);?>
											  </div>
											  <div class="tab-pane" id="3">
												<h5 class="title">Send an Inquiry</h5>
											<form id="ajax-contact-form" method='POST' action="./contacts.html">
															
														<input class="span4" type="text" name="tieude" value="" placeholder="Subject" />
														<input class="span4" type="text" name="dienthoai" value="" placeholder="Phone Number" />
														<input class="span4" type="text" name="ten" value="" placeholder="First Name (required)" required/>
														<input class="span4" type="text" name="ten2" value="" placeholder="Last Name (required)" required />
														<input class="span4" type="email" name="email" value="" placeholder="Email (required)" required/>
														<input class="span4" type="email" name="email2" value="" placeholder="Confirm Email (required)" required />
														<input class="span4" type="text" name="ngaybatdau" value="" placeholder="Start dates" />
														<input class="span4" type="text" name="ngayketthuc" value="" placeholder="End dates" />
														<input class="span4" type="text" name="noadults" value="" placeholder="No. of adults" />
														<input class="span4" type="text" name="kids" value='' placeholder="No. of Kids"/>
														<textarea name="noidung" id="message" class="span8" placeholder="Message"></textarea>
															<div class="clear"></div>
															
															<input type="submit" class="btn send_btn" value="Submit" />
															<div class="clear"></div>
														</form>
											  </div>
											</div></div>-->
										  
										  <div class="lcol-lg-12 list danhgialienquan">
											  
											  <div class="row row-content danhgiabds">
		<div class="wpb_wrapper">
				<div class="col-lg-12 headdanhgia"><h2>Bài đánh giá khác về khu vực này</h2></div>
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
			</div></div>
										  
										  
										  <div class="lcol-lg-12 list duanlienquan">
											  <h3>List căn hộ cùng khu vực</h3>
	                            	<div class="col-lg-3">
		                            	
				<div class="item_nhapho">
          <a class="" href="#" ><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a>
          <div class="noidungnha">
          <a class="" href="#" ><h2>Heading</h2></a>
          <span class="label label-success dientich">62m2</span>
          <span class="label label-warning gianha">Giá 2 tỷ 6</span>
          <div class="diachinha"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>123 Điện biên phủ, P.Đa Kao, Quận 1</div>
          <div class="times">Ngày 3 tháng 8 năm 2017</div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          </div>
        </div>
        <div class="col-lg-3">
				<div class="item_nhapho">
          <a class="" href="#" ><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a>
          <div class="noidungnha">
          <a class="" href="#" ><h2>Heading</h2></a>
          <span class="label label-success dientich">62m2</span>
          <span class="label label-warning gianha">Giá 2 tỷ 6</span>
          <div class="diachinha"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>123 Điện biên phủ, P.Đa Kao, Quận 1</div>
          <div class="times">Ngày 3 tháng 8 năm 2017</div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          </div>
        </div>
        <div class="col-lg-3">
				<div class="item_nhapho">
          <a class="" href="#" ><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a>
          <div class="noidungnha">
          <a class="" href="#" ><h2>Heading</h2></a>
          <span class="label label-success dientich">62m2</span>
          <span class="label label-warning gianha">Giá 2 tỷ 6</span>
          <div class="diachinha"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>123 Điện biên phủ, P.Đa Kao, Quận 1</div>
          <div class="times">Ngày 3 tháng 8 năm 2017</div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          </div>
        </div>
        <div class="col-lg-3">
				<div class="item_nhapho">
          <a class="" href="#" ><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a>
          <div class="noidungnha">
          <a class="" href="#" ><h2>Heading</h2></a>
          <span class="label label-success dientich">62m2</span>
          <span class="label label-warning gianha">Giá 2 tỷ 6</span>
          <div class="diachinha"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>123 Điện biên phủ, P.Đa Kao, Quận 1</div>
          <div class="times">Ngày 3 tháng 8 năm 2017</div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          
          </div>
        </div><div class="clearfix"></div>
										  </div>
										  <div class="lcol-lg-12 list duanlienquan">
											  <h3>List nhà, đất bán cùng khu vực</h3>
	                            	<div class="col-lg-3">
		                            	
				<div class="item_nhapho">
          <a class="" href="#" ><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a>
          <div class="noidungnha">
          <a class="" href="#" ><h2>Heading</h2></a>
          <span class="label label-success dientich">62m2</span>
          <span class="label label-warning gianha">Giá 2 tỷ 6</span>
          <div class="diachinha"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>123 Điện biên phủ, P.Đa Kao, Quận 1</div>
          <div class="times">Ngày 3 tháng 8 năm 2017</div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          </div>
        </div>
        <div class="col-lg-3">
				<div class="item_nhapho">
          <a class="" href="#" ><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a>
          <div class="noidungnha">
          <a class="" href="#" ><h2>Heading</h2></a>
          <span class="label label-success dientich">62m2</span>
          <span class="label label-warning gianha">Giá 2 tỷ 6</span>
          <div class="diachinha"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>123 Điện biên phủ, P.Đa Kao, Quận 1</div>
          <div class="times">Ngày 3 tháng 8 năm 2017</div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          </div>
        </div>
        <div class="col-lg-3">
				<div class="item_nhapho">
          <a class="" href="#" ><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a>
          <div class="noidungnha">
          <a class="" href="#" ><h2>Heading</h2></a>
          <span class="label label-success dientich">62m2</span>
          <span class="label label-warning gianha">Giá 2 tỷ 6</span>
          <div class="diachinha"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>123 Điện biên phủ, P.Đa Kao, Quận 1</div>
          <div class="times">Ngày 3 tháng 8 năm 2017</div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          </div>
        </div>
        <div class="col-lg-3">
				<div class="item_nhapho">
          <a class="" href="#" ><img class="img-thongtin" src="./images/can-ho-richmond-1.jpg" alt="Generic placeholder image"></a>
          <div class="noidungnha">
          <a class="" href="#" ><h2>Heading</h2></a>
          <span class="label label-success dientich">62m2</span>
          <span class="label label-warning gianha">Giá 2 tỷ 6</span>
          <div class="diachinha"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>123 Điện biên phủ, P.Đa Kao, Quận 1</div>
          <div class="times">Ngày 3 tháng 8 năm 2017</div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          
          </div>
        </div><div class="clearfix"></div>
										  </div>
							</div>
						
						<div class="col-lg-3">
                        	 <?php include _template."layout/left.php";?>           
                        </div>


        </section>
    </div>







    <!--<div class="container">
        <div class="row">
            <div class="span3">
                <a href="#">
                    <span class="img_icon icon1"></span>
                    <span class="link_title">egestas dolor</span>
                    Nunc vel arcu arcu. Nulla mollis feugiat dui id tincidunt. Aenean ac lobortis elit.
                </a>
            </div>
            <div class="span3">
                <a href="#">
                    <span class="img_icon icon2"></span>
                    <span class="link_title">lorem ipsum</span>
                    Nunc vel arcu arcu. Nulla mollis feugiat dui id tincidunt. Aenean ac lobortis elit.
                </a>
            </div>
            <div class="span3">
                <a href="#">
                    <span class="img_icon icon3"></span>
                    <span class="link_title">vestilum eget</span>
                    Nunc vel arcu arcu. Nulla mollis feugiat dui id tincidunt. Aenean ac lobortis elit.
                </a>
            </div>
            <div class="span3">
                <a href="#">
                    <span class="img_icon icon4"></span>
                    <span class="link_title">nulla feugiat</span>
                    Nunc vel arcu arcu. Nulla mollis feugiat dui id tincidunt. Aenean ac lobortis elit.
                </a>
            </div>
        </div>
    </div>-->
</div>
<!--//planning-->

<!--Welcome-->
<!--<div class="wrap block">
    <div class="container welcome_block">
        <div class="welcome_line welcome_t"></div>
        Cras vulputate pretium massa gravida egestas consectetur?<span>Lorem ipsum dolor sit amet &amp; consectetur adipiscing elit!</span>
        <div class="welcome_line welcome_b"></div>
    </div>
</div>-->
<!--//Welcome-->

<!--featured works-->
<!--<div class="wrap block carousel_block">
    <div class="container">
        <h2 class="upper">featured works</h2>
        <div class="row">
            <div class="span12">
                <ul id="mycarousel" class="jcarousel-skin-tango">
                    <li>
                        <div class="hover_img">
                            <a href="img/featured_works/1.jpg" rel="prettyPhoto[portfolio1]"><img src="img/featured_works/1.jpg" alt="" /><span class="portfolio_zoom1"></span></a>
                        </div>
                    </li>
                    <li>
                        <div class="hover_img">
                            <a href="img/featured_works/2.jpg" rel="prettyPhoto[portfolio1]"><img src="img/featured_works/2.jpg" alt="" /><span class="portfolio_zoom1"></span></a>
                        </div>
                    </li>
                    <li>
                        <div class="hover_img">
                            <a href="img/featured_works/3.jpg" rel="prettyPhoto[portfolio1]"><img src="img/featured_works/3.jpg" alt="" /><span class="portfolio_zoom1"></span></a>
                        </div>
                    </li>
                    <li>
                        <div class="hover_img">
                            <a href="img/featured_works/4.jpg" rel="prettyPhoto[portfolio1]"><img src="img/featured_works/4.jpg" alt="" /><span class="portfolio_zoom1"></span></a>
                        </div>
                    </li>
                    <li>
                        <div class="hover_img">
                            <a href="img/featured_works/1.jpg" rel="prettyPhoto[portfolio1]"><img src="img/featured_works/1.jpg" alt="" /><span class="portfolio_zoom1"></span></a>
                        </div>
                    </li>
                    <li>
                        <div class="hover_img">
                            <a href="img/featured_works/2.jpg" rel="prettyPhoto[portfolio1]"><img src="img/featured_works/2.jpg" alt="" /><span class="portfolio_zoom1"></span></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>-->
<!--//featured works-->

<!--Latest news-->
<div class="wrap block">
    <div class="container">
        <!--<div class="row news_block">
            <div class="span6">
                <h2 class="title">egestas sed convallis metus!</h2>
                <p>Vestibulum tincidunt ultricies aliquam. Donec porta mi nec tortor sagittis rhoncus. Nunc ante arcu, ornaresit gravida rutrum ut, facilisis et lacus. Aliquam mauris arcu, interdum eu fermentum tincidunt.</p>
                <ul class="the-icons grey">
                    <li><i class="icon-time"></i> Curabitur eu placerat massa.</li>
                    <li><i class="icon-star"></i> Integer adipiscing velit nec purus facilisis ut pharetra!</li>
                    <li><i class="icon-camera"></i> Nunc mollis, nisl vel tincidunt vestibulum, lacus libero mollis urna, eu dapibus lacus nisi et nulla.</li>
                    <li><i class="icon-qrcode"></i> Curabitur veltpat magna. Pellentesque pellentesque dapibus dictum. </li>
                    <li><i class="icon-user"></i> Nulla ut erat ut massa molestie commodo.</li>
                </ul>
                <p>Duis vel ligula et libero iaculis facilisis in vel justo. Duis lacinia orci ut tellus interdum dignissim. Fusce eugei scelerisque enim. Phasellus nec libero lectus. Quisque posuere mi non nibh facilisis semper. Donec lorem suscipit est sed mauris eleifend congue. Class taciti sociosqu litora torquent <a href="#" class="arrow_link">per conubia.</a></p>
            </div>
            <div class="span6">
                <h2 class="title">Latest news</h2>
                <ul id="newscarousel" class="jcarousel-skin-tango">
                    <li>
                        <div class="news_date">15 apr<span>2019</span></div>
                        <div class="news_t"><a href="#">Sed massa dui, porta corper ac varius!</a></div>
                        <div class="news">Posted by <a href="#">Anna Smith</a>  /  In <a href="#">City</a><br/>Tags: <a href="#">eget</a>, <a href="#">mauris</a></div>
                        <div class="news_info">Tristique tincidunt cursus sed, ornare ncidunt eque a tristique. Phasellus porttitor mollis tortor etoq vestibulum. Quisque non lacus tortor, quis cumsan nibh. Lorem ipsum dolor sit amet, consectetur icing elit. Nullam pulvinarteses lorem sed dui euismod eget. <a href="#">Read more...</a></div>
                        <div class="clear"></div>
                    </li>
                    <li>
                        <div class="news_date">05 apr<span>2019</span></div>
                        <div class="news_t"><a href="#">eget &amp; massa viviamu marius mas</a></div>
                        <div class="news">Posted by <a href="#">Anna Smith</a>  /  In <a href="#">City</a><br/>Tags: <a href="#">eget</a>, <a href="#">mauris</a></div>
                        <div class="news_info">Cursus sed, aliquet nec odio. Integer ornare tincidunt neque a tristique. Phasellus porttitor millis tortor etoq vestibulum. Quisque ont lacus toirtor uis accumsan nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ulvinarteses em sed. <a href="#">Read more...</a></div>
                        <div class="clear"></div>
                    </li>
                    <li>
                        <div class="news_date">15 apr<span>2019</span></div>
                        <div class="news_t"><a href="#">Sed massa dui, porta corper ac varius!</a></div>
                        <div class="news">Posted by <a href="#">Anna Smith</a>  /  In <a href="#">City</a><br/>Tags: <a href="#">eget</a>, <a href="#">mauris</a></div>
                        <div class="news_info">Tristique tincidunt cursus sed, ornare ncidunt eque a tristique. Phasellus porttitor mollis tortor etoq vestibulum. Quisque non lacus tortor, quis cumsan nibh. Lorem ipsum dolor sit amet, consectetur icing elit. Nullam pulvinarteses lorem sed dui euismod eget. <a href="#">Read more...</a></div>
                        <div class="clear"></div>
                    </li>
                    <li>
                        <div class="news_date">05 apr<span>2019</span></div>
                        <div class="news_t"><a href="#">eget &amp; massa viviamu marius mas</a></div>
                        <div class="news">Posted by <a href="#">Anna Smith</a>  /  In <a href="#">City</a><br/>Tags: <a href="#">eget</a>, <a href="#">mauris</a></div>
                        <div class="news_info">Cursus sed, aliquet nec odio. Integer ornare tincidunt neque a tristique. Phasellus porttitor millis tortor etoq vestibulum. Quisque ont lacus toirtor uis accumsan nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ulvinarteses em sed. <a href="#">Read more...</a></div>
                        <div class="clear"></div>
                    </li>
                 </ul>
            </div>
        </div>-->
    </div>
</div>
<!--Latest news-->

<!--latest posts-->
<?php include _template."layout/new.php";?>

<!--//latest posts-->