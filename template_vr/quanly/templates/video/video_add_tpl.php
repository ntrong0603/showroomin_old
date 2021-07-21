<h3>Quản lý Video</h3>
<form name="frm" method="post" action="index.php?com=video&act=save_video" enctype="multipart/form-data" class="nhaplieu">
  <?php if ($_REQUEST['act']==edit_video)
	{?>
	<b>Video:</b>
    <video width="250" height="180" controls="controls" > <source src="<?=_upload_video.$item['video']?>" type="video/mp4"> <object data="" width="250" height="180"> <embed width="250" height="180" src="<?=_upload_video.$item['video']?>"> </object> </video>
    <br /> <br />
	<?php }?>
	
	<b>Upload Video:</b> 
	<input type="file" name="file" /> <br /><br />
	<b>Tên Video</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br>
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=video&act=man_video'" class="btn" />
</form>