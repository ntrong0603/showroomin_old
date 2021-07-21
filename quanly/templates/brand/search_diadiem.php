<?php 
	//lay từ khóa cần tìm kiếm
if(isset($_GET['term']))
{

	$key = $_GET['term'];
	$sql = "select * from #_brand where diadiem like'".$key."'";
	$item = mysql_query($sql);
	while ($row = @mysql_fetch_array($item)) {
        $results[] = array('label' => $row['diadiem']);
    }
	//trả về dữ liệu dạng json
	echo json_encode($results);
}
?>
