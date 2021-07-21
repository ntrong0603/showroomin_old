<h3><!--<a href="index.php?com=yahoo&act=add">Thêm danh mục</a></h3><font color="#FF0000"><b>
</b></font><br />-->
<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>
		<th style="width:20%;">Tên</th>	
		<th style="width:20%;">Yahoo</th>	
		<th style="width:20%;">Skype</th>	
		<th style="width:40%;">Điện thoại</th>	
		<th style="width:40%;">Điện thoại2</th>	
		<th style="width:40%;">Email</th>	
		<th style="width:5%;">Sửa</th>
		<!-- <th style="width:5%;">Xóa</th> -->
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>
		<td align="center" style="width:20%;"><?=$items[$i]['ten']?> </td>		
		<td align="center" style="width:20%;"><?=$items[$i]['yahoo']?> </td>		
		<td align="center" style="width:20%;"><?=$items[$i]['skype']?> </td>	
		<td align="center" style="width:40%;"><?=$items[$i]['dienthoai']?> </td>		
		<td align="center" style="width:40%;"><?=$items[$i]['dienthoai2']?> </td>		
		<td align="center" style="width:40%;"><?=$items[$i]['email']?> </td>		
		
		<td style="width:5%;"><a href="index.php?com=yahoo&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
	<!--	<td style="width:5%;"><a href="index.php?com=yahoo&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>-->
	</tr>
	<?php	}?>
</table>

<!--<a href="index.php?com=yahoo&act=add"><img src="media/images/add.jpg" border="0"  /></a>-->
<div class="paging"><?=$paging['paging']?></div>