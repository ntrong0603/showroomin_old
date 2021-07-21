<h3>Review--<?php 
$tam= explode("_",$_GET['id_sp']);
$d->query("select * from table_place where id=".$tam[1]);
$sanpham=$d->fetch_array();
echo $sanpham['ten'];
?>
</h3>

<form name="frm" method="post" action="index.php?com=review&act=save_photo&id=<?php echo $_REQUEST['id'];?>&id_sp=<?php echo $_REQUEST['id_sp']?>" enctype="multipart/form-data" class="nhaplieu">
<!--	
  <?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình ảnh:</b><img src="<?php echo _upload_sanpham.$item['thumb']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn hình:</b> <input type="file" name="file" />255*190 <?php echo _place_type?><br />
    <br />
	
	
	<br />
	<br />
	<div style='font-size: 24px; color: red;'>Phần Khúc Giá Phòng chỉ có khi Edit</div>
	
	</br>
	<b>Giá Nhập kho: </b> <input name="gia" value="<?php echo @$item['gia']?>" type="text" size="40"   />	
	</br>
	</br>
	<b>Số lượng: </b> <input name="soluong" value="<?php echo @$item['soluong']?>" type="text" size="40"   />	
	</br>
	-->
	<br />
	<b>Tên người review: </b> <input name="ten" value="<?php echo @$item['ten']?>" type="text" size="40"   />	
	<br />
	
	</br>
     <b>Review</b><br/>
	<div>
	 <textarea class="mota" name="mota" id="mota"><?php echo @$item['mota']?></textarea></div> <br/>  
 
      
	<br />
     <b>Hiển thị </b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /><br />
   

     <input name="id_sp" type="hidden" value="<?php echo $_GET['id_sp']?>"   />	 
     <input name="id" type="hidden" value="<?php echo $_GET['id']?>"   />	
	
	<input type="hidden" name="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=review&act=man_photo&id_sp=<?php echo $_GET['id_sp']?>'" class="btn" />
</form>