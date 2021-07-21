 <div id='' class='' style='background: #f2f2f2' > 
 <div class=" container">
            <div class="row ">
            <div class="main ">
            <div class="row ">
				<div class="col-md-6 no-padding">
				<h1 class="title">
				<?php 
				$a=1;
				if( isset( $_GET['cate'] ) and $_GET['cate']!='' ){ 
			$sql="select * from table_place_category where id='".$_GET['cate']."'";
			$d->query($sql);
				$danhmucbr=$d->fetch_array(); echo $danhmucbr['ten']." ";
				$a=0;
				}?>
				
				<?php if( isset( $_GET['huyen'] ) and $_GET['huyen']!='' ){ 
						
			$sql="select * from table_tinhthanh_list where id='".$_GET['huyen']."'";
			$d->query($sql);
			$tinhthanhbr=$d->fetch_array();echo $tinhthanhbr['ten'];
				 $a=0;
				 } ?>
				<?php if( isset( $_GET['tinh'] ) and $_GET['tinh']!='' ){ 
						
			$sql="select * from table_tinhthanh_danhmuc where id='".$_GET['tinh']."'";
			$d->query($sql);
			$tinhthanhbr=$d->fetch_array();echo $tinhthanhbr['ten'];
				 $a=0;
				 } ?>
				
				<?php if( $a==1 ){?>
				Kết quả tìm kiếm
				<?php } ?>
				
				
				</h1>
				<div id='' class='blank-40' >  </div>
				</div>
				<div class="col-md-6 no-padding">
					<div id='locgia' class='text-right' > 
						
						<form action='' method="POST"  >
								<span class='boloc'>Bộ lọc</span> 
								<span class='hienthi'>
								Hiển thị <select name='loaiketqua' id='loaiketqua' class='select' >
										<option value='0'  <?php if( $_POST['loaiketqua']=='0' ){ echo " selected ";}?>>Tất cả</option>
										<option value='1'  <?php if( $_POST['loaiketqua']=='1' ){ echo " selected ";}?>>Concept</option>
										<option value='2'  <?php if( $_POST['loaiketqua']=='2' ){ echo " selected ";}?>>Sản phẩm</option>
								</select>
								
								</span>
								<span class='khoanggia'  <?php if( $loai<>0 ){echo "style='display:inline-block'";}?> >
								Khoảng giá 
								<select name='khoanggia1' id='khoanggia1' class='select khoanggiachung'  <?php if( $loai==1 ){echo "style='display:inline-block'";}?> >
										<option value='0-9999999' <?php if( $_POST['khoanggia1']=='0-9999999' ){ echo " selected ";}?> >Tất cả</option>
										<option value='0-10' <?php if( $_POST['khoanggia1']=='0-10' ){ echo " selected ";}?> >Dưới 10 triệu</option>
										<option value='10-20' <?php if( $_POST['khoanggia1']=='10-20' ){ echo " selected ";}?> >10 triệu- 20 triệu</option>
										<option value='20-50' <?php if( $_POST['khoanggia1']=='20-50' ){ echo " selected ";}?> >20 triệu- 50 triệu</option>
										<option value='50-200' <?php if( $_POST['khoanggia1']=='50-200' ){ echo " selected ";}?> >50 triệu- 200 triệu</option>
								</select>
								<select name='khoanggia2' id='khoanggia2' class='select khoanggiachung'  <?php if( $loai==2 ){echo "style='display:inline-block'";}?>>
											<option value='0-9999999' <?php if( $_POST['khoanggia2']=='0-9999999' ){ echo " selected ";}?> >Tất cả</option>
										<option value='0-10' <?php if( $_POST['khoanggia2']=='0-10' ){ echo " selected ";}?> >Dưới 10 triệu</option>
										<option value='10-20' <?php if( $_POST['khoanggia2']=='10-20' ){ echo " selected ";}?> >10 triệu- 20 triệu</option>
										<option value='20-50' <?php if( $_POST['khoanggia2']=='20-50' ){ echo " selected ";}?> >20 triệu- 50 triệu</option>
										<option value='50-200' <?php if( $_POST['khoanggia2']=='50-200' ){ echo " selected ";}?> >50 triệu- 200 triệu</option>
								</select>
								
								</span>
								
								
								<input type='submit' id='timgia'  value='' />
						</form>
						<script>
							$(document).ready(function(){
								$('body').on('change','#loaiketqua',function(){
									if( $('#loaiketqua').val()==0 ){
										$(".khoanggia").css('display','none');
									}else{
									$(".khoanggiachung").css('display','none');
									$(".khoanggia").css('display','inline-block');
									$("#khoanggia"+$('#loaiketqua').val()).css('display','inline-block');
									}
								})
								
							})
						
						</script>
				
					</div>
				</div>
				
				<div id='' class='clearfix' >  </div>
                <div class="col-md-6 no-padding-left">
				
                    <div class="post">
							<?php if(count($place)==0){?>
							</br>
							</br>
									 <h2 class="title">Không tìm thấy sản phẩm như yêu cầu</h2>
							<?php  } ?>
							<?php for($i=0; $i<count($place);$i++){  ?>
                        <div class="" id='map_<?php echo $place[$i]['id'];?>' onmouseover="hover(<?php echo $place[$i]['id'];?>)" onmouseout="out(<?php echo $place[$i]['id'];?>)" >
							<div class="item-list item-<?php if( isset($place[$i]['product_detail']) ){echo "product";}elseif( $place[$i]['concept']>0 ){echo "concept" ;}else{echo "showroom";} ?>">
						 <div class="row">
						 <div class="img col-xs-5">
						  <a class="" href="place/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html<?php if( isset($place[$i]['product_detail']) ){ ?>&sp=<?php echo $place[$i]['product_detail']['id'];?><?php } ?>" >
						  <img  class="img-thongtin img-responsive" src="./upload/sanpham/<?php if( isset($place[$i]['product_detail']) ){echo $place[$i]['product_detail']['photo'];}else{echo $place[$i]['photo'];}?>" alt=""></a>
						  </div>
						  <div class="nd_nhadat col-xs-7">
						  <?php if( isset($place[$i]['product_detail']) ){ ?>
							<div id='' class='' > 
							<a class="ten product" href="place/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html&sp=<?php echo $place[$i]['product_detail']['id'];?>" ><?php echo $place[$i]['product_detail']['ten'];?></a></br>
							 </div>  
							 <div id='' class='' > 
							<span class="gia"><?php echo tien($place[$i]['product_detail']['gia']);?> đ</span>
							 </div>
							<?php  }else{ ?>
							<div id='' class='' > 
							<a class="ten <?php if( $place[$i]['concept']>0 ){echo "concept" ;}else{echo "showroom";} ?>" href="place/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html" ><?php echo $place[$i]['ten'];?></a>
							 </div>
							 <?php if( $place[$i]['concept']>0 ){?>
							 <div id='' class='' > Giá chỉ từ
							<span class="gia"><?php echo tien($place[$i]['giacu']);?> đ</span>
							 </div>
							 <?php } ?>
							<?php } ?>
							<?php
							//thong ke vote
							$sql='select AVG(vote) as star from table_review where status=1 and id_place= '.$place[$i]['id'];
							$d->query($sql);
							$star=$d->fetch_array();
							$sql='select id from table_review where status=1 and id_place= '.$place[$i]['id'];
							$d->query($sql);
							$star_count=$d->result_array();
							?>
							<div id='' class='vote-star' > <input type="hidden" class="rating" value="<?php echo $star['star']; ?>" data-readonly /><span class='danhgia'> <?php echo count($star_count);?> đánh giá</span></div>
							
							<div class="diachi">Địa chỉ: <?php echo $place[$i]['diadiem'].', '.diachi($place[$i]['id_tinh'],$place[$i]['id_huyen'],$place[$i]['id_phuong']);?> <?php //if( $timtheotoado ){ $khoangcach=tien(round($place[$i]['product']*1000)); echo "(Cách  ".$khoangcach."m)";}?></div>
							<div class="diachi">Điện thoại: <?php echo $place[$i]['dienthoai'];?></div>
							<div class="diachi">Nhà sản xuất/Thương hiệu nội thất: </div>
							
							<?php
							if( $place[$i]['brand']>0 ){
								$sql='select * from table_brand where id='.$place[$i]['brand'];
							$d->query($sql);
							$brand=$d->fetch_array();
							
							?>
							<div id='' class='thuonghieu' > <a href='./thuong-hieu-noi-that/<?php echo $brand['tenkhongdau'];?>-<?php echo $brand['id'];?>.html' ><?php echo $brand['ten'];?></a></div>
							
							<?php } ?>
							<div id='' class='danhmuccon' >
							<?php 
									$sql = "select * from table_product_danhmuc where hienthi=1 and id_place='".$place[$i]['id']."'  order by id desc limit 5";
								$d->query($sql);
								$danhmuccon = $d->result_array();
								?>
								<?php for($a=0; $a<count($danhmuccon);$a++){  ?>
								<a href='place/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html&c=<?php echo $danhmuccon[$a]['id'];?>'  >
								<?php echo $danhmuccon[$a]['ten'];?></a>
								<?php } ?>
								<div id='' class='clearfix' >  </div>
							</div>
							<div class="clearfix"></div>
						  <!--<p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>-->
						  </div>
						  <div class="clearfix"></div>
						  </div>
						  </div>
						  </div>	
		  <?php } ?>
                      	<div class="text-right">
 	    <div class="text-right pagination">
        <div class="phantrang" ><?php echo $paging['paging']?></div>
      </div> 
                </div>  
                    </div>
                </div>
				<div class="col-md-6 no-padding-right">
				<div id="scroll-map">
				 <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD08Z_FJeaSiU1dOf_12nFo5rQqLRUgP-w&sensor=false" type="text/javascript"></script>
					<script src="/assets/gmap3.js?body=1" type="text/javascript"></script>   
				 <div id="map2" style="height: 400px; width: 100%;"></div>
                        	<script type="text/javascript">
							var icon1 = "http://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/Map-Marker-Bubble-Azure-icon.png";
					var icon2 = "http://www.clker.com/cliparts/U/8/J/z/5/D/google-maps-icon-blue-th.png";
					var allMarkers = [];
    var locations = [
	<?php for($i=0; $i<count($place);$i++){
		$sql = "select * from #_hinhsp where hienthi=1 and id_sp='".$place[$i]['id']."' and com='place' order by id desc limit 3";
	$d->query($sql);
	$hinhsp = $d->result_array();
		?>
	["<div id='' class='' style='width: 330px;' > <div id='' class='item-list ' style='padding: 0px;' > <a class='ten place' href='place/<?php echo get_tenkhongdau('table_tinhthanh_danhmuc',$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html' ><?php echo $place[$i]['ten'];?></a></div><div class='diachi'></div><div id='' class='' ><?php for($n=0;$n<count($hinhsp);$n++){ ?><div id='' class='col-xs-4' ><img style='width: 100%;' src='./upload/sanpham/<?php echo $hinhsp[$n]['photo'];?>' alt='' title='' /></div><?php } ?></div></div>"
	  , <?php echo $place[$i]['lat'];?> , <?php echo $place[$i]['lng'];?> 
	  , <?php echo $i+1;?>, '<?php echo BASE_URL;?>upload/sanpham/<?php echo get_icon($place[$i]['id_danhmuc']);?>'
	  ,"<?php echo BASE_URL;?>place/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html"
	  ,<?=$place[$i]['id']?>],
	<?php } ?>
    ];
    var map = new google.maps.Map(document.getElementById('map2'), {
      zoom: 15,
	  <?php if( $timtheotoado ){?>
      center: new google.maps.LatLng(<?php echo $lat;?>,<?php echo $lng;?>),
	  <?php }else { ?>
      center: new google.maps.LatLng(<?php echo $place[0]['lat'];?>,<?php echo $place[0]['lng'];?>),
	  <?php } ?>
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
				//create empty LatLngBounds object
				var bounds = new google.maps.LatLngBounds();
    var infowindow = new google.maps.InfoWindow();
    var marker, i;
	<?php if( $timtheotoado ){?>
		marker = new google.maps.Marker({
        position: new google.maps.LatLng(<?php echo $lat;?>, <?php echo $lng;?>),
        map: map,
		 icon: "location3.png"
 });
	<?php } ?>
    for (i = 0; i < locations.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
		 icon: locations[i][4],
		 url: locations[i][5],
		 id: locations[i][6]
      });
			 //extend the bounds to include each marker's position
			  bounds.extend(marker.position);
      google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i)); 
	   google.maps.event.addListener(marker, 'click', function() {
			window.location.href = this.url;
		});
		allMarkers.push(marker);
    }
		//now fit the map to the newly inclusive bounds
		<?php if( $timtheotoado==false ){?>
		map.fitBounds(bounds);
		map.panToBounds(bounds);
		<?php } ?>
	//Function called when hover the div
function hover(id) {
    for ( var i = 0; i< allMarkers.length; i++) {
        if (id === allMarkers[i].id) {
           infowindow.setContent(locations[i][0]);
		    infowindow.open(map,  allMarkers[i]);
           break;
        }
   }
}
//Function called when out the div
function out(id) {  
    for ( var i = 0; i< allMarkers.length; i++) {
        if (id === allMarkers[i].id) {
          infowindow.close(map,  allMarkers[i]);
           break;
        }
   }
}
	$( document ).ready(function() {
$.lockfixed("#scroll-map", {offset: {top: 20, bottom: 200} });
		})
		$("input.rating").rating();
  </script>
                </div>
                </div>
                </div>
<div id='' class='clearfix' >  </div>
            </div>
            </div>
</div>
</div>