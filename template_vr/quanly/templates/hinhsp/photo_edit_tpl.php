<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=hinhsp&act=save_photo&id=<?=$_REQUEST['id'];?><?=$callback?>" enctype="multipart/form-data" class="nhaplieu">
	
	<b>&nbsp;</b> 
    
        <img src="<?=_upload_sanpham.$item['photo']?>" width="100" />
    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <strong>.jpg|.gif|png ---- Rộng <?=$config['hinhsp']['scale']*$config['hinhsp']['width']?> ; Cao <?=$config['hinhsp']['scale']*$config['hinhsp']['height']?></strong><br />
	<!--<b>Tên: </b> <input name="ten" type="text" size="40" value="<?=$item['ten']?>"   />	
	<br />
    <b>Link: </b> <input name="link" type="text" size="40"  value="<?=$item['link']?>"  />	
	<br />
    <b>Mô tả: </b> <textarea name="mota" rows="5" style="width:500px""><?=$item['mota']?></textarea>	-->
	<br />
	<br />
    

     <input name="id_sp" type="hidden" value="<?=$_GET['id_sp']?>"   />	 
     <input name="id" type="hidden" value="<?=$_GET['id']?>"   />	
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?=@$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=@$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hinhsp&act=man_photo&id_sp=<?=$_GET['id_sp']?>'" class="btn" />
</form>