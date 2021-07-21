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
		window.location ="index.php?com=product&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value;	
		return true;
	}
	function select_onchange1()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		window.location ="index.php?com=product&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value+"&id_list="+b.value;	
		return true;
	}
	function select_onchange2()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		var c=document.getElementById("id_cat");
		window.location ="index.php?com=product&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value+"&id_list="+b.value+"&id_cat="+c.value;	
		return true;
	}

	
</script>
<?php
function get_main_danhmuc()
	{
		$sql="select * from table_product_danhmuc order by stt";
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
		$sql="select * from table_product_list where id_danhmuc=".$_REQUEST['id_danhmuc']."  order by stt";
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
		$sql="select * from table_product_cat where id_list=".$_REQUEST['id_list']." order by stt";
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
		$sql_huyen="select * from table_product_item where id_cat=".$_REQUEST['id_cat']." order by id desc ";
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
<form name="frm" method="POST" action="index.php?com=product&act=save&id=<?php echo @$item['id'];?>&p=<?=$_REQUEST['p']?>" enctype="multipart/form-data" class="nhaplieu">	
<div id='tab1' class='' > 
	<?php if ($capmenu>=1){ ?> <b>Danh mục cấp 1:</b><?=get_main_danhmuc();?><br /><br /><?php } ?>
    <?php if ($capmenu>=2){ ?> <b>Danh mục cấp 2:</b><?=get_main_list();?><br /><br /><?php } ?>
    <?php if ($capmenu>=3){ ?> <b>Danh mục cấp 3:</b><?=get_main_category();?><br /><br /><?php } ?>
    <?php if ($capmenu>=4){ ?> <b>Danh mục cấp 4:</b><?=get_main_item();?><br /><br /><?php } ?>
    
    <?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình ảnh:</b><img src="<?=_upload_sanpham.$item['thumb']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn hình:</b> <input type="file" name="file" /> <?=_product_type?><br />
    <br />
    

	<b>Tên sản phẩm</b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br /> 
	<b>Link</b> <input type="text" name="tenkhongdau" value="<?=@$item['tenkhongdau']?>" class="input" /><br /> 
    <div id='' class='' style='width: 100%; height: 100px; overflow:scroll;' > 
		<a>Thuộc tính </a><br/><br/>
		<?php $itemthuoctinh=explode(",",@$item['thuoctinh']);?>
		<?php for($i=0,$count=count($danhmucthuoctinh);$i<$count;$i++){ ?>
			<h3><?php echo $danhmucthuoctinh[$i]['ten'];?></h3>
				
		<?php for($j=0,$countj=count($thuoctinh);$j<$countj;$j++){ if($thuoctinh[$j]['id_danhmuc']==$danhmucthuoctinh[$i]['id']){;?>
		<div style='width:200px; float:left;' >
		<input type='checkbox' name='thuoctinh<?php echo $thuoctinh[$j]['id'];?>' 
        value='<?php echo $thuoctinh[$j]['id'];?>' <?php if(in_array($thuoctinh[$j]['id'],$itemthuoctinh)){
		echo "checked";}?>/><?php echo $thuoctinh[$j]['ten'];?> 
		<?php if(in_array($thuoctinh[$j]['id'],$itemthuoctinh)){?> 
		<a style="padding-left:5px;" href="index.php?com=hinhsp&act=man_photo&id_sp=<? echo @$item['id']?>&id_mau=<?php echo $thuoctinh[$j]['id'];?>" > |  nhập hình </a>
        
        <?php }?> 
		</div>
		<?php }} ?>
		<div style='clear:both;'></div>
		<?php } ?>
	</div>
    <b>Giá</b> <input type="text" name="gia" value="<?=@$item['gia']?>" class="input" /><br /> 
    <b>Mã sp</b> <input type="text" name="kichthuoc" value="<?=@$item['kichthuoc']?>" class="input" /><br /> 
   
	
    <b>Mô tả</b><br/>
	<div>
	 <textarea class="mota" name="mota" id="mota"><?=@$item['mota']?></textarea></div> <br/>  

     
    <b>Nội dung</b><br/>
	<div>
	  <textarea name="noidung" id="noidung"><?=@stripslashes($item['noidung'])?></textarea></div> <br/>  
     <script language="javascript">CKEDITOR.replace('noidung');</script> 
     
     
    <b>Title</b>
	<div><textarea name="title" id="title"><?=@$item['title']?></textarea></div><br/>   
     
    <b>Keyword</b>
	<div><textarea name="keyword" id="keyword"><?=@$item['keyword']?></textarea></div><br/> 
    
    <b>Description</b>
	<div><textarea name="description" id="description"><?=@$item['description']?></textarea></div><br/>             
      
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

    <b>Nổi bật </b> <input type="checkbox" name="noibat" <?=( $item['noibat']==1)?'checked="checked"':''?> /><br /> 
       
   
	<b>Hiển thị </b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /><br />
 </div> 
 <div id='tab2' class='' > 
		<b>Tên sản phẩm</b> <input type="text" name="ten_sd" value="<?=@$item['ten_sd']?>" class="input" /><br /> 
   
		<b>Mô tả</b><br/>
		<div>
		<textarea class="mota"  name="mota_sd" id="mota_sd"><?=@$item['mota_sd']?></textarea></div> <br/> <b>Nội dung</b><br/>
		<div>
		<textarea name="noidung_sd" id="noidung_sd"><?=@stripslashes($item['noidung_sd'])?></textarea></div> <br/>   
		<script language="javascript">CKEDITOR.replace('noidung_sd');</script>  </div>
 <div id='tab3' class='' > 
		<b>Tên sản phẩm</b> <input type="text" name="ten_rd" value="<?=@$item['ten_rd']?>" class="input" /><br /> 
   
		<b>Mô tả</b><br/>
		<div>
		<textarea class="mota"  name="mota_rd" id="mota_rd"><?=@$item['mota_rd']?></textarea></div> <br/> <b>Nội dung</b><br/>
		<div>
		<textarea name="noidung_rd" id="noidung_rd"><?=@stripslashes($item['noidung_rd'])?></textarea></div> <br/>   
		<script language="javascript">CKEDITOR.replace('noidung_rd');</script>  </div>
 
 
 
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" name='save' value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man'" class="btn" />
</form>
</div>