<?php
@define('_lib', './../quanly/lib/');
include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "library.php";
include_once _lib . "class.database.php";
$d = new database($config['database']);
$db = $d->db;
function showtentinh($id, $table)
{
    global $db;
    $result = '';
    if ($table == 'huyen') {

        $sql_place = "select id_danhmuc from table_tinhthanh_list where id =" . $id;
        $tam = mysqli_query($db, $sql_place);
        $huyen = mysqli_fetch_array($tam);

        $sql_place = "select * from table_tinhthanh_danhmuc where id =" . $huyen['id_danhmuc'];
        $tam = mysqli_query($db, $sql_place);
        $tinh = mysqli_fetch_array($tam);
        $result = $tinh['ten'];
    }
    if ($table == 'duong') {

        $sql_place = "select id_tinh from table_place where id =" . $id;
        $tam = mysqli_query($db, $sql_place);
        $place = mysqli_fetch_array($tam);

        $sql_place = "select * from table_tinhthanh_danhmuc where id =" . $place['id_tinh'];
        $tam = mysqli_query($db, $sql_place);
        $tinh = mysqli_fetch_array($tam);
        $result = $tinh['ten'];
    }
    return $result;
}
$result = '';
$str = trim($_GET['diadiem']);


$tam = explode('-', $_GET['result']);

$where_cate = '';
$where_place = '';
$where_pcate = '';
if ($_GET['cate'] == 'cate') {
    $d->query("select id from table_place where id_danhmuc=" . $_GET['cate_id']);
    $tamp = $d->result_array();
    $array_cate = "999999999,999999998";
    for ($i = 0; $i < count($tamp); $i++) {
        $array_cate .= "," . $tamp[$i]['id'];
    }
    $where_cate = " and id_place in (" . $array_cate . ") ";
    $where_place = " and id in (" . $array_cate . ") ";
}

if ($_GET['cate'] == 'pcate') {
    $d->query("select id from table_product where id_danhmuc=" . $_GET['cate_id']);
    $tamp = $d->result_array();
    $array_pcate = "0";
    for ($i = 0; $i < count($tamp); $i++) {
        $array_pcate .= "," . $tamp[$i]['id'];
    }

    $where_pcate = " and id in (" . $array_pcate . ") ";
}
//***************FIND*************************
//  Category   Place



if (in_array('c', $tam)) {

    $sql_cate = "select * from table_place_category where ten like '%" . $str . "%' limit 5";

    $cate = mysqli_query($db, $sql_cate);
    $arrdiadiem = array();
    while ($row = mysqli_fetch_array($cate)) {

        $result .= '<li class="item-atc" cate="cate"><a id="aautocom" value="' . $row['id'] . '"  alt="' . $row['ten'] . '"  onclick="laydiadiem(this)"><span class="dm phongcach">Phong cách </span>' . $row['ten'] . '</a><div class="clearfix"></div></li>';
    }

    //  Category Product  	
    $sql_cate = "select  * from table_product_danhmuc where ten like '%" . $str . "%' " . $where_cate . "  limit 5";

    $cate = mysqli_query($db, $sql_cate);
    $arrdiadiem = array();
    while ($row = mysqli_fetch_array($cate)) {
        $sql_place = "select * from table_place where id =" . $row['id_place'];

        $tam = mysqli_query($db, $sql_place);
        $place = mysqli_fetch_array($tam);
        $result .= '<li class="item-atc" cate="pcate"><a id="aautocom" class="achiadong" value="' . $row['id'] . '"  alt="' . $row['ten'] . '"  onclick="laydiadiem(this)"><span class="dm danhmuc">Danh mục </span><span class="divchiadong"><div>' . $row['ten'] . '</div> <span class="pdanhmuc">' . $place['ten'] . '</span></span></a><div class="clearfix"></div></li>';
    }
}


