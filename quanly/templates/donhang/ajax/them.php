<?php
	session_start();
@define ( '_lib' , '../../../lib/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";
		


?>
	<div id='item' class='' > 
			<input name="cart[masp][]" class='masp' placeholder='Mã sản phẩm' value="" type="text" size="10"   />	
			<input name="cart[soluong][]" class='soluong' placeholder='số lượng' value="" type="text" size="10"   />	
			<input name="cart[ten][]" class='tensp'  placeholder='Tên sản phẩm'  value="" type="text" readonly size="40"   />
			<input name="cart[giaban][]" class='giaban' placeholder='Đơn giá' value="" type="text" size="10"   />	
			<input name="cart[tongia][]" class='tonggia' placeholder='Thành tiền' value="" type="text" size="20"   />	
			<input type="button" value="Delete" class="btn xoathem" />
		</div>
		
	