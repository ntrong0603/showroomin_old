<script>
$(document).ready(function(){
	$('a.number').click(function(){
		var an=$('a.set').attr('title');
		$('div#'+an).hide();
		$('a.set').removeClass('set');
		$(this).addClass('set');
		var hien=$(this).attr('title');
		$('div#'+hien).show();
	
	});
	var hien=$('a.set').attr('title');
	$('div#'+hien).show();
});
</script>
<?php if ($_REQUEST['act']=='edit') { ?> <h3>Sửa tin tức</h3> <?php }else{ ?><h3>Thêm tin tức</h3><?php } ?>
<div class="product">
			<div class="title" id="tabs">
				<a href="#" class="set number" title="tab1" style="display:block;width:120px;"><p> <?php echo $ngonngu1;?></p></a>
				<?php if($langnum >=2){?><a href="#" class=" number" title="tab2"style="	display:block;width:170px;"><p><?php echo $ngonngu2;?></p></a><?php } ?>
				<?php if($langnum >=3){?><a href="#" class=" number" title="tab3"style="	display:block;width:170px;"><p><?php echo $ngonngu3;?></p></a><?php } ?>
			</div>
<form name="frm" method="post" action="index.php?com=nhanxetkh&act=save" enctype="multipart/form-data" class="nhaplieu">

        <div id='tab1' class='tab_content' >
    <b>Hình ảnh:</b><img src="<?=_upload_tintuc.$item['photo']?>"  alt="NO PHOTO" width="160px;" /><br />
    <?php $cfn = $menu[$_GET['loaitin']];?>
    <b>Chọn hình:</b> <input type="file" name="file" /> ____<?php echo $cfn['scale']*$cfn['width'];?>x<?php echo $cfn['scale']*$cfn['height'];?>_____<?=_news_type?><br />
    <br />
   <?php if ($loaitin =='catalog' ){
		if ( isset( $_REQUEST['act'] ) and $_REQUEST['act']=='edit'  )
		{?>
			<b>File hiện tại:</b><?=_upload_tintuc.$item['urlfile']?><br />
		<?php }?>
		<b>Chọn file:</b> <input type="file" name="file2" /> pdf | doc | docx<br />
		
    <?php }?>
    
    

    
	<b>Tên khách hàng </b> <input type="text" name="tenkhach" value="<?=@$item['tenkhach']?>" class="input" /><br /> 
	<b>Tên công ty </b> <input type="text" name="tencongty" value="<?=@$item['tencongty']?>" class="input" /><br /> 
	
	<b>Nội dung</b><br/>
	<div>
	<textarea name="noidung" id="noidung"><?=@stripslashes($item['noidung'])?></textarea></div> <br/>  
    <script language="javascript">CKEDITOR.replace('noidung');</script>  <br/>           
      
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

    <b>Nổi bật </b> <input type="checkbox" name="noibat" <?=( $item['noibat']==1)?'checked="checked"':''?> /><br />   
   
	<b>Hiển thị </b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /><br />
</div> 
<?php if ($langnum >= 2):?>
 <div id='tab2' class='tab_content' > 
		<b>Tên khách hàng</b> <input type="text" name="tenkhach_sd" value="<?=@$item['tenkhach_sd']?>" class="input" /><br /> 
   		<b>Tên công ty </b> <input type="text" name="tencongty_sd" value="<?=@$item['tencongty_sd']?>" class="input" /><br /> 

		<b>Nội dung</b><br/>
		<div>
		<textarea name="noidung_sd" id="noidung_sd"><?=@stripslashes($item['noidung_sd'])?></textarea></div> <br/>   
		<script language="javascript">CKEDITOR.replace('noidung_sd');</script>  </div>
<?php endif;?>
<?php if ($langnum >=3): ?> 
 <div id='tab3' class='tab_content' > 
 		<b>Tên khách hàng</b> <input type="text" name="tenkhach_rd" value="<?=@$item['tenkhach_rd']?>" class="input" /><br /> 
   		<b>Tên công ty </b> <input type="text" name="tencongty_rdd" value="<?=@$item['tencongty_rd']?>" class="input" /><br /> 
		<b>Nội dung</b><br/>
		<div>
		<textarea name="noidung_rd" id="noidung_rd"><?=@stripslashes($item['noidung_rd'])?></textarea></div> <br/>   
		<script language="javascript">CKEDITOR.replace('noidung_rd');</script>  </div>


<?php endif;?>

	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
</form>
</div>

<style>
	.tab_content {
		display:none;
	}
	
	.product {
		padding:0px;
		border:1px solid black;
		margin-top:40px;
		background: #fff;
	}
	
	a.number {
		border-top:1px solid black;
		border-left:1px solid black;
		border-right:1px solid black;
		border-radius:10px 10px 0px 0px;
		margin-top: -30px;
		background: #fff;
		cursor:pointer;
		margin-left:5px;
		line-height:27px;
		text-align:center;
		margin-bottom:20px;
	}
	
	a.number p{
		margin:0px;
	}
	
	.title {
		height:0px;	
	}
</style>