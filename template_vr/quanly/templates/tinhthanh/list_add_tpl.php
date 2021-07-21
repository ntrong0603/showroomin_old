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
<b>Danh mục cấp 1:</b><?=get_main_danhmuc();?><br /><br /> 
	
             <b>Tên <?php echo $ngonngu1;?></b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br /><br>
			 	<b>Link</b> <input type="text" name="tenkhongdau" value="<?=@$item['tenkhongdau']?>" class="input" /><br /> 
  
	<?php if($langnum >=2){?>
    <b>Tên <?php echo $ngonngu2;?> </b> <input type="text" name="ten_sd" value="<?=@$item['ten_sd']?>" class="input" /><br /><br>
	<?php } ?>
	<?php if($langnum >=3){?>
    <b>Tên <?php echo $ngonngu3;?> </b> <input type="text" name="ten_rd" value="<?=@$item['ten_rd']?>" class="input" /><br /><br>
	<?php } ?>
    <?php if ($_REQUEST['act']=='edit_list')
	{?>
	<b>Hình ảnh đại diện:</b><img src="<?=_upload_sanpham.$item['thumb']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
    <b>Chọn hình đại diện:</b> <input type="file" name="file" /> <?=_tinhthanh_type?><br />
    <br />
    <b>Title</b>
	<div><textarea name="title" id="title"><?=@$item['title']?></textarea></div><br/> 
    <b>Keyword</b>
	<div><textarea name="keyword" id="keyword"><?=@$item['keyword']?></textarea></div><br/> 
    
    <b>Description</b>
	<div><textarea name="description" id="description"><?=@$item['description']?></textarea></div><br/>  
    
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	 
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=tinhthanh&act=man_list'" class="btn" />
</form>