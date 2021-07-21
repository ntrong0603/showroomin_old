<script>
$(document).ready(function() {
$("#chonhet").click(function(){
	var status=this.checked;
	$("input[name='chon']").each(function(){this.checked=status;})
});

$("#xoahet").click(function(){
	var listid="";
	$("input[name='chon']").each(function(){
		if (this.checked) listid = listid+","+this.value;
    	})
	listid=listid.substr(1);	 //alert(listid);
	if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
	hoi= confirm("Bạn có chắc chắn muốn xóa?");
	if (hoi==true) document.location = "index.php?com=nhanxetkh&act=delete&listid=" + listid;
});
});
</script>
<h3>Quản lý sản phẩm</h3>

<a href="index.php?com=nhanxetkh&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<br />
<table class="blue_table">
	<tr>
		<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
        <th style="width:5%;">Stt</th>		
        <th style="width:10%;">Tên khách hàng</th>
        <th style="width:10%;">Tên công ty</th>
		<th style="width:8%;">Hình</th>
		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?=@$items[$i]['id']?>" class="chon" /></td>
        <td style="width:5%;"><?=@$items[$i]['stt']?></td>

        <td style="width:10%;"><a href="index.php?com=nhanxetkh&act=edit&id=<?=@$items[$i]['id']?>" style="text-decoration:none;"><?=@$items[$i]['tenkhach']?></a></td>

		<td style="width:10%;"><a href="index.php?com=nhanxetkh&act=edit&id=<?=@$items[$i]['id']?>" style="text-decoration:none;"><?=@$items[$i]['tencongty']?></a></td>

        <td style="width:10%;"><img src='<?php echo _upload_tintuc.@$items[$i]['photo'];?>' height='100' alt='' title='' /></td>

        <td style="width:5%;">
        	<a href="index.php?com=nhanxetkh&act=man&hienthi=<?=@$items[$i]['id']?>"><img src="media/images/active_<?=(@$items[$i]['hienthi'] > 0)?1:0?>.png" border="0" /></a> 
        </td>
        
		<td style="width:5%;"><a href="index.php?com=nhanxetkh&act=edit&id=<?=@$items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:5%;"><a href="index.php?com=nhanxetkh&act=delete&id=<?=@$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa: <?=@$items[$i]['ten']?>')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
    </table>
<a href="index.php?com=nhanxetkh&act=add"><img src="media/images/add.jpg" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>