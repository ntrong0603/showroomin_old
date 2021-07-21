<?php

		
if( isset( $_GET['id'] ) ){
	$tenkhongdau=$_GET['id'];
	$d->reset();
	$d->setTable('place');
	$d->setWhere('tenkhongdau',$tenkhongdau);
	$d->select();
	$chitietsanpham=$d->fetch_array();
	$title = $chitietsanpham['title'];
	if( $title=='' ){
	$title = $chitietsanpham['ten'];}
	$description = $chitietsanpham['description'];
	$keyword = $chitietsanpham['keywords'];
	$title_bar = $chitietsanpham['ten'.$lang];
	$seo_image =($chitietsanpham['photo'])?"http://hostting.com/hotel/upload/sanpham/".$chitietsanpham['photo']:'http://hostting.com/hotel/upload/hinhanh/'.$banner['photo'];
	$sql = "select * from #_hinhsp where hienthi=1 and id_sp='".$chitietsanpham['id']."'  order by stt  asc";
	$d->query($sql);
	$hinhsp = $d->result_array();
	
	$sql = "select * from #_hinhsp where hienthi=1 and id_sp='".$chitietsanpham['id']."_banner'  order by stt  asc";
	$d->query($sql);
	$hinhspbanner = $d->result_array();
	
	if( $chitietsanpham['id_danhmuc']>0 ){ $where=" and #_place.id_danhmuc = ".$chitietsanpham['id_danhmuc'] ;
	$d->reset();
	$d->setTable('place_danhmuc');
	$d->setWhere('id',$chitietsanpham['id_danhmuc']);
	$d->select();
	$danhmucsanpham= $d->fetch_array();
	
	}
	
	if( $chitietsanpham['id_list']>0 ){ $where=" and #_place.id_list = ".$chitietsanpham['id_list'] ;
	$d->reset();
	$d->setTable('place_list');
	$d->setWhere('id',$chitietsanpham['id_list']);
	$d->select();
	$danhmucsanpham= $d->fetch_array();
	}
	$danhmucseo=$danhmucsanpham;
	
	if( $chitietsanpham['id_list']>0 ){
	$d->reset();
	$d->setTable('place_danhmuc');
	$d->setWhere('id',$chitietsanpham['id_danhmuc']);
	$d->select();
	$danhmucsanpham= $d->fetch_array();
	}
	if( $chitietsanpham['id_cat']>0 ){ $where=" and #_place.id_cat = ".$chitietsanpham['id_cat'] ;}
	if( $chitietsanpham['id_item']>0 ){ $where=" and #_place.id_item = ".$chitietsanpham['id_item'] ;}
	
	$sql = "select #_place.id as id,#_place.ten as ten,#_place.giakm as giakm,#_place.noidung as noidung,#_place.thoigian as thoigian,#_place.diemden as diemden,#_place.khoihanh as khoihanh,#_place.ten_sd as ten_sd,#_place.ten_rd as ten_rd,#_place.gia as gia,#_place.tenkhongdau as tenkhongdau,#_place.thumb as thumb,
	#_place_danhmuc.tenkhongdau as danhmuc from #_place left join #_place_danhmuc on #_place.id_danhmuc = #_place_danhmuc.id where #_place.hienthi = 1  ".$where." and #_place.id <>".$chitietsanpham['id'];
	$sql = $sql." order by #_place.stt asc";
	$d->query($sql);
	$place = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=$com;
	$maxR=8;
	$maxP=12;
	$paging=paging($place, $url, $curPage, $maxR, $maxP);
	$place=$paging['source'];
	$d->query("select * from table_nhapkho where hienthi=1 and id_sp='lp_".$chitietsanpham['id']."' order by stt asc, id desc");
												$review=$d->result_array();
												$title_ba=$chitietsanpham['ten'];
}else{
	$title_ba="Reviews tours at VietNam Backroads";
	$title = $title_ba;
	$description = $title_ba;
	$keyword = $title_ba;
	$d->query("select * from table_nhapkho where hienthi=1  order by stt asc, id desc");
												$review=$d->result_array();
}

?>