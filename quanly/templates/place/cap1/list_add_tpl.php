<h3>Thêm danh mục</h3>
<form name="frm" method="post" action="index.php?com=place&act=save_list0" enctype="multipart/form-data" class="nhaplieu">
    <b>Tên danh mục Việt</b> <input type="text" name="ten_vi" value="<?php echo @$item['ten_vi']?>" class="input" /><br /><br>
    <b>Tên danh mục Anh</b> <input type="text" name="ten_en" value="<?php echo @$item['ten_en']?>" class="input" /><br /><br>
    <?php if ($_REQUEST['act']=='edit_list0')
	{?>
	<b>Hình hiện tại:</b><img src="<?php echo _upload_sanpham.$item['photo']?>"  width="120" alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?php echo _place_type?> - <span style="font-weight:bold; color:red"></span><br />
    <br />
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=place&act=man_list0'" class="btn" />
</form>