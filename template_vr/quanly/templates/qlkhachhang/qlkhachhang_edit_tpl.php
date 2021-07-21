<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=qlkhachhang&act=save_photo&id=<?=$_REQUEST['id'];?>" enctype="multipart/form-data" class="nhaplieu">
     <b>Hình hiện tại:</b>   <img src="<?=_upload_hinhanh.$item['photo']?>" width="100" />
    
    <br />
	<b>Hình ảnh ( Kích thước 300 x 100 )</b> <input type="file" name="file" /> <?=_hinhanh_type?><br />
	<b>Link</b> <input type="text" name="mota" value="<?=$item['mota']?>" class="input" /><br />	<br />	 
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?=$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?=$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=qlkhachhang&act=man_photo'" class="btn" />
</form>