<?php 
	
	session_start ();

	@define ( '_lib' , './lib/');

	include_once "../../quanly/lib/config.php";
	include_once "../../quanly/lib/constant.php";
	include_once "../../quanly/lib/class.database.php";
	include_once "../../quanly/lib/functions.php";
	include_once "../../quanly/lib/functions_giohang_2.php";
	include_once "../../quanly/lib/file_requick.php";
	
	
	$result_cart=$_SESSION['concept'];

	$mobile=$_POST['mobile'];

	$result_gioh="";
	$tonggia=0;
	if(count($result_cart)>0){
		for($i_gioh=0; $i_gioh<count($result_cart); $i_gioh++){ 

			$d->reset();
			$sql="select * from table_product where id='".$result_cart[$i_gioh]['productid']."'";
			$d->query($sql);
			$item=$d->fetch_array();
			$new_price=$item['gia']-($item['khuyenmai']*$item['gia'])/100;
			$tonggia+=($new_price*$result_cart[$i_gioh]['qty']);
				?>
			<div class='item_gh'>
			<div id='' class='row' > 
				<div class='col-xs-2' style=''>
				
					
					<a href='javascript:void(0)' class='xemchitiet' style='background-color: inherit;padding: inherit;' data-id='<?php echo $item['id'];?>'>
					<img src='./../../<?php echo _upload_sanpham_l.$item['photo'];?>' width='100%' alt='<?php echo $item['ten'];?>' title='<?php echo $item['ten'];?>'>
					</a>
					 
				</div>
				<div class='col-xs-10' >
					<div class='col-md-4' style='display: block;float: left;padding: 0px;padding-left: 10px;'>
						<div style='color: #666666; '>
						<a href='javascript:void(0)' class='xemchitiet' style='background-color: inherit;padding: inherit;font-size: 14px;float:inherit;font-size: 18px; text-transform: uppercase;' data-id='<?php echo $item['id'];?>'>
						<?php echo $item['ten'];?>
						</a>
						</div>
						<div id='' class='' >Đơn giá:  
									<span style='font-weight: bold;font-size: 13px;'>
									<?php echo number_format($new_price,0,'','.');?>
									</span>
									
						</div>
						
						<div id='' class='xemchitiet_concept' >Xem chi tiết <img src='./images/icon-xemchitiet.png' alt='' title='' />  </div>
					</div>
					
						
					
					

					<div class='col-md-4' style='display: block;float: left;'>
					
						Số lượng: <input type='number' style='border-radius: 5px;border: 1px solid #ebebeb;background-color: #fbfbfb;text-align: center;font-size:12px;'  min='0' class='soluongmua2 soluongconcept' value='<?php echo $result_cart[$i_gioh]['qty'];?>' data-id='<?php echo $result_cart[$i_gioh]['productid'];?>'>
					
					
					</div>
					<div id='' class='col-md-4' >
							Thành tiền : <span class='thanhtien' style='color:#ff0000; font-weight: bold;'><?php echo  number_format($new_price*$result_cart[$i_gioh]['qty'],0,'','.') ?></span>
					</div>
					<div id='' class='clearfix' >  </div>
					<div id='' class=''style='border-top: 1px solid #ddd; margin: 10px 0px;' >  </div>
					<div id='' class='mota_concept' > <?php echo $item['mota'];?> </div>
				</div>
			<div class='clearfix'></div>
			</div>
			</div>
			
		<?php } ?>
		<input type='hidden' id='spluongsp' name='soluongsp' value='<?php echo count($result_cart);?>'>
		<input type='hidden' id='tongtienconcept' name='tongtien' value='<?php echo $tonggia;?>'>
	<?php }else{ ?>
		<div class='item_gh'>
		<span style='color: #df0024; font-size: 24px; text-align: center;'>Bạn chưa chọn mua sản phẩm.</span>
		
		</div>
		<input type='hidden' id='spluongsp' name='soluongsp' value='0'>
		<input type='hidden' id='tongtien' name='tongtien' value='0'>
	<?php } ?>
	<div class='clearfix'></div>
	