
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
                    <label for="tenlienhe">Password cũ: </label>
                    <input type="password" data-minlength="6"  name='passwordcu' class="form-control" id=""  >
                    
					</div>	
					
                  <div class="form-group">
                    <label for="tenlienhe">Password mới: </label>
                    <input type="password" data-minlength="6"  name='password' class="form-control" id=""  >
                    
					</div>	
					
                  <div class="form-group">
                    <label for="tenlienhe">Password nhập lại: </label>
                    <input type="password" data-minlength="6"  name='password2' class="form-control" id=""  >
                    
					</div>	
					
                  
					
                  
                 
                  <input type="submit" class="btn btn-dangnhap" value="Cập Nhật"/>
                  <input class="btn btn-dangky" type="button" value="Reset" onclick="document.frm.reset();" />
                
         
	             </form>
                   
            </div>
   </div>

</div>
  </div>

