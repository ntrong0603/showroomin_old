<?php 
// // // 	//lay danh sach tmpplace
// // // function checkCap1($id, $arraysCate){
// // // 	foreach ($arraysCate as $key => $value) {
// // // 		if($id == $value['category_parent_id']){
// // // 			foreach ($arraysCate as $k => $v) {
// // // 				# code...
// // // 				if($id == $v['category_child_id']){
// // // 					return false;
// // // 				}
// // // 			}
// // // 		}
// // // 	}
// // // 	return true;
// // // }
// // function getCate($id){
// // 	global $d;
// // 	$d->reset();
// // 	$sql = "select * from table_cate where category_id = $id";
// // 	$d->query($sql);
// // 		// print_r($d);die();
// // 	$tmpCate = $d->result_array();
// // 	return $tmpCate;
// // }
// // function getCateCap2($id){
// // 	global $d;
// // 	$d->reset();
// // 	$sql = "select * from table_caterelation where category_parent_id = $id";
// // 	$d->query($sql);
// // 		// print_r($d);die();
// // 	$tmpCate = $d->result_array();
// // 	return $tmpCate;
// // }
// // 	$d->reset();
// // 	$sql = "select * from table_place_list";
// // 	$d->query($sql);
// // 	$tmpCap2 = $d->result_array();

// // // 	// print_r($tmpCater);

// // // 	foreach ($tmpCate as $key => $value) {
// // // 		# code...
// // // 		if ( checkCap1($value['category_id'],$tmpCater)) {
// // // 			# code...
// // // 			print_r($value['category_id'].'<br/>');
// // // 		}
// // // 	}

// // // 	die();
// // // cap 1 : 24,32,31,35,36,39,40,90,37,82,142,34,38,41,35,86,99,85,113,132,127,131,134,135,143

// // $cap1 = '24,32,31,35,36,39,40,90,37,82,142,34,38,41,86,99,85,113,132,127,131,134,135,143';
// // $cap1 = explode(',', $cap1);

// // // 	foreach ($cap1 as $key => $value) {
// // // 		# code...
// // // 		$cate = getCate($value);

// // // 		// print_r($cate);die();
// // // 		$data['id'] = $value;
// // // 		$data['ten_vi'] = $cate[0]['category_name'];
// // // 		$data['ten_en'] =$cate[0]['category_name'];
// // // 		$data['tenkhongdau'] = changeTitle($cate[0]['category_name']).'-1';
// // // 		$d->reset();
// // // 		$d->setTable('place_list0');

// // // 		if($d->insert($data)){

// // // 		}
// // // 	}
// // foreach ($tmpCap2 as $key => $value) {
// // 	# code...
// // 	$cate = getCateCap2($value['id']);
// // 	// print_r($cate);die();
// // 	foreach ($cate as $k => $v) {
// // 		$c1 = getCate($v['category_child_id']);
// // 		$data = array();
// // 		$data['id'] = $v['category_child_id'];
// // 		$data['id_list'] = $value['id'];
// // 		$data['ten_vi'] = $c1[0]['category_name'];
// // 		$data['ten_en'] =$c1[0]['category_name'];
// // 		$data['thumb'] = $c1[0]['category_thumb_image'];
// // 		$data['photo'] = $c1[0]['category_full_image'];
// // 		$data['hienthi'] = 1;
// // 		$data['tenkhongdau'] = changeTitle($c1[0]['category_name']).'-2';
// // 		$d->reset();
// // 		$d->setTable('place_group');
// // 		if($d->insert($data)){

// // 		}
// // 	}
// // }
// // die();

// // // 
// function checkCap1($idCate){
// 	global $d;
// 	$d->reset();
// 	$sql = "select * from table_place_list0 where id = $idCate";
// 	$d->query($sql);
// 		// print_r($d);die();
// 	$tmpCate = $d->result_array();
// 	if (empty($tmpCate)) {
// 		return false;
// 	}
// 	return true;
// }
// function checkCap2($idCate){
// 	global $d;
// 	$d->reset();
// 	$sql = "select * from table_place_list where id = $idCate";
// 	$d->query($sql);
// 		// print_r($d);die();
// 	$tmpCate = $d->result_array();
// 	if (empty($tmpCate)) {
// 		return false;
// 	}
// 	return true;
// }
// function checkCap3($idCate){
// 	global $d;
// 	$d->reset();
// 	$sql = "select * from table_place_group where id = $idCate";
// 	$d->query($sql);
// 		// print_r($d);die();
// 	$tmpCate = $d->result_array();
// 	if (empty($tmpCate)) {
// 		return false;
// 	}
// 	return true;
// }

