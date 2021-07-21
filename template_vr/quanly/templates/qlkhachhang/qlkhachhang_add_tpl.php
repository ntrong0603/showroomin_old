<h3>Hình ảnh ( Kích thước 200 x 200 )</h3>

<form name="frm" method="post" action="index.php?com=qlkhachhang&act=save_photo" enctype="multipart/form-data" class="nhaplieu">
  <?php for($i=0; $i<5; $i++){?>
	
	<b>Hình ảnh <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> <?=_hinhanh_type?><strong>|.png</strong><br />	 <br />	       	
    <b>Nhập tên công ty:</b> <input type="text" name="ten<?=$i?>" value="" class="input" /><br />	<br />	 
    <b>Số thứ tự </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br /><br />	 
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	
<? }?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=qlkhachhang&act=man_photo'" class="btn" />
</form>