<?php 

	$arr_id=explode( '-' , $_GET['id']);
	$id=$arr_id[count($arr_id)-1];

	$d->reset();
	$d->setTable('brand');
	$d->setWhere('id',$id);
	$d->select();
	$thuonghieu=$d->fetch_array();
	
	$sql='SELECT * FROM `table_hinhsp` where id_sp="'.$id.'" and com="brand" and hienthi=1 ORDER BY `id` DESC';
	$d->query($sql);
	$slider_thuonghieu = $d->result_array();
	
	$sql='SELECT * FROM `table_place` where brand="'.$id.'" and hienthi=1 ORDER BY stt asc, id DESC';
	$d->query($sql);
	$places=$d->result_array();
	
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=$com."/".$thuonghieu['tenkhongdau']."-".$thuonghieu['id'].".html";
	$maxR=6;
	$maxP=5;
	$paging=paging($places, $url, $curPage, $maxR, $maxP);
	$places=$paging['source'];
	

?>