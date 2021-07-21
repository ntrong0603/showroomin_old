  <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 page-title wow fadeIn">
                        <span aria-hidden="true" class="icon_images"></span>
                        <h1><?php echo $chitiet['ten'];?></h1>
                       
                    </div>
                </div>
            </div>
        </div>

        <!-- About Us Text -->
        <div class="about-us-container">
        	<div class="container">
	        	

	            <div class="col-sm-12">
	                <div class="col-sm-12 about-us-text wow fadeInLeft">
		               
                        
                        <?php echo $chitiet['noidung'];?>
	                    
	                </div>
	            </div>
	        </div>
        </div>




<div class="testimonials-container">
	        <div class="container">
	        	<div class="row">
		            <div class="col-sm-12 testimonials-title wow fadeIn">
		                <h2>Đánh giá khách hàng về dịch vụ này</h2>
		            </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-10 testimonial-list wow fadeInLeft">
	                	<div role="tabpanel">
	                		<!-- Tab panes -->
	                		<div class="tab-danhgia">
								<?php 
						$d->query("select * from table_news where hienthi=1 and noibat=1  and loaitin='danh-gia-khach-hang-dich-vu' order by stt asc, id desc limit 8" );
						$dichvu=$d->result_array();
						
						?>
						<?php for($i=0; $i<count($dichvu);$i++){ ?>
	                			<div role="tabpanel" class="tab-pane fade in <?php if( $i==0 ){echo "active";}?>" id="tab<?php echo $i;?>">
	                				<div class="testimonial-image">
	                					<img src="./upload/news/<?php echo $dichvu[$i]['photo'];?>" alt="" data-at2x="./upload/news/<?php echo $dichvu[$i]['photo'];?>">
	                				</div>
	                				<div class="testimonial-text">
		                                <p>
										<?php echo $dichvu[$i]['mota'];?>
										<br>
		                                	
		                                </p>
		                                <p><?php echo $dichvu[$i]['ten'];?></p>
	                                </div>
	                			</div>
								
						<?php } ?>
	                			
	                		</div>
	                		<!-- Nav tabs -->
	                		<ul class="nav nav-tabs" role="tablist">
							<?php for($i=0; $i<count($dichvu);$i++){ ?>
	                			<li role="presentation" class="<?php if( $i==0 ){echo "active";}?>">
	                				<a href="#tab<?php echo $i; ?>" aria-controls="tab<?php echo $i ; ?>" role="tab" data-toggle="tab"></a>
	                			</li>
							<?php } ?>
	                			
	                		</ul>
	                	</div>
	                </div>
	                <div class="col-sm-2 testimonial-icon wow fadeInUp">
	                	<div>
	                		<span aria-hidden="true" class="icon_pushpin"></span>
	                	</div>
	                </div>
	            </div>
	        </div>
        <!-- Meet Our Team -->
        <div class="team-container">
        	<div class="container">
	            <div class="row">
		            <div class="col-sm-12 team-title wow fadeIn">
		                <h2>Dịch vụ liên quan</h2>
		            </div>
	            </div>
	            <div class="row">	
<?php
$d->query("select * from table_news where  hienthi=1 and loaitin='thiet-ke'  and id <> ".$chitiet['id']." order by stt asc, id desc"  );
						
						$tinlienquan=$d->result_array();
?>
            	<?php  for ($i=0; $i<count($tinlienquan);$i++){?>
	            	<div class="col-sm-3">
		                <div class="service wow fadeInUp">
		                    <div id='' class='text-center' > <img src='./upload/news/<?php echo $tinlienquan[$i]['thumb'];?>' alt='<?php echo $tinlienquan[$i]['ten'];?>' title='<?php echo $tinlienquan[$i]['ten'];?>' /> </div>
		                    <h3><?php echo $tinlienquan[$i]['ten'];?></h3>
		                    <p><?php echo $tinlienquan[$i]['mota'];?></p>
		                    <a class="big-link-1" href="dich-vu-thiet-ke/<?php echo $tinlienquan[$i]['tenkhongdau'];?>">Read more</a>
		                </div>
					</div>
					<?php } ?>
	               
	            </div>
	        </div>
        </div>

        <!-- Testimonials -->
             
        </div>