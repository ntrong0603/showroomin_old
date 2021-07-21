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
    
    <b>Họ tên: </b><strong><?=@$item['ten']?></strong><br />		<br />  
    <b>Điện thoại: </b><strong><?=@$item['dienthoai']?></strong><br />	<br />	  
    <b>Email: </b><strong><?=@$item['email']?></strong><br />		  <br />
    <b>Địa chỉ: </b><strong><?=@$item['diachi']?></strong><br />		  <br />
    <b>Tiêu đề: </b><strong><?=@$item['title']?></strong><br />		  <br />
    <b>Dịch vụ quan tâm: </b><strong><?=@stripslashes($item['nhucau'])?></strong><br />		  <br />
    <b>Nội dung: </b><strong><?=@stripslashes($item['noidung'])?></strong><br />		  <br />

    