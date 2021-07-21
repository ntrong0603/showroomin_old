
 <div id='' class='' style='background: #f2f2f2' > 
 <div class=" container">
            <div class="row ">
            <div class="" >
           

			
<!--*===================VR=======================-->
 <?php
							if( isset( $_GET['p'] ) ){
								$sql='select * from table_product where id='.$_GET['p'];
								$d->query($sql);
								$curent_product=$d->fetch_array();
								$prod="/index.php?iddm=".$curent_product['id_danhmuc']."&idsp=".$curent_product['id'];
								
								//them 1 luot xem
								$luotxem=$curent_product['luotxem']+1;
								$sql_luotxem = "update table_product set luotxem=".$luotxem." where id=".$_GET['p'];
								$d->query($sql_luotxem);
							}elseif(isset( $_GET['c'] )){
								$prod="/index.php?iddm=".$_GET['c'];
								
							}else{
								$prod='';
							}
					  ?>
<!-- Popup VR-->
<?php 
			$sql="select * from table_product_danhmuc where id_place='".$chitietsanpham['id']."'";
			$d->query($sql);
			$dsDanhMuc_VR_TR=$d->result_array();;
		?>
		<?php if(count($dsDanhMuc_VR_TR)>0){ ?>
	<div style='    background-color: #f2f2f2;display: flex;width: 100%;padding: 5px;align-items: center;'>
		
		<span style='font-size:12px;font-weight:bold;color:#4c4c4c;margin-right: 5px;'>Danh mục: </span>
		<div class="custom-select" style="width:270px;">
		  <select>
			<option value="0">Chọn danh mục:</option>
			<?php for($i=0;$i<count($dsDanhMuc_VR_TR);$i++){?>
			
			<option value="<?php echo $dsDanhMuc_VR_TR[$i]['id']; ?>"><?php echo $dsDanhMuc_VR_TR[$i]['ten']; ?></option>
			
			<?php }?>
		  </select>
		</div>
		<script>
		var x, i, j, selElmnt, a, b, c;
		/*look for any elements with the class "custom-select":*/
		x = document.getElementsByClassName("custom-select");
		for (i = 0; i < x.length; i++) {
		  selElmnt = x[i].getElementsByTagName("select")[0];
		  /*for each element, create a new DIV that will act as the selected item:*/
		  a = document.createElement("DIV");
		  a.setAttribute("class", "select-selected");
		  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
		  x[i].appendChild(a);
		  /*for each element, create a new DIV that will contain the option list:*/
		  b = document.createElement("DIV");
		  b.setAttribute("class", "select-items select-hide");
		  for (j = 0; j < selElmnt.length; j++) {
			/*for each option in the original select element,
			create a new DIV that will act as an option item:*/
			c = document.createElement("DIV");
			c.setAttribute("data-id", selElmnt.options[j].value);
			c.innerHTML = selElmnt.options[j].innerHTML;
			c.addEventListener("click", function(e) {
				/*when an item is clicked, update the original select box,
				and the selected item:*/
				var y, i, k, s, h;
				s = this.parentNode.parentNode.getElementsByTagName("select")[0];
				h = this.parentNode.previousSibling;
				for (i = 0; i < s.length; i++) {
				  if (s.options[i].innerHTML == this.innerHTML) {
					s.selectedIndex = i;
					h.innerHTML = this.innerHTML;
					y = this.parentNode.getElementsByClassName("same-as-selected");
					for (k = 0; k < y.length; k++) {
					  y[k].removeAttribute("class");
					}
					
					this.setAttribute("class", "same-as-selected");
					test();
					break;
				  }
				}
				h.click();
			});
			b.appendChild(c);
		  }
		  x[i].appendChild(b);
		  a.addEventListener("click", function(e) {
			  /*when the select box is clicked, close any other select boxes,
			  and open/close the current select box:*/
			  e.stopPropagation();
			  closeAllSelect(this);
			  this.nextSibling.classList.toggle("select-hide");
			  this.classList.toggle("select-arrow-active");
			});
		}
		function closeAllSelect(elmnt) {
		  /*a function that will close all select boxes in the document,
		  except the current select box:*/
		  var x, y, i, arrNo = [];
		  x = document.getElementsByClassName("select-items");
		  y = document.getElementsByClassName("select-selected");
		  for (i = 0; i < y.length; i++) {
			if (elmnt == y[i]) {
			  arrNo.push(i)
			} else {
			  y[i].classList.remove("select-arrow-active");
			}
		  }
		  for (i = 0; i < x.length; i++) {
			if (arrNo.indexOf(i)) {
				
			  x[i].classList.add("select-hide");
			}
		  }
		}
		/*if the user clicks anywhere outside the select box,
		then close all select boxes:*/
		document.addEventListener("click", closeAllSelect);
		function test(){
			var e=document.getElementsByTagName("select")[0];
			if(parseInt(e.options[selElmnt.selectedIndex].value)>0){
				gianhang(e.options[selElmnt.selectedIndex].value);
			}
		}
		</script>

		
	</div>
		<?php }?>
	<!-- End Popup VR-->
	<div > 
		<script>
		$( document ).ready(function() {
			$("body").on("click","#recallme",function(){
				
				number=$("#recallme-number").val();
				link="https://<?=$_SERVER['SERVER_NAME'];?><?=$_SERVER['REQUEST_URI']?>";
					
					$.ajax({
							type:"get",
							url:"ajax/sodienthoai.php",
							data:"dienthoai="+number+"&url="+link,
							async:false,
							success:function(kq3){
								
								if(kq3=='1'){
									alert("Nhân viên sẽ gọi lại cho bạn trong thời gian sớm nhất");
								}else{
									alert("Đăng ký thất bại");
								}
							}
						})
					
				
			})
			$("body").on("click",".chuaquantam",function(){
				
				login=$(this).attr('value');
				if(login=='chualogin'){
					alert("Bạn cần đăng nhập để theo dõi Showroom này! ");
				}else{
					//ajax thêm quan tâm
					iduser='<?php echo $_SESSION['user']['id'];?>' ;
					idyeuthich=<?php echo $chitietsanpham['id'];?> ;
					$.ajax({
							type:"get",
							url:"ajax/quantam.php",
							data:"id_user="+iduser+"&table=place"+"&id_yeuthich="+idyeuthich,
							async:false,
							success:function(kq){
								$(".quantam").html(kq);
							}
						})
					
				}
			})
			$("body").on("click",".daquantam",function(){
					
					//ajax xóa quan tâm
					iduser='<?php echo $_SESSION['user']['id'];?>' ;
					idyeuthich=<?php echo $chitietsanpham['id'];?> ;
					
					$.ajax({
							type:"get",
							url:"ajax/xoaquantam.php",
							data:"id_user="+iduser+"&table=place"+"&id_yeuthich="+idyeuthich,
							async:false,
							success:function(kq2){
								
								$(".quantam").html(kq2);
							}
						})
					
				
			})
			
			if_width=$('#if_360').width();
			
			$('#if_360').height($( window ).height()-65);
			
			$('#show-noidung').on('click',function(){
				$('.noidungchitiet').toggle(500);
				if($(this).val()!='open'){
				$('#show-noidung').text('Đóng lại');
				$('#show-noidung').val('open');
				}else{
						$('#show-noidung').text('Xem thêm');
				$('#show-noidung').val('close');
				}
			})
			$.lockfixed("#scroll-map", {offset: {top: 20, bottom: 200} });
		})
		
		$("input.rating").rating();
		</script>
		 
						<iframe allowfullscreen style='width: 100%; border: none; /*margin-top: 20px;*/' id='if_360' src="<?php echo $chitietsanpham['dientich2'].$prod;?>"></iframe>
	</div>
