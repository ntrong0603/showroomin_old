<h3>Xem thông tin liên hệ</h3>

<form name="frm" method="post" action="index.php?com=contact&act=save" enctype="multipart/form-data" class="nhaplieu">
<br />
	<b>Tên</b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br />
    <b>Địa chỉ</b> <input type="text" name="diachi" value="<?=@$item['diachi']?>" class="input" /><br />
    <b>Điện thoại</b> <input type="text" name="dienthoai" value="<?=@$item['dienthoai']?>" class="input" /><br />
    <b>Email</b> <input type="text" name="email" value="<?=@$item['email']?>" class="input" /><br />
    <b>Tiêu đề</b> <input type="text" name="tieude" value="<?=@$item['tieude']?>" class="input" /><br />
	<b>Nội dung</b>
    <div>
    <textarea name="noidung" cols="50" rows="10" id="mota"><?=@$item['noidung']?></textarea>
  </div>
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=contact&act=man'" class="btn" />
</form>