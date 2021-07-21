<?php  if(!defined('_source')) die("Error");

				function hamsosanhtoado($a, $b) {
				$producta = intval($a['product']);
				$productb = intval($b['product']);
				
				if ($producta == $productb) {
				 return 1;
				 }
				 return ($producta > $productb) ? 1 : -1;    
				}
				function hamsosanhdiem($a, $b) {
				$producta = intval($a['product']);
				$productb = intval($b['product']);
				
				if ($producta == $productb) {
				 return 1;
				 }
				 return ($producta < $productb) ? 1 : -1;    
				}
//==============PHÂN TÍCH TỪ KHÓA======================
	ini_set('memory_limit', '-1');			
	$string=$_GET['find'];			
	$a= explode(" ",$string);			
	$tam=$a;			
	$num=count($a);			
	$all=pow($num,$num);	
		//Tổ hợp từ
	for($i=0;$i<$all;$i++){			
				
				
		for($j=0;$j<$num;$j++){		
			$a[]=$a[$i]." ".$a[$j];	
				
		}		
				
				
	}			
		
				// lọc từ trùng 		
		for($i=0;$i<count($a);$i++){				
			$ok=1;			
			for($j=0;$j<count($tam);$j++){			
				if( substr_count($a[$i],$tam[$j])>=2){		
						
					$ok=0;	
				}		
						
			}			
			if( $ok==1 ){			
				$c[]=$a[$i];		
						
			}			
	}			
				//tính điểm
	for($i=0;$i<count($c);$i++){				
		$score[$i]['word']=$c[$i];			
		if( substr_count($string,$c[$i])>=1){			
					
		$score[$i]['score']=count(explode(" ",$c[$i]))/count($tam);			
				
		}else{			
		$score[$i]['score']=count(explode(" ",$c[$i]))/count($tam)/1.75;	
					
		}			
				
					
					
		}	
		//sắp xếp
	function sapxep (&$array, $key) {
		$sorter=array();
		$ret=array();
		reset($array);
		foreach ($array as $ii => $va) {
			$sorter[$ii]=$va[$key];
		}
		arsort($sorter);
		foreach ($sorter as $ii => $va) {
			$ret[$ii]=$array[$ii];
		}
		$array=$ret;
	}

	sapxep($score,"score");
	
				
	//	echo "<pre>";
	// print_r	($score);	
	//=================================================== phân tích từ khóa

