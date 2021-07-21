<style type="text/css" media="screen">
	.goiy{
		text-align: center;
	    background-color: #f5f5f5;
	    position: absolute;
	    left: 123px;
	    width: 255px;
		z-index:30; 
	}
	.goiy li{
		
	}
	.goiy li a{
		display: block;
    	padding: 5px;
    	text-decoration: none;
    	color: #999;
		cursor:pointer;
	}
	.goiy li a:hover{
		background-color: #cfd1cf;
	}
	.goiy2{
		text-align: center;
	    background-color: #f5f5f5;
	    position: absolute;
	    left: 123px;
	    width: 255px;
		z-index:30; 
	}
	.goiy2 li{
	}
	.goiy2 li a{
		display: block;
    	padding: 5px;
    	text-decoration: none;
    	color: #999;
		cursor:pointer;
	}
	.goiy2 li a:hover{
		background-color: #cfd1cf;
	}
	#listplace .x-btn{
	 cursor: pointer;
    background: url(../images/icon-x.png);
    width: 16px;
    height: 16px;
    position: absolute;
    z-index: 99;
    right: 10px;
    top: 7;
	}
	#listplace .item-place{
	display: block;
    border: 1px solid #ddd;
    background: #8dd4d1;
    border-radius: 15px;
    margin-top: 10px;
    height: 30px;
    line-height: 30px;
    padding: 0px 15px;
    position: relative;
	}
	#a-goiy *,#a-goiy2 * {
    pointer-events: none;
}
</style>



<script type="text/javascript">
function layusername(str){
	document.getElementById("username").value = str;
	$.ajax({
		type:"get",
		url:"templates/user/ajax/ajaxten.php",
		data:"username="+str,
		async:false,
		success:function(kq){	
			document.getElementById("ten").value = kq;
		}
	})
	$.ajax({
		type:"get",
		url:"templates/user/ajax/ajaxdienthoai.php",
		data:"username="+str,
		async:false,
		success:function(kq){	
			document.getElementById("dienthoai").value = kq;
		}
	})
	
	$("#textgoiy").hide();
}
function hienthiusername(str){

	var xhttp;
	$("#textgoiy").show();
	if (str.length == 0) { 
    	document.getElementById("textgoiy").innerHTML = "";
		return;
	}
	xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("textgoiy").innerHTML = this.responseText;
		}
	};
	xhttp.open("GET", "templates/user/ajax/ajaxgoiyusername.php?username="+str, true);
	xhttp.send(); 
	
}

function layplace(str){
	
	document.getElementById("listplace").innerHTML += str;


	document.getElementById("place").value = "";
	
	$("#textgoiy2").hide();
}
function hienthiplace(str){

	var xhttp;
	$("#textgoiy2").show();
	if (str.length == 0) { 
    	document.getElementById("textgoiy2").innerHTML = "";
		return;
	}
	xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("textgoiy2").innerHTML = this.responseText;
			
		}
	};
	xhttp.open("GET", "templates/user/ajax/ajaxgoiyplace.php?place="+str, true);
	xhttp.send(); 
	
}
</script>
<script>
	$(document).ready(function(){
		
	
				$('body').on("click",".x-btn",function(){
					$(this).parent().remove();
					
				})
					var evt;
					document.onmousemove = function (e) {
						e = e || window.event;
						evt = e;
					}
				$("#username").focusout(function(e){
					  if(!$(evt.target).is('#a-goiy')) {
						$("#textgoiy").hide();
					
						}else{
							
						}
				})
				$("#place").focusout(function(e){
					  if(!$(evt.target).is('#a-goiy2')) {
						  document.getElementById("textgoiy2").innerHTML = "";
						$("#textgoiy2").hide();
					
						}else{
							
						}
				})
			});
		</script>
<h3>Cấp quyền</h3>

<form name="frm" method="post" action="index.php?com=user&act=save_nsx" enctype="multipart/form-data" class="nhaplieu" onSubmit="return js_submit();">

	<b>Email</b> 
	  <div>
    	<div style=""><input type="text" id="username" name="username" onclick="hienthi()" onkeyup="hienthiusername(this.value)" value="<?php echo @$item['username']?>" autocomplete="off" class="input" <?php if( isset( $_GET['id'] ) ){ echo " disabled ";} ?> />
    	</div>
    	<div style="clear: both;"></div>
		<div style="position: relative;">
			<ul id='textgoiy' class="goiy">
			</ul>
		</div>
	</div>
	<b>Họ tên</b> <input type="text" name="ten" id="ten" value="<?php echo @$item['ten']?>" class="input" disabled /><br />

	<b>Điện thoại</b> <input type="text" name="dienthoai" value="<?php echo @$item['dienthoai']?>" class="input" disabled />
	<br />
	<br />
	
	
	
	<b>ShowRoom</b>
	  <div>
    	<div style=""><input type="text" id="place" name="place"  onkeyup="hienthiplace(this.value)"  autocomplete="off" class="input" />
    	</div>
    	<div style="clear: both;"></div>
		<div style="position: relative;"">
			<ul id='textgoiy2' class="goiy2">
			</ul>
		</div>
	</div>
	<br />
	<br />
	<div id='listplace' class='' > 
		<?php
		if( isset( $item ) ){
			 $sql_place="select * from table_place where  id  in (0".$item['place']."0) ";
			
			$place=mysql_query($sql_place);
			$arrplace=array();
			$str="";
			while($row=mysql_fetch_array($place)){
				
				$str.='<span class="item-place">
				<input type="hidden" name="place[]" value="'.$row['id'].'" >
				'.$row['ten'].'
				<span class="x-btn"></span>
				</span>';
			}
			echo $str;
			
		}
		?>
	</div>
	<br />
	<br />
	<!--
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?php echo isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?php echo (!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	-->
	<input type="hidden" name="id" id="id" value="<?php echo @$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=user&act=man_nsx'" class="btn" />
</form>