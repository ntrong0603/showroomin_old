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

<div class="place">
			<div class="title" id="tabs">
				<a href="#" class="set number" title="tab1" style="display:block;width:120px;"><p> <?php echo $ngonngu1;?></p></a>
				<?php if($langnum >=2){?><a href="#" class=" number" title="tab2"style="	display:block;width:170px;"><p>
				<?php echo $ngonngu2;?></p></a><?php } ?>
				<?php if($langnum >=3){?><a href="#" class=" number" title="tab3"style="	display:block;width:170px;"><p><?php echo $ngonngu3;?></p></a><?php } ?>
			</div>
<form name="frm" method="post" action="index.php?com=baiviet&act=capnhat&loaitin=<?php echo $_GET['loaitin'];?>" enctype="multipart/form-data" class="nhaplieu">	 
	 <div id='tab1' class='' > 
	
<?php /*
    <?php if ( isset( $_REQUEST['act'] ) and $_REQUEST['act']=='edit')
	{?>
	<b>Hình ảnh:</b><img src="<?php echo _upload_tintuc.$item['thumb']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn hình:</b> <input type="file" name="file" /> <br />
    <br />
    
    

    
	
	<b>Link</b> <input type="text" name="tenkhongdau" value="<?php echo @$item['tenkhongdau']?>" class="input" /><br /> 
  
    <b>Mã sp: </b> <input type="text" name="maso" value="<?php echo @$item['maso']?>" class="input" /><br />    
    
    <b>Giá</b> <input type="text" name="gia" value="<?php echo @$item['gia']?>" class="input" /><br /> 
	
    <b>Mô tả</b><br/>
	<div> <textarea class="mota" name="mota" id="mota"><?php echo @$item['mota']?></textarea></div> <br/> */?>
    <b>Tên </b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /> 

	<b>url</b> <input type="text" name="tenkhongdau" value="<?php echo @$item['tenkhongdau']?>" class="input" /><br /> 	
    <b>Nội dung</b><br/>
	<div>
	  <textarea name="noidung" id="noidung"><?php echo @stripslashes($item['noidung'])?></textarea></div> <br/>  
     <script language="javascript">CKEDITOR.replace('noidung');</script>  <br/>   
     
    <b>Title</b>
	<div><textarea name="title" id="title"><?php echo @$item['title']?></textarea></div><br/>   
     
    <b>Keyword</b>
	<div><textarea name="keywords" id="keyword"><?php echo @$item['keywords']?></textarea></div><br/> 
    
    <b>Description</b>
	<div><textarea name="description" id="description"><?php echo @$item['description']?></textarea></div><br/>             
     </div> 
 <div id='tab2' class='' > 
		
		 <b>Tên </b> <input type="text" name="ten_sd" value="<?php echo @$item['ten_sd']?>" class="input" /><br />  
		 
		 
		<b>Nội dung</b><br/>
		<div>
		<textarea name="noidung_sd" id="noidung_sd"><?php echo @stripslashes($item['noidung_sd'])?></textarea></div> <br/>   
		<script language="javascript">CKEDITOR.replace('noidung_sd');</script>  </div>
 <div id='tab3' class='' > 
		
		<b>Tên </b> <input type="text" name="ten_rd" value="<?php echo @$item['ten_rd']?>" class="input" /><br />   
		 
		 
		<b>Nội dung</b><br/>
		<div>
		<textarea name="noidung_rd" id="noidung_rd"><?php echo @stripslashes($item['noidung_rd'])?></textarea></div> <br/>   
		<script language="javascript">CKEDITOR.replace('noidung_rd');</script>  </div>
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" name='save' class="btn" />
</form>
</div>