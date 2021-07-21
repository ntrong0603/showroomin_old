<h3>Quảng cáo Bên Phải</h3>

<form name="frm" method="post" action="index.php?com=qcright&act=save&curPage=<?php echo $_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
   
	
  <?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình hiện tại:</b><img src="<?php echo _upload_qc.$item['thumb']?>"  width="120" alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?php echo _place_type?><br />
    <br />
    <b>Tên Slide</b> <input type="text" name="ten" value="<?php echo $item['ten']?>" class="input" /><br />     
    <br />
    <b>Link</b><textarea name="link" cols="100" rows="2" class="input"><?php echo $item['link']?>
    </textarea> <br />     
    <b>Mô tả</b> 
    <textarea name="mota" cols="100" rows="6" class="input"><?php echo $item['mota']?>
    </textarea>

    <br />     
  <b>Nội dung</b><br/>
	<div>
	 <textarea name="noidung" id="noidung"><?php echo $item['noidung']?></textarea>
	 <script language="javascript">CKEDITOR.replace('noidung');</script>
	 </div>
    <br /> 
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
    <br />  
   	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=qcright&act=man'" class="btn" />
</form>