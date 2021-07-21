<h3>Thêm quận huyện</h3>
<form name="frm" method="post" action="index.php?com=quanhuyen&act=save" enctype="multipart/form-data" class="nhaplieu">	    	    
    <b>Tên việt</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br>
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=quanhuyen&act=man'" class="btn" />
</form>