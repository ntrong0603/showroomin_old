<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=photo_quangcao&act=save_photo&loai=<?php echo $_GET['loai']?>" enctype="multipart/form-data" class="nhaplieu">		
  <?php for($i=0; $i<2; $i++){?>
	
	<b>Hình ảnh <?=$i+1?></b> <input type="file" name="file<?=$i?>" /><br />	 <br />
	<b>Tên: </b> <input type="text" name="ten<?=$i?>" value="" style="width:230px" />	<br /> <br />
	<input type="hidden" name="muc<?=$i?>" value="<?php echo $_GET['loai'] ?>" style="width:230px" />
	<b>link: </b> <input type="text" name="link<?=$i?>" value="" style="width:230px" />	<br /> <br />
    <b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br /><br />	 
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	
<?php }?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=photo_quangcao&act=man_photo&loai=<?php echo $_GET['loai']?>'" class="btn" />
</form>