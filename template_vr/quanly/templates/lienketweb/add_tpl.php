<h3>Hình ảnh</h3>
<form name="frm" method="post" action="index.php?com=lienketweb&act=save" enctype="multipart/form-data" class="nhaplieu">


    <b>Tên liên kết</b> <input type="text" name="ten_vi" value="<?=$item['ten_vi']?>"  />	<br />
    <br />
	 <b>Link </b> <input type="text" name="link" value="<?=$item['link']?>"  />	<br />
    <br />

	

	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=lienketweb&act=man'" class="btn" />
</form>