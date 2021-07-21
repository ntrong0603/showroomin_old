<h3>Quản lý hình ảnh</h3>

<table class="blue_table">
	<tr>
		<th style="width:6%;">Stt</th>
		<th style="width:12%;">Hình ảnh</th>
      	<th style="width:6%;">Hiển thị</th>
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?php echo @$items[$i]['stt']?></td>
		<td style="width:12%;">
       
       <img src="<?php echo _upload_hinhanh.$items[$i]['photo']?>" width="100" height="100" />
        
        </td>
       
        
		<td style="width:6%;"><?php if(@$items[$i]['hienthi']){?><img src="media/images/active_1.png" /><?php }else {?><img src="media/images/active_0.png" /><?php }?></td>
		<td style="width:6%;"><a href="index.php?com=album&act=edit_photo&id=<?php echo @$items[$i]['id']?>&id_sp=<?php echo @$items[$i]['id_sp']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:6%;"><a href="index.php?com=album&act=delete_photo&id=<?php echo @$items[$i]['id']?>&id_sp=<?php echo @$items[$i]['id_sp']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=album&act=add_photo&id_sp=<?php echo $_GET['id_sp']?>"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?php echo $paging['paging']?></div>