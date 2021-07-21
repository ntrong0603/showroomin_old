<?php 
	$d->reset();
	$sql="select * from #_yahoo where hienthi=1 order by stt,id";
	$d->query($sql);
	$hotro=$d->result_array();
	
	$d->reset();
	$sql="select * from #_hotline";
	$d->query($sql);
	$email=$d->result_array();
?>

<div class="register">
	<div class="left_register">
    		<div class="item_register">
            	+1 để tin của bạn có vị trí cao trên google
            </div>
		
    </div><!--end left ho tro -->
    <div class="right_register">
    	<a <?php if(is_array($_SESSION['user'])){ ?> href="dang-tin"  <?php } else {?> href="javascript:void(0)" onclick="dnhap()" <?php }?>  class="dangtin">
        	Đăng tin miễn phí
        </a>
        <?php if(is_array($_SESSION['user'])){ ?>  
			<a  href="quan-tri" class="dangki">
        	Quản trị 
        	</a>
		<?php } else {?> 
        <a  href="javascript:void(0)" onclick="dki()" 
		  class="dangki">
        	Đăng kí
        </a>
        <?php }?>
        <?php if(is_array($_SESSION['user'])){ ?>
        	<a class="dangnhap">Chào bạn: <?php echo $_SESSION['user']['name']?></a>
            <a  href="thoat"> | Thoát</a>
        <?php } else {?>
        <a href="javascript:void(0)" onclick="dnhap()"  class="dangnhap">
        	Đăng nhập
        </a>
        <?php }?>
    </div><!--end right ho tro -->
</div><!--end ho tro -->
