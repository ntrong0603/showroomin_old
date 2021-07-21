 <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 page-title wow fadeIn">
                        <span aria-hidden="true" class="icon_tools"></span>
                        <h1>DỊCH VỤ Thiết kế</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Full Width Text -->
        <div class="services-full-width-container">
        	<div class="container">
	            <div class="row">
		            <div class="col-sm-3"></div>
	                <div class="col-sm-12 services-full-width-text wow fadeInLeft">
	                    <h3><?php echo $chitiet['ten'];?></h3>
	                    <p>
	                    	<?php echo $chitiet['mota'];?>
	                	</p>
	                </div>
	            </div>
	        </div>
        </div>

        <!-- Services -->
        <div class="services-container">
	        <div class="container">
	            <div class="row">
	            	<?php  for ($i=0; $i<count($tinlienquan);$i++){?>
	            	<div class="col-sm-3">
		                <div class="service wow fadeInUp">
		                    <div id='' class='text-center' > <img src='./upload/news/<?php echo $tinlienquan[$i]['photo'];?>' alt='<?php echo $tinlienquan[$i]['ten'];?>' title='<?php echo $tinlienquan[$i]['ten'];?>' /> </div>
		                    <h3><?php echo $tinlienquan[$i]['ten'];?></h3>
		                    <p><?php echo $tinlienquan[$i]['mota'];?></p>
		                    <a class="big-link-1" href="dich-vu-thiet-ke/<?php echo $tinlienquan[$i]['tenkhongdau'];?>">Xem chi tiết</a>
		                </div>
					</div>
					<?php } ?>
	            </div>
	        </div>
        </div>

        <!-- Services Half Width Text -->
        <div class="services-half-width-container">
        	<div class="container">
	            <div class="row">
	                <div class="col-sm-6 services-half-width-text wow fadeInLeft">
					<div class="col-sm-12 wow fadeInLeftBig">
	            		<?php 
						$d->query("select * from table_baiviet where loaitin='thiet-ke-trai' " );
						$tam=$d->fetch_array();
						
						?>
	            	</div>
	                    <h3><?php echo $tam['ten'] ; ;?></h3>
	                    <p>
	                    	<?php echo $tam['noidung'] ; ;?>
	                    </p>
	                </div>
					<?php 
						$d->query("select * from table_baiviet where loaitin='thiet-ke-phai' " );
						$tam=$d->fetch_array();
						
						?>
	                <div class="col-sm-6 services-half-width-text wow fadeInUp">
	                    <h3><?php echo $tam['ten'] ; ;?></h3>
	                    <p>
	                    	<?php echo $tam['noidung'] ; ;?>
	                    </p>
	                </div>
	            </div>
	        </div>
        </div>

        <!-- Call To Action -->
        <div class="call-to-action-container">
        	<div class="container">
	            <div class="row">
	                <div class="col-sm-12 call-to-action-text wow fadeInLeftBig">
	                    <p>
	                    	Liên hệ tư vấn và hỗ trợ trực tuyến qua  <span class="colored-text">HOTLINE 0913 79 0807</span> 
	                    </p>
	                    <div class="call-to-action-button">
		                    Hoặc Gửi liên hệ tại
	                        <a class="big-link-3" href="http://huycuong.vn/contact.html">Liên hệ</a>
	                    </div>
	                </div>
	            </div>
	        </div>
        </div>

