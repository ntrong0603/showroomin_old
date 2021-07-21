<style>
	.form_dathang input[type='password'], .form_dathang input[type='text'], .form_dathang input[type='email'], .form_dathang input[type='date'] {
		    border: 1px solid #b7b7b7;
		    width: 100%;
		    padding: 15px 10px;
			margin: 5px 0px;

	}
</style>
<div class="container-fruid">
	<div class="gianhang">
		<div class="x2"><a href="javascript:void(0)" id="close2"><span>X</span></a></div>
		<div class="col-xs-12 bkg-bar-top" >
			<div class="col-xs-1 x quaylaigianhang tab-tog">
				<a href="javascript:void(0)" style="color: #666666;" id="close"><img src="../../template_vr/images/quay_lai_showroom.png" alt="Quay lại showroom"></a>
			</div>
			<div class='bar-top'>
				<div class="tab-tog selected-tog ">
					<span style="padding: 2px 8px; color:#3399cc;">1</span><a onclick="giohang()" href="javascript:void(0)"> Giỏ hàng</a>
				</div>
				<div class="tab-tog selected-tog active-tab">
					<span style="padding: 2px 8px; color:#3399cc;">2</span><a href="javascript:void(0)"> Thanh toán</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		
		
		<div class="col-xs-12" style="padding: 0.5em 0px;background-color: #df0024; display:none;">
			<div class="col-xs-6 style-giohang" style="padding: 0px;">
				<div class="giohang2"><a href="javascript:void(0)" onclick="giohang()"> <img src="./images/ico_giahang.png" class="icon_giohang" alt="giỏ hàng" width="30px"> Giỏ hàng (<i class="capnhatslsp">1</i>)</a></div>
				<div class="clearfix"></div>
			</div>
			
		</div>
		
		<div class="col-xs-12 gianhang3" style="padding: 22px 16px;">
			<div class='fix-scorll-ball scorll-gianhang' style='overflow: auto;height: 81vh;'>
				<div class="col-xs-12" style="">
					<?php if(!isset($_SESSION['user']['id'])){ ?>
					<div class='form_dangnhap_dathang' style='padding-bottom: 19px;border-bottom: 1px solid #e1e1e1;height: 45vh;margin-bottom:15px;'>
						<div >
							<span style="
							color: #2d2d2d; 
							font-size: 14px;
							font-weight: bold;
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
								Bạn chưa có tài khoản?<a style="font-size: 11px;text-decoration: underline;color: #6f6f6f;margin-left: 6px;font-style: normal;" href="https://<?php echo $config_url;?>/user/register.html" target="_blank" rel="noopener noreferrer" >Đăng ký ngay</a>
							</span>
						</div>
					</div>
				<?php }else{ ?>
					<div class='form_dathang'>
						<div >
							<span style="
							color: #2d2d2d; 
							font-size: 14px;
							font-weight: bold;
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
				<div class="col-xs-12" style="background-color: #f5f5f5; padding: 10px;">
					<div style="margin-bottom: 4px;">
						<span style="
						color: #2d2d2d; 
						font-size: 13px;
						font-weight: bold;
						border-bottom: 1px solid #e1e1e1;
						padding: 5px 0px;">ĐƠN HÀNG</span>
					</div>
					<div class="col-xs-12 item_giohang2_tt" style="padding: 0px;">
						
						
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
