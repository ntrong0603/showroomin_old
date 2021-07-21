
	
	<script>
	$('body').on('click','.user_top',function(){
		
		$('.user_menu_top').toggle(500);
			
	})
	
	</script>
		<div class='user_top' >
		<img src='./images/icon-mobile-menu.svg' alt='' title='' />
		
		<div class='user_menu_top' >
			<?php if( !isset( $_SESSION['user'] ) ){?>
			<div><a href='user/login.html' >Đăng nhập</a></div>
			<div><a href='user/register.html' >Đăng ký</a></div>
			<?php }else{ 
			
			
			?>
			<div style='margin-bottom: 5px;'> <img src='./images/icon-user.svg' height='30' alt='' title='' /> <span id='username_top' ><?php echo ten_user($_SESSION['user']['id']);?></span> </div> 
			<div> <a href='../user/profile.html' >Profile</a></div>
			<div> <a href='../user/don-hang.html' >Đơn hàng của bạn</a></div>
			<div> <a href='../user/review.html' >Reviews</a></div>
			<div><a href='../user/logout.html' >Logout</a></div>
				<?php } ?>
		</div>
		</div>

