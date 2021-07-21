<h3>Liên kết</h3>

<form name="frm" method="post" action="index.php?com=lienketweb&act=save&id=<?=$_REQUEST['id'];?>" enctype="multipart/form-data" class="nhaplieu">
	<b>Tên liên kết </b> <input type="text" name="ten_vi" value="<?=$items['ten_vi']?>" />	<br />

    <b>Link </b> <input type="text" name="link" value="<?=$items['link']?>" />	<br />
	

	
	<input type="hidden" name="id" value="<?=$items['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=lienketweb&act=man'" class="btn" />
</form>