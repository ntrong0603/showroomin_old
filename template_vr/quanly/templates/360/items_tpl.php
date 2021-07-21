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
	if (hoi==true) document.location = "index.php?com=360&act=delete&listid=" + listid;
});
});
</script>
<h3>Quản lý hình 360</h3>
   <!--    &nbsp;&nbsp;&nbsp;Danh mục 360&nbsp;<?php echo get_main_danhmuc();?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br /><br />-->
       
<script language="javascript">				
	function select_onchange()
	{				
		var a=document.getElementById("id_sp");
		window.location ="index.php?com=360&act=man&id_sp="+a.value;	
		return true;
	}
	

	
</script>

<?php
function get_main_danhmuc()
	{
		$sql="select * from table_360 order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_danhmuc" name="id_sp" onchange="select_onchange()" class="main_font">
			<option>Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_sp"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}


?>

<br />
<table class="blue_table">
	<tr>
		<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
        <th style="width:5%;">Stt</th>		
       <!-- <th style="width:10%;">Danh mục 360</th>-->
        <th style="width:10%;">Tên  </th>
        <th style="width:10%;">Photo  </th>
        <th style="width:10%;">Hiển thị  </th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?php echo @$items[$i]['id']?>" class="chon" /></td>
        <td style="width:5%;"><?php echo @$items[$i]['stt']?></td>
        <!--<td style="width:10%;">
			  <?php
				$sql_danhmuc="select ten from table_360 where id='".$items[$i]['id_sp']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten']
			?>      
        </td>-->
		


        <td style="width:10%;"><a href="index.php?com=360&act=edit&id_sp=<?php echo @$items[$i]['id_sp']?>&id=<?php echo @$items[$i]['id']?>" style="text-decoration:none;"><?php echo @$items[$i]['ten']?></a></td>
        <td style="width:10%;"><a href="index.php?com=360&act=edit&id_sp=<?php echo @$items[$i]['id_sp']?>&id=<?php echo @$items[$i]['id']?>" style="text-decoration:none;"><img src='<?php echo _upload_hinhanh.$items[$i]['photo']?>' width='100' /></a></td>
        	<td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
        <a href="index.php?com=360&act=man&&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_1.png" border="0" /></a>
		<?php }
		else
		{
		?>
         <a href="index.php?com=360&act=man&&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>      
        </td>
        
		<td style="width:5%;"><a href="index.php?com=360&act=edit&id_sp=<?php echo @$items[$i]['id_sp']?>&id=<?php echo @$items[$i]['id']?>&p=<?php echo $_REQUEST['p']?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:5%;"><a href="index.php?com=360&act=delete&id=<?php echo @$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa: <?php echo @$items[$i]['ten']?>')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
    </table>
<a href="index.php?com=360&act=add"><img src="media/images/add.jpg" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?php echo $paging['paging']?></div>