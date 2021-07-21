<div id='' class='user-avatar' > 
	 <form id="img-upload-form" method="post" accept-charset="utf-8" onsubmit="return submitImageForm(this)">
				<img id="logo-img"  src="<?php if($_SESSION['user']['avatar']!=''  ){ echo "./upload/avatar/".$_SESSION['user']['avatar'];}else{ echo './images/avatar.png';}?>"/>
				<input type="file" style="display: none" id="add-new-logo" name="file" accept="image/*" onchange="addNewLogo(this)"/>
		</form>
		
		<a id='edit_avatar' onclick="document.getElementById('add-new-logo').click();" >Chỉnh sửa</a>
 </div>
<div id="loader"></div>

<script>

var myVar;

function showPage() {
  document.getElementById("loader").style.display = "block";
}

var addNewLogo = function(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
       showPage() ;
        reader.readAsDataURL(input.files[0]);
        //submit form để upload ảnh
        $('#img-upload-form').submit();
		
    }
}
var submitImageForm = function(form){
	
   // toggleLoading(); //show loading mask
	
    $.ajax({
        url: "./ajax/avatar.php", //api upload phía server
        type: "POST",
        data: new FormData(form),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data)
        {
            //toggleLoading();            
            alert(data);
			window.location.replace("https://showroomin.com/user/profile.html");
			//addNewLogo('#add-new-logo');
        },
        error: function (data) {
           toggleLoading();
        }
    });
    return false;
}
</script>
<div id='' class='user_menu_left' > 
<a href='./user/profile.html' >Profile</a>
<a href='./user/don-hang.html' >Đơn hàng của bạn</a>
<a href='./user/review.html' >Reviews</a>
<a href='./user/khuyen-mai.html' >Khuyến mãi</a>
<?php if( $_SESSION['user']['role']==3 ){?>
<a href='./user/manager.html' >Quản lý User</a>
<?php } ?>
 </div>