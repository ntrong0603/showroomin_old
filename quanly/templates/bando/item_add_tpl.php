

<h3>TIN TỨC</h3>

<form name="frm" method="post" action="index.php?com=bando&act=save&curPage=<?php echo $_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">

    <b>Địa chỉ</b> 
    <br/>
    <textarea id="address" name="address"class="input" cols="20" rows="20"><?php echo $item['address']?>
    </textarea>
     
    <br />   
    <b>Tọa độ</b>
    <input type="text" id="toado" name="toado" value="<?php echo $item['toado']?>">
    <br /> 
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
    <br />  
   	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=bando&act=man'" class="btn" />
</form>