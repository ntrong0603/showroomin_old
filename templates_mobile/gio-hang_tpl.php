
<link href="./template_vr/css/style<?php echo $mobile; ?>.css" rel="stylesheet">


<div class="container">
	<div class="gianhang">
		<div class=" col-xs-12 gianhang2" style='padding: 0px;    margin-top: 19px;'>
			<div class="col-xs-12" style='padding: 0px 23px;'><!--item_giohang-->
				<div class='item_giohang fix-scorll-ball fix-scorll-ball-giohang' style='height: 40vh;overflow: auto;'>
				</div>
			</div>
			<div class="col-xs-12" style="margin: 2vh 0px;padding: 0px 23px;">
				<div style="border-radius: 5px;background-color: #f2f2f2; color: #666666; font-size: 12px;padding: 34px 18px;">
					<table style='background-color: #f2f2f2;'>
						<tr>
							<td align="left" style="vertical-align: top;    color: #2d2d2d;font-size: 12px;font-weight: 500;">Tạm tính</td>
							<td align="right" style="vertical-align: top;"><span id="tamtinh">0 VNĐ</span></td>
						</tr>
						<tr>
							<td align="left" style="vertical-align: top;    color: #2d2d2d;font-size: 12px;font-weight: 500;">Thành tiền</td>
							<td align="right" style="vertical-align: top;"> <span id="thanhtien" style="color: #ff0000; font-weight: 500;">0 VNĐ</span><br /><i style="font-size: 11px;">Đã bao gồm VAT</i></td>
						</tr>
					</table>
				</div>
				<div>
					<div>
						<a href='thanh-toan.html' ><input style="width: 100%;background-color: #ff0000;border: 0px;margin: 5px 0px;color: #fff;border-radius: 5px;padding: 5px;" type="button" onclick="" id="" name="thanhtoan" value="Tiến hành thanh toán"></a>
						<input style="width: 100%;background-color: #fff;border: 1px solid #ccc;border-radius: 5px;padding: 5px;" type="button" onclick="huy_giohang()" name="huygiohang" value="Hủy giỏ hàng">
					</div>
				</div>
			</div>
			
		</div>
		
	</div>
</div>