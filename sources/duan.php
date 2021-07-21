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
	
	$sql = "select id,ten,tenkhongdau,thumb,gia,photo,ngaytao from #_news where hienthi=1 and id<>'".$chitiettintuc['id']."'  order by stt,id desc";
	$d->query($sql);
	$tintuc = $d->result_array();
	
}else{
	
		$d->reset();
		$d->setTable('news');
		$d->setWhere('loaitin','duan');
		$d->select();
		$tintuc=$d->result_array();
	
		$title_ba =  'Mẫu phòng karaoke';
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=$com."";
	$maxR=20;
	$maxP=20;
	$paging=paging($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];
}


?>