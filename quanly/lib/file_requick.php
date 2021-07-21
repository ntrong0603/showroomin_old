<?php
    $com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
    $act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
    $d = new database($config['database']);
    
    
    switch($com)
    {
        
        case 'reviews':
            $source = "review";
            $template = "review";
            break;	

        case 'user':
            $source = "user";
            $template = "index";
            break;	

        case 'reviews':
            $source = "review";
            $template = "review";
            break;	

    

        case 'gio-hang':
            $source = "gio-hang";
            $template = "gio-hang";
            break;	

            
        case 'quan-tri':
            $id_com = (isset($_REQUEST['id_com'])) ? addslashes($_REQUEST['id_com']) : "";
            if($id_com =='sua-thong-tin-user'){
                $source = "suathongtinuser";
                $template = "suathongtinuser";
                }
                
            elseif($id_com =='doi-mat-khau'){
                $source = "doimatkhau";
                $template = "doimatkhau";
                }
            elseif($id_com =='cac-tin-tuc'){
                $source = "cactintuc";
                $template = "cactintuc";
                }
            else{
                $source = "quantri";
                $template = "quantri";
            }
            break;
            
        
            
        case 'dang-tin':
            $id = (isset($_REQUEST['id'])) ? addslashes($_REQUEST['id']) : "";
            if($id != ''){
                $source = "suatin";
                $template = "suatin";
                }
            else{
                $source = "dang-tin";
                $template = "dang-tin";
            }
            break;
        

    
            
        case 'thanh-toan':
            $source = "thanh-toan";
            $template = "thanh-toan";
            break;	
    
        case 'thanh-toan-nhanh':
            $source = "thanhtoannhanh";
            
            break;
            
        case 'file-upload':
            $source = "upload";
            $template = "upload";
            break;
                
        case 'search':
            $source = "search";
            $template = "search";
            break;
            
        
        case 'contacts':
            $source = "contact";
            $template = "contact";
            break;
        
        case 'place':
            $source = "place";
            if( isset( $_GET['tinh'] ) ){
                $template ='place-detail';
            }else{
            $template ="place";
            
            }
            break;
        
        case 'tin-tuc':
            $source = "tin-tuc";
            if( isset( $_GET['id'] ) ){
                $template ='tin-tuc-detail';
            }else{
            $template ="tin-tuc";
            
            }
            $loaitin='tin-tuc';
            break;
        
    
        
        case 'danh-gia':
                    $source = "tin-tuc";
                    $template = "danh-gia";

                    $loaitin='danh-gia';
                    break;
                    
        case 'thuong-hieu-noi-that':
            $source = "thuong-hieu-noi-that";
            $template = "thuong-hieu-noi-that";
            break;

        case 'ngonngu':
            if(isset($_GET['lang'])){
                if($_GET['lang']=='st'){
                    $_SESSION['lang']="";
                    
                    }
                if($_GET['lang']=='sd'){
                    $_SESSION['lang']="_sd";
                    
                    }
                if($_GET['lang']=='rd'){
                    $_SESSION['lang']="_rd";
                
                    }
                }
                
            else{
            $_SESSION['lang'] = '';
            }
            echo '<script language="javascript">history.go(-1)</script>';
            break;				
        
                                        
        default: 
            $source = "index";
            $template = "index";
            break;
    }
    /*
    if( $com!='' and $template=='index' ){
        if( isset( $_GET['id'] ) ){
            $tam=explode("-",$_GET['id']);
            $_GET['id']=end($tam);
            $first= substr($_GET['id'],0,3);
            $_GET['id']=str_replace($first,'',$_GET['id']);
                
            switch($first)
            {
                
                case 'dan':
                    $table = "duan";
                    $source='duan';
                    $template='place-detail';
                    break;	
                case 'ndb':
                    $table = "place";
                    $source='place';
                    $template='nha-dat-ban-detail';
                    break;	
                case 'ndt':
                    $table = "place";
                    $source='place';
                    $template='nha-dat-ban-detail';
                    break;	
                default: 
                    $table = "";
                    $source='index';
                    $template='index';
                    break;
            }
                
            
        }
    
    }// enđ if template !='' */
    
    include_once _source."basic.php";
    
    
    if($source!="") include _source.$source.".php";
    
    if(isset( $_REQUEST['com'] ) and $_REQUEST['com']=='thoat')
    {
        unset($_SESSION['user']);
        echo '<script language="javascript">history.go(-1)</script>';
    }
    

    $sql_title = "select ten,description,keywords from #_title limit 0,1";
    $d->query($sql_title);
    $row_title= $d->fetch_array();
    #  lay meta tim kiem
