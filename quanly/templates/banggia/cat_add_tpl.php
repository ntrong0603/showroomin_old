<?php
function get_main_category()
	{
		$sql="select * from table_place_list order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange1()" class="main_font">
			<option>Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_cat"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	?>
<h3>Thêm danh mục</h3>
<form name="frm" method="post" action="index.php?com=place&act=save_cat" enctype="multipart/form-data" class="nhaplieu">	
      <b>Danh mục:</b><?php echo get_main_category();?><br /><br />
    <b>Tên</b> <input type="text" name="ten" value="<?php echo $item['ten']?>" class="input" /><br /><br>
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=place&act=man_cat'" class="btn" />
</form>