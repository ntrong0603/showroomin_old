<h3><a href="index.php?com=place&act=add_cat">Thêm danh mục</a></h3>
<table class="blue_table">
	<tr>
		<th style="width:5%;">Stt</th>	
         <th style="width:20%;">Danh mục</th>	      
        <th style="width:60%;">Tên  </th>
		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?php echo $items[$i]['stt']?></td>  
        <td style="width:20%;">
			  <?php
				$sql_danhmuc="select ten from table_place_list where id='".$items[$i]['id_list']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten']
			?>      
        </td>      	      
		<td style="width:60%;"><a href="index.php?com=place&act=edit_cat&id_list=<?php echo $items[$i]['id_list']?>&id=<?php echo $items[$i]['id']?>&curPage=<?php echo $_REQUEST['curPage']?>" style="text-decoration:none;"><?php echo $items[$i]['ten']?> </a></td>
		<td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <img src="media/images/active_1.png" />
		<?php }
		else
		{
		?>
         <img src="media/images/active_0.png" />
         <?php
		 }?>
        
        </td>
		<td style="width:5%;"><a href="index.php?com=place&act=edit_cat&id_list=<?php echo $items[$i]['id_list']?>&id=<?php echo $items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:5%;"><a href="index.php?com=place&act=delete_cat&id=<?php echo $items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=place&act=add_cat"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?php echo $paging['paging']?></div>