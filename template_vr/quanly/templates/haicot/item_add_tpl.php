<script>
			$(document).ready(function(){
				$('a.number').click(function(){
				var an=$('a.set').attr('title');
				$('div#'+an).hide();
				$('a.set').removeClass('set');
				$(this).addClass('set');
				var hien=$(this).attr('title');
				$('div#'+hien).show();
				
				})
			});
		</script>

<?php if ($_REQUEST['act']=='edit') { ?> <h3>Sửa sản phẩm</h3> <?php }else{ ?><h3>Thêm sản phẩm</h3><?php } ?>
<script language="javascript">				
	function select_onchange()
	{			
		var a=document.getElementById("id_danhmuc");
		window.location ="index.php?com=haicot&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value;	
		return true;
	}
	function select_onchange1()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		window.location ="index.php?com=haicot&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value+"&id_list="+b.value;	
		return true;
	}
	function select_onchange2()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		var c=document.getElementById("id_cat");
		window.location ="index.php?com=haicot&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value+"&id_list="+b.value+"&id_cat="+c.value;	
		return true;
	}

	
</script>
<?php
function get_main_danhmuc()
	{
		$sql="select * from table_haicot_danhmuc order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_danhmuc" name="id_danhmuc" onchange="select_onchange()" class="main_font">
			<option value="0" >Chọn danh mục</option>			
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
		$sql="select * from table_haicot_list where id_danhmuc=".$_REQUEST['id_danhmuc']."  order by stt";
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
	
function get_main_category()
	{
		$sql="select * from table_haicot_cat where id_list=".$_REQUEST['id_list']." order by stt";
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
		$sql_huyen="select * from table_haicot_item where id_cat=".$_REQUEST['id_cat']." order by id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_item" name="id_item"">
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
<div class="haicot">
			<div class="title" id="tabs">

				<a href="#" class="set number" title="tab1" style="display:block;width:120px;"><p> <?php echo $ngonngu1;?></p></a>
		
			</div>
<form name="frm" method="POST" action="index.php?com=haicot&act=save&id=<?php echo @$item['id'];?>&p=<?php echo $_REQUEST['p']?>" enctype="multipart/form-data" class="nhaplieu">	
<div id='tab1' class='' > 
    
    <?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình ảnh:</b><img src="<?php echo _upload_sanpham.$item['thumb']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn hình:</b> <input type="file" name="file" /> 279*222 <?php echo _haicot_type?><br />
    <br />
    


	<b>Tên Mục</b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /> 
    
	<b>Link</b> <input type="text" name="tenkhongdau" value="<?php echo @$item['tenkhongdau']?>" class="input" /><br /> <br /> 
    <?php
	
	$sql="select id, ten from table_news_danhmuc where hienthi=1 ";
	$d->query($sql);
	$danhmuc=$d->result_array();
	?>
	<b style='color:red'>Chỉ chọn 1 trong 2 danh mục dưới đây(Không chọn sẽ hiện hình ảnh)</b></br>
	<b>Danh mục tin tức</b>
	<select name='mota' >
	
	<option value='' >Chọn danh mục hiển thị</option>
	<?php 
	for($i=0; $i<count($danhmuc);$i++){
		
		?>
		<option value='<?php echo $danhmuc[$i]['id'];?>' <?php if( $item['mota']==$danhmuc[$i]['id'] ){echo " selected ";}?> ><?php echo $danhmuc[$i]['ten'];?></option>
	<?php } ?>
	 </select>
	 </br>
	 </br>
   <?php
	
	$sql="select id, ten from table_place_list where hienthi=1 ";
	$d->query($sql);
	$danhmuc=$d->result_array();	
	$sql="select id, ten from table_place_danhmuc where hienthi=1 ";
	$d->query($sql);
	$danhmucgoc=$d->result_array();
	?>
    	<b>Danh mục Sản phẩm</b>
	<select name='noidung' >
	<option value='' >Chọn danh mục hiển thị</option>
	<?php 
	for($i=0; $i<count($danhmucgoc);$i++){
		
		?>
		<option value='goc<?php echo $danhmucgoc[$i]['id'];?>' <?php if($item['noidung']== "goc".$danhmucgoc[$i]['id'] ){echo " selected ";}?> ><?php echo $danhmucgoc[$i]['ten'];?></option>
	<?php } ?>
	<?php 
	for($i=0; $i<count($danhmuc);$i++){
		
		?>
		<option value='<?php echo $danhmuc[$i]['id'];?>' <?php if( $item['noidung']==$danhmuc[$i]['id'] ){echo " selected ";}?> >====<?php echo $danhmuc[$i]['ten'];?></option>
	<?php } ?>
	 </select>
	 </br>
	 </br>
  
 
	
      
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

    <b>Bên phải</b> <input type="checkbox" name="noibat" <?php echo ( $item['noibat']==1)?'checked="checked"':''?> /><br /> 
    <b>Bên trái</b> <input type="checkbox" name="trai" <?php echo ( $item['trai']==1)?'checked="checked"':''?> /><br /> 
  
	<b>Hiển thị </b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /><br />
    
    
 </div> 
 
 
 
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" name='save' value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=haicot&act=man'" class="btn" />
</form>
</div>