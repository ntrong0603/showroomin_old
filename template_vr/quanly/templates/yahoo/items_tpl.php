<h3>Hỗ trợ trục tuyến</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:6%;">Stt</th>
		<th style="width:15%;">Tên yahoo  </th>
		<th style="width:15%;">Yahoo </th>
        <th style="width:15%;">Skype </th>
        <th style="width:15%;">Điện thoại </th> 
		<th style="width:6%;">Hiển thị</th>
		<th style="width:6%;">Sửa</th>
        <th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?=@$items[$i]['stt']?></td>
		<td style="width:15%;"><?=@$items[$i]['ten']?></td>
		<td style="width:15%;"><?=@$items[$i]['yahoo']?></td>
        <td style="width:15%;"><?=@$items[$i]['skype']?></td>
        <td style="width:15%;"><?=@$items[$i]['dienthoai']?></td>
		<td style="width:6%;"><?php 
		if(@$items[$i]['hienthi'])
		{
		?>
        <img src="media/images/active_1.png" />
		<? 
		}
		else
		{
		?>
        <img src="media/images/active_0.png" />
        <?
		}?>        </td>
		<td style="width:6%;"><a href="index.php?com=yahoo&act=edit&id=<?=@$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
        
        <td style="width:6%;"><a href="index.php?com=yahoo&act=delete&id=<?=@$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
		
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=yahoo&act=add"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>