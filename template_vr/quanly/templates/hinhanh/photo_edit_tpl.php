<h3>Album</h3>

<form name="frm" method="post" action="index.php?com=hinhanh&act=save_photo&id=<?php echo $_REQUEST['id'];?>&idc=<?php echo $_REQUEST['idc']?>" enctype="multipart/form-data" class="nhaplieu">
	<b>Tên Album</b>  <input type="text" name="ten" value="<?php echo @$item['ten']?>" style="width:200px" />  <br />
	<b>&nbsp;</b> 
    
        <img src="<?php echo _upload_hinhanh.$item['photo']?>" width="100" />
    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <strong> &nbsp;&nbsp;&nbsp;&nbsp; .jpg, .gif, png</strong> <br />
	
    <b>Title</b>
	<div><textarea name="title" id="title"><?php echo @$item['title']?></textarea></div><br/> 
    <b>Keyword</b>
	<div><textarea name="keyword" id="keyword"><?php echo @$item['keyword']?></textarea></div><br/> 
    
    <b>Description</b>
	<div><textarea name="description" id="description"><?php echo @$item['description']?></textarea></div><br/>  
	
    

    
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?php echo @$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo @$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hinhanh&act=man_photo'" class="btn" />
</form>