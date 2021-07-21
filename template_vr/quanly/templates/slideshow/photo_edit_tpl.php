<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=slideshow&act=save_photo&id=<?=$_REQUEST['id'];?>" enctype="multipart/form-data" class="nhaplieu">
     <b>Hình hiện tại:</b>   <img src="<?=_upload_slideshow.$item['photo']?>" width="100" />
    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <?=_hinhanh_type?><br />
    <b>Link</b> <input type="text" name="link" value="<?=@$item['link']?>" class="input" /><br />	
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?=$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?=$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=slideshow&act=man_photo'" class="btn" />
</form>