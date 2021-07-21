<h3>Quản lý Video</h3>
<h3>
	<form name="frm" method="post" action="index.php?com=video&act=save" enctype="multipart/form-data" class="nhaplieu">
    
    
    <?php if (@$_REQUEST['act']=='edit')
	{?>
	<b>Hình hiện tại:</b><img src="<?php echo _upload_video.$item['photo']?>" alt="NO PHOTO"  width="150"/><br />
	<?php }?>
    <br />
	<b>Ảnh đại diện:</b> <input type="file" name="file" /> <?php echo _news_type?> <span style="color:#F00"> - Width:200px</span><br /><br />
    
     <b>Tên Video</b><input type="text" name="ten" value="<?php echo @$item['ten']?>" /></br></br>
	<b>Mã Youtube</b><input type="text" name="url" value="<?php echo @$item['url']?>" /></br></br>
	<br />
    
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

  <b>Hiển thị</b> 
  <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>>
  <br />
  <input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=video&act=man'" class="btn" />
    </form>
</h3>
