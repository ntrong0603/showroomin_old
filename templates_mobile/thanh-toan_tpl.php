<link href="./template_vr/css/style<?php echo $mobile; ?>.css" rel="stylesheet">

<div class="container">
	
	<div class="gianhang">
		
		<div class="col-xs-12 gianhang3" style="padding: 22px 16px;">
			<div class='fix-scorll-ball scorll-gianhang' style='overflow: auto;height: 81vh;'>
				<div class="col-xs-12" style="">
					<?php if(!isset($_SESSION['user']['id'])){ ?>
					<div class='form_dangnhap_dathang' style='padding-bottom: 19px;border-bottom: 1px solid #e1e1e1;height: 45vh;margin-bottom:15px;'>
						<div >
							<span style="
							color: #2d2d2d; 
							font-size: 14px;
							font-weight: 500;
							border-bottom: 1px solid #e1e1e1;
							padding: 5px 0px;">
								ĐĂNG NHẬP
							</span>
						</div>
						<form id="login" action="" method="post" accept-charset="utf-8"  autocomplete=off style="color:#757575;    margin: 10px 0px;">
							<div>
								<input type="email" name="user" id="user" value="" placeholder="Số điện thoại / Email" >
							</div>
							<div >
								<input type="password" name="password1" id="password1" value="" placeholder="Mật khẩu">
							</div>
							<div style="margin:4px 0px;display: flex;align-items: center;">
								<div style="display: block;float: left;"><input type="submit" name="dangnhap" id='dangnhap' value="Đăng nhập"></div>
								<div style="display: block;float: left;"><a style="font-size: 11px;text-decoration: underline;color: #6f6f6f;font-style: italic;margin-left: 6px;" href="javascript:void()">Quên mật khẩu?</a></div>
								<div class="clearfix"></div>
							</div>
						</form>
						<div >
							<span style="position: absolute;bottom: 19px;font-size: 11px;font-style: italic;">
								Bạn chưa có tài khoản?<a style="font-size: 11px;text-decoration: underline;color: #6f6f6f;margin-left: 6px;font-style: normal;" href="https://showroomin.vn/user/register.html" target="_blank" rel="noopener noreferrer" >Đăng ký ngay</a>
							</span>
						</div>
					</div>
				<?php }else{ ?>
					<div class='form_dathang'>
						<div >
							<span style="
							color: #2d2d2d; 
							font-size: 14px;
							font-weight: 500;
							border-bottom: 1px solid #e1e1e1;
							padding: 5px 0px;">
								THÔNG TIN ĐẶT HÀNG
							</span>
						</div>
						<div >
							<form name="dathang" action="" method="post" accept-charset="utf-8" style="color: #666666;">
								<div class="title_dathang">Họ tên</div>
								<div>
									<input type="text" name="hoten" value="<?php echo @$_SESSION['user']['name'];?>" id="hoten" placeholder="Người đặt hàng">
								</div>
								<div class="title_dathang">Điện thoại</div>
								<div><input type="text" name="dienthoai" id="dienthoai" value="<?php echo @$_SESSION['user']['dienthoai'];?>" placeholder="Số điện thoại"></div>
								<div class="title_dathang">Email</div>
								<div><input type="email" name="email" id="email" value="<?php echo @$_SESSION['user']['email'];?>" placeholder="Email"></div>
								<div class="title_dathang">Địa chỉ</div>
								<div><input type="text" name="diachi" id="diachi" value="<?php echo @$_SESSION['user']['diachi'];?>" placeholder="Địa chỉ nhận hàng"></div>
								<div class="title_dathang">Ghi chú</div>
								<div><textarea name="ghichu" id="ghichu"></textarea></div>
								<input type="hidden" class="" name="id_user" value="<?php echo @$_SESSION['user']['id'];?>" />
								<!--<div style='width: max-content;z-index: 10;bottom: 5px;'><input type="button" class="dathang2" name="dathang" value="Đặt hàng"></div>-->
							</form>
						</div>
					</div>
				<?php }?>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-12" style="background-color: #f5f5f5; padding: 20px;">
					<div style="margin-bottom: 4px;">
						<span style="
						color: #2d2d2d; 
						font-size: 13px;
						font-weight: 500;
						border-bottom: 1px solid #e1e1e1;
						padding: 5px 0px;">ĐƠN HÀNG</span>
					</div>
					<div class="col-xs-12 item_giohang2_tt" style="padding: 0px;">
						<?php 
						$result_cart=$_SESSION['cart'];

						$mobile=$_POST['mobile'];

						$result_gioh="";
						$tonggia=0;
						if(count($result_cart)>0){
							$result_gioh.="<div class='fix-scorll-ball' style=''>";
							for($i_gioh=0; $i_gioh<count($result_cart); $i_gioh++){

								$d->reset();
								$sql="select * from table_product where id='".$result_cart[$i_gioh]['productid']."'";
								$d->query($sql);
								$item=$d->fetch_array();
								$new_price=$item['gia']-($item['khuyenmai']*$item['gia'])/100;
								$tonggia+=($new_price*$result_cart[$i_gioh]['qty']);

								$result_gioh.="<div class='item_gh' style='margin:17px 0px;'>";
								$result_gioh.="<div class='col-xs-4' style='padding: 0px;'>";
								$result_gioh.="<img src='./../../"._upload_sanpham_l.$item['photo']."' width='100%' alt='sản phẩm' title='sản phẩm'>";
								$result_gioh.="</div>";
								$result_gioh.="<div class='col-xs-8' style='padding: 0px;padding-left: 13px;'>";
								$result_gioh.="<div class='col-xs-6' style='font-size: 12px;color: #252525;    padding: 2px 0px;'>".$item['ten']."</div>";
								$result_gioh.="<div class='col-xs-1' style='font-size: 12px;color: #252525;padding: 0px;text-align: center;'>".$result_cart[$i_gioh]['qty']."</div>";
								$result_gioh.="<div class='col-xs-5' style='font-size: 12px;color: #ff0000;font-weight: 500;padding: 2px 0px;'>".number_format($new_price,0,'','.')."";
								if($item['khuyenmai']>0){
								$result_gioh.="<div>";
								$result_gioh.="<i class='price-old giacu giagoc' style='font-size: 11px;font-weight: normal;padding: 0px; color:#2d2d2d;' data-gia=''>".number_format($item['gia'],0,'','.')."</i>";
								$result_gioh.="</div>";
								}
								$result_gioh.="</div>";
								
								$result_gioh.="</div>";
								$result_gioh.="<div class='clearfix'></div>";
								$result_gioh.="</div>";
								
							}
							$result_gioh.="<input type='hidden' id='spluongsp' name='soluongsp' value='".count($result_cart)."'>";
							$result_gioh.="<input type='hidden' id='tongtien' name='tongtien' value='".$tonggia."'>";
							$result_gioh.="</div><div>";
							$result_gioh.="<div style='width: 100%;border: 1px solid #ccc;margin-top: 10px;'></div>";
							$result_gioh.="<div style='margin: 10px 0px;font-size: 13px;color:#2d2d2d;'>Thành tiền: <span style='color: #ff0000;font-weight: 500; float: right;'>".number_format($tonggia,0,'','.')." VNĐ</span> <br/> <span style='font-size: 11px;float: right;color:#2d2d2d;font-style:italic;'>Đã bao gồm thuế VAT</span></div>";
							
							$result_gioh.="</div>";
						}
						$result_gioh.="<div class='clearfix'></div>";
						echo "".$result_gioh;
						?>
						
					</div>
					<div class="clearfix"></div>
					<?php if(isset($_SESSION['user']['id'])){ ?>
					<div style='z-index: 10;bottom: 5px;    text-align: center;    padding: 15px 0px;'><input style='border: 2px solid #ff0000;background-color: #ff0000;font-weight: 500;color: #fff;padding: 5px 15px;border-radius: 5px;font-size: 11px;' type="button" class="dathang2" name="dathang" value="Đặt hàng"></div>
					<?php }?>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
