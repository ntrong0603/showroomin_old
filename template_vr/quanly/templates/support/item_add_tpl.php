<h3>Hỗ trợ khách hàng</h3>
<form name="frm" method="post" action="index.php?com=support&act=save" enctype="multipart/form-data" class="nhaplieu">
	<b>Tên việt</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br>
<!--    <b>Mô tả việt</b><br/>
    	<div>
	 <textarea name="mota" id="mota"><?=$item['mota']?></textarea></div>
     <script language="javascript">CKEDITOR.replace('mota');</script>-->
    <b>Nội dung việt</b><br/><div>
	 <textarea name="noidung_vi" id="noidung_vi"><?php echo $item['noidung_vi']?></textarea></div>
	<script language="javascript">CKEDITOR.replace('noidung_vi');</script>
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=support&act=man'" class="btn" />
</form>
