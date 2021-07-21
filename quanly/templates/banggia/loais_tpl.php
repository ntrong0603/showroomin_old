<h3><a href="index.php?com=place&act=add_item">Thêm danh mục</a></h3>
<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>		
        <th style="width:20%;">Danh mục 1</th>
        <th style="width:20%;">Danh mục 2</th>
        <th style="width:40%;">Tên  </th>             
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
        <td style="width:20%;">
        	  <?php
				$sql_danhmuc="select ten from table_place_cat where id='".$items[$i]['id_cat']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten']
			?>    
        </td>
        <td style="width:40%;"><a href="index.php?com=place&act=edit_item&id_list=<?php echo $items[$i]['id_list']?>&id_cat=<?php echo $items[$i]['id_cat']?>&id=<?php echo $items[$i]['id']?>" style="text-decoration:none;"><?php echo $items[$i]['ten']?></a></td>       
                 
		<td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
        <a href="index.php?com=place&act=man_item&hienthi=<?php echo $items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
		<?php }
		else
		{
		?>
         <a href="index.php?com=place&act=man_item&hienthi=<?php echo $items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>      
        </td>
		<td style="width:5%;"><a href="index.php?com=place&act=edit_item&id_list=<?php echo $items[$i]['id_list']?>&id_cat=<?php echo $items[$i]['id_cat']?>&id=<?php echo $items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:5%;"><a href="index.php?com=place&act=delete_item&id=<?php echo $items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
    </table>
<a href="index.php?com=place&act=add_item"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?php echo $paging['paging']?></div>