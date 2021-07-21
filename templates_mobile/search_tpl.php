	
	<script>
	
	
	</script>

 <div id='' class='' style='background: #f2f2f2' > 
 <div class=" container">
            <div class="row">
            <div class="main ">
            <div class="row ">
			<ul class="nav nav-tabs tab-login">
				  <li class="active"><a data-toggle="tab" href="#ket-qua">Kết quả</a></li>
				  <li class=""><a data-toggle="tab" id='tab-map' href="#dia-chi">Địa chỉ</a></li>
				</ul>
				<div id='' class='blank-20' >  </div>
				<div class="tab-content login">
				<div id='locgia' class='text-right' > 
						
						<form action='' method="POST" >
								<span class=''>Bộ lọc</span> 
								<span class=''><input type='number' name='gia1' class='' placeholder='giá thấp nhất' value='<?php echo @$giamin;?>' /></span>
								<span><input type='number' name='gia2' class='' placeholder='giá cao nhất' value='<?php echo @$giamax;?>' /></span>
								
								<input type='submit' id='timgia'  value='' />
						</form>
				
					</div>
				  <div id="ket-qua" class="tab-pane fade in active">
						<div class="col-md-6">
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
								  <a class="" href="place/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html<?php if( isset($place[$i]['product_detail']) ){ ?>&p=<?php echo $place[$i]['product_detail']['id'];?><?php } ?>" >
								  <img  class="img-thongtin img-responsive" src="./upload/sanpham/<?php if( isset($place[$i]['product_detail']) ){echo $place[$i]['product_detail']['photo'];}else{echo $place[$i]['photo'];}?>" alt=""></a>
								  </div>
								  <div class="nd_nhadat col-xs-7">
								  <?php if( isset($place[$i]['product_detail']) ){ ?>
									<div id='' class='' > 
									<a class="ten product" href="place/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html&sp=<?php echo $place[$i]['product_detail']['id'];?>" ><?php echo $place[$i]['product_detail']['ten'];?></a></br>
									 </div>  
									 <div id='' class='' > 
									<span class="gia"><?php echo tien($place[$i]['gia']);?> đ</span>
									 </div>
									<?php  }else{ ?>
									<div id='' class='' > 
									<a class="ten <?php if( $place[$i]['concept']>0 ){echo "concept" ;}else{echo "showroom";} ?>" href="place/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html" ><?php echo $place[$i]['ten'];?></a>
									 </div>
									 <div id='' class='' > 
									<span class="gia"></span>
									 </div>
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
									<?php if( isset($place[$i]['product_detail']) ){ ?>
										<div id='' class='' ><a class="place" href="place/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html" ><?php echo $place[$i]['ten'];?></a></div>
									<?php } ?>
										
								  <?php if( isset($place[$i]['product_detail']) ){ ?>
									
									 <div class="diachi"> <?php echo $place[$i]['product_detail']['mota2'];?></div>
									<?php  }else{ ?>
									<div class="diachi"> <?php echo $place[$i]['mota'];?></div>
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
                </div>
				 <div id="dia-chi" class="tab-pane fade in active ">
				<div class="col-md-6 ">
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
	["<div id='' class='' style='width: 330px;' > <div id='' class='item-list ' > <a class='ten place' href='place/<?php echo get_tenkhongdau('table_tinhthanh_danhmuc',$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html' ><?php echo $place[$i]['ten'];?></a></div><div class='diachi'>Địa chỉ: <?php echo $place[$i]['diadiem'].', '.diachi($place[$i]['id_tinh'],$place[$i]['id_huyen'],$place[$i]['id_phuong']);?></div><div id='' class='' ><?php for($n=0;$n<count($hinhsp);$n++){ ?><div id='' class='col-xs-4' ><img style='width: 100%;' src='./upload/sanpham/<?php echo $hinhsp[$n]['photo'];?>' alt='' title='' /></div><?php } ?></div></div>"
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

		$("input.rating").rating();
  </script>
                </div>
                </div>
                </div>
                </div>
<div id='' class='clearfix' >  </div>
            </div>
            </div>
</div>
</div>