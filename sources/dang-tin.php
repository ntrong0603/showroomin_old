<?php
if(is_array($_SESSION['user']) ){
	
	$d->reset();
	$d->setTable('custom');
	$d->setWhere('id',$_SESSION['user']['id']);
	$d->select();
	$user=$d->fetch_array();
	
	
	if($user['lan'] < 5){
		$d->reset();
		$d->setTable('baiviet');
		$d->setWhere('loaitin','gioi-thieu');
		$d->select();
		$baiviet=$d->fetch_array();
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
			
			$ten = $_POST['tieude'];
			$tenkhongdau=changeTitle($_POST['tieude']);
			$i=0;
			$link = $tenkhongdau;
			while(checklink($link)== true){
				$link=$tenkhongdau."-".$i;
				$i++;
				}
			
			$noidung = $_POST['noidung'];
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
			
				
			$id_tinh_tin = $_POST['id_tinh_tin'];
			$id_huyen_tin = $_POST['id_huyen_tin'];
			$id_phuong_tin = $_POST['id_phuong_tin'];
			$diachi = $_POST['diachi'];
			$id_duan = $_POST['id_duan'];
			$gia = $_POST['gia'];
			$donvi = $_POST['donvi'];
			$dientich = $_POST['dientich'];
			$id_cus = $_SESSION['user']['id'];
			
			$chieungang = $_POST['chieungang'];
			$chieudai = $_POST['chieudai'];
			$duongrong = $_POST['duongrong'];
			$solau = $_POST['solau'];
			$sophongngu = $_POST['sophongngu'];
			$time1  = time();
			$file_name=fns_Rand_digit(0,9,6);
			
			if($photo = upload_image("img1", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham_l,$file_name)){
					$thumb = create_thumb($photo, 400, 400, _upload_sanpham_l,$file_name,2);
			}
			
			$sql = "INSERT INTO table_place (ten,tenkhongdau,id_tinh,id_huyen,id_phuong,diachi,id_duan,thuoctinh,gia,donvi,dientich,rong,dai,drong,solau,sophong,id_cus,noidung,ngaytao,photo,thumb) 
							  VALUES ('$ten','$link','$id_tinh_tin','$id_huyen_tin','$id_phuong_tin','$diachi','$id_duan','$thuoctinh','$gia','$donvi','$dientich','$chieungang','$chieudai','$duongrong','$solau','$sophongngu','$id_cus','$noidung','$time1','$photo','$thumb')";	
						 
			mysql_query($sql) or die(mysql_error());
			$iduser = mysql_insert_id();	
			if($iduser != ''){
				$data['lan'] = $user['lan']+1;
				$d->reset();
				$d->setTable('custom');
				$d->setWhere('id', $_SESSION['user']['id'] );
				$d->update($data);
				}
			
			$file_name=fns_Rand_digit(0,9,6);
			if($photo = upload_image("img2", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham_l,$file_name)){
					$thumb = create_thumb($photo, 400, 400, _upload_sanpham_l,$file_name,2);
			}			
			$sql = "INSERT INTO table_hinhsp (photo,thumb,id_sp) 
							  VALUES ('$photo','$thumb','$iduser')";	
			mysql_query($sql) or die(mysql_error());
			$idhinh = mysql_insert_id();	
			
			$file_name=fns_Rand_digit(0,9,6);
			if($photo = upload_image("img3", 'jpg|png|gif|JPG|jpeg|JPEG|Jpg|PNG', _upload_sanpham_l,$file_name)){
					$thumb = create_thumb($photo, 400, 400, _upload_sanpham_l,$file_name,2);
			}			
			$sql = "INSERT INTO table_hinhsp (photo,thumb,id_sp) 
							  VALUES ('$photo','$thumb','$iduser')";	
			mysql_query($sql) or die(mysql_error());
			$idhinh = mysql_insert_id();	
			}
	}//end so lan >5
	else{
		alert('Ngày hôm nay bạn đã đăng 5 tin, vui lòng quay lại ngày hôm sau');
		chuyentrang('quan-tri');
		}
}
?>