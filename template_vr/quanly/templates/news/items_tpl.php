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
	if (hoi==true) document.location = "index.php?com=news&act=delete&listid=" + listid;
});
});
</script>
<h3>Quản lý tin tức</h3>
<!--		<?php if ($capmenu>=1){ ?> &nbsp;&nbsp;&nbsp;Danh mục cấp 1&nbsp;<?=get_main_danhmuc();?><?php } ?>
	    <?php if ($capmenu>=2){ ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Danh mục cấp 2&nbsp;<?=get_main_list();?><?php } ?>
	    <?php if ($capmenu>=3){ ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Danh mục cấp 3&nbsp;<?=get_main_category();?><?php } ?>
	    <?php if ($capmenu>=4){ ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Danh mục cấp 4&nbsp;<?=get_main_item();?><?php } ?>
	    &nbsp;&nbsp;&nbsp;&nbsp;<br /><br />
       
<script language="javascript">				
	function select_onchange()
	{				
		var a=document.getElementById("id_danhmuc");
		stra = '';
		if (a.value > 0)
			stra = "&id_danhmuc="+a.value;
		window.location ="index.php?com=news&act=man"+stra;	
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
		window.location ="index.php?com=news&act=man"+stra+strb;	
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
		window.location ="index.php?com=news&act=man"+stra+strb+strc;	
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
		window.location ="index.php?com=news&act=man"+stra+strb+strc+strd;		
		return true;
	}

	
</script>

<?php
function get_main_danhmuc()
	{
		$sql="select * from table_news_danhmuc order by stt";
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
		$sql="select * from table_news_list where id_danhmuc=".$_REQUEST['id_danhmuc']." order by stt";
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
		$sql="select * from table_news_cat where id_list=".$_REQUEST['id_list']." order by stt";
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
		$sql_huyen="select * from table_news_item where id_cat=".$_REQUEST['id_cat']." order by id desc ";
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
?>-->

<a href="index.php?com=news&act=add&loaitin=gioithieu&id_place=<?php echo $_GET['id_place'] ?>"><img src="../../quanly/media/images/add.jpg" border="0"  /></a>
<br />
<table class="blue_table">
	<tr>
		<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
        <th style="width:5%;">Stt</th>		
       <!--<?php if ($capmenu>=1){ ?> <th style="width:10%;">Danh mục cấp 1</th><?php  } ?>
       <?php if ($capmenu>=2){ ?> <th style="width:10%;">Danh mục cấp 2</th><?php  } ?>
       <?php if ($capmenu>=3){ ?> <th style="width:10%;">Danh mục cấp 3</th><?php  } ?>
       <?php if ($capmenu>=4){ ?> <th style="width:10%;">Danh mục cấp 4</th><?php  } ?>-->
        <th style="width:75%;">Tên  </th>

		<!--<th style="width:8%;">Hình SP</th>-->

		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?=@$items[$i]['id']?>" class="chon" /></td>
        <td style="width:5%;"><?=@$items[$i]['stt']?></td>
       <!--<?php if ($capmenu>=1){ ?> <td style="width:10%;">
			  <?php
				$sql_danhmuc="select ten from table_news_danhmuc where id='".$items[$i]['id_danhmuc']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten']
			?>      
        </td><?php  } ?>
	<?php if ($capmenu>=2){ ?>	<td style="width:10%;">
			  <?php
				$sql_danhmuc="select ten from table_news_list where id='".$items[$i]['id_list']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten']
			?>      
        </td><?php  } ?>
       <?php if ($capmenu>=3){ ?> <td style="width:10%;">
			  <?php
				$sql_danhmuc="select ten from table_news_cat where id='".$items[$i]['id_cat']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten']
			?>      
        </td><?php  } ?>
      <?php if ($capmenu>=4){ ?>  <td style="width:10%;">
			  <?php
				$sql_danhmuc="select ten from table_news_item where id='".$items[$i]['id_item']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten']
			?>      
        </td>
       <?php  } ?>-->


        <td style="width:75%;"><a href="index.php?com=news&loaitin=gioithieu&act=edit&id_place=<?php echo $_GET['id_place'] ?>&id=<?=@$items[$i]['id']?>" style="text-decoration:none;"><?=@$items[$i]['ten']?></a></td>
        <!--<td style="width:10%;"><img src='<?php echo _upload_tintuc.@$items[$i]['photo'];?>' height='100' alt='' title='' /></td>-->

        <td style="width:5%;">
        	<a href="index.php?com=news&loaitin=gioithieu&act=man&id_place=<?php echo $_GET['id_place'] ?>&hienthi=<?=@$items[$i]['id']?>"><img src="../../quanly/media/images/active_<?=(@$items[$i]['hienthi'] > 0)?1:0?>.png" border="0" /></a> 
        </td>
        
		<td style="width:5%;"><a href="index.php?com=news&act=edit&loaitin=gioithieu&id_place=<?php echo $_GET['id_place'] ?>&id=<?=@$items[$i]['id']?>"><img src="../../quanly/media/images/edit.png" /></a></td>
		<td style="width:5%;"><a href="index.php?com=news&act=delete&loaitin=gioithieu&id_place=<?php echo $_GET['id_place'] ?>&id=<?=@$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa: <?=@$items[$i]['ten']?>')) return false;"><img src="../../quanly/media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
    </table>
<a href="index.php?com=news&act=add&loaitin=gioithieu&id_place=<?php echo $_GET['id_place'] ?>"><img src="../../quanly/media/images/add.jpg" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="../../quanly/media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>