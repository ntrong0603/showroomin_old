<script language="javascript" src="quanly/media/scripts/my_script.js"></script>
<script language="javascript">
function js_submit(){
	if(isEmpty(document.getElementById('tieude'), "Note: Vui lòng nhập tiêu đề tin !!!")){
		document.getElementById('tieude').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('noidung'), "Note: Vui lòng nhập nội dung tin !!!")){
		document.getElementById('noidung').focus();
		return false;
	}
	
	
	
	if(isEmpty(document.getElementById('loaitin'), "Note: Vui lòng chọn loại tin của bạn !!!")){
		document.getElementById('loaitin').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('id_tinh_tin'), "Note: Vui lòng chọn tỉnh thành của bất động sản !!!")){
		document.getElementById('id_tinh_tin').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('id_huyen_tin'), "Note: Vui lòng chọn huyện của bất động sản !!!")){
		document.getElementById('id_huyen_tin').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('diachi'), "Note: Vui lòng điền địa chỉ của bất động sản !!!")){
		document.getElementById('diachi').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('gia'), "Note: Vui lòng điền giá của bất động sản !!!")){
		document.getElementById('gia').focus();
		return false;
	}
	
	if(!isNumber(document.getElementById('gia'), "Note: Vui lòng điền giá của bất động sản là một con số !!!")){
		document.getElementById('gia').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('dientich'), "Note: Vui lòng điền diện tích của bất động sản !!!")){
		document.getElementById('dientich').focus();
		return false;
	}
	
	if(!isNumber(document.getElementById('dientich'), "Note: Vui lòng điền diện tích của bất động sản là một con số !!!")){
		document.getElementById('dientich').focus();
		return false;
	}
	
	if(document.getElementById('chieungang') != ''){
		if(!isNumber(document.getElementById('chieungang'), "Note: Vui lòng điền chiều ngang của bất động sản là một con số !!!")){
				document.getElementById('chieungang').focus();
				return false;
			}
		}
	if(document.getElementById('chieudai') != ''){
		if(!isNumber(document.getElementById('chieudai'), "Note: Vui lòng điền chiều dài của bất động sản là một con số !!!")){
				document.getElementById('chieudai').focus();
				return false;
			}
		}
		
	if(document.getElementById('duongrong') != ''){
		if(!isNumber(document.getElementById('duongrong'), "Note: Vui lòng điền đường rộng của bất động sản là một con số !!!")){
				document.getElementById('duongrong').focus();
				return false;
			}
		}
		
	if(document.getElementById('solau') != ''){
		if(!isNumber(document.getElementById('solau'), "Note: Vui lòng điền số lầu của bất động sản là một con số !!!")){
				document.getElementById('solau').focus();
				return false;
			}
		}
		
	if(document.getElementById('sophongngu') != ''){
		if(!isNumber(document.getElementById('sophongngu'), "Note: Vui lòng điền số phòng của bất động sản là một con số !!!")){
				document.getElementById('sophongngu').focus();
				return false;
			}
		}
	
	
	
	document.form_dang_tin.submit();
}
</script>
<div class="post-content">
	<div class="">
    <?php echo $baiviet['noidung']?>
    </div>
    <form id="form_dang_tin" name="form_dang_tin" action="" method="post" target="post_target" enctype="multipart/form-data" >
          
        
        <div class="title_left">Thông tin bắt buộc</div>
        <input name="matin" id="matin" type="hidden">
        <table> 
         <tbody>
         <tr>	        
            <td style="width:118px"><br>Tiêu đề(<span class="red">*</span>)</td>
            <td colspan="3">
                <label class="require">Chưa nhập tiêu đề</label><br>
                <input name="tieude" id="tieude" title="Tiêu đề từ 10 - 90 ký tự" maxlength="90" type="text" width="200">
                <div class="suggesstion">	        
	                <ul>
	                    <li><span>Tiêu đề phải lớn hơn 30 ký tự</span></li>
	                    <li><span>Tiêu đề mô tả ngắn về tài sản</span></li>
	                    <li><span>Không viết IN HOA, không chứa số điện thoại, không ký tự đặc biệt</span></li>
	                    <li><span>Tiêu đề không đúng quy định sẽ không đươc duyệt</span></li>
	                </ul>
	            </div>
            </td>
        </tr>
         <tr>
            <td><br>Nội dung(<span class="red">*</span>)</td>
            <td colspan="3">
                <label class="require">Chưa nhập nội dung</label><br>
                <textarea name="noidung" id="noidung" class="border_radius_dashed"></textarea>		            
            </td>
        </tr>	
         <tr>
            <td><br>Loại tin(<span class="red">*</span>)</td>
            <td style="width:300px;">
                <label class="require">Chưa chọn loại tin</label><br>
	            <select name="loaitin" id="loaitin">
                 <option value="">------------- Loại tin -----------</option>
                <?php
           
                $d->reset();
                $sql="select * from table_thuoctinh where id_danhmuc = 15  order by id";
                $d->query($sql);
                $thuoctinh = $d->result_array();
				for($i=0;$i<count($thuoctinh);$i++){
            	?>
               
                <option value="<?php echo $thuoctinh[$i]['id']?>"><?php echo $thuoctinh[$i]['ten']?></option>
                <?php }?>
            </select>
            </td>
            <td style="width:110px;"></td>
            <td>
                
            </select>
            </td>
        </tr>          
        <tr>
            <td><br>Tỉnh/ Thành(<span class="red">*</span>)</td>
            <td><label class="require">Chưa chọn tỉnh</label><br>
            	<script type="text/javascript">
					function load_huyen(){
						
						num=$('#id_tinh_tin').val();
					
							$.ajax({
								type:"post",
								url:"ajax/tinh.php",
								data:"tinh="+num,
								async:false,
								success:function(kq){
									
									$("#id_huyen_tin")(kq);
									
								}
							})
						}
						
					function load_phuong(){
						num=$('#id_huyen_tin').val();
							$.ajax({
								type:"post",
								url:"ajax/huyen.php",
								data:"huyen="+num,
								async:false,
								success:function(kq){
									$("#id_phuong_tin")(kq);
									
								}
							})
						}
					function load_duan(){
						
						num=$('#id_huyen_tin').val();
							$.ajax({
								type:"post",
								url:"ajax/duan.php",
								data:"huyen="+num,
								async:false,
								success:function(kq){
									$("#id_duan")(kq);
									
								}
							})
						}
		      </script>
            
	            <?php
                    $d->reset();
                    $sql="select * from table_tinhthanh_danhmuc order by stt";
                    $d->query($sql);
                    $dm_tinh_tin = $d->result_array();
					
                    ?>
                    <select id="id_tinh_tin" name="id_tinh_tin" class="main_font" onchange="load_huyen()">
                        <option value="">---------- Tất cả ----------</option>
                        <?php for($i=0;$i<count($dm_tinh_tin);$i++){ ?>
                        <option value="<?php echo $dm_tinh_tin[$i]['id']?>" ><?php echo $dm_tinh_tin[$i]['ten']?></option>
                        <?php }?>	
                     </select>
            </td>            
            <td><br>Quận/ Huyện(<span class="red">*</span>)</td>
            <td>
                <label class="require">Chưa chọn huyện</label><br>
	            <select id="id_huyen_tin" name="id_huyen_tin" class="main_font" onchange="load_phuong(),load_duan()">
                		<option value="">---------- Tất cả ----------</option>
                <?php
                
                    $d->reset();
                    $sql="select * from table_tinhthanh_list order by stt";
                    $d->query($sql);
                    $huyenchon = $d->result_array();
                    for($i=0;$i<count($huyenchon);$i++){
                ?>
                    <option value="<?php echo $huyenchon[$i]['id']?>" <?php if($huyenchon[$i]['id'] == $item['id_huyen'] ){ echo 'selected="selected"'; }?> ><?php echo $huyenchon[$i]['ten']?></option>
					<?php	
                    }
                    ?>
            </td>
        </tr>      
         <tr>
            <td><br>Địa chỉ(<span class="red">*</span>)</td>
            <td colspan="3"><label class="require">Chưa chọn phường/xã</label><br>
                <input name="diachi" id="diachi" maxlength="120" placeholder="Số nhà 21/32" type="text">	            

	            <select name="id_phuong_tin" id="id_phuong_tin" class="search_select">
                    <option value="0">--------- Phường/Xã ---------</option>
                </select>	  
		        <div class="suggesstion">	        
	                <ul>
	                    <li><span>Nếu không tìm thấy tên đường/phố, phường/xã thì nhập đầy đủ tên đường/phố, phường/xã vào ô địa chỉ.</span></li>
	                    <li><span>Nếu đã chọn tên đường/phố, phường xã thì chỉ nhập số nhà nếu có.</span></li>
	                    <li><span>Không viết IN HOA</span></li>
	                    <li><span>Địa chỉ không đúng quy định sẽ không đươc duyệt</span></li>
	                </ul>
	            </div>          
            </td>
        </tr>  
        <tr>
            <td></td>
            <td colspan="3"><i>Lưu ý(*): Ghi rõ tên đường/phố, phường/xã nếu không tìm thấy trong danh sách</i></td>
        </tr> 
        <tr>
            <td>Dự án</td>
            <td colspan="3">
                <select name="id_duan" id="id_duan" class="search_select">
                    <option value="0">--------- Chọn dự án ---------</option>
                </select>		
		        <label class="require">Chưa chọn dự án</label>
		    </td>
        </tr>
        <tr>
            <td><br>Giá(<span class="red">*</span>)<br><span style="color:#999">Chú ý: 1 = 1.000.000 VNĐ</span></td>
            <td width="300px">
                <label class="require">Nhập giá</label><br>
	            <input name="gia" id="gia" class="dientich" maxlength="10" onkeyup="getTextPrice(this.value);" onblur="getTextPrice(this.value);" title="Chú ý: 1 = 1.000.000 VNĐ" type="text">			   
	            <select name="donvi" id="donvi">
                    <option value="0">tổng diện tích</option>
                    <option value="1">m&sup2;</option>
                </select>
	            <label id="price_text" class="price_text"></label>
	            <div class="suggesstion">	        
	                <ul>
	                    <li><span>Số tiền đơn vị là ngàn đồng. <br>Ví dụ: 1 = 1 ngàn, 90 = 90 ngàn, 9000 = 9 triệu</span></li>
	                    <li><span>Số tiền không nhập dấu chấm (.) hoặc dấu phẩy (,)</span></li>
	                </ul>
	            </div>
            </td>	
            <td>
                <br>Diện tích(<span class="red">*</span>)
            </td>	    
            <td>	
                <label class="require">Nhập diện tích</label><br>
        	    <input name="dientich" id="dientich" class="dientich" maxlength="9" type="text">m<sup>2</sup>	
        	    <div class="suggesstion">	        
	                <ul>
	                    <li><span>Diện tích viết số nguyên, ví dụ: 45,5<sup>2</sup> thì nhập 45 hoặc 46.</span></li>
	                </ul>
	            </div>      
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3" style="color: #1029AC;font-style: italic;">Các tin đăng thiếu chính xác, <b>sai địa chỉ</b>, <b>sai mức giá</b> (giá thấp hơn giá thực tế) sẽ bị <b>khóa tài khoản vĩnh viễn</b></td>
        </tr>
        <tr>
            <td><br>Liên hệ(<span class="red">*</span>)</td>
            <td>
            	<?php
                
                    $d->reset();
                    $sql="select * from table_custom where id ='".$_SESSION['user']['id'] ."' order by stt";
                    $d->query($sql);
                    $user = $d->result_array();
                   
                ?>
                <label class="require">Nhập tên người liên hệ</label><br>
                <input name="lienhe" id="lienhe" maxlength="50" placeholder="Tên cá nhân hoặc doanh nghiệp" value="<?php echo $user[0]['ten']?>" readonly="true" type="text">
                                                
                <div class="suggesstion">	        
	                <ul>
	                    <li><span>Để thay đổi tên liên hệ vui lòng vào: <br><b>Quản lý cá nhân</b> -&gt; <b>Thông tin tài khoản</b> để cập nhật.</span></li>
	                </ul>
	            </div>
	            <input name="id_cus" id="id_cus" value="<?php echo $user[0]['id']?>" type="hidden">
	            
             </td>					
            <td><br>Điện thoại(<span class="red">*</span>)</td>
            <td>
                <label class="require">Nhập số điện thoại</label>
                <input name="dienthoai" id="dienthoai" maxlength="50" placeholder="0909-090-090 / 0909-911-911" value="<?php echo $user[0]['dienthoai']?>" readonly="true" type="text">
                
                <div class="suggesstion">	        
	                <ul>
	                    <li><span>Để thay đổi số điện thoại vui lòng vào: <br><b>Quản lý cá nhân</b> -&gt; <b>Thông tin tài khoản</b> để cập nhật.</span></li>
	                </ul>
	            </div>
	            <input name="hddPhone" id="hddPhone" type="hidden">
	            
            </td>
        </tr>	    
    </tbody></table>
    <div style="margin-bottom:10px;"></div>
    <div class="title_left">Các thông tin khác</div>				
    <div class="other-infor">
        <table cellpadding="0px" cellspacing="4px">		      		    
            <tbody><tr>			    
                <td style="width:127px">Chiều ngang</td>
                <td style="width:160px">
                    <label class="require">Chỉ nhập số</label>
                    <input name="chieungang" id="chieungang" class="dientich" maxlength="8" type="text">m
                </td>
                <td>Chiều dài</td>
                <td>
                    <label class="require">Chỉ nhập số</label>
                    <input name="chieudai" id="chieudai" class="dientich" maxlength="8" type="text">m
                </td>
                
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Hướng</td>
                <td>
                    <select name="huong" id="huong">
                    	<option value="0">--chọn--</option>
						<?php
                               
                                    $d->reset();
                                    $sql="select * from table_thuoctinh where id_danhmuc = 12  order by id";
                                    $d->query($sql);
                                    $thuoctinh = $d->result_array();
                                    for($i=0;$i<count($thuoctinh);$i++){
                                    ?>
                                   
                                    <option value="<?php echo $thuoctinh[$i]['id']?>"><?php echo $thuoctinh[$i]['ten']?></option>
                                    <?php }?>
                    </select>
                </td>
                <td style="width:110px">Đường rộng</td>
                <td style="width:160px">
	                <input name="duongrong" id="duongrong" class="dt" maxlength="3" type="text">m
                </td>
                
            </tr>	
    	    				
            <tr>
                <td>Pháp lý</td>
                <td>
	                <select name="phaply" id="phaply">
                    	<option value="0">--chọn--</option>
                        <?php
           
						$d->reset();
						$sql="select * from table_thuoctinh where id_danhmuc = 13  order by id";
						$d->query($sql);
						$thuoctinh = $d->result_array();
						for($i=0;$i<count($thuoctinh);$i++){
						?>
					   
						<option value="<?php echo $thuoctinh[$i]['id']?>"><?php echo $thuoctinh[$i]['ten']?></option>
						<?php }?>
                    </select>
                </td>
                <td>
                </td>
                <td>
                </td>
                
            </tr>
            <tr>
                <td>Số lầu</td>
                <td colspan="3">
	                <input name="solau" id="solau" class="dt" maxlength="3" type="text">
	                <label class="require">Chỉ nhập số</label>
                </td>		    
                						
            </tr>		    
            <tr>							
                <td>Số phòng ngủ</td>
                <td colspan="3">
	                <input name="sophongngu" id="sophongngu" class="dt" maxlength="3" type="text">
	                <label class="require">Chỉ nhập số</label>
                </td>
                						
            </tr>	           											
        </tbody></table>    		    
    </div>
    <div class="upload-image-box">
        <div class="head">Hình ảnh | <span style="color: #A51010;font-weight: normal;">Đăng hình ảnh không đúng với thực tế sẽ bị khóa tài khoản</span></div>
        <div>
            <div class="item">
                <div>
                    <div class="filename"></div>
                    <label for="img1">
                           
                    </label>            
                    <input name="img1" id="img1" type="file">   
                    
                </div>            
            </div>
            <div class="item">
                <div>
                    <div class="filename"></div>
                    <label for="img2">
                       
                    </label>
                    <input name="img2" id="img2" type="file">   
                </div>  
                
                           
            </div>
            <div class="item">
                <div>
                    <div class="filename"></div>
                    <label for="img3">
                       
                    </label>
                    <input name="img3" id="img3" type="file"> 
                </div>
                
            </div>
            
            
            <div class="clear"></div>
        </div>
    </div>

    
    <div class="clear"></div>  
    <div class="control">
    <input type="button"  class="btn_search" value="Đăng tin" onclick="js_submit();" ></input>
    <input type="reset"  class="btn_search" value="Nhập lại"></input>
    </div>		
    
    
    	
    </form>    
    	
</div>
