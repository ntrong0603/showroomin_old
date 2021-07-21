<?php 
	@define ( '_lib' , './lib/');

	include_once "../../quanly/lib/config.php";
	include_once "../../quanly/lib/constant.php";
	include_once "../../quanly/lib/class.database.php";
	include_once "../../quanly/lib/functions.php";
	include_once "../../quanly/lib/functions_giohang_2.php";
	include_once "../../quanly/lib/file_requick.php";

	$id=$_POST['id'];
	
	$sql="select * from table_product where hienthi=1 and id_danhmuc='".$id."' order by stt asc, id desc";
	$d->query($sql);
	$result=$d->result_array();
	$result2="";
	$result2.="<div id='regular1'>";
	$dem=0;
	if(count($result)>0){
		for($i=0;$i<count($result);$i++){
			$dem++;
			$new_price=$result[$i]['gia']-($result[$i]['khuyenmai']*$result[$i]['gia'])/100;
			$result2.="<div class='col-xs-6 col-md-6 item'>";
			$result2.="<div class='col-xs-12 sanpham'>";
			/*$result2.="<div class='bkg-sale'></div>";
			$result2.="<div>";
			$result2.="<h1 class='sale'>".$result[$i]['khuyenmai']."%</h1>";
			$result2.="</div>";*/
			$result2.="<div class='col-xs-12' style='padding: 0px;'>";
			$result2.="<a href='javascript:void(0)' class='xemchitiet' style='background-color: inherit;padding: inherit;' data-id='".$result[$i]['id']."'>";
			$result2.="<img src='./../../"._upload_sanpham_l.$result[$i]['photo']."' width='100%' alt='sản phẩm' title='sản phẩm'>";
			$result2.="</a>";
			$result2.="</div>";
			$result2.="<div class='col-xs-12' style='padding: 0px;'>";
			$result2.="<h2 class='title_product'>";
			$result2.="<a href='javascript:void(0)' class='xemchitiet' style='background-color: inherit;padding: inherit;font-size: 14px;float:inherit;font-weight:bold;' data-id='".$result[$i]['id']."'>";
			$result2.=$result[$i]['ten'];
			$result2.="</a>";
			$result2.="</h2>";
			
			$result2.="</div>";
			$result2.="<div class='col-xs-12 giamoi' style='padding: 0px;'>";
			$result2.="<span class='price-new' style='color:#ea1d23;'>".number_format($new_price,0,'','.')." VNĐ</span>";
			$result2.="<div class='clearfix'></div>";
			$result2.="</div>";
			if($result[$i]['khuyenmai']>0){
			$result2.="<div class='col-xs-12 giacu' style='padding: 0px;'>";
			$result2.="<span class='price-old'>".number_format($result[$i]['gia'],0,'','.')." VNĐ</span>";
			$result2.="<div class='clearfix'></div>";
			$result2.="</div>";
			}
			else{
			$result2.="<div class='col-xs-12 giacu' style='padding: 0px;'>";
			$result2.="<span class='price-old'><br/></span>";
			$result2.="<div class='clearfix'></div>";
			$result2.="</div>";
			}
			$result2.="<div class='col-xs-12' style='padding: 0px;'>";
			$result2.="<div class='col-xs-12' style='background-color: #ff0000;padding: 0.3em;text-align: center;'>";
			$result2.="<a href='javascript:void(0)' data-id='".$result[$i]['id']."' class='bt-cart dathang'>MUA NGAY</a>";
			$result2.="</div>";
			$result2.="<div class='col-xs-12' style='text-align:center; margin-top:0.3em;    background-color: #eeeeee;    padding: 0.3em;'>";
			$result2.="<a href='javascript:void(0)' class='xemchitiet' style='color:#353535;' data-id='".$result[$i]['id']."'>XEM CHI TIẾT</a>";
			$result2.="<div class='clearfix'></div>";
			$result2.="</div>";
			$result2.="<div class='clearfix'></div>";
			$result2.="</div>";
			$result2.="</div>";
			$result2.="</div>";

			if($dem==2){
				$result2.="<div class='clearfix'></div>";
			}
		}
		$result2.="</div>";
		echo $result2;
	}
	else{
		echo "<div class='col-xs-12' style='color:#df0024;font-size:1.5em; text-align: center;'>Gian hàng đang cập nhật</div>";
	}

?>