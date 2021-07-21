<h3>Thêm Lịch trình</h3>

<form name="frm" method="post" action="index.php?com=lichtrinh&act=save_photo&id=<?php echo $_REQUEST['id'];?>&id_sp=<?php echo $_REQUEST['id_sp']?>" enctype="multipart/form-data" class="nhaplieu">
	

	</br>
	<br />
	<b>Tên Tour: </b> <input name="ten" value="<?php echo @$item['ten']?>" type="text" size="40"   />	
	<br />
	<b>Ghi chú: </b>
	<div>
	 <textarea class="mota" name="mota" id="mota"><?php echo @$item['mota']?></textarea></div> <br/>  
 
      
	<br />
	<br />
	<br />
	<link rel="stylesheet" href="jquery-ui.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<br />
	  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
	dateFormat: "dd/mm/yy",
	});
    $( "#datepicker2" ).datepicker({
	dateFormat: "dd/mm/yy",
	});
  } );
  </script>

 
<b>Ngày khởi hành</b><input type="text" name='batdau' id="datepicker" value='<?php if( isset( $item ) ){ echo date('d/m/Y',$item['batdau']) ;};?>'></br>
</br>
<b>Ngày kết thúc </b><input type="text" name='ketthuc' id="datepicker2" value='<?php  if( isset( $item ) ){ echo date('d/m/Y',$item['ketthuc']);};?>' ></br>
 
</br>
    

     <input name="id_sp" type="hidden" value="<?php echo $_GET['id_sp']?>"   />	 
     <input name="id" type="hidden" value="<?php echo $_GET['id']?>"   />	
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?php echo @$item['stt']?>" style="width:30px" />	<br />
	 <b>Hiển thị </b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /><br />
   
	<input type="hidden" name="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=lichtrinh&act=man_photo&id_sp=<?php echo $_GET['id_sp'];?>'" class="btn" />
</form>