<div id='logo'>
	<img src='../quanly/media/images/logo.png'/>
	
</div>
<div style=    'border-bottom: 1px solid #e1e1e1;
    width: 80%;    margin-bottom: 55px;'></div>


<div class="block_menu">
	<div id="title" style='background-image: url(../quanly/media/images/i_thongtin_new.png);'><strong style="color:#616161;">Quản lý liên hệ</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>				
       
          <?php
			  $sql = "select * from #_lienhekhach where xem = 0 order by id desc";
			  $d->query($sql);
			  $sl = $d->result_array();
		  ?>
          <li><a href="index.php?com=lienhekhach&act=man">Quản lý Liên hệ khách <?php if(count($sl)>0){ echo '('.count($sl).')'; echo '<img src="../quanly/media/images/New_icons_101.gif"/>';}?></a></li> 
			<?php
				$sql = "select * from table_dathang where xem = 0 order by id desc";
				$d->query($sql);
				$sl1 = $d->result_array();
			?>
          <li><a href="index.php?com=order&act=man">Quản lý đơn đặt hàng <?php if(count($sl1)>0){ echo '('.count($sl1).')'; echo '<img src="../quanly/media/images/New_icons_101.gif"/>';}?></a>
          </li>
		</ul>
	</div></div>
</div>

<div class="block_menu">
	<div id="title" style='background-image: url(../quanly/media/images/i_thumuc_new.png);'><strong style="color:#616161;">Quản trị nội dung</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>		
        <li><a href="index.php?com=brand&act=man">Quản lý Brand</a></li> 
          <li><a href="index.php?com=place&act=man">Quản lý Showroom/Concept</a></li>  
          
         
		</ul>
	</div></div>
</div>



<div class="block_menu">
	<div id="title" style='background-image: url(../quanly/media/images/i_thongke.png);'><strong style="color:#616161;">Thống kê</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>			
            <li><a href="index.php?com=thongke&act=sanpham">Thống kê theo sản phẩm</a></li>          
			<li><a href="index.php?com=thongke&act=concept">Thống kê theo concept</a></li>      
		</ul>
	</div></div>
</div>

<div class="block_menu">
	<div id="title" style='background-image: url(../quanly/media/images/i_hethong2_new.png);'><strong style="color:#616161;">Nhân viên</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>			
            <li><a href="index.php?com=user&act=man_nsx">Cấp quyền Nhân viên</a></li>
		</ul>
	</div></div>
</div>

<div class="block_menu">
	<div id="title" style='background-image: url(../quanly/media/images/i_hethong2_new.png);'><strong style="color:#616161;">Nội dung khác</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>			
	       
            <li><a href="index.php?com=user&act=admin_edit">Thông tin Tài khoản</a></li>
		</ul>
	</div></div>
</div>


<div style=    'border-bottom: 1px solid #e1e1e1;
    width: 80%;    margin-top: 55px;'></div>
<div >
	<a href='https://<?php echo $config_url; ?>' style='display: block;
    color: #616161;
    text-decoration: none;
    width: 80%;
    margin-top: 10px;
    margin-bottom: 10px;
    background-image: url(../quanly/media/images/arrow_logout.png);
    background-repeat: no-repeat;
    background-position: right 48% center;'> Về trang chủ Showroomin</a>
	
</div>


