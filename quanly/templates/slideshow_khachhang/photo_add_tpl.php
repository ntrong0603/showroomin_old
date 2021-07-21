<h3>Hình ảnh</h3>
<form name="frm" method="post" action="index.php?com=slideshow_khachhang&act=save_photo" enctype="multipart/form-data" class="nhaplieu">
<?php for($i=0; $i<1; $i++){?>	
    <b>Hình ảnh <?php echo $i+1?></b> <input type="file" name="file<?php echo $i?>" /> <strong></strong><br />
    <br />
	<b>Link: </b> <input name="mota<?php echo $i?>" type="text" size="40"   />	
	<br />
    <br />
    
<b>Số thứ tự </b> <input type="text" name="stt<?php echo $i?>" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?php echo $i?>" checked="checked" /> <br /><br />
	
<?php 
}
?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=slideshow_khachhang&act=man_photo'" class="btn" />
</form>