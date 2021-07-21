<h3>Mua Hàng</h3>
<form name="frm" method="post" action="index.php?com=muahang&act=save" enctype="multipart/form-data" class="nhaplieu">      

    <b>Mua Hàng</b><br/>
	<div>
	 <textarea name="noidung_vi" id="noidung_vi"><?php echo $item['noidung_vi']?></textarea></div>
	 <script language="javascript">CKEDITOR.replace('noidung_vi');</script>
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=muahang&act=capnhat'" class="btn" />
</form>