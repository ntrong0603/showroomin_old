 <!--planning-->
        <div class="wrap">
	        <div class="listpage container">
                <section>
                	<div class="row">
	                	
                    	<div class="col-lg-9">
                        	<div class="post">
                            	<h1 class="title_list">Căn hộ cao cấp khu vực <?php echo $title_ba;?></h1>
                            	<div class="list">
								
	                            	<?php for($i=0; $i<count($duan);$i++){?>
	                            	<div class="col-lg-4">
											<div class="item_duan">
									  <a class="" href="can-ho-cao-cap/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$duan[$i]['id_tinh']);?>/<?php echo $duan[$i]['tenkhongdau'];?>-<?php echo $duan[$i]['id'];?>.html" >
									  <img class="img-thongtin" src="./upload/duan/<?php echo $duan[$i]['photo'];?>" alt="<?php echo $duan[$i]['ten'];?>" ></a>
									  <div class="noidungnha">
									  <a class="" href="can-ho-cao-cap/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$duan[$i]['id_tinh']);?>/<?php echo $duan[$i]['tenkhongdau'];?>-<?php echo $duan[$i]['id'];?>.html" ><h3><?php echo $duan[$i]['ten'];?></h3></a>
									  <span class="label label-success dientich"><?php echo $duan[$i]['dientich'];?></span>
									  <span class="label label-warning gianha">Giá từ <?php echo chuyentien($duan[$i]['gia']);?></span>
									  <div class="diachinha"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><?php echo $duan[$i]['diadiem'].' '.diachi($duan[$i]['id_tinh'],$duan[$i]['id_huyen'],$duan[$i]['id_phuong']);?></div>
									  
									  									  </div>
									  									  <div class="times"><i class="glyphicon glyphicon-time"></i><?php echo "Ngày ".date("d",$duan[$i]['ngaytao'])." tháng ".date("m",$duan[$i]['ngaytao'])." năm ".date("Y",$duan[$i]['ngaytao']);?></div>
									  </div>
									  </div>
									
									
									<?php if ($i%3==2){ ?>
									 <div class="clearfix"></div>
								<?php } ?>
								<?php } ?>
      
        	<div class="text-center">
 	    <div class="text-center pagination">
        <div class="phantrang" ><?php echo $paging['paging']?></div>
      </div> 
                </div>  
                            	</div>
                        	</div>
						</div>
						<div class="col-lg-3">
                        	 <?php include _template."layout/left.php";?>           
                        </div>
       
                           
                    </div>
                    	                	
                	
                </section>
            </div>
            
	        
	        
	        
	        
	        
	        
                   </div>
        
        <div class="wrap block">
        	<div class="container">
        		
        	</div>
        </div>
        
        
        <!--latest posts-->
		 <?php include _template."layout/new.php";?>   
             
        <!--//latest posts--> 