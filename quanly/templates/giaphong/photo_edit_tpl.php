<h3>Lịch trình</h3>

<form name="frm" method="post" action="index.php?com=lichtrinh&act=save_photo&id=<?php echo $_REQUEST['id'];?>&idc=<?php echo $_REQUEST['idc']?>" enctype="multipart/form-data" class="nhaplieu">
	
	<b>&nbsp;</b> 
    
        <img src="<?php echo _upload_sanpham.$item['photo']?>" width="100" />
    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <strong>255*190</br>
</strong><br />
	
  <b>Tên phòng: </b> <input name="ten" value="<?php echo @$item['ten']?>" type="text" size="40"   />	
	<br />
	<br />
     <b>Mô tả</b><br/>
	<div>
	 <textarea class="mota" name="mota" id="mota"><?php echo @$item['mota']?></textarea></div> <br/>  
  <script language="javascript">CKEDITOR.replace('mota');</script> 
     
	<br />
    

     <input name="id_sp" type="hidden" value="<?php echo $_GET['id_sp']?>"   />	 
     <input name="id" type="hidden" value="<?php echo $_GET['id']?>"   />	
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?php echo @$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo @$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=lichtrinh&act=man_photo'" class="btn" />
</form>