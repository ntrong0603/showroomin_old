<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung",
		theme : "advanced",
		convert_urls : false,
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,imagemanager,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
height:"500px",
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

<?php if ($_REQUEST['act']=='edit') { ?> <h3>Sửa quảng cáo ảnh index (NHẬP HÌNH ĐÚNG KÍCH THƯỚT )</h3> <?php }else{ ?><h3>Thêm tin tức về chúng tôi</h3><?php } ?>
<?php
function get_main_item()
	{
		$sql_huyen="select * from table_sliderindex_item order by stt,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_item" name="id_item"">
			<option value="0">Chọn danh mục</option>
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
<form name="frm" method="post" action="index.php?com=sliderindex&act=save" enctype="multipart/form-data" class="nhaplieu">
	
    
    <?php if (@$_REQUEST['act']=='edit') { ?>
	<b>Quảng cáo trái:</b><img src="<?php echo _upload_tintuc.$item['photo']?>" alt="NO PHOTO"  width="434"/><br />
	<?php }?><br />
    
	<b>Hình ảnh:</b> <input type="file" name="file" /><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Width:434px &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Height:600px  <?php echo _hinhanh_type?></strong><br /><br />
    
    
    <?php if (@$_REQUEST['act']=='edit') { ?>
	<b>Quảng cáo giữa trên: </b><img src="<?php echo _upload_tintuc.$item['cogai']?>" alt="NO PHOTO"  width="492"/><br />
	<?php }?><br />
    
	<b>Hình ảnh:</b> <input type="file" name="file2" /><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Width:492px &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Height:292px  <?php echo _hinhanh_type?></strong><br /><br />
    
    
    <?php if (@$_REQUEST['act']=='edit') { ?>
	<b>Quảng cáo giữa dưới:</b><img src="<?php echo _upload_tintuc.$item['sanpham']?>" alt="NO PHOTO"  width="492"/><br />
	<?php }?><br />
    
	<b>Hình ảnh:</b> <input type="file" name="file3" /><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Width:492px &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Height:255px  <?php echo _hinhanh_type?></strong><br /><br />
    
    <?php if (@$_REQUEST['act']=='edit') { ?>
	<b>Quản cáo:</b><img src="<?php echo _upload_tintuc.$item['sanpham2']?>" alt="NO PHOTO"  width="415"/><br />
	<?php }?><br />
    
	<b>Hình ảnh:</b> <input type="file" name="file4" /><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Width:415px &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Height:600px  <?php echo _hinhanh_type?></strong><br /><br />
    
    
	<b>Tiêu đề (vi)</b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /><br />
    <b>Tiêu đề (en)</b> <input type="text" name="ten_sd" value="<?php echo @$item['ten_sd']?>" class="input" /><br /><br />
    
    <b>Link</b> <input type="text" name="link" value="<?php echo @$item['link']?>" class="input" /><br /><br />
   
	
	
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=sliderindex&act=man'" class="btn" />
</form>