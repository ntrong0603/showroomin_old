<?php    if(!defined('_source')) die("Error");

    $act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
    $urldanhmuc ="";
    $urldanhmuc.= (isset($_REQUEST['id_list'])) ? "&id_list=".addslashes($_REQUEST['id_list']) : "";
    $urldanhmuc.= (isset($_REQUEST['id_cat'])) ? "&id_cat=".addslashes($_REQUEST['id_cat']) : "";
    $urldanhmuc.= (isset($_REQUEST['id_item'])) ? "&id_item=".addslashes($_REQUEST['id_item']) : "";

    $id=$_REQUEST['id'];
    
switch($act){
    case "man":
        get_items();
        $template = "placeComments/items";
        break;

    case "save":
        save_item();
        break;
    case "edit":        
        get_item();
        $template = "placeComments/item_add";
        break;
    case "delete":
        delete_item();
        break;

        
    default:
        $template = "index";
}


function get_items(){
    global $d, $items, $paging,$urldanhmuc;

    #---------------------------------------------hien thi san pham-------------------------------------------
    if($_REQUEST['assent']!='')
    {
        $id_up = $_REQUEST['assent'];
        $sql_show = "SELECT * FROM table_place_comments where id='".$id_up."'";
        
        $d->query($sql_show);
        $cats= $d->result_array();
        $show=$cats[0]['show'];
        if($show==0)
        {
            $sqlUPDATE_ORDER = "UPDATE table_place_comments SET `show` =1 WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die(mysql_error());
        }
        else
        {
            $sqlUPDATE_ORDER = "UPDATE table_place_comments SET `show` =0  WHERE  id = ".$id_up."";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die(mysql_error());
        }    
    }
    #-------------------------------------------------------------------------------
    $sql = "select * from #_place_comments order by id DESC";
    // print_r($sql);die();
    $d->query($sql);
    $items = $d->result_array();
    
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=placeComments&act=man".$urldanhmuc;
    $maxR=20;
    $maxP=20;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];
}

function get_item(){
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if(!$id)
    transfer("Không nhận được dữ liệu", "index.php?com=placeComments&act=man");    
    $sql = "select * from #_place_comments where id='".$id."'";
    $d->query($sql);
    if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=placeComments&act=man");
    $item = $d->fetch_array();    
}


function save_item(){
    global $d;
    if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=placeComments&act=man_list");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id){
        $data['name'] = $_POST['name'];
        $data['email'] = $_POST['email'];
        $data['content'] = $_POST['content'];
        
        $d->setTable('place_comments');
        $d->setWhere('id', $id);
        if($d->update($data))
            redirect("index.php?com=placeComments&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=placeComments&act=man");
    }
}

function delete_item(){
    global $d;
    
    
    if(isset($_GET['id'])){
        $id =  themdau($_GET['id']);
        $d->reset();
        $sql = "select * from #_place_comments where id='".$id."'";
        $d->query($sql);
        if($d->num_rows()>0){
        $sql = "delete from #_place_comments where id='".$id."'";
        $d->query($sql);
        }
        if($d->query($sql))
            redirect("index.php?com=placeComments&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=place&act=man");
    }else transfer("Không nhận được dữ liệu", "index.php?com=place&act=man");
}

?>