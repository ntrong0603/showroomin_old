<h3>Thêm danh mục</h3>
<form name="frm" method="post" action="index.php?com=yahoo&act=save" enctype="multipart/form-data" class="nhaplieu">	    	    
    <b>Tên</b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /><br>
    <b>Yahoo</b> <input type="text" name="yahoo" value="<?php echo @$item['yahoo']?>" class="input" /><br /><br>
    <b>Skype</b> <input type="text" name="skype" value="<?php echo @$item['skype']?>" class="input" /><br /><br>
    <b>Điện thoại</b> <input type="text" name="dienthoai" value="<?php echo @$item['dienthoai']?>" class="input" /><br /><br>
    <b>Điện thoại 2</b> <input type="text" name="dienthoai2" value="<?php echo @$item['dienthoai2']?>" class="input" /><br /><br>
    <b>Email</b> <input type="text" name="email" value="<?php echo @$item['email']?>" class="input" /><br /><br>
    <b>Đại chỉ</b> <input type="text" name="diachi" value="<?php echo @$item['diachi']?>" class="input" /><br /><br>

   
    <br/>
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=yahoo&act=man'" class="btn" />
</form>