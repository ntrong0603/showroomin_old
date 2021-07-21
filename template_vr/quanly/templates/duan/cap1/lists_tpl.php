<h3><a href="index.php?com=duan&act=add_list0">Thêm danh mục</a></h3><font color="#FF0000"><b>
Chú ý không thay đổi số thứ tự danh mục</b></font><br />
<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>
		<th style="width:25%;">Tên danh mục Việt</th>	
		<!-- <th style="width:25%;">Tên danh mục Anh</th>	 -->
		<th style="width:25%;">Hinh anh quang cao cho danh muc</th>	
		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?php echo $items[$i]['stt']?></td>
		<td align="center" style="width:20%;"><?php echo $items[$i]['ten_vi']?> </td>		
		<!-- <td align="center" style="width:20%;"><?php echo $items[$i]['ten_en']?> </td>		 -->
		<?php

			$d->reset();
			$sql_g="select id from table_hinhdanhmucqc where hienthi=1 and id_cate={$items[$i]['id']}";
			$d->query($sql_g);
			$result_g= $d->result_array();
		?>
		<td><a href="index.php?com=hinhqc_danhmuc&act=man_photo&id_cate=<?php echo $items[$i]['id']?>" style="text-decoration:none;"><img src="media/images/Photos-icon.png" alt="gallery" width="70" ><span><br /><?php echo count($result_g);?> images</span></a></td>
		<td style="width:5%;">
		
        <?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
			<a href="index.php?com=duan&act=man_list0&hienthi=<?php echo $items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<?php
		}
		else
		{
		?>
			<a href="index.php?com=duan&act=man_list0&hienthi=<?php echo $items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>
        
        
        
        </td>
		<td style="width:5%;">
			<a href="index.php?com=duan&act=edit_list0&id=<?php echo $items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a>
		</td>
		
		<td style="width:5%;">
			<a href="index.php?com=duan&act=delete_list0&id=<?php echo $items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;">
				<img src="media/images/delete.png" border="0" />
			</a>
		</td>
	</tr>
	<?php	}?>
</table>

<a href="index.php?com=duan&act=add_list0"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?php echo $paging['paging']?></div>