<?php	if(!defined('_source')) die("Error");

	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

	$id=$_REQUEST['id'];
	
switch($act){
	case "man":
		get_items();
		$template = "vandon/items";
		break;
	case "add":		
		$template = "vandon/item_add";
		break;
	case "edit":		
		get_item();
		$template = "vandon/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	
	default:
		$template = "index";
}

#====================================
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function get_items(){
	global $d, $items, $paging,$urldanhmuc;
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_vandon where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_vandon SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_vandon SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_vandon where hienthi='1' ";	
	
	
	$sql.=" order by id desc";
	// print_r($sql);die();
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=vandon&act=man".$urldanhmuc;
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item,$ds_tags,$old_item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=vandon&act=man");	
	$sql = "select * from #_vandon where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=vandon&act=man");
	$item = $d->fetch_array();	

	$d->reset();
	$d->setTable('vandon');
	$d->setWhere('mavandon', $item['mavandon']);
	$d->setOrder('id desc');
	$d->select();
	$num=$d->num_rows();
	if( $num>=2 ){
		$arr=$d->result_array();
		$old_item=$arr[1];
		
	}
	
	
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=vandon&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		
      						
		$data['status'] = $_POST['status'];
		
	
		$d->reset();
		$d->setTable('vandon');
		$d->setWhere('id', $id);
		$d->select();
		$taam=$d->fetch_array();
		$sta=$taam['status'];
		if($d->update($data)){
			if( $data['status']!='wait' and $sta=='wait'){
				$d->reset();
				$d->setTable('user');
				$d->setWhere('role',3);
				$d->select();
				$tam=$d->result_array();
				$data3['vandon']=$tam['0']['vandon']-1;
				$d->update($data3);
				$d->reset();
				$d->setTable('khachhang');
				$d->setWhere('id',$_POST['idkhachhang']);
				$d->select();
				$tamn=$d->fetch_array();
				$datan['vandon']=$tamn['vandon']+1;
				$d->update($datan);
				
			}
			if( $data['status']=='wait' and $sta!='wait'){
			
				$d->reset();
				$d->setTable('user');
				$d->setWhere('role',3);
				$d->select();
				$tam=$d->result_array();
				$data3['vandon']=$tam['0']['vandon']+1;
				$d->update($data3);
				
				
				
			}
			//UPDATE ATTRIBUTE
			redirect("index.php?com=vandon&act=man&curPage=".$_REQUEST['curPage']."");
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=vandon&act=man");
	}else{
		
		$data['status'] = $_POST['status'];

		$d->setTable('vandon');
		if($d->insert($data))
		{	
			redirect("index.php?com=vandon&act=man");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=vandon&act=man");
	}
}

