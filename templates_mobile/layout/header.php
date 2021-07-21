<?php if( $template!=='index' ){?>

<div id='' class='SR-header' > 
<div id='' class='header_blank_index' >  </div>
 <div id='' class='container' > 
		<div id='' class='row' >  
			<div id='' class='col-xs-4 text-left no-padding-left' >   <?php include _template."layout/menu.php";?>  </div>
			<div id='' class='col-xs-4 text-center ' >   <?php include _template."layout/logo.php";?>  </div>
			
			<div id='' class='col-xs-4 no-padding-right' > 
					<div id='' class='' > 
										<div id='' class='col-xs-12 no-padding' > 
	
											
											<?php include _template."layout/user.php";?>	
											<img id='icon-search' src='./images/icon-mobile-search.svg' alt='' title='' />
											
											
											<script>
											$('body').on('click','#icon-search',function(){
												
												$('#popup-search').toggle(500);
													
											})
											
											</script>
											
											<div id='popup-search' class='' > 
														<?php include _template."layout/search.php";?>	

											</div>
											
											
											</div>
										<div id='' class='clearfix' >  </div>
																</div>
											
			</div>
		<div id='' class='clearfix' >  </div>
	</div>
	</div>
  <div id='' class='header_blank_index' >  </div>

   </div>
   
<?php }else {?>
<div id='' class='SR-header' > 
<div id='' class='header_blank_index' >  </div>
 <div id='' class='container' > 
		<div id='' class='row' >  
			<div id='' class='col-xs-5 text-left no-padding-left' >   <?php include _template."layout/menu.php";?>  </div>
			
			<div id='' class='col-xs-2 col-xs-offset-5 no-padding-right' > 
					<div id='' class='' > 
												<div id='' class='col-xs-12 no-padding' > 
	
											<?php include _template."layout/user.php";?>	</div>
										<div id='' class='clearfix' >  </div>
																</div>
											
			</div>
		<div id='' class='clearfix' >  </div>
		</div>
		
   </div>
  <div id='' class='header_blank_index' >  </div>
</div>
<?php } ?>