<?php if ($_REQUEST['act']=='edit_danhmuc') { ?> <h3>Sửa danh mục cấp 1</h3> <?php }else{ ?><h3>Thêm danh mục cấp 1</h3><?php } ?>
<form name="frm" method="post" action="index.php?com=place&act=save_danhmuc" enctype="multipart/form-data" class="nhaplieu">	
	  	    
    <b>Tên</b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /><br>
    
    <?php if ($_REQUEST['act']=='edit_danhmuc')
	{?>
	<b>Hình ảnh menu:</b><img src="<?php echo _upload_sanpham.$item['thumb']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn hình menu:</b> <input type="file" name="file" /> <?php echo _place_type?><br />
    <br />
    
    
    
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
    <b>Nổi bật</b> <input type="checkbox" name="noibat" <?php echo (!isset($item['noibat']) || $item['noibat']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=place&act=man_danhmuc'" class="btn" />
</form>