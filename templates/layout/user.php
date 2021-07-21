
	<?php if( !isset( $_SESSION['user'] ) ){?>
		<a href='user/login.html' ><button class=' btn-dangnhap'>Đăng nhập</button></a>
		<a href='user/register.html' ><button class=' btn-dangky '>Đăng ký</button></a>
	<?php }else{ 
	
	
	?>
	<script>
	$('body').on('click','.user_top',function(){
		
		$('.user_menu_top').toggle(500);
			
	})
	
	</script>
	<a class='user_top' >
		<img src='./images/icon-user.svg' height='30' alt='' title='' /> <span id='username_top' ><?php echo ten_user($_SESSION['user']['id']);?> <li class="ion-icon ion-chevron-down" data-pack="default" data-tags="arrow, down"></li></span>
		
		<div class='user_menu_top' >
			
			<div> <a href='../user/profile.html' >Profile</a></div>
			<div> <a href='../user/don-hang.html' >Đơn hàng của bạn</a></div>
			<div> <a href='../user/review.html' >Reviews</a></div>
			<div><a href='../user/logout.html' >Logout</a></div>
		</div>
		</a>
	<?php } ?>
