<h3>Quản lý Loại giấy</h3>
<a href="index.php?com=combo&act=add_photo&id_sp=<?php echo $_GET['id_sp']?>&id_mau=<?php echo $_GET['id_mau']?>"><img src="media/images/add.jpg" border="0"  /></a>
<table class="blue_table">
	<tr>
		<th style="width:6%;">Stt</th>
		<th style="width:6%;">Tên Loại giấy</th>
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?php echo @$items[$i]['stt']?></td>
		<td style="width:6%;"><?php echo @$items[$i]['ten']?></td>
	
	
	   <td style="width:6%;"><a href="index.php?com=combo&act=edit_photo&id=<?php echo @$items[$i]['id']?>&id_sp=<?php echo @$items[$i]['id_sp']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:6%;"><a href="index.php?com=combo&act=delete_photo&id=<?php echo @$items[$i]['id']?>&id_sp=<?php echo @$items[$i]['id_sp']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<div id='' class='nhaplieu' >
<input type="button" value="Thoát" onclick="javascript:window.location='<?php echo $_SESSION['khachsan'];?>'" class="btn" />
  </div>
<div class="paging"><?php echo $paging['paging']?></div>