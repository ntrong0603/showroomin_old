<h3>Album</h3>
<form name="frm" method="post" action="index.php?com=album&act=save_item" enctype="multipart/form-data" class="nhaplieu">
	<b>Tên Album</b>  <input type="text" name="ten" value="" style="width:200px" />  <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <strong> &nbsp;&nbsp;&nbsp;&nbsp; .jpg, .gif, png</strong><br />
    <br />
	
    <br />
   
	<b>Số thứ tự </b> <input type="text" name="stt" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" checked="checked" /> <br /><br />
    
    
    <b>Title</b>
	<div><textarea name="title" id="title"><?php echo @$item['title']?></textarea></div><br/> 
    <b>Keyword</b>
	<div><textarea name="keyword" id="keyword"><?php echo @$item['keyword']?></textarea></div><br/> 
    
    <b>Description</b>
	<div><textarea name="description" id="description"><?php echo @$item['description']?></textarea></div><br/>  

	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=album&act=save_item'" class="btn" />
</form>