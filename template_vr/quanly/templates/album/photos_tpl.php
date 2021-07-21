<h3>Quản lý hình ảnh</h3>

<table class="blue_table">
	<tr>
		<th style="width:6%;">Stt</th>
        <th style="width:12%;">Tên</th>
		<th style="width:12%;">Hình ảnh</th>
      	<th style="width:6%;">Hiển thị</th>
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?=@$items[$i]['stt']?></td>
        <td style="width:12%;"><?=@$items[$i]['ten']?></td>
		<td style="width:12%;">
       
       <img src="<?=_upload_album.$items[$i]['photo']?>"  height="63" />
        
        </td>
       
        
		<td style="width:6%;"><?php if(@$items[$i]['hienthi']){?><img src="media/images/active_1.png" /><? }else {?><img src="media/images/active_0.png" /><? }?></td>
		<td style="width:6%;"><a href="index.php?com=album&act=edit_photo&id=<?=@$items[$i]['id'].$callback?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:6%;"><a href="index.php?com=album&act=delete_photo&id=<?=@$items[$i]['id'].$callback?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=album&act=add_photo<?=$callback?>"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>