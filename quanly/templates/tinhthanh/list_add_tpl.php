<?php if ($_REQUEST['act']=='edit_list') { ?> <h3>Sửa danh mục cấp 2</h3> <?php }else{ ?><h3>Thêm danh mục cấp 2</h3><?php } ?>
<?php	
	function get_main_danhmuc()
	{
		$sql_huyen="select * from table_tinhthanh_danhmuc order by stt,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_danhmuc" name="id_danhmuc">
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

<form name="frm" method="post" action="index.php?com=tinhthanh&act=save_list&id=<?php echo @$item['id'];?>" enctype="multipart/form-data" class="nhaplieu">	    	    
<b>Danh mục cấp 1:</b><?php echo get_main_danhmuc();?><br /><br /> 
	
             <b>Tên</b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /><br>
	
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
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=tinhthanh&act=man_list'" class="btn" />
</form>