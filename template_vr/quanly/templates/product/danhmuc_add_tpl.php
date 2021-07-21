<?php 
	$d->reset();
	$sql="select * from table_place order by id desc";
	$d->query($sql);
	$showroom=$d->result_array();
?>
<?php if ($_REQUEST['act']=='edit_danhmuc') { ?> <h3>Sửa danh mục cấp 1</h3> <?php }else{ ?><h3>Thêm danh mục cấp 1</h3><?php } ?>
<form name="frm" method="post" action="index.php?com=product&act=save_danhmuc&id=<?php echo @$item['id'];?>" enctype="multipart/form-data" class="nhaplieu">	
	  	    
    <b>Tên <?php echo $ngonngu1;?></b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br /><br>
    <b>Link</b> <input type="text" name="tenkhongdau" value="<?=@$item['tenkhongdau']?>" class="input" /><br /> 
  
	<br/>
	
	<?php if($langnum >=3){?>
    <b>Tên <?php echo $ngonngu3;?> </b> <input type="text" name="ten_rd" value="<?=@$item['ten_rd']?>" class="input" /><br /><br>
	<?php } ?>
	
    
    <?php if ($_REQUEST['act']=='edit_danhmuc')
	{?>
	<b>Hình ảnh đại diện:</b><img src="../<?=_upload_sanpham.$item['thumb']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn hình đại diện:</b> <input type="file" name="file" /> ___500x200___ <?=_product_type?><br />
    <br />
	
	<?php if ($_REQUEST['act']=='edit_danhmuc')
	{?>
	<b>Icon đại diện:</b><img src="../<?=_upload_sanpham.$item['thumb_icon']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn icon đại diện:</b> <input type="file" name="file_icon" /> ___500x200___ <?=_product_type?><br />
    <br />
    
    <b>Showroom</b>
	<div><select name="id_place" class="input">
			<?php for($i=0;$i<count($showroom);$i++){ ?>
			<option value="<?php echo $showroom[$i]['id'] ?>" <?php if ($showroom[$i]['id']==$_GET['id_place']) {
				echo "selected";
			} ?> ><?php echo $showroom[$i]['ten'] ?></option>
			<?php } ?>
		</select>
	</div><br/>
	<br/>
    <b>Cảnh</b>
	<div><input type="text" name="canh" value="<?=@$item['canh']?>" class="input"></div><br/>
	<b>Tên hotspot</b>
	<div><input type="text" name="lookat" value="<?=@$item['lookat']?>" class="input"></div><br/>
	<b>Ath</b>
	<div><input type="float" name="hlookat" value="<?=@$item['hlookat']?>" class="input">Hướng tới điểm đến ngang (-180 đến +180, có thể bao quanh).</div><br/>
	<b>Atv</b>
	<div><input type="float" name="vlookat" value="<?=@$item['vlookat']?>" class="input">Hướng điểm đến thẳng đứng (-90 đến +90).</div><br/>

    <b>Title</b>
	<div><textarea name="title" id="title"><?=@$item['title']?></textarea></div><br/>  
    <b>Keyword</b>
	<div><textarea name="keyword" id="keyword"><?=@$item['keyword']?></textarea></div><br/> 
    
    <b>Description</b>
	<div><textarea name="description" id="description"><?=@$item['description']?></textarea></div><br/>   
    
    
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
    <b>Nổi bật</b> <input type="checkbox" name="noibat" <?=(!isset($item['noibat']) || $item['noibat']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man_danhmuc'" class="btn" />
</form>