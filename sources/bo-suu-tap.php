   <?php 
					
if( isset( $_GET['id'] ) ){
	$tam=explode("-",$_GET['id'])	;
	$id=end($tam);
$d->query("select * from table_album where hienthi=1 and id=".$id."  " );
						$chitietalbum=$d->fetch_array();
						$chitiet=$chitietalbum;
						$d->query("select * from table_hinhalbum where hienthi=1 and id_sp=".$id." order by stt asc, id desc " );
						$dichvu=$d->result_array();
						
}else{
	
					$d->query("select * from table_album where hienthi=1 and noibat=1  order by stt asc, id desc " );
						$dichvu=$d->result_array();
					
					$d->query("select * from table_baiviet where loaitin='bo-suu-tap'  " );
						$chitiet=$d->fetch_array();
						
						
}
$title = $chitiet['title'];
	if( $title=='' ){
	$title = $chitiet['ten'];}
	$description = $chitiet['description'];
	$keyword = $chitiet['keywords'];
	$title_bar = $chitiet['ten'];
						?>