<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=slideshow_doitac&act=save_photo&id=<?php echo $_REQUEST['id'];?>" enctype="multipart/form-data" class="nhaplieu">
     <b>Hình hiện tại:</b>   <img src="<?php echo _upload_slideshow.$item['photo']?>" width="100" />
    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <?php echo _hinhanh_type?><br />
    <b>Link</b> <input type="text" name="link" value="<?php echo @$item['link']?>" class="input" /><br />	
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?php echo $item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo $item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?php echo $item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=slideshow_doitac&act=man_photo'" class="btn" />
</form>