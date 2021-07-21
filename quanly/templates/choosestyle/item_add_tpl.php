

<h3>Thay đổi giao diện</h3>
<form name="frm" method="post" action="index.php?com=choosestyle&act=save" enctype="multipart/form-data" class="nhaplieu">      
	<?php //print_r($item); ?>
    <b>Thay đổi màu backgound</b>
	<input class="color" name="maubg" value="<?php echo $item['maubg']?>">
     
     <br/>
     <b>Chọn hình cho background</b>
     <?php if (@$_REQUEST['act']=='capnhat')
	{?>
	<b>Hình hiện tại:</b><img src="<?php echo _upload_hinhanh.$item['photo']?>" alt="NO PHOTO"  width="150" height="150"/><br />
	<?php }?>
    
	<b>Hình ảnh:</b> <input type="file" name="file" /> <strong >Hình ảnh</strong><br />
    <br />
		<b>Hiển thị background image</b> <input type="checkbox" name="bg" <?php echo (!isset($item['bg']) || $item['bg']==1)?'checked="checked"':''?>><br /> 
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=choosestyle&act=capnhat'" class="btn" />
</form>