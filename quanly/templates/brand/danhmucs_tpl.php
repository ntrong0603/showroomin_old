
<script>
$(document).ready(function() {
	$('.stt').focusout(function(){
		idsp=$(this).attr('id').substring(3);
		idmaso=$(this).val();
		$.ajax({
				type:"get",
				url:"templates/brand/ajax/ajaxstt.php",
				data:"idsp="+idsp+"&idstt="+idmaso+"&table=brand_category",
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
	if (hoi==true) document.location = "index.php?com=brand&act=delete_danhmuc&listid=" + listid;
});
});
</script>
<h3>Quản lý danh mục</h3>
<form action style="margin: 20px 0px;" method="GET">
	

	<?php $sodmuc=demdanhmuc(get_danhmucdacap($d,0));?>
	<?php 
		for($i=1;$i<=$sodmuc;$i++)
		{
	?>
	<b>Danh mục cấp <?php echo $i; ?></b>
		<select id="id_danhmucc<?php echo $i; ?>" name="id_danhmucc<?php echo $i; ?>" onchange="select_onchange<?php echo $i; ?>()" class="input">
				<option value="" >Chọn danh mục</option>
				<?php 
					if($i==1){
						echo get_main_danhmuc($d,0,@$_GET['id_danhmucc'.$i],@$_GET['id']);
					}
					
					if($i!=1){
						$a=$i-1;
						if(isset($_GET['id_danhmucc'.$a]) && $_GET['id_danhmucc'.$a]!='')
						{
							echo get_main_danhmuc($d,$_GET['id_danhmucc'.$a],@$_GET['id_danhmucc'.$i]);
						}
					}
				?>
		</select>
	<?php }?>

	<a href="index.php?com=brand&act=man_danhmuc" style="text-decoration: none; border:solid 1px #cccccc; padding:3px;">Reset</a>
</form>
<script>
	// tự sinh script select box theo số lượng cấp danh mục
	<?php
		for($scdm=1;$scdm<=$sodmuc;$scdm++){
			
	?>
		function select_onchange<?php echo $scdm;?>()
		{	
			<?php 
				$url='"index.php?com=brand&act='.$_GET['act'];
				for($var=1;$var<=$scdm;$var++){
			?>
				var <?php echo 'a'.$var;?>=document.getElementById("id_danhmucc<?php echo $var;?>");
			<?php 
				if($var==$scdm){
					$url.='&id_danhmucc'.$var.'="+a'.$var.'.value';
				}
				else
				{
					$url.='&id_danhmucc'.$var.'="+a'.$var.'.value+"';
				}
				}
			?>
			window.location =<?php echo $url?>;	
			return true;
		}
	<?php
		}
	?>
</script>
<?php 

	function get_main_danhmuc($d,$idparent=0,$iddmuc='')
	{
		$dmuc=get_danhmucdacap($d,$idparent);
		$str='';
		for($i=0;$i<count($dmuc);$i++){
			if($iddmuc!='' && $dmuc[$i]["id"]==$iddmuc){
				$str.='<option value='.$dmuc[$i]["id"].' selected>'.$dmuc[$i]["ten"].'</option>';	
			}
			else
			{
				$str.='<option value='.$dmuc[$i]["id"].' >'.$dmuc[$i]["ten"].'</option>';	
			}	
		}
		return $str;
	}
?>
<table class="blue_table">
	<tr>
    	<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
		<th style="width:5%;">STT</th>
		<th style="width:30%;">Danh mục </th>
		<th style="width:10%;">Hình đại diện</th>	
		<th style="width:5%;">Hiển thị</th>	
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){
		
		?>
		<tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
			<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?php echo @$items[$i]['id']?>" class="chon" /></td>
			 <td style="width:5%;"><input type='text' class='stt' id='<?="stt".$items[$i]['id']?>' name='' value='<?=$items[$i]['stt']?>' size=2 /></td>
			<td align="left" style="width:30%; text-align: left; padding-left: 20px;"><?php echo @$items[$i]['ten']?> </td>		
	        <td style="width:10%;">
				<img src="<?php echo _upload_sanpham.@$items[$i]['thumb2'];?>" width="60px">
	        </td>	
	        <td style="width:5%;">
			<?php 
			if(@$items[$i]['hienthi']==1)
			{
			?>
	        
	        <a href="index.php?com=brand&act=man_danhmuc&id_danhmucc1=<?php echo $_GET['id_danhmucc1'];?>&id_danhmucc2=<?php echo $_GET['id_danhmucc2'];?>&id_danhmucc3=<?php echo $_GET['id_danhmucc3'];?>&id_danhmucc4=<?php echo $_GET['id_danhmucc4'];?>&hienthi=<?php echo @$items[$i]['id']?><?php if($_REQUEST['p']!='') echo'&p='. $_REQUEST['p'];?>"><img src="media/images/active_1.png" border="0" /></a>
			<?php }
			else
			{
			?>
	         <a href="index.php?com=brand&act=man_danhmuc&id_danhmucc1=<?php echo $_GET['id_danhmucc1'];?>&id_danhmucc2=<?php echo $_GET['id_danhmucc2'];?>&id_danhmucc3=<?php echo $_GET['id_danhmucc3'];?>&id_danhmucc4=<?php echo $_GET['id_danhmucc4'];?>&hienthi=<?php echo @$items[$i]['id']?><?php if($_REQUEST['p']!='') echo'&p='. $_REQUEST['p'];?>"><img src="media/images/active_0.png"  border="0"/></a>
	         <?php
			 }?>      
	        </td>
			<td style="width:5%;"><a href="index.php?com=brand&act=edit_danhmuc&<?php 
				if($items[$i]['id_parent']!=0){
				$arr2=get_dsdanhmuccha($items[$i]['id_parent']);
				$count2=count($arr);
				$cap2=1;
				for($dmc=$count-1;$dmc>=0;$dmc--){
					echo "id_danhmucc".$cap2."=".$arr2[$dmc]['id']."&";
					$cap2=$cap2+1;
				}
			}
			?>id=<?php echo @$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a>
			</td>
			<td style="width:5%;"><a href="index.php?com=brand&act=delete_danhmuc&id=<?php echo @$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa: <?php echo @$items[$i]['ten']?>')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
		</tr>
		<?php if(!empty($items[$i]['sub'])){ show_sub($items[$i]['sub']); }?>
	<?php	}?>
</table>
<a href="index.php?com=brand&act=add_danhmuc"><img src="media/images/add.jpg" border="0"  /></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?php echo $paging['paging']?></div>
<?php 
function show_sub($sub,$d=2){
	for($j=0, $count2=count($sub); $j<$count2; $j++){
?>	
		<tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
			<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?php echo @$sub[$j]['id']?>" class="chon" /></td>
			 <td style="width:5%;"><input type='text' class='stt' id='<?="stt".$sub[$j]['id']?>' name='' value='<?=$sub[$j]['stt']?>' size=2 /></td>

			<td align="left" style="width:30%; text-align: left; padding-left: 20px;"><?php 
				for($dem=0;$dem<$d;$dem++)
				{
					echo '-';
				}
				echo " ".@$sub[$j]['ten']
				?> 
			</td>	
			<td style="width:10%;">
				<img src="<?php echo _upload_sanpham.@$items[$i]['thumb2'];?>" width="60px">
	        </td>		
	        <td style="width:5%;">
			<?php 
			if(@$sub[$j]['hienthi']==1)
			{
			?>
	        
	        <a href="index.php?com=brand&act=man_danhmuc&id_danhmucc1=<?php echo $_GET['id_danhmucc1'];?>&id_danhmucc2=<?php echo $_GET['id_danhmucc2'];?>&id_danhmucc3=<?php echo $_GET['id_danhmucc3'];?>&id_danhmucc4=<?php echo $_GET['id_danhmucc4'];?>&hienthi=<?php echo @$sub[$j]['id']?><?php if($_REQUEST['p']!='') echo'&p='. $_REQUEST['p'];?>"><img src="media/images/active_1.png" border="0" /></a>
			<?php }
			else
			{
			?>
	         <a href="index.php?com=brand&act=man_danhmuc&id_danhmucc1=<?php echo $_GET['id_danhmucc1'];?>&id_danhmucc2=<?php echo $_GET['id_danhmucc2'];?>&id_danhmucc3=<?php echo $_GET['id_danhmucc3'];?>&id_danhmucc4=<?php echo $_GET['id_danhmucc4'];?>&hienthi=<?php echo @$sub[$j]['id']?><?php if($_REQUEST['p']!='') echo'&p='. $_REQUEST['p'];?>"><img src="media/images/active_0.png"  border="0"/></a>
	         <?php
			 }?>      
	        </td>
			<td style="width:5%;"><a href="index.php?com=brand&act=edit_danhmuc&<?php 
				if($sub[$j]['id_parent']!=0){
				$arr=get_dsdanhmuccha($sub[$j]['id_parent']);
				$count=count($arr);
				$cap=1;
				for($dmc=$count-1;$dmc>=0;$dmc--){
					echo "id_danhmucc".$cap."=".$arr[$dmc]['id']."&";
					$cap=$cap+1;
				}
			}
			?>id=<?php echo @$sub[$j]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
			<td style="width:5%;"><a href="index.php?com=brand&act=delete_danhmuc&id=<?php echo @$sub[$j]['id']?>" onClick="if(!confirm('Xác nhận xóa: <?php echo @$sub[$j]['ten']?>')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
		</tr>
<?php
		$d1=$d+2;
		if(!empty($sub[$j]['sub'])){ 
			show_sub($sub[$j]['sub'],$d1); 
		}
	}
}
?>