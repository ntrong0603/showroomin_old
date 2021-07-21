<h3><a href="index.php?com=lienketweb&act=add">Thêm liên kết</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:15%;">Số thứ tự</th>      
		<th style="width:20%;">Tên</th>
        <th style="width:30%;">Link liên kết</th>
        <th style="width:15%;">Sửa</th>
        <th style="width:15%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td align="center" style="width:15%;"><?=$i+1?></td>
		
        <td align="center" style="width:50%;">
		<?=$items[$i]['ten_vi']?>
        
        </td>  
		<td align="center" style="width:15%;"><?=$items[$i]['link']?></td>
		<td align="center" style="width:15%;"><a href="index.php?com=lienketweb&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
        <td align="center" style="width:15%;"><a href="index.php?com=lienketweb&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
  </tr>
	<?php	}?>
</table>
<a href="index.php?com=lienketweb&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>