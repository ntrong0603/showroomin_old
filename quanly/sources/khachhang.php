<?php

	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$urlsanpham ="";
$urlsanpham.= (isset($_REQUEST['id_list'])) ? "&id_list=".addslashes($_REQUEST['id_list']) : "";
$urlsanpham.= (isset($_REQUEST['id_cat'])) ? "&id_cat=".addslashes($_REQUEST['id_cat']) : "";
$urlsanpham.= (isset($_REQUEST['id_item'])) ? "&id_item=".addslashes($_REQUEST['id_item']) : "";

$id=$_REQUEST['id'];

switch($act){

	case "man":
		get_items();
		$template = "khachhang/items";
		break;
	case "add":		
		$template = "khachhang/item_add";
		break;
	case "edit":		
		get_item();
		$template = "khachhang/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	case "guimail":
		get_item();
		$template = "khachhang/guimail";
		break;
	case "sendmaillienhe":
		sendmaillienhe();
		break;
	
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
	global $d, $items, $paging,$urlsanpham;
	#----------------------------------------------------------------------------------------
	if($_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM #_khachang where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$time=time();
	$hienthi=$cats[0]['noibat'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET noibat ='$time' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_news SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_khachhang where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_khachhang SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_khachhang SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_khachhang";	

	$sql.=" order by id asc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=khachhang&act=man".$urlsanpham;
	$maxR=10;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
	
}

function get_item(){
	global $d, $item,$ds_tags;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=khachhang&act=man");	
	$sql = "select * from #_khachhang where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=khachhang&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=khachhang&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
					 	
		$data['ten'] = $_POST['ten'];
		$data['email'] = $_POST['email'];			
		$data['diachi'] = $_POST['diachi'];	
		//$data['username'] = $_POST['username'];									
	
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$d->setTable('khachhang');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=khachhang&act=man&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=khachhang&act=man");
	}else{
			
			
		$data['ten'] = $_POST['ten'];
		$data['email'] = $_POST['email'];			
		$data['diachi'] = $_POST['diachi'];	
		//$data['username'] = $_POST['username'];									
	
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$d->setTable('khachhang');
		if($d->insert($data))
		{			
			redirect("index.php?com=khachhang&act=man");
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=khachhang&act=man");
	}
}
function sendmaillienhe()
{
	$subject = "Thư liên hệ từ 247ship.com";
			$body = '<table>';
			$body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Thư liên hệ từ website</th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Tiêu đề :</th><td>'.$_POST['chude'].'</td>
				</tr>
				<tr>
					<th>Nội dung :</th><td>'.$_POST['noidung'].'</td>
				</tr>';
			$body .= '</table>';

			include_once "class.phpmailer.php";
	
			//Khởi tạo đối tượng
$mail = new PHPMailer();

//Thiet lap thong tin nguoi gui va email nguoi gui
$mail->IsSMTP(); // telling the class to use SMTP   
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "phattrienanhvien@gmail.com";  // GMAIL username
$mail->Password   = "123456!@#";            // SMTP account password*/


$mail->SetFrom("phattrienanhvien@gmail.com","Phát Triển Ánh Việt");

//Thiết lập thông tin người nhận
$mail->AddAddress($_POST['email'],'');

//$mail->AddAddress("nghiep.tsm@gmail.com",$row_setting['ten']);

//Thiết lập email nhận email hồi đáp
//nếu người nhận nhấn nút Reply
$mail->AddReplyTo("phattrienanhvien@gmail.com",$row_setting['ten']);

//$mail->AddReplyTo("nghiep.tsm@gmail.com",$row_setting['ten']);
/*=====================================
 * THIET LAP NOI DUNG EMAIL
 *=====================================*/

//Thiết lập tiêu đề
$mail->Subject    = "Có thông tin liên hệ mới ";

//Thiết lập định dạng font chữ
$mail->CharSet = "utf-8";

$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";

//Thiết lập nội dung chính của email
$mail->MsgHTML($body);

if(!$mail->Send()) {
	transfer("Xóa dữ liệu bị lỗi", "index.php?com=khachhang&act=man");
 			 
} else {
			 
			redirect("index.php?com=khachhang&act=man");
}	

}
function delete_item(){
	global $d;
	if($_REQUEST['id_cat']!='')
	{ $id_catt="&id_cat=".$_REQUEST['id_cat'];
	}
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select * from #_khachhang where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			
		$sql = "delete from #_khachhang where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=khachhang&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=khachhang&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=khachhang&act=man");
}

?>