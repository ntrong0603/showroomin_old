<?php




if( !isset( $_GET['id'] ) ){
						$d->query("select * from table_baiviet where  loaitin='thiet-ke'" );
						$chitiet=$d->fetch_array();
						
						
						$d->query("select * from table_news where  hienthi=1 and loaitin='thiet-ke' order by stt asc, id desc"  );
						
						$tinlienquan=$d->result_array();
}else{
	$a=$_GET['id'];
	$sql="select * from table_news where  tenkhongdau='".$a."'" ;
		$d->query($sql);
						$chitiet=$d->fetch_array();
						
						$d->query("select * from table_news where  hienthi=1 and loaitin='thiet-ke' and id_danhmuc=".$chitiet['id_danhmuc']." and id <> ".$chitiet['id']." order by stt asc, id desc"  );
						
						$tinlienquan=$d->result_array();
	
}

$title = $chitiet['title'];
	if( $title=='' ){
	$title = $chitiet['ten'];}
	$description = $chitiet['description'];
	$keyword = $chitiet['keywords'];
	$title_bar = $chitiet['ten'];
?>