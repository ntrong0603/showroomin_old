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
	if (hoi==true) document.location = "index.php?com=baiviet&act=delete&listid=" + listid;
});
});
</script>
<h3>Quản lý bài viết</h3>


<br />
<table class="blue_table">
	<tr>
		<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
  	
        
        <th style="width:10%;">Tên</th>
        <th style="width:10%;">loại tin</th>
      
        <th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?php echo @$items[$i]['id']?>" class="chon" /></td>
        
        


        <td style="width:10%;"><a href="index.php?com=baiviet&act=edit&id=<?php echo @$items[$i]['id']?>" style="text-decoration:none;"><?php echo @$items[$i]['ten']?></a></td>
        <td style="width:10%;"><a href="index.php?com=baiviet&act=edit&id=<?php echo @$items[$i]['id']?>" style="text-decoration:none;"><?php echo @$items[$i]['loaitin']?></a></td>
       
      
       
        
		<td style="width:5%;"><a href="index.php?com=baiviet&act=edit&id=<?php echo @$items[$i]['id']?>&p=<?php echo $_REQUEST['p']?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:5%;"><a href="index.php?com=baiviet&act=delete&id=<?php echo @$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa: <?php echo @$items[$i]['ten']?>')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
    </table>
<a href="index.php?com=baiviet&act=add"><img src="media/images/add.jpg" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?php echo $paging['paging']?></div>