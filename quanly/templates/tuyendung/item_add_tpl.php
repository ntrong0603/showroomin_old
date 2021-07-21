

<h3>Tuyển Dụng</h3>
<form name="frm" method="post" action="index.php?com=tuyendung&act=save" enctype="multipart/form-data" class="nhaplieu">      
	<?php if ($_REQUEST['act']=='capnhat')
	{?>
	<b>Hình hiện tại:</b><img src="<?php echo _upload_sanpham.$item['photo']?>"  width="120" alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?php echo _place_type?> - <span style="font-weight:bold; color:red"></span><br />
    <br />
    <b>Tuyển Dụng</b><br/>
	<div>
	 <textarea name="noidung_vi" id="noidung_vi"><?php echo $item['noidung_vi']?></textarea></div>
	 <script language="javascript">CKEDITOR.replace('noidung_vi');</script>
     
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=tuyendung&act=capnhat'" class="btn" />
</form>