

<h3>Chi tiết</h3>

<form name="frm" method="post" action="index.php?com=lichsuchuyenkhoan&act=save&curPage=<?php echo $_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
   
	
    <b>User khách</b> <input type="text" name="user" value="<?php echo $item['user']?>" class="input" /><br />     
    <b>Tên chủ tài khoản</b> <input type="text" name="tenchutaikhoan" value="<?php echo $item['tenchutaikhoan']?>" class="input" /><br />     
    <b>Ngân hàng</b> <input type="text" name="nganhang" value="<?php echo $item['nganhang']?>" class="input" /><br />     
    <b>Số tài khoản</b> <input type="text" name="sotaikhoan" value="<?php echo $item['sotaikhoan']?>" class="input" /><br />     
    <b>Ngày chuyển khoản</b> <input type="text" name="ngaychuyenkhoan" value="<?php echo $item['ngaychuyenkhoan']?>" class="input" /><br />     
    <b>Đơn hàng từ ngày</b> <input type="text" name="tungay" value="<?php echo $item['tungay']?>" class="input" /><br />     
    <b>Đến ngày</b> <input type="text" name="denngay" value="<?php echo $item['denngay']?>" class="input" /><br />     
   <b>Giao thành công</b> <input type="checkbox" name="giaothanhcong" <?php echo (isset($item['giaothanhcong']) && $item['giaothanhcong']==1)?'checked="checked"':''?>><br /> 
    <b>Hủy</b> <input type="checkbox" name="huy" <?php echo (isset($item['huy']) && $item['huy']==1)?'checked="checked"':''?>><br /> 
    <b>Tổng cước hủy</b> <input type="text" name="tongcuochuy" value="<?php echo $item['tongcuochuy']?>" class="input" /><br />     
    <b>COD </b> <input type="text" name="cod" value="<?php echo $item['cod']?>" class="input" /><br />     
    <b>Cước ngoại tỉnh chưa thu </b> <input type="text" name="cuocngoaitinhchuathu" value="<?php echo $item['cuocngoaitinhchuathu']?>" class="input" /><br />     
    <b>Nợ kỳ trước </b> <input type="text" name="nokytruoc" value="<?php echo $item['nokytruoc']?>" class="input" /><br />     
    <b>Tổng chuyển khoản </b> <input type="text" name="tongchuyenkhoan" value="<?php echo $item['tongchuyenkhoan']?>" class="input" /><br />   
	
	
   

	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=lichsuchuyenkhoan&act=man'" class="btn" />
</form>


