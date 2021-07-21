<h3>Hình ảnh</h3>
<form name="frm" method="post" action="index.php?com=album&act=save_photo<?=$callback?>" enctype="multipart/form-data" class="nhaplieu">
<?php for($i=0; $i<5; $i++){?>
	<br>
	<b>Hình ảnh <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> <strong>.jpg|.gif|png ---- Rộng: <?=$cfa['scale']*$cfa['width']?> ; Cao: <?=$cfa['scale']*$cfa['height']?></strong><br />
    <br />
    <?php if ($cfa['detail'] > 0):?>
    <b>Tên: </b> <input name="ten<?=$i?>" type="text" size="40"   />	
	<br />
	<br />
	<b>Tên tiếng Anh: </b> <input name="ten_sd<?=$i?>" type="text" size="40"   />	
	<br />
	<br />
	<b>Link: </b> <input name="link<?=$i?>" type="text" size="40"   />	
	<br />
	<br />
    <b>Mô tả: </b> <textarea name="mota<?=$i?>" rows="5" style="width:500px""></textarea>
    <br />
    <br />
    <b>Mô tả tiếng Anh: </b> <textarea name="mota_sd<?=$i?>" rows="5" style="width:500px""></textarea>	
	<br />
    <?php endif;?>
<b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="<?=($i + 1)?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	 
    <hr>
    <br />
<? }?>
	<input type="hidden" name="id_sp" value="<?=$_GET['id_sp']?>" />	
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=album&act=man_photo<?=$callback?>'" class="btn" />
</form>