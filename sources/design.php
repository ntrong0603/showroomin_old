<?php

		
if( isset( $_GET['id'] ) ){
	$tenkhongdau=$_GET['id'];
	$d->reset();
	$d->setTable('news');
	$d->setWhere('tenkhongdau',$tenkhongdau);
	$d->select();
	$chitietsanpham=$d->fetch_array();
	$title = $chitietsanpham['title'];
	$description = $chitietsanpham['description'];
	$keyword = $chitietsanpham['keyword'];
	$title_bar = $chitietsanpham['ten'.$lang];
	
	$sql = "select thumb from #_hinhsp where hienthi=1 and id_sp='".$chitietsanpham['id']."'  order by stt,id desc";
	$d->query($sql);
	$hinhsp = $d->result_array();
	
	$sql = "select * from #_place where hienthi=1 and id_danhmuc='".$chitietsanpham['id_danhmuc']."'  order by stt,id desc";
	$d->query($sql);
	$sanpham = $d->result_array();
	
}else{
	if($_GET['com']=='thiet-ke'){
		$sql = "select * from #_news_danhmuc where hienthi=1 and loaitin ='designs' order by stt,id desc";
		$d->query($sql);
		$sanpham = $d->result_array();
	} else {
		if( $ketqua!=false and isset( $ketqua['tablesuf']) ){
		$d->reset();
		$d->setTable("news_".$ketqua['tablesuf']);
		$d->setWhere('tenkhongdau',$com);
		
		$d->select();
		$danhmucsanpham=$d->fetch_array();
		}
		
		$d->reset();
		$d->setTable('news');
		if($_GET['com']=='sale'){
			$d->setWhere('noibat',1);
			}
		if( isset( $ketqua['thuoctinh'] ) ){
			
			$d->setWhereTA('thuoctinh like', "%,".$ketqua['thuoctinh'].",%");
		}
		if( isset( $ketqua['tablesuf'] ) ){$d->setWhere('id_'.$ketqua['tablesuf'],$danhmucsanpham['id']);}
		$d->select();
		$sanpham=$d->result_array();
		
		$title_page = _designs;
		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
		$url = getCurrentPageURL();
		$maxR=9;
		$maxP=20;
		$paging=paging($sanpham, $url, $curPage, $maxR, $maxP);
		$sanpham=$paging['source'];
	}
	
}

?>