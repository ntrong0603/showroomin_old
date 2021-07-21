<?php if($_GET['act']=='edit') 
    { 
        echo '<h3>Sửa phòng</h3>';
    } else 
    { 
        echo '<h3>Thêm Phòng</h3>'; 
    }
?>
<form name="frm" method="post" action="index.php?com=krpano&act=save&id=<?php echo $_REQUEST['id']?>" enctype="multipart/form-data" class="nhaplieu">
    <input type="hidden" name="id" value="<?php echo @$item['id']; ?>" class="input"/>
	<b>Name</b> <input type="text" name="name" value="<?php echo @$item['name']; ?>" class="input"/><strong>Tên hình ảnh</strong>
    <br />
    <br />
    <b>Title</b> <input type="text" name="title" value="<?php echo @$item['title']; ?>"  class="input"/><strong>Tiêu đề hình ảnh</strong>
    <br />
    <br />
	<b>Thumb</b> 
        <img src="<?php echo _upload_hinhanh.@$item['namefolderimg'].'/'.@$item['thumburl'];?>" width='150px'>
        <input type="file" name="thumb" /><strong>Hình thumb</strong>
    <br />
    <br />
    <b>hlookat</b> <input class="input" type="text" name="hlookat" value="<?php echo @$item['hlookat']; ?>"/><strong>góc nhìn trái qua phải ban đầu</strong>
    <br />
    <br />
    <b>vlookat</b> <input class="input" type="text" name="vlookat" value="<?php echo @$item['vlookat']; ?>"/><strong>góc nhìn từ dưới lên ban đầu</strong>
    <br />
    <br />
    <b>fov</b> <input class="input" type="text" name="fov" value="<?php echo @$item['fov']; ?>"/><strong>tầm nhìn ban đầu</strong>
    <br />
    <br />
    <b>fovmin</b> <input class="input" type="text" name="fovmin" value="<?php echo @$item['fovmin']; ?>"/><strong>tầm nhìn ban đầu thấp nhất</strong>
    <br />
    <br />
    <b>fovmax</b> <input class="input" type="text" name="fovmax" value="<?php echo @$item['fovmax']; ?>"/><strong>tầm nhìn ban đầu cao nhất</strong>
    <br />
    <br />
    <b>maxpixelzoom</b> <input class="input" type="text" name="maxpixelzoom" value="<?php echo @$item['maxpixelzoom']; ?>"/><strong>hệ số zoom tối đa</strong>
    <br />
    <br />
    <b>radarheading</b> <input class="input" type="text" name="radarheading" value="<?php echo @$item['radarheading']; ?>"/><strong>góc nhìn ban đầu của radar</strong>
    <br />
    <br />
    <b>Video</b>
        <select name="idvideo">
            <option value="">Chọn video</option>
            <?php for($i=0;$i<count($items);$i++ ){?>
                <option value="<?php echo $items[$i]['id'] ?>" <?php echo ($items[$i]['id']==@$item['idvideo'])? 'selected':'' ?>><?php echo $items[$i]['videourl'] ?></option>
            <?php }?>
        </select><strong>Video trong phòng</strong>
    <br />
    <br />
    <b>previewurl</b> 
    <input class="input" type="text" name='previewurl' value="<?php echo @$item['previewurl']; ?>" ><strong>"Đường dẫn file ảnh preview"</strong>
    
    <br />
    <br />
    <b>cubeurl</b> 
    <input class="input" type="text" name='cubeurl' value="<?php echo @$item['cubeurl']; ?>"><strong>"Đường dẫn file ảnh pano"</strong>
    
    <br />
    <br />
    <b>cubemobileurl</b> 
    <input class="input" type="text" name='cubemobileurl' value="<?php echo @$item['cubemobileurl']; ?>"><strong>"Đường dẫn file ảnh pano trên mobile"</strong>
    
    <br />
    <br />
    
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=krpano&act=man'" class="btn" />
</form>