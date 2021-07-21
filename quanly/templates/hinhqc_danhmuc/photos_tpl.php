<h3>Thêm hình ảnh</h3>

<table class="blue_table">
	<tr>
		<th style="width:5%;">Stt</th>      
		<th style="width:40%;">Hình ảnh</th>
		<th style="width:40%;">Link</th>   
		<th style="width:5%;">Sửa</th>
        <th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?php echo $items[$i]['stt']?></td>
		
        <td style="width:40%;">
       <img src="<?php echo _upload_hinh_cungsp.$items[$i]['photo']?>" width="100" height="100" />
        </td>       		
		<td style="width:5%;"><a href="index.php?com=hinhqc_danhmuc&act=edit_photo&id=<?php echo $items[$i]['id']?>&id_cate=<?php echo $id_cate;?>"><?php echo $items[$i]['link']?></a></td>
		<td style="width:5%;"><a href="index.php?com=hinhqc_danhmuc&act=edit_photo&id=<?php echo $items[$i]['id']?>&id_cate=<?php echo $id_cate;?>"><img src="media/images/edit.png" border="0" /></a></td>
        <td style="width:5%;"><a href="index.php?com=hinhqc_danhmuc&act=delete_photo&id=<?php echo $items[$i]['id']?>&id_cate=<?php echo $id_cate;?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=hinhqc_danhmuc&act=add_photo&id_cate=<?php echo $id_cate?>"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?php echo $paging['paging']?></div>