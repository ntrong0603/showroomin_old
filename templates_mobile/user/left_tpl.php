<script type="text/javascript">
function check() {
  
}
</script>
<div id="register-form" class="register-form">

<div class="loading"></div>
<div class="message-box">
    <div class="message"></div>
  
</div>
<div class="title">Đăng ký thành viên</div>
<div class="notices">
	<ul>
		<li>Tên truy cập không bao gồm khoảng trắng và ký tự đặc biệt</li>
		<li>Mật khẩu phải lớn hơn 6 ký tự</li>
	</ul>
</div>
<div class="input-form">
    <div class="row">
        <div class="col1">
		    Tên truy cập(<span class="note">*</span>)
	    </div>    
	    <div class="col2">
		    <input id="account" id="account" maxlength="50" type="text" onkeyup="check()">						
	    </div>		
	    <div class="suggesstion">	        
	        <ul>
	            <li><span>Tên truy cập là chữ, số viết liền không dấu, không bao gồm ký tự đặc biệt.</span></li>
	            <li><span>Tên truy cập từ 3 đến 45 ký tự.</span></li>
	        </ul>
	    </div>
	</div>
    <div class="row">				
        <div class="col1">
		    Mật khẩu(<span class="note">*</span>)
	    </div>
	    <div class="col2">
		    <input id="password1" maxlength="50" type="password">						
	    </div>
	    <div class="suggesstion">	        
	        <ul>
	            <li><span>Mật khẩu từ 6 đến 30 ký tự.</span></li>
	        </ul>
	    </div>
    </div>
    <div class="row">
	    <div class="col1">
		    Nhập lại mật khẩu(<span class="note">*</span>)
	    </div>
	    <div class="col2">
		    <input id="password2" maxlength="50" type="password">						
	    </div>
    </div>
    <div class="row">
	    <div class="col1">
		    Họ tên(<span class="note">*</span>)
	    </div>
	    <div class="col2">
		    <input id="username" name="username" maxlength="50" type="text">							
	    </div>
	    <div class="suggesstion">	        
	        <ul>
	            <li><span>Tên liên hệ khi khách hàng có nhu cầu cần mua/ cần thuê gọi.</span></li>
	        </ul>
	    </div>
    </div>
    <div class="row">
	    <div class="col1">
		    Di động (<span class="note">*</span>)
	    </div>
	    <div class="col2">
		    <input id="phone1" maxlength="12" type="text">							
	    </div>
	    <div class="suggesstion">	        
	        <ul>
	            <li><span>Số điện thoại liên hệ để khách hàng có nhu cầu cần mua/cần thuê gọi.</span></li>	            
	        </ul>
	    </div>
    </div>
    
    <div class="row">
	    <div class="col1">
		    Email liên hệ(<span class="note">*</span>)<br>
	    </div>
	    <div class="col2">
		    <input id="email1" maxlength="50" type="text">
	    </div>
	    <div class="suggesstion">	        
	        <ul>
	            <li><span>Email dùng để nhận thông tin xác thực, phục hồi mật khẩu,...</span></li>
	        </ul>
	    </div>
    </div>
    
    <div class="row">
	    <div class="col1">
		    Tỉnh/Thành phố(<span class="note">*</span>)
	    </div>
	    <div class="col2">
        <script type="text/javascript">
			$(document).ready(function(){
						$('#id_tinh_ng').change(function(){
							
							num=$(this).val();
							
							
							$.ajax({
								type:"post",
								url:"ajax/tinh.php",
								data:"tinh="+num,
								async:false,
								success:function(kq){
									
									$("#id_huyen_ng")(kq);
									
									
								}
							})
						})
						
					})
			
		</script>
   
	   
		<?php
		$d->reset();
		$sql="select * from table_tinhthanh_danhmuc order by stt";
		$d->query($sql);
		$dm_tinh = $d->result_array();
		?>
		    <select id="id_tinh_ng" >														 
			    
                <option value="0">---------- Tất cả ----------</option>
                <?php for($i=0;$i<count($dm_tinh);$i++){ ?>
                <option value="<?php echo $dm_tinh[$i]['id']?>" <?php if($dm_tinh[$i]['id'] == $item['id_tinh']) echo ' selected="selected"'; ?>><?php echo $dm_tinh[$i]['ten']?></option>
                <?php }?>	
           </select>          						
	    </div>
    </div>
    <div class="row">
	    <div class="col1">
		    Quận/Huyện(<span class="note">*</span>)
	    </div>
	    <div class="col2">
		   <select id="id_huyen_ng" name="id_huyen_ng" class="main_font" onchange="load_phuong(),load_duan()">
                		<option value="0">---------- Tất cả ----------</option>
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
    </div>
    <div class="row">
	    <div class="col1">
		    <b style="color:Blue">Mã an toàn</b>
	    </div>
	    <div class="col2">
		   <img src="captcha/random_image.php" class="capcha" />
           <input id="captcha" class="captcha" style="height:26px; margin-left:5px; width:105px" maxlength="7" type="text">							
	    </div>
    </div>
    <div class="row">
	    <div class="col button">		
        <script type="text/javascript">
		function registerMember(){
				ten=$('#account').val();
				pas1=$('#password1').val();
				pas2=$('#password2').val();
				username=$('#username').val();
				phone=$('#phone1').val();
				email=$('#email1').val();
				tinh=$('#id_tinh_ng').val();
				huyen=$('#id_huyen_ng').val();
				captcha=$('#captcha').val();
				
				$.ajax({
						type:"post",
						url:"ajax/dangki.php",
						data:"ten="+ten+"&pas1="+pas1+"&pas2="+pas2+"&username="+username+"&phone="+phone+"&email="+email+"&tinh="+tinh+"&huyen="+huyen+"&captcha="+captcha,
						async:false,
						success:function(kq){
							$('.notices ul')(kq);
							a = kq.length;
							
							if(a <= 78 ){
								alert('Bạn đã đăng kí thành công !!!')
								window.location="index";
								}
							
						}
					})
			}
		</script>		
			    <span onclick="registerMember()">Đăng ký</span><span onclick="closeForm('register-form')">Thoát</span>
	    </div>	
    </div>
    <div style="color:Red">Số điện thoại hỗ trợ <b><i><?php echo $setting['dienthoai']?></i></b></div>
</div>
</div>