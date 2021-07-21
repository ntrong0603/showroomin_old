<script language="javascript">		
	
	function select_onchange_l()
	{		
		var b=document.getElementById("id_list_l");
		window.location ="index.php?com=dichvu&act=<?php if($_REQUEST['act']=='edit_cat') echo 'edit_cat'; else echo 'add_cat';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_list_l="+b.value;	
		return true;
	}
	
	function select_onchange()
	{		
		var b=document.getElementById("id_list");
		var c=document.getElementById("id_list_l");
		window.location ="index.php?com=dichvu&act=<?php if($_REQUEST['act']=='edit_cat') echo 'edit_cat'; else echo 'add_cat';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_list="+b.value+"&id_list_l="+c.value;	
		return true;
	}

	
</script>

<?php
//cap 1
function get_main_list_l()
	{
		$sql="select * from table_dichvu_list0 order by stt,id asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list_l" name="id_list_l" onchange="select_onchange_l()" class="main_font">
			<option value="0">Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_list_l"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}

	//cap 2
function get_main_list()
	{
	
		if($_REQUEST['id_list_l']!=0)
		{
			$id_list_l = $_REQUEST['id_list_l'];
			$sql="select * from table_dichvu_list where id_list='$id_list_l' order by id asc";
			$stmt=mysql_query($sql);
		}
		else{
			$sql="select * from table_dichvu_list order by id asc";
			$stmt=mysql_query($sql);
		}
		
		
		$str='
			<select id="r " name="id_list" class="main_font">
			<option value="0">Chọn danh mục</option>			
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
?>

<h3>Thêm danh mục</h3>
<form name="frm" method="post" action="index.php?com=dichvu&act=save_cat" enctype="multipart/form-data" class="nhaplieu">	

	<b>Danh mục cấp 1:</b><?php echo get_main_list_l();?><br /><br />
	<b>Danh mục cấp 2:</b><?php echo get_main_list();?><br /><br />
	<?php if ($_REQUEST['act']=='edit_cat')
	{?>
	<b>Hình hiện tại:</b><img src="<?php echo _upload_sanpham.$item['photo']?>"  width="120" alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình đại diện:</b> <input type="file" name="file" /> <?php echo _dichvu_type?> - <span style="font-weight:bold; color:red">Kích thước hình: rộng: 210px, cao 170px</span><br />
	
    <b>Tên danh mục Việt</b> <input type="text" name="ten_vi" value="<?php echo @$item['ten_vi']?>" class="input" /><br /><br>
    <b>Tên danh mục Anh</b> <input type="text" name="ten_en" value="<?php echo @$item['ten_en']?>" class="input" /><br /><br>
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=dichvu&act=man_cat'" class="btn" />
</form>