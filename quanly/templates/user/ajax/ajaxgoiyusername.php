<?php
@define ( '_lib' , '../../../lib/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);

	$str=trim($_GET['username']);
	$sql_username="select * from table_user where role=1  and username like "."'%".$str."%' limit 10";
	
	$username=mysql_query($sql_username);
	$arrusername=array();
	while($row=mysql_fetch_array($username)){
		if($row['username']!=''){
			$arrusername[]=$row['username']."";
		}
	}
	$str='';
	for($i=0;$i<count($arrusername);$i++)
	{
		$str.='<li><a id="a-goiy"  onclick="layusername(this.text)">'.$arrusername[$i].'</a></li>';
	}
	echo $str;
?>