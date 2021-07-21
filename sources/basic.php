<?php
$multiplier = 112.12; // dùng 69.0467669 cho Miles

//danh mục Tỉnh
	$d->reset();
	$d->setTable('tinhthanh_danhmuc');
	$d->setWhere(' hienthi ',1);
	$d->setOrder(' stt asc, id desc ');
	$d->select();
	$danhmuctinh=$d->result_array();
//danh mục Huyện
	$d->reset();
	$d->setTable('tinhthanh_list');
	$d->setWhere(' hienthi ',1);
	$d->setOrder(' stt asc, id desc ');
	$d->select();
	$danhmuchuyen=$d->result_array();
//danh mục Xã
	$d->reset();
	$d->setTable('tinhthanh_cat');
	$d->setWhere(' hienthi ',1);
	$d->setOrder(' stt asc, id desc ');
	$d->select();
	$danhmucxa=$d->result_array();
//danh mục thuộc tính
	$d->reset();
	$d->setTable('thuoctinh_danhmuc');
		$d->setWhere(' hienthi ',1);
	$d->setOrder(' stt asc, id desc ');
	$d->select();
	$danhmucthuoctinh=$d->result_array();
//thuộc tính	
	$d->reset();
	$d->setTable('thuoctinh');
		$d->setWhere(' hienthi ',1);
	$d->setOrder(' stt asc, id desc ');
	$d->select();
	$thuoctinh=$d->result_array();
//banner
		$d->reset();
		$d->setTable('photo');
		$d->setWhere('com','banner_top');
		$d->select();
		$banner=$d->fetch_array();
		
		function getlink($table,$id){
			global $d;
			$d->reset();
			$d->setTable($table);
			$d->setWhere('id',$id);
			$d->select();
			$tam=$d->fetch_array();
			echo $tam['tenkhongdau'];
		}
//slider đối tác

$d->reset();
$d->setTable('slider');
$d->setWhere('maloai','doitac');
$d->select();
$sliderdoitac=$d->result_array();
//slider khachhang

$d->reset();
$d->setTable('slider');
$d->setWhere('maloai','khachhang');
$d->select();
$sliderkhachhang=$d->result_array();

//hỗ trợ khách hàng
$d->reset();
$d->setTable('yahoo');
$d->select();
$hotrokhachhang=$d->result_array();
//Meta

$d->reset();
$d->setTable('meta');
$d->select();
$meta=$d->fetch_array();

//setting
$d->reset();
$d->setTable('hotline');
$d->select();
$setting=$d->fetch_array();
//title
$d->reset();
$d->setTable('title');
$d->select();
$title1=$d->fetch_array();
//Google Analytics


$d->reset();
$d->setTable('baiviet');
$d->setWhere('loaitin','footer');
$d->select();
$khaibao=$d->fetch_array();



//sản phẩm trang chủ



?>