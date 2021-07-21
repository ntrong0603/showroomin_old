<?php if(!defined('_lib')) die("Error");
#
#	$id_connect : ket noi database
#
/*
function get_sanpham($table,$id_danhmuc=0){
	global $d;
	$sql=' Select* from '.$table.' ';
	
	$danhmuc=get_danhmuc($id_danhmuc);
	
	foreach ($danhmuc as $key => $value){
		for($i=0;$i<count($value);$i++){
			echo $value[$i]['id'];
			
		}
   
	}
	
	$sql.=" order by stt asc, id desc";
	
}
function get_danhmuc($table,$id_danhmuc=0){
	global $d;
	if( $id_danhmuc>0 ){
		$sql="select * from ".$table." where id=".$id_danhmuc." order by stt asc, id desc";;
		$d->query($sql);
		$danhmuc= $d->result_array();
		$result[$danhmuc['id_parent']]=$danhmuc;
		$sql="select * from ".$table." where id_parent=".$id_danhmuc." order by stt asc, id desc";;
		$d->query($sql);
		$result[$id_danhmuc]=$d->result_array();
		if(count ($result[$id_danhmuc])>0){
		for($i=0;$i<count($result[$id_danhmuc]);$i++){
			get_danhmuc($result[$id_danhmuc][$i]);
		}
		}
		
	}
	return $result;
}
*/
function avatar_user($id){
	global $d;
	$sql="select * from table_user where id=".$id;
	$d->query($sql);
	$tam=$d->fetch_array();
	if($tam['avatar']!=''){
		return "./upload/avatar/".$tam['avatar'];
	}else{
		return "./images/avatar.png";
	}
}
function ten_user($id){
	global $d;
	$sql="select * from table_user where id=".$id;
	$d->query($sql);
	$tam=$d->fetch_array();
	if($tam['ten']!=''){
		return $tam['ten'];
	}else{
		return $tam['email'];
	}
}
function get_danhmucdacap($d, $id_parent='0'){

	$sql = "select * from table_place_category where id_parent=".$id_parent;
	$sql.=" order by id desc";
	$d->query($sql);
	
	$arrdanhmuc=$d->result_array();
	for($i=0;$i<count($arrdanhmuc);$i++){
		$arrdanhmuc[$i]['sub']=get_danhmucdacap($d,$arrdanhmuc[$i]['id']);
	}
	return $arrdanhmuc;
}
function demdanhmuc($danhsachmuc){
	$maxsub=1;
	for($i=0;$i<count($danhsachmuc);$i++)
	{
		$countsub=1;
		if(!empty($danhsachmuc[$i]['sub'])){
			$countsub+=demdanhmuc($danhsachmuc[$i]['sub']);
		}
		if($maxsub<$countsub){
			$maxsub=$countsub;
		}
	}
	return $maxsub;
}
function get_dsdanhmuccha($id_danhmuc){
	global $d;
	$sql="select * from table_place_category where id=".$id_danhmuc;
	$d->query($sql);
	$dmuc=$d->fetch_array();
	$arrdmuccha=array();
	$arrdmuccha[]=$dmuc;
	if($dmuc['id_parent']!=0)
	{
		$arrdmuccha=array_merge($arrdmuccha,get_dsdanhmuccha($dmuc['id_parent']));
	}
	return $arrdmuccha;
}
function get_icon($id_danhmuc=0){
	global $d;
	if( $id_danhmuc>0 ){
		$sql="select * from table_place_category where id=".$id_danhmuc." order by stt asc, id desc";;
		$d->query($sql);
		$danhmuc= $d->fetch_array();
		
		$result=$danhmuc['thumb'];
		
	}else{
		$result="No image";
	}
	return $result;
}
function  chuyentien($num){
	global $d;
	$len= strlen($num);

	if( $len>=1 ){
		$donvi=" đồng ";
		$break=0;
	}	
	if( $len>=4 ){
		$donvi=" ngàn ";
		$break=0;
	}
	if( $len>=7 ){
		$donvi=" triệu ";
		$break=3;
	}
	if( $len>=10 ){
		$donvi=" tỷ ";
		$break=6;
	}

	
	
	$num2= substr($num,0,$len-$break-3);
	$num3= substr($num,$len-$break-3,3);
	
	if( $num3=="000" ){$num3="";}else{
		if( substr($num3,1,2)=='00' ){
			$num3=substr($num3,0,1);
			
		}
			
		$num3=",".$num3;
		
		
		}
	$ketqua=$num2.$num3.$donvi;
	
	return $ketqua;
}
function diachi($id_tinh=0,$id_huyen=0,$id_xa=0){
	$result='';
	if( $id_xa>0 ){
		$result.=get_ten("table_tinhthanh_cat",$id_xa).", ";		
	}
	
	if( $id_huyen>0 ){
		$result.=get_ten("table_tinhthanh_list",$id_huyen).", ";		
	}
	
	if( $id_tinh>0 ){
		$result.=get_ten("table_tinhthanh_danhmuc",$id_tinh);		
	}
	return($result);
}
function get_ten($table,$id){
	global $d;
	 $sql="select * from ".$table." where id=".$id." order by stt asc, id desc";;
		$d->query($sql);
		$item= $d->result_array();
	if( count($item)>0 ){
		return($item[0]['ten']);
		
	}else{
		return('Unknow');
	}
	
}
function get_tenkhongdau($table,$id){
	global $d;
	 $sql="select * from ".$table." where id=".$id." order by stt asc, id desc";;
		$d->query($sql);
		$item= $d->result_array();
	if( count($item)>0 ){
		return($item[0]['tenkhongdau']);
		
	}else{
		return('chua-chon-tinh-thanh');
	}
	
}
function remove_tin($pid){
		global $d;
		$pid=intval($pid);
		$sql = "delete from table_place where id = $pid";
		$d->query($sql);
		
	}
