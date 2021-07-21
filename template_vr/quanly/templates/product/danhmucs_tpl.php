
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
	if (hoi==true) document.location = "index.php?com=product&act=delete_danhmuc&listid=" + listid;
});
});
</script>
<h3>Quản lý danh mục cấp 1</h3>
<table class="blue_table">
	<tr>
    	<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
		<th style="width:5%;">STT</th>
		<th style="width:60%;">Danh mục </th>
		<th style="width:10%;">Quản lý sản phẩm</th>	
		<th style="width:5%;">Hiển thị</th>
        <th style="width:5%;">Nổi bật</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?=@$items[$i]['id']?>" class="chon" /></td>
		<td style="width:5%;"><?=@$items[$i]['stt']?></td>
		<td align="center" style="width:60%;"><?=@$items[$i]['ten']?> </td>	
		<td style="width:10%;"><a href="index.php?com=product&act=man&id_place=<?=@$items[$i]['id_place']?>&id_danhmuc=<?=@$items[$i]['id']?>"><img src="./../../quanly/media/images/folder.png"  border="0" width="50px" /></a></td>	
		<td style="width:5%;">
		
        <?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=product&act=man_danhmuc&id_place=<?=@$items[$i]['id_place']?>&hienthi=<?=@$items[$i]['id']?>"><img src="./../../quanly/media/images/active_1.png"  border="0"/></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=product&act=man_danhmuc&id_place=<?=@$items[$i]['id_place']?>&hienthi=<?=@$items[$i]['id']?>"><img src="./../../quanly/media/images/active_0.png" border="0" /></a>
         <?php
		 }?>
        
        
        
        </td>
        
        <td style="width:5%;">
		
        <?php 
		if(@$items[$i]['noibat']==1)
		{
		?>
        <a href="index.php?com=product&act=man_danhmuc&id_place=<?=@$items[$i]['id_place']?>&noibat=<?=@$items[$i]['id']?>"><img src="./../../quanly/media/images/active_1.png"  border="0"/></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=product&act=man_danhmuc&id_place=<?=@$items[$i]['id_place']?>&noibat=<?=@$items[$i]['id']?>"><img src="./../../quanly/media/images/active_0.png" border="0" /></a>
         <?php
		 }?>
        
        
        
        </td>
		<td style="width:5%;"><a href="index.php?com=product&act=edit_danhmuc&id_place=<?=@$items[$i]['id_place']?>&id=<?=@$items[$i]['id']?>"><img src="./../../quanly/media/images/edit.png" border="0" /></a></td>
		<td style="width:5%;"><a href="index.php?com=product&act=delete_danhmuc&id_place=<?=@$items[$i]['id_place']?>&id=<?=@$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa: <?=@$items[$i]['ten']?>')) return false;"><img src="./../../quanly/media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=product&act=add_danhmuc&id_place=<?php echo $_GET['id_place'] ?>"><img src="./../../quanly/media/images/add.jpg" border="0"  /></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="./../../quanly/media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>