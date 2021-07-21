

<h3>Chi tiết</h3>

<form name="frm" method="post" action="index.php?com=guiyeucau&act=save&curPage=<?php echo $_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
   
	   
    <b>Loại yêu cầu</b> <?php echo $item['loaiyeucau']?><br />  <br />  
    <b>Tiêu đề</b> <?php echo $item['ten']?><br />     <br />  
    <b>Tên người gửi</b> <?php echo $item['tennguoigui']?><br />    <br />   
    <b>Điện thoại</b> <?php echo $item['dienthoai']?><br />     <br />  
    <b>Nội dung</b> <?php echo $item['noidung']?><br />     <br />  
	
	<b>Status</b><input type="text" name="status" id="status" value="<?php echo @$item['status']?>" /><br />  
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=guiyeucau&act=man'" class="btn" />
</form>


