<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['id'])) ? addslashes($_REQUEST['id']) : "";

switch($act){
	
	case "register":
		login();
		register();
		$template = "user/login";
		//$template = "user/dang-ky";
		break;
	case "login":
		login();
		register();
		$template = "user/login";
		//$template = "user/dang-nhap";
		break;
	
	case "khuyen-mai":
		phaidangnhap();
		khuyen_mai();
		$template = "user/khuyen-mai";
		break;
	case "profile":
		phaidangnhap();
		
		$template = "user/profile";
		break;
	case "don-hang":
		phaidangnhap();
		don_hang();
		$template = "user/don-hang";
		break;
	case "chi-tiet-don-hang":
		phaidangnhap();
		
		$template = "user/don-hang-detail";
		break;
	case "logout":
		logout();
		break;	
	case "man":
		get_items();
		$template = "user/items";
		break;

	case "change-password":
		phaidangnhap();
		$template = "user/change-password";
		break;
	
	case "review":
		phaidangnhap();
		get_review();
		$template = "user/review";
		break;
	
	case "delete":
		delete_item();
		break;
	default:
		$template = "index";
}

//////////////////

function phaidangnhap(){
	if( !isset($_SESSION['user']  ) ){
		transfer("Bạn phải đăng nhập để sử dụng tính năng này.", "../user/login.html");
		
	}
	
}
function khuyen_mai(){
	global $d, $items, $paging;
	
	$sql = "select * from #_khuyenmai where id_user=".$_SESSION['user']['id']." order by id desc " ;
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="./user/khuyen-mai.html";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}
function don_hang(){
	global $d, $items, $paging;
	
	$sql = "select * from #_dathang where id_user=".$_SESSION['user']['id']." order by id desc " ;
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="./user/don-hang.html";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_items(){
	global $d, $items, $paging;
	
	$sql = "select * from #_user where role=1 order by username";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=user&act=man";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_review(){
	global $d, $items;
	$id = $_SESSION['user']['id'];
	
	$sql = "select * from #_review where id_user='".$id."' order by id desc";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Bạn chưa viết bình luận bao giờ.", BASE_URL."user/profile.html");
	$items = $d->result_array();
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=user&act=man");
	
	$sql = "select * from #_user where id='".$id."' and role=1";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=user&act=man");
	$item = $d->fetch_array();
}
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}
function register(){
	global $d;
	
	
	$id = isset($_SESSION['user']) ? $_SESSION['user']['id'] : "";
	if($id){ // cap nhat
		
		if( isset( $_POST['username'] ) ){
		// kiem tra ten trung
		$d->reset();
		$d->setTable('user');
		$d->setWhere('username', $_POST['username']);
		$d->select();
		if($d->num_rows()>0) transfer("Tên dăng nhập nay đã có.<br>Xin chọn tên khác.", "index.php?com=user&act=edit&id=".$id);
		
		
		$data['username'] = $_POST['username'];
		}
		if( isset( $_POST['password'] ) ){
			if(md5($_POST['passwordcu'])!=$_SESSION['user']['password'] or $_POST['password']=="" or $_POST['password']!=$_POST['password2']) transfer("Mật khẩu nhập không đúng.", "../user/change-password.html");
		
			$data['password'] = md5($_POST['password']);	
		}
		if( isset( $_POST['ten'] ) ){
	
		$data['ten'] = $_POST['ten'];
		$data['sex'] = $_POST['sex'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['nick_yahoo'] = $_POST['nick_yahoo'];
		$data['nick_skype'] = $_POST['nick_skype'];
		$data['diachi'] = $_POST['diachi'];
		$data['congty'] = $_POST['congty'];
		$data['country'] = $_POST['country'];
		$data['city'] = $_POST['city'];
		}
		$d->reset();
		$d->setTable('user');
		$d->setWhere('id', $id);
		$d->setWhere('role', 1);
		if($d->update($data))
			
			{
					$sql = "select * from #_user where email='".$_SESSION['user']['email']."' ";
				$d->query($sql);
				$_SESSION['user']=$d->fetch_array();
			transfer("Dữ liệu đã được cập nhật", "../user/profile.html");
			
			}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "../user/profile.html");
	
	}else{ // them moi
		if(isset( $_POST['dangky'] )){
			// kiem tra ten trung
			$d->reset();
			$d->setTable('user');
			$d->setWhere('email', $_POST['username']);
			$d->select();
			if($d->num_rows()>0) transfer("Email này đã đăng ký.<br>Xin chọn Email khác.", "../user/register.html");
			
			// kiem tra ten trung
			$d->reset();
			$d->setTable('user');
			$d->setWhere('dienthoai', $_POST['dienthoai']);
			$d->select();
			if($d->num_rows()>0) transfer("Số điện thoại này này đã đăng ký.<br>Xin chọn Số điện thoại khác.", "../user/register.html");
			
			
			
			$data['username'] = $_POST['username'];
			$data['dienthoai'] = $_POST['dienthoai'];
				$data['dienthoai'] = str_replace(array('-', '.', ' '), '', $data['dienthoai']);
			$data['date'] = $_POST['date'];
			$data['password'] = md5($_POST['password']);
			$data['email'] = $_POST['username'];
			$data['ngaytao']=time();
			$data['role'] = 1;
			$data['com'] = "user";
			
			$d->setTable('user');
			if($d->insert($data)){
				$sql = "select * from #_user where email='".$data['email']."' ";
				$d->query($sql);
				$_SESSION['user']=$d->fetch_array();
				while(1){
					$magiamgia="WC".fns_Rand_digit(1,9,6);
					$sql_check = "select * from #_khuyenmai where ten='".$magiamgia."' ";
					$d->query($sql_check);
					$tam=$d->result_array();
					if(count($tam)>0){
						
					}else{
						break;
					}
					
				}
				$sql_khuyenmai = "INSERT INTO  table_khuyenmai (ten,mota,ngaytao,id_user) VALUES ('".$magiamgia."' ,'Giảm giá 3% cho đơn hàng Concept đầu tiên',".time().",'".$_SESSION['user']['id']."') " ;
				$d->query($sql_khuyenmai);
				
				transfer("Bạn đã đăng ký thành công", "../user/khuyen-mai.html");
				
			}
			else
				transfer("Lưu dữ liệu bị lỗi", "../user/register.html");
		}
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		// kiem tra
		$d->reset();
		$d->setTable('user');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()>0){
			$row = $d->fetch_array();
			if($row['role'] != 1) transfer("Bạn không có quyền trên tài khoản này.<br>Mọi thắc mắc xin liên hệ quản trị website.", "index.php?com=user&act=man");
		}
		
		// xoa item
		$sql = "delete from #_user where id='".$id."'";
		if($d->query($sql))
			transfer("Dữ liệu đã được xóa", "index.php?com=user&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=user&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=user&act=man");
}


