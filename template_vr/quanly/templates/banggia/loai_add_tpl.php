<h3>Thêm danh mục</h3>
<script language="javascript">				
	function select_onchange1()
	{				
		var a=document.getElementById("id_list");
		window.location ="index.php?com=place&act=<?php if($_REQUEST['act']=='edit_item') echo 'edit_item'; else echo 'add_item';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_list="+a.value;	
		return true;
	}

	
</script>
<?php
function get_main_list()
	{
		$sql="select * from table_place_list order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange1()" class="main_font">
			<option>Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_list"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	
	function get_main_category()
	{
		$sql_huyen="select * from table_place_cat where id_list=".$_REQUEST['id_list']." order by id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_cat" name="id_cat"">
			<option>Chọn danh mục</option>			
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_cat"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
?>
<form name="frm" method="post" action="index.php?com=place&act=save_item&curPage=<?php echo $_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">	 
      <b>Danh mục cấp 1:</b><?php echo get_main_list();?><br /><br />
	<b>Danh mục cấp 2:</b><?php echo get_main_category();?><br /><br />   	
	<b>Tiêu đề</b> <input type="text" name="ten" value="<?php echo $item['ten']?>" class="input" /><br />     
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	<b>Hiển thị tin</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /><br />
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=place&act=man_item'" class="btn" />
</form>