<!--*===================END VR=======================-->
	<div id='' class='clearfix' >  </div>
	
	<div id='' class='main-detail-2' >
	<div id='' class='row' >
	
			<div id='' class='' > 
					<div  class='col-sm-6 ' > 
					<div id='dien-thoai-tu-van'  > 
						<div id='' class='text' > Gọi ngay hoặc để lại số điện thoại để được tư vấn miễn phí</div>	
							<div id='' class='goituvan' > 
								<div id='' class='call-button' > 
									<a href="tel://<?php if( $chitietsanpham['dienthoai']!='' ){echo $chitietsanpham['dienthoai'];}else{ echo $setting['dienthoai']; }?> "> <div id='' class='call-number' > <?php if( $chitietsanpham['dienthoai']!='' ){echo $chitietsanpham['dienthoai'];}else{ echo $setting['dienthoai']; }?> </div><img src='./images/icon-call.png' alt='' title='' /></a>
										<div id='' class='clearfix' >  </div>
									</div>
								<div id='' class='recall-button' >
								
								<input id='recallme-number' type='text' placeholder='Nhập số điện thoại' value='<?php if( isset( $_SESSION['user']) ){echo  $_SESSION['user']['dienthoai']; } ?>' />
								<img id='recallme' src='./images/icon-recall.png' alt='' title='' /></div>
								<div id='' class='clearfix' >  </div>
							
							</div>
					</div>
					</div>
					<div class='col-sm-6  text-center' >  
					<div id='ma-giam-gia'  >  
					<?php if( !isset( $_SESSION['user'] ) ){?>
					
						<a href="user/login.html" target='_blank' ><button class="btn-dangnhap">Đăng nhập</button></a>
						<div id='' class='' > để nhận ngay mã </br> giảm giá <span>3%</span> </div>
						<?php }else{ ?>
							<div id='' class='xemmagiam' > Click xem </br> <span><a href='./user/khuyen-mai.html'  target='_blank'  >Mã giảm giá</a> </span> </br> của bạn </div>
						<?php } ?>
					</div>
					</div>
					<div id='' class='clearfix' >  </div>
				</div>
				<div id='' class=' col-sm-12' >
					<div id='' class='ekko' > 
						<div id='' class='' > 
							<img src='./images/icon-vred.png' alt='' title='' /> Đối tác cao cấp nhất
						</div>
						<div id='' class='' > 
							<img src='./images/icon-vred.png' alt='' title='' /> Giá gốc từ nhà sản xuất
						</div>
					</div>
				</div>
