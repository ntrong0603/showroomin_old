<?php
	function get_place_name($pid){
		global $d, $row;
		$sql = "select ten from #_place where id=$pid";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row['ten'];
	}
	
	function get_pro_img($pid){
		global $d, $row;
		$sql = "select thumb from #_place where id=$pid";
		$d->query($sql);
		$row = $d->fetch_array();
		return $row['thumb'];
	}
	
	function get_price($pid){
		global $d, $row;
		$sql = "select gia,kichthuoc from table_place where id=$pid";
		$d->query($sql);
		$row = $d->fetch_array();
		if($row['kichthuoc']!=0)
			return $row['kichthuoc'];
		else
			return $row['gia'];
	}
	function remove_place($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['placeid']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	function get_order_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['placeid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			$sum+=$price*$q;
		}
		return $sum;
	}
	
	function get_total(){
		$max=count($_SESSION['cart']);
		
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['placeid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$sum+=$q;
		}
		return $sum;
	}
	
	
	function addtocart($pid,$q){
		if($pid<1 or $q<1) return;
		
		if(is_array($_SESSION['cart'])){
			if(place_exists($pid)) return;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['placeid']=$pid;
			$_SESSION['cart'][$max]['qty']=$q;
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['placeid']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
		}
	}
	function place_exists($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['placeid']){
				$flag=1;
				break;
			}
		}
		return $flag;
	}

?>