

<h3>Thêm Email</h3>
<form name="frm" method="post" action="index.php?com=newsletter&act=save" enctype="multipart/form-data" class="nhaplieu">
	
    <b>Email</b> <input type="text" name="email" value="<?php echo @$item['email']?>" class="input" /><br /><br>
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=newsletter&act=man'" class="btn" />
</form>