<h3>Hình ảnh</h3>
<form name="frm" method="post" action="index.php?com=hinhqc_danhmuc&act=save_photo&id_cate=<?php echo $_REQUEST['id_cate'];?>" enctype="multipart/form-data" class="nhaplieu">

    <b>Hình ảnh</b> <input type="file" name="file" /><br />
    <br />
    <b>Link </b> <input type="text" name="link" value="" />	<br />  
	<b>Số thứ tự </b> <input type="text" name="stt" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" checked="checked" /> <br /><br />
	

	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hinh_cungsp&act=man_photo'" class="btn" />
</form>