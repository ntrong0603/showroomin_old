<?php if ($_REQUEST['act']=='edit_list') { ?> <h3>Sửa danh mục cấp 2</h3> <?php }else{ ?><h3>Thêm danh mục cấp 2</h3><?php } ?>
<?php	
	function get_main_danhmuc()
	{
		$sql_huyen="select * from table_duan_danhmuc order by stt,id desc ";
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

<form name="frm" method="post" action="index.php?com=duan&act=save_list&id=<?php echo @$item['id'];?>" enctype="multipart/form-data" class="nhaplieu">	    	    <b>Danh mục cấp 1:</b><?php echo get_main_danhmuc();?><br /><br /> 
	
             <b>Tên <?php echo $ngonngu1;?></b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /><br>
			 	<b>Link</b> <input type="text" name="tenkhongdau" value="<?php echo @$item['tenkhongdau']?>" class="input" /><br /> 
  
	<?php if($langnum >=2){?>
    <b>Tên <?php echo $ngonngu2;?> </b> <input type="text" name="ten_sd" value="<?php echo @$item['ten_sd']?>" class="input" /><br /><br>
	<?php } ?>
	<?php if($langnum >=3){?>
    <b>Tên <?php echo $ngonngu3;?> </b> <input type="text" name="ten_rd" value="<?php echo @$item['ten_rd']?>" class="input" /><br /><br>
	<?php } ?>
    <?php if ($_REQUEST['act']=='edit_list')
	{?>
	<b>Hình ảnh đại diện:</b><img src="<?php echo "../upload/duan".$item['thumb']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
    <b>Chọn hình đại diện:</b> <input type="file" name="file" /> <?php echo _duan_type?><br />
	 <br />
    
    
     <b>Mô tả</b><br/>
	<div>
	 <textarea class="mota" name="mota" id="mota"><?php echo @$item['mota']?></textarea></div> <br/>  
     <script language="javascript">CKEDITOR.replace('mota');</script> 
     
    <b>Nội dung</b><br/>
	<div>
	  <textarea name="noidung" id="noidung"><?php echo @stripslashes($item['noidung'])?></textarea></div> <br/>  
     <script language="javascript">CKEDITOR.replace('noidung');</script> 
     
     
    <br /> 
	
    <b>Mô tả Tiếng Anh</b><br/>
	<div>
	 <textarea class="mota" name="mota_sd" id="mota_sd"><?php echo @$item['mota_Sd']?></textarea></div> <br/>  
     <script language="javascript">CKEDITOR.replace('mota_sd');</script> 
     
    <b>Nội dung Tiếng Anh</b><br/>
	<div>
	  <textarea name="noidung_sd" id="noidung_sd"><?php echo @stripslashes($item['noidung_sd'])?></textarea></div> <br/>  
     <script language="javascript">CKEDITOR.replace('noidung_sd');</script> 
     
     
    <br />
    <b>Title</b>
	<div><textarea name="title" id="title"><?php echo @$item['title']?></textarea></div><br/> 
    <b>Keywords</b>
	<div><textarea name="keywords" id="keywords"><?php echo @$item['keywords']?></textarea></div><br/> 
    
    <b>Description</b>
	<div><textarea name="description" id="description"><?php echo @$item['description']?></textarea></div><br/>  
        
    <b>Tags</b>
	<div><textarea name="tag" id="tag"><?php echo @$item['tag']?></textarea></div><br/>   
    
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	 
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=duan&act=man_list'" class="btn" />
</form>