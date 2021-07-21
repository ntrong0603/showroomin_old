
<div class="clearfix"></div><div class="hei7"></div>
    <div style="width:87%; height:auto; margin:0 auto; ">
    <div class="col-md-3 nopad">
   		<?php include _template."layout/left.php";?>
   </div>
   <div class="col-md-9" >
   		<div class="bar"><a href="index"> Trang chủ > </a> <h1> &nbsp; Đăng ký</h1></div>
            <div class="clearfix"></div>
            <div class="noidung">
            <form method="post" name="frm" action="" >
            <div class="tieude_dang">THÔNG TIN ĐĂNG NHẬP</div>
            	<div class="form-group">
                    <label for="tenlienhe">Mật khẩu cũ: </label>
                    <input type="password" data-minlength="6"  class="form-control" id="password" name="password" placeholder="Password đăng nhập" required="required">
                    
                  </div>
                  
                  <div class="form-group">
                    <label for="tenlienhe">Mật khẩu: </label>
                    <input type="password" data-minlength="6"  class="form-control" id="password1" name="password1" placeholder="Password đăng nhập" required="required">
                    
                  </div>
                  
                  <div class="form-group">
                    <label for="tenlienhe">Mật khẩu (Nhập lại): </label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Password không được trùng" required="required">
                  </div>
                  
                  <input type="submit" class="btn btn-default" value="<?php echo _gui?>"/>
                  <input class="btn btn-default" type="button" value="Reset" onclick="document.frm.reset();" />
                  
         
	             </form>
                   
            </div>
   </div></div>
   <div class="clearfix"></div> <div class="hei7"></div>



