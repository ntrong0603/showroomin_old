 <!--planning-->
        <div class="wrap">
	        <div class="container">
                <section>
                	<div class="row pad5">
	                	<div class="span3">
                        	 <?php include _template."layout/left.php";?>           
                        </div>
                    	<div class="span9">
                        	<div class="post">
                            	<!--<h1> <?php echo $title_ba;?></h1>-->
                               <?php for($i=0;$i<count($review);$i++){?>
													<div class="review">
													<?php $tam=explode('_',$review[$i]['id_sp']);
													
													$d->reset();
													$d->setTable('place');
													$d->setWhere('id',$tam[1]);
													$d->select();
													$chitietsanpham=$d->fetch_array();
													if( $chitietsanpham['id_danhmuc']>0 ){ $where=" and #_place.id_danhmuc = ".$chitietsanpham['id_danhmuc'] ;
													$d->reset();
													$d->setTable('place_danhmuc');
													$d->setWhere('id',$chitietsanpham['id_danhmuc']);
													$d->select();
													$danhmucsanpham= $d->fetch_array();
													
													}
													
													if( $chitietsanpham['id_list']>0 ){ $where=" and #_place.id_list = ".$chitietsanpham['id_list'] ;
													$d->reset();
													$d->setTable('place_list');
													$d->setWhere('id',$chitietsanpham['id_list']);
													$d->select();
													$danhmucsanpham= $d->fetch_array();
													}
													$danhmucseo=$danhmucsanpham;
													?>
														<p><a href='./<?php echo $chitietsanpham['tenkhongdau'];?>.html'><span class="tour_name"><?php echo $chitietsanpham['ten'];?></span></a></p>
														
														<p class="review_content">
															<?php echo $review[$i]['mota'];?>
														</p>
														 <p class="member"><?php echo $review[$i]['ten'];?></p>
													</div>
													<?php } ?>
							</div>
						</div>
        
       
                           
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