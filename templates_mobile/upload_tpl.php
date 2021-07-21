<?php 
//get unique id
$up_id = uniqid(); 
?>
<link href="style_progress.css" rel="stylesheet" type="text/css" />
<div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 page-title wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                        <span aria-hidden="true" class="icon_profile"></span>
                        <h1>Trang Upload file</h1>
                    </div>
                </div>
            </div>
        </div>
<div id='' class='container' >  
<div id='' class='row' >
	<div id='' class='col-sm-3' >  </div>
	<div id='' class='col-sm-6' > 
			<form action='file-upload' name="form1" id="form1" method='POST' enctype="multipart/form-data" >
			  <div class="form-group">
				<label for="exampleInputEmail1">Tên Khách Hàng</label>
				<input type="text" class="form-control" id="exampleInputEmail1" name='ten' placeholder="Tên Khách Hàng" required>
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1">Số điện thoại</label>
				<input type="number" class="form-control" id="exampleInputEmail1" name='dienthoai' placeholder="Số điện thoại" required >
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">Ghi chú</label>
				<textarea  class="form-control" id="exampleInputPassword1" name='mota' rows='5' placeholder="Ghi chú"></textarea>
			  </div>
			  <div class="form-group">
				<label for="exampleInputFile">Chọn file</label>
				
				
<!--APC hidden field-->
    <input type="hidden" name="APC_UPLOAD_PROGRESS" id="progress_key" value="<?php echo $up_id; ?>"/>


    <input name="file" type="file" id="file" size="30"/>


    <br />
    <iframe id="upload_frame" name="upload_frame" frameborder="0" border="0" src="" scrolling="no" scrollbar="no" > </iframe>
    <br />
<?php echo date("h:i:s d/m/Y",time());?>
				<p class="help-block">Chọn file nén đuôi .RAR và .ZIP</p>
			  </div>



		
		<button type="submit" class="btn btn-default">Tải lên</button>
			</form>


	</div>
	<div id='' class='col-sm-3' >  </div>


  </div>


</div>