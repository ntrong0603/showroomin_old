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
		
if( isset( $_GET['tinh'] ) ){
	$id=$_GET['id'];
	$d->reset();
	$d->setTable('chothue');
	$d->setWhere('id',$id);
	$d->select();
	$chitietsanpham=$d->fetch_array();
	$title = $chitietsanpham['title'];
	if( $title=='' ){
	$title = $chitietsanpham['ten'];}
	$description = $chitietsanpham['description'];
	$keyword = $chitietsanpham['keywords'];
	$title_bar = $chitietsanpham['ten'.$lang];
	
	$sql = "select * from #_hinhsp where hienthi=1 and id_sp='".$chitietsanpham['id']."' and com='chothue' order by id desc";
	$d->query($sql);
	$hinhsp = $d->result_array();
	
	if( $chitietsanpham['id_danhmuc']>0 ){ $where=" and id_danhmuc = ".$chitietsanpham['id_danhmuc'] ;
	$d->reset();
	$d->setTable('chothue_danhmuc');
	$d->setWhere('id',$chitietsanpham['id_danhmuc']);
	$d->select();
	$danhmucsanpham= $d->fetch_array();
	
	}
	
	if( $chitietsanpham['id_list']>0 ){ $where=" and id_list = ".$chitietsanpham['id_list'] ;
	$d->reset();
	$d->setTable('chothue_list');
	$d->setWhere('id',$chitietsanpham['id_list']);
	$d->select();
	$danhmucsanpham= $d->fetch_array();
	}
	$danhmucseo=$danhmucsanpham;
	if( $chitietsanpham['id_cat']>0 ){ $where=" and id_cat = ".$chitietsanpham['id_cat'] ;}
	if( $chitietsanpham['id_item']>0 ){ $where=" and id_item = ".$chitietsanpham['id_item'] ;}
	//du an cung khu
	$sql = "select * from table_duan where hienthi = 1 and id_huyen=".$chitietsanpham['id_huyen']."  order by id desc ";
	$d->query($sql);
	$duan_huyen = $d->result_array();
	
	$sql = "select * from table_duan where hienthi = 1   and id_huyen<>".$chitietsanpham['id_huyen']." and id_tinh =".$chitietsanpham['id_tinh']." order by id desc ";
	$d->query($sql);
	$duan_tinh = $d->result_array();
	$duan=array_merge($duan_huyen,$duan_tinh);
	//nhadat ban cung khu
	$sql = "select * from table_chothue where hienthi = 1  ".$where." and id_huyen=".$chitietsanpham['id_huyen']." and id <>".$chitietsanpham['id']." order by id desc ";
	$d->query($sql);
	$chothue_huyen = $d->result_array();
	
	$sql = "select * from table_chothue where hienthi = 1  ".$where." and id_huyen<>".$chitietsanpham['id_huyen']." and id_tinh =".$chitietsanpham['id_tinh']." order by id desc ";
	$d->query($sql);
	$chothue_tinh = $d->result_array();
	$chothue=array_merge($chothue_huyen,$chothue_tinh);
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=$com."/".$chitietsanpham['tenkhongdau']."";
	$maxR=9;
	$maxP=12;
	$paging=paging($chothue, $url, $curPage, $maxR, $maxP);
	$chothue=$paging['source'];
	
}else{
	$title_ba="Nhà đất bán";
	$d->reset();
	$d->setTable("tinhthanh_danhmuc");
	$d->setWhere('tenkhongdau',$_GET['id']);
	$d->select();
	$tam=$d->fetch_array();
	
	if( count($tam)>1 ){$ketqua['table']="danhmuc" ;$col='tinh';}
	else{
		$d->reset();
		$d->setTable("tinhthanh_list");
		$d->setWhere('tenkhongdau',$_GET['id']);
		$d->select();
		$tam=$d->fetch_array();
			if( count($tam)>1){$ketqua['table']="list";$col='huyen'; }
			else{
				$d->reset();
				$d->setTable("tinhthanh_cat");
				$d->setWhere('tenkhongdau',$_GET['id']);
				$d->select();
				$tam=$d->fetch_array();
				if( count($tam)>1 ){$ketqua['table']="cat" ;$col='phuong';}else{ $showall=true;}
			}
	}
	$danhmucsanpham=$tam;
	$where='';
	if( isset( $ketqua['table']) ){

	$danhmucseo=$danhmucsanpham;
	$title_ba = $danhmucsanpham['ten'.$lang];
	$title =$danhmucsanpham['title'];
	if( $title=='' ){
	$title =$danhmucsanpham['ten'];}
	$title="Nhà đất cho thuê ".$title;
	$keyword = $danhmucsanpham['keywords'];
	$description = "Nhà đất cho thuê ".$danhmucsanpham['description'];
	$where=" and id_".$col." = ".$tam['id'];
	
	}
	
	$d->reset();
	$sql = "select * from table_chothue where hienthi=1 ".$where;
	
	
/*	
	$d->reset();
	$d->setTable('chothue');
	if( isset( $ketqua['thuoctinh'] ) ){
		$sql = $sql."and thuoctinh like '%,".$ketqua['thuoctinh'].",%'";
	}
	if( isset( $ketqua['table'] ) ){
		$sql = $sql."and id_".$ketqua['table']." = '".$danhmucsanpham['id']."'";
		}
	
	*/
	$sql = $sql." order by  id desc";
	$d->query($sql);
	$chothue = $d->result_array();
	
	$title_page = 'TOP chothue';
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=$com."/".$danhmucsanpham['tenkhongdau'].".html";
	$maxR=10;
	$maxP=10;
	$paging=paging($chothue, $url, $curPage, $maxR, $maxP);
	$chothue=$paging['source'];
	//duan noi bat
	$sql = "select * from table_duan where hienthi=1 and noibat=1 ".$where." order by  id desc limit 5";
	$d->query($sql);
	$duan1 = $d->result_array();
	if( $col=="huyen" ){ $where2=" and id_tinh= ". $tam['id_danhmuc'];
		$sql = "select * from table_duan where hienthi=1 ".$where2." order by  id desc limit 5";
		$d->query($sql);
		$duan2 = $d->result_array();
		$duan=array_merge($duann1,$duan2);
	}else{
		$duan=$duan1;
	}
	
	
}


?>