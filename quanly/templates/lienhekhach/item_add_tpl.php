<?php
function tinhtrang($i=0)
	{
		$sql="select * from table_tinhtrang order by id";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_tinhtrang" name="id_tinhtrang" class="main_font">					
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$i)
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["trangthai"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	?>
<h3>Chi tiết liên hệ</h3>
    
    <b>Họ tên: </b><strong><?php echo @$item['ten']?></strong><br />		<br />  
    <b>Điện thoại: </b><strong><?php echo @$item['dienthoai']?></strong><br />	<br />	  
    <b>Email: </b><strong><?php echo @$item['email']?></strong><br />		  <br />
    <b>Địa chỉ: </b><strong><?php echo @$item['diachi']?></strong><br />		  <br />
    <b>Tiêu đề: </b><strong><?php echo @$item['title']?></strong><br />		  <br />
    <b>Nội dung: </b><strong><?php echo @stripslashes($item['noidung'])?></strong><br />		  <br />
    