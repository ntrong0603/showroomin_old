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
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung,noidung_sd,noidung_rd,mota,mota_sd,mota_rd",
		theme : "advanced",
		convert_urls : false,
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,imagemanager,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
height:"300px",
    width:"100%",
	remove_script_host : false,

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<?php if ($_REQUEST['act']=='edit') { ?> <h3>Sửa thuộc tính </h3> <?php }else{ ?><h3>Thêm thuộc tính</h3><?php } ?>
<script language="javascript">				
	function select_onchange()
	{				
		var a=document.getElementById("id_danhmuc");
		window.location ="index.php?com=thuoctinh&loaitin=<?php echo $loaitin; ?>&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if(isset( $_REQUEST['id'] ) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value;	
		return true;
	}
	function select_onchange1()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		window.location ="index.php?com=thuoctinh&loaitin=<?php echo $loaitin; ?>&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if(isset( $_REQUEST['id'] ) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value+"&id_list="+b.value;	
		return true;
	}
	function select_onchange2()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		var c=document.getElementById("id_cat");
		window.location ="index.php?com=thuoctinh&loaitin=<?php echo $loaitin; ?>&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if(isset( $_REQUEST['id'] ) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value+"&id_list="+b.value+"&id_cat="+c.value;	
		return true;
	}

	
</script>
<?php
function get_main_danhmuc()
	{
		global $loaitin;
		$sql="select * from table_thuoctinh_danhmuc  where loaitin ='".$loaitin."'  order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_danhmuc" name="id_danhmuc" onchange="select_onchange()" class="main_font">
			<option>Chọn danh mục</option>			
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
		global $loaitin;
		$sql="select * from table_thuoctinh_list where loaitin='".$loaitin."'  and id_danhmuc=".$_REQUEST['id_danhmuc']."  order by stt";
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
		global $loaitin;
		$sql="select * from table_thuoctinh_cat where loaitin='".$loaitin."'  and id_list=".$_REQUEST['id_list']." order by stt";
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
		$sql_huyen="select * from table_thuoctinh_item where loaitin='".$loaitin."'  and id_cat=".$_REQUEST['id_cat']." order by id desc ";
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
<form name="frm" method="post" action="index.php?com=thuoctinh&id=<?=@$item['id']?>&loaitin=<?php echo $loaitin; ?>&act=save&p=<?=$_REQUEST['p']?>" enctype="multipart/form-data" class="nhaplieu">	 
	 <div id='tab1' class='' > 
	<b>Danh mục cấp 1:</b><?=get_main_danhmuc();?><br /><br />
    
   
    
    <?php if ( isset( $_REQUEST['act'] ) and $_REQUEST['act']=='edit')
	{?>
	<b>Hình ảnh:</b><img src="<?=_upload_tintuc.$item['thumb']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn hình:</b> <input type="file" name="file" /> <?=_thuoctinh_type?><br />
    <br />
    
    

    
	<b>Tên </b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br /> 
	<b>Link</b> <input type="text" name="tenkhongdau" value="<?=@$item['tenkhongdau']?>" class="input" /><br /> 
  
   
     
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
		<b>Tên </b> <input type="text" name="ten_sd" value="<?=@$item['ten_sd']?>" class="input" /><br /> 
   
	
		 
		
		 
 </div>
 <div id='tab3' class='' > 
		<b>Tên </b> <input type="text" name="ten_rd" value="<?=@$item['ten_rd']?>" class="input" /><br /> 
   
		
		 
		
     
 </div>
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=thuoctinh&loaitin=<?php echo $loaitin; ?>&act=man'" class="btn" />
</form>
</div>