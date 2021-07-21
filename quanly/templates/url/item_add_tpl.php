

<h3>Danh sách Ngân hàng</h3>

<form name="frm" method="post" action="index.php?com=url&act=save&p=<?php echo $_REQUEST['p']?>" enctype="multipart/form-data" class="nhaplieu">
   
	
    <b>Tên </b> <input type="text" name="tenkhongdau" value="<?php echo $item['tenkhongdau']?>" class="input" /><br />     
  
    <br /> 
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
    <br />  
   	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=url&act=man'" class="btn" />
</form>


