

<h3>Chi tiết</h3>

<form name="frm" method="post" action="index.php?com=quan&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
   
	
    <b>Tên </b> <input type="text" name="ten" value="<?=$item['ten']?>" class="input" /><br />     
  
    <br /> 
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
    <br />  
   	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=quan&act=man'" class="btn" />
</form>


