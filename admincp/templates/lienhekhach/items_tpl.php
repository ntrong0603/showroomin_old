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
	if (hoi==true) document.location = "index.php?com=lienhekhach&act=delete&listid=" + listid;
});
});
</script>
<h3>Quản lý Thông tin liên hệ khách hàng</h3>
<table class="blue_table">

	<tr>
    	<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
    	<th style="width:5%" align="center">ID</th>
        <th style="width:20%;">Họ tên</th>  
        <th style="width:15%;">Địa chỉ</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
    	<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?php echo @$items[$i]['id']?>" class="chon" /></td>
		<td style="width:5%;" align="center"><?php if($items[$i]['xem']==0)  echo '<img src="media/images/New_icons_101.gif"/>'; ?><?php echo @$items[$i]['id']?></td>
          
		<td style="width:20%;" align="center"><a href="index.php?com=lienhekhach&act=edit&id=<?php echo @$items[$i]['id']?>" style="text-decoration:none;"><?php echo @$items[$i]['ten']?></a></td>
           
		<td style="width:15%;" align="center"><?php echo @$items[$i]['diachi']?></td>
		        
		        
		<td style="width:5%;" align="center"><a href="index.php?com=lienhekhach&act=edit&id=<?php echo @$items[$i]['id']?>"><img src="media/images/edit.png"  blienhekhach="0"/></a></td>
		<td style="width:5%;"><a href="index.php?com=lienhekhach&act=delete&id=<?php echo @$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" blienhekhach="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="#" id="xoahet"><img src="media/images/delete.jpg" blienhekhach="0"  /></a>

<div class="paging"><?php echo $paging['paging']?></div>