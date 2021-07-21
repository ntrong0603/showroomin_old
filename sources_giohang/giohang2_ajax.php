<?php 
	
	session_start ();

	@define ( '_lib' , './lib/');

	include_once "../vr/Vinmus/quanly/lib/config.php";
	include_once "../vr/Vinmus/quanly/lib/constant.php";
	include_once "../vr/Vinmus/quanly/lib/class.database.php";
	include_once "../vr/Vinmus/quanly/lib/functions.php";
	include_once "../vr/Vinmus/quanly/lib/functions_giohang.php";
	include_once "../vr/Vinmus/quanly/lib/file_requick.php";

	$result_cart=$_SESSION['cart'];

	$mobile=$_POST['mobile'];

	$result_gioh="";
	$tonggia=0;
	if(count($result_cart)>0){
		for($i_gioh=0; $i_gioh<count($result_cart); $i_gioh++){

			$d->reset();
			$sql="select * from table_product where id='".$result_cart[$i_gioh]['productid']."'";
			$d->query($sql);
			$item=$d->fetch_array();
			$new_price=$item['gia']-($item['khuyenmai']*$item['gia'])/100;
			$tonggia+=($new_price*$result_cart[$i_gioh]['qty']);

			$result_gioh.="<div class='item_gh' style='margin:5px 0px;'>";
			$result_gioh.="<div class='col-md-4' style='padding: 0px;'>";
			$result_gioh.="<img src='"._upload_sanpham_l.$item['photo']."' width='100%' alt='sản phẩm' title='sản phẩm'>";
			$result_gioh.="</div>";
			$result_gioh.="<div class='col-md-8'>";
			$result_gioh.="<div style='color: #666666'>".$item['ten']."(".$result_cart[$i_gioh]['qty'].")</div>";
			$result_gioh.="<div style='color: #df0024;font-weight: bold;'>".number_format($new_price,0,'','.')." VNĐ.</div>";
			if($item['khuyenmai']>0){
			$result_gioh.="<div>";
			$result_gioh.="<i class='price-old giacu giagoc' style='font-size: 16px;font-weight: normal;' data-gia=''>".number_format($item['gia'],0,'','.')." VNĐ</i>";
			$result_gioh.="</div>";
			}
			$result_gioh.="</div>";
			$result_gioh.="</div>";
			$result_gioh.="<div class='clearfix'></div>";
		}
		$result_gioh.="<input type='hidden' id='spluongsp' name='soluongsp' value='".count($result_cart)."'>";
		$result_gioh.="<input type='hidden' id='tongtien' name='tongtien' value='".$tonggia."'>";
		$result_gioh.="<div style='width: 100%;border: 1px solid #ccc;margin-top: 10px;'></div>";
		$result_gioh.="<div style='margin: 10px 0px;'>Thành tiền: <span style='color: #df0024;font-weight: bold; float: right;'>".number_format($tonggia,0,'','.')." VNĐ</span> <br/> <span style='font-size: 14px;float: right;'>Đã bao gồm thuế VAT</span></div>";
	}
	$result_gioh.="<div class='clearfix'></div>";
	echo "".$result_gioh;
?>
