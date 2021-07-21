<?php
if( isset( $ketqua['loaitin'] ) ){$loaitin=$ketqua['loaitin'];}
if( isset( $_GET['id'] ) ){
	$tenkhongdau=$_GET['id'];
	$d->reset();
	$d->setTable('news');
	$d->setWhere('tenkhongdau',$tenkhongdau);
	$d->select();
	$chitiettintuc=$d->fetch_array();
	$loaitin=$chitiettintuc['loaitin'];
	if( $chitiettintuc['id_danhmuc']>0 ){
		$sql="select *from table_news_danhmuc where id='".$chitiettintuc['id_danhmuc']."'";
			$d->query($sql);
			$danhmuctintuc=$d->fetch_array();
	}else{
			$sql="select *from table_baiviet where loaitin='".$loaitin."'";
			$d->query($sql);
			$danhmuctintuc=$d->fetch_array();
	}
	$danhmucseo=$danhmuctintuc;
	$title = $chitiettintuc['title'];
	if( $title=='' ){
	$title = $chitiettintuc['ten'];}
	$description = $chitiettintuc['description'];
	$keyword = $chitiettintuc['keywords'];
	$title_bar = $chitiettintuc['ten'.$lang];
	
	$sql = "select * from #_news where hienthi=1 and  loaitin = '".$chitiettintuc['loaitin']."'  and id<>'".$chitiettintuc['id']."'  order by stt,id desc";
	$d->query($sql);
	$tintuc = $d->result_array();
	
		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=8;
	$maxP=20;
	$paging=paging($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];
	
}else{
		if( isset( $ketqua  ) and $ketqua!=false ){
	
	$d->reset();
	$d->setTable("news_".$ketqua['tablesuf']);
	$d->setWhere('tenkhongdau',$com);
	$d->setOrder("  stt asc, id desc  ");
	$d->select();
	$danhmuctintuc=$d->fetch_array();
	
	
	}
	else{
			$sql="select *from table_baiviet where loaitin='".$loaitin."'";
			$d->query($sql);
			$danhmuctintuc=$d->fetch_array();
			
				$sql="select *from table_news_danhmuc where loaitin='".$loaitin."'";
			$d->query($sql);
			$danhmuccap2=$d->result_array();
			
		}
	
	$danhmucseo=$danhmuctintuc;
	$title = $danhmuctintuc['title'];
	if( $title=='' ){
	$title = $chitiettintuc['ten'];}
	$description = $danhmuctintuc['description'];
	$keyword = $danhmuctintuc['keywords'];
	$title_bar = $danhmuctintuc['ten'.$lang];
	$d->reset();
	
	
	$d->setTable('news');
		$d->setWhere('loaitin',$loaitin);
		$d->setWhere('hienthi',1);
	if( isset( $ketqua ) and $ketqua!=false ){$d->setWhere('id_'.$ketqua['tablesuf'],$danhmuctintuc['id']);}
	$d->setOrder("  stt asc, id desc  ");
	$d->select();
	$tintuc=$d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=20;
	$maxP=20;
	$paging=paging($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];
}


?>