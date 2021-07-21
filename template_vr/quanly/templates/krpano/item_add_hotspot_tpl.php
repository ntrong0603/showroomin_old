<?php if($_GET['act']=='edit_hotspot') 
    { 
        echo '<h3>Sửa Hotspot</h3>';
    } else 
    { 
        echo '<h3>Thêm Hotspot</h3>'; 
    }
?>
<form name="frm" method="post" action="index.php?com=krpano&act=save_hotspot&id=<?php echo $_REQUEST['id']?>" enctype="multipart/form-data" class="nhaplieu">
    <input type="hidden" name="id" value="<?php echo @$item['id']; ?>" class="input"/>
    <input type="hidden" name="id_main_scene" value="<?php 
        if(isset($item['id_main_scene']))
        {
                echo @$item['id_main_scene'];
        } else 
        {
            echo @$_GET['id_scene'];
        } ?>" class="input"/>
	<b>Name</b> <input type="text" name="name" value="<?php echo @$item['name']; ?>" class="input"/><strong>Tên hotspot</strong>
    <br />
    <br />
    <b>ath</b> <input class="input" type="text" name="ath" value="<?php echo @$item['ath']; ?>"/><strong>Tọa độ X của hotspot</strong>
    <br />
    <br />
    <b>atv</b> <input class="input" type="text" name="atv" value="<?php echo @$item['atv']; ?>"/><strong>Tọa độ Y của hotspot</strong>
    <br />
    <br />
    <b>Skin</b>
        <?php if(isset($item['id'])){
        $sql="select * from #_krpano_skinhotspot where id=".$item['style'];
            $d->query($sql);
            $skin=$d->fetch_array();
        ?>
        <img src="<?php echo _upload_hinhanh.$skin['url']; ?>" id='img_hotspot'>
        <?php }?>
        <select name="style">
            <option value="">Chọn skin</option>
            <?php for($i=0;$i<count($skinitems);$i++ ){
            ?>
                <option value="<?php echo $skinitems[$i]['id'] ?>" <?php echo ($skinitems[$i]['id']==@$item['style'])? 'selected':'' ?>><?php echo $skinitems[$i]['name'] ?></option>
            <?php 
            }
            ?>
        </select>
        <strong>skin hotspot</strong>
    <br />
    <br />
    <b>Scene</b>
        <select name="id_scene">
            <option value="">Chọn scene</option>
            <?php for($i=0;$i<count($items);$i++ ){
                if($items[$i]['id']!=$_GET['id_scene']){
            ?>
                <option value="<?php echo $items[$i]['id'] ?>" <?php echo ($items[$i]['id']==@$item['id_scene'])? 'selected':'' ?>><?php echo $items[$i]['name'] ?></option>
            <?php }}?>
        </select><strong>cảnh sẻ chuyển đến khi click vào hotspot</strong>
    <br />
    <br />
    <b>Audio</b>
        <select name="id_audio">
            <option value="">Chọn audio</option>
            <?php for($i=0;$i<count($audioitems);$i++ ){
            ?>
                <option value="<?php echo $audioitems[$i]['id'] ?>" <?php echo ($audioitems[$i]['id']==@$item['id_audio'])? 'selected':'' ?>><?php echo $audioitems[$i]['name'] ?></option>
            <?php 
            }
            ?>
        </select>
        <strong>audio scene</strong>
    <br />
    <br />
    
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=krpano&act=man_hotspot&id_scene=<?php echo @$_GET['id_scene']; ?>'" class="btn" />
</form>