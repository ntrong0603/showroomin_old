<?php
if( is_array($_SESSION['user'])){
	$d->reset();
	$d->setTable('baiviet');
	$d->setWhere('loaitin','gioi-thieu');
	$d->select();
	$baiviet=$d->fetch_array();
	
	$d->reset();
	$d->setTable('place');
	$d->setWhere('id',$_GET['id']);
	$d->select();
	$tin_edit=$d->fetch_array();
	
	$d->reset();
	$d->setTable('hinhsp');
	$d->setWhere('id_sp',$_GET['id']);
	$d->select();
	$hinh=$d->result_array();
	$array_thuoctinh = substr($tin_edit['thuoctinh'],1);
	$array_thuoctinh = substr($array_thuoctinh,0,-1);
	
	$sql="select * from #_thuoctinh where hienthi = 1 and id_danhmuc = 15 and id in (".$array_thuoctinh.") order by id,stt";
	$d->query($sql);
	$loaitin=$d->fetch_array();
	
	$sql="select * from #_thuoctinh where hienthi = 1 and id_danhmuc = 12 and id in (".$array_thuoctinh.") order by id,stt";
	$d->query($sql);
	$huong=$d->fetch_array();
	
	$sql="select * from #_thuoctinh where hienthi = 1 and id_danhmuc = 13 and id in (".$array_thuoctinh.") order by id,stt";
	$d->query($sql);
	$phaply=$d->fetch_array();
	
	
	$title = $baiviet['title'];
	$description = $baiviet['description'];
	$keyword = $baiviet['keyword'];
	$title_bar = $baiviet['ten'.$lang];
	function fns_Rand_digit($min,$max,$num)
		{
			$result='';
			for($i=0;$i<$num;$i++){
				$result.=rand($min,$max);
			}
			return $result;	
		}
	if(isset($_POST['matin'])){
		
		
		
		$data['noidung'] = $_POST['noidung'];
		$huong = $_POST['huong'];
		$phaply = $_POST['phaply'];
		$loaitin = $_POST['loaitin'];
		$thuoctinh = ',';
		if($huong != 0){
			$thuoctinh = $thuoctinh.$huong.',';
			}
		if($phaply != 0){
			$thuoctinh = $thuoctinh.$phaply.',';
			}	
		if($loaitin != 0){
			$thuoctinh = $thuoctinh.$loaitin.',';
			}	
		$data['thuoctinh'] = $thuoctinh;
			
		$data['id_tinh'] = $_POST['id_tinh_tin'];
		$data['id_huyen'] = $_POST['id_huyen_tin'];
		$data['id_phuong'] = $_POST['id_phuong_tin'];
		$data['diachi'] = $_POST['diachi'];
		$data['id_duan'] = $_POST['id_duan'];
		$data['gia'] = $_POST['gia'];
		$data['donvi'] = $_POST['donvi'];
		$data['dientich'] = $_POST['dientich'];
		$data['id_cus'] = $_SESSION['user']['id'];
		
		$data['rong'] = $_POST['chieungang'];
		$data['dai'] = $_POST['chieudai'];
		$data['drong'] = $_POST['duongrong'];
		$data['solau'] = $_POST['solau'];
		$data['sophong'] = $_POST['sophongngu'];
		$data['photo'] = $tin_edit['photo'];
		$data['thumb'] = $tin_edit['thumb'];
		
		$file_name=fns_Rand_digit(0,9,6);
		
		if($photo = upload_image("img1", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham_l,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($photo, 400, 400, _upload_sanpham_l,$file_name,2);
		}
		
		$d->reset();
		$d->setTable('place');
		$d->setWhere('id', $tin_edit['id'] );
		if($d->update($data)){
			
			
		}
		else
			alert('Đã có lỗi xãy ra');	
		
		
		$data1['photo'] = $hinh[0]['photo'];
		$data1['thumb'] = $hinh[0]['thumb'];
		$file_name=fns_Rand_digit(0,9,6);
		if($photo = upload_image("img2", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham_l,$file_name)){
				$thumb = create_thumb($photo, 400, 400, _upload_sanpham_l,$file_name,2);
				$data1['photo'] = $photo;
				$data1['thumb'] = $thumb;
				
		}			
		$d->reset();
		$d->setTable('hinhsp');
		$d->setWhere('id', $hinh[0]['id'] );
		if($d->update($data1)){
			
			
		}
		else
			alert('Đã có lỗi xãy ra');	
		
		$data2['photo'] = $hinh[1]['photo'];
		$data2['thumb'] = $hinh[1]['thumb'];
		$file_name=fns_Rand_digit(0,9,6);
		if($photo = upload_image("img3", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham_l,$file_name)){
				$thumb = create_thumb($photo, 400, 400, _upload_sanpham_l,$file_name,2);
				$data2['photo'] = $photo;
				$data2['thumb'] = $thumb;
		}			
		$d->reset();
		$d->setTable('hinhsp');
		$d->setWhere('id', $hinh[1]['id'] );
		if($d->update($data2)){
			alert('Sữa tin tức thành công');
			chuyentrang('quan-tri');
		}
		else
			alert('Đã có lỗi xãy ra');	
		}
}
?>