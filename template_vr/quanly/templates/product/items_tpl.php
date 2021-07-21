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
	if (hoi==true) document.location = "index.php?com=product&act=delete&<?php echo  'id_place='.$_GET['id_place']; ?>&listid=" + listid;
});
});
</script>
<h3>Quản lý sản phẩm</h3>
	  &nbsp;&nbsp;&nbsp;Danh mục &nbsp;<?=get_main_danhmuc();?>
	    &nbsp;&nbsp;&nbsp;&nbsp;<br /><br />
       
<script language="javascript">				
	function select_onchange()
	{				
		var a=document.getElementById("id_danhmuc");
		stra = '';
		if (a.value > 0)
			stra = "&id_danhmuc="+a.value;
		window.location ="index.php?com=product&act=man&<?php echo  'id_place='.$_GET['id_place']; ?>"+stra;	
		return true;
	}
	function select_onchange1()
	{			
		stra = ''; strb = '';	
		var a=document.getElementById("id_danhmuc");
		if (a.value > 0)
			stra = "&id_danhmuc="+a.value;
		var b=document.getElementById("id_list");
		if (b.value > 0)
			strb = "&id_list="+b.value;
		window.location ="index.php?com=product&act=man&<?php echo  'id_place='.$_GET['id_place']; ?>"+stra+strb;	
		return true;
	}
	function select_onchange2()
	{		
		stra = ''; strb = ''; strc = '';		
		var a=document.getElementById("id_danhmuc");
		if (a.value > 0)
			stra = "&id_danhmuc="+a.value;
		var b=document.getElementById("id_list");
		if (b.value > 0)
			strb = "&id_list="+b.value;
		var c=document.getElementById("id_cat");
		if (c.value > 0)
			strc = "&id_cat="+c.value;
		window.location ="index.php?com=product&act=man&<?php echo  'id_place='.$_GET['id_place']; ?>"+stra+strb+strc;	
		return true;
	}
	function select_onchange3()
	{			
		stra = ''; strb = ''; strc = ''; strd = '';	
		var a=document.getElementById("id_danhmuc");
		if (a.value > 0)
			stra = "&id_danhmuc="+a.value;
		var b=document.getElementById("id_list");
		if (b.value > 0)
			strb = "&id_list="+b.value;
		var c=document.getElementById("id_cat");
		if (c.value > 0)
			strc = "&id_cat="+c.value;
		var d=document.getElementById("id_item");
		if (d.value > 0)
			strd = "&id_item="+d.value;
		window.location ="index.php?com=product&act=man&<?php echo  'id_place='.$_GET['id_place']; ?>"+stra+strb+strc+strd;		
		return true;
	}

	
</script>