function delete_item(){
	global $d;
	
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		
		$sql = "delete from #_vandon where id='".$id."'";
		$d->query($sql);
		
		if($d->query($sql))
			redirect("index.php?com=vandon&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=vandon&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=vandon&act=man");

}
//Xuất file excel
if( isset( $_POST['excel'] ) ){
	$date=$_POST['ngayexcel'];
	$d->reset();
	$d->setTable('vandon');
	$d->setWhere('ngaytao',$date);
	$d->select();
	$excel=$d->result_array();
	if( $d->num_rows()==0 ){
		$thongbaoexcel='Ngày bạn chọn không có Vận đơn nào';
		
	}else{

 require_once("class/PHPExcel/IOFactory.php");
require_once("class/PHPExcel.php");
			
	$objPHPExcel = new PHPExcel();
	
	

$objPHPExcel->getProperties()->setCreator("Tên người tạo")->setLastModifiedBy("Tên người chỉnh sửa cuối cùng")->setTitle("Tiêu đề file");
   $index_worksheet = 0; //(worksheet mặc định là 0, nếu tạo nhiều worksheet $index_worksheet += 1)
   ///Bên trả phí =====================
$objPHPExcel->setActiveSheetIndex($index_worksheet)
->setCellValue('R1', 'BÊN TRẢ PHÍ')
->setCellValue('R2', 'Mã')
->setCellValue('S2', 'Bên trả phí')   
->setCellValue('R3', '1')   
->setCellValue('S3', 'Người gửi thanh toán') 
->setCellValue('R4', '2')   
->setCellValue('S4', 'Người nhận thanh toán');
// Các dịch vụ ===============================
$d->reset();
$d->setTable('cacdichvu');
$d->select();
$cacdichvu=$d->result_array();
$objPHPExcel->setActiveSheetIndex($index_worksheet)
->setCellValue('U1', 'Gói dịch vụ')
->setCellValue('U2', 'Mã')
->setCellValue('V2', 'Tên gói DV');
$hang=3;
		foreach ($cacdichvu as $row) {
		   $objPHPExcel->setActiveSheetIndex($index_worksheet)
			->setCellValue('U' . $hang, $row['maso'])
		   ->setCellValue('V' . $hang, $row['ten']);
		$hang++;
		   
		}

// Các khu vực ===============================
$d->reset();
$d->setTable('khuvuc');
$d->select();
$cackhuvuc=$d->result_array();

$objPHPExcel->setActiveSheetIndex($index_worksheet)
->setCellValue('X1', 'Khu vực')
->setCellValue('X2', 'Mã')
->setCellValue('Y2', 'khu vực');
$hang=3;

		foreach ($cackhuvuc as $row) {
		   $objPHPExcel->setActiveSheetIndex($index_worksheet)
			->setCellValue('X' . $hang, $row['id'])
		   ->setCellValue('Y' . $hang, $row['ten']);   
		   $hang++;
		}


//Nội dung chính

$objPHPExcel->setActiveSheetIndex($index_worksheet)
->setCellValue('A2', 'STT')
->setCellValue('B2', 'Ngày')
->setCellValue('C2', 'Mã vận đơn') 
->setCellValue('D2', 'Tên người nhận')
->setCellValue('E2', 'Điện thoại')
->setCellValue('F2', 'Địa chỉ người nhận')
->setCellValue('G2', 'Nội dung hàng hóa')
->setCellValue('H2', 'Khối lượng')
->setCellValue('I2', 'Tiền thu hộ')
->setCellValue('J2', 'Bên trả phí')
->setCellValue('K2', 'Gói dịch vụ')
->setCellValue('L2', 'khu vực vận chuyển')
->setCellValue('M2', 'Cước phí tạm tính')
->setCellValue('N2', 'Yêu cầu lấy hàng')
->setCellValue('O2', 'Ghi chú người gửi')
->setCellValue('P2', 'Ghi chú người nhận')
->setCellValue('A1', 'Danh sách Vận đơn nhận dc ngày:'.$date);
   
		   
	//======================nội dung chính	  
$hang=3;
		foreach ($excel as $row) {
		   $objPHPExcel->setActiveSheetIndex($index_worksheet)
		   ->setCellValue('A' . $hang, $hang-2)
		   ->setCellValue('B' . $hang, $row['ngaytao'])
		   ->setCellValue('c' . $hang, $row['mavandon'])
		   ->setCellValue('D' . $hang, $row['tennguoinhan'])
		   ->setCellValue('E' . $hang, $row['dienthoai'])
		   ->setCellValue('F' . $hang, $row['diachinguoinhan'])
		   ->setCellValue('G' . $hang, $row['noidunghanghoa'])
		   ->setCellValue('H' . $hang, $row['trongluonggoihang'])
		   ->setCellValue('I' . $hang, $row['tienthuho'])
		   ->setCellValue('J' . $hang, $row['bentraphi'])
		   ->setCellValue('K' . $hang, $row['cacdichvu'])
		   ->setCellValue('L' . $hang, $row['khuvuc'])
		   ->setCellValue('M' . $hang, $row['cuocphitamtinh'])
		   ->setCellValue('N' . $hang, $row['yeucaulayhang'])
		   ->setCellValue('O' . $hang, $row['ghichunguoigui'])
		   ->setCellValue('P' . $hang, $row['ghichunguoinhan']);
		   $hang++;
		}

		
		   //- Thay đổi tiêu đề của worksheet:

		$objPHPExcel->getActiveSheet()->setTitle('Vận đơn');

		//- Set worksheet hiển thị mặc định khi mở file excel:

		$objPHPExcel->setActiveSheetIndex(0);


		//- xuất ra file excel:

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	
	
	header('Content-type: application/vnd.ms-excel');
	// It will be called file.xls
	header('Content-Disposition: attachment; filename="Van_don_'.$date.'.xls"');
	header('Cache-Control: max-age=0');
			
	// We'll be outputting an excel file
	$objWriter->save('php://output');
	}
}
?>