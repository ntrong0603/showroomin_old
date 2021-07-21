<?php
$sql= "select * from table_360hinh where hienthi=1 order by stt desc";
$d->query($sql);
$hinhanh=$d->result_array();
$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=$com."";
	$maxR=18;
	$maxP=12;
	$paging=paging($place_sp, $url, $curPage, $maxR, $maxP);
	$place_sp=$paging['source'];
if( isset( $_GET['id'] ) ){
$sql= "select * from table_360hinh where hienthi=1 and id=".$_GET['id'];
$d->query($sql);
$hinhanhchinh=$d->fetch_array();

}else{
$hinhanhchinh=$hinhanh[0];
}

$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=$com."";
	$maxR=9;
	$maxP=12;
	$paging=paging($hinhanh, $url, $curPage, $maxR, $maxP);
	$hinhanh=$paging['source'];

?>