<?php if($_GET['act']=='edit_skinhotspot') 
    { 
        echo '<h3>Sửa skin Hotspot</h3>';
    } else 
    { 
        echo '<h3>Thêm skin Hotspot</h3>'; 
    }
?>
<form name="frm" method="post" action="index.php?com=krpano&act=save_skinhotspot&id=<?php echo $_REQUEST['id']?>" enctype="multipart/form-data" class="nhaplieu">
    <input type="hidden" name="id" value="<?php echo @$item['id']; ?>" class="input"/>
   
	<b>Name</b> <input type="text" name="name" value="<?php echo @$item['name']; ?>" class="input"/><strong>Tên skin hotspot</strong>
    <br />
    <br />
    <b>url</b> <input class="input" type="file" name="url"/><strong>Icon hotspot</strong>
    <br />
    <br />
    <b>scale</b> <input class="input" type="text" name="scale" value="<?php echo @$item['scale']; ?>"/><strong>tỉ lệ của hotspot</strong>
    <br />
    <br />
    <b>edge</b> <input class="input" type="text" name="edge" value="<?php echo @$item['edge']; ?>"/><strong>Hiển thị ở vị trí</strong>
    <br />
    <br />
    
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=krpano&act=man_skinhotspot" class="btn" />
</form>