<h3>Quảng lý logo top <?=isset($_REQUEST['mobile'])?'mobile':''?></h3>
<form name="frm" method="post" action="index.php?com=bannerqc&act=save_banner_footer<?=isset($_REQUEST['mobile'])?'&mobile=on':''?>" enctype="multipart/form-data" class="nhaplieu">
	<b>Hình hiện tại:</b> 
	<?php
	 if($item['photo']!=NULL)
	 {
	 ?>
            
     <object width="185" height="95"  codebase="http://active.macromedia.com/flash4/cabs/swflash.cab#version=4,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
              <param NAME="_cx" VALUE="13414">
              <param NAME="_cy" VALUE="6641">
              <param NAME="FlashVars" VALUE>
              <param NAME="Movie" VALUE="<?=_upload_hinhanh.$item['photo']?>">
              <param NAME="Src" VALUE="<?=_upload_hinhanh.$item['photo']?>">
              <param NAME="Quality" VALUE="High">
              <param NAME="AllowScriptAccess" VALUE>
              <param NAME="DeviceFont" VALUE="0">
              <param NAME="EmbedMovie" VALUE="0">
              <param NAME="SWRemote" VALUE>
              <param NAME="MovieData" VALUE>
              <param NAME="SeamlessTabbing" VALUE="1">
              <param NAME="Profile" VALUE="0">
              <param NAME="ProfileAddress" VALUE>
              <param NAME="ProfilePort" VALUE="0">
              <param NAME="AllowNetworking" VALUE="all">
              <param NAME="AllowFullScreen" VALUE="false">
              <param name="scale" value="ExactFit">
             <embed src="<?=_upload_hinhanh.$item['photo']?>" quality="High" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" width="185" height="95" scale="ExactFit"></embed>
            </object>
            
	 <?php 
	 } 
	 else 
	 {
	 echo "Chưa có logo"; 
	 }
	 ?><br /><br />
	<b>logo hiện tại: </b> 
    <input type="file" name="file" /> <strong></strong><br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" checked="checked" /> <br /><br />
	

	
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=logoqc&act=capnhat'" class="btn" />
</form>