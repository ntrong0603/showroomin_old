<h3><a href="index.php?com=brand&act=add">Thêm tin danh muc</a>
        &nbsp;&nbsp;&nbsp;Danh mục cấp 2&nbsp;<?php echo get_main_category();?></h3>
<script language="javascript">	
	function select_onchange()
	{
		var b=document.getElementById("id_list");
		window.location ="index.php?com=brand&act=man_cat&id_list="+b.value;	
		return true;
	}
	
	$(document).ready(function(){
		$('#hien_thi').click(function(){
		window.location.href = 'window.location.assign("http://127.0.0.1/noi_that_dung_minh/admin/index.php?com=brand&act=man_cat';
		});
	});

</script>
<?php
function get_main_category()
	{
		$sql="select * from table_brand_list order by stt asc,id desc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange()" class="main_font">
			<option>Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_list"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>

<form action="#" method="post" name="frmLIST_brand" id="frmLIST_brand">

<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>
		 <th style="width:15%;">Cấp 1</th>
		 <th style="width:15%;">Cấp 2</th>
		<th style="width:40%;">Tên danh mục Việt</th>	
		<th style="width:40%;">Tên danh mục Anh</th>
		<th style="width:15%;">Hình đại diện</th>		
		<th style="width:5%;">Hiển thị</th>

		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?php echo $items[$i]['stt']?></td>
		
		<td align="center" style="width:15%;">
			<?php
			$sql_danhmuc1="select ten_vi from table_brand_list0 where id='".$items[$i]['id_list_l']."'";
			$result=mysql_query($sql_danhmuc1);
			$item_danhmuc1 =mysql_fetch_array($result);
			echo @$item_danhmuc1['ten_vi'];
			?>  
		 </td>
		 
		 <td align="center" style="width:15%;">
			<?php
			$sql_danhmuc1="select ten_vi from table_brand_list where id='".$items[$i]['id_list']."'";
			$result=mysql_query($sql_danhmuc1);
			$item_danhmuc1 =mysql_fetch_array($result);
			echo @$item_danhmuc1['ten_vi'];
			?>  
		
		 </td>
		 
		<td align="center" style="width:40%;"><?php echo $items[$i]['ten_vi']?> </td>		
		<td align="center" style="width:40%;"><?php echo $items[$i]['ten_en']?> </td>	
		<td align="center" style="width:30%;"><img src="<?php echo _upload_sanpham.$items[$i]['photo']?>" height="100" /></td>	
		<td style="width:5%;">
		
        <?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
			<a href="index.php?com=brand&act=man_cat&hienthi=<?php echo $items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<?php
		}
		else
		{
		?>
			<a href="index.php?com=brand&act=man_cat&hienthi=<?php echo $items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>
        
        
        
        </td>
		<td style="width:5%;">
			<a href="index.php?com=brand&act=edit_cat&id_list=<?php echo $items[$i]['id_list']?>&id=<?php echo $items[$i]['id']?>&id_list_l=<?php echo $items[$i]['id_list_l']?>">
				<img src="media/images/edit.png" border="0" />
			</a>
		</td>
		
		<td style="width:5%;">
			<a href="index.php?com=brand&act=delete_cat&id=<?php echo $items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;">
				<img src="media/images/delete.png" border="0" />
			</a>
		</td>
	</tr>
	<?php	}?>
</table>
</form>
<a href="index.php?com=brand&act=add_cat"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?php echo $paging['paging']?></div>