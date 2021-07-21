<h3>Thêm danh mục</h3>
<form name="frm" method="post" action="index.php?com=product&act=save_list0" enctype="multipart/form-data" class="nhaplieu">
    <b>Tên danh mục Việt</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br>
    <b>Tên danh mục Anh</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /><br>
    <?php if ($_REQUEST['act']=='edit_list0')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_sanpham.$item['photo']?>"  width="120" alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?=_product_type?> - <span style="font-weight:bold; color:red"></span><br />
    <br />
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man_list0'" class="btn" />
</form>