<?php  if(!defined('_source')) die("Error");
if(is_array($_SESSION['user'])){ 
		$d->reset();
		$sql="select * from table_custom where id = '".$_SESSION['user']['id']."' ";
		$d->query($sql);
		$thongtin_cus = $d->result_array();
	}
if(!empty($_POST))
		{
		
		
		$data['ten'] = $_POST['tenlienhe'];
		$data['dienthoai'] = $_POST['dienthoai'];
		
		$data['diachi'] = $_POST['diachi'];
		
		$data['lan'] = $_POST['inlineRadioOptions'];
		$flas = 0;
		
		if($flas == 0){
			$d->reset();
			$d->setTable('custom');
			$d->setWhere('id', $_SESSION['user']['id'] );
			if($d->update($data)){
					$_SESSION['user']['name'] = $data['ten'];
					alert(_suathongtinthanhcong);
					chuyentrang('index');
				}
					
			
			
		}
				
		}
			
		

?>


