<h3>Quản lý Lịch trình</h3>
<a href="index.php?com=lichtrinh&act=add_photo&id_sp=<?php echo $_GET['id_sp']?>&id_mau=<?php echo $_GET['id_mau']?>"><img src="media/images/add.jpg" border="0"  /></a>

<table class="blue_table">
	<tr>
		<th style="width:6%;">Stt</th>
		<th style="width:6%;">Tên Tour</th>
		<th style="width:6%;">Từ ngày</th>
		<th style="width:6%;">Đến ngày</th>
	
	
      	<th style="width:6%;">Hiển thị</th>
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?php echo @$items[$i]['stt']?></td>
		<td style="width:6%;"><?php echo @$items[$i]['ten']?></td>
	<td style="width:6%;"><?php echo date('d/m/Y',$items[$i]['batdau']) ?>   </td>
			<td style="width:6%;"><?php echo date('d/m/Y',$items[$i]['ketthuc']) ?>   </td>
		<td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
        <a href="index.php?com=lichtrinh&act=man_photo&id_sp=<?php echo $_GET['id_sp'];?>&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_1.png" border="0" /></a>
		<?php }
		else
		{
		?>
         <a href="index.php?com=lichtrinh&act=man_photo&id_sp=<?php echo $_GET['id_sp'];?>&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>  
        </td>
		<td style="width:6%;"><a href="index.php?com=lichtrinh&act=edit_photo&id=<?php echo @$items[$i]['id']?>&id_sp=<?php echo @$items[$i]['id_sp']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:6%;"><a href="index.php?com=lichtrinh&act=delete_photo&id=<?php echo @$items[$i]['id']?>&id_sp=<?php echo @$items[$i]['id_sp']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<div id='' class='nhaplieu' >

<input type="button" value="Thoát" onclick="javascript:window.location='<?php echo $_SESSION['khachsan'];?>'" class="btn" />
  </div>
<div class="paging"><?php echo $paging['paging']?></div>