function remove_all_tin($user){
		global $d;
		$user=intval($user);
		$sql = "delete from table_place where id_cus = $user";
		$d->query($sql);
		
	}
function checklinkdanhmuc($url){
	global $d,$item;
$sql="SELECT tenkhongdau FROM table_place_cat union 
SELECT tenkhongdau FROM table_url union 
SELECT tenkhongdau FROM table_thuoctinh union 
SELECT tenkhongdau FROM table_place_category union 
SELECT tenkhongdau FROM table_news_cat union 
SELECT tenkhongdau FROM table_news_category  
"	;
	$d->query($sql);
	$result=$d->result_array();
	$tam=0;
	foreach($result as $key => $val)
		{
			
			if( $val['tenkhongdau']==$url ){
				$tam=1;
			}
		}
		
		if( $tam==0 ){return false;}else
		{return true;}
	
}

function checksp($url){
	global $d,$item;
$sql="SELECT tenkhongdau FROM table_place"	;
	$d->query($sql);
	$result=$d->result_array();
	$tam=0;
	foreach($result as $key => $val)
		{
			
			if( $val['tenkhongdau']==$url ){
				$tam=1;
			}
		}
		
		if( $tam==0 ){return false;}else
		{return true;}
	
}
function checklink($url){
	global $d;
$sql="SELECT tenkhongdau FROM table_place union 
SELECT tenkhongdau FROM table_news union
SELECT tenkhongdau FROM table_place_cat union 
SELECT tenkhongdau FROM table_url union 
SELECT tenkhongdau FROM table_thuoctinh union 
SELECT tenkhongdau FROM table_place_category union 
SELECT tenkhongdau FROM table_news_cat union 
SELECT tenkhongdau FROM table_news_category union 
SELECT tenkhongdau FROM table_baiviet "	;
	$d->query($sql);
	$result=$d->result_array();
	$tam=0;
	foreach($result as $key => $val)
		{
			
			if( $val['tenkhongdau']==$url ){
				$tam=1;
			}
		}
		
		if( $tam==0 ){return false;}else
		{return true;}
	
}
function checklinktintuc($url,$loaitin){
	global $d;
	$sql="SELECT tenkhongdau ,'list' as suf FROM table_news_category where loaitin = '".$loaitin."' union 
	SELECT tenkhongdau ,'danhmuc' as suf FROM table_news_category where loaitin = '".$loaitin."'"	;
	$d->query($sql);
	$result=$d->result_array();
	$tam=0;
	foreach($result as $key => $val)
		{
			
			if( $val['tenkhongdau']==$url ){
				$tam=1;
				$ketqua['table']='news';
				$ketqua['tablesuf']=$val['suf'];
			
			}
		}
		
		if( $tam==0 ){return false;}else
		{return $ketqua;}
	
}
function checktt($url,$loaitin){
	global $d;
	$sql="SELECT tenkhongdau FROM table_news where loaitin = '".$loaitin."'" ;
	$d->query($sql);
	$result=$d->result_array();
	$tam=0;
	foreach($result as $key => $val)
		{
			
			if( $val['tenkhongdau']==$url ){
				$tam=1;
				$ketqua['table']='news';
				
			
			}
		}
		
		if( $tam==0 ){return false;}else
		{return $ketqua;}
	
}

function checklinkurl($url){
	global $d;
$sql="SELECT tenkhongdau  FROM table_url"	;
	$d->query($sql);
	$result=$d->result_array();
	$tam=0;
	foreach($result as $key => $val)
		{
			
			if( $val['tenkhongdau']==$url ){
				$tam=1;
				$ketqua['table']='baiviet';
				
			
			}
		}
		
		if( $tam==0 ){return false;}else
		{return $ketqua;}
	
}

