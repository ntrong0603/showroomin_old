 <div id='' class='' style='background: #f2f2f2' > 
 <div class=" container">
            <div class="row ">
				<div id='' class='main-user col-md-8' >  
				
				<ul class="nav nav-tabs tab-login">
				  <li class="<?php if( $act=='login' ){echo "active"; } ?>"><a data-toggle="tab" href="#dang-nhap">Đăng nhập</a></li>
				  <li class="<?php if( $act=='register' ){echo "active"; } ?>"><a data-toggle="tab" href="#dang-ky">Đăng ký</a></li>
				</ul>

				<div class="tab-content login">
				  <div id="dang-nhap" class="tab-pane fade in <?php if( $act=='login' ){echo "active"; } ?>">
						 <form method="post" name="frm" action="./user/login.html" autocomplete=off >
				
				
							
								<div class="form-group text-center">
								<div id='' class='blank-40' >  </div>
								<img src='./images/icon-user.png' alt='' title='' />
								<div id='' class='blank-40' >  </div>
								</div>
							  
								<div class="form-group text-center">
								
									<div id='login-user' class='item-login' > 
									<input type="email" class="form-control"  name="username" placeholder="Email/Số điện thoại" required="required">
									</div>
								</div>
								  
								<div class="form-group text-center">
									<div id='login-password' class='item-login' > 
									<input type="password" data-minlength="6"  class="form-control"  name="password" placeholder="Mật khẩu" required="required">
									</div>
								</div>
							  
								<div class="form-group text-center">
								
								  <input type="submit" style='float: none;margin-top: 10px; height: 38px;' name='dangnhap' class=" btn-dangnhap" value="Đăng nhập"/>
								 
								 </div>
								<div class="form-group text-center">
								
								 <a href='#' class='quenmatkhau' >Quên mật khẩu?</a>
								 
								 </div>
						 
							 </form>
				  </div>
				  
				  <div id="dang-ky" class="tab-pane fade in <?php if( $act=='register' ){echo "active"; } ?>">
							 <form method="post" name="frm" action="./user/register.html" >
       
									
									
										<div class="form-group text-center">
										<div id='' class='blank-40' >  </div>
										<img src='./images/icon-user.png' alt='' title='' />
										<div id='' class='blank-40' >  </div>
										</div>
							  
									<div class="form-group text-center">
										<div id='login-user' class='item-login' > 
										<input type="text" class="form-control"  name="username" placeholder="Họ tên" required="required">
										</div>
									</div>
									  
									<div class="form-group text-center">
										<div id='login-phone' class='item-login' > 
										<input type="number" class="form-control" id='dienthoai' name="dienthoai" onkeyup="kiemtradienthoai(this.value)" placeholder="Điện thoại" required="required">
										<!--<a href='#' id='guimaxacthuc' >Gửi mã xác thực</a>-->
										</div>
									</div>
									<div class="text-center">
										<div id='thongbaodienthoai' class='' > 
											
										</div>
									</div>
									  <!--
									<div class="form-group text-center">
										<div id='login-code' class='item-login' > 
										<input type="text" class="form-control"  name="code" placeholder="Mã xác thực" required="required">
										</div>
									</div>
									  -->
									  
									<div class="form-group text-center">
										<div id='login-email' class='item-login' > 
										<input type="email" class="form-control" id="email" name="username"  onkeyup="kiemtraemail(this.value)"  placeholder="Email" required="required">
										</div>
									</div>
									<div class="text-center">
										<div id='thongbaoemail' class='' > 
											
										</div>
									</div>
									  <div class="form-group text-center">
										<div id='login-password' class='item-login' > 
										<input type="password" data-minlength="6"  class="form-control" id="password1" name="password" placeholder="Mật khẩu" required="required">
										
									  </div>
									  </div>
									  
									  <div class="form-group text-center">
									  <div id='login-password' class='item-login' > 
										<input type="password" class="form-control" id="password2" name="password2" placeholder="Nhập lại mật khẩu" required="required">
									  </div>
									  </div>
									  <div class="form-group text-center">
									  <div id='login-date' class='item-login' > 
										<input type="date" class="form-control"  name="date" placeholder="Ngày sinh          ____/____/____" required="required">
									  </div>
									  </div>
									
									<div class="form-group text-center">
									  <input type="submit" style='margin-top: 10px;float: none;height: 38px;' name='dangky' class="btn-dangnhap" value="Đăng ký"/>
									  </div>
									  
									<div class="form-group text-center">
									<div id='' class='chinhsachbaomat' > 
										Khi nhấn Đăng ký bạn đã đồng ý với
										<a href='#' >Chính sách bảo mật của Showroomin</a>
									  
									  </div>
									  </div>
									  
							 
							 
									 </form>
				  </div>
				  
				</div>
	
				
				</div>
			</div>
</div>
</div>

<script>
	function kiemtradienthoai(str){
	
	var xhttp;
	$("#thongbaodienthoai").show();
	/*if (str.length == 0) { 
    	document.getElementById("textgoiy").innerHTML = "";
		return;
	}*/
	xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("thongbaodienthoai").innerHTML = this.responseText;
		}
	};
	
	xhttp.open("GET", "ajax/dangky.php?dienthoai="+str, true);
	xhttp.send(); 

	}
	function kiemtraemail(str){
	
	var xhttp;
	$("#thongbaoemail").show();
	/*if (str.length == 0) { 
    	document.getElementById("textgoiy").innerHTML = "";
		return;
	}*/
	xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("thongbaoemail").innerHTML = this.responseText;
		}
	};
	
	xhttp.open("GET", "ajax/dangky.php?email="+str, true);
	xhttp.send(); 

	}
</script>