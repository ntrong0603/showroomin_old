<?php if($_GET['act']=='edit_spot') 
    { 
        echo '<h3>Sửa spot</h3>';
    } else 
    { 
        echo '<h3>Thêm spot</h3>'; 
    }
?>
<form name="frm" method="post" action="index.php?com=krpano&act=save_spot&id=<?php echo $_REQUEST['id']?>" enctype="multipart/form-data" class="nhaplieu">
    <input type="hidden" name="id" value="<?php echo @$item['id']; ?>" class="input"/>
    <b>Name</b> <input type="text" name="name" value="<?php echo @$item['name']; ?>" class="input"/><strong>Tên vị trí đánh dấu</strong>
    <br />
    <br />
    <b>style</b> <input type="text" name="style" value="<?php echo @$item['style']; ?>" class="input"/><strong>Kiểu vị trí đánh dấu</strong>
    <br />
    <br />
    <b>x</b> <input type="text" name="x" value="<?php echo @$item['x']; ?>" class="input"/><strong>Tọa độ X vị trí đánh dấu</strong>
    <br />
    <br />
    <b>y</b> <input type="text" name="y" value="<?php echo @$item['y']; ?>" class="input"/><strong>Tọa độ Y vị trí đánh dấu</strong>
    <br />
    <br />
    <b>krpano</b> 
        <select name="idkrpano">
            <option value="">Chọn krpano</option>
            <?php  
                for($i=0; $i<count($items);$i++)
                {
            ?>
                <option value="<?php echo $items[$i]['id'];?>" <?php echo ($items[$i]['id'] === @$item['idkrpano'])? 'selected':'' ?>><?php echo $items[$i]['name'];?></option>
            <?php
                }
            ?>
        </select><strong>Đối tượng được đánh dấu</strong>
    <br />
    <br />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=krpano&act=man_spot'" class="btn" />
</form>