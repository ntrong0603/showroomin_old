<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=photo_thuonghieu&act=save_photo&id=<?=$_REQUEST['id'];?>" enctype="multipart/form-data" class="nhaplieu">
     <b>Hình hiện tại:</b>   <img src="<?=_upload_hinhanh.$item['photo']?>" width="100" />
    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <br />
	<b>Tên: </b> <input type="text" name="ten" value="<?=$item['ten']?>" style="width:230px" />	<br />
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?=$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?=$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=photo_thuonghieu&act=man_photo'" class="btn" />
</form>