

<h3>Chi tiết</h3>

<form name="frm" method="post" action="index.php?com=khuvuc&act=save&curPage=<?php echo $_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
   
	
    <b>Tên khu vực</b> <input type="text" name="ten" value="<?php echo $item['ten']?>" class="input" /><br />     
    <b>Các quận huyện thuộc khu vực</b> <input type="text" name="khuvuc" value="<?php echo $item['khuvuc']?>" class="input" /><br />     
	<b>Giá các gói cước:</b>
	<br/>
	<br/>
		
	<?php
		for($j=0, $countj=count($cacdichvu);$j<$countj;$j++){
		?>
		
			
		 <b><?php echo $cacdichvu[$j]['ten'];?> </b> <input type="text" name="<?php echo $cacdichvu[$j]['maso'];?>" value="<?php echo $item[$cacdichvu[$j]['maso']]?>" class="input" /><br />	
		<?php
		}
		?>
    <br /> 
    <br /> 
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
    <br />  
   	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=khuvuc&act=man'" class="btn" />
</form>


