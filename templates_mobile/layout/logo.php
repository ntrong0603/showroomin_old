<?php
	$d->reset();
	$sql = "select * from #_place_danhmuc where hienthi = 1";
	$d->query($sql);
	$pro_danhmuc = $d->result_array();
	
	
?>

<a href="./index.php" title="link home"><img id='logo-top' src="./upload/hinhanh/<?php echo $banner['photo'];?>" alt="logo web" ></a>
                      