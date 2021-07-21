<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung",
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
<?php if ($_REQUEST['act']=='edit') { ?> <h3>Sửa sản phẩm</h3> <?php }else{ ?><h3>Thêm sản phẩm</h3><?php } ?>
<script language="javascript">				
	function select_onchange()
	{				
		var a=document.getElementById("id_danhmuc");
		window.location ="index.php?com=while&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value;	
		return true;
	}
	function select_onchange1()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		window.location ="index.php?com=while&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value+"&id_list="+b.value;	
		return true;
	}
	function select_onchange2()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		var c=document.getElementById("id_cat");
		window.location ="index.php?com=while&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value+"&id_list="+b.value+"&id_cat="+c.value;	
		return true;
	}

	
</script>
<?php
function get_main_danhmuc()
	{
		$sql="select * from table_while_danhmuc order by stt";
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
		$sql="select * from table_while_list where id_danhmuc=".$_REQUEST['id_danhmuc']."  order by stt";
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
		$sql="select * from table_while_cat where id_list=".$_REQUEST['id_list']." order by stt";
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
		$sql_huyen="select * from table_while_item where id_cat=".$_REQUEST['id_cat']." order by id desc ";
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
	function get_main_tacgia()
	{
		$sql_huyen="select * from table_tacgia where hienthi =1 order by id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_tacgia" name="id_tacgia">
			<option>Chọn danh mục</option>			
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_tacgia"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	function get_main_nhaxuatban()
	{
		$sql_huyen="select * from table_nhaphathanh where hienthi =1 order by id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_nhaphathanh" name="id_nhaphathanh">
			<option>Chọn danh mục</option>			
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			
			if($row_huyen["id"]==(int)@$_REQUEST["id_nhaphathanh"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>
<form name="frm" method="post" action="index.php?com=while&act=save&p=<?php echo $_REQUEST['p']?>" enctype="multipart/form-data" class="nhaplieu">	 
	<b>Danh mục cấp 1:</b><?php echo get_main_danhmuc();?><br /><br />
    
    
    <?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình ảnh:</b><img src="<?php echo _upload_sanpham.$item['thumb']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn hình:</b> <input type="file" name="file" /> <?php echo _while_type?><br />
    <br />
    
    

    
	<b>Tên sản phẩm</b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /> 
    <b>Code: </b> <input type="text" name="maso" value="<?php echo @$item['maso']?>" class="input" /><br />    
    <b>Material: </b> <input type="text" name="chatlieu" value="<?php echo @$item['chatlieu']?>" class="input" /><br />    
    <b>Measurement: </b> <input type="text" name="measurement" value="<?php echo @$item['measurement']?>" class="input" /><br />    
    <b>Packing: </b> <input type="text" name="packing" value="<?php echo @$item['packing']?>" class="input" /><br />    
    <b>Caton size: </b> <input type="text" name="caton" value="<?php echo @$item['caton']?>" class="input" /><br />    
    <b>Load Abiliti: </b> <input type="text" name="load1" value="<?php echo @$item['load1']?>" class="input" /><br />    
    <b>Lead Time: </b> <input type="text" name="lead" value="<?php echo @$item['lead']?>" class="input" /><br />    
    <b>Price</b> <input type="text" name="gia" value="<?php echo @$item['gia']?>" class="input" /><br /> 
	
    <b>Description</b><br/>
	<div> <textarea class="mota" name="mota" id="mota"><?php echo @$item['mota']?></textarea></div> <br/> <b>Nội dung</b><br/>
	<div>
	  <textarea name="noidung" id="noidung"><?php echo @stripslashes($item['noidung'])?></textarea></div> <br/>  
     <script language="javascript">CKEDITOR.replace('noidung');</script>  <br/>     
     
      <b>Keyword</b><br/>
	<div><textarea name="keyword" id="keyword"><?php echo @$item['keyword']?></textarea></div><br/> 
    
    <b>Description</b><br/>
	<div><textarea name="description" id="description"><?php echo @$item['description']?></textarea></div><br/>             
      
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

    <b>Featured while </b> <input type="checkbox" name="noibat" <?php echo ( $item['noibat']==1)?'checked="checked"':''?> /><br /> 
    <b>Best seller </b> <input type="checkbox" name="spmoi" <?php echo ( $item['spmoi']==1)?'checked="checked"':''?> /><br />  
    <b>Over stock </b> <input type="checkbox" name="spbanchay" <?php echo ( $item['spbanchay']==1)?'checked="checked"':''?> /><br />    
   
	<b>Hiển thị </b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /><br />

	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=while&act=man'" class="btn" />
</form>