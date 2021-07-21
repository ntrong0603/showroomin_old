<?php if( $template!=='index' ){?>

	<div id='' class='header_blank_index' >  </div>
   <div id='' class='container' > 
		<div id='' class='row' >  
			<div id='' class='col-sm-3 no-padding-left' >   <?php include _template."layout/logo.php";?>  </div>
			<div id='' class='col-sm-9 no-padding-right' >   <?php include _template."layout/search.php";?>  </div>
			<div id='' class='clearfix' >  </div>
			<div  style='padding: top: 20px; padding-bottom: 30px;'> 
		
			
			<div id='' class='col-sm-12 no-padding-right text-right' style=''> 
			<?php include _template."layout/menu.php";?>
			
			<?php include _template."layout/user.php";?>
			</div>
		<div id='' class='clearfix' >  </div>
		</div>
		</div>
		
		
   </div>
<?php }else {?>
<div id='' class='SR-header' > 
<div id='' class='header_blank_index' >  </div>
 <div id='' class='container' > 
		<div id='' class='row' >  
			<div id='' class='col-sm-5 text-left no-padding-left' >   <?php include _template."layout/menu.php";?>  </div>
			<div id='' class='col-sm-2' >    </div>
			<div id='' class='col-sm-5 no-padding-right' > <div id='' class='row' > 
												<div id='' class='col-xs-12' > 
	
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