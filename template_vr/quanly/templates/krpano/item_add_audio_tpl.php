<?php if($_GET['act']=='edit_audio') 
    { 
        echo '<h3>Sửa audio</h3>';
    } else 
    { 
        echo '<h3>Thêm audio</h3>'; 
    }
?>
<form name="frm" method="post" action="index.php?com=krpano&act=save_audio&id=<?php echo $_REQUEST['id']?>" enctype="multipart/form-data" class="nhaplieu">
    <input type="hidden" name="id" value="<?php echo @$item['id']; ?>" class="input"/>
    <b>Name</b> <input type="text" name="name" /> <strong> Tên audio</strong>
    <br />
    <br />
    <b>icon</b> 
    <?php if($_GET['act']=='edit_audio') 
    {?>
        <img src="<?php echo _upload_audio.'/'.@$item['icon']; ?>"> <?php }?>
        <input type="file" name="icon"/> <strong> Icon audio "PNG|png"</strong>
    <br />
    <br />
    <b>Audio</b> <input type="file" name="audio" /> <strong> File audio "MP3|mp3"</strong>
    <br />
    <br />
    <b>x</b> <input type="text" name="x" value="<?php echo @$item['x']; ?>" class="input"/> <strong> Tọa độ X icon cho audio</strong>
    <br />
    <br />
	<b>y</b> <input type="text" name="y" value="<?php echo @$item['y']; ?>" class="input"/> <strong> Tọa độ Y icon cho audio</strong>
    <br />
    <br />
    <b>alpha</b> <input type="text" name="alpha" value="<?php echo @$item['alpha']; ?>" class="input"/> <strong> Độ trong suốt của icon cho audio</strong>
    <br />
    <br />
    <b>scale</b> <input type="text" name="scale" value="<?php echo @$item['scale']; ?>" class="input"/> <strong> Kích thước icon cho audio</strong>
    <br />
    <br />
    <b>align</b> <input type="text" name="align" value="<?php echo @$item['align']; ?>" class="input"/> <strong> Vị trí icon cho audio</strong>
    <br />
    <br />
    <b>volume</b> <input type="text" name="volume" value="<?php echo @$item['volume']; ?>" class="input"/> <strong> Âm lượng icon cho audio</strong>
    <br />
    <br />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=krpano&act=man_audio'" class="btn" />
</form>