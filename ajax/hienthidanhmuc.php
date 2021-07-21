<?php
@define('_lib', './../quanly/lib/');
include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "library.php";
include_once _lib . "class.database.php";
$d = new database($config['database']);
$db = $d->db;

$result = '';


$tam = explode('-', $_GET['result']);

$where_cate = '';
$where_place = '';
$where_pcate = '';

$d->query("select id from table_place where id_danhmuc=" . $_GET['iddanhmuc']);
$tamp = $d->result_array();
$array_cate = "0";
for ($i = 0; $i < count($tamp); $i++) {
    $array_cate .= "," . $tamp[$i]['id'];
}
$where_cate = " and id_place in (" . $array_cate . ") ";
$where_place = " and id in (" . $array_cate . ") ";

//  Category Product  	
$sql_cate = "select  * from table_product_danhmuc where hienthi=1 " . $where_cate . "  limit 5";

$cate = mysqli_query($db, $sql_cate);
$arrdiadiem = array();
while ($row = mysqli_fetch_array($cate)) {
    $sql_place = "select * from table_place where id =" . $row['id_place'];

    $tam = mysqli_query($db, $sql_place);
    $place = mysqli_fetch_array($tam);
    $result .= '<li class="item-atc" cate="pcate"><a id="aautocom" class="achiadong" value="' . $row['id'] . '"  alt="' . $row['ten'] . '"  onclick="laydiadiem3(this)"><span class="dm danhmuc">Danh mục </span><span class="divchiadong"><div>' . $row['ten'] . '</div> <span class="pdanhmuc">' . $place['ten'] . '</span></span></a><div class="clearfix"></div></li>';
}





if ($result != '') {
    echo "<div style='padding: 10px' >" . $result . "</div>";
}
