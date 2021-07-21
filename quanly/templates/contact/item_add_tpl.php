<h3>Xem thông tin liên hệ</h3>

<form name="frm" method="post" action="index.php?com=contact&act=save" enctype="multipart/form-data" class="nhaplieu">
<br />
	<b>Tên</b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br />
    <b>Địa chỉ</b> <input type="text" name="diachi" value="<?php echo @$item['diachi']?>" class="input" /><br />
    <b>Điện thoại</b> <input type="text" name="dienthoai" value="<?php echo @$item['dienthoai']?>" class="input" /><br />
    <b>Email</b> <input type="text" name="email" value="<?php echo @$item['email']?>" class="input" /><br />
    <b>Tiêu đề</b> <input type="text" name="tieude" value="<?php echo @$item['tieude']?>" class="input" /><br />
	<b>Nội duung</b>
    <div>
    <textarea name="noidung" cols="50" rows="10" id="mota"><?php echo @$item['noidung']?></textarea>
  </div>
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=contact&act=man'" class="btn" />
</form>