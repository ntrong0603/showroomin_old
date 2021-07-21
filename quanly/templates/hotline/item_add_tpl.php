<h3> Cập nhật thông tin Công Ty</h3>

<form name="frm" method="post" action="index.php?com=hotline&act=save" enctype="multipart/form-data" class="nhaplieu">	
	<b>Tên công ty:</b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br />	
    <b>Tiêu đề website:</b> <input type="text" name="site_title" value="<?=@$item['site_title']?>" class="input" /><br />	
    <b>Điện thoại:</b> <input type="text" name="dienthoai" value="<?=@$item['dienthoai']?>" class="input" /><br />
    <b>Fax:</b> <input type="text" name="fax" value="<?=@$item['fax']?>" class="input" /><br />
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
    <b>Email: </b> <input type="text" name="email" value="<?=@$item['email']?>" class="input" /><br />	
    <b>Địa chỉ: </b> <input type="text" name="diachi" value="<?=@$item['diachi']?>" class="input" /><br />

    <b>Link báo giá: </b> <input type="text" name="slogan" value="<?=@$item['slogan']?>" class="input" /><br />	
    <b>Faceook: </b> <input type="text" name="facebook" value="<?=@$item['facebook']?>" class="input" /><br />	
    <b>Google+: </b> <input type="text" name="google" value="<?=@$item['google']?>" class="input" /><br />	
    <b>Youtube: </b> <input type="text" name="youtube" value="<?=@$item['youtube']?>" class="input" /><br />	
    <b>Twitter: </b> <input type="text" name="twitter" value="<?=@$item['twitter']?>" class="input" /><br />	
    <b>Skype: </b> <input type="text" name="intagram" value="<?=@$item['intagram']?>" class="input" /><br />	
    <b>Tọa độ: </b> <input type="text" id="toado" name="toado" value="<?=@$item['toado']?>" class="input" /> &nbsp;<a target="_blank" onClick="getLocation();" style="cursor:pointer">Lấy tọa độ vị trí hiện tại đang đứng</a> &nbsp;<br />	
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hotline&act=capnhat'" class="btn" />
</form>


<script>
var x = document.getElementById("toado");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.value = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    x.value = position.coords.latitude +  "," + position.coords.longitude; 
}
</script>