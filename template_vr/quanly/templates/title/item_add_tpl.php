<h3> Cập nhật tiêu đề website</h3>

<form name="frm" method="post" action="index.php?com=title&act=save" enctype="multipart/form-data" class="nhaplieu">
	
	<b>Title:</b> <textarea  name="ten" cols="55" rows="10" ><?=@$item['ten']?> </textarea><br /><br>
	<b>Description:</b> <textarea  name="description" cols="55" rows="10" ><?=@$item['description']?> </textarea><br /><br>
	<b>keywords:</b> <textarea  name="keywords"cols="55" rows="10" ><?=@$item['keywords']?> </textarea><br /><br>
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=title&act=capnhat'" class="btn" />
</form>