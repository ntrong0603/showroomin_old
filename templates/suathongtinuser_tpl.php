
<div class="clearfix"></div><div class="hei7"></div>
    <div style="width:87%; height:auto; margin:0 auto; ">
    <div class="col-md-3 nopad">
   		<?php include _template."layout/left.php";?>
   </div>
   <div class="col-md-9" >
   		<div class="bar"><a href="index"> <?php echo _trangchu?> > </a> <h1> &nbsp;<?php echo _suathongtin?> </h1></div>
            <div class="clearfix"></div>
            <div class="noidung">
            <form method="post" name="frm" action="" >
            		<a href="doi-mat-khau"><div class="tieude_dang"><?php echo _doimatkhau?></div></a>
            	
                  
                  
                  <div class="tieude_dang sss"><?php echo _thongtinkhachhang?></div>
				 <div class="form-group">
                    <label for="tenlienhe"><?php echo _hovaten?>: </label>
                    <input type="text" class="form-control" id="tenlienhe" name="tenlienhe" placeholder="" required="required" value="<?php echo $thongtin_cus[0]['ten']?>">
                  </div>
                  <div class="form-group">
                    <label for="diachi"><?php echo _diachi?>: </label>
                    <input type="text" class="form-control" id="diachi" name="diachi" placeholder="" required="required" value="<?php echo $thongtin_cus[0]['diachi']?>">
                  </div>
                  <div class="form-group">
                    <label for="dienthoai"><?php echo _sodienthoai?>: </label>
                    <input type="text" class="form-control" id="dienthoai" name="dienthoai" placeholder="" required="required" value="<?php echo $thongtin_cus[0]['dienthoai']?>">
                  </div>
                  <div class="form-group">
                      <label class="radio-inline">
                      <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0"><?php echo _nhanthongtin?> 
                    </label>
                    <label class="radio-inline">
                      <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1"> <?php echo _khongnhanthongtin?> 
                    </label>
                    
                  </div>
                  <input type="submit" class="btn btn-default" value="<?php echo _gui?>"/>
                  <input class="btn btn-default" type="button" value="Reset" onclick="document.frm.reset();" />
                  
         
	             </form>
                   
            </div>
   </div></div>
   <div class="clearfix"></div> <div class="hei7"></div>



