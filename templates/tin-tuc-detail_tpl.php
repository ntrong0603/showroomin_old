<div id='' class='' style='background: #f2f2f2' > 
	<div id='' class='container' > 
			<div id='' class='row' >
				<div id='' class='main-news' > 
					<div id='news-left' class='col-md-3 no-padding-left' > 
						<?php
						$sql="select * from table_news where hienthi=1 and loaitin='tin-tuc' order by stt asc limit 5";
						$d->query($sql);
						$news=$d->result_array();
						?>
						<?php for($i=0; $i<count($news);$i++){?>
								<a href='./tin-tuc/<?php echo $news[$i]['tenkhongdau'];?>.html' class='<?php if($_GET['id']==$news[$i]['tenkhongdau']){echo "active";}?>' ><img src='./upload/news/<?php echo $news[$i]['thumb'];?>' alt='' title='' /><?php echo $news[$i]['ten'];?></a>
								
						<?php } ?>


					</div>
					
					
					<div id='news-right' class='col-md-9 no-padding-right' > 
						<div id='' class='ten' >  
						<?php echo $chitiettintuc['ten'];?>
						
						</div>
						<div id='' class='noidung' >  
						<?php echo $chitiettintuc['noidung'];?>
						
						</div>

					</div>
					<div id='' class='clearfix' >  </div>
				</div>

			</div>
	</div>

 </div>