<?php
function get_main_danhmuc()
	{
		$sql="select * from table_yahoo_danhmuc order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_danhmuc" name="id_danhmuc" onchange="select_onchange()" class="main_font">
			<option value="0" >Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_danhmuc"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>
<h3>Thêm mới yahoo</h3>

<form name="frm" method="post" action="index.php?com=yahoo&act=save" enctype="multipart/form-data" class="nhaplieu">
	
	<b>Tên (vi) </b> 
	<input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /><br />
    <b>Tên (en) </b> 
	<input type="text" name="ten_sd" value="<?php echo @$item['ten_sd']?>" class="input" /><br /><br />
	
	<b>Yahoo </b>
	<input type="text" name="yahoo" value="<?php echo @$item['yahoo']?>" class="input" /><br /> <br />
    
    <b>Skype </b>
	<input type="text" name="skype" value="<?php echo @$item['skype']?>" class="input" /><br /> <br />
    
    <b>Email </b>
	<input type="text" name="email" value="<?php echo @$item['email']?>" class="input" /><br /> <br />
    
    <b>Điện thoại </b>
	<input type="text" name="dienthoai" value="<?php echo @$item['dienthoai']?>" class="input" /><br /> <br />
	
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=yahoo&act=man'" class="btn" />
</form>