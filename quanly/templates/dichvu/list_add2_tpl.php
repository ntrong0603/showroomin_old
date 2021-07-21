<script language="javascript">			
	function select_onchange()
	{		
		var b=document.getElementById("id_list");
		window.location ="index.php?com=dichvu&act=<?php if($_REQUEST['act']=='edit_list2') echo 'edit_list2'; else echo 'add_list2';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_list="+b.value;	
		return true;
	}

	
</script>

<?php
function get_main_list()
	{
		$sql="select * from table_dichvu_list0 order by id asc";
		$stmt=mysql_query($sql);
		
		
		$str='<select id="id_list" name="id_list" class="main_font" onchange="select_onchange()">
			<option>Chọn danh mục</option>			
			';

		while ($row=@mysql_fetch_array($stmt)) 
		{
				if($row["id"]==(int)@$_REQUEST["id_list"])
					$selected="selected";
				else 
					$selected="";
				$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';

		}
		$str.='</select>';
		return $str;
	}
	function get_main_cat()
	{
		if(isset($_REQUEST['id_list']))
		{
			$id_list = $_REQUEST['id_list'];
			$sql="select * from table_dichvu_list where id_list='$id_list' order by id asc";
			$stmt=mysql_query($sql);
		}
		else{
			$sql="select * from table_dichvu_list order by id asc";
			$stmt=mysql_query($sql);
		}
		
		
		$str='<select id="id_group" name="id_group" class="main_font">
			<option>Chọn danh mục</option>			
			';

		while ($row=@mysql_fetch_array($stmt)) 
		{
				if($row["id"]==(int)@$_REQUEST["id_group"])
					$selected="selected";
				else 
					$selected="";
				$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';

		}
		$str.='</select>';
		return $str;
	}
?>

<h3>Thêm danh mục</h3>
<form name="frm" method="post" action="index.php?com=dichvu&act=save_list2" enctype="multipart/form-data" class="nhaplieu">	

	<b>Danh mục cấp 1:</b><?php echo get_main_list();?><br /><br />
	<b>Danh mục cấp 2:</b><?php echo get_main_cat();?><br /><br />
	
    <b>Tên danh mục</b> <input type="text" name="ten_vi" value="<?php echo @$item['ten_vi']?>" class="input" /><br /><br>
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=dichvu&act=man_list2'" class="btn" />
</form>