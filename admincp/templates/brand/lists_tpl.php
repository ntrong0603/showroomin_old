<script>
$(document).ready(function() {

						$('.stt').focusout(function(){
								idsp=$(this).attr('id').substring(3);
								idmaso=$(this).val();
						
							$.ajax({
													type:"get",
													url:"templates/brand/ajax/ajaxstt.php",
													data:"idsp="+idsp+"&idstt="+idmaso+"&table=brand_list",
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
	if (hoi==true) document.location = "index.php?com=brand&act=delete_list&listid=" + listid;
});
});
</script>
<h3>Quản lý danh mục cấp 2</h3>
 &nbsp;&nbsp;&nbsp;Danh mục cấp 1&nbsp;<?php echo get_main_danhmuc();?><br />
 
 <script language="javascript">				
	function select_onchange()
	{				
		var a=document.getElementById("id_danhmuc");
		window.location ="index.php?com=brand&act=man_list&id_danhmuc="+a.value;	
		return true;
	}
</script>
 
 <?php	
	function get_main_danhmuc()
	{
		$sql="select * from table_brand_danhmuc order by stt";
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
?><br />
<table class="blue_table">
	<tr>
    	<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
		<th style="width:5%;">STT</th>
        <th style="width:25%;">Danh mục chính</th>
		<th style="width:80%;">Tên </th>	
		<th style="width:5%;">Trang chủ</th>
		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
    <td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?php echo @$items[$i]['id']?>" class="chon" /></td>
		<td style="width:5%;"><input type='text' class='stt' id='<?="stt".$items[$i]['id']?>' name='' value='<?=$items[$i]['stt']?>' size=2 /></td>
        
        <td align="center" style="width:25%;">        
			<?php
				$sql_danhmuc="select ten from table_brand_danhmuc where id='".$items[$i]['id_danhmuc']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten']
            ?>               
        </td>	
        
		<td align="center" style="width:80%;"><?php echo @$items[$i]['ten']?> </td>		
		<td style="width:5%;">
		
        <?php 
		if(@$items[$i]['noibat']==1)
		{
		?>
        <a href="index.php?com=brand&act=man_list&noibat=<?php echo @$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<?php }
		else
		{
		?>
         <a href="index.php?com=brand&act=man_list&noibat=<?php echo @$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>
        
        
        
        </td>
		<td style="width:5%;">
		
        <?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=brand&act=man_list&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<?php }
		else
		{
		?>
         <a href="index.php?com=brand&act=man_list&hienthi=<?php echo @$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>
        
        
        
        </td>
		<td style="width:5%;"><a href="index.php?com=brand&act=edit_list&id_danhmuc=<?php echo @$items[$i]['id_danhmuc']?>&id=<?php echo @$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:5%;"><a href="index.php?com=brand&act=delete_list&id=<?php echo @$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa: <?php echo @$items[$i]['ten']?>')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>

<a href="index.php?com=brand&act=add_list"><img src="media/images/add.jpg" border="0"  /></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?php echo $paging['paging']?></div>