<?php
function get_main_danhmuc()
	{
		$sql="select * from table_product_danhmuc where id_place=".$_GET['id_place']." order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_danhmuc" name="id_danhmuc" onchange="select_onchange()" class="main_font">
			<option value="0">Chọn danh mục</option>			
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
		$sql="select * from table_product_list where id_place=".$_GET['id_place']." and id_danhmuc=".$_REQUEST['id_danhmuc']." order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange1()" class="main_font">
			<option value="0">Chọn danh mục</option>			
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
function get_main_category()
	{
		$sql="select * from table_product_cat where id_place=".$_GET['id_place']." and id_list=".$_REQUEST['id_list']." order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat" name="id_cat" onchange="select_onchange2()" class="main_font">
			<option value="0">Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_cat"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	
	function get_main_item()
	{
		$sql_huyen="select * from table_product_item where id_place=".$_GET['id_place']." and id_cat=".$_REQUEST['id_cat']." order by id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_item" name="id_item" onchange="select_onchange3()" class="main_font">
			<option value="0">Chọn danh mục</option>			
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

<a href="index.php?com=product&act=add"><img src="./../../quanly/media/images/add.jpg" border="0"  /></a>
<br />
<table class="blue_table">
	<tr>
		<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
        <th style="width:5%;">Stt</th>		
        <th style="width:10%;">Tên  </th>
        <th style="width:10%;">Hình ảnh  </th>
        <th style="width:10%;">Hình ảnh liên quan </th>
        <th style="width:5%;">Sản phẩm mới</th>
        <th style="width:5%;">Khuyến mãi</th>
        <th style="width:5%;">Bán chạy</th>

		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?=@$items[$i]['id']?>" class="chon" /></td>
        <td style="width:5%;"><?=@$items[$i]['stt']?></td>

        <td style="width:10%;"><a href="index.php?com=product&act=edit&id_place=<?=@$items[$i]['id_place']?>&id_danhmuc=<?=@$items[$i]['id_danhmuc']?>&id_list=<?=@$items[$i]['id_list']?>&id_cat=<?=@$items[$i]['id_cat']?>&id_item=<?=@$items[$i]['id_item']?>&id=<?=@$items[$i]['id']?>" style="text-decoration:none;"><?=@$items[$i]['ten']?></a></td>
        <td style="width:10%;"><img src='./../../upload/sanpham/<?php echo @$items[$i]['photo'];?>' height='100' alt='' title='' /></td>
        
    	<td align="center" style="width:15%;">
		<?php

			$d->reset();
			$sql_g="select id from table_hinhsp where hienthi=1 and id_sp={$items[$i]['id']}";
			$d->query($sql_g);
			$result_g= $d->result_array();
		?>
  		<a href="index.php?com=hinhsp&act=man_photo&id_place=<?=@$items[$i]['id_place']?>&id_sp=<?=$items[$i]['id']?>" style="text-decoration:none;"><img src="./../../quanly/media/images/Photos-icon.png" alt="gallery" width="30" ><span><br /><?=count($result_g);?> images</span></a>
        
      </td>
        
        
        <td style="width:5%;">
        	<a href="index.php?com=product&act=man&id_place=<?=@$items[$i]['id_place']?>&spmoi=<?=@$items[$i]['id']?>"><img src="./../../quanly/media/images/active_<?=(@$items[$i]['spmoi'] > 0)?1:0?>.png" border="0" /></a> 
        </td>
  
        <td style="width:5%;">
        	<a href="index.php?com=product&act=man&id_place=<?=@$items[$i]['id_place']?>&khuyenmai=<?=@$items[$i]['id']?>"><img src="./../../quanly/media/images/active_<?=(@$items[$i]['khuyenmai'] > 0)?1:0?>.png" border="0" /></a> 
        </td>
        
          
		<td style="width:5%;">
        	<a href="index.php?com=product&act=man&id_place=<?=@$items[$i]['id_place']?>&spbanchay=<?=@$items[$i]['id']?>"><img src="./../../quanly/media/images/active_<?=(@$items[$i]['spbanchay'] > 0)?1:0?>.png" border="0" /></a> 
        </td>
        
        
        <td style="width:5%;">
        	<a href="index.php?com=product&act=man&id_place=<?=@$items[$i]['id_place']?>&hienthi=<?=@$items[$i]['id']?>"><img src="./../../quanly/media/images/active_<?=(@$items[$i]['hienthi'] > 0)?1:0?>.png" border="0" /></a> 
        </td>
        
		<td style="width:5%;"><a href="index.php?com=product&act=edit&id_place=<?=@$items[$i]['id_place']?>&id_danhmuc=<?=@$items[$i]['id_danhmuc']?>&id_list=<?=@$items[$i]['id_list']?>&id_cat=<?=@$items[$i]['id_cat']?>&id_item=<?=@$items[$i]['id_item']?>&id=<?=@$items[$i]['id']?>"><img src="./../../quanly/media/images/edit.png" /></a></td>
		<td style="width:5%;"><a href="index.php?com=product&act=delete&id_place=<?=@$items[$i]['id_place']?>&id=<?=@$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa: <?=@$items[$i]['ten']?>')) return false;"><img src="./../../quanly/media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
    </table>
<a href="index.php?com=product&act=add&id_place=<?php echo $_GET['id_place']?>"><img src="./../../quanly/media/images/add.jpg" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="./../../quanly/media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>