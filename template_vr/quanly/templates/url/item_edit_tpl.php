<h3>Quản lý hình ảnh</h3>
<?php
	function get_main_item()
	{
		$sql_huyen="select * from table_product_item order by stt,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_item" name="id_item"">
			<option>Chọn danh mục</option>			
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
<form name="frm" method="post" action="index.php?com=hinhanh&act=save&p=<?=$_REQUEST['p']?>" enctype="multipart/form-data" class="nhaplieu">	     
	<b>Album khách hàng:</b><?=get_main_item();?><br /><br />   
	<?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_sanpham.$item['thumb']?>"  alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?=_product_type?><br />
    <br />
	<b>Tiêu đề</b> <input type="text" name="ten" value="<?=$item['ten']?>" class="input" /><br />   
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	<b>Hiển thị tin</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /><br />
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hinhanh&act=man'" class="btn" />
</form>