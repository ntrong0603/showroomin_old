

<h3>Sản phẩm</h3>

<form name="frm" method="post" action="index.php?com=placeComments&act=save&curPage=<?php echo $_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">

	  
    <b>Họ tên</b> <input type="text" name="name" value="<?php echo $item['name']?>" class="input" /><br /><br />     
    <b>Họ tên</b> <input type="text" name="email" value="<?php echo $item['email']?>" class="input" /><br /><br />     

     <b>Nội dung: </b><textarea name="content" style="width: 248px;height: 100px;"><?php echo $item['content']?></textarea
    <br/><br/>

	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=placeComments&act=man'" class="btn" />
</form>


