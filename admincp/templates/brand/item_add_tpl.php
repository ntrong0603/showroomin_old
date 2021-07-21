<style type="text/css" media="screen">
	.goiy{
		text-align: center;
	    background-color: #f5f5f5;
	    position: absolute;
	    left: 350px;
	    width: 255px;
	}
	.goiy li{
		padding: 2px;
	}
	.goiy li a{
		display: block;
    	padding: 2px;
    	text-decoration: none;
    	color: #999;
	}
	.goiy li a:hover{
		background-color: #cfd1cf;
	}
</style>



<script type="text/javascript">
function laydiadiem(str){
	document.getElementById("diadiem").value = str;
	$("#textgoiy").hide();
}
function hienthidiadiem(str){
	var xhttp;
	$("#textgoiy").show();
	if (str.length == 0) { 
    	document.getElementById("textgoiy").innerHTML = "";
		return;
	}
	xhttp = new XMLHttpRequest();
	/*
		onreadystatechange:	Định nghĩa một hàm được gọi khi giá trị readyState thay đổi
		readyState:
		{
			0: Yêu cầu không khởi tạo
			1: Kết nối máy chủ đã được thiết lập
			2: Yêu cầu đã được nhận
			3: Yêu cầu xử lý
			4: Yêu cầu hoàn tất và phản hồi đã sẵn sàng
		}
		status:
		{
			200: "OK"
			403: "Cấm"
			404: "Page not found"
		}
		statusText: Trả lại văn bản trạng thái (ví dụ: "OK" hoặc "Không tìm thấy")
	*/
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("textgoiy").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "templates/brand/ajax/ajaxgoiydiadiem.php?diadiem="+str, true);
	xhttp.send(); 
	/*var x = document.getElementById("diadiem").value;
	document.getElementById("textgoiy").innerHTML = x;
	$.ajax({
		type:"get",
		url:"templates/brand/ajax/ajaxgoiydiadiem.php",
		data:"diadiem="+x,
		async:false,
		success:function(kq){	
			document.getElementById("textgoiy").innerHTML = kq;
		}
	})*/
}
</script>
<script>
			$(document).ready(function(){
				$('a.number').click(function(){
				var an=$('a.set').attr('title');
				$('div#'+an).hide();
				$('a.set').removeClass('set');
				$(this).addClass('set');
				var hien=$(this).attr('title');
				$('div#'+hien).show();
				
				})
			});
		</script>

<?php if ($_REQUEST['act']=='edit') { ?> <h3>Sửa brand</h3> <?php }else{ ?><h3>Thêm brand</h3><?php } ?>
<?php 
	$sodmuc=demdanhmuc(get_danhmucdacap($d,0));
	$sodmuc=0;
	
?>
<script>
	// tự sinh script select box theo số lượng cấp danh mục
	<?php
		for($scdm=1;$scdm<=$sodmuc;$scdm++){
			
	?>
		function select_onchange<?php echo $scdm;?>()
		{	
			<?php 
				$url='"index.php?com=brand&act='.$_GET['act'];
				if(isset($_GET['id'])){
					$url.='&id='.$_GET['id'];
				}
				for($var=1;$var<=$scdm;$var++){
			?>
					var <?php echo 'a'.$var;?>=document.getElementById("id_danhmucc<?php echo $var;?>");
			<?php 
					if($var==$scdm){
						$url.='&id_danhmucc'.$var.'="+a'.$var.'.value';
					}
					else
					{
						$url.='&id_danhmucc'.$var.'="+a'.$var.'.value+"';
					}
				}
				
			?>
			window.location =<?php echo $url?>;	
			return true;
		}
	<?php
		}
	?>
</script>
<?php 
	
	function get_main_danhmuc($d,$idparent='',$iddmuc='',$id='')
	{
		$dmuc=get_danhmucdacap($d,$idparent);
		$str='';
		for($i=0;$i<count($dmuc);$i++){

			if($iddmuc!='' && $dmuc[$i]["id"]==$iddmuc){
				$str.='<option value='.$dmuc[$i]["id"].' selected>'.$dmuc[$i]["ten"].'</option>';	
			}
			else
			{
				$str.='<option value='.$dmuc[$i]["id"].' >'.$dmuc[$i]["ten"].'</option>';	
			}	
		}
		return $str;
	}
