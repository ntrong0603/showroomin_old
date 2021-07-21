

<h3>Sản phẩm</h3>

<form name="frm" method="post" action="index.php?com=productComments&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">

	  
    <b>Họ tên</b> <input type="text" name="name" value="<?=$item['name']?>" class="input" /><br /><br />     
    <b>Họ tên</b> <input type="text" name="email" value="<?=$item['email']?>" class="input" /><br /><br />     

     <b>Nội dung: </b><textarea name="content" style="width: 248px;height: 100px;"><?=$item['content']?></textarea
    <br/><br/>

	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=productComments&act=man'" class="btn" />
</form>


