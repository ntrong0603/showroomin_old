<h3>Thêm danh mục</h3>

<form name="frm" method="post" action="index.php?com=img&act=save_cat" enctype="multipart/form-data" class="nhaplieu">
	
	<?php if (@$_REQUEST['act']=='edit_cat')
	{?>
	<b>Hình hiện tại:</b><img src="<?php echo _upload_album.$item['photo']?>" alt="NO PHOTO"  width="150" height="150"/><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?php echo _hinhanh_item_type?><br />
    <br />
    
	<b>Tên</b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /><br>
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=img&act=man_cat'" class="btn" />
</form>