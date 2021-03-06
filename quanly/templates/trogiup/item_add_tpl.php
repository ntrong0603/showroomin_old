<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung,mota",
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

<?php if ($_REQUEST['act']=='edit') { ?> <h3>S???a tin t???c tr??? gi??p</h3> <?php }else{ ?><h3>Th??m tin t???c tr??? gi??p</h3><?php } ?>
<?php
function get_main_item()
	{
		$sql_huyen="select * from table_trogiup_item order by stt,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_item" name="id_item"">
			<option value="0">Ch???n danh m???c</option>
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
<form name="frm" method="post" action="index.php?com=trogiup&act=save" enctype="multipart/form-data" class="nhaplieu">
	
    
    <?php if (@$_REQUEST['act']=='edit') { ?>
	<b>H??nh hi???n t???i:</b><img src="<?php echo _upload_tintuc.$item['photo']?>" alt="NO PHOTO"  width="200"/><br />
	<?php }?><br />
    
	<b>H??nh ???nh:</b> <input type="file" name="file" /><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Width:170px &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Height:130px  <?php echo _hinhanh_type?></strong><br /><br />
    
	<b>Ti??u ?????</b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /><br />
    	
	<b>M?? t???</b><br/>
	<div><textarea name="mota" id="mota"><?php echo @$item['mota']?></textarea></div><br/>
	
	<b>N???i dung</b><br/>
	<div> <textarea name="noidung" id="noidung"><?php echo @stripslashes($item['noidung'])?></textarea></div> <br/>  
     <script language="javascript">CKEDITOR.replace('noidung');</script> <br/>
     <b>Keyword</b><br/>
	<div><textarea name="keyword" id="keyword"><?php echo @$item['keyword']?></textarea></div><br/> 
    
    <b>Description</b><br/>
	<div><textarea name="description" id="description"><?php echo @$item['description']?></textarea></div><br/> 
	
	<b>S??? th??? t???</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br><br/>
	
    <b>N???i b???t</b> <input type="checkbox" name="noibat" <?php echo ($item['noibat']==1)?'checked="checked"':''?>><br />
    
	<b>Hi???n th???</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="L??u" class="btn" />
	<input type="button" value="Tho??t" onclick="javascript:window.location='index.php?com=trogiup&act=man'" class="btn" />
</form>