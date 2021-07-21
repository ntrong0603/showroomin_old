<h3><a href="index.php?com=video&act=add">Thêm video</a></h3>

<table class="blue_table">
	<tr>
		<th>Stt</th>
		<th>Tên video</th>
        <th >Ảnh đại diện</th>
		<th>Hiển thị</th>
        <th>Nổi bật</th>
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?php echo @$items[$i]['stt']?></td>
		<td align="center" style="width:40%;"><?php echo @$items[$i]['ten']?></td>
        <td style="width:30%;" align="center"><img src="<?php echo _upload_video.$items[$i]['photo']?>" alt="NO PHOTO"   height="100"/></td>
        
	  <td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
        <a href="index.php?com=video&act=man_item&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_1.png" border="0" /></a>
		<?php }
		else
		{
		?>
         <a href="index.php?com=video&act=man_item&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>      
        </td>
        
        
        <td style="width:5%;">
		<?php 
		if(@$items[$i]['noibat']==1)
		{
		?>
        
        <a href="index.php?com=video&act=man_item&noibat=<?php echo @$items[$i]['id']?>"><img src="media/images/active_1.png" border="0" /></a>
		<?php }
		else
		{
		?>
         <a href="index.php?com=video&act=man_item&noibat=<?php echo @$items[$i]['id']?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>      
        </td>
		<td style="width:6%;"><a href="index.php?com=video&act=edit&id=<?php echo @$items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:6%;"><a href="index.php?com=video&act=delete&id=<?php echo @$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
</table>
<div class="paging"><?php echo $paging['paging']?></div>