

<h3>Chi tiết Vận đơn</h3>

<form name="frm" method="post" action="index.php?com=vandon&act=save&curPage=<?php echo $_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
   
	<table class='show'>
	<tr>
	<td>
	
    <b>Mã vận đơn:</b><?php echo $item['mavandon']?><br />     
    <b>Tên người nhận</b><?php echo $item['tennguoinhan']?><br />     
    <b>Điện thoại</b><?php echo $item['dienthoainguoinhan']?><br />     
    <b>Địa chỉ người nhận</b><?php echo $item['diachinguoinhan']?><br />  
	</td><td>
    <b>Nội dung hàng hóa</b><?php echo $item['noidunghanghoa']?><br />     
    <b>Khối lượng:</b><?php echo $item['trongluonggoihang']?><br />     
    <b>Tiền thu hộ</b><?php echo $item['tienthuho']?><br />  
    <b>Bên trả phí</b><?php echo $item['bentraphi']?><br />  
	</td><td>	
	
    <b>Gói dịch vụ</b><?php echo $item['cacdichvu']?><br />     
    <b>Khu vực vận chuyển</b><?php echo $item['khuvuc']?><br />     
    <b>Cước tạm tính</b><?php echo $item['cuocphitamtinh']?><br />     
    <b>Yêu cầu lấy hàng</b><?php echo $item['yeucaulayhang']?><br />     
	</td><td>
    <b>Ghi chú người gửi</b><?php echo $item['ghichunguoigui']?><br />     
    <b>Ghi chú người nhận</b><?php echo $item['ghichunguoinhan']?><br />     
	</td>
	</tr>
	</table>
	</br>
	<b>Status:</b><input type="text" name="status" id="status" value="<?php echo @$item['status']?>" /></br>
	</br>
	</br>
	
	<?php
	if( isset( $old_item ) ){
?>
===================Bản ghi cũ ======================
<table class='show'>
	<tr>
	<td>
	
    <b>Mã vận đơn:</b><?php echo $old_item['mavandon']?><br />     
    <b>Tên người nhận</b><?php echo $old_item['tennguoinhan']?><br />     
    <b>Điện thoại</b><?php echo $old_item['dienthoainguoinhan']?><br />     
    <b>Địa chỉ người nhận</b><?php echo $old_item['diachinguoinhan']?><br />  
	</td><td>
    <b>Nội dung hàng hóa</b><?php echo $old_item['noidunghanghoa']?><br />     
    <b>Khối lượng:</b><?php echo $old_item['trongluonggoihang']?><br />     
    <b>Tiền thu hộ</b><?php echo $old_item['tienthuho']?><br />  
    <b>Bên trả phí</b><?php echo $old_item['bentraphi']?><br />  
	</td><td>	
	
    <b>Gói dịch vụ</b><?php echo $old_item['cacdichvu']?><br />     
    <b>Khu vực vận chuyển</b><?php echo $old_item['khuvuc']?><br />     
    <b>Cước tạm tính</b><?php echo $old_item['cuocphitamtinh']?><br />     
    <b>Yêu cầu lấy hàng</b><?php echo $old_item['yeucaulayhang']?><br />     
	</td><td>
    <b>Ghi chú người gửi</b><?php echo $old_item['ghichunguoigui']?><br />     
    <b>Ghi chú người nhận</b><?php echo $old_item['ghichunguoinhan']?><br />     
    <b>Status</b><?php echo $old_item['status']?><br />     
	</td>
	</tr>
	</table>
	<?php } ?>
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="hidden" name="idkhachhang" id="idkhachhang" value="<?php echo @$item['idkhachhang']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=vandon&act=man'" class="btn" />
</form>


