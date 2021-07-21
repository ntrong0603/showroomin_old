<?php session_start ();?>

<div class="container-fruid" style='height: 100%;display: flex;align-items: center;'>
	<div class="container gianhang">
		<div class="x2"><a href="javascript:void(0)" id="close2"><span>X</span></a></div>
		<div class="col-xs-12" style="padding:0px;background-color: #ebebeb;margin-bottom: 10px;">
			<div class="x quaylaigianhang tab-tog">
				<a href="javascript:void(0)" style="color: #666666;" id="close"><img src="../../template_vr/images/quay_lai_showroom.png"></a>
			</div>
			<div class="col-md-3 tab-tog selected-tog">
				<span style="padding: 4px 9px;"><img style="margin-bottom: 3px;" src="../../template_vr/images/info_icon.png" alt="Đặt hàng"></span><a href="javascript:void(0)"> Đặt hàng</a>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 gianhang3" style="    padding-top: 50px;
    padding-bottom: 50px;;position:relative;">
			<div class="col-md-6 " style="line-height: 25px;position: relative;    height: 80vh;
    padding: 45px 80px;
    max-height: 400px;">
				<?php if(!isset($_SESSION['user']['id'])){ ?>
				<div class='form_dangnhap_dathang'>
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
							<div style="display: block;float: left;"><input type="submit" name="dangnhap" id='dangnhap' value="Đăng nhập" style='padding: 0px 15px;'></div>
							<div style="display: block;float: left;"><a style="font-size: 11px;text-decoration: underline;color: #6f6f6f;font-style: italic;margin-left: 6px;" href="javascript:void()">Quên mật khẩu?</a></div>
							<div class="clearfix"></div>
						</div>
					</form>
					<div >
						<span style="position: absolute;bottom: 0px;font-size: 11px;font-style: italic;">
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
								<input type="text" name="hoten" value="<?php echo ten_user($_SESSION['user']['id']);?>" id="hoten" placeholder="Người đặt hàng">
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
							<div style=''><input type="button" class="dathang2" name="dathang" value="Đặt hàng"></div>
						</form>
					</div>
				</div>
			<?php }?>
				<div class="clearfix"></div>
			</div>
			
			<div class="col-xs-6" style="background-color: #f5f5f5; height: 80vh;     padding: 45px 80px;max-height: 400px;">
				<div style="margin-bottom: 4px;">
					<span style="
					color: #2d2d2d; 
					font-size: 14px;
					    font-weight: bold;
					border-bottom: 1px solid #e1e1e1;
					padding: 5px 0px;">ĐƠN HÀNG</span>
				</div>
				<div class="item_giohang2_tt" style="padding: 0px;">
					
					
				</div>
		
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
