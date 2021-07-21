<script>
$(document).ready(function() {

						$('.stt').focusout(function(){
								idsp=$(this).attr('id').substring(3);
								idmaso=$(this).val();
						
							$.ajax({
													type:"get",
													url:"templates/place/ajax/ajaxstt.php",
													data:"idsp="+idsp+"&idstt="+idmaso+"&table=news",
													async:false,
													success:function(kq){
												
													
													}
												})
						})	
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
	if (hoi==true) document.location = "index.php?com=news&loaitin=<?php echo $loaitin; ?>&act=delete&listid=" + listid;
});
});
</script>
<h3>Quản lý <?php echo  $menu[$loaitin]['ten'] ;?></h3>
	<?php $cap = $menu[$loaitin]['cap'] ;?>
    
      <?php if ($cap>=1){ ?>  &nbsp;&nbsp;&nbsp;Danh mục cấp 1&nbsp;<?php echo get_main_danhmuc();?><?php } ?>
	 <?php if ($cap>=2){ ?>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Danh mục cấp 2&nbsp;<?php echo get_main_list();?><?php } ?>
	   &nbsp;&nbsp;&nbsp;&nbsp;<br /><br />
       <form action='' method='post' >
	<input type='text' name='keyword' value='<?php if( isset( $_POST['keyword'] ) ){echo $_POST['keyword'];} ?>' /><input type='submit' value='Tìm theo tên' style='background: #ddd;'/>
</form>
<script language="javascript">				
	function select_onchange()
	{				
		var a=document.getElementById("id_danhmuc");
		window.location ="index.php?com=news&loaitin=<?php echo $loaitin; ?>&act=man&id_danhmuc="+a.value;	
		return true;
	}
	function select_onchange1()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		window.location ="index.php?com=news&loaitin=<?php echo $loaitin; ?>&act=man&id_danhmuc="+a.value+"&id_list="+b.value;	
		return true;
	}
	function select_onchange2()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		var c=document.getElementById("id_cat");
		window.location ="index.php?com=news&loaitin=<?php echo $loaitin; ?>&act=man&id_danhmuc="+a.value+"&id_list="+b.value+"&id_cat="+c.value;	
		return true;
	}
	function select_onchange3()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		var c=document.getElementById("id_cat");
		var d=document.getElementById("id_item");
		window.location ="index.php?com=news&loaitin=<?php echo $loaitin; ?>&act=man&id_danhmuc="+a.value+"&id_list="+b.value+"&id_cat="+c.value+"&id_item="+d.value;	
		return true;
	}

	
</script>

