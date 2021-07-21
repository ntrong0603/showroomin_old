<?php 
	session_start ();

	@define ( '_lib' , './lib/');

	include_once "../../quanly/lib/config.php";
	include_once "../../quanly/lib/constant.php";
	include_once "../../quanly/lib/class.database.php";
	include_once "../../quanly/lib/functions.php";
	include_once "../../quanly/lib/functions_giohang.php";
	include_once "../../quanly/lib/file_requick.php";

	
	
	$act = $_POST['act'];

	switch($act){
		case "add_cart_item":
			add_cart_item();
			break;

		case "delete_cart_item":		
			delete_cart_item();
			break;

		case "cart_destroy":		
			cart_destroy();
			break;

		case "get_total_cart":
			get_total_cart();
			break;

		case "change_number":		
			change_number();
			break;

		default:
			die('Error!!!!!');
	}

	function add_cart_item(){
		$pid=$_POST['idsp'];
		$q=$_POST['number'];
		addtocart($pid,$q);
	}

	function delete_cart_item(){
		$pid=$_POST['idsp'];
		remove_product($pid);
	}

	function cart_destroy(){
		$_SESSION['cart'] = array();
		delete_GioHangTam();
	}

	function change_number(){
		
		$pid=$_POST['idsp'];
		$q=$_POST['number'];

		update_qty($pid,$q);
	}
	function get_total_cart(){
		$total=get_total();
		echo "".$total;
	}

?>
