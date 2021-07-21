
	<div class="col-sm-22">
    <div class="boder1">
        <div class="block  blocktop ">
            <div class="title-dao bor10">Hỗ trợ trực tuyến</div>
            <div class="content1-tructuyen">
			<?php $sql='select * from table_yahoo where hienthi=1 order by stt ';
			
			$d->query($sql);
			$hotro=$d->result_array();
			?>
			<?php for($i=0; $i<count($hotro);$i++){?>
                                <div class="item-support">
                    <p><?php echo $hotro[$i]['ten'.$lang];?></p>
                    <p class="hot-line">
                    <img src="./index_files/icon-phone.png" width="31" height="29" alt="Hot line Công Ty Sàn Gỗ TecWood - TecWood Outdoor Floor."><?php echo $hotro[$i]['dienthoai'];?></p>
                    <p>
                    <a style="position:relative; z-index:1" href="ymsgr:sendim?<?php echo $hotro[$i]['yahoo'];?>" title="<?php echo $hotro[$i]['ten'.$lang];?>">
                    <img border="0" src="./index_files/yahoo-online.gif" alt="Chat with <?php echo $hotro[$i]['ten'.$lang];?>"></a>
                    </p>
                    
                    <p>
                    <a href="skype:<?php echo $hotro[$i]['skype'];?>?chat" title="Chat with <?php echo $hotro[$i]['ten'.$lang];?>">
                    <img width="78" height="23" src="./index_files/chatbutton_32px.png" alt="Chat with <?php echo $hotro[$i]['ten'.$lang];?>"></a>
                    </p>
                    
                </div>
			<?php } ?>
                           
                            </div>
        </div>

        
					       	<?php $sql="select* from table_haicot where noibat=1 order by stt ";
		$d->query($sql);
		$cottrai=$d->result_array();
		
		?>
		<?php for ($i=0;$i<count($cottrai);$i++){?>
		 <div class="block" style="margin-bottom:0">
            <h2 class="title bor10"><?php echo $cottrai[$i]['ten'];?></h2>
            <div class="content news-list">
				<?php if( $cottrai[$i]['mota']!='' ){?>
				
				<?php $id_list= $cottrai[$i]['mota'];
				$sql="select* from table_news where hienthi=1 and id_danhmuc='".$id_list."' and trai =1 order by stt limit 8 ";
				$d->query($sql);
				$tintuc=$d->result_array();
				$sql="select* from table_news_danhmuc where id='".$tintuc[0]['id_danhmuc']."'";
				$d->query($sql);
				$danhmuc=$d->fetch_array();
				?>
				<?php for ($a=0; $a<count($tintuc);$a++){?>
				<li style="float: none; list-style: none; position: relative; width: 207px;" class="bx-clone ">
				<div class="item-news">
				<a href=" <?php echo $danhmuc['tenkhongdau'];?>/<?php echo $tintuc[$a]['tenkhongdau'];?>" title=" <?php echo $tintuc[$a]['ten'.$lang];?>">
                    <?php echo $tintuc[$a]['ten'.$lang];?></a></div></li>
				<?php } ?>
				<?php }elseif( $cottrai[$i]['noidung']!=''){ if( substr($cottrai[$i]['noidung'],0,3)=='goc' ){ ?>
				
				<?php $id_list= $cottrai[$i]['noidung'];
				$sql="select* from table_place_list where hienthi=1 and id_danhmuc =".end(explode('goc' ,$cottrai[$i]['noidung']))." order by stt limit 8 ";
				$d->query($sql);
				$tam=$d->result_array();?>
				<?php for ($a=0; $a<count($tam);$a++){?>
				<li style="float: none; list-style: none; position: relative; width: 207px;" class="bx-clone ">
				<h3 class="item-news">
				<a href="<?php echo $tam[$a]['tenkhongdau'];?>" title=" <?php echo $tam[$a]['ten'.$lang];?>">
                    <?php echo $tam[$a]['ten'.$lang];?></a></h3></li>
				
				<?php }} else{?>
				
				<?php $id_list= $cottrai[$i]['noidung'];
				$sql="select* from table_place where hienthi=1 and  id_list='".$id_list."' and noibat =1 order by stt limit 8 ";
				$d->query($sql);
				$tintuc=$d->result_array();
				$sql="select* from table_place_danhmuc where id='".$tintuc[0]['id_danhmuc']."'";
				$d->query($sql);
				$danhmuc=$d->fetch_array();
				?>
				<?php for ($a=0; $a<count($tintuc);$a++){?>
				<li style="float: none; list-style: none; position: relative; width: 207px;" class="bx-clone ">
				<div class="item-news">
				<a href=" <?php echo $danhmuc['tenkhongdau'];?>/<?php echo $tintuc[$a]['tenkhongdau'];?>" title=" <?php echo $tintuc[$a]['ten'.$lang];?>">
                    <?php echo $tintuc[$a]['ten'.$lang];?></a></div></li>
				<?php } ?>
				<?php }}else{ ?>
				
				
                <div class="">
                    <ul class="">
                        <li><a href="<?php echo $cottrai[$i]['tenkhongdau'];?>" title="<?php echo $cottrai[$i]['ten'];?>" style='padding-left: 0px;background: none;'>
                        <img src="./upload/sanpham/<?php echo $cottrai[$i]['photo'];?>" width="100%" height="" alt="<?php echo $cottrai[$i]['ten'];?>"></a></li>
                    </ul>
                </div>
				<?php } ?>
            </div>
        </div>
		<?php }?>
 
      
		            </div>
</div>		