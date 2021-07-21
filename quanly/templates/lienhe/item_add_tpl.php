

<h3>Thông tin liên hệ</h3>
<form name="frm" method="post" action="index.php?com=lienhe&act=save" enctype="multipart/form-data" class="nhaplieu">   
   <b>Nội dung</b><br/>
	<div>
	  <textarea name="noidung" id="noidung"><?php echo @stripslashes($item['noidung'])?></textarea></div> <br/>  
     <script language="javascript">CKEDITOR.replace('noidung');</script> 
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=lienhe&act=capnhat'" class="btn" />
</form>