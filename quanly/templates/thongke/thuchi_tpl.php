
<form name="frm" method="post" action="index.php?com=thongke&act=thuchi" enctype="multipart/form-data" class="nhaplieu">
	

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
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=thongke&act=thuchi'" class="btn" />
	
	
</form>

<?php if( count($ketquachi)>0 ){ ?>

<div id='' class='' > <b class='redbold'>Kết quả chi</b> </div>
<table class='blue_table'>
	<tr>
		<th>STT</th>
		
		<th>Tên sản phẩm</th>
		<th>Số lượng</th>
		<th>Giá</th>
		<th>Tổng tiền</th>
		
	</tr>
	<?php $tongcongchi=0; for($i=0;$i<count($ketquachi);$i++){?>
	<tr>
	<td style="width:6%;" ><?php echo $i+1;?></td>
	
		<td  style="width:16%;" ><?php $ar=explode('_',$ketquachi[$i]['id_sp']); echo tenid($ar[1],'place'); ?></td>
	
	<td  style="width:6%;" ><?php echo $ketquachi[$i]['soluong'];?></td>
	<td  style="width:6%;"><?php echo tien($ketquachi[$i]['gia']);?></td>
	<td  style="width:6%;"><?php echo tien($ketquachi[$i]['gia']*$ketquachi[$i]['soluong']); $tongcongchi+=$ketquachi[$i]['gia']*$ketquachi[$i]['soluong'];?></td>
	
	</tr>
	
	<?php } ?>
</table>
<div id='' class='' style='text-align: right;' > <b class='redbold'>Tổng cộng chi</b> <?php echo tien($tongcongchi);?></div>
<?php } else {?>

<div id='' class='' > <b class='redbold'>Không có chi trong thời gian này</b> </div>
<?php }?>

=======================================================

<?php if( count($ketquathu)>0 ){ ?>

<div id='' class='' > <b class='redbold'>Kết quả thu</b> </div>
<table class='blue_table'>
	<tr>
		<th>STT</th>
		
		<th>Tên sản phẩm</th>
		<th>Số lượng</th>
		<th>Giá</th>
		<th>Tổng tiền</th>
		
	</tr>
	<?php $tongcongthu=0; for($i=0;$i<count($ketquathu);$i++){?>
	<tr>
	<td style="width:6%;" ><?php echo $i+1;?></td>
	
		<td  style="width:16%;" ><?php echo $ketquathu[$i]['ten'];?></td>
	
	<td  style="width:6%;" ><?php echo $ketquathu[$i]['soluong'];?></td>
	<td  style="width:6%;"><?php echo tien($ketquathu[$i]['gia']);?></td>
	<td  style="width:6%;"><?php echo tien($ketquathu[$i]['gia']*$ketquathu[$i]['soluong']); $tongcongthu=$ketquathu[$i]['gia']*$ketquathu[$i]['soluong'];?></td>
	
	</tr>
	
	<?php } ?>
</table>
<div id='' class='' style='text-align: right;' > <b class='redbold'>Tổng cộng thu</b> <?php echo tien($tongcongthu);?></div>
<?php } else {?>

<div id='' class='' > <b class='redbold'>Không có thu trong thời gian này</b> </div>
<?php }?>