?>
<div class="brand">
			<div class="title" id="tabs">

				<a href="#" class="set number" title="tab1" style="display:block;width:120px;"><p> <?php echo $ngonngu1;?></p></a>
				<?php if($langnum >=2){?><a href="#" class=" number" title="tab2"style="	display:block;width:170px;"><p><?php echo $ngonngu2;?></p></a><?php } ?>
				<?php if($langnum >=3){?><a href="#" class=" number" title="tab3"style="	display:block;width:170px;"><p><?php echo $ngonngu3;?></p></a><?php } ?>
		
			</div>
<form name="frm" method="POST" action="index.php?com=brand&act=save&id=<?php echo @$item['id'];?>&p=<?php echo $_REQUEST['p']?>" enctype="multipart/form-data" class="nhaplieu">	
<div id='tab1' class='' > 
	<?php 
		for($i=1;$i<=$sodmuc;$i++)
		{
	?>
	<b>Danh mục cấp <?php echo $i; ?></b>
		<select id="id_danhmucc<?php echo $i; ?>" name="id_danhmucc<?php echo $i; ?>" onchange="select_onchange<?php echo $i; ?>()" class="input">
				<option value="" >Chọn danh mục</option>
				<?php 
					if($i==1){
						echo get_main_danhmuc($d,0,@$_GET['id_danhmucc'.$i],@$_GET['id']);
					}
					
					if($i!=1){
						$a=$i-1;
						if(isset($_GET['id_danhmucc'.$a]) && $_GET['id_danhmucc'.$a]!='')
						{
							echo get_main_danhmuc($d,$_GET['id_danhmucc'.$a],@$_GET['id_danhmucc'.$i]);
						}
					}
				?>
		</select>
		<br />
		<br />
	<?php }?>
	  
    <script type="text/javascript">
			$(document).ready(function(){
						$('#id_tinh').change(function(){
							num=$(this).val();
							
							$.ajax({
								type:"post",
								url:"tinh.php",
								data:"tinh="+num,
								async:false,
								success:function(kq){
									$("#id_huyen").html(kq);
									$("#id_phuong").html('<option value="0">---Vui lòng chọn phường---</option>');
									
								}
							})
						})
						
					})
		</script>
   
	
        <br /><br /> 
	<b>Danh mục tỉnh:</b>
		<?php
		$d->reset();
        $sql="select * from table_tinhthanh_danhmuc order by stt";
		$d->query($sql);
	    $dm_tinh = $d->result_array();
		?>
        <select id="id_tinh" name="id_tinh" class="main_font">
			<option value="0">---Vui lòng chọn tỉnh---</option>
            <?php for($i=0;$i<count($dm_tinh);$i++){ ?>
            <option value="<?php echo $dm_tinh[$i]['id']?>" <?php if($dm_tinh[$i]['id'] == $item['id_tinh']) echo ' selected="selected"'; ?>><?php echo $dm_tinh[$i]['ten']?></option>
            <?php }?>	
         </select>
        <br /><br />
       
		
    	<script type="text/javascript">
					function load_phuong(){
						num=$('#id_huyen').val();
							$.ajax({
								type:"post",
								url:"huyen.php",
								data:"huyen="+num,
								async:false,
								success:function(kq){
									$("#id_phuong").html(kq);
									
								}
							})
						}
		</script>
        
        <script type="text/javascript">
					function load_duan(){
						
						num=$('#id_huyen').val();
							$.ajax({
								type:"post",
								url:"duan.php",
								data:"huyen="+num,
								async:false,
								success:function(kq){
									$("#id_duan").html(kq);
									
								}
							})
						}
		</script>
    
        <b>Danh mục huyện:</b>
        <div id="chonhuyen">
            <select id="id_huyen" name="id_huyen" class="main_font" onchange="load_phuong(),load_duan()">
                <option value="0">---Vui lòng chọn huyện---</option>
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
        <br />
       
        <b>Danh mục phường:</b>
        <div id="chonphuong">
        <select id="id_phuong" name="id_phuong" class="main_font">
            <option value="0">---Vui lòng chọn phường---</option>
            <?php
           
                $d->reset();
                $sql="select * from table_tinhthanh_cat where id_list = '".$item['id_huyen']."'  order by stt";
                $d->query($sql);
                $phuongchon = $d->result_array();
				for($i=0;$i<count($phuongchon);$i++){
            ?>
                <option value="<?php echo $phuongchon[$i]['id']?>" <?php if($phuongchon[$i]['id'] == $item['id_phuong'] ){ echo 'selected="selected"'; }?> ><?php echo $phuongchon[$i]['ten']?></option>
            <?php	}		
            ?>
        </select>
        </div>
        <br /> 
    <?php if ($_REQUEST['act']==edit)
	{?>
	<b>Hình ảnh:</b><img src="<?php echo _upload_sanpham.$item['thumb']?>"  alt="NO PHOTO" width="200px;" /><br />
	<?php }?>
	<b>Chọn hình:</b> <input type="file" name="file" />  (= hình cùng brand) <?php echo _brand_type?><br />
    <br />
    
  


	<b>Tên brand</b> <input type="text" name="ten" value="<?php echo @$item['ten']?>" class="input" /><br /> 
    
	<b>Link</b> <input type="text" name="tenkhongdau" value="<?php echo @$item['tenkhongdau']?>" class="input" /><br /> <br /> 
	<b>ID user quản lý</b> <input type="text" name="id_user" value="<?php echo @$item['id_user']?>" class="input" />  ,0,12,3, <br /> <br /> 
    <b>Địa chỉ</b> 
    <div>
    	<div style=""><input type="text" id="diadiem" name="diadiem" onclick="hienthi()" onkeyup="hienthidiadiem(this.value)" value="<?php echo @$item['diadiem']?>" class="input" />
    	</div>
    	<div style="clear: both;"></div>
		<div style="">
			<ul id='textgoiy' class="goiy">
			</ul>
		</div>
	</div>
	
    <br />
   
    <br/>
 
    
    <br />
	
    <b>Mô tả</b><br/>
	<div>
	 <textarea class="mota" name="mota" id="mota"><?php echo @$item['mota']?></textarea></div> <br/>  
 
     
    <b>Nội dung</b><br/>
	<div>
	  <textarea name="noidung" id="noidung"><?php echo @stripslashes($item['noidung'])?></textarea></div> <br/>  
     <script language="javascript">CKEDITOR.replace('noidung');</script> 
    </br>  
    </br>  
  
    <b>Title</b>
	<div><textarea name="title" id="title"><?php echo @$item['title']?></textarea></div><br/>   
     
    <b>keywords</b>
	<div><textarea name="keywords" id="keyword"><?php echo @$item['keywords']?></textarea></div><br/> 
    
    <b>Description</b>
	<div><textarea name="description" id="keyword"><?php echo @$item['description']?></textarea></div><br/>             
      <b>Tags</b>
	<div><textarea name="tag" id="keyword"><?php echo @$item['tag']?></textarea></div><br/>             
      
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

       
   
	<b>Nổi bật </b> <input type="checkbox" name="noibat" <?php echo (!isset($item['noibat']) || $item['noibat']==1)?'checked="checked"':''?> /><br />
    
    
   
	<b>Hiển thị </b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /><br />
    
    
 </div> 
 <div id='tab2' class='' > 
		<b>Tên brand</b> <input type="text" name="ten_sd" value="<?php echo @$item['ten_sd']?>" class="input" /><br /> 
   

		</div>
		
		
 <div id='tab3' class='' > 
		<b>Tên brand</b> <input type="text" name="ten_rd" value="<?php echo @$item['ten_rd']?>" class="input" /><br /> 
   
		

		</div>
 
 
 
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" name='save' value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=brand&act=man'" class="btn" />
</form>
</div>