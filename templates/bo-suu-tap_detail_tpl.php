<div class="presentation-container">
        	<div class="container">
        		<div class="row">
	        		<div class="col-sm-12 wow fadeInLeftBig">
	            		<h1><?php echo $chitietalbum['ten'];?></h1>
	            		
	            	</div>
            	</div>
        	</div>
        </div>

        <!-- Slider -->
        <div class="slider-container">
	        <div class="container">
            <div class="slider">
                <div class="flexslider">
                    <ul class="slides">

	            
						<?php for($i=0; $i<count($dichvu);$i++){?>                     
					 <li>
                            <img src="./upload/hinhanh/<?php echo $dichvu[$i]['photo'];?>">
                            <div class="flex-caption">
                            	<?php echo $dichvu[$i]['mota'];?>
                            </div>
                        </li>
						<?php } ?>
                       
                    </ul>
                </div>
            </div></div>
        </div>

        <!-- Presentation -->
        
