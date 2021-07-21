
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
	if (hoi==true) document.location = "index.php?com=yahoo&act=delete_danhmuc&listid=" + listid;
});
});
</script>
<h3>Quản lý danh mục cấp 1</h3>
<table class="blue_table">
	<tr>
    	<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
		<th style="width:5%;">STT</th>
		<th style="width:70%;">Danh mục </th>	
		<th style="width:5%;">Hiển thị</th>
        <th style="width:5%;">Nổi bật</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?php echo @$items[$i]['id']?>" class="chon" /></td>
		<td style="width:5%;"><?php echo @$items[$i]['stt']?></td>
		<td align="center" style="width:70%;"><?php echo @$items[$i]['ten']?> </td>		
		<td style="width:5%;">
		
        <?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=yahoo&act=man_danhmuc&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<?php }
		else
		{
		?>
         <a href="index.php?com=yahoo&act=man_danhmuc&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>
        
        
        
        </td>
        
        <td style="width:5%;">
		
        <?php 
		if(@$items[$i]['noibat']==1)
		{
		?>
        <a href="index.php?com=yahoo&act=man_danhmuc&noibat=<?php echo @$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<?php }
		else
		{
		?>
         <a href="index.php?com=yahoo&act=man_danhmuc&noibat=<?php echo @$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>
        
        
        
        </td>
		<td style="width:5%;"><a href="index.php?com=yahoo&act=edit_danhmuc&id=<?php echo @$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:5%;"><a href="index.php?com=yahoo&act=delete_danhmuc&id=<?php echo @$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa: <?php echo @$items[$i]['ten']?>')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=yahoo&act=add_danhmuc"><img src="media/images/add.jpg" border="0"  /></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?php echo $paging['paging']?></div>