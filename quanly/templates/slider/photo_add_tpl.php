<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=slider&act=save_photo" enctype="multipart/form-data" class="nhaplieu">		
  <?php for($i=0; $i<5; $i++){?>
	
	<b>Hình ảnh <?php echo $i+1?></b> <input type="file" name="file<?php echo $i?>" /><strong>&nbsp;&nbsp;&nbsp;&nbsp;Width:980px&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Height:400px&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo _hinhanh_type?></strong><br />	 <br />	       	
    <b>Link</b> <input type="text" name="link<?php echo $i?>" value="" class="input" /><br />	<br />	 
    <b>Số thứ tự </b> <input type="text" name="stt<?php echo $i?>" value="1" style="width:30px" />	<br /><br />	 
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?php echo $i?>" checked="checked" /> <br /><br />
	
<?php }?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=slider&act=man_photo'" class="btn" />
</form>