if (in_array('p', $tam)) {


    //  Category Product  	
    $sql_cate = "select  * from table_product_danhmuc where ten like '%" . $str . "%' " . $where_cate . "  limit 5";

    $cate = mysqli_query($db, $sql_cate);
    $arrdiadiem = array();
    while ($row = mysqli_fetch_array($cate)) {
        $sql_place = "select * from table_place where id =" . $row['id_place'];

        $tam = mysqli_query($db, $sql_place);
        $place = mysqli_fetch_array($tam);
        $result .= '<li class="item-atc" cate="pcate"><a id="aautocom" class="achiadong" value="' . $row['id'] . '"  alt="' . $row['ten'] . '"  onclick="laydiadiem3(this)"><span class="dm danhmuc">Danh mục </span><span class="divchiadong"><div>' . $row['ten'] . '</div> <span class="pdanhmuc">' . $place['ten'] . '</span></span></a><div class="clearfix"></div></li>';
    }
    //  place  
    if ($_GET['cate'] != 'pcate') {
        $sql_diadiem = "select * from table_place where ten like '%" . $str . "%' " . $where_place . " limit 5";

        $diadiem = mysqli_query($db, $sql_diadiem);
        $arrdiadiem = array();
        while ($row = mysqli_fetch_array($dbiadiem)) {
            if ($row['concept'] == 0) {
                $loaiplace = "<span class='dm showroom' >Showroom </span>";
            } else {

                $loaiplace = "<span class='dm concept'>Concept </span>";
            }
            $result .= '<li class="item-atc"  cate="place"><a id="aautocom" href="place/' . get_tenkhongdau("table_tinhthanh_danhmuc", $row['id_tinh']) . '/' . $row['tenkhongdau'] . '-' . $row['id'] . '.html" >' . $loaiplace . $row['ten'] . '</a><div class="clearfix"></div></li>';
        }
    }




    //  product  
    $sql_diadiem = "select * from table_product where ten like '%" . $str . "%' " . $where_cate . "  " . $where_pcate . " limit 5";

    $diadiem = mysqli_query($db, $sql_diadiem);
    $arrdiadiem = array();
    while ($row = mysqli_fetch_array($dbiadiem)) {
        $sql_place = "select * from table_place where id =" . $row['id_place'];

        $tam = mysqli_query($db, $sql_place);
        $place = mysqli_fetch_array($tam);

        $result .= '<li class="item-atc" cate="prod"><a id="aautocom" class="achiadong" href="place/' . get_tenkhongdau("table_tinhthanh_danhmuc", $place['id_tinh']) . '/' . $place['tenkhongdau'] . '-' . $place['id'] . '.html&p=' . $row['id'] . '" ><span class="dm sanpham">Sản phẩm </span><span class="divchiadong"><div>' . $row['ten'] . '</div><span class="giatien">' . tien($row['gia']) . ' đ</span></span></a><div class="clearfix"></div></li>';
    }
}
if (in_array('onlyp', $tam)) {


    //  place  
    if ($_GET['cate'] != 'pcate') {
        $sql_diadiem = "select * from table_place where ten like '%" . $str . "%' " . $where_place . " limit 5";

        $diadiem = mysqli_query($db, $sql_diadiem);
        $arrdiadiem = array();
        while ($row = mysqli_fetch_array($dbiadiem)) {
            if ($row['concept'] == 0) {
                $loaiplace = "<span class='dm showroom' >Showroom </span>";
            } else {

                $loaiplace = "<span class='dm concept'>Concept </span>";
            }
            $result .= '<li class="item-atc"  cate="place"><a id="aautocom" href="place/' . get_tenkhongdau("table_tinhthanh_danhmuc", $row['id_tinh']) . '/' . $row['tenkhongdau'] . '-' . $row['id'] . '.html" >' . $loaiplace . $row['ten'] . '</a><div class="clearfix"></div></li>';
        }
    }




    //  product  
    $sql_diadiem = "select * from table_product where ten like '%" . $str . "%' " . $where_cate . "  " . $where_pcate . " limit 5";

    $diadiem = mysqli_query($db, $sql_diadiem);
    $arrdiadiem = array();
    while ($row = mysqli_fetch_array($dbiadiem)) {
        $sql_place = "select * from table_place where id =" . $row['id_place'];

        $tam = mysqli_query($db, $sql_place);
        $place = mysqli_fetch_array($tam);

        $result .= '<li class="item-atc" cate="prod"><a id="aautocom" class="achiadong" href="place/' . get_tenkhongdau("table_tinhthanh_danhmuc", $place['id_tinh']) . '/' . $place['tenkhongdau'] . '-' . $place['id'] . '.html&p=' . $row['id'] . '" ><span class="dm sanpham">Sản phẩm </span><span class="divchiadong"><div>' . $row['ten'] . '</div><span class="giatien">' . tien($row['gia']) . ' đ</span></span></a><div class="clearfix"></div></li>';
    }
}



// **********************NEAR********************	
if (in_array('t', $tam)) {
    $result .= '<li class="item-atc"><a  onclick="getLocation()" id="aautocom" value="" class="" ><img src="./images/icon-near.png" /><span class="pdanhmuc">Vị trí của tôi</span></a><div class="clearfix"></div></li>';
    $result .= '<li class="item-atc"><a  id="aautocom" value="" onclick="chontoado()" ><img src="./images/icon-near.png" /><span class="pdanhmuc">Chọn tọa độ trên Bản Đồ</span></a><div class="clearfix"></div></li>';
    $sql_diadiem = "
            select * from ( select id,stt,ten as diadiem,  'tinh' as class, 'place' as image from table_tinhthanh_danhmuc where hienthi=1 and ten like '%" . $str . "%'  order by stt desc limit 3) a union all
            select * from ( select id,stt,ten as diadiem,  'huyen' as class , 'place' as image from table_tinhthanh_list where hienthi=1 and  ten like '%" . $str . "%'  order by stt desc limit 2) b union all
            
            select * from ( select id,stt=1,  diadiem ,  'duong' as class , 'street' as image  from table_place where diadiem like '%" . $str . "%'  limit 4) d
             ";

    $diadiem = mysqli_query($db, $sql_diadiem);
    $arrdiadiem = array();
    while ($row = mysqli_fetch_array($dbiadiem)) {

        $result .= '<li class="item-atc" cate="' . $row['class'] . '"><a id="aautocom" onclick="laydiadiem2(this)" value="' . $row['id'] . '" class="' . $row['class'] . '" ><img src="./images/icon-' . $row['image'] . '.png" />' . $row['diadiem'] . ' <span class="pdanhmuc">' . showtentinh($row['id'], $row['class']) . '</span></a><div class="clearfix"></div></li>';
    }
}


if ($result != '') {
    echo "<div style='padding: 10px' >" . $result . "</div>";
}
