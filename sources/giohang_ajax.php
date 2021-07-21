<?php 
	
	session_start ();

	@define ( '_lib' , './lib/');

	include_once "../quanly/lib/config.php";
	include_once "../quanly/lib/constant.php";
	include_once "../quanly/lib/class.database.php";
	include_once "../quanly/lib/functions.php";
	include_once "../quanly/lib/functions_giohang.php";
	include_once "../quanly/lib/file_requick.php";

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

			$result_gioh.="<div class='item_gh'>";
			$result_gioh.="<div class='col-md-2' style='padding: 0px;'>";
			$result_gioh.="<div class='bkg-sale'></div>";
			$result_gioh.="<div>";
			$result_gioh.="<h1 class='sale'>".$item['khuyenmai']."%</h1>";
			$result_gioh.="</div>";
			
			$result_gioh.="<a href='javascript:void(0)' class='xemchitiet' style='background-color: inherit;padding: inherit;' data-id='".$item['id']."'>";
			$result_gioh.="<img src='"._upload_sanpham_l.$item['photo']."' width='100%' alt='sản phẩm' title='sản phẩm'>";
			$result_gioh.="</a>";
			
			$result_gioh.="</div>";
			$result_gioh.="<div class='col-md-6' style='min-height: 128px;'>";
			$result_gioh.="<div style='color: #666666;'>";
			$result_gioh.="<a href='javascript:void(0)' class='xemchitiet' style='background-color: inherit;padding: inherit;font-size: inherit;float:inherit;' data-id='".$item['id']."'>";
			$result_gioh.=$item['ten'];
			$result_gioh.="</a>";
			$result_gioh.="</div>";
			$result_gioh.="<div style='position: absolute;bottom: -5px;'>";
			$result_gioh.="<a href='javascript:void(0)' onclick='xoa_sp(".$result_cart[$i_gioh]['productid'].")' style='color: #df0024;'>Xóa sản phẩm</a>";
			$result_gioh.="</div>";
			$result_gioh.="</div>";
			$result_gioh.="<div class='col-md-2' >";
			
			$result_gioh.="<div style='text-align: center;color: #df0024;font-weight: bold;'>";
			$result_gioh.=number_format($new_price,0,'',',')." VNĐ";
			$result_gioh.="</div>";
			if($item['khuyenmai']>0){
			$result_gioh.="<div>";
			$result_gioh.="<i class='price-old giacu giagoc' style='font-size: 16px;font-weight: normal;' data-gia='".$result['gia']."'>".number_format($item['gia'],0,'',',')." VNĐ</i>";
			$result_gioh.="</div>";
			}
			$result_gioh.="</div>";

			$result_gioh.="<div class='col-md-2' style='padding: 0px;'>";
			
			$result_gioh.="<input type='button' class='btn_sub' data-id='".$result_cart[$i_gioh]['productid']."' name='btn_sub' value='-'>";
			$result_gioh.="<input type='text' style='width: 30px; padding: 1px 0px; text-align: center;' min='1' class='soluong' value='".$result_cart[$i_gioh]['qty']."' data-id='".$result_cart[$i_gioh]['productid']."'>";
			$result_gioh.="<input type='button' class='btn_add' data-id='".$result_cart[$i_gioh]['productid']."' name='btn_add' value='+'>";
			$result_gioh.="</div>";
			$result_gioh.="<div class='clearfix'></div>";
			$result_gioh.="</div>";
		}
		$result_gioh.="<input type='hidden' id='spluongsp' name='soluongsp' value='".count($result_cart)."'>";
		$result_gioh.="<input type='hidden' id='tongtien' name='tongtien' value='".$tonggia."'>";
	}else{
		$result_gioh.="<div class='item_gh'>";
		$result_gioh.="<span style='color: #df0024; font-size: 24px; text-align: center;'>Bạn chưa chọn mua sản phẩm.</span>";
		$result_gioh.="</div>";
	}
	$result_gioh.="<div class='clearfix'></div>";
	echo "".$result_gioh;
?>
