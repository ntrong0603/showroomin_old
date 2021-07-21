<h3>Thêm hình ảnh</h3>

<table class="blue_table">
	<tr>
		<th style="width:5%;">Stt</th>      
		<th style="width:40%;">Hình ảnhsdfsdf</th>   
		<th style="width:5%;">Sửa</th>
        <th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>
		
        <td style="width:40%;">
       <img src="<?=_upload_hinh_cungsp.$items[$i]['photo']?>" width="100" height="100" />
        </td>       		
		<td style="width:5%;"><a href="index.php?com=hinh_cungsp&act=edit_photo&id=<?=$items[$i]['id']?>&id_sp=<?=$id_sp;?>&id_mau=<?php echo $_GET['id_mau'];?>"><img src="media/images/edit.png" border="0" /></a></td>
        <td style="width:5%;"><a href="index.php?com=hinh_cungsp&act=delete_photo&id=<?=$items[$i]['id']?>&id_sp=<?=$id_sp;?>&id_mau=<?php echo $_GET['id_mau'];?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?
</table>
<a href="index.php?com=hinh_cungsp&act=add_photo&id_sp=<?=$id_sp?>"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>