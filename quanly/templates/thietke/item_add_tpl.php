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

<h3>D???ch v???</h3>

<form name="frm" method="post" action="index.php?com=thietke&act=save&curPage=<?php echo $_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
   
	
  <?php if ($_REQUEST['act']==edit)
	{?>
	<b>H??nh hi???n t???i:</b><img src="<?php echo _upload_thietke.$item['thumb']?>"  width="120" alt="NO PHOTO" /><br />
	<?php }?>
	<b>H??nh ???nh:</b> <input type="file" name="file" /> <?php echo _place_type?><br />
    <br />
    <b>T??n d???ch v???</b> <input type="text" name="ten" value="<?php echo $item['ten']?>" class="input" /><br />     
    <b>M?? t???</b> 
    <textarea name="mota" cols="100" rows="6" class="input"><?php echo $item['mota']?>
    </textarea>
    <br />     
  <b>N???i dung</b><br/>
	<div>
	 <textarea name="noidung" id="noidung"><?php echo $item['noidung']?></textarea></div>
    <br /> 
    <b>S??? th??? t???</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
    <br />  
   	<b>Hi???n th???</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="L??u" class="btn" />
	<input type="button" value="Tho??t" onclick="javascript:window.location='index.php?com=thietke&act=man'" class="btn" />
</form>