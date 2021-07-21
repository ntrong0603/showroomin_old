<h3>Hình ảnh</h3>

<table class="blue_table">
	<tr>
		<th>Stt</th>
		<th>Tiêu đề</th>
		<th>Hiển thị</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?php echo @$items[$i]['stt']?></td>
		<td style="width:76%;"><?php echo @$items[$i]['ten']?></td>
			<td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
        <a href="index.php?com=hinhsp&id_com=<?php echo $_GET['id_com'];?>&act=man&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_1.png" border="0" /></a>
		<?php }
		else
		{
		?>
         <a href="index.php?com=hinhsp&id_com=<?php echo $_GET['id_com'];?>&act=man&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>      
        </td>
		<td style="width:6%;"><a href="index.php?com=hinhsp&id_com=<?php echo $_GET['id_com'];?>&act=edit&id=<?php echo @$items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:6%;"><a href="index.php?com=hinhsp&id_com=<?php echo $_GET['id_com'];?>&act=delete&id=<?php echo @$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
</table>