function checklinkthuoctinh($url){
	global $d;
$sql="SELECT tenkhongdau ,id FROM table_thuoctinh"	;
	$d->query($sql);
	$result=$d->result_array();
	$tam=0;
	foreach($result as $key => $val)
		{
			
			if( $val['tenkhongdau']==$url ){
				$tam=1;
				$ketqua['table']='place';
				$ketqua['thuoctinh']=$val['id'];
			
			}
		}
		
		if( $tam==0 ){return false;}else
		{return $ketqua;}
	
}
function checklinksanpham($url){
	global $d;
$sql="SELECT tenkhongdau ,'cat' as suf FROM table_place_cat union 
SELECT tenkhongdau ,'danhmuc' as suf FROM table_place_category"	;
	$d->query($sql);
	$result=$d->result_array();
	$tam=0;
	foreach($result as $key => $val)
		{
			
			if( $val['tenkhongdau']==$url ){
				$tam=1;
				$ketqua['table']='place';
				$ketqua['tablesuf']=$val['suf'];
			}
		}
		
		if( $tam==0 ){return false;}else
		{return $ketqua;}
	
}
function tien($number, $fractional=false) {  
    if ($fractional) {  
        $number = sprintf('%.2f', $number);  
    }  
    while (true) {  
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);  
        if ($replaced != $number) {  
            $number = $replaced;  
        } else {  
            break;  
        }  
    }  
    return $number;  
} 
function magic_quote($str, $id_connect=false)	
{	
	if (is_array($str))
	{
		foreach($str as $key => $val)
		{
			$str[$key] = escape_str($val);
		}
		
		return $str;
	}
	
	if (is_numeric($str)) {
		return $str;
	}
	
	if(get_magic_quotes_gpc()){
		$str = stripslashes($str);
	}

	if (function_exists('mysql_real_escape_string') AND is_resource($id_connect))
	{
		return mysql_real_escape_string($str, $id_connect);
	}
	elseif (function_exists('mysql_escape_string'))
	{
		return mysql_escape_string($str);
	}
	else
	{
		return addslashes($str);
	}
}

#
#	$id_connect : ket noi database
#
function escape_str($str, $id_connect=false)	
{	
	if (is_array($str))
	{
		foreach($str as $key => $val)
		{
			$str[$key] = escape_str($val);
		}
		
		return $str;
	}
	
	if (is_numeric($str)) {
		return $str;
	}
	
	if(get_magic_quotes_gpc()){
		$str = stripslashes($str);
	}

	if (function_exists('mysql_real_escape_string') AND is_resource($id_connect))
	{
		return "'".mysql_real_escape_string($str, $id_connect)."'";
	}
	elseif (function_exists('mysql_escape_string'))
	{
		return "'".mysql_escape_string($str)."'";
	}
	else
	{
		return "'".addslashes($str)."'";
	}
}

// dem so nguoi online //
/////////////////////////
function count_online(){
/*
CREATE TABLE 'camranh_online' (
  'id' int(10) unsigned NOT NULL auto_increment,
  'session_id' varchar(255) NOT NULL,
  'time' int(10) unsigned NOT NULL,
  PRIMARY KEY  ('id')
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
*/
	global $d;
	$time = 600; // 10 phut
	$ssid = session_id();

	// xoa het han
	$sql = "delete from #_online where time<".(time()-$time);
	$d->query($sql);
	//
	$sql = "select id,session_id from #_online order by id desc";
	$d->query($sql);
	$result['dangxem'] = $d->num_rows();
	$rows = $d->result_array();
	$i = 0;
	while(($rows[$i]['session_id'] != $ssid) && $i++<$result['dangxem']);
	
	if($i<$result['dangxem']){
		$sql = "update #_online set time='".time()."' where session_id='".$ssid."'";
		$d->query($sql);
		$result['daxem'] = $rows[0]['id'];
	}
	else{
		$sql = "insert into #_online (session_id, time) values ('".$ssid."', '".time()."')";
		$d->query($sql);
		$result['daxem'] = mysql_insert_id();
		$result['dangxem']++;
	}
	
	return $result; // array('dangxem'=>'', 'daxem'=>'')
}


function make_date($time,$dot='.',$lang='vi',$f=false){
	
	$str = ($lang == 'vi') ? date("d{$dot}m{$dot}Y",$time) : date("m{$dot}d{$dot}Y",$time);
	if($f){
		$thu['vi'] = array('Chủ nhật','Thứ hai','Thứ ba','Thứ tư','Thứ năm','Thứ sáu','Thứ bảy');
		$thu['en'] = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
		$str = $thu[$lang][date('w',$time)].', '.$str;
	}
	return $str;
}

function alert($s){
	echo '<script language="javascript"> alert("'.$s.'") </script>';
}

function delete_file($file){
		return @unlink($file);
}

