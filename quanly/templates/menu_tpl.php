<div id='logo'>
	<img src='./media/images/logo.png'/>
	
</div>
<div style=    'border-bottom: 1px solid #e1e1e1;
    width: 80%;    margin-bottom: 55px;'></div>


<div class="block_menu">
	<div id="title" style='background-image: url(./media/images/i_thongtin_new.png);'><strong style="color:#616161;">Quản lý liên hệ</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>				
       
          <?php
			  $sql = "select * from #_lienhekhach where xem = 0 order by id desc";
			  $d->query($sql);
			  $sl = $d->result_array();
		  ?>
          <li><a href="index.php?com=lienhekhach&act=man">Quản lý Liên hệ khách <?php if(count($sl)>0){ echo '('.count($sl).')'; echo '<img src="media/images/New_icons_101.gif"/>';}?></a></li> 
			<?php
				$sql = "select * from table_dathang where xem = 0 order by id desc";
				$d->query($sql);
				$sl1 = $d->result_array();
			?>
          <li><a href="index.php?com=order&act=man">Quản lý đơn đặt hàng <?php if(count($sl1)>0){ echo '('.count($sl1).')'; echo '<img src="media/images/New_icons_101.gif"/>';}?></a>
          </li>
		</ul>
	</div></div>
</div>

<div class="block_menu">
	<div id="title" style='background-image: url(./media/images/i_hethong_new.png);'><strong style="color:#616161;">Thuộc tính</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>
          <li><a href="index.php?com=thuoctinh&act=man_danhmuc">Loại Thuộc tính</a></li> 
          <li><a href="index.php?com=thuoctinh&act=man">Quản lý Thuộc tính</a></li> 
  
		</ul>
	</div></div>
</div>
<div class="block_menu">
	<div id="title" style='background-image: url(./media/images/i_vitri_new.png);'><strong style="color:#616161;">Quản lý tỉnh thành</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>				
        <li><a href="index.php?com=tinhthanh&act=man_danhmuc">Quản lý tỉnh/thành phố</a></li>
        <li><a href="index.php?com=tinhthanh&act=man_list">Quản lý Huyện/quận</a></li>
        <li><a href="index.php?com=tinhthanh&act=man_cat">Quản lý Phường/Xã</a></li>
 		</ul>
	</div></div>
</div>
<!--
<div class="block_menu">
	<div id="title"><strong style="color:#616161;">web setting</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>
       	  <li><a href="index.php?com=url&act=man">URL</a></li>
       	  <li><a href="index.php?com=baiviet&act=man">Bài viết lẻ</a></li>
  
		</ul>
	</div></div>
</div>

<div class="block_menu">
	<div id="title"><strong style="color:#616161;">Khai báo Google</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>
       	  <li><a href="index.php?com=khaibao&act=capnhat">Quản lý Google Analytics</a></li>
         
             
		</ul>
	</div></div>
</div>

<div class="block_menu">
	<div id="title"><strong style="color:#616161;">Quản lý khách hàng</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>				
          <li><a href="index.php?com=custom&act=man">Quản lý khách hàng</a></li>  
     
		</ul>
	</div></div>
</div>


-->
<div class="block_menu">
	<div id="title" style='background-image: url(./media/images/i_thumuc_new.png);'><strong style="color:#616161;">Place</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>		
        <li><a href="index.php?com=brand&act=man">Quản lý Brand</a></li> 		
			<li><a href="index.php?com=place&act=man_danhmuc">Quản lý danh mục </a></li>
			<li><a href="index.php?com=concept&act=man_danhmuc">Loại concept </a></li>
          <li><a href="index.php?com=place&act=man">Quản lý Place</a></li>  
          
         
		</ul>
	</div></div>
</div>
<!--
<div class="block_menu">
	<div id="title"><strong style="color:#616161;">Dự án</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>				
			<li><a href="index.php?com=duan&act=man_danhmuc">Quản lý danh mục </a></li>
          <li><a href="index.php?com=duan&act=man">Quản lý tin Dự án</a></li>  
          
         
		</ul>
	</div></div>
</div>
<div class="block_menu">
	<div id="title"><strong style="color:#616161;">Cho Thuê</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>				
			<li><a href="index.php?com=chothue&act=man_danhmuc">Quản lý danh mục </a></li>
          <li><a href="index.php?com=chothue&act=man">Quản lý tin Cho Thuê</a></li>  
          
         
		</ul>
	</div></div>
</div>
<!--
<div class="block_menu">
	<div id="title"><strong style="color:#616161;">Quản lý liên hệ</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>				
       
          <?php
		  $sql = "select * from #_lienhekhach where xem = 0 ";
		  $d->query($sql);
		  $sl = $d->result_array();
		  ?>
          <li><a href="index.php?com=lienhekhach&act=man">Quản lý Liên hệ khách <?php if(count($sl)>0){ echo '('.count($sl).')'; echo '<img src="media/images/New_icons_101.gif"/>';}?></a></li> 
         
		</ul>
	</div></div>
