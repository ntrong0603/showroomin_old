<h3><a href="index.php?com=video&act=add&loai=<?php echo $_GET['loai'] ?>">Thêm video</a></h3>

<table class="blue_table">
	<tr>
		<th>Stt</th>
		<th>Tên video</th>
		<th>Hiển thị</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?=@$items[$i]['stt']?></td>
		<td align="center" style="width:40%;"><?=@$items[$i]['ten']?></td>
        
	  <td style="width:6%;">
		<?php 
		if(@$items[$i]['hienthi'])
		{
		?>
        <img src="media/images/active_1.png" />
		<? 
		}
		else
		{
		?>
        
         <img src="media/images/active_0.png" />
        <?php
		}?>
		
        </td> 
		<td style="width:6%;"><a href="index.php?com=video&act=edit&loai=<?php echo $_GET['loai'] ?>&id=<?=@$items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:6%;"><a href="index.php?com=video&act=delete&loai=<?php echo $_GET['loai'] ?>&id=<?=@$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
</table>
<div class="paging"><?=$paging['paging']?></div>