<!--*===================MAP=======================-->
		<div id='' class='col-sm-6' >
	
			<h1 class='ten' ><span style='padding-right: 15px;' ><?php echo $chitietsanpham['ten'];?></span>
			
				<div id='' class='quantam' > 
					<?php if( !isset( $_SESSION['user'] ) ){ ?>
					<button class='chuaquantam' value='chualogin' >Quan tâm</button>
					<?php }else{
						$sql_quantam="select * from table_yeuthich where id_user=".$_SESSION['user']['id']." and tablename='place' and id_yeuthich=".$chitietsanpham['id'];
						$d->query($sql_quantam);
						$tam=$d->result_array();
						if(count($tam)>0){
						?>
						
				<button class='daquantam'>Đã quan tâm</button>
						<?php } else{ ?>
						
					<button class='chuaquantam' value='dalogin'>Quan tâm</button>
					<?php } ?>
					<?php } ?>
				</div>
			</h1>
			<?php
			//thong ke vote
			$sql='select AVG(vote) as star from table_review where status=1 and id_place= '.$chitietsanpham['id'];
			$d->query($sql);
			$star=$d->fetch_array();
		
							$sql='select id from table_review where status=1 and id_place= '.$chitietsanpham['id'];
							$d->query($sql);
							$star_count=$d->result_array();
							?>
			<div style='    margin: 15px 0px;' ><span class='vote-star'> <input type="hidden" class="rating" value="<?php echo $star['star']; ?>" data-readonly /></span> <span class='danhgia font-light'> <?php echo count($star_count);?> đánh giá</span></div>
			<div class='thongtin' >	<span class='diachi'></span><?php echo $chitietsanpham['diadiem'].', '.diachi($chitietsanpham['id_tinh'],$chitietsanpham['id_huyen'],$chitietsanpham['id_phuong']);?><div id='' class='clearfix' >  </div></div>
			<div class='thongtin' ><span class='dienthoai'></span> <?php echo $chitietsanpham['dienthoai'];?> <div id='' class='clearfix' >  </div></div>
			<div class='thongtin' ><span class='website'></span>www.showroomin.com<div id='' class='clearfix' >  </div></div>
			<div class='noidung' >  
			
			
			<div id='' class='noidungchitiet' > <?php echo stripslashes($chitietsanpham['mota']);?> </div>
			<a id='show-noidung' value='open' class='xemthem font-light' >Xem thêm</a>
			</div>
			<!--============review============================-->
				<div id='' class='blank-20' >  </div>
				<form action='' method='POST' enctype="multipart/form-data" >
				<div id='' class='delaidanhgia font-medium' > Để lại đánh giá cho <span class='ten' ><?php echo $chitietsanpham['ten'];?></span> </div>
				<div id='' class='haydelaireview font-light' > Hãy để lại review giúp chúng tôi hoàn thiện hơn. Cám ơn bạn! </div>
				
				<div id='' class='danhgia2' > Đánh giá:  <span class='vote-star'><input type="hidden" name='vote' class="rating" value='4' required /></span> </div>
				
				<textarea class='nhanxet' name='noidung' class='chonanh' placeholder="Nhận xét" required></textarea></br>
				
				
				<div id='' class='anhdachon' > 
				
					<script>
					
						window.onload = function(){
																//Check File API support
									if(window.File && window.FileList && window.FileReader)
									{
										var filesInput = document.getElementById("filesanh");
										filesInput.addEventListener("change", function(event){
											var files = event.target.files; //FileList object
											var output = document.getElementById("result");
											output.innerHTML="";
											if(files.length>5){
												maxupload=5;
											}else{
												maxupload=files.length;
											}
											for(var i = 0; i< maxupload; i++)
											{
												var file = files[i];
												//Only pics
												if(!file.type.match('image'))
													continue;
												var picReader = new FileReader();
												picReader.addEventListener("load",function(event){
													var picFile = event.target;
													var div = document.createElement("span");
													div.innerHTML = "<img class='itemanh' src='" + picFile.result + "'" +
													"title='" + picFile.name + "'/>";
													output.insertBefore(div,null);
												});
												//Read the image
												picReader.readAsDataURL(file);
											}
										});
									}
									else
									{
										console.log("Your browser does not support File API");
									}
								}	
					</script>
				<span  id='result' >  </span>
				<label for="filesanh" class="chonanh"></label>
				<input id="filesanh"  name="picture[]"   multiple="multiple" style="visibility:hidden;" type="file">
				
				
				</div>
			
				
				<button type='submit' name='submit' class='guidanhgia' >Gửi</button>
				</form>
					<div id='' class='blank-20' >  </div>
				<div id='show-review' class='' > 
					<div id='' class='danhgiatunguoikhac' > Đánh giá từ người khác </div>
					<?php
			
			$sql='select * from table_review where status=1 and id_place= '.$_GET['id'].' order by id desc';
			$d->query($sql);
			$reviews=$d->result_array();
			
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=10;
			$maxP=10;
			$paging=paging_home($reviews, $url, $curPage, $maxR, $maxP);
			?>
			<?php for($i=0;$i<count($reviews);$i++){ ?>
					<div id='' class='row' > 
					<div id='' class='col-xs-12' >
						<div id='' class='item-review' >  
						<!--<img src='<?php echo avatar_user($reviews[$i]['id_user']);?>' alt='' title='' class='img-user' />-->
						<div id='' class='' > <span class='vote-star'><input type="hidden" class="rating" value="<?php echo $reviews[$i]['vote'] ;?>" data-readonly /></span> </div>
						
						<div id='' class='tenuser' > bởi <b><?php echo ten_user($reviews[$i]['id_user']);?></b> | <span class='date'><?php echo date("d/m/Y",$reviews[$i]['ngaytao']);?></span></div>
						</div>
						<div id='' class='noidung' ><?php echo $reviews[$i]['noidung'];?>
						<!--<a href='#' class='xemthem' >mở rộng</a>-->
						</div>
						<div id='' class='' > 
							<?php
								$sql='select * from table_review_hinh where id_review= '.$reviews[$i]['id'].' order by id desc';
									$d->query($sql);
									$review_hinh=$d->result_array();
							?>
							<?php for($a=0;$a<count($review_hinh);$a++){?>
							<img src='./upload/review/<?php echo $review_hinh[$a]['thumb'];?>' alt='' title='' class='itemanh' />
							
							<?php } ?>
						</div>
					</div>
					
					<div id='' class='clearfix' >  </div>
					</div>
			<?php } ?>
					
		<div class="text-left pagination" style='margin: 0px;'>
        <div class="phantrang" ><?php echo $paging['paging']?></div>
		</div> 
				</div>
			<!--============END review============================-->
		</div>
		<div class="col-sm-6">
	
		<div id="scroll-map">
						<style>
							#fr_chitiet .form-group *{
								max-width: 100% !important;
							}
							#fr_chitiet .form-group{
								width: 25% !important;
								float:left;
								margin-left:0px !important;
								margin-right:0px !important;
							}
						</style>
				<!--		<form id='fr_chitiet' class="form-horizontal" action='' method='POST'>
          <div class="form-group">
           
            <select class="form-control" name="soluong" id="location1">
              <option value="0">All result</option>
              <option value="1"  <?php if( isset( $_POST['soluong'] ) and $_POST['soluong']==1 ){echo "selected"; }?> >1 results</option>
              <option value="2" <?php if( isset( $_POST['soluong'] ) and $_POST['soluong']==2 ){echo "selected"; }?> >2 results </option>
              <option value="3" <?php if( isset( $_POST['soluong'] ) and $_POST['soluong']==3 ){echo "selected"; }?> >3 results</option>
              <option value="5" <?php if( isset( $_POST['soluong'] ) and $_POST['soluong']==5 ){echo "selected"; }?> >5 results</option>
              <option value="10" <?php if( isset( $_POST['soluong'] ) and $_POST['soluong']==10 ){echo "selected"; }?> >10 results</option>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="khoangcach" id="type1">
              <option value="1"  <?php if( isset( $_POST['khoangcach'] ) and $_POST['khoangcach']==1 ){echo "selected"; }?> >< 1km</option>
              <option value="5"  <?php if( isset( $_POST['khoangcach'] ) and $_POST['khoangcach']==5 ){echo "selected"; }?> <?php if( !isset( $_POST['khoangcach'] ) ){echo "selected"; }?> >< 5km</option>
              <option value="10"  <?php if( isset( $_POST['khoangcach'] ) and $_POST['khoangcach']==10 ){echo "selected"; }?> ><10km</option>
            </select>
          </div>
        <div class="form-group">
      
		<select class="form-control" name='cat'>
				<option value="0" >Chọn danh mục</option>
				<?php 
					
						echo get_main_danhmuc($d,0,$_POST['cat']);

				
					
					
				?>
		</select>

			
          </div>
    
          <p class="form-group"><button type='submit' class="btn btn-danger glyphicon glyphicon-search" role="button"></button></p>
		  <div id='' class='clearfix' >  </div>
        </form>-->
		
		
				 <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD08Z_FJeaSiU1dOf_12nFo5rQqLRUgP-w" type="text/javascript"></script>

				 <div id="map2" style="height: 390px; width: 100%;"></div>
                        	<script type="text/javascript">
    var locations = [
	 ['<strong style="color:red"><?=$chitietsanpham['ten']?></strong><br><small style="color:black"><?=$chitietsanpham['diachi']?> - <?=$chitietsanpham['dienthoai']?></small>', <?php echo $chitietsanpham['lat'];?> ,<?php echo $chitietsanpham['lng'];?> , <?php echo $i+1;?>, '<?php echo BASE_URL;?>upload/sanpham/<?php echo get_icon($chitietsanpham['id_danhmuc']);?>',"<?php echo BASE_URL;?>nha-dat-ban/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$chitietsanpham['id_tinh']);?>/<?php echo $chitietsanpham['tenkhongdau'];?>-<?php echo $chitietsanpham['id'];?>.html"],
    
	<?php for($i=0; $i<count($place);$i++){ if($place[$i]['lat']!=''){?>
      ['<strong style="color:red"><?=$place[$i]['ten']?></strong><br><small style="color:black"><?=$place[$i]['diachi']?> - <?=$place[$i]['dienthoai']?></small>', <?php echo $place[$i]['lat'];?>,<?php echo $place[$i]['lng'];?> , <?php echo $i+1;?>, '<?php echo BASE_URL;?>upload/sanpham/<?php echo get_icon($place[$i]['id_danhmuc']);?>',"<?php echo BASE_URL;?>nha-dat-ban/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place[$i]['id_tinh']);?>/<?php echo $place[$i]['tenkhongdau'];?>-<?php echo $place[$i]['id'];?>.html"],
    
	<?php }} ?>
    ];

    var map = new google.maps.Map(document.getElementById('map2'), {
      zoom: 14,
      center: new google.maps.LatLng(<?php echo $chitietsanpham['lat'];?>, <?php echo $chitietsanpham['lng'];?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

				//create empty LatLngBounds object
				var bounds = new google.maps.LatLngBounds();
    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) { 
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
		icon: locations[i][4],
		url:locations[i][5]
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
    }
	
//now fit the map to the newly inclusive bounds
	map.fitBounds(bounds);
	map.panToBounds(bounds);
	
	


 



  </script>
                </div>
<!--*===================END MAP=======================-->
		</div>
	<div id='' class='clearfix' >  </div>
		</div>

 </div>
 </div>
 </div>
 </div>


