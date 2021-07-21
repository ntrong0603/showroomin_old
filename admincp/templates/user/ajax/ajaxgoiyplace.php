<?php
@define ( '_lib' , '../../../lib/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);

	$str=trim($_GET['place']);
	 $sql_place="select * from table_place where  ten like "."'%".$str."%' limit 10";
	
	$place=mysql_query($sql_place);
	$arrplace=array();
	$str="";
	while($row=mysql_fetch_array($place)){
		
		$str.='<li><a id="a-goiy2" onclick="layplace(this.innerHTML)"><span class="item-place">
		<input type="hidden" name="place[]" value="'.$row['id'].'" >
		'.$row['ten'].'
		<span class="x-btn"></span>
		</span></a></li>';
	}
	echo $str;
?>