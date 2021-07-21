<?php  if(!defined('_source')) die("Error");
	
	$d->reset();
	$sql_place="select id,ten,tenkhongdau,thumb,photo from #_place_danhmuc where hienthi=1 and noibat=1 order by stt,id desc";
	$d->query($sql_place);
	$place=$d->result_array();
	
	$d->reset();
	$sql_place_tin="select id,ten,tenkhongdau,thumb,photo,mota from #_news where hienthi=1 and noibat=1 order by stt,id desc limit 0,6";
	$d->query($sql_place_tin);
	$place_tin=$d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=12;
	$maxP=5;
	$paging=paging_home($place, $url, $curPage, $maxR, $maxP);
	$place=$paging['source'];

?>