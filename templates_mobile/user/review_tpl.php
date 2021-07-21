 <div id='' class='container' >
		<div id='' class='row' >  
    <div class="col-md-3 ">
   		<?php include _template."user/left.php";?>
   </div>
   <div class="col-md-6" >
   		<div class="bar" ><h1> My reviews</h1></div>
            <div class="clearfix"></div>
            <div class="noidung">
				<?php for($i=0;$i<count($items);$i++){ 
				 $sql='select * from table_place where id= '.$items[$i]['id_place'].' ';
				$d->query($sql);
				$place=$d->fetch_array();
				?>
					
						<div class="col-lg-12" ">
							<div class="item-list item-place">
						  <div class="img col-lg-4">
						  <a class="" href="place/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place['id_tinh']);?>/<?php echo $place['tenkhongdau'];?>-<?php echo $place['id'];?>.html">
						  <img class="img-thongtin img-responsive" src="./upload/sanpham/<?php echo $place['photo'];?>" alt=""></a>
						  </div>
						  <div class="nd_nhadat col-lg-8">
						  							<div id="" class=""> 
							<a class="ten place" href="place/<?php echo get_tenkhongdau("table_tinhthanh_danhmuc",$place['id_tinh']);?>/<?php echo $place['tenkhongdau'];?>-<?php echo $place['id'];?>.html"><?php echo $place['ten'];?></a>
							 </div>
							<div id='' class='' >Ngày: <?php echo date("d/m/Y",$items[$i]['ngaytao']);?> </div>							
							<div id='' class='vote-star' >Đã bình chọn: <input type="hidden" class="rating" value="<?php echo $items[$i]['vote'];?>" data-readonly /> </div>
							<div class="diachi">Nội dung: <?php echo $items[$i]['noidung'];?></div>
							<div id='show-review' class='' > 
								Hình ảnh
								<div id='' class='' > 
									<?php
										$sql='select * from table_review_hinh where id_review= '.$items[$i]['id'].' order by id desc';
											$d->query($sql);
											$review_hinh=$d->result_array();
									?>
									<?php for($a=0;$a<count($review_hinh);$a++){?>
									<img src='./upload/review/<?php echo $review_hinh[$a]['thumb'];?>' alt='' title='' class='img-review' />
									
									<?php } ?>

								</div>
							</div>
							<div class="clearfix"></div>
						
						  </div>
						  <div class="clearfix"></div>
						  </div>
						  </div>
				<?php } ?>
            </div>
   </div>

</div>
  </div>