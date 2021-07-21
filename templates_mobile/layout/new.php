<div class="wrap block carousel_block">
            <div class="container">
	            <div class="col-lg-12">
		<div class="row row-content dichvu">
			<h2 class="ttdichvu">Dịch vụ <span class="text-primary">Tư vấn - Hướng dẫn </span> mua nhà</h2>

		
    <div class="subheader">
      <div class="dots"></div>
      <p>HỖ TRỢ NHIỆT TÌNH - ĐÁNH GIÁ KHÁCH QUAN</p>
      <div class="dots"></div>
    </div>
    <p class="nddichvu">Bạn ở tỉnh lên thành phố tìm mua nhà?</p>
    <p class="nddichvu">Bạn không rành đường thành phố?</p>
    <p class="nddichvu">Bạn cần một người tìm kiếm thông tin giúp bạn?</p>
    <p class="nddichvu">Bạn cần một người hiểu rõ thông tin nhà đất, các thủ tục mua bán nhà?</p>
    <p class="nddichvu">Bạn cần một người chở bạn đi, tư vấn, góp ý cho bạn?</p>
    <h3>CHÚNG TÔI SẼ GIÚP BẠN. LIÊN HỆ NGAY 0904378279</h3>
</div>
</div>
	</div>
	            
	            
            	
				<?php 
										   $sql = "select * from #_place where hienthi=1  order by rand() limit 4";
												  $d->query($sql);
												  $place = $d->result_array();
										  ?>
            	<div class="container">
	            	<h2 class="upper">Nhà, căn hộ có thể bạn quan tâm</h2>
                            <?php for($i=0;$i<count($place);$i++){?>
                           
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="item_nhapho">
          <div class="hinhnhapho">
	          <a href="nha-dat-ban/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html" />
		  <img src="./upload/sanpham/<?php echo $place[$i]['photo'];?>" alt="<?php echo $place[$i]['ten'];?>" /></a>
          </div>
          <div class="noidungnha">
          <a href="nha-dat-ban/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html">
		  <?php echo $place[$i]['ten'];?></a>
          <span class="label label-success dientich"><?php echo $place[$i]['dientich'];?> m2</span>
          <span class="label label-warning gianha">Giá <?php echo chuyentien($place[$i]['gia']);?></span>
          <div class="diachinha"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span><?php echo $place[$i]['diadiem'].', '.diachi($place[$i]['id_tinh'],$place[$i]['id_huyen'],$place[$i]['id_phuong']);?></div>
          
          <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
          </div>
          <div class="times"><?php echo "Ngày ".date("d",$place[$i]['ngaytao'])." tháng ".date("m",$place[$i]['ngaytao'])." năm ".date("Y",$place[$i]['ngaytao']);?></div>
          </div>
        </div>
                            
                            
							
							<?php } ?>
                                                                                                      
                                              
                    </div>                
                              
            </div>
        </div>   