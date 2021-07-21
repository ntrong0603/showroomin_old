<?php ?>


<h3>Upload</h3>
<form name="frm" method="post" action="index.php?com=upload&act=save_photo&id_sp=<?php echo $_GET['id_sp']?>&id_mau=<?php echo $_GET['id_mau']?>" enctype="multipart/form-data" class="nhaplieu">

	<b>Chọn files</b> <input type="file"   multiple="multiple"  name="picture[]" /><br />
    <br />
File nén rar, Zip
	<br /><br />

	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=upload&act=man_photo&id_sp=<?php echo $_GET['id_sp'];?>'" class="btn" />
</form>