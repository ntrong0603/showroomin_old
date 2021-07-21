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
	if (hoi==true) document.location = "index.php?com=upload&act=delete_photo&id_sp=<?php echo $_GET['id_sp'];?>&listid=" + listid;
});
});
</script>
<h3>Quản lý Files</h3>
<a href="index.php?com=upload&act=add_photo&id_sp=<?php echo $_GET['id_sp']?>&id_mau=<?php echo $_GET['id_mau']?>"><img src="media/images/add.jpg" border="0"  /></a>

<table class="blue_table">
	<tr>
	<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
	
		<th style="width:6%;">Stt</th>
		<th style="width:12%;">Tên</th>
		
		<th style="width:12%;">Điện thoại</th>
		<th style="width:12%;">Ngày upload</th>
		<th style="width:12%;">Link files</th>
		<th style="width:6%;">Sửa</th>
		<?php if( $_SESSION['login']['role']==3 ){?><th style="width:6%;">Xóa</th><?php } ?>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
	<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?php echo @$items[$i]['id']?>" class="chon" /></td>
		
		<td style="width:6%;"><?php echo @$items[$i]['stt']?></td>
		<td style="width:12%;"><?php if($items[$i]['vitri']==1)  echo '<img src="media/images/New_icons_101.gif"/>'; ?><?php echo @$items[$i]['ten']?></td>
			<td style="width:6%;"><?php echo @$items[$i]['dienthoai']?></td>	
			<td style="width:6%;"><?php echo date('H:i:s d/m/Y',@$items[$i]['ngaytao']);?></td>
		<td style="width:12%;">
       
      http://<?php echo $_SERVER['SERVER_NAME'];?>/upload/files/<?php echo $items[$i]['photo']?>
        
        </td>

	   <td style="width:6%;"><a href="index.php?com=upload&act=edit_photo&id=<?php echo @$items[$i]['id']?>&id_sp=<?php echo @$items[$i]['id_sp']?>"><img src="media/images/edit.png" border="0" /></a></td>
	<?php if( $_SESSION['login']['role']==3 ){ ?>	<td style="width:6%;"><a href="index.php?com=upload&act=delete_photo&id=<?php echo @$items[$i]['id']?>&id_sp=<?php echo @$items[$i]['id_sp']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	<?php } ?>
	</tr>
	<?php	}?>
</table>
<?php if( $_SESSION['login']['role']==3 ){?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a><?php } ?>
<div class="paging"><?php echo $paging['paging']?></div>