<?php
if(isset($_POST['id'])){
	$hoten=$_POST['hoten'];
	$sp=$_POST['id'];
	$danhgia=$_POST['danhgia'];
	$tieude=$_POST['tieude'];
	$noidung=$_POST['noidung'];
	$sql = "INSERT INTO  table_danhgia (hoten,danhgia,tieude,noidung,sp) 
				  VALUES ('$hoten','$danhgia','$tieude','$noidung','$sp')";	
			mysql_query($sql) or die(mysql_error());
			$iduser = mysql_insert_id();
	alert('Cám ơn bạn đánh giá sản phẩm của chúng tôi');
	}
		
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
	
	$sql = "select * from #_hinhsp where hienthi=1 and id_sp='".$chitietsanpham['id']."'  order by stt  asc";
	$d->query($sql);
	$hinhsp = $d->result_array();
	
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
	if( $chitietsanpham['id_cat']>0 ){ $where=" and #_place.id_cat = ".$chitietsanpham['id_cat'] ;}
	if( $chitietsanpham['id_item']>0 ){ $where=" and #_place.id_item = ".$chitietsanpham['id_item'] ;}
	
	$sql = "select #_place.id as id,#_place.ten as ten,#_place.ten_sd as ten_sd,#_place.ten_rd as ten_rd,#_place.gia as gia,#_place.tenkhongdau as tenkhongdau,#_place.thumb as thumb,
	#_place_danhmuc.tenkhongdau as danhmuc from #_place left join #_place_danhmuc on #_place.id_danhmuc = #_place_danhmuc.id where #_place.hienthi = 1  ".$where." and #_place.id <>".$chitietsanpham['id'];
	$sql = $sql." order by #_place.stt asc";
	$d->query($sql);
	$place_sp = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=$com."/".$chitietsanpham['tenkhongdau']."";
	$maxR=9;
	$maxP=12;
	$paging=paging($place_sp, $url, $curPage, $maxR, $maxP);
	$place_sp=$paging['source'];
	
}else{
	$title_ba="Sản Phẩm";
	if( $ketqua!=false and isset( $ketqua['tablesuf']) ){
	$d->reset();
	$d->setTable("place_".$ketqua['tablesuf']);
	$d->setWhere('tenkhongdau',$com);
	
	$d->select();
	$danhmucsanpham=$d->fetch_array();
	$danhmucseo=$danhmucsanpham;
$sql="select * from table_place_list where id_danhmuc='".$danhmucsanpham['id']."'";
	$d->query($sql);
	$danhmuccap2=$d->result_array();
	
	
	$title_ba = $danhmucsanpham['ten'.$lang];
	 
	$title = $danhmucsanpham['title'];
	if( $title=='' ){
	$title = $danhmucsanpham['ten'];}
	$keyword = $danhmucsanpham['keywords'];
	$description = $danhmucsanpham['description'];
	}
	
	$d->reset();
	$sql = "select #_place.id_danhmuc as id_danhmuc,#_place.id_list as id_list,#_place.id as id,#_place.mota as mota,#_place.ten as ten,#_place.ten_sd as ten_sd,#_place.ten_rd as ten_rd,#_place.gia as gia,#_place.tenkhongdau as tenkhongdau,#_place.thumb as thumb,
	#_place_danhmuc.tenkhongdau as danhmuc from #_place left join #_place_danhmuc on #_place.id_danhmuc = #_place_danhmuc.id where #_place.hienthi = 1 ";
	
	
	
	$d->reset();
	$d->setTable('place');
	if( isset( $ketqua['thuoctinh'] ) ){
		$sql = $sql."and #_place.thuoctinh like '%,".$ketqua['thuoctinh'].",%'";
	}
	if( isset( $ketqua['tablesuf'] ) ){
		$sql = $sql."and #_place.id_".$ketqua['tablesuf']." = '".$danhmucsanpham['id']."'";
		}
	
	
	$sql = $sql." order by #_place.stt asc";
	$d->query($sql);
	$place_sp = $d->result_array();
	
	$title_page = 'TOP place';
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=$com."";
	$maxR=18;
	$maxP=12;
	$paging=paging($place_sp, $url, $curPage, $maxR, $maxP);
	$place_sp=$paging['source'];
	
}

?>