</div>



<!--
<div class="block_menu">
	<div id="title"><strong style="color:#616161;">Dịch vụ</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>
       	    <?php if ($captintuc>=1){ ?><li><a href="index.php?com=news&act=man_danhmuc&loaitin=dichvu">Quản lý danh mục cấp 1</a></li><?php } ?>
           <?php if ($captintuc>=2){ ?> <li><a href="index.php?com=news&act=man_list&loaitin=dichvu">Quản lý danh mục cấp 2</a></li>	<?php } ?>
          <li><a href="index.php?com=news&act=man&loaitin=dichvu">Quản lý tin tức</a></li>  
             
		</ul>
	</div></div>
</div>
-->
<?php foreach ($menu as $loaitin => $thongtin){?>
<div class="block_menu">
	<div id="title" style='background-image: url(./media/images/i_doc_new.png);'><strong style="color:#616161;"><?php echo $thongtin['ten']?></strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>
        	<?php $cap = $thongtin['cap'] ;?>
       	    <?php if ($cap>=1){ ?><li><a href="index.php?com=news&act=man_danhmuc&loaitin=<?php echo $loaitin?>">Quản lý danh mục cấp 1</a></li><?php } ?>
           <?php if ($cap>=2){ ?> <li><a href="index.php?com=news&act=man_list&loaitin=<?php echo $loaitin?>">Quản lý danh mục cấp 2</a></li>	<?php } ?>
          <li><a href="index.php?com=news&act=man&loaitin=<?php echo $loaitin?>">Quản lý <?php echo $thongtin['ten']?></a></li> 
          <li><a href="index.php?com=baiviet&act=capnhat&loaitin=<?php echo $loaitin?>">Quản lý bài viết SEO<?php echo $thongtin['ten']?></a></li> 
		</ul>
	</div></div>
</div>
<?php }?>
<div class="block_menu">
	<div id="title" style='background-image: url(./media/images/i_anh_new.png);'><strong style="color:#616161;">Hình ảnh</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>
       	 <li><a href="index.php?com=bannerqc&act=capnhat">Logo</a></li>	
		  <li><a href="index.php?com=slider&act=man">Quản lý slider </a></li>	
		  <li><a href="index.php?com=360&act=man">Quản lý hình 360 </a></li>	
		 <!--
       	 <li><a href="index.php?com=doitac&act=man_photo">Quản lý banner top</a></li>
         <li><a href="index.php?com=quangcao&act=man_photo">Quản lý quảng cáo</a></li>  
         <!--<li><a href="index.php?com=video&act=man_item">Quản lý Video</a></li>
         <li><a href="index.php?com=album&act=man_item">Quản lý Album</a></li>-->
             
		</ul>
	</div></div>
</div>

<!--
<div class="block_menu">
	<div id="title"><strong style="color:#616161;">Hỗ trợ trực tuyến</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>
          <li><a href="index.php?com=yahoo&act=man_danhmuc">Nhóm Hỗ trợ</a></li>  	
       	  <li><a href="index.php?com=yahoo&act=man">Hỗ trợ trực tuyến</a></li>  
		</ul>
	</div></div>
</div>
-->
<!--
<div class="block_menu">
	<div id="title"><strong style="color:#616161;">Mail khách hàng</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>
             <li><a href="index.php?com=newsletter&act=man">Quản lý Mail khách hàng</a></li>	
		</ul>
	</div></div>
</div>
-->


<div class="block_menu">
	<div id="title" style='background-image: url(./media/images/i_thongke.png);'><strong style="color:#616161;">Thống kê</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>			
            <li><a href="index.php?com=thongke&act=sanpham">Thống kê theo sản phẩm</a></li>          
			<li><a href="index.php?com=thongke&act=concept">Thống kê theo concept</a></li>      
		</ul>
	</div></div>
</div>

<div class="block_menu">
	<div id="title" style='background-image: url(./media/images/i_hethong2_new.png);'><strong style="color:#616161;">User</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>			
            <li><a href="index.php?com=user&act=man">Quản lý User</a></li>
            <li><a href="index.php?com=user&act=man_nsx">Cấp quyền NSX</a></li>
		</ul>
	</div></div>
</div>

<div class="block_menu">
	<div id="title" style='background-image: url(./media/images/i_hethong2_new.png);'><strong style="color:#616161;">Nội dung khác</strong></div>
	<div id="border_sub"><div id="bg_bottom_sub">
		<ul>			
	       
            <li><a href="index.php?com=hotline&act=capnhat">Cập nhật thông tin công ty</a></li>          
            <li><a href="index.php?com=title&act=capnhat">Cập nhật title</a></li>
            <li><a href="index.php?com=user&act=admin_edit">Thông tin user</a></li>
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
    background-image: url(./media/images/arrow_logout.png);
    background-repeat: no-repeat;
    background-position: right 48% center;'> Về trang chủ Showroomin</a>
	
</div>


