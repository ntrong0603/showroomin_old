

<h3>Order</h3>
<form name="frm" method="post" action="index.php?com=khuyenmai&act=save" enctype="multipart/form-data" class="nhaplieu">  

     <b>Nội dung</b><br/>
	<div>
	  <textarea name="noidung" id="noidung"><?php echo @stripslashes($item['noidung'])?></textarea></div> <br/>  
     <script language="javascript">CKEDITOR.replace('noidung');</script> 
      <b>Keyword</b><br/>
	<div><textarea name="keyword" id="keyword"><?php echo @$item['keyword']?></textarea></div><br/> 
    
    <b>Description</b><br/>
	<div><textarea name="description" id="description"><?php echo @$item['description']?></textarea></div><br/> 
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=khuyenmai&act=capnhat'" class="btn" />
</form>