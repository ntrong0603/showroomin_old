<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=photo&act=save_photo" enctype="multipart/form-data" class="nhaplieu">		
  <?php for($i=0; $i<5; $i++){?>
	
	<b>Hình ảnh <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> <strong>size: 100px x 100px</strong><br />	 <br />
	<b>Tên: </b> <input type="text" name="ten<?=$i?>" value="" style="width:230px" />	<br />
	<b>Link: </b> <input type="text" name="link<?=$i?>" value="" style="width:230px" />	<br />
	<b>Mô tả: </b> <br/>
	<div> <textarea class="mota" name="mota<?=$i?>" id="mota<?=$i?>"><?=@$item['mota']?></textarea></div> <br/> 
	<script language="javascript">CKEDITOR.replace('mota<?=$i?>');</script>  <br/>
    <b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br /><br />	 
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	
<?php }?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=photo&act=man_photo'" class="btn" />
</form>