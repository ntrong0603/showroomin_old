<?php
if( isset( $_GET['id'] ) ){
	$tenkhongdau=$_GET['id'];
	$d->reset();
	$d->setTable('place');
	$d->setWhere('tenkhongdau',$tenkhongdau);
	$d->select();
	$chitietsanpham=$d->fetch_array();
	
	//sanpham cung loai
	if( $chitietsanpham['id_danhmuc']!='0' or  $chitietsanpham['id_danhmuc']!=''  ){$cungloai='danhmuc';}
	if( $chitietsanpham['id_list']!='0' or  $chitietsanpham['id_list']!=''  ){$cungloai='list';}
	if( $chitietsanpham['id_cat']!='0' or  $chitietsanpham['id_cat']!=''  ){$cungloai='cat';}
	if( $chitietsanpham['id_item']!='0' or  $chitietsanpham['id_item']!=''  ){$cungloai='item';}
	
	$d->reset();
	$d->setTable('place_'.$cungloai);
	$d->setLimit( 12 );
	$d->setOrder( " Rand() " );
	$d->select();
	$sanpham=$d->result_array();
	
}else{
	if( $ketqua!=false and isset( $ketqua['tablesuf']) ){
	$d->reset();
	$d->setTable("place_".$ketqua['tablesuf']);
	$d->setWhere('tenkhongdau',$com);
	$d->select();
	$danhmucsanpham=$d->fetch_array();
	}
	$d->reset();
	$d->setTable('place');
	if( isset( $ketqua['thuoctinh'] ) ){
		
		$d->setWhereTA('thuoctinh like', "%,".$ketqua['thuoctinh'].",%");
	}
	if( isset( $ketqua['tablesuf'] ) ){$d->setWhere('id_'.$ketqua['tablesuf'],$danhmucsanpham['id']);}
	$d->select();
	$sanpham=$d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=$com."html";
	$maxR=20;
	$maxP=20;
	$paging=paging($sanpham, $url, $curPage, $maxR, $maxP);
	$sanpham=$paging['source'];
	
}


?>