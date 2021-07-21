
<h3>Album</h3>
<form name="frm" method="post" action="index.php?com=hinhanh&act=save_photo" enctype="multipart/form-data" class="nhaplieu">
	
<?php for($i=0; $i<1; $i++){?>
	 <b>Tên Album</b>  <input type="text" name="ten<?php echo $i?>" value="" style="width:200px" />  <br />
	<b>Hình ảnh <?php echo $i+1?></b> <input type="file" name="file<?php echo $i?>" /> <strong> &nbsp;&nbsp;&nbsp;&nbsp; .jpg, .gif, png</strong><br />
    <br />
	
    <br />
   
	<b>Số thứ tự </b> <input type="text" name="stt<?php echo $i?>" value="1" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi<?php echo $i?>" checked="checked" /> <br /><br />
    
    
    <b>Title</b>
	<div><textarea name="title<?php echo $i?>" id="title<?php echo $i?>"><?php echo @$item['title']?></textarea></div><br/> 
    <b>Keyword</b>
	<div><textarea name="keyword<?php echo $i?>" id="keyword<?php echo $i?>"><?php echo @$item['keyword']?></textarea></div><br/> 
    
    <b>Description</b>
	<div><textarea name="description<?php echo $i?>" id="description<?php echo $i?>"><?php echo @$item['description']?></textarea></div><br/>  
	
<?php }?>
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hinhanh&act=man_photo'" class="btn" />
</form>