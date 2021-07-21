<script language="javascript" src="media/scripts/my_script.js"></script>
<script language="javascript">
function js_submit(){
	<?php if ($_REQUEST['act'] != 'edit'){?>
		if(!isEmpty(document.frm.new_pass) && document.frm.new_pass.value.length<5){
			alert("Mật khẩu phải nhiều hơn 4 ký tự.");
			document.frm.new_pass.focus();
			return false;
		}
		
		if(!isEmpty(document.frm.new_pass) && document.frm.new_pass.value!=document.frm.renew_pass.value){
			alert("Nhập lại mật khẩu mới không chính xác.");
			document.frm.renew_pass.focus();
			return false;
		}
	<?php }?>	
	if(!isEmpty(document.frm.email) && !check_email(document.frm.email.value)){
		alert('Email không hợp lệ.');
		document.frm.email.focus();
		return false;
	}
	document.frm.submit();
}
</script>
<h3>Thêm mới khách hàng</h3>

<form name="frm" method="post" action="index.php?com=danhgia&act=save" enctype="multipart/form-data" class="nhaplieu">

	<b>Tên khách hàng </b> 
	<input type="text" name="ten" value="<?php echo @$item['hoten']?>" class="input" /><br /><br />
	
    
    <b>Tên sản phẩm  </b>
	<input type="text" name="sp" value="<?php echo @$item['sp']?>" class="input" /><br /> <br />
    
    <b>Tiêu đề </b>
	<input type="text" name="tieude" value="<?php echo @$item['tieude']?>" class="input" /><br /> <br />
    
    <b>Đánh giá </b>
	<input type="text" name="danhgia" value="<?php echo @$item['danhgia']?>" class="input" /><br /> <br />
    
    <b>Nội dung </b>
	
    <div class="">
    <?php echo @$item['noidung']?>
    </div>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
    
	
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="button" value="Lưu" class="btn"  onclick="js_submit();" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=danhgia&act=man'" class="btn" />
</form>