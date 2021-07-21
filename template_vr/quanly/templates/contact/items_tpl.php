<h3>Quản lý sản phẩm liên hệ</h3>
<table class="blue_table">
	<tr>
		<th width="5%" style="width:6%;">Id</th>
		<th style="width:20%;">Tên</th>
	    <th style="width:20%;">Điện thoại</th>
        <th style="width:15%;">Tên SP</th>
        <th style="width:15%;">Ngày gửi</th>
      <th width="6%" style="width:6%;">Hiển thị</th>
		<th width="6%" style="width:6%;">Sửa</th>
		<th width="6%" style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;" align="center"><a href="index.php?com=contact&act=edit&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['id']?></a></td>
		<td align="center" style="width:20%;"><?=$items[$i]['ten']?></td>
		<td align="center" style="width:20%;"><?=$items[$i]['dienthoai']?></td>
		<td align="center" style="width:15%;"><a href="http://mocnemquocviet.com/?com=product&id=<?=$items[$i]['id_sanpham']?>" style="text-decoration:none;">
		
		<?php
		$sql_danhmuc="select ten from table_product where id='".$items[$i]['id_sanpham']."'";
		$result=mysql_query($sql_danhmuc);
	 	$item_danhmuc =mysql_fetch_array($result);
	 	echo @$item_danhmuc['ten']
	?> 
        
        
        </a></td>
		<td align="center" style="width:15%;"><?=make_date($items[$i]['ngaytao'])?></td>
		<td style="width:6%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=news&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=news&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>        </td>
		<td style="width:6%;" align="center"><a href="index.php?com=contact&act=edit&id=<?=$items[$i]['id']?>" style="text-decoration:none;">Xem</a></td>
		<td style="width:6%;"><a href="index.php?com=contact&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>

<div class="paging"><?=$paging['paging']?></div>