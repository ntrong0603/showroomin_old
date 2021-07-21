<div id="header">
    	<div id="banner">
			<div style='    		width: max-content;
		width: -moz-max-content;
		width: -webkit-max-content;
		width: -o-max-content;
    display: flex;
    align-items: center;    margin-right: 65px;'>
				<div class='bell-header' style='    margin-right: 10px;'>
					<a href='javascript:void()' style='position: relative;display: block;'>
						<img src='./media/images/bell.png' width='30px;'/>
						<?php if(count($sl)>0 || count($sl1)>0){?>
							<span  style='background-color: #d30000;position: absolute;z-index: 1;width: 9px;height: 9px;top: 1px;right: 3px;border-radius: 50%;border: 1px solid #fff;'></span>
						<?php }?>
					</a>
					<?php if(count($sl)>0 || count($sl1)>0){?>
					<div class='option-bell'>
					
					<?php for($i=0;$i<count($sl1);$i++){?>
							<a href='index.php?com=order&act=chitiet&id=<?=$sl1[$i]['id']?>&xem=<?=$sl1[0]['xem']?>'>Đơn hàng mới từ <?php echo $sl1[$i]['ten']?></a>
					<?php }?>
					
					<?php for($i=0;$i<count($sl);$i++){?>
							<a href='index.php?com=lienhekhach&act=edit&id=<?php echo $sl[$i]['id']?>'>Liên hệ mới từ <?php echo $sl[$i]['ten']?></a>
					<?php }?>
					
					</div>
					<?php }?>
				</div>
				<div class='user-header'>
					<a class='avarta-header' href='javascrip:void()'>
						<img src='<?php 
						if(@$_SESSION['login']['avatar']!='' && @$_SESSION['login']['avatar']!=NULL){
							echo _upload_hinhanh.@$_SESSION['login']['avatar'];
						}
						else{
							echo './media/images/noimage.png';
						}
						
						?>' style='margin-right: 5px;
    border-radius: 50%;' width='40px'/>
						<?php echo $_SESSION['login']['ten'] ?>
					</a>
					<div class='option-avata'>
							<a href='index.php?com=user&act=logout'>Logout</a>
						
					</div>
				</div>
			</div>
        </div>
        <!--<div id="h_nav">
        			<div id="left_links">
						<a href="../" title="Xem website" target="_blank">Xem website</a>
					</div>
                    <div id="left_links">
						<a href="index.php" title="Trang chủ">Trang chủ</a>
					</div> 
                 
					<div id="left_links">
						<a href="index.php?com=baiviet&act=capnhat&loaitin=gioi-thieu" title="Giới thiệu">Giới thiệu</a>
					</div>
                   
                    
          <div id="left_links"><a href="index.php?com=baiviet&act=capnhat&loaitin=footer">Footer</a></div>
		 <div id="left_links"><a href="index.php?com=baiviet&act=capnhat&loaitin=lien-he" title="thông tin liên hệ">Thông tin liên hệ</a></div>
                    
                    
                
                                  
					<div id="right_links">
						<a href="index.php?com=user&act=logout">Thoát</a>
					</div>
        </div>-->
</div>