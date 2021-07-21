<?php 
	@define ( '_lib' , './lib/');

	include_once "../vr/Vinmus/quanly/lib/config.php";
	include_once "../vr/Vinmus/quanly/lib/constant.php";
	include_once "../vr/Vinmus/quanly/lib/class.database.php";
	include_once "../vr/Vinmus/quanly/lib/functions.php";
	include_once "../vr/Vinmus/quanly/lib/functions_giohang.php";
	include_once "../vr/Vinmus/quanly/lib/file_requick.php";

	$id=$_POST['id'];
	
	$sql="select * from table_product where hienthi=1 and id='".$id."'";
	$d->query($sql);
	$result=$d->fetch_array();

	$sql="select * from table_hinhsp where id_sp='".$result['id']."' order by id desc";
	$d->query($sql);
	$images_pr=$d->result_array();

	$result2="";
	$result2="<div style='display:none;' id='id_dm_ct'>".$result['id_danhmuc']."</div>";
	$result2.="<div class='col-xs-12 col-md-5' style='padding: 10px;background-color: #ebebeb; margin-bottom: 10px;'>";
	$result2.="<div class='bkg-sale'></div>";
			$result2.="<div>";
			$result2.="<h1 class='sale'>".$result['khuyenmai']."%</h1>";
			$result2.="</div>";
	$result2.="<div id='regular2' class='slider".time()."'></div>";

	$result2.="<section class='slider".time()."-for fix-height'>";
	$result2.="<div>";
	$result2.="<img src='"._upload_sanpham_l.$result['photo']."' alt='' width='100%'>";
	$result2.="</div>";
	for($i=0;$i<count($images_pr);$i++){
		$result2.="<div>";
		$result2.="<img src='"._upload_sanpham_l.$images_pr[$i]['photo']."' width='100%'>";
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

	$result2.="<div class='col-xs-12 col-md-7'>";
	$result2.="<div class='col-xs-12 fix-scorll-ball scorll-chitiet' style=''>";

	$result2.="<div>";
	$result2.="<h3 style='margin: 0px;color: #666666;'>".$result['ten']."</h3>";
	$result2.="</div>";

	$new_price=$result['gia']-($result['khuyenmai']*$result['gia'])/100;

	$result2.="<div >";
	$result2.="<div>";
	$result2.="<span class='giamoi' style='float: left;'>".number_format($new_price,0,'',',')." VNĐ</span>";
	$result2.="</div>";
	if($result['khuyenmai']>0){
	$result2.="<div>";
	$result2.="<i class='price-old giacu giagoc' style='float: left;margin-left: 20px;font-size: 13px;margin-top: 5px;font-weight: normal;' data-gia='".$result['gia']."'>".number_format($result['gia'],0,'',',')." VNĐ</i>";
	$result2.="</div>";
	}
	
	$result2.="<div class='clearfix'>";
								
	$result2.="</div>";
	$result2.="</div>";

	$result2.="<div>";
	$result2.=$result['mota'];
	$result2.="</div>";

	$result2.="<div style='margin: 1.5em 0;'>";
	$result2.="<div style='float: left;'>";
	$result2.="<input type='number' name='soluongmua' onchange='tinhtonggia()'' id='soluongmua' min='1' value='1' style='border-radius: 5px;border: 1px solid #ebebeb;background-color: #fbfbfb;height: 32px;width: 65px;padding-left: 5px;' placeholder=''>";
	$result2.="</div>";
	$result2.="<div style='float: left;margin-left: 10px;'>";
	$result2.="<a href='javascript:void(0)' style='border-radius: 5px;' data-id='".$result['id']."' class='bt-cart2 dathang'><img src='images/ic_muangay.png' style='float: left;margin-right: 10px;' alt=''> MUA NGAY</a>";
	$result2.="</div>";
	if($result['model3d']!=""){
	$result2.="<div style='float: left;margin-left: 10px;'>";
	$result2.="<a href='javascript:void(0)' style='border-radius: 5px; ' data-id='".$result['id']."' class='mau3d dathang'>Xem mẫu 3D</a>";
	$result2.="</div>";
	}

	$result2.="<div class='clearfix'>";
								
	$result2.="</div>";
	$result2.="</div>";

	$result2.="<div class='col-xs-12 chitietsp' style='margin-top: 10px; padding: 0px;'>";
	$result2.="<h3>Thông tin chi tiết</h3>";
	$result2.="</div>";
	$result2.="<div class='col-xs-12 noidungctsp' style='padding: 0px; margin-top: 5px;'>";
	$result2.=$result['noidung'];
	$result2.="</div>";

	$result2.="</div>";
	$result2.="</div>";


	echo $result2;

?>



