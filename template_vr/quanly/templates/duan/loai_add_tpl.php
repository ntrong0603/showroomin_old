<?php if ($_REQUEST['act']=='edit_item') { ?> <h3>Sửa danh mục cấp 4</h3> <?php }else{ ?><h3>Thêm danh mục cấp 4</h3><?php } ?>
<script language="javascript">				
	function select_onchange()
	{				
		var b=document.getElementById("id_danhmuc");
		window.location ="index.php?com=duan&act=<?php if($_REQUEST['act']=='edit_item') echo 'edit_item'; else echo 'add_item';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+b.value;	
		return true;
	}
	function select_onchange1()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		window.location ="index.php?com=duan&act=<?php if($_REQUEST['act']=='edit_item') echo 'edit_item'; else echo 'add_item';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value+"&id_list="+b.value;	
		return true;
	}
	
</script>

<?php	
	function get_main_cat()
	{
		$sql_huyen="select * from table_duan_cat where id_list=".$_REQUEST['id_list']." order by stt,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_cat" name="id_cat">
			<option value="0">Chọn danh mục</option>
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
	function get_main_list()
	{
		$sql_huyen="select * from table_duan_list where id_danhmuc=".$_REQUEST['id_danhmuc']."  order by stt,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange1()" >
			<option value="0">Chọn danh mục</option>
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_list"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	function get_main_danhmuc()
	{
		$sql_huyen="select * from table_duan_danhmuc order by stt,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_danhmuc" name="id_danhmuc" onchange="select_onchange()" >
			<option value="0">Chọn danh mục</option>
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_danhmuc"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>


<form name="frm" method="post" action="index.php?com=duan&act=save_item&id=<?php echo @$item['id'];?>" enctype="multipart/form-data" class="nhaplieu">	
	<b>Danh mục 1:</b><?php echo get_main_danhmuc();?><br /><br /> 
	<b>Danh mục 2:</b><?php echo get_main_list();?><br /><br /> 
    <b>Danh mục 3:</b><?php echo get_main_cat();?><br /><br /> 
         <b>Tên <?php echo $ngonngu1;?></b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /><br>
		 	<b>Link</b> <input type="text" name="tenkhongdau" value="<?php echo @$item['tenkhongdau']?>" class="input" /><br /> 
  
	<?php if($langnum >=2){?>
    <b>Tên <?php echo $ngonngu2;?> </b> <input type="text" name="ten_sd" value="<?php echo @$item['ten_sd']?>" class="input" /><br /><br>
	<?php } ?>
	<?php if($langnum >=3){?>
    <b>Tên <?php echo $ngonngu3;?> </b> <input type="text" name="ten_rd" value="<?php echo @$item['ten_rd']?>" class="input" /><br /><br>
	<?php } ?>
    <?php if ($_REQUEST['act']=='edit_item')
	{?>
	<b>Hình ảnh đại diện:</b><img src="<?php echo "../upload/duan".$item['thumb']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn hình đại diện:</b> <input type="file" name="file" /> <?php echo _duan_type?><br />
    <br />
    
    <b>Title</b>
	<div><textarea name="title" id="title"><?php echo @$item['title']?></textarea></div><br/> 
    <b>Keyword</b>
	<div><textarea name="keyword" id="keyword"><?php echo @$item['keyword']?></textarea></div><br/> 
    
    <b>Description</b>
	<div><textarea name="description" id="description"><?php echo @$item['description']?></textarea></div><br/>   
    
   
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=duan&act=man_item'" class="btn" />
</form>