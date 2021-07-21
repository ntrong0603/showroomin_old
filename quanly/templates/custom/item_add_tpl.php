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

<form name="frm" method="post" action="index.php?com=custom&act=save" enctype="multipart/form-data" class="nhaplieu">

	<b>Tên khách hàng </b> 
	<input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /><br />
	
	<b>Tên đăng nhập </b>
	<input type="text" name="username" value="<?php echo @$item['username']?>" class="input" /><br /> <br />
    <?php if ($_REQUEST['act'] != 'edit'){?>
        <b>Mật khẩu </b> <input type="password" name="new_pass" id="new_pass" value="" class="input" /><br /><br />
        <b>Nhập lại mật khẩu</b> <input type="password" name="renew_pass" value="" class="input" /><br /><br />
    <?php }?>
    <b>Skype </b>
	<input type="text" name="skype" value="<?php echo @$item['skype']?>" class="input" /><br /> <br />
    
    <b>Email </b>
	<input type="text" name="email" value="<?php echo @$item['email']?>" class="input" /><br /> <br />
    
    <b>Điện thoại </b>
	<input type="text" name="dienthoai" value="<?php echo @$item['dienthoai']?>" class="input" /><br /> <br />
    
    <b>Địa chỉ </b>
	<input type="text" name="diachi" value="<?php echo @$item['diachi']?>" class="input" /><br /> <br />
    
    
    <script type="text/javascript">
			$(document).ready(function(){
						$('#id_tinh').change(function(){
							num=$(this).val();
							
							$.ajax({
								type:"post",
								url:"tinh.php",
								data:"tinh="+num,
								async:false,
								success:function(kq){
									$("#id_huyen").html(kq);
									$("#id_phuong").html('<option value="0">---Vui lòng chọn phường---</option>');
									
								}
							})
						})
						
					})
		</script>
   
		<b>Danh mục tỉnh:</b>
		<?php
		$d->reset();
        $sql="select * from table_tinhthanh_danhmuc order by stt";
		$d->query($sql);
	    $dm_tinh = $d->result_array();
		?>
        <select id="id_tinh" name="id_tinh" class="main_font">
			<option value="0">---Vui lòng chọn tỉnh---</option>
            <?php for($i=0;$i<count($dm_tinh);$i++){ ?>
            <option value="<?php echo $dm_tinh[$i]['id']?>" <?php if($dm_tinh[$i]['id'] == $item['id_tinh']) echo ' selected="selected"'; ?>><?php echo $dm_tinh[$i]['ten']?></option>
            <?php }?>	
         </select>
        <br /><br />
       
		
    
        <b>Danh mục huyện:</b>
        <div id="chonhuyen">
            <select id="id_huyen" name="id_huyen" class="main_font" onchange="load_phuong(),load_duan()">
                <option value="0">---Vui lòng chọn huyện---</option>
                <?php
                
                    $d->reset();
                    $sql="select * from table_tinhthanh_list where id_danhmuc = '".$item['id_tinh']."' order by stt";
                    $d->query($sql);
                    $huyenchon = $d->result_array();
                    for($i=0;$i<count($huyenchon);$i++){
                ?>
                    <option value="<?php echo $huyenchon[$i]['id']?>" <?php if($huyenchon[$i]['id'] == $item['id_huyen'] ){ echo 'selected="selected"'; }?> ><?php echo $huyenchon[$i]['ten']?></option>
                <?php	
                }
                ?>
            </select>
    </div>
        <br />
    
	
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
    
	
	
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="button" value="Lưu" class="btn"  onclick="js_submit();" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=custom&act=man'" class="btn" />
</form>