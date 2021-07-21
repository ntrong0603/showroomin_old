<?php
$keyword = 'Thông tin về các tin đã đăng';
$description = 'Thông tin về các tin đã đăng';
$title_bar='Thông tin về các tin đã đăng';	
if( is_array($_SESSION['user'])){
	$d->reset();
	$sql="select * from #_place where hienthi = 1 and id_cus = ".$_SESSION['user']['id']." order by id,stt";
	$d->query($sql);
	$place_tin=$d->result_array();
}
			
			
?>