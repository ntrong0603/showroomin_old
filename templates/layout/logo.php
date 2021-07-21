<?php
	$d->reset();
	$sql = "select * from #_place_danhmuc where hienthi = 1";
	$d->query($sql);
	$pro_danhmuc = $d->result_array();
	
	
?>

<a href="./index.php" title="link home"><img src="./upload/hinhanh/<?php echo $banner['photo'];?>" alt="logo web" style='height: 50px;'></a>
                      