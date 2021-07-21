<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=quangcao&act=save_photo&id=<?php echo $_REQUEST['id'];?>&idc=<?php echo $_REQUEST['idc']?>" enctype="multipart/form-data" class="nhaplieu">
	
	<b>&nbsp;</b> 
    
        <img src="<?php echo _upload_hinhanh.$item['photo']?>" width="100" />
    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <strong><?php echo $item['witch']?> * <?php echo $item['height']?>  &nbsp;&nbsp;&nbsp;&nbsp; .jpg, .gif, png</strong> <br />
	
    <br />
	<b>Link: </b> <input name="mota" value="<?php echo @$item['mota']?>" type="text" size="40"   />	
	<br />
	<br />
    

    
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?php echo @$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo @$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=quangcao&act=man_photo'" class="btn" />
</form>