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
	if (hoi==true) document.location = "index.php?com=haicot&act=delete&listid=" + listid;
});
});
</script>
<h3>Quản lý quảng cáo</h3>
	


<a href="index.php?com=haicot&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<br />
<table class="blue_table">
	<tr>
		<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
        <th style="width:5%;">Stt</th>		
        <th style="width:5%;">Tên  </th>
        <th style="width:5%;">Hình  </th>
		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?php echo @$items[$i]['id']?>" class="chon" /></td>
        <td style="width:5%;"><input type='text' class='stt' id='<?="stt".$items[$i]['id']?>' name='' value='<?=$items[$i]['stt']?>' size=2 /></td>
     


        <td style="width:5%;"><a href="index.php?com=haicot&act=edit&id_danhmuc=<?php echo @$items[$i]['id_danhmuc']?>&id_list=<?php echo @$items[$i]['id_list']?>&id_cat=<?php echo @$items[$i]['id_cat']?>&id_item=<?php echo @$items[$i]['id_item']?>&id=<?php echo @$items[$i]['id']?>" style="text-decoration:none;"><?php echo @$items[$i]['ten']?></a></td>
        <td align="center" style="width:5%;"><img src="<?php echo _upload_sanpham.$items[$i]['thumb'] ?>" style="max-width:80%"/></td>
  
        
          
		<td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
        <a href="index.php?com=haicot&act=man&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_1.png" border="0" /></a>
		<?php }
		else
		{
		?>
         <a href="index.php?com=haicot&act=man&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>      
        </td>
        
		<td style="width:5%;"><a href="index.php?com=haicot&act=edit&id_danhmuc=<?php echo @$items[$i]['id_danhmuc']?>&id_list=<?php echo @$items[$i]['id_list']?>&id_cat=<?php echo @$items[$i]['id_cat']?>&id_item=<?php echo @$items[$i]['id_item']?>&id=<?php echo @$items[$i]['id']?><?php if( isset( $_GET['p'] ) ){echo "&p=".$_GET['p'];}?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:5%;"><a href="index.php?com=haicot&act=delete&id=<?php echo @$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa: <?php echo @$items[$i]['ten']?>')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
    </table>
<a href="index.php?com=haicot&act=add"><img src="media/images/add.jpg" border="0"  /></a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?php echo $paging['paging']?></div>