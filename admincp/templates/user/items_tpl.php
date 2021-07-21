<h3>User</h3>

<table class="blue_table">
	<tr>
		<th>Stt</th>
		<th>Tên tài khoản</th>
		<th>Email</th>
		<th>Hiển thị</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?php echo $i+1?></td>
		<td style="width:38%;"><?php echo @$items[$i]['username']?></td>
		<td style="width:38%;"><?php echo @$items[$i]['email']?></td>
		<td style="width:6%;"><?php if(@$items[$i]['hienthi']){?><img src="media/images/active_1.png" /><?php }?></td>
		<td style="width:6%;"><a href="index.php?com=user&act=edit&id=<?php echo @$items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:6%;"><a href="index.php?com=user&act=delete&id=<?php echo @$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
</table>
<div class="paging"><?php echo $paging['paging']?></div>