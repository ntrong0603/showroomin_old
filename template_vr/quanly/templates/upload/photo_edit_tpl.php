<h3>Upload-edit</h3>

<form name="frm" method="post" action="index.php?com=upload&act=save_photo&id=<?php echo $_REQUEST['id'];?>&idc=<?php echo $_REQUEST['idc']?>" enctype="multipart/form-data" class="nhaplieu">
		
		
		<b>Tên: </b> <input name="mota" value="<?php echo @$item['ten']?>" type="text" size="40"   />	<br /><br />
		<b>Điện thoại: </b> <input name="dienthoai" value="<?php echo @$item['dienthoai']?>" type="text" size="40"   />	<br /><br />
		<b>Ngày upload: </b> <?php echo date('d/m/Y',$item['ngaytao']);?>	<br /><br />
	<b>Link file</b> 
    
        http://<?php echo $_SERVER['SERVER_NAME'];?>/upload/files/<?php echo $item['photo']?>
    
    <br />
	
    <br />
	<b>Mô tả: </b> <input name="mota" value="<?php echo @$item['mota']?>" type="textarea" class='mota' size="40"   />	
	<br />
	<br />
    

     <input name="id_sp" type="hidden" value="<?php echo $_GET['id_sp']?>"   />	 
     <input name="id" type="hidden" value="<?php echo $_GET['id']?>"   />	
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?php echo @$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo @$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=upload&act=man_photo&id_sp=<?php echo $_GET['id_sp'];?>'" class="btn" />
</form>