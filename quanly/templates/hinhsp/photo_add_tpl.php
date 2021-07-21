


<h3>Hình ảnh</h3>
<form name="frm" method="post" action="index.php?com=hinhsp&id_com=<?php echo $_GET['id_com'];?>&act=save_photo&id_sp=<?php echo $_GET['id_sp']?>&id_mau=<?php echo $_GET['id_mau']?>" enctype="multipart/form-data" class="nhaplieu">

	<b>Hình ảnh </b> <input type="file"   multiple="multiple"  name="picture[]" /><br />
    <br />
    400 * 500
	

	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hinhsp&id_com=<?php echo $_GET['id_com'];?>&act=man_photo'" class="btn" />
</form>