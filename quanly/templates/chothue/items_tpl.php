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
	if (hoi==true) document.location = "index.php?com=chothue&act=delete&listid=" + listid;
});
});
</script>
<h3>Quản lý sản phẩm</h3>
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
	<br />
	<br />
       <form action='' method='post' >
	<input type='text' name='keyword' value='<?php if( isset( $_POST['keyword'] ) ){echo $_POST['keyword'];} ?>' /><input type='submit' value='Tìm theo tên' style='background: #ddd;'/>
</form>

<script language="javascript">				
	// tự sinh script select box theo số lượng cấp danh mục
	<?php
		for($scdm=1;$scdm<=$sodmuc;$scdm++){
			
	?>
		function select_onchange<?php echo $scdm;?>()
		{	
			<?php 
				$url='"index.php?com=chothue&act='.$_GET['act'];
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

	
	$(document).ready(function(){   
		$('.kichthuoc').focusout(function(){
			idsp=$(this).attr('id').substring(9);
			idmaso=$(this).val();
			$.ajax({
				type:"get",
				url:"templates/chothue/ajax/ajaxkichthuoc.php",
				data:"idsp="+idsp+"&idstt="+idmaso,
				async:false,
				success:function(kq){
				}
			})
		})
		$('.gia').focusout(function(){
			idsp=$(this).attr('id').substring(3);
			idmaso=$(this).val();
			$.ajax({
				type:"get",
				url:"templates/chothue/ajax/ajaxgia.php",
				data:"idsp="+idsp+"&idstt="+idmaso,
				async:false,
				success:function(kq){

				}
			})
		})	
		$('.stt').focusout(function(){
			idsp=$(this).attr('id').substring(3);
			idmaso=$(this).val();
			$.ajax({
				type:"get",
				url:"templates/chothue/ajax/ajaxstt.php",
				data:"idsp="+idsp+"&idstt="+idmaso+"&table=chothue",
				async:false,
				success:function(kq){
				}
			})
		})						
	})
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
<a href="index.php?com=chothue&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<br />
<table class="blue_table">
	<tr>
		<th style="width:5%" align="center"><input type="checkbox" name="chonhet" id="chonhet" /></th>
        <th style="width:5%;">Stt</th>		
        <?php for($i=1;$i<=$sodmuc;$i++)
		{ ?>
      		<th style="width:5%;">Danh mục cấp <?php  echo $i?></th>
      	<?php }?>
      	<th style="width:5%;">Tên  </th>
        <th style="width:5%;">Hình  </th>
         <th style="width:5%;">Các hình sản phẩm</th>
        <th style="width:5%;">Nổi bật</th>
		<th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0; $i<count($items); $i++){?>
	

	<tr bgcolor="<?php if($i%2==1)echo '#F3F3F3' ?>">
		<td style="width:5%;" align="center"><input type="checkbox" name="chon" id="chon" value="<?php echo @$items[$i]['id']?>" class="chon" /></td>
        <td style="width:5%;"><input type='text' class='stt' id='<?="stt".$items[$i]['id']?>' name='' value='<?=$items[$i]['stt']?>' size=2 /></td>
        <?php 
			$arr=get_dsdanhmuccha($items[$i]['id_danhmuc']);
			$count=count($arr);
			$sten=$count;
		?>
       	<?php for($j=1;$j<=$sodmuc;$j++){ ?> 
       	<td style="width:5%;">
       		<?php 
       			$sten=$sten-1;
       			if($sten>=0){    				
       				echo $arr[$sten]['ten'];
       			}
       		?>
        </td>
        <?php  } ?>

        <td style="width:5%;"><a href="index.php?com=chothue&act=edit&<?php 

				$cap=1;
				for($dmc=$count-1;$dmc>=0;$dmc--){
					echo "id_danhmucc".$cap."=".$arr[$dmc]['id']."&";
					$cap=$cap+1;
				}
			?>id=<?php echo @$items[$i]['id']?>" style="text-decoration:none;"><?php echo @$items[$i]['ten']?></a></td>
       <td align="center" style="width:5%;"><img src="<?php echo "../upload/chothue/".$items[$i]['thumb'] ?>" style="max-width:80%"/></td>
       <td align="center" style="width:5%;"><a href="index.php?com=hinhsp&act=man_photo&id_sp=<?php echo @$items[$i]['id']?>&id_com=<?php echo $_GET['com'];?>">Hình ảnh</a></td>
  
       
		<td style="width:5%;">
		<?php 
		if(@$items[$i]['noibat']==1)
		{
		?>
        
        <a href="index.php?com=chothue&act=man&<?php 

				$cap=1;
				for($dmc=$count-1;$dmc>=0;$dmc--){
					echo "id_danhmucc".$cap."=".$arr[$dmc]['id']."&";
					$cap=$cap+1;
				}
			?>noibat=<?php echo @$items[$i]['id']?><?php if($_REQUEST['p']!='') echo'&p='. $_REQUEST['p'];?>"><img src="media/images/active_1.png" border="0" /></a>
		<?php }
		else
		{
		?>
         <a href="index.php?com=chothue&act=man&<?php 

				$cap=1;
				for($dmc=$count-1;$dmc>=0;$dmc--){
					echo "id_danhmucc".$cap."=".$arr[$dmc]['id']."&";
					$cap=$cap+1;
				}
			?>noibat=<?php echo @$items[$i]['id']?><?php if($_REQUEST['p']!='') echo'&p='. $_REQUEST['p'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>     
        </td>

		
        
          
		<td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
        <a href="index.php?com=chothue&act=man&<?php 

				$cap=1;
				for($dmc=$count-1;$dmc>=0;$dmc--){
					echo "id_danhmucc".$cap."=".$arr[$dmc]['id']."&";
					$cap=$cap+1;
				}
			?>hienthi=<?php echo @$items[$i]['id']?><?php if($_REQUEST['p']!='') echo'&p='. $_REQUEST['p'];?>"><img src="media/images/active_1.png" border="0" /></a>
		<?php }
		else
		{
		?>
         <a href="index.php?com=chothue&act=man&<?php 

				$cap=1;
				for($dmc=$count-1;$dmc>=0;$dmc--){
					echo "id_danhmucc".$cap."=".$arr[$dmc]['id']."&";
					$cap=$cap+1;
				}
			?>hienthi=<?php echo @$items[$i]['id']?><?php if($_REQUEST['p']!='') echo'&p='. $_REQUEST['p'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>      
        </td>
        
		<td style="width:5%;"><a class='edit_item' href="index.php?com=chothue&act=edit&<?php 

				$cap=1;
				for($dmc=$count-1;$dmc>=0;$dmc--){
					echo "id_danhmucc".$cap."=".$arr[$dmc]['id']."&";
					$cap=$cap+1;
				}
			?>id=<?php echo @$items[$i]['id']?><?php if( isset( $_GET['p'] ) ){echo "&p=".$_GET['p'];}?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:5%;"><a href="index.php?com=chothue&act=delete&id=<?php echo @$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa: <?php echo @$items[$i]['ten']?>')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
    </table>
<a href="index.php?com=chothue&act=add"><img src="media/images/add.jpg" border="0"  /></a>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="xoahet"><img src="media/images/delete.jpg" border="0"  /></a>

<div class="paging"><?php echo $paging['paging']?></div>