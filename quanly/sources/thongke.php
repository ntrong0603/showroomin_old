<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){
	case "nhapkho":
		nhapkho();
		$template = "thongke/nhapkho";
		break;
	case "banhang":
		banhang();
		$template = "thongke/banhang";
		break;
	case "banhangchitiet":
		
		$template = "thongke/banhangchitiet";
		break;
	case "thuchi":
		thuchi();
		$template = "thongke/thuchi";
		break;
	case "tonkho":
		thongketonkho();
		$template = "thongke/tonkho";
		break;


		
	default:
		$template = "index";
}
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function banhang(){
	global $d, $ketqua;
	if( isset( $_POST['batdau'] ) ){
		
		if( $_POST['batdau']!='' ){ $batdau=strtotime($_POST['batdau']);}else{$batdau=0;}
	if( $_POST['ketthuc']!='' ){ $ketthuc=strtotime($_POST['ketthuc']);}else{$ketthuc=0;}
			
		if( $batdau<=$ketthuc   ){
			
		if( $ketthuc>0){
		$thoigian="ngaytao between ".$batdau." and ".$ketthuc." ";
		}else{
			$thoigian=' 1 ';
		}
		}else{
			transfer("Dữ liệu Thời gian không đúng", "index.php?com=thongke&act=nhapkho");
		}
		
		if( $_POST['nhanvien']>0 ){
		$nhanvien="and iduser= ".$_POST['nhanvien'];
		}else{
			$nhanvien=' and 1 ';
			
		}
		$d->query("select * from table_donhang where ".$thoigian." ".$nhanvien." ");
		$ketqua=$d->result_array();
		
		
	}
	
	
}	

function thuchi(){
	global $d, $ketquachi,$ketquathu;
	
	if( isset( $_POST['batdau'] ) ){
		if( $_POST['batdau']!='' ){ $batdau=strtotime($_POST['batdau']);}else{$batdau=0;}
	if( $_POST['ketthuc']!='' ){ $ketthuc=strtotime($_POST['ketthuc']);}else{$ketthuc=0;}
			
		if( $batdau<=$ketthuc   ){
			
		if( $ketthuc>0){
		$thoigian="ngaytao between ".$batdau." and ".$ketthuc." ";
		}else{
			$thoigian=' 1 ';
		}
		}else{
			transfer("Dữ liệu Thời gian không đúng", "index.php?com=thongke&act=nhapkho");
		}
		
		$d->query("select * from table_nhapkho where ".$thoigian." ");
		$ketquachi=$d->result_array();
		
		$d->query("select * from table_donhang where ".$thoigian." and tinhtrang=4");
		$ketqua=$d->result_array();
		
		
		$string='0,1';
		for($i=0;$i<count($ketqua);$i++){
			$string.=",'".$ketqua[$i]['madonhang']."'";
			
		}
		
		$array= implode(',', array_map(null, explode(',', $string)));
		
		$d->query("select * from table_giohang where madonhang in (".$array.") ");
		$ketquathu=$d->result_array();
		
	}
	
	
}	


function nhapkho(){
	global $d, $ketqua;
	if( isset( $_POST['batdau'] ) ){
	if( $_POST['batdau']!='' ){ $batdau=strtotime($_POST['batdau']) ;}else{$batdau=0;}
	if( $_POST['ketthuc']!='' ){ $ketthuc=strtotime($_POST['ketthuc'])+86400;}else{$ketthuc=0;}
			
			if( $batdau<=$ketthuc   ){
			
			if( $ketthuc>0){
				
			$thoigian="ngaytao >= ".$batdau." and ngaytao <= ".$ketthuc." ";
			}else{
				$thoigian=' 1 ';
			}
		}else{
			transfer("Dữ liệu Thời gian không đúng", "index.php?com=thongke&act=nhapkho");
		}
		
		
		$d->query("select * from table_nhapkho_log where ".$thoigian." ");
		$ketqua=$d->result_array();
		
		
	}
	
	
}	
function thongketonkho(){
	global $d, $ketqua;

	$sql = "select * from #_place";
	$d->query($sql);
	$place=$d->result_array();
	
	for($i=0; $i<count($place);$i++){
		$place[$i]['tonkho']=tonkho($place[$i]['id']);
		
	}
	
	
		
		
		$ketqua= "<table style='line-height: 25px; padding 5px 10px; text-align:center; '>

                <thead>
                <tr>
                <th>Stt</th>
                <th>MASP </th>
                <th>Tên </th>
                <th>Số lượng </th>
                </tr>
                </thead>
		<tbody>
		";
			foreach ($place as $URL){
				$ketqua .='<tr>'; 
				$ketqua .='<td>'.( $i+1)."</td>";
				$ketqua .='<td>'. $URL['masp']."</td>";
				$ketqua .='<td>'. $URL['ten'].'</td>';
				$ketqua .='<td>'. $URL['tonkho'].'</td>';
				$ketqua .='<tr>';
			}
		$ketqua .=  "
		</tbody>
		</table>";
		if( isset( $_GET['in']) and $_GET['in']==1 ){
			echo $ketqua;
			die();
	}
}

function save_gioithieu(){
	global $d;
	$file_name=fns_Rand_digit(0,9,5);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=about&act=capnhat");
	if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG',_upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('about');			
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_hinhanh.$row['photo']);
			}
		}
	$data['ten'] = $_POST['ten'];
	$data['mota'] = $_POST['mota'];
	$data['noidung'] = $_POST['noidung'];
	$data['keyword'] = $_POST['keyword'];
		$data['description'] = $_POST['description'];
	$d->reset();
	$d->setTable('about');
	if($d->update($data))
		transfer("Dữ liệu được cập nhật", "index.php?com=about&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=about&act=capnhat");
}

?>