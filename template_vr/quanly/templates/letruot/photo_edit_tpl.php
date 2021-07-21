<h3>Sửa hình 2 bên web</h3>
<?php 
		$d->reset();
		$sql_letruot="select letruot from #_letruot where id='".$_GET['id']."'";
		$d->query($sql_letruot);
		$result_letruot=$d->fetch_array();
?>
<form name="frm" method="post" action="index.php?com=letruot&act=save_photo&id=<?php echo $_REQUEST['id'];?>" enctype="multipart/form-data" class="nhaplieu">
     <b>Hình hiện tại:</b>   <img src="<?php echo _upload_hinhanh.$item['photo']?>" width="100" />
    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /><?php echo _hinhanh_type?><br />
     <b>Tiêu đề</b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br />	
     <b>Lề trượt</b> <select name="letruot" id="letruot" style="width:150px;">
                       		 <option value="trai" >Lề trái</option>
                              <option value="phai" <?php if($result_letruot['letruot'] == 'phai')echo 'selected="selected"' ?>>Lề phải</option>
     				</select><br />
     <b>Link</b> <input type="text" name="link" value="<?php echo @$item['link']?>" class="input" /><br />	
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?php echo @$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo @$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=letruot&act=man_photo'" class="btn" />
</form>