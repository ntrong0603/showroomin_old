<?php
@define ( '_lib' , '../../../lib/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);

	$str=trim($_GET['diadiem']);
	$sql_diadiem="select * from table_place where diadiem like "."'%".$str."%' limit 10";
	//SELECT * FROM `table_place` WHERE `diadiem` like '%a%' 
	$diadiem=mysql_query($sql_diadiem);
	$arrdiadiem=array();
	while($row=mysql_fetch_array($diadiem)){
		if($row['diadiem']!=''){
			$arrdiadiem[]=$row['diadiem'];
		}
	}
	$str='';
	for($i=0;$i<count($arrdiadiem);$i++)
	{
		$str.='<li><a onclick="laydiadiem(this.text)">'.$arrdiadiem[$i].'</a></li>';
	}
	echo $str;
?>