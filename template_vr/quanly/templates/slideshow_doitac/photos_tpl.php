<h3><a href="index.php?com=slideshow_doitac&act=add_photo">Thêm hình ảnh</a></h3>
<font color="#FF0000" size="5"><b> Kích thước bắt buộc: Rộng:240 x Cao:135</b></font>
<table class="blue_table" style="margin-top:10px;">
	<tr>
		<th style="width:5%;">STT</th>      
		<th style="width:40%;">Hình ảnh</th>   
        <th style="width:45%;">Link web</th>  
		<th style="width:5%;">Sửa</th>
        <th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?php echo $items[$i]['stt']?></td>
		
        <td style="width:40%;">
       <img src="<?php echo _upload_slideshow.$items[$i]['photo']?>"  height="100" />
        </td>  
        <td style="width:45%;"><?php echo $items[$i]['link']?></td>       		
		<td style="width:5%;"><a href="index.php?com=slideshow_doitac&act=edit_photo&id=<?php echo $items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
        <td style="width:5%;"><a href="index.php?com=slideshow_doitac&act=delete_photo&id=<?php echo $items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=slideshow_doitac&act=add_photo"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?php echo $paging['paging']?></div>