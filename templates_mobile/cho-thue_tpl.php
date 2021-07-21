<!--planning-->
<div class="wrap">
    <div class="container">
        <section>
            <div class="row pad5">
                <div class="col-lg-9">
                    <div class="post">
                        <h1> Nhà, đất cho thuê khu vực <?php echo $title_ba;?></h1>
                 
		  	<?php for($i=0; $i<count($chothue);$i++){?>
                        <div class="col-lg-6">
				<div class="item_nhadat">
          <div class="img_nhadat"><a class="" href="cho-thue/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$chothue[$i]['id_tinh']);?>/<?php echo $chothue[$i]['tenkhongdau'];?>-<?php echo $chothue[$i]['id'];?>.html" >
		  
		  <img class="img-thongtin" src="./upload/chothue/<?php echo $chothue[$i]['photo'];?>" alt="<?php echo $chothue[$i]['ten'];?>"></a></div>
          <div class="nd_nhadat">
          	<a class="" href="cho-thue/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$chothue[$i]['id_tinh']);?>/<?php echo $chothue[$i]['tenkhongdau'];?>-<?php echo $chothue[$i]['id'];?>.html" ><h2><?php echo $chothue[$i]['ten'];?></h2></a>
		  	<span class="label label-success size16"><?php echo $chothue[$i]['dientich'];?>m2</span>
		  	<span class="label label-warning  size16"><?php echo chuyentien($chothue[$i]['gia']);?> /<?php if( $chothue[$i]['giacu']==0 ){echo "tháng";}else{echo "m2";}?></span>
		  	<div class="khuvuc"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><?php echo $chothue[$i]['diadiem'].', '.diachi($chothue[$i]['id_tinh'],$chothue[$i]['id_huyen'],$chothue[$i]['id_phuong']);?></div>
		  	<div class="times"><?php echo "Ngày ".date("d",$chothue[$i]['ngaytao'])." tháng ".date("m",$chothue[$i]['ngaytao'])." năm ".date("Y",$chothue[$i]['ngaytao']);?></div><div class="clearfix"></div>
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          
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







    </div>

<div class="wrap block">
    <div class="container">
        
    </div>
</div>
<!--Latest news-->

<!--latest posts-->
<?php include _template."layout/new.php";?>

<!--//latest posts-->