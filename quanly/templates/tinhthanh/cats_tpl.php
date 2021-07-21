
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
	if (hoi==true) document.location = "index.php?com=tinhthanh&act=delete_cat&listid=" + listid;
});
});
</script>
 <h3>Quản lý danh mục cấp 3</h3>
 &nbsp;&nbsp;&nbsp;Danh mục cấp 1&nbsp;<?php echo get_main_danhmuc();?>&nbsp;&nbsp;&nbsp;Danh mục cấp 2&nbsp;<?php echo get_main_list();?><br />
<script language="javascript">				
	function select_onchange()
	{				
		var a=document.getElementById("id_danhmuc");
		window.location ="index.php?com=tinhthanh&act=man_cat&id_danhmuc="+a.value;	
		return true;
	}
	function select_onchange1()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		window.location ="index.php?com=tinhthanh&act=man_cat&id_danhmuc="+a.value+"&id_list="+b.value;	
		return true;
	}

	
</script>

<?php
function get_main_danhmuc()
	{
		$sql="select * from table_tinhthanh_danhmuc order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_danhmuc" name="id_danhmuc" onchange="select_onchange()" class="main_font">
			<option>Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_danhmuc"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}

function get_main_list()
	{
		$sql="select * from table_tinhthanh_list where id_danhmuc=".$_REQUEST['id_danhmuc']."  order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange1()" class="main_font">
			<option>Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_list"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
?><br />
<table class="blue_table">
	<tr>
    	<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
		<th style="width:5%;">STT</th>
        <th style="width:20%;">Danh mục cấp 1</th>
		<th style="width:20%;">Danh mục cấp 2</th>
        <th style="width:40%;">Tên  </th>
		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
    <tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?php echo @$items[$i]['id']?>" class="chon" /></td>
		<td style="width:5%;"><?php echo @$items[$i]['stt']?></td>
        
		 <td align="center" style="width:20%;">       
			<?php
            $sql_danhmuc="select ten from table_tinhthanh_danhmuc where id='".$items[$i]['id_danhmuc']."'";
            $result=mysql_query($sql_danhmuc);
            $item_danhmuc =mysql_fetch_array($result);
            echo @$item_danhmuc['ten']
            ?>         
        </td>	
        
        <td align="center" style="width:20%;">       
			<?php
            $sql_danhmuc="select ten from table_tinhthanh_list where id='".$items[$i]['id_list']."'";
            $result=mysql_query($sql_danhmuc);
            $item_danhmuc =mysql_fetch_array($result);
            echo @$item_danhmuc['ten']
            ?>         
        </td>		      
        
        <td align="center" style="width:40%;"><?php echo @$items[$i]['ten']?> </td>		
		<td style="width:5%;">
		
        <?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=tinhthanh&act=man_cat&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<?php }
		else
		{
		?>
         <a href="index.php?com=tinhthanh&act=man_cat&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>
        
        
        
        </td>
		<td style="width:5%;"><a href="index.php?com=tinhthanh&act=edit_cat&id_danhmuc=<?php echo @$items[$i]['id_danhmuc']?>&id_list=<?php echo @$items[$i]['id_list']?>&id=<?php echo @$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:5%;"><a href="index.php?com=tinhthanh&act=delete_cat&id=<?php echo @$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa: <?php echo @$items[$i]['ten']?>')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>

<a href="index.php?com=tinhthanh&act=add_cat"><img src="media/images/add.jpg" border="0"  /></a>
</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>



<div class="paging"><?php echo $paging['paging']?></div>