<h3>Hình ảnh</h3>
<form name="frm" method="post" action="index.php?com=doitac&act=save_photo" enctype="multipart/form-data" class="nhaplieu">
<?php for($i=0; $i<5; $i++){?>
	<b>Hình ảnh <?php echo $i+1?></b> <input type="file" name="file<?php echo $i?>" /> <strong>Width:120px&nbsp;-&nbsp;.jpg&nbsp;|&nbsp;.gif&nbsp;|&nbsp;png</strong><br />
    <br />
	<b>Tên: </b> <input name="link<?php echo $i?>" type="text" size="40"   />	
	<br />
    <br />
    
<b>Số thứ tự </b> <input type="text" name="stt<?php echo $i?>" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?php echo $i?>" checked="checked" /> <br /><br />
	
<?php }?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=doitac&act=man_photo'" class="btn" />
</form>