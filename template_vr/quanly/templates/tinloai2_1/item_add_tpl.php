

<h3>TIN TỨC</h3>

<form name="frm" method="post" action="index.php?com=tintuc&act=save&curPage=<?php echo $_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
   
	
  <?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình hiện tại:</b><img src="<?php echo _upload_tintuc.$item['thumb']?>"  width="120" alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?php echo _tintuc_type?><br />
    <br />
    <!-- <b>Tên tin tức</b> <input type="text" name="ten" value="<?php echo $item['ten']?>" class="input" /><br />  -->
    <b>Tên tin tức</b> <input type="text" name="ten_vi" value="<?php echo $item['ten_vi']?>" class="input" /><br />     
   
<!--     <b>Mô tả</b> 
    <textarea name="mota" cols="100" rows="6" class="input"><?php echo $item['mota']?>
    </textarea>
    <br /> -->
    <b>Mô tả</b> 
    <textarea name="mota_vi" cols="100" rows="6" class="input"><?php echo stripcslashes($item['mota_vi'])?>
    </textarea>
    <br />   
        
  <b>Nội dung</b><br/>
	<div>
	 <textarea name="noidung_vi" id="noidung_vi"><?php echo $item['noidung_vi']?></textarea></div>
	 <script language="javascript">CKEDITOR.replace('noidung_vi');</script>
    <br /> 
   
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
    <br />  
   	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=tintuc&act=man'" class="btn" />
</form>