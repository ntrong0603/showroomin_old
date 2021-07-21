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
<!--<script language="javascript">				
	function select_onchange()
	{			
		var a=document.getElementById("id_danhmuc");
		window.location ="index.php?com=news&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value;	
		return true;
	}
	function select_onchange1()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		window.location ="index.php?com=news&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value+"&id_list="+b.value;	
		return true;
	}
	function select_onchange2()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		var c=document.getElementById("id_cat");
		window.location ="index.php?com=news&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value+"&id_list="+b.value+"&id_cat="+c.value;	
		return true;
	}

	
</script>
<?php
function get_main_danhmuc()
	{
		$sql="select * from table_news_danhmuc order by stt";
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
		$sql="select * from table_news_list where id_danhmuc=".$_REQUEST['id_danhmuc']."  order by stt";
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
		$sql="select * from table_news_cat where id_list=".$_REQUEST['id_list']." order by stt";
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
		$sql_huyen="select * from table_news_item where id_cat=".$_REQUEST['id_cat']." order by id desc ";
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
	
?>-->
<div class="product">
			<div class="title" id="tabs">
				<a href="#" class="set number" title="tab1" style="display:block;width:120px;"><p> <?php echo $ngonngu1;?></p></a>
				<?php if($langnum >=2){?><a href="#" class=" number" title="tab2"style="	display:block;width:170px;"><p><?php echo $ngonngu2;?></p></a><?php } ?>
				<?php if($langnum >=3){?><a href="#" class=" number" title="tab3"style="	display:block;width:170px;"><p><?php echo $ngonngu3;?></p></a><?php } ?>
			</div>
<form name="frm" method="post" action="index.php?com=news&loaitin=<?php echo $_GET['loaitin'] ?>&id_place=<?php echo $_GET['id_place'] ?>&act=save" enctype="multipart/form-data" class="nhaplieu">
	


    <?php 	if( $loaitin=='video' ){ ?>

        </br>

        <b>Tên <?php echo $menu[$loaitin]['ten'] ?></b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br />
         <b>Tên tiếng Anh <?php echo $menu[$loaitin]['ten'] ?></b> <input type="text" name="ten_sd" value="<?=@$item['ten_sd']?>" class="input" /><br />
        <?php

        if ( isset( $_REQUEST['act'] ) and $_REQUEST['act']=='edit'  )
        {?>
            <b>Hình ảnh:</b><img src="<?=_upload_tintuc.$item['thumb']?>"  alt="NO PHOTO" width="200px;" /><br />
        <?php }?>
        <b>Chọn hình:</b> <input type="file" name="file" /> ____800x450_____<?=_news_type?><br />
        <br />
        <b>Link nhúng youtube</b> https://www.youtube.com/watch?v=<strong style='color: red;'>uvUu77Hf18E</strong><br/>
        <div> <textarea class="mota" name="mota" id="mota"><?=@$item['mota']?></textarea></div> <br/><br />

        <b>Hiển thị </b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /><br />
        </br>
    <?php }else { ?>

        <div id='tab1' class='tab_content' >
    <!--<?php if ($capmenu>=1){ ?> <b>Danh mục cấp 1:</b><?=get_main_danhmuc();?><br /><br /><?php } ?>
    <?php if ($capmenu>=2){ ?> <b>Danh mục cấp 2:</b><?=get_main_list();?><br /><br /><?php } ?>
    <?php if ($capmenu>=3){ ?> <b>Danh mục cấp 3:</b><?=get_main_category();?><br /><br /><?php } ?>
    <?php if ($capmenu>=4){ ?> <b>Danh mục cấp 4:</b><?=get_main_item();?><br /><br /><?php } ?>
    <b>Hình ảnh:</b><img src="<?=_upload_tintuc.$item['thumb']?>"  alt="NO PHOTO" width="160px;" /><br />-->
    <!--<?php $cfn = $menu[$_GET['loaitin']];?>
    <b>Chọn hình:</b> <input type="file" name="file" /> ____800x450_____<?=_news_type?><br />
    <br />
   <?php if ($loaitin =='catalog' ){
		if ( isset( $_REQUEST['act'] ) and $_REQUEST['act']=='edit'  )
		{?>
			<b>File hiện tại:</b><?=_upload_tintuc.$item['urlfile']?><br />
		<?php }?>
		<b>Chọn file:</b> <input type="file" name="file2" /> pdf | doc | docx<br />
		
    <?php }?>-->
    
    

    <input type="hidden" name="id_place" value="<?php echo $_GET['id_place'] ?>" class="input" />
    <input type="hidden" name="loaitin" value="<?php echo $_GET['loaitin'] ?>" class="input" />
	<b>Tên <?php echo $menu[$loaitin]['ten'] ?></b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br /> 
	<b>Tên không dấu </b> <input type="text" name="tenkhongdau" value="<?=@$item['tenkhongdau']?>" class="input" /><br /> 
   
	
    <!--<b>Mô tả</b><br/>
	<div> <textarea class="mota" name="mota" id="mota"><?=@$item['mota']?></textarea></div> <br/> 
	<script language="javascript">CKEDITOR.replace('mota');</script>  <br/>-->
	
	<b>Nội dung</b><br/>
	<div>
	<textarea name="noidung" id="noidung"><?=@stripslashes($item['noidung'])?></textarea></div> <br/>  
    <script language="javascript">CKEDITOR.replace('noidung');</script>  <br/>   
     
    <!--<b>Title</b>
	<div><textarea name="title" id="title"><?=@$item['title']?></textarea></div><br/>   
     
    <b>Keyword</b>
	<div><textarea name="keyword" id="keyword"><?=@$item['keyword']?></textarea></div><br/> 
    
    <b>Description</b>
	<div><textarea name="description" id="description"><?=@$item['description']?></textarea></div><br/>             
     -->
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

    <b>Nổi bật </b> <input type="checkbox" name="noibat" <?=( $item['noibat']==1)?'checked="checked"':''?> /><br /> 
    <b>Hiển thị dịch vụ </b> <input type="checkbox" name="hot" <?=( $item['hot']==1)?'checked="checked"':''?> /><br /> 
       
   
	<b>Hiển thị </b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /><br />
    <b>Tự lấy ảnh </b> <input type="checkbox" name="qhack"  /><br />
</div> 
<?php if ($langnum >= 2):?>
 <div id='tab2' class='tab_content' > 
		<b>Tên tin tức</b> <input type="text" name="ten_sd" value="<?=@$item['ten_sd']?>" class="input" /><br /> 
   		<b>Tên không dấu </b> <input type="text" name="tenkhongdau_sd" value="<?=@$item['tenkhongdau_sd']?>" class="input" /><br /> 
		<b>Mô tả</b><br/>
		<div>
		
		<textarea class="mota"  name="mota_sd" id="mota_sd"><?=@$item['mota_sd']?></textarea></div> <br/> 
		<script language="javascript">CKEDITOR.replace('mota_sd');</script>
		
		<b>Nội dung</b><br/>
		<div>
		<textarea name="noidung_sd" id="noidung_sd"><?=@stripslashes($item['noidung_sd'])?></textarea></div> <br/>   
		<script language="javascript">CKEDITOR.replace('noidung_sd');</script>  </div>
<?php endif;?>
<?php if ($langnum >=3): ?> 
 <div id='tab3' class='tab_content' > 
		<b>Tên tin tức</b> <input type="text" name="ten_rd" value="<?=@$item['ten_rd']?>" class="input" /><br /> 
   
		<b>Mô tả</b><br/>
		<div>
		<textarea class="mota"  name="mota_rd" id="mota_rd"><?=@$item['mota_rd']?></textarea></div> <br/> <b>Nội dung</b><br/>
		<div>
		<textarea name="noidung_rd" id="noidung_rd"><?=@stripslashes($item['noidung_rd'])?></textarea></div> <br/>   
		<script language="javascript">CKEDITOR.replace('noidung_rd');</script>  </div>


<?php endif;?>
    <?php } ?>
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