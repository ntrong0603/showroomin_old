<h3>Loại giấy</h3>

<form name="frm" method="post" action="index.php?com=combo&act=save_photo&id=<?php echo $_REQUEST['id'];?>&id_sp=<?php echo $_REQUEST['id_sp']?>" enctype="multipart/form-data" class="nhaplieu">
<!--	
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
	
	-->
	<b>Mã sp: </b> <input name="masp" id='masp' value="<?php echo @$item['masp']?>" type="text" size="40"   />	
	</br>
	</br>
	<b>Tên sp: </b> <input name="ten" id='tensp' value="<?php echo @$item['ten']?>" type="text" readonly size="40"   />(auto load)	
	</br>
	</br>
	
	
	<b>Giá Combo cơ bản: </b> <input name="gia" value="<?php echo @$item['gia']?>" type="text" size="40"   />	
	</br>
	</br>
	<b>Số lượng tối thiểu: </b> <input name="soluong" value="<?php echo @$item['soluong']?>" type="text" size="40"   />	
	</br>
	<b>Giá tăng cho mỗi đơn vị thêm: </b> <input name="gia2" value="<?php echo @$item['gia2']?>" type="text" size="40"   />	
	</br>
	</br>
	</br>
     <b>Ghi chú</b><br/>
	<div>
	 <textarea class="mota" name="mota" id="mota"><?php echo @$item['mota']?></textarea></div> <br/>  
 
      
	<br />
    

     <input name="id_sp" type="hidden" value="<?php echo $_GET['id_sp']?>"   />	 
     <input name="id" type="hidden" value="<?php echo $_GET['id']?>"   />	
	
	<input type="hidden" name="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=combo&act=man_photo&id_sp=<?php echo $_GET['id_sp']?>'" class="btn" />
</form>
<script>
$(document).ready(function(){
		$('#masp').keyup(function(){
								idsp=$(this).val();
							
						
							$.ajax({
													type:"get",
													url:"templates/dichvu/ajax/ajaxloadten.php",
													data:"idsp="+idsp,
													async:false,
													success:function(kq){
													$('#tensp').val(kq);
													
													}
												})
						})	
		
		
							})

</script>