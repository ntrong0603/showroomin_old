<div id='footer' class='' <?php if( $template=='index' ){ echo "style='position: fixed; left: 0px;right: 0px; bottom:0px;'"; }?> >
<div id='' class='container' > 
	<div id='footer-link' class='row' > 
		<div id='' class='col-sm-5 text-left no-padding-left'>
				Bạn muốn phân phối nội thất? <a href='#' style='text-decoration: underline;' >Đăng ký ngay</a>
		</div>
		<div id='link-bottom' class='col-sm-7 text-right no-padding-right' >
		<?php
		$sql="select * from table_news where hienthi=1 and loaitin='tin-tuc' order by stt asc limit 5";
		$d->query($sql);
		$news_footer=$d->result_array();
		?>
		<?php for($i=0; $i<count($news_footer);$i++){?>
				<a href='./tin-tuc/<?php echo $news_footer[$i]['tenkhongdau'];?>.html' ><?php echo $news_footer[$i]['ten'];?></a>
				
		<?php } ?>
				
		</div>
	</div>
 </div>
 </div>