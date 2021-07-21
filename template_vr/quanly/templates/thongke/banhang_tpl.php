
<form name="frm" method="post" action="index.php?com=thongke&act=banhang" enctype="multipart/form-data" class="nhaplieu">
	

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
 
 <b>Nhân viên bán hàng</b>
	<select name='nhanvien'>
		<option value='0'>Tất cả</option>
		<?php $d->query("select * from table_user ");
		$nhanvien=$d->result_array();?>
		
		<?php for($i=0;$i<count($nhanvien);$i++){?>
		<option value='<?php echo $nhanvien[$i]['id'];?>' ><?php echo $nhanvien[$i]['ten'];?></option>
		
		<?php } ?>
	</select>
 
</br>

	<input type="hidden" name="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Submit" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=thongke&act=banhang'" class="btn" />
	
	
</form>

<?php if( count($ketqua)>0 ){ ?>

<table class='blue_table'>
	<tr>
		<th>STT</th>
		
		<th>Nhân viên</th>
		<th>Tình trạng</th>
		<th>Ghi chú</th>
		<th>Ngày thực hiện</th>
		<th>Xem chi tiết</th>
	</tr>
	<?php for($i=0;$i<count($ketqua);$i++){?>
	<tr>
	<td style="width:6%;" ><?php echo $i+1;?></td>
	
	<td style="width:16%;" ><?php echo tenid($ketqua[$i]['iduser'],'user');?></td>
	
	 <td style="width:15%;" align="center">
		   <?php 
		   		$sql="select trangthai from #_tinhtrang where id= '".$ketqua[$i]['tinhtrang']."' ";
				$d->query($sql);
				$result=$d->fetch_array();
				echo $result['trangthai'];
		   ?>
           
       </td> 
	
	<td  style="width:16%;" ><?php echo $ketqua[$i]['ghichu'];?></td>
	
	<td style="width:6%;" ><?php echo date("d-m-Y",$ketqua[$i]['ngaytao']);?></td>
	<td style="width:6%;" ><a href='index.php?com=thongke&act=banhangchitiet&id=<?php echo $ketqua[$i]['id'];?>' target='_blank' >Xem chi tiết</a></td>
	
	</tr>
	
	<?php } ?>
</table>

<?php } else {?>

<div id='' class='' > <b class='redbold'>Không có log trong thời gian này</b> </div>
<?php }?>