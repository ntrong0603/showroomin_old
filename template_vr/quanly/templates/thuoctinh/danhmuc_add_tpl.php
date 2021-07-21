<?php if ($_REQUEST['act']=='edit_danhmuc') { ?> <h3>Sửa danh mục cấp 1</h3> <?php }else{ ?><h3>Thêm danh mục cấp 1</h3><?php } ?>
<form name="frm" method="post" action="index.php?com=thuoctinh&id=<?=@$item['id']?>&loaitin=<?php echo $loaitin; ?>&act=save_danhmuc" enctype="multipart/form-data" class="nhaplieu">	
	  	    
                <b>Tên <?php echo $ngonngu1;?></b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br /><br>
			
	<?php if($langnum >=2){?>
    <b>Tên <?php echo $ngonngu2;?> </b> <input type="text" name="ten_sd" value="<?=@$item['ten_sd']?>" class="input" /><br /><br>
	<?php } ?>
	<?php if($langnum >=3){?>
    <b>Tên <?php echo $ngonngu3;?> </b> <input type="text" name="ten_rd" value="<?=@$item['ten_rd']?>" class="input" /><br /><br>
	<?php } ?>

	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=thuoctinh&loaitin=<?php echo $loaitin; ?>&act=man_danhmuc'" class="btn" />
</form>