<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
    case "man_photo":
        get_photos();
        $template = "qlkhachhang/qlkhachhang";
        break;
    case "add_photo":
        $template = "qlkhachhang/qlkhachhang_add";
        break;
    case "edit_photo":
        get_photo();
        $template = "qlkhachhang/qlkhachhang_edit";
        break;
    case "save_photo":
        save_photo();
        break;
    case "delete_photo":
        delete_photo();
        break;
    default:
        $template = "index";
}

function fns_Rand_digit($min,$max,$num)
{
    $result='';
    for($i=0;$i<$num;$i++){
        $result.=rand($min,$max);
    }
    return $result;
}

function get_photos(){
    global $d, $items, $paging;

    $d->setTable('qlkhachhang');
    $d->select('*');
    $d->query();
    $items = $d->result_array();
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url="index.php?com=qlkhachhang&act=man_photo";
    $maxR=10;
    $maxP=4;
    $paging=paging($items, $url, $curPage, $maxR, $maxP);
    $items=$paging['source'];

}

function get_photo(){
    global $d, $item, $list_cat;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if(!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=qlkhachhang&act=man_photo");
    $d->setTable('qlkhachhang');
    $d->setWhere('id', $id);
    $d->select();
    if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=qlkhachhang&act=man_photo");
    $item = $d->fetch_array();
}

function save_photo(){
    global $d;
    $file_name=fns_Rand_digit(0,9,8);

    $ext = end(explode('.',$_FILES['file']['name']));
    $name2 = basename($_FILES['file']['name'], '.'.$ext);
    $name_file=changeTitle($name2.$file_name);

    if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=qlkhachhang&act=man_photo");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if($id){
        if($photo = upload_image("file", 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$name_file)){
            $data['photo'] = $photo;
            $d->setTable('qlkhachhang');
            $d->setWhere('id', $id);
            $d->select();
            if($d->num_rows()>0){
                $row = $d->fetch_array();
                delete_file(_upload_hinhanh.$row['photo']);
            }
        }

        $data['stt'] = $_POST['stt'];
        $data['ten'] = chuanhoa($_POST['ten']);
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $d->reset();
        $d->setTable('qlkhachhang');
        $d->setWhere('id', $id);
        if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=qlkhachhang&act=man_photo");
        redirect("index.php?com=qlkhachhang&act=man_photo");

    }{ 			for($i=0; $i<5; $i++){
        if($data['photo'] = upload_image("file".$i, 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$name_file.$i))
        {

            $data['stt'] = $_POST['stt'.$i];
            $data['ten'] = $_POST['ten'.$i];
            $data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;
            $d->setTable('qlkhachhang');
            if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=qlkhachhang&act=man_photo");
        }
    }

        redirect("index.php?com=qlkhachhang&act=man_photo");
    }
}

function delete_photo(){
    global $d;
    if(isset($_GET['id'])){
        $id =  themdau($_GET['id']);
        $d->setTable('qlkhachhang');
        $d->setWhere('id', $id);
        $d->select();
        if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=qlkhachhang&act=man_photo");
        $row = $d->fetch_array();
        delete_file(_upload_hinhanh.$row['photo']);
        if($d->delete())
            redirect("index.php?com=qlkhachhang&act=man_photo");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=qlkhachhang&act=man_photo");
    }elseif (isset($_GET['listid'])==true){
        $listid = explode(",",$_GET['listid']);
        for ($i=0 ; $i<count($listid) ; $i++){
            $idTin=$listid[$i];
            $id =  themdau($idTin);
            $d->reset();
            $sql = "select * from #_qlkhachhang where id='".$id."'";
            $d->query($sql);
            if($d->num_rows()>0){
                while($row = $d->fetch_array()){
                    delete_file(_upload_hinhanh.$row['photo']);
                }
                $sql = "delete from #_qlkhachhang where id='".$id."'";
                $d->query($sql);
            }

        } redirect("index.php?com=qlkhachhang&act=man_photo");} else transfer("Không nhận được dữ liệu", "index.php?com=qlkhachhang&act=man_photo");
}

?>


