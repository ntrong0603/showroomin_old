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
                            	<h1> <?php echo $danhmucseo['ten'];?></h1>
                                 <div class="listtours">
									<div>
									<?php echo $chitiet['noidung'];?>
									</div>
										<?php for($i=0;$i<count($place);$i++){?>
					<?php	
					$tam=explode("_",$place[$i]['id_sp']);									
					$d->query("select * from table_place where id=  ".$tam[1] );
					$place_one[$i]=$d->fetch_array();
					if(count($place_one[$i])>0){
							?>

							
								<div id="node-<?php echo $i;?>" class="node-tour clearfix" about="./<?php echo $place_one[$i]['tenkhongdau'];?>.html" typeof="sioc:Item foaf:Document" >

												  <h4>
												  <a href="./<?php echo $place_one[$i]['tenkhongdau'];?>.html#lichtrinh"><?php echo $place_one[$i]['ten'];?></a>
												</h4>
											  
											  
												   
											  <div class="content clearfix">
												<!--<div class="field field-name-field-tour-image field-type-image field-label-hidden"><div class="field-items">
												<div class="field-item even"><a href="./<?php echo $place_one[$i]['tenkhongdau'];?>.html#lichtrinh">
												<img typeof="foaf:Image" src="./upload/sanpham/<?php echo $place_one[$i]['thumb'];?>" width="100%" height="auto" alt="" data-pin-nopin="true"></a></div>
												</div></div>-->
												<div class="span4 ndmota field-label-hidden">
												<div class="field-items">
												
												<div id='' class='' >
												<?php 
												$d->query("select * from table_giaphong where hienthi=1 and id_sp='gp_".$place_one[$i]['id']."' order by stt asc, id desc ");
												$lichtrinh=$d->result_array();
												$lichtrinh_one=$lichtrinh[0];
												?>  
												
												</div>
												<div class="field-item even">
												
												<table>
													<?php for($a=0;$a<count($lichtrinh);$a++){?>
												<tr><td class="dates">Start Dates <?php echo date('d/m/Y',$lichtrinh[$a]['batdau']) ?></td><td class="dates">End Dates <?php echo date('d/m/Y',$lichtrinh[$a]['ketthuc']) ?></td></tr>
												
												
												<!--<tr>
													<td class=""><?php echo date('d/m/Y',$lichtrinh[$a]['batdau']) ?></td>
													<td class=""><?php echo date('d/m/Y',$lichtrinh[$a]['ketthuc']) ?></td>
													</tr>-->
												<?php } ?>
												</table>
												
												</div>
											<!--<ul class="links inline">
											<li class="node-readmore first last"><a href="./<?php echo $place_one[$i]['tenkhongdau'];?>.html#lichtrinh" rel="tag" title="<?php echo $place_one[$i]['ten'];?>">Read more</a></li>
											 <li class="review last">
															<a href="./reviews/<?php echo $place_one[$i]['tenkhongdau'];?>.html" rel="tag" title="<?php echo $place_one[$i]['ten'];?>" query="review=1">Read Reviews</a>
														  </li>
											</ul>-->
											

											</div></div>	    
													   
											  
											  <div class="span3"><b><?php echo $lichtrinh_one['mota'];?></b></div>
											  <a class="btn dark_btn span1" href="./<?php echo $place_one[$i]['tenkhongdau'];?>.html#lichtrinh">Book Now</a>
											 </div> 
											 <hr>
											</div>
											<?php if( $i%2==1 ){
												echo"<div id='' class='clearfix' >  </div>";
												
											}
											?>
										<?php }} ?>
										
											<div id='' class='clearfix' >  </div>
											
											  </div>
											  
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