<?php 
	
	session_start ();

	@define ( '_lib' , './lib/');

	include_once "../../quanly/lib/config.php";
	include_once "../../quanly/lib/constant.php";
	include_once "../../quanly/lib/class.database.php";
	include_once "../../quanly/lib/functions.php";
	include_once "../../quanly/lib/functions_giohang_2.php";
	include_once "../../quanly/lib/file_requick.php";

	$result_cart=$_SESSION['cart'];

	$mobile=$_POST['mobile'];

	$result_gioh="";
	$tonggia=0;
	if(count($result_cart)>0){
		$result_gioh.="<div class='fix-scorll-ball' style='overflow: auto; height: 65vh;    max-height: 215px;'>";
		for($i_gioh=0; $i_gioh<count($result_cart); $i_gioh++){

			$d->reset();
			$sql="select * from table_product where id='".$result_cart[$i_gioh]['productid']."'";
			$d->query($sql);
			$item=$d->fetch_array();
			$new_price=$item['gia']-($item['khuyenmai']*$item['gia'])/100;
			$tonggia+=($new_price*$result_cart[$i_gioh]['qty']);

			$result_gioh.="<div class='item_gh' style='margin:17px 0px;'>";
			$result_gioh.="<div class='col-md-3' style='padding: 0px;'>";
			$result_gioh.="<img src='./../../"._upload_sanpham_l.$item['photo']."' width='100%' alt='sản phẩm' title='sản phẩm'>";
			$result_gioh.="</div>";
			$result_gioh.="<div class='col-md-9' style='padding: 0px;padding-left: 15px;'>";
			$result_gioh.="<div class='col-md-6' style='font-size: 14px;color: #252525;    font-weight: bold;padding: 0px;text-align:left;'>".$item['ten']."</div>";
			$result_gioh.="<div class='col-md-1' style='font-size: 14px;color: #252525;    font-weight: bold;padding: 0px;text-align:center;'>".$result_cart[$i_gioh]['qty']."</div>";
			$result_gioh.="<div class='col-md-5' style='font-size: 12px;color: #ff0000;font-weight: bold;padding: 2px 0px;text-align:right;'>".number_format($new_price,0,'','.')."";
			if($item['khuyenmai']>0){
			$result_gioh.="<div>";
			$result_gioh.="<i class='price-old giacu giagoc' style='font-size: 11px;font-weight: normal;padding: 0px; color:#2d2d2d;' data-gia=''>".number_format($item['gia'],0,'','.')." VNĐ</i>";
			$result_gioh.="</div>";
			}
			$result_gioh.="</div>";
			
			$result_gioh.="</div>";
			$result_gioh.="<div class='clearfix'></div>";
			$result_gioh.="</div>";
			
		}
		$result_gioh.="<input type='hidden' id='spluongsp' name='soluongsp' value='".count($result_cart)."'>";
		$result_gioh.="<input type='hidden' id='tongtien' name='tongtien' value='".$tonggia."'>";
		$result_gioh.="</div><div>";
		$result_gioh.="<div style='width: 100%;border: 1px solid #707070;margin-top: 10px;'></div>";
		$result_gioh.="<div style='margin: 10px 0px;font-size: 13px;color:#2d2d2d;'>Thành tiền: <span style='color: #ff0000;font-weight: bold; float: right;'>".number_format($tonggia,0,'','.')." VNĐ</span> <br/> <div class='clearfix'></div><span style='font-size: 11px;float: right;color:#2d2d2d;font-style:italic;'>Đã bao gồm thuế VAT</span></div>";
		$result_gioh.="</div>";
	}
	$result_gioh.="<div class='clearfix'></div>";
	echo "".$result_gioh;
?>
