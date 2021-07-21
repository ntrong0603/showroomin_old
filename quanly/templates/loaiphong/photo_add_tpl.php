<h3>Loại phòng</h3>

<form name="frm" method="post" action="index.php?com=loaiphong&act=save_photo&id=<?php echo $_REQUEST['id'];?>&id_sp=<?php echo $_REQUEST['id_sp']?>" enctype="multipart/form-data" class="nhaplieu">
	
  <?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình ảnh:</b><img src="<?php echo _upload_sanpham.$item['thumb']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn hình:</b> <input type="file" name="file" />255*190 <?php echo _place_type?><br />
    <br />
	
	<br />
	<b>Tên phòng: </b> <input name="ten" value="<?php echo @$item['ten']?>" type="text" size="40"   />	
	<br />
	
	<br />
	<br />
	<div style='font-size: 24px; color: red;'>Phần Khúc Giá Phòng chỉ có khi Edit</div>
	
	</br>
	</br>
	</br>
     <b>Mô tả</b><br/>
	<div>
	 <textarea class="mota" name="mota" id="mota"><?php echo @$item['mota']?></textarea></div> <br/>  
 
      <script language="javascript">CKEDITOR.replace('mota');</script> 
	<br />
    

     <input name="id_sp" type="hidden" value="<?php echo $_GET['id_sp']?>"   />	 
     <input name="id" type="hidden" value="<?php echo $_GET['id']?>"   />	
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?php echo @$item['stt']?>" style="width:30px" />	<br />
	 <b>Hiển thị </b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /><br />
   
	<input type="hidden" name="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=loaiphong&act=man_photo&id_sp=<?php echo $_GET['id_sp']?>'" class="btn" />
</form>