<style>
.userimg{
	padding: 0px 10px;
}
.thongketruycap{
	color:red;
	text-transform:uppercase;
	text-align:center;
	font-size: 18px;
}
.thongketruycap2{
	white-space:nowrap;
	font-size:15px;
}
.dauhaicham{
padding-left: 10px;
padding-right: 20px;
}

</style>
<?php


$time_now = time();    // lưu thời gian hiện tại
$time_out = 60; // khoảng thời gian chờ để tính một kết nối mới (tính bằng giây)
$ip_address = $_SERVER['REMOTE_ADDR'];    // lưu lại IP của kết nối



// kiểm tra xem thời gian hiện tại so với lần truy cập cuối có lớn hơn khoảng thời gian chờ không
    //- nếu không thì thôi
    //- nếu có thì thêm vào như là một kết nối mới
	$sql="SELECT * FROM `counter2`  WHERE UNIX_TIMESTAMP(last_visit) + $time_out > $time_now AND 'ip_address' = '$ip_address'";
	
if ( !mysql_num_rows(mysql_query($sql))){
mysql_query("INSERT INTO `counter2`  VALUES ('$ip_address', NOW())");}

// đếm số người đang online
$online = mysql_num_rows(mysql_query("SELECT 'ip_address' FROM `counter2`  WHERE UNIX_TIMESTAMP(last_visit) + $time_out > $time_now"));

// đếm số người ghé thăm trong ngày (từ 0h ngày hôm đó đến thời điểm hiện tại)
$day = mysql_num_rows(mysql_query("SELECT 'ip_address' FROM `counter2`  WHERE DAYOFYEAR(last_visit) = " . (date('z') + 1) . " AND YEAR(last_visit) = " . date('Y')));

// đếm số người ghé thăm ngay hôm qua 
$yesterday = mysql_num_rows(mysql_query("SELECT 'ip_address' FROM `counter2`  WHERE DAYOFYEAR(last_visit) = " . (date('z') + 0) . " AND YEAR(last_visit) = " . date('Y')));

// đếm số người ghé thăm trong tuần (từ 0h ngày thứ 2 đến thời điểm hiện tại)
$week = mysql_num_rows(mysql_query("SELECT 'ip_address' FROM `counter2`  WHERE WEEKOFYEAR(last_visit) = " . date('W') . " AND YEAR(last_visit) = " . date('Y')));

// đếm số người ghé thăm tuần trước
$lastweek = mysql_num_rows(mysql_query("SELECT 'ip_address' FROM `counter2`  WHERE WEEKOFYEAR(last_visit) = " . (date('W') - 1). " AND YEAR(last_visit) = " . date('Y')));

// đếm số người ghé thăm trong tháng
$month = mysql_num_rows(mysql_query("SELECT 'ip_address' FROM `counter2`  WHERE MONTH(last_visit) = " . date('n') . " AND YEAR(last_visit) = " . date('Y')));

// đếm số người ghé thăm trong năm
$year = mysql_num_rows(mysql_query("SELECT 'ip_address' FROM `counter2`  WHERE YEAR(last_visit) = " . date('Y')));

// đếm tổng số người đã ghé thăm
$visit = mysql_num_rows(mysql_query("SELECT 'ip_address' FROM `counter2` ")) +32302;


echo '<div class="thongketruycap2"><table>' ."" ;
 echo    " <tr><td><img src='./images/online.jpg' class='userimg' alt='' title='' /></td><td>Online</td><td><span class='dauhaicham' >:</span> " . $online . "</td></tr>" ;
 echo    " <tr><td><img src='./images/hits_today.jpg' class='userimg' alt='' title='' /></td><td>Hôm nay</td><td><span class='dauhaicham' >:</span> " . $day . "</td></tr>" ;
// echo    " <img src='/template/images/hits_today.jpg' class='userimg' alt='' title='' />Hôm qua: " . $yesterday . "<br />" ;
  echo   " <tr><td><img src='./images/hits_today.jpg' class='userimg' alt='' title='' /></td><td>Trong tuần</td><td><span class='dauhaicham' >:</span> " . $week . "</td></tr>" ;
 // echo   " <img src='/template/images/hits_today.jpg' class='userimg' alt='' title='' />Tuần trước: " . $lastweek . "<br />" ;
  echo   " <tr><td><img src='./images/hits_today.jpg' class='userimg' alt='' title='' /></td><td>Trong tháng</td><td><span class='dauhaicham' >:</span> " . $month . "</td></tr>" ;
  //echo   " <img src='/template/images/hits_today.jpg' class='userimg' alt='' title='' />Năm nay: " . $year . "</td>" ;
  echo   "<tr><td><img src='./images/hits.jpg' class='userimg' alt='' title='' /></td><td>Tổng cộng</td><td><span class='dauhaicham' >:</span> " . $visit."</td></tr>" ;
  echo   '</table></div>';

?> 
