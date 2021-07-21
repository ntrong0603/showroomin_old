<?php

$time=time();

$d->query("select DISTINCT  id_sp from table_giaphong where ketthuc > ".$time );
$place=$d->result_array();



$d->query("select * from table_baiviet where  loaitin='guaranteed-group-bike-tours'" );
						$chitiet=$d->fetch_array();
						
$title = $chitiet['title'];
	if( $title=='' ){
	$title = $chitiet['ten'];}
	$description = $chitiet['description'];
	$keyword = $chitiet['keywords'];
	$title_bar = $chitiet['ten'];
?>