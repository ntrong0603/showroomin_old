<div class="block_menu">
<div id="title"><strong style="color:#990000;">Quản lý liên hệ</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>
        	<!--				
			     <?php
            $sql = "select * from #_donhang where xem = 0 ";
            $d->query($sql);
            $sl = $d->result_array();
            ?>
            <li><a href="index.php?com=order&act=man">Quản lý đơn hàng <?php if(count($sl)>0){ echo '('.count($sl).')'; echo '<img src="/../../quanly/media/images/New_icons_101.gif"/>';}?></a></li>
            
            <?php
            $sql = "select * from #_lienhekhach where xem = 0 ";
            $d->query($sql);
            $sl = $d->result_array();
       
            ?>
            -->
            <li><a href="index.php?com=lienhekhach&act=man">Quản lý Liên hệ khách <?php if(count($sl)>0){ echo '('.count($sl).')'; echo '<img src="./../../quanly/media/images/New_icons_101.gif"/>';}?></a></li> 
            <!--<li><a href="index.php?com=popup&act=man">Quản lý Liên hệ khách qua popup <?php if(count($sl2)>0){ echo '('.count($sl2).')'; echo '<img src="./../../quanly/media/images/New_icons_101.gif"/>';}?></a></li> -->
         	 
		</ul>
	</div></div>
</div>

<div class="block_menu">
  <div id="title"><strong style="color:#990000;">Quản lý sản phẩm</strong></div>
  <div id="border_sub"><div id="bg_bottom_sub">
    <ul>        
      <li><a href="index.php?com=place&act=man">Quản lý showroom</a></li>
         <!--<?php if ($capmenu>=1){ ?>  <li><a href="index.php?com=product&act=man_danhmuc">Quản lý danh mục</a></li><?php } ?>
         <?php if ($capmenu>=2){ ?>  <li><a href="index.php?com=news&act=man_list">Quản lý danh mục cấp 2</a></li><?php } ?>
         <?php if ($capmenu>=3){ ?>  <li><a href="index.php?com=news&act=man_cat">Quản lý danh mục cấp 3</a></li><?php } ?>
         <?php if ($capmenu>=4){ ?>  <li><a href="index.php?com=news&act=man_item">Quản lý danh mục cấp 4</a></li><?php } ?>
          <li><a href="index.php?com=product&act=man">Quản lý sản phẩm</a></li>
          <?php
            $sql = "select * from table_dathang where xem = 0 ";
            $d->query($sql);
            $sl1 = $d->result_array();
          ?>-->
          <li><a href="index.php?com=order&act=man">Quản lý đơn đặt hàng <?php if(count($sl1)>0){ echo '('.count($sl1).')'; echo '<img src="./../../quanly/media/images/New_icons_101.gif"/>';}?></a>
          </li>
    </ul>
  </div></div>
</div>

<!--<div class="block_menu">
	<div id="title"><strong style="color:#990000;">Thông tin liên hệ </strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>
      <li><a href="index.php?com=news_one&loaitin=contact">Quản lý thông tin liên hệ</a></li> 
		</ul>
	</div></div>
</div>-->

<!--<div class="block_menu">
	<div id="title"><strong style="color:#990000;">Hình ảnh,Video</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>       	      
			<li><a href="index.php?com=bannerqc&act=capnhat">Logo</a></li>
		</ul>
	</div></div>
</div>-->

<div class="block_menu">
	<div id="title"><strong style="color:#990000;">Nội dung khác</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>			
	       
        <!--<li><a href="index.php?com=hotline&act=capnhat">Cập nhật thông tin công ty</a></li>          
        <li><a href="index.php?com=baiviet&act=capnhat&loaitin=bando">Cập nhật bản đồ</a></li>
        <li><a href="index.php?com=title&act=capnhat">Cập nhật thông tin SEO</a></li>
        <li><a href="index.php?com=khaibao&act=capnhat">Google Analytics +Meta</a></li>-->
        <li><a href="index.php?com=user&act=admin_edit">Quản lý Tài khoản</a></li>
		</ul>
	</div></div>
</div>