$ketqua=array();
$place=array();
	foreach($score as $v){
		unset($place);
		$place=array();
		 $_GET['find']=$v['word'];
		
		if( isset( $_POST['loaiketqua'] ) ){
			$loai=$_POST['loaiketqua'];
			if( $loai<>0 ){
				$ta=Explode('-',$_POST['khoanggia'.$loai]);
				$giamin=$ta[0]*1000000;
				$giamax=$ta[1]*1000000;
				
			}
			
			
		}else{
			$loai=0;
		}
	
		

		$tam1=str_replace(",","", $_GET['toado']);
		
		$tam1=str_replace(".","", $tam1);
		if(  $_GET['toado']!='' and is_numeric($tam1) and !is_numeric($_GET['toado']) ){
			$timtheotoado= true;
			
		}else{
			$timtheotoado= false;
		}
		if($_GET['toado']!=='' and $timtheotoado==false and !isset( $_GET['tinh'] )and !isset( $_GET['huyen'] )and !isset( $_GET['duong'] )){
			transfer("Vị trí bạn chọn không tồn tại. Bạn có thể thử chọn trên Bản đồ hoặc Gợi ý", "index.html");
			
		}

		
			
		//***************Place************************
	if( $loai<>2 ){
	if($timtheotoado){
			
			
			$toado=explode(',',$_GET['toado']);
			$lat=$toado[0];
			$lng=$toado[1];
			$distance = 20; 
			$select=", (SQRT(POW((lat - $lat), 2) + POW((lng - $lng), 2)) * $multiplier) AS product " ;
			
			
			}else{
			$select=", (select count(*) from table_review where table_review.id_place=table_place.id )*5 + luotxem as product " ;
		}
				$sql = "select * ".$select." from table_place where hienthi=1 ";	
					// product là điểm tiêu chí  short
		if(isset($_GET['find'])){
			$find =  $_GET['find'];
			
			$find = trim(strip_tags($find));    	
    		if (get_magic_quotes_gpc()==false) {
    			$find = mysql_real_escape_string($find);    			
    		}
								
			$sql = $sql." and (ten  LIKE '%$find%') ";	
		}	
		if(isset($_GET['cate'])){			
			$sql = $sql." and id_danhmuc= ".$_GET['cate'];	
		}
		if(isset($_GET['tinh'])){
		
			$sql = $sql." and id_tinh= ".$_GET['tinh'];	
		}
		if(isset($_GET['huyen'])){
			
			$sql = $sql." and id_huyen= ".$_GET['huyen'];	
		}
		if(isset($_GET['xa'])){
			
			$sql = $sql." and id_phuong= ".$_GET['xa'];	
		}
		if(isset($_GET['duong'])){
			
			$sql_place="select * from table_place where id =".$_GET['duong'];
				$tam=mysqli_query($d, $sql_place);
				$tamtam=mysqli_fetch_array($tam);
				
			
			$sql = $sql." and diadiem= '".$tamtam['diadiem']."'";	
		}
		if( isset( $giamin ) ){
				$sql = $sql." and ( giacu < ".$giamax." and gia > ".$giamin.") ";	
			
		}
		if( $loai==1 ){
			$sql=$sql." and concept<>0 ";
		}
		if( $timtheotoado ){
			
			
			$sql= $sql." and POW((lat - $lat), 2) + POW((lng - $lng), 2) < POW(($distance / $multiplier), 2) ";
			;}

			$sql.=" order by stt,id desc";
			
			$d->query($sql);
			$place = $d->result_array();
			
	}
		//*****************Product**********************				
		if( $loai<>1 ){

		$sql_product = "select * from table_product where hienthi=1 ";	
		
		if(isset($_GET['find'])){
			$find =  $_GET['find'];
			
			$find = trim(strip_tags($find));    	
    		if (get_magic_quotes_gpc()==false) {
    			$find = mysql_real_escape_string($find);    			
    		}
								
			$sql_product = $sql_product." and (ten  LIKE '%$find%') ";	
		}
		if(isset($_GET['cate'])){		
				//list những Place có trong này, where product có trong các place đó
				$d->query("select id from table_place where id_danhmuc=".$_GET['cate']);
				$tamp=$d->result_array();
					$aray_id="0";
			for($i=0; $i<count($tamp);$i++){
					$aray_id.=",".$tamp[$i]['id'];
				}
				$sql_product = $sql_product." and id_place IN (".$aray_id.")";	
		}
		if(isset($_GET['pcate'])){			
			$sql_product = $sql_product." and id_danhmuc= ".$_GET['pcate'];	
		}
		if(isset($giamin)){			
			$sql_product = $sql_product." and ( gia BETWEEN ".$giamin." AND ".$giamax.") ";	
		}		
	
			$sql_product.=" order by stt,id desc";
			//print_r($_GET);
			//echo $sql_product;
			$d->query($sql_product);
			$result_product = $d->result_array();	
	}
			if(count($result_product)>0){
		for($i=0; $i<count($result_product);$i++){
			
			if( $timtheotoado ){
				$select=", (SQRT(POW((lat - $lat), 2) + POW((lng - $lng), 2)) * $multiplier) AS product " ;
			}else{
			 $select=", (select count(*) from table_review where table_review.id_place=".$result_product[$i]['id_place']." )*4+".$result_product[$i]['luotxem']." as product ";
			}
			$sql_tam="select * ".$select." from table_place where id=".$result_product[$i]['id_place'];
			if( $timtheotoado){
				
				$sql_tam= $sql_tam." and POW((lat - $lat), 2) + POW((lng - $lng), 2) < POW(($distance / $multiplier), 2) ";
			}
				if(isset($_GET['tinh'])){
			
				$sql_tam = $sql_tam." and id_tinh= ".$_GET['tinh'];	
				}
				if(isset($_GET['huyen'])){
					
					$sql_tam = $sql_tam." and id_huyen= ".$_GET['huyen'];	
				}
				if(isset($_GET['xa'])){
					
					$sql_tam = $sql_tam." and id_phuong= ".$_GET['xa'];	
				}
				if(isset($_GET['duong'])){
					
					$sql_place="select * from table_place where id =".$_GET['duong'];
						$tam=mysqli_query($d, $sql_place);
						$tamtam=mysqli_fetch_array($tam);
						
					
					$sql_tam = $sql_tam." and diadiem= '".$tamtam['diadiem']."'";	
				}
			$d->query($sql_tam);
			$tam=$d->fetch_array();
			if(count($tam)>1){
			
			$tam['product_detail']=$result_product[$i];
			if( isset( $_GET['pcate']) and !$unset  ){
				unset($place); 
				$place = array();
				$unset=1;
			}
			array_push($place, $tam);
			}
			}		
			}
				
			if( !isset( $_GET['pcate'] ) ){
				
				if( $timtheotoado ){
					usort($place, "hamsosanhtoado");	
				}else{
					
					usort($place, "hamsosanhdiem");	
				}
			}
			
			$r=0;
			foreach ($place as $k=>$v){
				if(in_array($v,$ketqua)){
					
				}else{
					array_push($ketqua,$v);
					$r++;
				}
				
			}
			
		
//echo $r;
		//echo $_GET['find']."</br>";
}
			//echo count($ketqua);
			unset($place);
			$place=$ketqua;
				if( $loai==0 ){
			$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
			$url=getCurrentPageURL();
			$maxR=7;
			$maxP=10;
			$paging=paging($place, $url, $curPage, $maxR, $maxP);
			$place=$paging['source'];		
				}
		for($i=0; $i<3;$i++){
			$a= rand(0,count($ketqua)-1 );
			array_push($place,$ketqua[$a]);
			
		}
?>