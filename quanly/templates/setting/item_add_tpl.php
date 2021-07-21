<h3>Thiết lập hệ thống</h3>

<form name="frm" method="post" action="index.php?com=setting&act=save" enctype="multipart/form-data" class="nhaplieu">
	<b>Tiêu đề web:</b> <input type="text" name="title" value="<?php echo @$item['title']?>" class="input" /><br /><br>
    <b>Tên công ty Việt:</b> <input type="text" name="ten_vi" value="<?php echo @$item['ten_vi']?>" class="input" /><br /><br>
    <b>Tên công ty Anh:</b> <input type="text" name="ten_en" value="<?php echo @$item['ten_en']?>" class="input" /><br /><br>
    <b>Từ khóa SEO:</b> 
    <textarea name="keywords" cols="80" rows="5" class="input"><?php echo @$item['keywords']?>
    </textarea>
    <br /><br>
    <b>Mô tả SEO:</b> 
    <textarea name="description" cols="80" rows="5" class="input"><?php echo @$item['description']?>
    </textarea>
    <br /><br>
    <b>Mô tả của website:</b> 
    <textarea name="abstract" cols="80" rows="5" class="input"><?php echo @$item['abstract']?>
    </textarea>
    <br /><br>
	<b>Content gg+ share</b> 
    <textarea name="description_gg" cols="80" rows="5" class="input"><?php echo @$item['description_gg']?>
    </textarea>
    <br /><br>
  <b>Email liên hệ:</b> <input type="text" name="email" value="<?php echo @$item['email']?>" class="input" /><br /><br>
  
  <b>Mật khẩu email:</b> <input type="password" name="passmail" value="<?php echo @$item['passmail']?>" class="input" /><br /><br>
  
  <b>Slogan:</b> <input type="text" name="slogan" value="<?php echo @$item['slogan']?>" class="input" /><br /><br>
  
  <b>Yahoo liên hệ:</b> <input type="text" name="yahoo" value="<?php echo @$item['yahoo']?>" class="input" /><br /><br>

    <b>Facebook URL:</b> <input type="text" name="facebook" value="<?php echo @$item['facebook']?>" class="input" /><br /><br>
  <b>Google Plus:</b> <input type="text" name="google_plus" value="<?php echo @$item['google_plus']?>" class="input" /><br /><br>
  
    <b>Điện thoại:</b> <input type="text" name="dienthoai" value="<?php echo @$item['dienthoai']?>" class="input" /><br /><br>
    <b>Địa chỉ </b><br/>
    <div>
        <textarea name="diachi_hanoi"  class="input" id="diachi_hanoi"><?php echo @$item['diachi_hanoi']?>
        </textarea>
        <script language="javascript">CKEDITOR.replace('diachi_hanoi');</script>
        <br /><br>
    </div>



    <b>Hotline:</b> <input type="text" name="hotline" value="<?php echo @$item['hotline']?>" class="input" /><br /><br>
    <b>Tọa độ:</b> <input type="text" name="toado" value="<?php echo @$item['toado']?>" class="input" /><br /><br>
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=setting&act=capnhat'" class="btn" />
</form>