function upload_image($file, $extension, $folder, $newname=''){
	if(!is_dir($folder)){
		mkdir($folder);
	}
	if(isset($_FILES[$file]) && !$_FILES[$file]['error']){
		
		$ext = end(explode('.',$_FILES[$file]['name']));
		$name = basename($_FILES[$file]['name'], '.'.$ext);
		
		if(strpos($extension, $ext)===false){
			alert('Chỉ hỗ trợ upload file dạng '.$extension);
			return false; // không hỗ trợ
		}
		
		if($newname=='' && file_exists($folder.$_FILES[$file]['name']))
			for($i=0; $i<100; $i++){
				if(!file_exists($folder.$name.$i.'.'.$ext)){
					$_FILES[$file]['name'] = $name.$i.'.'.$ext;
					break;
				}
			}
		else{
			$_FILES[$file]['name'] = $newname.'.'.$ext;
		}
		
		if (!copy($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
			if ( !move_uploaded_file($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
				return false;
			}
		}
		return $_FILES[$file]['name'];
	}
	return false;
}

function upload_image_muti($file, $extension, $folder, $newname=''){
	if(!is_dir($folder)){
		mkdir($folder);
	}
	if(isset($_FILES[$file]))
	{
		$filename['name']=$_FILES[$file]['name'];
		$filename['tmp_name']=$_FILES[$file]['tmp_name'];
		for ($i=0;$i<count($filename['name']);$i++) 
		{
			
			if($filename['name'][$i]!='')
			{
				$ext = end(explode('.',$filename['name'][$i]));
				
				$name = basename($filename['name'][$i], '.'.$ext);

				if(strpos($extension, $ext)===false)
				{
					alert('Chỉ hỗ trợ upload file dạng '.$extension);
					return false; // không hỗ trợ
				}
				
				if($newname=='' && file_exists($folder.$filename['name'][$i])){
					for($j=0; $j<100; $j++)
					{
						if(!file_exists($folder.$name.$j.'.'.$ext))
						{
							$filename['name'][$i] = $name.$j.'.'.$ext;
							break;
						}
					}
				}
				else
				{
					if($newname=='' && !file_exists($folder.$filename['name'][$i])){
						$filename['name'][$i] = $filename['name'][$i];
					}
					else{
						for($j=0;$j<count($newname);$j++)
						{
							if(!file_exists($folder.$name.$i.'.'.$ext)){
								$filename['name'][$i] = $newname[$j].'.'.$ext;
							}
						}
					}
				}
				
				if (!copy($filename['tmp_name'][$i], $folder.$filename['name'][$i]))	
				{
					if ( !move_uploaded_file($filename['tmp_name'][$i], $folder.$filename['name'][$i]))	
					{
						return false;
					}
				}
				
			}
		}
		return json_encode($filename['name']);
	}
	return false;
}

function thumb_image($file, $width, $height, $folder){	

	if(!file_exists($folder.$file))	return false; // không tìm thấy file
	
	if ($cursize = getimagesize ($folder.$file)) {					
		$newsize = setWidthHeight($cursize[0], $cursize[1], $width, $height);
		$info = pathinfo($file);
		
		$dst = imagecreatetruecolor ($newsize[0],$newsize[1]);
		
		$types = array('jpg' => array('imagecreatefromjpeg', 'imagejpeg'),
					'gif' => array('imagecreatefromgif', 'imagegif'),
					'png' => array('imagecreatefrompng', 'imagepng'));
		$func = $types[$info['extension']][0];
		$src = $func($folder.$file); 
		imagecopyresampled($dst, $src, 0, 0, 0, 0,$newsize[0], $newsize[1],$cursize[0], $cursize[1]);
		$func = $types[$info['extension']][1];
		$new_file = str_replace('.'.$info['extension'],'_thumb.'.$info['extension'],$file);
		
		return $func($dst, $folder.$new_file) ? $new_file : false;
	}
}


function setWidthHeight($width, $height, $maxWidth, $maxHeight){
	$ret = array($width, $height);
	$ratio = $width / $height;
	if ($width > $maxWidth || $height > $maxHeight) {
		$ret[0] = $maxWidth;
		$ret[1] = $ret[0] / $ratio;
		if ($ret[1] > $maxHeight) {
			$ret[1] = $maxHeight;
			$ret[0] = $ret[1] * $ratio;
		}
	}
	return $ret;
}


function transfer($msg,$page="index.php")
{
	 $showtext = $msg;
	 $page_transfer = $page;
	 include("./templates/transfer_tpl.php");
	 exit();
}

function redirect($url=''){
	echo '<script language="javascript">window.location = "'.$url.'" </script>';
	exit();
}
function chuyentrang($url=''){
	
	echo '<script language="javascript">window.location = "'.BASE_URL.$url.'" </script>';
	exit();
}

function back($n=1){
	echo '<script language="javascript">history.go = "'.-intval($n).'" </script>';
	exit();
}

function chuanhoa($s){
	$s = str_replace("'", '&#039;', $s);
	$s = str_replace('"', '&quot;', $s);
	$s = str_replace('<', '&lt;', $s);
	$s = str_replace('>', '&gt;', $s);
	return $s;
}

function themdau($s){
	$s = addslashes($s);
	return $s;
}

function bodau($s){
	$s = stripslashes($s);
	return $s;
}

function dump($arr, $exit=1){
	echo "<pre>";	
		var_dump($arr);
	echo "<pre>";	
	if($exit)	exit();
}

	function paging($r, $url='', $curPg=1, $mxR=5, $mxP=5, $class_paging='')
	{
		if(($mxP%2)==0){$mxP=$mxP+1;};
		if($curPg<1) $curPg=1;
		if($mxR<1) $mxR=5;
		if($mxP<1) $mxP=5;
		$totalRows=count($r);
		if($totalRows==0)	
			return array('source'=>NULL, 'paging'=>NULL);
		$totalPages=ceil($totalRows/$mxR);
		if($curPg > $totalPages) $curPg=$totalPages;
		
		$_SESSION['maxRow']=$mxR;
		$_SESSION['p']=$curPg;

		$r2=array();
		$paging="";
		
		//-------------tao array------------------
		$start=($curPg-1)*$mxR;
		$end=($start+$mxR)<$totalRows?($start+$mxR):$totalRows;
		#echo $start;
		#echo $end;
		//------------- tuananh------------
				
				if( $curPg-($mxP-1)/2 >=1 and $curPg+($mxP-1)/2<=$totalPages){
					$trangdau=$curPg-($mxP-1)/2;
					$trangcuoi=$curPg+($mxP-1)/2;
					
				}else{
					if( $curPg-($mxP-1)/2 >=1 ){
						$trangdau=$totalPages-$mxP-1;
						$trangcuoi=$totalPages;
						
					}
					
					if( $curPg+($mxP-1)/2 <=$totalPages ){
						$trangdau=1;
						$trangcuoi=$mxP;
						
					}
				}
		
		//------------- tuananh------------
		$j=0;
		for($i=$start;$i<$end;$i++)
			$r2[$j++]=$r[$i];
			
		//-------------tao chuoi------------------
		$curRow = ($curPg-1)*$mxR+1;	
		if($totalRows>$mxR)
		{
			$start=1;
			$end=1;
			$paging1 ="";		
			
			for($i=1;$i<=$totalPages;$i++)
			{	
				if($i>=$trangdau && $i<=$trangcuoi)
				{
					
					if($start==1) $start=$i;
					if($i==$curPg){
						$paging1.=" <span>".$i."</span> ";//dang xem
					} 		  	
					else    
					{
						$paging1 .= " <a href='".$url."&p=".$i."'  class=\"{$class_paging}\">".$i."</a> ";	
					}
					$end=$i;	
				}
			}//tinh paging
			//$paging.= "Go to page :&nbsp;&nbsp;" ;
			#if($curPg>$mxP)
			#{
				$paging .=" <a href='".$url."' class=\"{$class_paging}\" >&laquo;</a> "; //ve dau
				
				#$paging .=" <a href='".$url."&p=".($start-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
				//$paging .=" <a href='".$url."&p=".($curPg-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
			#}
			$paging.=$paging1; 
			#if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)  
			#{
				#$paging .=" <a href='".$url."&p=".($end+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				//$paging .=" <a href='".$url."&p=".($curPg+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				
				$paging .=" <a href='".$url."&p=".($totalPages)."' class=\"{$class_paging}\" >&raquo;</a> "; //ve cuoi
			#}
		}
		$r3['p']=$curPg;
		$r3['source']=$r2;
		$r3['paging']=$paging;
		#echo '<pre>';var_dump($r3);echo '</pre>';
		return $r3;
	}
function paging_home($r, $url='', $curPg=1, $mxR=5, $mxP=5, $class_paging='')
	{
		if($curPg<1) $curPg=1;
		if($mxR<1) $mxR=5;
		if($mxP<1) $mxP=5;
		$totalRows=count($r);
		if($totalRows==0)	
			return array('source'=>NULL, 'paging'=>NULL);
		$totalPages=ceil($totalRows/$mxR);
		if($curPg > $totalPages) $curPg=$totalPages;
		
		$_SESSION['maxRow']=$mxR;
		$_SESSION['p']=$curPg;

		$r2=array();
		$paging="";
		
		//-------------tao array------------------
		$start=($curPg-1)*$mxR;
		$end=($start+$mxR)<$totalRows?($start+$mxR):$totalRows;
		#echo $start;
		#echo $end;
		
		$j=0;
		for($i=$start;$i<$end;$i++)
			$r2[$j++]=$r[$i];
			
		//-------------tao chuoi------------------
		$curRow = ($curPg-1)*$mxR+1;	
		if($totalRows>$mxR)
		{
			$start=1;
			$end=1;
			$paging1 ="";				 	 
			for($i=1;$i<=$totalPages;$i++)
			{	
				if(($i>((int)(($curPg-1)/$mxP))* $mxP) && ($i<=((int)(($curPg-1)/$mxP+1))* $mxP))
				{
					if($start==1) $start=$i;
					if($i==$curPg){
						$paging1.=" <span>".$i."</span> ";//dang xem
					} 		  	
					else    
					{
						$paging1 .= " <a href='".$url."&p=".$i."'  class=\"{$class_paging}\">".$i."</a> ";	
					}
					$end=$i;	
				}
			}//tinh paging 
			//$paging.= "Go to page :&nbsp;&nbsp;" ;
			#if($curPg>$mxP)
			#{
				//$paging .=" <a href='".$url."' class=\"{$class_paging}\" >First</a> "; //ve dau
				
				#$paging .=" <a href='".$url."&p=".($start-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
				$paging .=" <a href='".$url."&p=".($curPg-1)."' class=\"{$class_paging}\" ><img src='./images/icon-left.png' alt='' title='' /></a> "; //ve truoc
			#}
			$paging.=$paging1; 
			#if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)  
			#{
				#$paging .=" <a href='".$url."&p=".($end+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				$paging .=" <a href='".$url."&p=".($curPg+1)."' class=\"{$class_paging}\" ><img src='./images/icon-right.png' alt='' title='' /></a> "; //ke
				
				//$paging .=" <a href='".$url."&p=".($totalPages)."' class=\"{$class_paging}\" >End</a> "; //ve cuoi
			#}
		}
		$r3['p']=$curPg;
		$r3['source']=$r2;
		$r3['paging']=$paging;
		$r3['total']=$totalRows;
		#echo '<pre>';var_dump($r3);echo '</pre>';
		return $r3;
	}
function catchuoi($chuoi,$gioihan){
// nếu độ dài chuỗi nhỏ hơn hay bằng vị trí cắt
// thì không thay đổi chuỗi ban đầu
if(strlen($chuoi)<=$gioihan)
{
return $chuoi;
}
else{
/*
so sánh vị trí cắt
với kí tự khoảng trắng đầu tiên trong chuỗi ban đầu tính từ vị trí cắt
nếu vị trí khoảng trắng lớn hơn
thì cắt chuỗi tại vị trí khoảng trắng đó
*/
if(strpos($chuoi," ",$gioihan) > $gioihan){
$new_gioihan=strpos($chuoi," ",$gioihan);
$new_chuoi = substr($chuoi,0,$new_gioihan)."...";
return $new_chuoi;
}
// trường hợp còn lại không ảnh hưởng tới kết quả
$new_chuoi = substr($chuoi,0,$gioihan)."...";
return $new_chuoi;
}
}

function stripUnicode($str){
  if(!$str) return false;
   $unicode = array(
     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
     'd'=>'đ',
     'D'=>'Đ',
     'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
   	  'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
   	  'i'=>'í|ì|ỉ|ĩ|ị',	  
   	  'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
   	  'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
   	  'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
     'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
     'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
   );
   foreach($unicode as $khongdau=>$codau) {
     	$arr=explode("|",$codau);
   	  $str = str_replace($arr,$khongdau,$str);
   }
return $str;
}// Doi tu co dau => khong dau

function changeTitle($str)
{
	$str = stripUnicode($str);
	$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
	$str = trim($str);
	$str=preg_replace('/[^a-zA-Z0-9\ ]/',' ',$str); 
	$str = str_replace("  "," ",$str);
	$str = str_replace(" ","-",$str);
	return $str;
}
function getCurrentPageURL() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
	$pageURL = explode("&p=", $pageURL);
    return $pageURL[0];
}
function create_thumb($file, $width, $height, $folder,$file_name,$zoom_crop='1'){

// ACQUIRE THE ARGUMENTS - MAY NEED SOME SANITY TESTS?

$new_width   = $width;
$new_height   = $height;

 if ($new_width && !$new_height) {
        $new_height = floor ($height * ($new_width / $width));
    } else if ($new_height && !$new_width) {
        $new_width = floor ($width * ($new_height / $height));
    }
	
$image_url = $folder.$file;
$origin_x = 0;
$origin_y = 0;
// GET ORIGINAL IMAGE DIMENSIONS
$array = getimagesize($image_url);
if ($array)
{
    list($image_w, $image_h) = $array;
}
else
{
     die("NO IMAGE $image_url");
}
$width=$image_w;
$height=$image_h;

// ACQUIRE THE ORIGINAL IMAGE
$image_ext = trim(strtolower(end(explode('.', $image_url))));
switch(strtoupper($image_ext))
{
     case 'JPG' :
     case 'JPEG' :
         $image = imagecreatefromjpeg($image_url);
		 $func='imagejpeg';
         break;
     case 'PNG' :
         $image = imagecreatefrompng($image_url);
		 $func='imagepng';
         break;
	 case 'GIF' :
	 	 $image = imagecreatefromgif($image_url);
		 $func='imagegif';
		 break;

     default : die("UNKNOWN IMAGE TYPE: $image_url");
}

// scale down and add borders
	if ($zoom_crop == 3) {

		$final_height = $height * ($new_width / $width);

		if ($final_height > $new_height) {
			$new_width = $width * ($new_height / $height);
		} else {
			$new_height = $final_height;
		}

	}

	// create a new true color image
	$canvas = imagecreatetruecolor ($new_width, $new_height);
	imagealphablending ($canvas, false);

	// Create a new transparent color for image
	$color = imagecolorallocatealpha ($canvas, 255, 255, 255, 127);

	// Completely fill the background of the new image with allocated color.
	imagefill ($canvas, 0, 0, $color);

	// scale down and add borders
	if ($zoom_crop == 2) {

		$final_height = $height * ($new_width / $width);
		
		if ($final_height > $new_height) {
			
			$origin_x = $new_width / 2;
			$new_width = $width * ($new_height / $height);
			$origin_x = round ($origin_x - ($new_width / 2));

		} else {

			$origin_y = $new_height / 2;
			$new_height = $final_height;
			$origin_y = round ($origin_y - ($new_height / 2));

		}

	}

	// Restore transparency blending
	imagesavealpha ($canvas, true);

	if ($zoom_crop > 0) {

		$src_x = $src_y = 0;
		$src_w = $width;
		$src_h = $height;

		$cmp_x = $width / $new_width;
		$cmp_y = $height / $new_height;

		// calculate x or y coordinate and width or height of source
		if ($cmp_x > $cmp_y) {

			$src_w = round ($width / $cmp_x * $cmp_y);
			$src_x = round (($width - ($width / $cmp_x * $cmp_y)) / 2);

		} else if ($cmp_y > $cmp_x) {

			$src_h = round ($height / $cmp_y * $cmp_x);
			$src_y = round (($height - ($height / $cmp_y * $cmp_x)) / 2);

		}

		// positional cropping!
		if ($align) {
			if (strpos ($align, 't') !== false) {
				$src_y = 0;
			}
			if (strpos ($align, 'b') !== false) {
				$src_y = $height - $src_h;
			}
			if (strpos ($align, 'l') !== false) {
				$src_x = 0;
			}
			if (strpos ($align, 'r') !== false) {
				$src_x = $width - $src_w;
			}
		}

		imagecopyresampled ($canvas, $image, $origin_x, $origin_y, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h);

    } else {

        // copy and resize part of an image with resampling
        imagecopyresampled ($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    }
	


$new_file=$file_name.'_thumb.'.$image_ext;
// SHOW THE NEW THUMB IMAGE
if($func=='imagejpeg') $func($canvas, $folder.$new_file,100);
else $func($canvas, $folder.$new_file,floor ($quality * 0.09));

return $new_file;
}
function ChuoiNgauNhien($sokytu){
$chuoi="ABCDEFGHIJKLMNOPQRSTUVWXYZWabcdefghijklmnopqrstuvwxyzw0123456789";
for ($i=0; $i < $sokytu; $i++){
	$vitri = mt_rand( 0 ,strlen($chuoi) );
	$giatri= $giatri . substr($chuoi,$vitri,1 );
}
return $giatri;
} 
/*
function load_view($file){
	ob_start();
	include _template.$file."_tpl.php";
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}

function check_browser(){
	$useragent = $_SERVER['HTTP_USER_AGENT'];

	if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'IE';
	} elseif (preg_match( '|Opera ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'Opera';
	} elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'Firefox';
	} elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
			$browser_version=$matched[1];
			$browser = 'Safari';
	} else {
			// browser not recognized!
			$browser_version = 0;
			$browser= 'other';
	}
	return $browser;
}

function check_yahoo($nick_yahoo='nthaih'){
	$file = @fopen("http://opi.yahoo.com/online?u=".$nick_yahoo."&m=t&t=1","r");
	$read = @fread($file,200);
	
	if($read==false || strstr($read,"00"))
		$img = '<img src="media/images/yahoo_offline.gif" width="155" height="46" border="0" />';
	else
		$img = '<img src="media/images/yahoo_online.gif" width="155" height="46" border="0" />';
	return '<a href="ymsgr:sendIM?'.$nick_yahoo.'">'.$img.'</a>';
}

function check_skype($nick_skype='ha.ngoc.thai'){
#		if(strlen(@file_get_contents("http://mystatus.skype.com/bigclassic/".$nick_skype))>2000)
		$img = '<img src="media/images/skype_online.gif" width="93" height="46" border="0" />';
#		else
#			$img = '<img src="media/images/skype_offline.gif" width="93" height="46" border="0" />';
	//alert(strlen(@file_get_contents("http://mystatus.skype.com/bigclassic/".$nick_skype)));
	return '<a href="skype:'.$nick_skype.'?call">'.$img.'</a>';
}

function tran($s){
	global $translate;
	#return $translate['Họ tên'];
	return strtr($s, $translate);
}

function redirect_error($n){
	switch ($n) {
		case '404' :
			echo "<center><h1>PAGE NOT FOUND</h1></center>";
			#echo "<script language='javascript'> window.location = 'error_404.html' </-------------script>";
			exit();
		default :
			alert('Kiem tra lai redirect_error');
			exit();
	}
}

function bodau2($s){
	$s = chuanhoa($s);
	$s = stripslashes($s);
	return $s;
}
function parent_alert($s){
	echo '<script language="javascript"> parent.alert("'.$s.'") </script>';
}

function parent_redirect($ur=''){
	echo '<script language="javascript">parent.location = "'.site($ur).'" </script>';
	exit();
}
function back($n=1){
	echo '<script language="javascript"> history.go('.-$n.'); </script>';
}
function goto($ur=''){
	echo '<script language="javascript">window.location = "'.$ur.'" </script>';
	exit();
}
//////////////  URL  //////////////////
///////////////////////////////////////////
function site($s=''){
	if(!DEBUG)
		$s = url_encode($s);
	return 'index.php?'.$s;

	$ur = 'index.php?'.$s;
	return url_encode($s);
	return $ur;
}

function url_encode($s){
	return  base64_encode($s);
}

function url_decode($s)	{
	return base64_decode($s);
}

function get_url(){
	$get = array();
	
	$query_str = !DEBUG ? url_decode($_SERVER['QUERY_STRING']) : $_SERVER["QUERY_STRING"];
	
	$parts = explode('&',$query_str);
	$get['com'] = $parts[0];
	for($i=1; $i<count($parts); $i++){
		$seg = explode( '=', $parts[$i]);
		$get[$seg[0]] = $seg[1];
	}
	$get['com'] = str_replace('-','/',$get['com']);
	return $get;
}


function check_login(){
	if(!isset($_SESSION['site_log']) || $_SESSION['site_log']==false)
		$_GET["com"] = "login";
}

function get_file($com, $act){
	#$com = isset($_GET['com']) ? $_GET['com'] : "index";
	$act = empty($act) ? '' : '_'.$act;
	$file['mod'] = "app/mod/".$com.$act."_mod.php";
	$file['ctr'] = "app/ctr/".$com.$act.".php";
	$file['view'] = "app/view/".$com.$act."_tpl.php";
	return $file;
}

function error_404(){
	if( DEBUG )
		header("Location: ../errors/error_404.php?com=".$_GET['com']);
	else
		header("Location: ../errors/error_404.php");
}

function top_content(){
	require_once "view/layout/top_tpl.php";
}

function bottom_content(){
	require_once "view/layout/bottom_tpl.php";
}

function main_content(){
	$file = get_file();	
	$error_nopage = 0;
	#dump($file);
	if( file_exists($file['mod'])) 
		require_once $file['mod'];
	if( file_exists($file['ctr'])){
		require_once $file['ctr'];
		$error_nopage ++;
	}
	if( file_exists($file['view'])){
		require_once $file['view'];
		$error_nopage++;
	}
	if($error_nopage == 0)
		error_404();
}




//////////////  FORM  //////////////////
///////////////////////////////////////////
function form_select($conf, $vals){
	$name = $conf['n'];
	$v = $conf['v'];
	$t = $conf['t'];
	$s = $conf['s'];
	$danh_muc = '<select id="$name" name="$name">';
	$danh_muc .= '<option value=""> ---- Select ---- </option>';
	for($i=0; $i<count($vals); $i++){
		$danh_muc .= "<option value=".$vals[$i][$v];
		if($vals[$i][$v]==$s) 
			$danh_muc .= " selected ";
		$danh_muc .= ">";
		$danh_muc .= $vals[$i][$t];
		$danh_muc .= '</option>';
	}
	$danh_muc .= '</select>';
	return $danh_muc;
}

function form_select_2($conf, $vals){
	$name = $conf['n'];
	$v = $conf['v'];
	$t = $conf['t'];
	$s = $conf['s'];
	$danh_muc = '<select id="$name" name="$name">';
	$danh_muc .= '<option value=""> ---- Chọn danh mục ---- </option>';
	for($i=0; $i<count($vals); $i++){
		$danh_muc .= "<option value=".$vals[$i][$v];
		if($vals[$i][$v]==$s) 
			$danh_muc .= " selected ";
		$danh_muc .= ">";
		$danh_muc .= $vals[$i][$t."_vi"]." - ".$vals[$i][$t."_en"];
		$danh_muc .= '</option>';
	}
	$danh_muc .= '</select>';
	return $danh_muc;
}
// echo form_select(array('n'=>'id_cat', 'v'=>'id', 't'=>'ten_vi', 's'=>$id_cat), $news_cats);

//////////////  PHAN TRANG  //////////////////
///////////////////////////////////////////

	function getUrl()
	{
		if(strpos($_SERVER['QUERY_STRING'],'&p')!==false)
			$url='?'.substr($_SERVER['QUERY_STRING'],0,strpos($_SERVER['QUERY_STRING'],'&p'));
		else
			$url='?'.$_SERVER['QUERY_STRING'];
		return $url;
	}

*/
#----------------------------------------------------------	


// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
?>