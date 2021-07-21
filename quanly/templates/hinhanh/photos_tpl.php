<h3><a href="index.php?com=hinhanh&act=add_photo">Thêm Album</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:6%;">Stt</th>
		<th style="width:12%;">Tên album</th>
      	<th style="width:6%;">Hiển thị</th>
        <th style="width:8%;">Các hình ảnh</th>
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>

	<tr>
		<td style="width:6%;"><?php echo @$items[$i]['stt']?></td>
		<td style="width:12%;">
         <?php echo @$items[$i]['ten']?>
        
        </td>
       
        
		<td style="width:6%;"><?php if(@$items[$i]['hienthi']){?><img src="media/images/active_1.png" /><?php }else {?><img src="media/images/active_0.png" /><?php }?></td>
          <td align="center" style="width:8%;"><a href="index.php?com=hinhsp&act=man_photo&id_sp=<?php echo @$items[$i]['id']?>">Hình ảnh</a></td>
		<td style="width:6%;"><a href="index.php?com=hinhanh&act=edit_photo&id=<?php echo @$items[$i]['id']?>&idc=<?php echo @$items[$i]['id_photo']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:6%;"><a href="index.php?com=hinhanh&act=delete_photo&id=<?php echo @$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=hinhanh&act=add_photo&idc=<?php echo $_REQUEST['idc'];?>"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?php echo $paging['paging']?></div>