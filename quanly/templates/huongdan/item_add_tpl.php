

<h3>Hướng dẫn</h3>
<form name="frm" method="post" action="index.php?com=huongdan&act=save" enctype="multipart/form-data" class="nhaplieu">
     <?php if (@$_REQUEST['act']=='edit')
	{?>
	<b>Hình hiện tại:</b><img src="<?php echo _upload_tintuc.$item['photo']?>" alt="NO PHOTO"  width="150"/><br />
	<?php }?>
    <br />
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?php echo _news_type?><br /><br />
	<b>Tiêu đề</b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br />
	<b>Mô tả</b>
	
    
    <div>
    
    <textarea name="mota" cols="50" rows="5" id="mota"><?php echo @$item['mota']?></textarea>
    
    
  </div>
	
    <b>Nội dung</b><br/>
	<div>
	 <textarea name="noidung" id="noidung"><?php echo $item['noidung']?></textarea></div>
    	<b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=huongdan&act=capnhat'" class="btn" />
</form>