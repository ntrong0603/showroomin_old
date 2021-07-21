<div class="sidebar">
	<div class="khungtimkiem blockright">
		<h2>Tìm kiếm</h2>
		     <form action="tim-kiem.html">
                    		<script type="text/javascript">
							
							$(document).ready(function(){
								
										$('body').on('change','#loai_bds',function(){
											
											num=$(this).val();
											
											$.ajax({
												type:"post",
												url:"ajax/tinh.php",
												data:"tinh="+num,
												async:false,
												success:function(kq){
													
													$("#id_tinh").html(kq);
													$("#id_huyen").html('   <option value="0" >Quận/Huyện</option>');
													$("#id_phuong").html(' <option value="0" >Phường/Xã</option>');
												   
													
												}
											})
										})
										
									
							
										$('body').on('change','#id_tinh',function(){
											num=$(this).val();
											
											$.ajax({
												type:"post",
												url:"ajax/huyen.php",
												data:"tinh="+num,
												async:false,
												success:function(kq){
													
													$("#id_huyen").html(kq);
												   
													$("#id_phuong").html(' <option>Phường/Xã</option>');
												   
												}
											})
										})
										$('body').on('change','#id_huyen',function(){
											num=$(this).val();
											
											$.ajax({
												type:"post",
												url:"ajax/phuong.php",
												data:"tinh="+num,
												async:false,
												success:function(kq){
													
													$("#id_phuong").html(kq);
												   
													
												}
											})
										})
										
									})
						</script>
                    <div class="form-group">
                        <select id='loai_bds' class="form-control">
                            <option value='0'>Loại bất động sản</option>
                            <option value='1'>Nhà, đất bán</option>
                        </select>
                    </div>
                    <div class="form-group">

                        <select id="id_tinh" name="id_tinh" class="form-control">
                            <option value='0'>Tỉnh/Thành phố</option>
							
                        </select>
                    </div>
                    <div class="form-group">
                        <select id="id_huyen" name="id_huyen" class="form-control">
                            <option value="0" >Quận/Huyện</option>
                        </select>
                    </div>
                    <div  class="form-group">
                        <select id="id_phuong" name="id_phuong" class="form-control">
                            <option value="0" >Phường/Xã</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <select name='dientich' class="form-control">
                            <option value='0-9999' >Diện tích</option>
                            <option value='0-40' >Dưới 40 m2</option>
                            <option value='40-60' >40m2-60m2</option>
                            <option value='60-9999' >Trên 60m2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name='' class="form-control">
                            <option value='0-999999999999'>Mức giá</option>
                            <option value='0-1000000000'>Dưới 1 tỷ</option>
                            <option value='1000000000-2000000000'>1 tỷ - 2 tỷ</option>
                            <option value='2000000000-3000000000'>2 tỷ - 3 tỷ</option>
                            <option value='3000000000-5000000000'>3 tỷ - 5 tỷ</option>
                            <option value='5000000000-10000000000'>5 tỷ - 10 tỷ</option>
                            <option value='10000000000-999999999999'>Trên 10 tỷ</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control" placeholder="Nhập từ khoá.." type="text" value="" id="example-text-input">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
                    </div>
                </form>
	</div>

		     <div class="blockright">
			     <div class="col-lg-12 headright">
				     <h4><i class="glyphicon glyphicon-th-list"></i>Nhà đất bán</h4>
				     <div class="clearfix"></div>
			     </div>
			     <div class="clearfix"></div>
			     <ul class="tinhtp">
				 <?php for($i=0;$i<count($danhmuctinh);$i++){?>
				    <li><i class="glyphicon glyphicon-home"></i><a href="nha-dat-ban/<?php echo $danhmuctinh[$i]['tenkhongdau'];?>.html"><?php echo $danhmuctinh[$i]['ten'];?></a><i class="glyphicon glyphicon-plus"></i>
				     	<ul class="quanhuyen">
							 <?php for($a=0;$a<count($danhmuchuyen);$a++){?>
							 <?php if ($danhmuchuyen[$a]['id_danhmuc']==$danhmuctinh[$i]['id']){?>
					     	<li><i class="glyphicon glyphicon-triangle-right"></i><a href="nha-dat-ban/<?php echo $danhmuchuyen[$a]['tenkhongdau'];?>.html"><?php echo $danhmuchuyen[$a]['ten'];?></a></li>
							 <?php } } ?>
				     	</ul>
				    </li>
				 <?php } ?>
				     
				
			     </ul>
		     </div>
		     
		     <div class="blockright">
			     <div class="col-lg-12 headright">
				     <h4><i class="glyphicon glyphicon-th-list"></i>Căn hộ chung cư</h4>
				     <div class="clearfix"></div>
			     </div>
			     <div class="clearfix"></div>
			      <ul class="tinhtp">
				 <?php for($i=0;$i<count($danhmuctinh);$i++){?>
				    <li><i class="glyphicon glyphicon-object-align-bottom"></i><a href="can-ho-cao-cap/<?php echo $danhmuctinh[$i]['tenkhongdau'];?>.html"><?php echo $danhmuctinh[$i]['ten'];?></a><i class="glyphicon glyphicon-plus"></i>
				     	<ul class="quanhuyen">
							 <?php for($a=0;$a<count($danhmuchuyen);$a++){?>
							 <?php if ($danhmuchuyen[$a]['id_danhmuc']==$danhmuctinh[$i]['id']){?>
					     	<li><a href="can-ho-cao-cap/<?php echo $danhmuchuyen[$a]['tenkhongdau'];?>.html"><?php echo $danhmuchuyen[$a]['ten'];?></a></li>
							 <?php } } ?>
				     	</ul>
				    </li>
				 <?php } ?>
				     
				
			     </ul>
		     </div>
		     <!--<div class="blockright">
			     <div class="col-lg-12 headright">
				     <h4>Nhà, căn hộ cho thuê</h4>
			     </div>
			     <ul class="tinhtp">
				     <li><a href="#">Quận 1</a></li>
				     <li><a href="#">Quận 1</a></li>
				     <li><a href="#">Quận 1</a></li>
				     <li><a href="#">Quận 1</a></li>
				     <li><a href="#">Quận 1</a></li>
				     <li><a href="#">Quận 1</a></li>
