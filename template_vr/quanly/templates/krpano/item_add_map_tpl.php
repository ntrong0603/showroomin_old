<?php if($_GET['act']=='edit_map') 
    { 
        echo '<h3>Sửa Bản Đồ</h3>';
    } else 
    { 
        echo '<h3>Thêm Bản Đồ</h3>'; 
    }
?>
<form name="frm" method="post" action="index.php?com=krpano&act=save_map&id=<?php echo $_REQUEST['id']?>" enctype="multipart/form-data" class="nhaplieu">
    <input type="hidden" name="id" value="<?php echo @$item['id']; ?>" class="input"/>

    <b>Title</b> <input type="text" name="title" value="<?php echo @$item['title']; ?>" class="input"/><strong>Tiêu đề bản đồ</strong>
    <br />
    <br />
    <b>icon</b> 
        <?php if($_GET['act']=='edit_map') 
        { ?>
            <img src='<?php echo _upload_hinhanh.'/'.@$item['icon_map']; ?>' width='100px'>
        <?php }?>
        <input type="file" name="icon_map"/> <strong>Icon bản đồ</strong>
    <br />
    <br />
    <b>icon x</b> <input type="text" name="icon_x" value="<?php echo @$item['icon_x']; ?>" class="input"/><strong>Tọa độ X của icon</strong>
    <br />
    <br />
    <b>icon y</b> <input type="text" name="icon_y" value="<?php echo @$item['icon_y']; ?>" class="input"/><strong>Tọa độ Y của icon</strong>
    <br />
    <br />
    <b>icon align</b> <input type="text" name="align" value="<?php echo @$item['align']; ?>" class="input"/><strong>Vị trí icon</strong>
    <br />
    <br />
    <b>icon scale</b> <input type="text" name="icon_scale" value="<?php echo @$item['icon_scale']; ?>" class="input"/> <strong>tỉ lệ của icon</strong>
    <br />
    <br />
    <b>onhover</b> <input type="text" name="onhover" value="<?php echo @$item['onhover']; ?>" class="input"/> <strong>Tiêu đề khi rê chuột vào</strong>
    <br />
    <br />
    <b>map</b>
        <?php if($_GET['act']=='edit_map') 
        { ?> 
         <img src="<?php echo _upload_hinhanh.'/'.@$item['map']; ?>" width='200px'>
         <?php }?>
        <input type="file" name="map" /><strong>Bản đồ</strong>
    <br />
    <br />
    <b>map_x</b> <input type="text" name="map_x" value="<?php echo @$item['map_x']; ?>" class="input"/><strong>Tọa độ X của bản đồ</strong>
    <br />
    <br />
    <b>map_y</b> <input type="text" name="map_y" value="<?php echo @$item['map_y']; ?>" class="input"/> <strong>Tọa độ Y bản đồ</strong>
    <br />
    <br />
    <b>map_scale</b> <input type="text" name="map_scale" value="<?php echo @$item['map_scale']; ?>" class="input"/> <strong>Kích thước bản đồ</strong>
    <br />
    <br />
    <b>map_align</b> <input type="text" name="map_align" value="<?php echo @$item['map_align']; ?>" class="input"/> <strong>Vị trí bản đồ bản đồ</strong>
    <br />
    <br />
    <input type="submit" value="Lưu" class="btn" />
    <input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=krpano&act=man_map'" class="btn" />
</form>