<?php
function get_main_danhmuc()
	{
		global $loaitin;
		$sql="select * from table_news_danhmuc where loaitin='".$loaitin."' order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_danhmuc" name="id_danhmuc" onchange="select_onchange()" class="main_font">
			<option value="" >Chọn danh mục</option>			
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
		global $loaitin;
		$sql="select * from table_news_list where loaitin='".$loaitin."' and id_danhmuc=".$_REQUEST['id_danhmuc']." order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange1()" class="main_font">
			<option  value=""  >Chọn danh mục</option>			
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
		global $loaitin;
		$sql="select * from table_news_cat where loaitin='".$loaitin."'  and id_list=".$_REQUEST['id_list']." order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat" name="id_cat" onchange="select_onchange2()" class="main_font">
			<option>Chọn danh mục</option>			
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
		global $loaitin;
		$sql_huyen="select * from table_news_item where loaitin='".$loaitin."' and id_cat=".$_REQUEST['id_cat']." order by id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_item" name="id_item" onchange="select_onchange3()" class="main_font">
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

<br />
<table class="blue_table">
	<tr>
		<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
        <th style="width:5%;">Stt</th>		
         <?php if ($cap>=1){ ?><th style="width:10%;">Danh mục cấp 1</th><?php } ?>
        <?php if ($cap>=2){ ?> <th style="width:10%;">Danh mục cấp 2</th><?php } ?>
        
        <th style="width:10%;">Tên  </th>
      
     
       
        <th style="width:5%;">Nổi bật</th>
		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	
	<tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?php echo @$items[$i]['id']?>" class="chon" /></td>
        <td style="width:5%;"><input type='text' class='stt' id='<?="stt".$items[$i]['id']?>' name='' value='<?=$items[$i]['stt']?>' size=2 /></td>
       <?php if ($cap>=1){ ?>  <td style="width:10%;">
			  <?php
				$sql_danhmuc="select ten from table_news_danhmuc where  id='".$items[$i]['id_danhmuc']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten']
			?>      
	   </td><?php } ?>
	 <?php if ($cap>=2){ ?>	<td style="width:10%;">
			  <?php
				$sql_danhmuc="select ten from table_news_list where id='".$items[$i]['id_list']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten']
			?>      
	 </td><?php } ?>
        


        <td style="width:10%;"><a href="index.php?com=news&loaitin=<?php echo $loaitin; ?>&act=edit&id_danhmuc=<?php echo @$items[$i]['id_danhmuc']?>&id_list=<?php echo @$items[$i]['id_list']?>&id_cat=<?php echo @$items[$i]['id_cat']?>&id_item=<?php echo @$items[$i]['id_item']?>&id=<?php echo @$items[$i]['id']?>" style="text-decoration:none;"><?php echo @$items[$i]['ten']?></a></td>
  
		<td style="width:5%;">
		<?php 
		if(@$items[$i]['noibat']==1)
		{
		?>
        
        <a href="index.php?com=news&loaitin=<?php echo $loaitin; ?>&act=man&noibat=<?php echo @$items[$i]['id']?><?php if($_REQUEST['p']!='') echo'&p='. $_REQUEST['p'];?>"><img src="media/images/active_1.png" border="0" /></a>
		<?php }
		else
		{
		?>
         <a href="index.php?com=news&loaitin=<?php echo $loaitin; ?>&act=man&noibat=<?php echo @$items[$i]['id']?><?php if($_REQUEST['p']!='') echo'&p='. $_REQUEST['p'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>     
        </td>
        
      
             
		<td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
        <a href="index.php?com=news&loaitin=<?php echo $loaitin; ?>&act=man&hienthi=<?php echo @$items[$i]['id']?><?php if($_REQUEST['p']!='') echo'&p='. $_REQUEST['p'];?>"><img src="media/images/active_1.png" border="0" /></a>
		<?php }
		else
		{
		?>
         <a href="index.php?com=news&loaitin=<?php echo $loaitin; ?>&act=man&hienthi=<?php echo @$items[$i]['id']?><?php if($_REQUEST['p']!='') echo'&p='. $_REQUEST['p'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>      
        </td>
        
		<td style="width:5%;"><a class='edit_item' href="index.php?com=news&loaitin=<?php echo $loaitin; ?>&act=edit&id_danhmuc=<?php echo @$items[$i]['id_danhmuc']?>&id_list=<?php echo @$items[$i]['id_list']?>&id_cat=<?php echo @$items[$i]['id_cat']?>&id_item=<?php echo @$items[$i]['id_item']?>&id_nhaphathanh=<?php echo @$items[$i]['nhaxuatban']?>&id_tacgia=<?php echo @$items[$i]['nhasanxuat']?>&id=<?php echo @$items[$i]['id']?>&p=<?php echo $_REQUEST['p']?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:5%;"><a href="index.php?com=news&loaitin=<?php echo $loaitin; ?>&act=delete&id=<?php echo @$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa: <?php echo @$items[$i]['ten']?>')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
    </table>
<a href="index.php?com=news&loaitin=<?php echo $loaitin; ?>&act=add"><img src="media/images/add.jpg" border="0"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?php echo $paging['paging']?></div>