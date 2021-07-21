<?php
if( isset( $_GET['id'] ) ){
	$tenkhongdau=$_GET['id'];
	$d->reset();
	$d->setTable('news');
	$d->setWhere('tenkhongdau',$tenkhongdau);
	$d->select();
	$chitiettintuc=$d->fetch_array();
	
	$title = $chitiettintuc['title'];
	$description = $chitiettintuc['description'];
	$keyword = $chitiettintuc['keyword'];
	$title_bar = $chitiettintuc['ten'.$lang];
	
	$sql = "select * from #_news where hienthi=1 and id<>'".$chitiettintuc['id']."'  order by stt,id desc";
	$d->query($sql);
	$tintuc = $d->result_array();
	
}else{
	
	if( $ketqua!=false ){
	$d->reset();
	$d->setTable("news_".$ketqua['tablesuf']);
	$d->setWhere('tenkhongdau',$com);
	$d->select();
	$danhmuctintuc=$d->fetch_array();
	}
	if( $ketqua!=false ){$loaitin=$ketqua['loaitin'];}
	$d->reset();
	
	$d->setTable('news');
	$d->setWhere('id_danhmuc',3);
	$d->select();
	$tintuc=$d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=$com."html";
	$maxR=20;
	$maxP=20;
	$paging=paging($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];
}


?>