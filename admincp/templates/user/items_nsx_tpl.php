<h3>NSX</h3>
<h3><a href="index.php?com=user&act=add_nsx">Thêm mới</a></h3>
<table class="blue_table">
	<tr>
		<th>Stt</th>
		<th>User</th>
		<th>Tên NSX</th>
		<th>Hiển thị</th>
		<th>Sửa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?php echo $i+1?></td>
		<td style="width:38%;"><?php echo @$items[$i]['username']?></td>
		<td style="width:38%;"><?php echo @$items[$i]['ten']?></td>
		<td style="width:6%;"><?php if(@$items[$i]['hienthi']){?><img src="media/images/active_1.png" /><?php }?></td>
		<td style="width:6%;"><a href="index.php?com=user&act=edit_nsx&id=<?php echo @$items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>
		</tr>
	<?php	}?>
</table>
<div class="paging"><?php echo $paging['paging']?></div>