// function getCateCap2($id){
// 	global $d;
// 	$d->reset();
// 	$sql = "select * from table_place_list where id_list = $id";
// 	$d->query($sql);
// 		// print_r($d);die();
// 	$tmpCate = $d->result_array();
// 	return $tmpCate;
// }
// function getCateCap3($id){
// 	global $d;
// 	$d->reset();
// 	$sql = "select * from table_place_group where id_list = $id";
// 	$d->query($sql);
// 		// print_r($d);die();
// 	$tmpCate = $d->result_array();
// 	return $tmpCate;
// }
// function getCateCap1($id){
// 	global $d;
// 	$d->reset();
// 	$sql = "select * from table_place_list where id = $id";
// 	$d->query($sql);
// 		// print_r($d);die();
// 	$tmpCate = $d->result_array();
// 	return $tmpCate;
// }
// function getCateCap32($id){
// 	global $d;
// 	$d->reset();
// 	$sql = "select * from table_place_group where id = $id";
// 	$d->query($sql);
// 		// print_r($d);die();
// 	$tmpCate = $d->result_array();
// 	return $tmpCate;
// }

// $sql = "SELECT *,tc.category_id, tpr.place_price FROM table_tmpplace tp, table_tmpplacecate tc, table_tmpplaceprice tpr WHERE tp.place_id = tc.place_id and tp.place_id = tpr.place_id ";
// $d->reset();
// // 	$sql = "select * from table_cate where category_id = $id";
// $d->query($sql);
// 	// print_r($d);die();
// $tmpplace = $d->result_array();
// // // print_r($tmpplace);die();

// 	foreach ($tmpplace as $key => $value) {
// 		# code...


// 		$cateid = $value['category_id'];

// 		// print_r($cateid);die();
// 		$data = array();
// 		if(checkCap1($cateid)){
// 			$data['id_list_l'] = $cateid;
// 			$cap2 = getCateCap2($cateid);
// 			if(!empty($cap2)){
// 				$data['id_list'] = $cap2[0]['id'];
// 				$cap3 = getCateCap3($cap2[0]['id']);
// 				if (!empty($cap3)) {
// 					# code...
// 					$data['id_group'] = $cap3[0]['id'];
// 				}
// 			}
// 		}
// 		if(checkCap2($cateid)){
// 			$data['id_list'] = $cateid;
// 			$cap1 = getCateCap1($cateid);
// 			if(!empty($cap1)){
// 				$data['id_list_l'] = $cap1[0]['id_list'];
// 				$cap3 = getCateCap3( $cateid);
// 				if (!empty($cap3)) {
// 					# code...
// 					$data['id_group'] = $cap3[0]['id'];
// 				}
// 			}
// 		}
// 		if(checkCap3($cateid)){
// 			$data['id_group'] = $cateid;
// 			// $cap2 = getCateCap32($cateid);
// 			// if(!empty($cap2)){
// 			// 	$data['id_list'] = $cap2['id_list'];
// 			// 	$cap1 = getCateCap1($cap2['id_list']);
// 			// 	if (!empty($cap1)) {
// 			// 		# code...
// 			// 		$data['id_list_l'] = $cap1[0]['id_list'];
// 			// 	}
// 			// }
// 		}

// 		$data['photo'] = $value['place_full_image'];		
// 		$data['thumb'] = $value['place_thumb_image'];				
		
		
// 		$data['id'] = $value['place_id'] ;

// 		$data['ten_vi'] = $value['place_name'] ;
// 		$data['ten_en'] = $value['place_name'] ;	
// 		$data['masp'] = $_POST['masp'];	
// 		$data['tenkhongdau'] = changeTitle($value['place_name']);	
		
// 		$data['gia'] = $value['place_price']		;	

// 		$data['noidung_vi'] = mysql_real_escape_string( $value['place_desc']);	
// 		$data['noidung_en'] = mysql_real_escape_string( $value['place_desc']);	
				
// 		$data['hienthi'] = 1;
// 		// $data['noibat'] = isset($_POST['noibat']) ? 1 : 0;
// 		// $data['thietke'] = isset($_POST['thietke']) ? 1 : 0;
// 		$data['ngaytao'] = time();

// 		$d->reset();
// 		$d->setTable('place');
// 		$d->insert($data);
// 	}
// 	die();

// // function checkCapplace($idplace){
// // 	global $d;
// // 	$d->reset();
// // 	$sql = "select * from table_place where id = $idplace";
// // 	$d->query($sql);
// // 		// print_r($d);die();
// // 	$tmpCate = $d->result_array();
// // 	$idcap1  = $tmpCate[0]['id_list_l'];
// // 	$idcap2 = $tmpCate[0]['id_list'];
// // 	$idcap3 = $tmpCate[0]['id_group'];

// // }
// ?>