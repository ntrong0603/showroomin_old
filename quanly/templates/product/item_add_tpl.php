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
		window.location ="index.php?com=product&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php echo "&id_place=".$_REQUEST['id_place']; ?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value;	
		return true;
	}
	function select_onchange1()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		window.location ="index.php?com=product&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php echo "&id_place=".$_REQUEST['id_place']; ?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value+"&id_list="+b.value;	
		return true;
	}
	function select_onchange2()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		var c=document.getElementById("id_cat");
		window.location ="index.php?com=product&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php echo "&id_place=".$_REQUEST['id_place']; ?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value+"&id_list="+b.value+"&id_cat="+c.value;	
		return true;
	}

	
</script>
<?php
function get_main_danhmuc()
	{
		$sql="select * from table_product_danhmuc where id_place = ".$_REQUEST['id_place']." order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_danhmuc" name="id_danhmuc" onchange="select_onchange()" class="main_font">
			<option value="0" >Chọn danh mục</option>';
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
		$sql="select * from table_product_list where id_place = ".$_REQUEST['id_place']." and id_danhmuc=".$_REQUEST['id_danhmuc']."  order by stt";
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
		$sql="select * from table_product_cat where id_place = ".$_REQUEST['id_place']." and id_list=".$_REQUEST['id_list']." order by stt";
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
		$sql_huyen="select * from table_product_item where id_place = ".$_REQUEST['id_place']." and id_cat=".$_REQUEST['id_cat']." order by id desc ";
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
<div class="product">
			<div class="title" id="tabs">

				<a href="#" class="set number" title="tab1" style="display:block;width:120px;"><p> <?php echo $ngonngu1;?></p></a>
				<?php if($langnum >=2){?><a href="#" class=" number" title="tab2"style="	display:block;width:170px;"><p><?php echo $ngonngu2;?></p></a><?php } ?>
				<?php if($langnum >=3){?><a href="#" class=" number" title="tab3"style="	display:block;width:170px;"><p><?php echo $ngonngu3;?></p></a><?php } ?>
		
			</div>
<form name="frm" method="POST" action="index.php?com=product&act=save&id_place=<?php echo $_REQUEST['id_place']?>&id=<?php echo @$item['id'];?>" enctype="multipart/form-data" class="nhaplieu">	
<div id='tab1' class='' > 
	 <b>Danh mục:</b><?=get_main_danhmuc();?><br /><br />
    
    <?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình ảnh:</b><img src="<?=_upload_sanpham.$item['photo']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn hình:</b> <input type="file" name="file" /> Rộng : <?=$config['hinhsp']['width']*$config['hinhsp']['scale']?> ; Cao: <?=$config['hinhsp']['height']*$config['hinhsp']['scale']?> ; <?=_product_type?><br />
    <br />
    

	<b>Tên sản phẩm</b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br /> 
    
	<b>Link</b> <input type="text" name="tenkhongdau" value="<?=@$item['tenkhongdau']?>" class="input" /><br /> 
    
 	<b>Giá</b> <input type="text" name="gia" value="<?=@$item['gia']?>" class="input" /><br /> 
    
    <!--<b>Mã sản phẩm</b> <input type="text" name="maso" value="<?=@$item['maso']?>" class="input" /><br /> 
    
    <b>Qui cách</b> <input type="text" name="kichthuoc" value="<?=@$item['kichthuoc']?>" class="input" /><br />
    
    <b>Trọng lượng</b> <input type="text" name="trongluong" value="<?=@$item['trongluong']?>" class="input" /><br /> 
    
    <b>Chất liệu</b> <input type="text" name="chatlieu" value="<?=@$item['chatlieu']?>" class="input" /><br /> 
    
    <b>Nguồn</b> <input type="text" name="nhasanxuat" value="<?=@$item['nhasanxuat']?>" class="input" /><br />
    -->
    <b>Mô tả</b><br/>
	<div>
	 <textarea class="mota" name="mot2a" id="mota2"><?=@$item['mota2']?></textarea></div> <br/>  
	<script language="javascript">CKEDITOR.replace('mota2');</script> 
    
	<b>Thông tin kỹ thuật</b><br/>
	<div>
	 <textarea class="mota" name="mota" id="mota"><?=@$item['mota']?></textarea></div> <br/>  
	<script language="javascript">CKEDITOR.replace('mota');</script> 
     
    <b>Chi tiết sản phẩm </b><br/>
	<div>
	  <textarea name="noidung" id="noidung"><?=@stripslashes($item['noidung'])?></textarea></div> <br/>  
     <script language="javascript">CKEDITOR.replace('noidung');</script> 
     
    <!--<b>Thông tin kỹ thuật</b><br/>
	<div>
	  	<textarea name="thongtinkythuat" id="thongtinkythuat"><?=@stripslashes($item['thongtinkythuat'])?></textarea></div> <br/>  
     	<script language="javascript">CKEDITOR.replace('thongtinkythuat');</script> 
    <b>Video</b><br/>
	<div>
	  	<textarea name="video" id="video"><?=@stripslashes($item['video'])?></textarea></div> <br/>  
     	<script language="javascript">CKEDITOR.replace('video');</script> 
    <b>Download</b><br/>
	<div>
	  	<textarea name="download" id="download"><?=@stripslashes($item['download'])?></textarea></div> <br/>  
     	<script language="javascript">CKEDITOR.replace('download');</script> 
	-->
    <b>Title</b>
	<div><textarea name="title" id="title"><?=@$item['title']?></textarea></div><br/>   
     
    <b>Keyword</b>
	<div><textarea name="keyword" id="keyword"><?=@$item['keyword']?></textarea></div><br/> 
    
    <b>Description</b>
	<div><textarea name="description" id="description"><?=@$item['description']?></textarea></div><br/>             
      
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
    

    
    <b>Đã hết hàng </b> <input type="checkbox" name="hot" <?=( $item['hot']==1)?'checked="checked"':''?> /><br /> 

    <b>Nổi bật </b> <input type="checkbox" name="noibat" <?=( $item['noibat']==1)?'checked="checked"':''?> /><br /> 
       
   
	<b>Hiển thị </b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /><br />
    <b>Tự lấy ảnh </b> <input type="checkbox" name="qhack"  /><br />
 </div> 
 
 
 
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="hidden" name="id_place" id="id_place" value="<?=@$_GET['id_place']?>" />
	<input type="submit" name='save' value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man&id_place=<?php echo $_REQUEST['id_place'] ?>&id_danhmuc=<?php echo $_REQUEST['id_danhmuc'] ?>'" class="btn" />
</form>
</div>