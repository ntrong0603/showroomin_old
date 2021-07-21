<h3>Album</h3>

<form name="frm" method="post" action="index.php?com=album&act=save_item&id=<?=$_REQUEST['id'];?><?=$callback?>" enctype="multipart/form-data" class="nhaplieu">
	<b>Tên Album</b>  <input type="text" name="ten" value="<?=@$item['ten']?>" style="width:200px" />  <br /><br />
	<b>Tên Album tiếng Anh</b>  <input type="text" name="ten_sd" value="<?=@$item['ten_sd']?>" style="width:200px" />  <br />
	<br />
	<b>&nbsp;</b> 
    
        <img src="<?=_upload_album.$item['photo']?>" width="200" />
    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <strong> &nbsp;&nbsp;&nbsp;&nbsp; .jpg, .gif, png | Rộng: <?=$cfa['width']?>,Cao: <?=$cfa['height']?></strong> <br /><br/> 
	
    <b>Title</b>
	<div><textarea name="title" id="title"><?=@$item['title']?></textarea></div><br/> 
	<b>Title tiếng Anh</b>
	<div><textarea name="title_sd" id="title_sd"><?=@$item['title_sd']?></textarea></div><br/> 
    <b>Keyword</b>
	<div><textarea name="keyword" id="keyword"><?=@$item['keyword']?></textarea></div><br/> 
    
    <b>Description</b>
	<div><textarea name="description" id="description"><?=@$item['description']?></textarea></div><br/>  
	
    

    
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?=@$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=@$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=album&act=man_item<?=$callback?>'" class="btn" />
</form>