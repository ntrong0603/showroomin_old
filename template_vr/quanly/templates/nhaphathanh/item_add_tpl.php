

<?php if ($_REQUEST['act']=='edit') { ?> <h3>Sửa nhà phát hành</h3> <?php }else{ ?><h3>Thêm nhà phát hành</h3><?php } ?>
<?php
function get_main_item()
	{
		$sql_huyen="select * from table_nhaphathanh_item order by stt,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_item" name="id_item"">
			<option value="0">Chọn danh mục</option>
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_item"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>
<form name="frm" method="post" action="index.php?com=nhaphathanh&act=save" enctype="multipart/form-data" class="nhaplieu">
	
    
    <?php if (@$_REQUEST['act']=='edit') { ?>
	<b>Hình hiện tại:</b><img src="<?php echo _upload_tintuc.$item['photo']?>" alt="NO PHOTO"  width="200"/><br />
	<?php }?><br />
    
	<b>Hình ảnh:</b> <input type="file" name="file" /><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Width:170px &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Height:130px  <?php echo _hinhanh_type?></strong><br /><br />
    
	<b>Tên nhà phát hành</b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /><br />
    <b>Website nhà phát hành</b> <input type="text" name="mota" value="<?php echo @$item['mota']?>" class="input" /><br /><br />
    	
	
     <b>Keyword</b><br/>
	<div><textarea name="keyword" id="keyword"><?php echo @$item['keyword']?></textarea></div><br/> 
    
    <b>Description</b><br/>
	<div><textarea name="description" id="description"><?php echo @$item['description']?></textarea></div><br/> 
	
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br><br/>
	
    <b>Nỗi bật</b> <input type="checkbox" name="noibat" <?php echo ($item['noibat']==1)?'checked="checked"':''?>><br />
    
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=nhaphathanh&act=man'" class="btn" />
</form>