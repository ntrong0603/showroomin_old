  <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 page-title wow fadeIn">
                        <span aria-hidden="true" class="icon_printer"></span>
                        <h1>Dịch vụ in ấn</h1>
                 
                        <p><?php echo $chitiettintuc['ten'];?> </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Us Text -->
        <div class="about-us-container">
        	<div class="container">
	        	<div class="col-sm-3 cottrai">
		        	<p class="nangniu">Nâng niu từng kỷ niệm</p>
		        	<div class="menu-left">
					<?php 
						$d->query("select * from table_news_danhmuc where loaitin='dich-vu-in-an' and hienthi=1 " );
						$dichvu=$d->result_array();
						
						?>
						<?php for($i=0; $i<count($dichvu);$i++){?>        
		        	<p><span aria-hidden="true" class="icon_menu-square_alt2"></span><?php echo $dichvu[$i]['ten'];?></p>
		        	<ul id="accordion1479139098576434404" class="accordion">
            
				<?php 
						$d->query("select * from table_news where loaitin='dich-vu-in-an' and hienthi=1 and id_danhmuc=".$dichvu[$i]['id'] );
						$dichvu2=$d->result_array();
						
						?>
						<?php for($a=0; $a<count($dichvu2);$a++){?> 
			<li class="accordion-group">
                <a href="./dich-vu-in-an/<?php echo $dichvu2[$a]['tenkhongdau'];?>"><?php echo $dichvu2[$a]['ten'];?></a>
                      </li>
						<?php } ?>
		        	</ul>
					
						<?php } ?>
		        
		        	</div>
		        	<div class="dathang">
			        	<h4>ĐẶT HÀNG TRỰC TUYẾN</h4>
			        	<form method="POST" action="./dich-vu-in-an" class="form" role="form">
				        	<div class="form-group">
				<div>DỊCH VỤ IN</div>
				<select id='dichvuin' name='dichvuin'>
				<option value="0">Chọn dịch vụ</option>
						<?php	$d->query("select * from table_dichvu where  hienthi=1 order by stt asc, id desc" );
						$dichvu=$d->result_array();
						
						?>
						<?php for($i=0; $i<count($dichvu);$i++){?>       
			 		<option value="<?php echo $dichvu[$i]['id'];?>"><?php echo $dichvu[$i]['ten'];?></option>
						<?php } ?>
				</select>
				 </div>
				 <div class="form-group">
				<div>CHỌN LOẠI GIẤY</div>
				<select id='loaigiay' name='loaigiay'>
			 		<option value="0">Loại giấy</option>
			 		
				</select>
				 </div>
			<div class="form-group">
				<div>SỐ TỜ</div>
			<span > <input type="number" id='minsoluong' data-bv-trigger="change keyup" name="soluong" min="10" /></span>
				 </div>
			<div class="form-group">
				<div>Tổng cộng</div>
			<span > <input type='text' readonly id='tonggia' value='0 Vnđ' /></span>
				 </div>
				 
				 
				   <div class="form-group">
					   <div>HỌ TÊN</div>
					   <input class="form-control" name="ten" placeholder="Họ và tên" type="text">
				  </div>
				  
				  <div class="form-group">
					  <div>SỐ ĐIỆN THOẠI</div>
					  <input class="form-control" name="dienthoai" placeholder="Số Điện thoại" type="text">
				  </div>
				       <div class="form-group">
					  <div>ĐỊA CHỈ</div>
					  <input class="form-control" name="diachi" placeholder="Số Điện thoại" type="text">
				  </div>                         
				  
					   <button class="btn btn-primary pull-right" type="submit">Đặt hàng</button>
			</form>
		        	</div>
		        
		        	
		        	
	        	</div>

	            <div class="col-sm-9 cotphai">
	                <div class="col-sm-12 about-us-text wow fadeInLeft">
		                
                        <!--<h1 style="display:inline-block;"><?php echo $chitiet['ten'];?></h1>-->
                        <?php echo $chitiet['noidung'];?>
	                    
	                </div>
	            </div>
	        </div>
        </div>

        <!-- Meet Our Team -->
        <div class="team-container">
        	<div class="container">
	            <div class="row">
		            <div class="col-sm-12 team-title wow fadeIn">
		                <h2>DỊCH VỤ LIÊN QUAN</h2>
		            </div>
	            </div>
	            <div class="row">	

            	<?php for($i=0; $i<count($tinlienquan);$i++){?>      
	            	<div class="col-sm-3">
		                <div class="team-box wow fadeInUp">
		                    <a href="/dich-vu-in-an/<?php echo $tinlienquan[$i]['tenkhongdau'];?>">
		                    
		                    <img src="./upload/news/<?php echo $tinlienquan[$i]['photo']; ?>" alt="<?php echo $tinlienquan[$i]['ten']; ?>" data-at2x="./upload/news/<?php echo $tinlienquan[$i]['photo']; ?>">
		                    <h3><?php echo $tinlienquan[$i]['ten']; ?></h3>
		                    <p><?php echo $tinlienquan[$i]['mota']; ?></p>
		                    </a>
		                </div>
	                </div>
				<?php } ?>
	               
	            </div>
	        </div>
        </div>

        <!-- Testimonials -->
             <div class="testimonials-container">
	        <div class="container">
	        	<div class="row">
		            <div class="col-sm-12 testimonials-title wow fadeIn">
		                <h2>Đánh giá khách hàng</h2>
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
        </div>