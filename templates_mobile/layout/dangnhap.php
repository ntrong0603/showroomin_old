<script type="text/javascript">
function login() {
  ten=$('#account1').val();
  pas = $('#password').val();
 
  $.ajax({
		type:"post",
		url:"ajax/dangnhap.php",
		data:"ten="+ten+"&pas="+pas,
		async:false,
		success:function(kq){
			$('.notices')(kq);
			a = kq.length;				
			if(a <= 78 ){
				alert('Bạn đã đăng nhập thành công !!!')
				window.location="index";
				}
			
		}
	})
}
</script>
<div id="login-form" class="login-form">
<div class="loading"></div>
<div class="title"><?php echo _thongtinkhachhang?></div>		
<form method="post" name="frm_order" action="thanh-toan-nhanh" enctype="multipart/form-data" onsubmit="return check();">          
    <table id="tt" width="100%" cellpadding="5" cellspacing="0" border="0" class="tablelienhe">   
      
      <tr>
        <td ><?php echo _hovaten;?>:<span>*</span></td>        
        <td class="input-text" ><input  type='text' class="form-control" name="ten" id="ten" placeholder='<?php echo _hovaten;?>' class="input" value="" required />
        <input type="hidden"  type='text' class="form-control" name="id_ten" id="id_ten" class="input" value="<?php echo $chitietsanpham['id']?>"  />
        </td>
      </tr>
      <tr>
        <td><?php echo _sodienthoai;?>: <span>*</span></td>
        <td class="input-text" ><input type='text'class="form-control" name="dienthoai" placeholder='<?php echo _sodienthoai;?>'  id="dienthoai" class="input" value="" required/></td>
      </tr>

	 <tr>
        <td>Số lượng: <span>*</span></td>
        <td class="input-text" ><input  type='text' class="form-control" name="solg" id="solg"  placeholder='Số lượng' class="input" value="" required/></td>
      </tr>	
      
      <tr>
        <td><?php echo _diachi?>:<span>*</span></td>
        <td class="input-text" ><input type='text'  class="form-control"  name="diachi" placeholder='<?php echo _diachi;?>' id="diachi" class="input"  value="" required/></td>
       </tr>
       <tr>
        <td>E-mail<span>*</span></td>
        <td class="input-text" ><input type='text' class="form-control" name="email" placeholder='Email' id="email" class="input"  value="" required/></td>
      </tr>     
      <tr>
        <td><?php echo _noidung?></td>
        <td class="input-area" ><textarea name="noidung"  class="form-control" cols="50" rows="5"  required><?php echo _noidung?></textarea></td>
        </tr>      
           
    </table>

    <div style="text-align: right; padding-top:20px;">
      
        <input title='<?php echo _tieptuc?>' class="button" type="submit" name="next" value="<?php echo _tieptuc?>" style="cursor:pointer;"/>
        <input class='button' onclick="closeForm('login-form')" value='Thoát'>
    </div>
      </form>		
</div>
		
    