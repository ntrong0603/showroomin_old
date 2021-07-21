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
			if( $_SESSION['login']['role']==2 and $row['id']>=5 ){}else{
			if($row["id"]==$i)
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["trangthai"].'</option>';			
			}
		}
		$str.='</select>';
		return $str;
	}
	
	?>
<h3>Chi tiết đơn hàng</h3>

<form name="frm" method="post" action="index.php?com=order&act=save" enctype="multipart/form-data" class="nhaplieu">
	<?php xuathoadon($item['id']);?>	    
    <b>Họ tên khách hàng: </b><strong><?php echo @$item['hoten']?></strong><br />		  
        <b>Điện thoại: </b><strong><?php echo @$item['dienthoai']?></strong><br />		  
        <b>Email: </b><strong><?php echo @$item['email']?></strong><br />		  
            <b>Địa chỉ: </b><strong><?php echo @$item['diachi']?></strong><br />		  
    <div>
    
<?php echo @$item['donhang']?>
    
    
  </div>
	
	<b>Nội dung thêm:</b><br/>
	<div>
	<?php echo @stripslashes($item['noidung'])?></div>	
    <br/>
    <b>Ghi chú</b>
     <textarea name="ghichu" cols="50" rows="5" id="ghichu"><?php echo @$item['ghichu']?></textarea><br/>
     <b>Tình trạng</b><?php echo tinhtrang($item['tinhtrang'])?><br/>
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=order&act=man'" class="btn" />
</form>