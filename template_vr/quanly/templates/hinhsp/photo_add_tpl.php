<h3>Hình ảnh</h3>
<form name="frm" method="post" action="index.php?com=hinhsp&act=save_photo&id_sp=<?=$_GET['id_sp']?>" enctype="multipart/form-data" class="nhaplieu">
<?php for($i=0; $i<5; $i++){?>
	<br>
	<b>Hình ảnh <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> 
    <strong>
		<?php if ($config['hinhsp']['width'] > 0): ?> 
        	Rộng <?=$config['hinhsp']['scale']*$config['hinhsp']['width']?> ; Cao <?=$config['hinhsp']['scale']*$config['hinhsp']['height']?>
        <?php else:?>
        	<?=$config['hinhsp']['height'] ?>
        <?php endif;?>
    </strong>
    <br />
    <br />
    <!--
    <b>Tên: </b> <input name="ten<?=$i?>" type="text" size="40"   />	
	<br />
	<b>Link: </b> <input name="link<?=$i?>" type="text" size="40"   />	
	<br />
    <b>Mô tả: </b> <textarea name="mota<?=$i?>" rows="5" style="width:500px""></textarea>	
	<br />-->
    
	<b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="<?=($i + 1)?>" style="width:30px" />	<br /><br>
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	
    <hr>
    <br>	
<? }?>
	<input type="hidden" name="id_sp" value="<?=$_GET['id_sp']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hinhsp&act=man_photo&id_sp=<?=$_GET['id_sp']?>'" class="btn" />
</form>