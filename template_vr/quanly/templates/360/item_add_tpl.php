<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung,mota",
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
<?php if ($_REQUEST['act']=='edit') { ?> <h3>Sửa hình 360</h3> <?php }else{ ?><h3>Thêm hình 360</h3><?php } ?>
<script language="javascript">				
	function select_onchange()
	{				
		var a=document.getElementById("id_sp");
		window.location ="index.php?com=360&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_sp="+a.value;	
		return true;
	}
	function select_onchange1()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		window.location ="index.php?com=360&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value+"&id_list="+b.value;	
		return true;
	}
	function select_onchange2()
	{				
		var a=document.getElementById("id_danhmuc");
		var b=document.getElementById("id_list");
		var c=document.getElementById("id_cat");
		window.location ="index.php?com=360&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if( isset($_REQUEST['id']) and $_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_danhmuc="+a.value+"&id_list="+b.value+"&id_cat="+c.value;	
		return true;
	}

	
</script>
<?php
function get_main_danhmuc()
	{
		$sql="select * from table_360 order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_sp" name="id_sp" onchange="select_onchange()" class="main_font">
			<option>Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_sp"]){
				$selected="selected";
				
			}
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}


	
?>
<form name="frm" method="post" action="index.php?com=360&act=save&p=<?php echo $_REQUEST['p']?>" enctype="multipart/form-data" class="nhaplieu">	 
	
	<!--<b>Danh mục 360:</b><?php echo get_main_danhmuc();?><br /><br />-->
    
    <b>Tên 1</b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /><br>
 
  <!--  <b>Link</b> <input type="text" name="link" value="<?php echo @$item['link']?>" class="input" /><br /><br>-->
	
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?php echo @$item['stt']?>" style="width:30px" />	<br />
    <?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình ảnh đại diện:</b><img src="<?php echo _upload_hinhanh.$item['thumb']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn hình:</b> <input type="file" name="file" /> png, jpeg, jpg, Rộng: <?php echo @$item['rong']?>, Cao: <?php echo @$item['cao']?><br />
    <br />
    
      <?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình ảnh 360:</b><img src="<?php echo _upload_hinhanh.$item['photo2']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn hình:</b> <input type="file" name="file2" /> png, jpeg, jpg, Rộng: <?php echo @$item['rong']?>, Cao: <?php echo @$item['cao']?><br />
    <br />
    
    

    
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=360&act=man'" class="btn" />
</form>