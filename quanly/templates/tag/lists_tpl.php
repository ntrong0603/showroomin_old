<h3><a href="index.php?com=tag&act=add">Thêm danh mục</a></h3><font color="#FF0000"><b>
Chú ý không thay đổi số thứ tự danh mục</b></font><br />
<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>
		<th style="width:40%;">Tên loại</th>	
		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?php echo $items[$i]['stt']?></td>
		<td align="center" style="width:40%;"><?php echo $items[$i]['ten']?> </td>		
		<td style="width:5%;">
		
        <?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
			<a href="index.php?com=tag&act=man&hienthi=<?php echo $items[$i]['id']?>">
				<img src="media/images/active_1.png"  border="0"/>
			</a>
		<?php
		}
		else
		{
		?>
			<a href="index.php?com=tag&act=man&hienthi=<?php echo $items[$i]['id']?>">
				<img src="media/images/active_0.png" border="0" />
			</a>
         <?php
		 }
		 ?>
        
        
        
        </td>
		<td style="width:5%;">
			<a href="index.php?com=tag&act=edit&id=<?php echo $items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a>
		</td>
		
		<td style="width:5%;">
			<a href="index.php?com=tag&act=delete<?php if($_REQUEST['id_cat']!='') echo "&id_cat=".$_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>&id=<?php echo $items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;">
				<img src="media/images/delete.png" border="0" />
			</a>
		</td>
		
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=tag&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?php echo $paging['paging']?></div>