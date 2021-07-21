<h3> Cập nhật thông tin Công Ty</h3>

<form name="frm" method="post" action="index.php?com=hotline&act=save" enctype="multipart/form-data" class="nhaplieu">	
	 <b>Tên công ty:</b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br />	
    <b>Điện thoại:</b> <input type="text" name="dienthoai" value="<?php echo @$item['dienthoai']?>" class="input" /><br />
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
    <b>Email: </b> <input type="text" name="email" value="<?php echo @$item['email']?>" class="input" /><br />	
     <b>Địa chỉ: </b> <input type="text" name="diachi" value="<?php echo @$item['diachi']?>" class="input" /><br />
      <b>Slogan: </b> <input type="text" name="slogan" value="<?php echo @$item['slogan']?>" class="input" /><br />		
      <b>Fanpage: </b> <input type="text" name="fanpage" value="<?php echo @$item['fanpage']?>" class="input" /><br />	
      <b>Tọa độ: </b> <input type="text" name="fax" value="<?php echo @$item['fax']?>" class="input" /> &nbsp;<a target="_blank" href="http://universimmedia.pagesperso-orange.fr/geo/loc.htm">Web lấy tọa độ</a> &nbsp;<br />	
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hotline&act=capnhat'" class="btn" />
</form>