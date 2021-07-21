<h3>Hình ảnh</h3>
<form name="frm" method="post" action="index.php?com=slideshow&act=save_photo" enctype="multipart/form-data" class="nhaplieu">
<?php for($i=0; $i<1; $i++){?>	
    <b>Hình ảnh <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> 
    <strong>.jpg&nbsp;|&nbsp;.gif&nbsp;|&nbsp;png - rộng(810px) cao(400px)</strong><br />
    <br />
	<b>Tên: </b> <input name="ten<?=$i?>" type="text" size="40"   />	
	<br />
    <br />
	<b>Mô tả: </b> <input name="mota<?=$i?>" type="text" size="40"   />	
	<br />
    <br />
	<b>Link Web: </b> <input name="link<?=$i?>" type="text" size="40"   />	
	<br />
    <br />      
<b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	
<?php }?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=slideshow&act=man_photo'" class="btn" />
</form>