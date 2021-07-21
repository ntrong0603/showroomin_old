<script>
function select_onchange()
	{	
		var c=document.getElementById("id_item");
		window.location ="index.php?com=news&act=man&id_item="+c.value;	
		return true;
	}

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
	if (hoi==true) document.location = "index.php?com=news&act=delete&listid=" + listid;
});
});
</script>
<?php
	function get_main_item()
	{
		$sql_huyen="select * from table_news_item where hienthi=1 order by stt,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_item" name="id_item" onchange="select_onchange()" class="main_font">
			<option>Chọn danh mục</option>	
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_item"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>
<h3>Quản lý khai báo google analytics</h3>
<br />
<table class="blue_table">

	<tr>
		<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
        <th width="5%" style="width:6%;">Stt</th>
        <th style="width:30%;">Tên miền</th>
       
	  	<th width="9%" style="width:6%;">Hiển thị</th>
		<th width="9%" style="width:6%;">Sửa</th>
		<th width="9%" style="width:6%;">Xóa</th>
	</tr>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?php echo @$items[$i]['id']?>" class="chon" /></td>
        <td style="width:6%;" align="center"><?php echo @$items[$i]['stt']?></td>

        
		<td style="width:30%;" align="center"><a href="index.php?com=news&act=edit&id_item=<?php echo @$items[$i]['id_item']?>&id=<?php echo @$items[$i]['id']?>" style="text-decoration:none;"><?php echo @$items[$i]['ten']?></a></td>
        
      
        
		<td style="width:6%;">
		<?php if(@$items[$i]['hienthi']==1) { ?>
        <a href="index.php?com=news&act=man&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
        <?php } else { ?>
        <a href="index.php?com=news&act=man&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
        <?php } ?>        
        </td>
        
		<td style="width:6%;" align="center"><a href="index.php?com=news&act=edit&id_item=<?php echo @$items[$i]['id_item']?>&id=<?php echo @$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
        
		<td style="width:6%;"><a href="index.php?com=news&act=delete&id=<?php echo @$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
        
	</tr>
	<?php	}?>
</table>

<a href="index.php?com=news&act=add"><img src="media/images/add.jpg" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?php echo $paging['paging']?></div>