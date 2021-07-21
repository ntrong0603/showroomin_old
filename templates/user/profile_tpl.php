
  <div id='' class='container' >
		<div id='' class='row' >  
    <div class="col-md-3 ">
   		<?php include _template."user/left.php";?>
   </div>
   <div class="col-md-6" >
   		<div class="bar" ><h1> Profile</h1></div>
            <div class="clearfix"></div>
            <div class="noidung">
            <form method="post" name="frm" action="../user/register.html" >
				
					<div class="form-group">
                    <label for="tenlienhe">Email: </label>
                    <input type="text" data-minlength="6"  class="form-control" id="" value='<?php echo $_SESSION['user']['email'];?>' readonly >
                    
					</div>	
					<div class="form-group">
                    <label for="tenlienhe">Số điện thoại: </label>
                    <input type="tel" data-minlength="6"  class="form-control" name='dienthoai' value='<?php echo $_SESSION['user']['dienthoai'];?>' >
                    
					</div>	
					<div class="form-group">
                    <label for="tenlienhe">Họ và tên: </label>
                    <input type="text" data-minlength="6"  class="form-control" id="" name="ten" value='<?php echo $_SESSION['user']['ten'];?>' required="required">
                    
					</div>
					<div class="form-group">
                    <label for="tenlienhe">Địa chỉ nhận hàng: </label>
                    <input type="text" data-minlength="6"  class="form-control" id="" name="diachi" value='<?php echo $_SESSION['user']['diachi'];?>' >
                    
					</div>
                  
					<div class="form-group">
                    <label for="tenlienhe">Giới tính: </label>
                    <input type="radio"  value='0' name="sex" <?php if( $_SESSION['user']['sex']==0 ){echo " checked ";}?>> Nam
                    <input type="radio"  value='1' name="sex" <?php if( $_SESSION['user']['sex']==1 ){echo " checked ";}?>> Nữ
                    
					</div>
                  
                 
                  <input type="submit" class="btn btn-dangnhap" value="Cập Nhật"/>
                  <input class="btn btn-dangky" type="button" value="Reset" onclick="document.frm.reset();" />
                  <a href='./user/change-password.html'>Thay đổi mật khẩu</a>
         
	             </form>
                   
            </div>
   </div>

</div>
  </div>

