    <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 page-title wow fadeIn">
                        <span aria-hidden="true" class="icon_profile"></span>
                        <h1>BỘ SƯU TẬP</h1>
                    </div>
                </div>
            </div>
        </div>
		<!--<div>
			<div class="container">
				<div class="row">
					<div class="col-sm-12 portfolio-filters wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
	            		<a href="./trang-chu" class="filter-all active">Trang chủ</a> / 
	            		<a href="#" class="filter-web-design">Bộ sưu tập</a>
	            	</div>
				</div>
			</div>
		</div>-->
        <!-- About Us Text -->
        <div class="bo-suu-tap">
        	<div class="container">
	        	
	            <div class="row">
	           
	            
						<?php for($i=0; $i<count($dichvu);$i++){ ?>
	            	<div class="col-sm-4">
		                <div class="work wow fadeInUp">
		                    <a href="./bo-suu-tap/<?php echo $dichvu[$i]['tenkhongdau'];?>-<?php echo $dichvu[$i]['id'];?>">
		                    <img src="./upload/hinhanh/<?php echo $dichvu[$i]['photo'];?>" alt="Lorem Website" data-at2x="a./upload/hinhanh/<?php echo $dichvu[$i]['photo'];?>">
		                    <div class="info"><h3><?php echo $dichvu[$i]['ten'];?></h3>
		                    <p><?php echo $dichvu[$i]['mota'];?></p></div></a>
		                    <!--<div class="work-bottom">
		                        <a class="big-link-2 view-work" href="./upload/hinhanh/<?php echo $dichvu[$i]['photo'];?>"><span class="icon_search"></span></a>
		                        <a class="big-link-2" href="./bo-suu-tap/<?php echo $dichvu[$i]['tenkhongdau'];?>-<?php echo $dichvu[$i]['id'];?>"><span class="icon_link"></span></a>
		                    </div>-->
		                </div>
	                </div>
						<?php } ?>
	            </div>
	        </div>
        </div>