<li><a href="#">Quận 1</a></li>
<li><a href="#">Quận 1</a></li>
<li><a href="#">Quận 1</a></li>
<li><a href="#">Quận 1</a></li>
<li><a href="#">Quận 1</a></li>
<li><a href="#">Quận 1</a></li>
<li><a href="#">Quận 1</a></li>

			     </ul>
		     </div>
		     <div class="blockright">
			     <div class="col-lg-12 headright">
				     <h4>PHÒNG TRỌ</h4>
			     </div>
			     <ul class="tinhtp">
				     <li><a href="#">TP Hồ Chí Minh</a>
				     	<ul>
					     	<li><a href="#">Quận 1</a></li>
				     <li><a href="#">Quận 1</a></li>
				     <li><a href="#">Quận 1</a></li>
				     <li><a href="#">Quận 1</a></li>
				     <li><a href="#">Quận 1</a></li>
				     	</ul>
				     </li>
				     
<li><a href="#">Đồng Nai</a></li>
<li><a href="#">Bình Dương</a></li>
<li><a href="#">Vũng Tàu</a></li>
<li><a href="#">Tây Ninh</a></li>

			     </ul>
		     </div>-->
		     
		        <div class="clearfix"></div>
                            	 <?php if( $template=='place' ||  $template=='place2' || $template=='place_detail'){ ?>
								<div class="widget blockleft1">
                                	<!--<h2 class="title"><span><?php echo $danhmucsanpham['ten'];?></span></h2>-->
									 <?php 
										   $sql = "select * from #_place_list where hienthi=1 and id_danhmuc=".$danhmucsanpham['id']." order by stt asc, id desc";
												  $d->query($sql);
												  $danhmuccap22 = $d->result_array();
										  ?>
										  <?php if( count($danhmuccap22)>0 ){ ?>
                                	<ul class="links">
                                          <?php  for($a=0;$a<count($danhmuccap22);$a++){?>
                                              <li><a href="<?php echo $danhmuccap22[$a]['tenkhongdau'];?>.html"><?php echo $danhmuccap22[$a]['ten'];?></a></li>
										   <?php } ?>
                                    </ul>      
										  <?php } ?>									
                                </div>
									 
									 
								 <?php } ?>
								  <?php if( $source=='tin-tuc' ){ ?>
								<div class="widget blockleft1">
                                	<!--<h2 class="title"><span><?php echo $danhmucsanpham['ten'];?></span></h2>-->
									 <?php 
										   $sql = "select * from #_news_danhmuc where hienthi=1 and loaitin='".$loaitin."' order by stt asc, id desc";
												  $d->query($sql);
												  $tintuc1 = $d->result_array();
										  ?>
										  <?php if( count($tintuc1)>0 ){ ?>
                                	<ul class="links">
                                          <?php  for($a=0;$a<count($tintuc1);$a++){?>
                                              <li><a href="<?php echo $tintuc1[$a]['tenkhongdau'];?>.html"><?php echo $tintuc1[$a]['ten'];?></a>
															   <?php 
														   $sql = "select * from #_news_list where hienthi=1 and  id_danhmuc= ".$tintuc1[$a]['id']." and loaitin='".$loaitin."' order by stt asc, id desc";
																  $d->query($sql);
																  $tintuc2 = $d->result_array();
														  ?>
														  <?php if( count($tintuc2)>0 ){ ?>
																<ul class="links">
																	  <?php  for($n=0;$n<count($tintuc2);$n++){?>
																		  <li><a href="<?php echo $tintuc2[$n]['tenkhongdau'];?>.html"><?php echo $tintuc2[$n]['ten'];?></a>
																		  
																		  
																		  
																		  </li>
																	   <?php } ?>
																</ul>      
														  <?php } ?>	
											  
											  
											  </li>
										   <?php } ?>
                                    </ul>      
										  <?php } ?>									
                                </div>
									 
									 
								 <?php } ?>
								<!--<div class="widget blockleft1" >
								 <?php $sql = "select * from #_baiviet where loaitin='left-block-1'";
												  $d->query($sql);
												  $block1 = $d->fetch_array();
										  echo stripslashes($block1['noidung']);
										  ?>
								
								</div>
								<div class="widget blockleft1" >
								 <?php if( 1 == 1 ){
										   $sql = "select * from #_baiviet where loaitin='left-block-index'";
												  $d->query($sql);
												  $block3 = $d->fetch_array();
										  echo stripslashes($block3['noidung']);
										  ?>
										  
                                
								 <?php } ?> 
								</div>-->
								<!-- ==================== END index-==============-->
								
								 <?php $sql = "select * from #_baiviet where loaitin='left-block-2'";
												  $d->query($sql);
												  $block2 = $d->fetch_array();
										  echo stripslashes($block2['noidung']);
										  ?>
										  
                                <!--<div class="widget blockleft2" >
								 <?php $sql = "select * from #_baiviet where loaitin='left-block-3'";
												  $d->query($sql);
												  $block4 = $d->fetch_array();
										  echo stripslashes($block4['noidung']);
										  ?>
								
								</div>
                                <?php if( $mobile=='_mobile' ){ ?>
                                <div class="widget">
									 </br>
												
											 <select id='footer_news' >
													<?php 
													$sql = " select * from table_news where loaitin='news' and hienthi=1 order by stt asc,id desc";
													$d->query($sql);
													$footer_news = $d->result_array();
													
													?>
												<option selected="selected" value=''>News</option>
													<?php for($i=0;$i<count($footer_news);$i++){?>
												   <option value="<?php echo $footer_news[$i]['tenkhongdau'];?>.html" ><?php echo $footer_news[$i]['ten'];?></option>
													<?php } ?>
												</select>
										
								</div>-->
								<?php } ?>
                                <!--<div class="widget">
                                	<h2 class="title"><span>links</span></h2>
                                	<ul class="links">
                                    	<li><a href="#">Lorem ipsum dolor sit amet, consectetur</a></li> 
                                        <li><a href="#">Adipisicing elit, sed do eiusmod tempor incididunt</a></li>
                                        <li><a href="#">Ut labore et dolore magna aliqua.</a></li>
                                        <li><a href="#">Ut enim ad minim veniam, quis nostrud exercitation ullamco</a></li>
                                        <li><a href="#">Laboris nisi ut aliquip ex ea commodo consequat.</a></li>
                                        <li><a href="#">Duis aute irure dolor in reprehenderit</a></li>
                                        <li><a href="#">In voluptate velit esse cillum</a></li>
                                        <li><a href="#">Excepteur sint occaecat cupidatat non proident</a></li>
                                    </ul>                                   
                                </div>-->
                                <!--<div class="widget">
                                	<form class="form-search">
                                        <input type="text" class="input-medium search-query">
                                        <button type="submit" class="btn dark_btn">Search</button>
                                     </form>
                                </div>                            -->
                            </div> 