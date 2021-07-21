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
	if (hoi==true) document.location = "index.php?com=photo&act=delete_photo&listid=" + listid;
});
});
</script>

<h3><a href="index.php?com=photo&act=add_photo">THÊM MỚI</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
        <th style="width:5%;">ID</th>  
<th style="width:30%;">Hình ảnh</th>		
			<th style="width:30%;">Tên</th>
		
<th style="width:5%;">Sửa</th>		
		<th style="width:5%;">Xóa</th>
		
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?=$items[$i]['id']?>" class="chon" /></td>
        <td style="width:5%;"><?=$items[$i]['id']?></td>
		 <td style="width:30%;">
       <img src="<?=_upload_hinhanh.$items[$i]['photo']?>" height="100" />
        </td> 
		<td style="width:30%;"><?=$items[$i]['ten']?></td>
       
		<td style="width:5%;"><a href="index.php?com=photo&act=edit_photo&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
       			<td style="width:5%;"><a href="index.php?com=photo&act=delete_photo&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>		

		</tr>
	<?php	}?>
</table>
<a href="index.php?com=photo&act=add_photo"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>