///////////////////////
function edit(){
	global $d, $item, $login_name;
	
	if(!empty($_POST)){
		$sql = "select * from #_user where username!='".$_SESSION['login']['username']."' and username='".$_POST['username']."' and role=3";
		$d->query($sql);
		if($d->num_rows() > 0) transfer("Tên đăng nhập này đã có","index.php?com=user&act=edit");
		
		$sql = "select * from #_user where username='".$_SESSION['login']['username']."'";
		$d->query($sql);
		if($d->num_rows() == 1){
			$row = $d->fetch_array();
			if($row['password'] != md5($_POST['oldpassword'])) transfer("Mật khẩu không chính xác","index.php?com=user&act=edit");
		}else{
			die('Hệ thống bị lỗi. Xin liên hệ với admin. <br>Cám ơn.');
		}
		
		$data['username'] = $_POST['username'];
		if($_POST['new_pass']!="") 
			$data['password'] = md5($_POST['new_pass']);
		$data['ten'] = $_POST['ten'];
		$data['email'] = $_POST['email'];
		$data['nick_yahoo'] = $_POST['nick_yahoo'];
		$data['nick_skype'] = $_POST['nick_skype'];
		$data['dienthoai'] = $_POST['dienthoai'];
		
		$d->reset();
		$d->setTable('user');
		$d->setWhere('username', $_SESSION['login']['username']);
		if($d->update($data)){
			session_unset();
			transfer("Dữ liệu đã được lưu.","index.php");
		}
	}
	
	$sql = "select * from #_user where username='".$_SESSION['login']['username']."'";
	$d->query($sql);
	if($d->num_rows() == 1){
		$item = $d->fetch_array();
	}
}
	
function login(){
	global $d, $login_name;
	if( isset( $_POST['dangnhap'] ) ){
	$username = $_POST['username'];
	$password = $_POST['password'];
		
	
	
	
	$sql = "select * from #_user where email='".$username."' or dienthoai ='".$username."' ";
	$d->query($sql);
	if($d->num_rows() == 1){
		$row = $d->fetch_array();
		if(($row['password'] == md5($password))){
			$_SESSION['user'] = $row;
		
			if( isset( $_SESSION['backpage'] ) ){
				transfer("Đăng nhập thành công", $_SESSION['backpage']);
			}else{
			transfer("Đăng nhập thành công","../user/profile.html");
			}
		}
	}
	transfer("Tên đăng nhập, mật khẩu không chính xác", "../user/login.html");
	}
}

function logout(){
	global $login_name;
	unset($_SESSION['user']);
	delete_GioHangTam();
	transfer("Đăng xuất thành công", "../index.php");
}
?>