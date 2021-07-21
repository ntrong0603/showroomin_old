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
		for($i_gioh=0; $i_gioh<count($result_cart); $i_gioh++){

			$d->reset();
			$sql="select * from table_product where id='".$result_cart[$i_gioh]['productid']."'";
			$d->query($sql);
			$item=$d->fetch_array();
			$new_price=$item['gia']-($item['khuyenmai']*$item['gia'])/100;
			$tonggia+=($new_price*$result_cart[$i_gioh]['qty']);

			$result_gioh.="<div class='item_gh'>";
			$result_gioh.="<div class='' style='padding: 0px;float:left;width: 26%;max-width:150px;'>";
			/*$result_gioh.="<div class='bkg-sale'></div>";
			$result_gioh.="<div>";
			$result_gioh.="<h1 class='sale'>".$item['khuyenmai']."%</h1>";
			$result_gioh.="</div>";*/
			
			$result_gioh.="<a href='javascript:void(0)' class='xemchitiet' style='background-color: inherit;padding: inherit;' data-id='".$item['id']."'>";
			$result_gioh.="<img src='./../../"._upload_sanpham_l.$item['photo']."' width='100%' alt='".$item['ten']."' title='".$item['ten']."'>";
			$result_gioh.="</a>";
			 
			$result_gioh.="</div>";
			$result_gioh.="<div style='float:left;width: 72%;'>";
			$result_gioh.="<div class='col-md-6' style='display: block;float: left;padding: 0px;padding-left: 10px;'>";
			$result_gioh.="<div style='color: #666666;'>";
			$result_gioh.="<a href='javascript:void(0)' class='xemchitiet' style='background-color: inherit;padding: inherit;font-size: 14px;font-weight: bold;float:inherit;' data-id='".$item['id']."'>";
			$result_gioh.=$item['ten'];
			$result_gioh.="</a>";
			$result_gioh.="</div>";
			$result_gioh.="<div>";
			$result_gioh.="<a href='javascript:void(0)' onclick='xoa_sp(".$result_cart[$i_gioh]['productid'].")' class='xoasanpham'>Xóa sản phẩm</a>";
			$result_gioh.="</div>";
			$result_gioh.="</div>";
			$result_gioh.="<div class='col-md-3' style='display: block;float: left;padding: 0px;
    padding-left: 10px;line-height: 23px;'>";
			
			$result_gioh.="<div style='color: #ff0000;font-weight: bold;font-size: 12px;'>";
			$result_gioh.=number_format($new_price,0,'','.')."";
			$result_gioh.="</div>";
			if($item['khuyenmai']>0){
			$result_gioh.="<div style=''>";
			$result_gioh.="<i class='price-old giacu giagoc' style='font-weight: 500;font-size: 12px;' data-gia='".$result['gia']."'>".number_format($item['gia'],0,'','.')."</i>";
			$result_gioh.="</div>";
			}
			$result_gioh.="</div>";

			$result_gioh.="<div class='col-md-3' style='display: block;float: left;'>";
			
			/*$result_gioh.="<input type='button' class='btn_sub' data-id='".$result_cart[$i_gioh]['productid']."' name='btn_sub' value='-'>";*/
			$result_gioh.="<input type='number' style='border-radius: 5px;border: 1px solid #ebebeb;background-color: #fbfbfb;text-align: center;    float: right;font-size:12px;'  min='0' class='soluongmua2 soluong' value='".$result_cart[$i_gioh]['qty']."' data-id='".$result_cart[$i_gioh]['productid']."'>";
			/*$result_gioh.="<input type='button' class='btn_add' data-id='".$result_cart[$i_gioh]['productid']."' name='btn_add' value='+'>";*/
			$result_gioh.="</div>";
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
		$result_gioh.="<input type='hidden' id='spluongsp' name='soluongsp' value='0'>";
		$result_gioh.="<input type='hidden' id='tongtien' name='tongtien' value='0'>";
	}
	$result_gioh.="<div class='clearfix'></div>";
	echo "".$result_gioh;
?>
