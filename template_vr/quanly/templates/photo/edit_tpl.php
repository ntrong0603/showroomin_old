<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=photo&act=save_photo&id=<?=$_REQUEST['id'];?>" enctype="multipart/form-data" class="nhaplieu">
     <b>Hình hiện tại:</b>   <img src="<?=_upload_hinhanh.$item['photo']?>" width="100" />
    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <strong>size: 100px x 100px</strong> <br />
	<b>Tên: </b> <input type="text" name="ten" value="<?=$item['ten']?>" style="width:230px" />	<br />
	<b>Link: </b> <input type="text" name="link" value="<?=$item['link']?>" style="width:230px" />	<br />
	<b>Mô tả: </b> <br/>
	<div> <textarea class="mota" name="mota" id="mota"><?=@$item['mota']?></textarea></div> <br/> 
	<script language="javascript">CKEDITOR.replace('mota');</script>  <br/>
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?=$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?=$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=photo&act=man_photo'" class="btn" />
</form>