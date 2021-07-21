<!--planning-->
<div class="wrap">
    <div class="listpage container">
        <section>
            <div class="row pad5">
                <div class="col-lg-9">
                    <div class="post">
                        <h1 class="title_list"> Nhà, đất bán <?php echo $title_ba;?></h1>
			
							
							<?php for($i=0; $i<count($place);$i++){?>
                        <div class="col-lg-6">
				<div class="item_nhadat">
          <div class="img_nhadat col-lg-4"><a class="" href="nha-dat-ban/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html" >
		  <img class="img-thongtin" src="./upload/sanpham/<?php echo $place[$i]['photo'];?>" alt="<?php echo $place[$i]['ten'];?>"></a></div>
          <div class="nd_nhadat col-lg-8">
          	<a class="" href="nha-dat-ban/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html" ><h3><?php echo $place[$i]['ten'];?></h3></a>
          	<div class="diachinha"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><?php echo $place[$i]['diadiem'].', '.diachi($place[$i]['id_tinh'],$place[$i]['id_huyen'],$place[$i]['id_phuong']);?></div>
		  	<span class="label label-success size16"><?php echo $place[$i]['dientich'];?> m2</span>
		  	<span class="label label-warning  size16">Giá <?php echo chuyentien($place[$i]['gia']);?></span>
		  	
		  	<div class="thoigian"><?php echo "Ngày ".date("d",$place[$i]['ngaytao'])." tháng ".date("m",$place[$i]['ngaytao'])." năm ".date("Y",$place[$i]['ngaytao']);?></div><div class="clearfix"></div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          <div class="clearfix"></div>
          </div></div>	
		  
		  <?php if ($i%2==1){ ?>
									 <div class="clearfix"></div>
								<?php } ?>
		  <?php } ?>
          
                        
                      	<div class="text-center">
 	    <div class="text-center pagination">
        <div class="phantrang" ><?php echo $paging['paging']?></div>
      </div> 
                </div>  
                        
                        
                        
                        <!--<div class="listtours">


                                <?php for($i=0;$i<count($tintuc);$i++){?>
                                    <div id="node-<?php echo $i;?>" class="node-tour clearfix" about="./<?php echo $tintuc[$i]['tenkhongdau'];?>.html" typeof="sioc:Item foaf:Document" >

                                        <h4>
                                            <a href="./<?php echo $tintuc[$i]['tenkhongdau'];?>.html"><?php echo $tintuc[$i]['ten'];?></a>
                                        </h4>



                                        <div class="content clearfix">
                                            <div class="field field-name-field-tour-image field-type-image field-label-hidden"><div class="field-items">
                                                    <div class="field-item even"><a href="./<?php echo $tintuc[$i]['tenkhongdau'];?>.html">
                                                            <img typeof="foaf:Image" src="./upload/news/<?php echo $tintuc[$i]['thumb'];?>" width="100%" height="auto"  alt="" data-pin-nopin="true"></a></div></div></div>
                                            <div class="field field-name-field-tour-desc field-type-text-long field-label-hidden">
                                                <div class="field-items"><div class="field-item even">
                                                        <p class="des_tour"><?php echo stripslashes($tintuc[$i]['mota']);?></p>
                                                    </div>

                                                    <a class="linktour1"  href="./<?php echo $tintuc[$i]['tenkhongdau'];?>.html" rel="tag" title="<?php echo $tintuc[$i]['ten'];?>">Read more</a>




                                                </div></div>

                                        </div>


                                    </div>
                                    <?php if( $i%2==1 ){
                                        echo"<div id='' class='clearfix' >  </div>";

                                    }?>
                                <?php } ?>
                        </div>-->
                    </div>
                </div>
				<div class="col-lg-3">
                        	 <?php include _template."layout/left.php";?>           
                        </div>


            </div>
			
			<?php if(count($duan)>=5){$cou=5;}else{$cou=count($duan);} if($cou>0){ ?>
			
			<div  class="row row-content duan_noibat">
              <div class="col-lg-12"><h1>Dự án nổi bật</h1></div>
			  
			  
			  
              <div class="col-lg-6 duanhot1">
                <div class="vc_column-inner ">
              <div class="article_container">  
                <div class="duanbds">
                  <div class="img_duan"><img src="./upload/duan/<?php echo $duan[0]['photo'];?>" alt="<?php echo $duan[0]['ten'];?>" /> </div>
    
                  <div class="places_cover" data-link="http://rio.wpresidence.net/area/leblon/"></div>
                  <div class="places_type_2_content">
                    <span class="label label-success giaduan">Giá từ <?php echo chuyentien($duan[0]['gia']);?></span>
          <span class="label label-primary khuvuc"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><?php echo get_ten("table_tinhthanh_list",$duan[0]['id_huyen']);?></span>
                    <h4 class="tenduan"><a href="can-ho-cao-cap/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$duan[0]['id_tinh']);?>/<?php echo $duan[0]['tenkhongdau'];?>-<?php echo $duan[0]['id'];?>.html"><?php echo $duan[0]['ten'];?></a> </h4> 
        
                  </div>          
                </div>
              </div>
            </div>
          </div>
		  
		  
				<?php if($cou>1){ ?>	  
			<div class="col-lg-6">
					  
					  <?php for($i=1; $i<$cou;$i++){ ?>
					  <div class="col-lg-6 duanhot">
							<div class="vc_column-inner ">
						  <div class="article_container">  
							<div class="duanbds">
							  <div class="img_duan"><img src="./upload/duan/<?php echo $duan[$i]['photo'];?>" alt="<?php echo $duan[$i]['ten'];?>"/> 
							  </div>
							  <div class="places_cover" data-link="http://rio.wpresidence.net/area/leblon/"></div>
							  <div class="places_type_2_content">
								<span class="label label-success giaduan">Giá từ <?php echo chuyentien($duan[$i]['gia']);?></span>
					  <span class="label label-primary khuvuc"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><?php echo get_ten("table_tinhthanh_list",$duan[$i]['id_huyen']);?></span>
								<h4 class="tenduan"><a href="can-ho-cao-cap/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$duan[$i]['id_tinh']);?>/<?php echo $duan[$i]['tenkhongdau'];?>-<?php echo $duan[$i]['id'];?>.html"><?php echo $duan[$i]['ten'];?></a> </h4> 
							  </div>          
							</div>
						  </div>
						</div>
					  </div>
					  <?php } ?>



			</div>
				<?php } ?>
        </section>
    </div>


			<?php } ?>




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