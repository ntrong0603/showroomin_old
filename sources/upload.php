<?php 

if( isset( $_POST['ten'] ) ){
	$temp = $_FILES;
	
				$img['name'] = $temp['file']['name'];
				
				$img['type'] = $temp['file']['type'];
				
				$img['tmp_name'] = $temp['file']['tmp_name'];
	
				$img['error'] = $temp['file']['error'];
	
				$img['size'] = $temp['file']['size'];
				
				$filenameOnly = array_pop(array_reverse(explode(".", $img['name'])));
				
				$ten_pic=$filenameOnly."_".time();
	
			if($photo = upload_image("file", 'rar,RAR,zip,ZIP', './upload/files/',$ten_pic)){
				$data['photo'] = $photo;
			
			}
			
			$data['hienthi'] = 1;
			$data['vitri'] = 1;
			$data['com'] = 'upload';
			 $data['ngaytao'] = time();
			
			$data['ten'] = $_POST['ten'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['mota'] = $_POST['mota'];
			  $data['id_sp'] = 'upload';
			$d->reset();
			$d->setTable('upload');
			
			if(!$d->insert($data)) transfer("Upload thất bại", "trang-chu");
			transfer("Upload thành công <br/>
			<span style='color:blue;line-height:24px;'>CHÚNG TÔI SẼ ĐIỆN THOẠI XÁC NHẬN VỚI QUÝ KHÁCH TRONG THỜI GIAN SỚM NHẤT.</span><br/>
<span style='color:red;line-height:28px;'>XIN CẢM ƠN QUÝ KHÁCH HÀNG!</span>", "trang-chu",6);
}
$title = "Trang Upload File";
			?>