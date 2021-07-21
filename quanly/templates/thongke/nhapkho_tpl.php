
<form name="frm" method="post" action="index.php?com=thongke&act=nhapkho" enctype="multipart/form-data" class="nhaplieu">
	

	<link rel="stylesheet" href="jquery-ui.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<br />
	  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
	dateFormat: "dd-mm-yy",
	});
    $( "#datepicker2" ).datepicker({
	dateFormat: "dd-mm-yy",
	});
  } );
  </script>

 
<b>Từ ngày</b><input type="text" name='batdau' id="datepicker" value='<?php if( isset( $item ) ){ echo date('d/m/Y',$item['batdau']) ;};?>'></br>
</br>
<b>Đến ngày</b><input type="text" name='ketthuc' id="datepicker2" value='<?php  if( isset( $item ) ){ echo date('d/m/Y',$item['ketthuc']);};?>' ></br>
 
</br>

	<input type="hidden" name="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Submit" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=thongke&act=nhapkho'" class="btn" />
</form>

<?php if( count($ketqua)>0 ){ ?>

<table class='blue_table'>
	<tr>
		<th>STT</th>
		<th>id nhập</th>
		<th>Tên sản phẩm</th>
		<th>Số lượng</th>
		<th>Giá</th>
		<th>Ghi chú</th>
		<th>Ngày thực hiện</th>
		<th>Nhân viên</th>
	</tr>
	<?php for($i=0;$i<count($ketqua);$i++){?>
	<tr>
	<td style="width:6%;" ><?php echo $i+1;?></td>
	<td style="width:6%;" ><?php echo $ketqua[$i]['id_nhapkho'];?></td>
	<td  style="width:16%;" ><?php $ar=explode('_',$ketqua[$i]['id_sp']); echo tenid($ar[1],'place'); ?></td>
	
	<td  style="width:6%;" ><?php echo $ketqua[$i]['soluong'];?></td>
	<td  style="width:6%;"><?php echo tien($ketqua[$i]['gia']);?></td>
	
	<td  style="width:16%;" ><?php echo $ketqua[$i]['mota'];?></td>
	
	<td style="width:6%;" ><?php echo date("d-m-Y",$ketqua[$i]['ngaytao']);?></td>
	
	<td style="width:16%;" ><?php echo tenid($ketqua[$i]['user'],'user');?></td>
	</tr>
	
	<?php } ?>
</table>

<?php } else {?>

<div id='' class='' > <b class='redbold'>Không có đơn hàng trong thời gian này</b> </div>
<?php }?>