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
	if (hoi==true) document.location = "index.php?com=krpano&act=delete_skinhotspot&listid=" + listid;
});
});
</script>
<h3>Quản lý skin hotspot</h3>

<table class="blue_table">
	
	<tr>
		<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
		<th style="width:12%;">Name</th>
        <th style="width:8%;">Hình</th>
        <th style="width:8%;">scale</th>
        <th style="width:8%;">edge</th>
		<th style="width:6%;">Sửa</th>
		<th style="width:6%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($skinitems); $i<$count; $i++){?>

	<tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?php echo @$skinitems[$i]['id']?>" class="chon" /></td>
		<td style="width:12%;">
         <?php echo @$skinitems[$i]['name']?>
        
        </td>
       
		<td align="center" style="width:8%;">
			<?php echo @$skinitems[$i]['url']?>
		</td>

		<td align="center" style="width:8%;">
			<?php echo @$skinitems[$i]['scale']?>
		</td>
		
		<td align="center" style="width:8%;">
			<?php echo @$skinitems[$i]['edge']?>
		</td>

		<td style="width:6%;">
			<a href="index.php?com=krpano&act=edit_skinhotspot&id=<?php echo @$skinitems[$i]['id']?>">
				<img src="media/images/edit.png" border="0" />
			</a>
		</td>
		<td style="width:6%;">
			<a href="index.php?com=krpano&act=delete_skinhotspot&id=<?php echo @$skinitems[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;">
				<img src="media/images/delete.png" border="0" />
			</a>
		</td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=krpano&act=add_skinhotspot"><img src="media/images/add.jpg" border="0"  /></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>
<div class="paging"><?php echo $paging['paging']?></div>