<?php if ($_REQUEST['act']=='edit_danhmuc') { ?> <h3>Sửa danh mục slider</h3> <?php }else{ ?><h3>Thêm danh mục slider</h3><?php } ?>
<form name="frm" method="post" action="index.php?com=slider&act=save_danhmuc" enctype="multipart/form-data" class="nhaplieu">	
	  	    
    <b>Tên</b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /><br>
    <b>Chiều rộng</b> <input type="text" name="rong" value="<?php echo @$item['rong']?>" class="input" /><br /><br>
    <b>Chiều cao</b> <input type="text" name="cao" value="<?php echo @$item['cao']?>" class="input" /><br /><br>
    
    
   
    
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=slider&act=man_danhmuc'" class="btn" />
</form>