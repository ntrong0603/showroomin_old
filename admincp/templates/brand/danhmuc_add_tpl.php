<?php 
	$sodmuc=demdanhmuc(get_danhmucdacap($d,0));
?>
<script>
	// tự sinh script select box theo số lượng cấp danh mục
	<?php
		for($scdm=1;$scdm<=$sodmuc;$scdm++){
			
	?>
		function select_onchange<?php echo $scdm;?>()
		{	
			<?php 
				$url='"index.php?com=brand&act='.$_GET['act'];
				if(isset($_GET['id'])){
					$url.='&id='.$_GET['id'];
				}
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
	
	function get_main_danhmuc($d,$idparent='',$iddmuc='',$id='')
	{
		$dmuc=get_danhmucdacap($d,$idparent);
		$str='';
		for($i=0;$i<count($dmuc);$i++){
			if($id!='' && $id!=$dmuc[$i]["id"])
			{
				if($iddmuc!='' && $dmuc[$i]["id"]==$iddmuc){
					$str.='<option value='.$dmuc[$i]["id"].' selected>'.$dmuc[$i]["ten"].'</option>';	
				}
				else
				{
					$str.='<option value='.$dmuc[$i]["id"].' >'.$dmuc[$i]["ten"].'</option>';	
				}	
			}
			if($id=='')
			{
				if($iddmuc!='' && $dmuc[$i]["id"]==$iddmuc){
					$str.='<option value='.$dmuc[$i]["id"].' selected>'.$dmuc[$i]["ten"].'</option>';						}
				else
				{
					$str.='<option value='.$dmuc[$i]["id"].' >'.$dmuc[$i]["ten"].'</option>';	
				}
			}
		}
		return $str;
	}
?>
<?php if ($_REQUEST['act']=='edit_danhmuc') { ?> <h3>Sửa danh mục</h3> <?php }else{ ?><h3>Thêm danh mục</h3><?php } ?>
<form name="frm" method="post" action="index.php?com=brand&act=save_danhmuc&id=<?php echo @$item['id'];?><?php 
for($i=1;$i<=$sodmuc;$i++)
{
	echo "&id_danhmucc".$i."=".$_GET['id_danhmucc'.$i];
}
?>" enctype="multipart/form-data" class="nhaplieu">	
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
							echo get_main_danhmuc($d,$_GET['id_danhmucc'.$a],@$_GET['id_danhmucc'.$i],@$_GET['id']);
						}
					}
				?>
		</select>
		<br />
		<br />
	<?php }?>
	<b>Tên <?php echo $ngonngu1;?></b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /><br>
	<b>Link</b> <input type="text" name="tenkhongdau" value="<?php echo @$item['tenkhongdau']?>" class="input" /><br /> 
  
	<?php if($langnum >=2){?>
    <b>Tên <?php echo $ngonngu2;?> </b> <input type="text" name="ten_sd" value="<?php echo @$item['ten_sd']?>" class="input" /><br /><br>
	<?php } ?>
	<?php if($langnum >=3){?>
    <b>Tên <?php echo $ngonngu3;?> </b> <input type="text" name="ten_rd" value="<?php echo @$item['ten_rd']?>" class="input" /><br /><br>
	<?php } ?>
	
    
    <?php if ($_REQUEST['act']=='edit_danhmuc')
	{?>
	<b>Icon:</b><img src="<?php echo _upload_sanpham.$item['thumb']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn icon:</b> <input type="file" name="file" /> 90x90<br />
	 <br />
        
    <?php if ($_REQUEST['act']=='edit_danhmuc')
	{?>
	<b>Hình đại diện:</b><img src="<?php echo _upload_sanpham.$item['thumb2']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn Hình đại diện:</b> <input type="file" name="file2" /> 340x200<br />
	 <br />
    
  
    <b>Mô tả</b><br/>
	<div>
	  <textarea name="mota" class='mota' id="mota"><?php echo @stripslashes($item['mota'])?></textarea></div> 
	  <br/>  
	  <br/>  
  
  
    <b>Nội dung</b><br/>
	<div>
	  <textarea name="noidung" id="noidung"><?php echo @stripslashes($item['noidung'])?></textarea></div> <br/>  
     <script language="javascript">CKEDITOR.rebrand('noidung');</script> 

    
    <b>Title</b>
	<div><textarea name="title" id="title"><?php echo @$item['title']?></textarea></div><br/> 
    <b>Keywords</b>
	<div><textarea name="keywords" id="keyword"><?php echo @$item['keywords']?></textarea></div><br/> 
    
    <b>Description</b>
	<div><textarea name="description" id="description"><?php echo @$item['description']?></textarea></div><br/>   
    
    <b>Tags</b>
	<div><textarea name="tag" id="tag"><?php echo @$item['tag']?></textarea></div><br/>   
    
    
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
    <b>Nổi bật</b> <input type="checkbox" name="noibat" <?php echo (!isset($item['noibat']) || $item['noibat']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=brand&act=man_danhmuc'" class="btn" />
</form>