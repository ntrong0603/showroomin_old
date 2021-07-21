<?php

function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}
if(isset($_POST['noidung'])){
	if( !isset($_SESSION['user']  ) ){
		$_SESSION['backpage']="https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		transfer("Bạn phải đăng nhập để sử dụng tính năng này.", BASE_URL."user/login.html");
		
	}
	
	$d->reset();
	$d->setTable('review');
	$data['vote']=$_POST['vote'];
	$data['noidung']=$_POST['noidung'];
	$data['id_place']=$_GET['id'];
	$data['id_user']=$_SESSION['user']['id'];
	$data['status']=1;
	$data['xem']=0;
	$data['ngaytao']=time();
	

		if($d->insert($data)){
			
			//upload hình
			$d->query('select * from table_review order by id desc limit 1');
			$tam=$d->fetch_array();
			
				$temp = $_FILES;
				$maxupload=count($temp['picture']['name']);
				
				
				if(count($temp['picture']['name'])>5){
												$maxupload=5;
											}
			for( $i = 0; $i < $maxupload; $i++){
				$ten_pic=fns_Rand_digit(0,9,15);
	
				$img['name'] = $temp['picture']['name'][$i];
	
				$img['type'] = $temp['picture']['type'][$i];
	
				$img['tmp_name'] = $temp['picture']['tmp_name'][$i];
	
				$img['error'] = $temp['picture']['error'][$i];
	
				$img['size'] = $temp['picture']['size'][$i];
	
				$_FILES['pic'] = $img;
				if ($photo = upload_image("pic", 'jpg|png|JPG|jpeg|JPEG|PNG',"./upload/review/", $ten_pic)) {

                  $data_photo['photo'] = $photo;
				  $data_photo['thumb'] = create_thumb($data_photo['photo'], 200, 200, "./upload/review/",$ten_pic,1);	

              }     
			  $data_photo['id_review'] = $tam['id'];
			  $d->setTable('review_hinh');
			  if(!$d->insert($data_photo)) alert("Hình ảnh ko thể upload!");
			}
			//end upload hình
	alert('Cám ơn bạn đánh giá sản phẩm của chúng tôi');
		}
	}
		
if( isset( $_GET['tinh'] ) ){
	$id=$_GET['id'];
	$d->reset();
	$d->setTable('place');
	$d->setWhere('id',$id);
	$d->select();
	$chitietsanpham=$d->fetch_array();
	//them 1 luot xem
	
	$sql_luotxem_place = "insert into table_thongkeconcept(id_place, luotxem) VALUES ('".$id."','".time()."')";
	$d->query($sql_luotxem_place);
	
	$luotxem=$chitietsanpham['luotxem']+1;
	$sql_luotxem = "update table_place set luotxem=".$luotxem." where id=".$id;
	$d->query($sql_luotxem);
	
	$title = $chitietsanpham['title'];
	if( $title=='' ){
	$title = $chitietsanpham['ten'];}
	$description = $chitietsanpham['description'];
	$keyword = $chitietsanpham['keywords'];
	$title_bar = $chitietsanpham['ten'.$lang];
	
	$sql = "select * from #_hinhsp where hienthi=1 and id_sp='".$chitietsanpham['id']."' and com='place' order by id desc";
	$d->query($sql);
	$hinhsp = $d->result_array();
	
	if( $chitietsanpham['id_danhmuc']>0 ){ $where=" and id_danhmuc = ".$chitietsanpham['id_danhmuc'] ;
	$d->reset();
	$d->setTable('place_danhmuc');
	$d->setWhere('id',$chitietsanpham['id_danhmuc']);
	$d->select();
	$danhmucsanpham= $d->fetch_array();
	
	}

	if( $chitietsanpham['id_list']>0 ){ $where=" and id_list = ".$chitietsanpham['id_list'] ;
	$d->reset();
	$d->setTable('place_list');
	$d->setWhere('id',$chitietsanpham['id_list']);
	$d->select();
	$danhmucsanpham= $d->fetch_array();
	}
	$danhmucseo=$danhmucsanpham;
	if( $chitietsanpham['id_cat']>0 ){ $where=" and id_cat = ".$chitietsanpham['id_cat'] ;}
	if( $chitietsanpham['id_item']>0 ){ $where=" and id_item = ".$chitietsanpham['id_item'] ;}

	
		$lat=$chitietsanpham['lat'];	
		$lng=$chitietsanpham['lng'];
		
		if( isset( $_POST['khoangcach'] ) ){ $distance=$_POST['khoangcach'];}else{
		$distance = 5; 
		}
		if( isset( $_POST['soluong']) and $_POST['soluong']>0  ){ $limit= " limit ".$_POST['soluong'];}else{
		$limit = ""; 
		}
			if( isset( $_POST['cat'] ) and $_POST['cat']>0 ){
		$where=' and id_danhmuc ='.$_POST['cat'];
		
		}
		$sql = "SELECT *, (SQRT(POW((lat - $lat), 2) + POW((lng - $lng), 2)) * $multiplier) AS distance FROM table_place WHERE hienthi=1 ".$where." and id<> ".$chitietsanpham['id']." and POW((lat - $lat), 2) + POW((lng - $lng), 2) < POW(($distance / $multiplier), 2) ORDER BY distance ASC".$limit;
		$d->query($sql);
	$place = $d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=$com."/".$chitietsanpham['tenkhongdau']."";
	$maxR=10;
	$maxP=12;
	$paging=paging($place, $url, $curPage, $maxR, $maxP);
	$place=$paging['source'];
	
}else{
	$title_ba="";
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
	$title="Nhà đất bán ".$title;
	$keyword = $danhmucsanpham['keywords'];
	$description = "Nhà đất bán ".$danhmucsanpham['description'];
	$where=" and id_".$col." = ".$tam['id'];
	
	}
	
	$d->reset();
	$sql = "select * from table_place where hienthi=1 ".$where;
	
	
/*	
	$d->reset();
	$d->setTable('place');
	if( isset( $ketqua['thuoctinh'] ) ){
		$sql = $sql."and thuoctinh like '%,".$ketqua['thuoctinh'].",%'";
	}
	if( isset( $ketqua['table'] ) ){
		$sql = $sql."and id_".$ketqua['table']." = '".$danhmucsanpham['id']."'";
		}
	
	*/
	$sql = $sql." order by  id desc";
	$d->query($sql);
	$place = $d->result_array();
	
	$title_page = 'TOP place';
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=$com."/".$danhmucsanpham['tenkhongdau'].".html";
	$maxR=20;
	$maxP=10;
	$paging=paging($place, $url, $curPage, $maxR, $maxP);
	$place=$paging['source'];
	
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