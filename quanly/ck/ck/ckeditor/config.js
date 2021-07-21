/* 
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved. 
For licensing, see LICENSE.html or http://ckeditor.com/license 
*/ 

CKEDITOR.editorConfig = function( config ) 
{ 
        // Define changes to default configuration here. For example: 
    config.language = 'en'; 
     
        // config.uiColor = '#AADC6E'; 
         
        config.toolbar_Full = [ 
            ['Source','-','Save','NewPage','Preview','-','Templates'], 
            ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'], 
            ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'], 
            '/', 
            ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'], 
            ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'], 
            ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'], 
            ['BidiLtr', 'BidiRtl' ], 
            ['Link','Unlink','Anchor'], 
            ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'], 
            '/', 
            ['Styles','Format','Font','FontSize'], 
            ['TextColor','BGColor'], 
            ['Maximize', 'ShowBlocks','-','About'] 
            ]; 
         
        config.entities = false; 
        //config.entities_latin = false; 
         
		
        config.filebrowserBrowseUrl ='./ck/ck/ckfinder/ckfinder.html'; 

        config.filebrowserImageBrowseUrl ='./ck/ck/ckfinder/ckfinder.html?type=Images'; 

        config.filebrowserFlashBrowseUrl ='./ck/ck/ckfinder/ckfinder.html?type=Flash'; 

        config.filebrowserUploadUrl = './ck/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'; 

        config.filebrowserImageUploadUrl = './ck/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'; 

        config.filebrowserFlashUploadUrl ='./ck/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'; 

};  