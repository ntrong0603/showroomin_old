<h3>Quản lý hình ảnh</h3>

<table class="blue_table">
	<tr>
		<th style="width:6%;">Stt</th>
		<th style="width:12%;">Hình ảnh</th>
      	<th style="width:6%;">Hiển thị</th>
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?=@$items[$i]['stt']?></td>
		<td style="width:12%;">
       
       <img src="./../<?=_upload_sanpham.$items[$i]['photo']?>" width="100" height="100" />
        
        </td>
       
        
		<td style="width:6%;">
        	<a href="index.php?com=hinhsp&act=man_photo&hienthi=<?=@$items[$i]['id']?><?=$callback?>">
			<?php if(@$items[$i]['hienthi']){?>
            <img src="media/images/active_1.png" />
            <? }else {?>
            <img src="./../../quanly/media/images/active_0.png" />
			<? }?>
            </a>
        </td>
		<td style="width:6%;"><a href="index.php?com=hinhsp&act=edit_photo&id=<?=@$items[$i]['id']?><?=$callback?>"><img src="./../../quanly/media/images/edit.png" border="0" /></a></td>
		<td style="width:6%;"><a href="index.php?com=hinhsp&act=delete_photo&id=<?=@$items[$i]['id']?><?=$callback?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="./../../quanly/media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=hinhsp&act=add_photo<?=$callback?>"><img src="./../../quanly/media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>