<?php  if(!defined('_source')) die("Error");
$id_com =  addslashes($_GET['id_com']);
$id_dm =  addslashes($_GET['id_dm']);
		
if(isset($_GET['id'])){
	#tin tuc chi tiet
	$id =  addslashes($_GET['id']);
	$sql = "select * from #_news where hienthi=1 and id='".$id."'";
	$d->query($sql);
	$tintuc_detail = $d->result_array();
	$title_bar=$tintuc_detail[0]['title'];
	$title_cat=$tintuc_detail[0]['ten'];
	$keyword = $tintuc_detail[0]['keyword'];
	$description = $tintuc_detail[0]['description'];
	
	#các tin cu hon
	$sql_khac = "select * from #_news where hienthi=1 and id <>'".$id."' order by stt,ngaytao desc limit 0,8";
	$d->query($sql_khac);
	$tintuc_khac = $d->result_array();
	
}
elseif($id_dm!=''){
	$sql_tintuc = "select * from #_news where id_danhmuc = $id_dm and hienthi=1 order by stt,ngaytao desc";
	$d->query($sql_tintuc);
	$place = $d->result_array();
	
	$sql_detail = "select * from #_news_danhmuc where hienthi=1 and id='".$id_dm."'";
	$d->query($sql_detail);
	$row_detail = $d->fetch_array();
	$keyword = $row_detail['keyword'];
	$description = $row_detail['description'];
	
	$title_bar=$row_detail['title'];	
	$title_cat = $row_detail['ten_'.$lang];
	}
else{
	$title_bar=_tintuc;		
	$title_cat=_tintuc;	
	$sql_tintuc = "select * from #_news where hienthi=1 order by stt,ngaytao desc";
	$d->query($sql_tintuc);
	$place = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=6;
	$maxP=5;
	$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];
}
?>