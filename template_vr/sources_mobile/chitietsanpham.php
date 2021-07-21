<?php 
	@define ( '_lib' , './lib/');

	include_once "../../quanly/lib/config.php";
	include_once "../../quanly/lib/constant.php";
	include_once "../../quanly/lib/class.database.php";
	include_once "../../quanly/lib/functions.php";
	include_once "../../quanly/lib/functions_giohang_2.php";
	include_once "../../quanly/lib/file_requick.php";

	$id=$_POST['id'];
	
	$sql="select * from table_product where hienthi=1 and id='".$id."'";
	$d->query($sql);
	$result=$d->fetch_array();
	
	$d->setTable('product');
	$d->setWhere('id', $id);
	$data['luotxem']=$result['luotxem']+1;
	$d->update($data);

	$sql="select * from table_hinhsp where id_sp='".$result['id']."' order by id desc";
	$d->query($sql);
	$images_pr=$d->result_array();

	$result2="";
	$result2="<div style='display:none;' id='id_dm_ct'>".$result['id_danhmuc']."</div>";
	$result2.="<div class='col-xs-12 col-md-5' style='padding: 0px;background-color: #ebebeb; margin-bottom: 0px;'>";
	/*$result2.="<div class='bkg-sale'></div>";
	$result2.="<div>";
	$result2.="<h1 class='sale'>".$result['khuyenmai']."%</h1>";
	$result2.="</div>";*/
	$result2.="<div id='regular2' class='slider".time()."'></div>";

	$result2.="<section class='slider".time()."-for fix-height'>";
	$result2.="<div>";
	$result2.="<img src='./../../"._upload_sanpham_l.$result['photo']."' alt='' width='100%'>";
	$result2.="</div>";
	for($i=0;$i<count($images_pr);$i++){
		$result2.="<div>";
		$result2.="<img src='./../../"._upload_sanpham_l.$images_pr[$i]['photo']."' width='100%'>";
		$result2.="</div>";
	}
	$result2.="</section>";

	/*$result2.="<section class='slider".time()."-nav set-pad-img' style='margin-top: -50px;
    margin-bottom: 0px;'>";
	$result2.="<div>";
	$result2.="<img src='"._upload_sanpham_l.$result['photo']."' alt='' width='100%'>";
	$result2.="</div>";
	for($i=0;$i<count($images_pr);$i++){
		$result2.="<div>";
		$result2.="<img src='"._upload_sanpham_l.$images_pr[$i]['photo']."' width='100%'>";
		$result2.="</div>";
	}
	$result2.="</section>";*/
	
	$result2.="</div>";

	$result2.="<div class='col-xs-12 col-md-7' style='padding: 0px;'>";
	$result2.="<div class='col-xs-12 ' style='padding: 0px;'>";
	$result2.="<div style='padding: 0px;padding-bottom: 9px;padding-top: 23px;border-bottom: 1px solid #f2f2f2;'>";
	$result2.="<div>";
	$result2.="<h3 style='margin: 0px;color: #252525;font-size: 12px;font-weight:bold;'>".$result['ten']."</h3>";
	$result2.="</div>";

	$new_price=$result['gia']-($result['khuyenmai']*$result['gia'])/100;

	$result2.="<div>";
	$result2.="<div>";
	$result2.="<span class='giamoi' style='font-weight:bold;'>Giá: ".number_format($new_price,0,'','.')." VNĐ</span>";
	$result2.="</div>";
	if($result['khuyenmai']>0){
	$result2.="<div>";
	$result2.="<i class='price-old giacu giagoc' style='font-size: 13px;font-weight: normal;' data-gia='".$result['gia']."'>Giá cũ: ".number_format($result['gia'],0,'','.')." VNĐ</i>";
	$result2.="</div>";
	}
	
	$result2.="<div class='clearfix'>";
	$result2.="</div>";						
	$result2.="</div>";
	$result2.="</div>";
	$result2.="<div style='padding: 16px 0px;font-size: 10px;'>";
	$result2.="<div class='xemchitiet-mota'>";
	$result2.=$result['mota'];
	$result2.="</div>";

	$result2.="<div style='margin: 0.5em 0;'>";
	$result2.="<div style='float: left;'>";
	$result2.="<input type='number' name='soluongmua' onchange='tinhtonggia()'' id='soluongmua' min='1' value='1' style='border-radius: 5px;border: 1px solid #ebebeb;background-color: #fbfbfb;height: 17px;width: 40px;padding-left: 5px;' placeholder=''>";
	$result2.="</div>";
	$result2.="<div style='float: left;margin-left: 10px;background-color: #ff0000;padding: 4px 10px;height: 17px;line-height: 9px;'>";
	$result2.="<a href='javascript:void(0)' style='border-radius: 5px;' data-id='".$result['id']."' class='bt-cart2 dathang'>MUA NGAY</a>";
	$result2.="</div>";
	if($result['model3d']!=""){
	$result2.="<div style='float: left;margin-left: 10px;;background-color: #ff0000;padding: 0.3em;'>";
	$result2.="<a href='javascript:void(0)' style='border-radius: 5px; ' data-id='".$result['id']."' class='mau3d dathang'>Xem mẫu 3D</a>";
	$result2.="</div>";
	}

	$result2.="<div class='clearfix'>";
								
	$result2.="</div>";
	$result2.="</div>";

	$result2.="<div class='col-xs-12 noidungctsp' style=''>";
	$result2.=$result['noidung'];
	$result2.="</div>";
	$result2.="<div class='clearfix'>";
	$result2.="</div>";
	$result2.="</div>";
	$result2.="</div>";


	echo $result2;

?>



