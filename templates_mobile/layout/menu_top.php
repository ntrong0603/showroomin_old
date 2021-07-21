<?php 
	
	$d->reset();
	$sql="select * from #_place_danhmuc where hienthi=1 order by stt,id";
	$d->query($sql);
	$pro_dm=$d->result_array();
?>
<div class="col-md-10 col-xs-8 topmenu nopad">
                    <nav class="navbar navbar-default nav-top" style="min-height:30px !important;">
                        <div class="container-fluid fix-container" >
                          <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                            </button>
                          </div>
                          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="list-inline menuf">
                    <li <?php if($_GET['com'] == '' || $_GET['com'] == 'index' ){?> class="active1" <?php }?>>
                    <h2><a href="index"><?php echo _trangchu?> </a></h2></li>
                    <li <?php if($_GET['com'] == 'cong-ty'  ){?> class="active1" <?php }?>>
                    <h2><a href="cong-ty"><?php echo _company?></a></h2> </li>
                    <li <?php if($source == 'place'  ){?> class="active1" <?php }?>>
                    <h2><a href="san-pham"><?php echo _collection?></a></h2></li>
                    
                    <li <?php if($source == 'design'  ){?> class="active1" <?php }?>>
                    <h2><a href="thiet-ke"><?php echo _designs?></a></h2></li>
                    
                    <li  <?php if($_GET['com'] == 'hinh-anh'  ){?> class="active1" <?php }?>>
                    <h2><a href="hinh-anh"><?php echo _tintuc?></a></h2> </li>
                    <li  <?php if($_GET['com'] == 'doi-tac'  ){?> class="active1" <?php }?>>
                    <h2><a href="doi-tac"><?php echo _doitac?></a></h2> </li>
                    <li  <?php if($source == 'contact'  ){?> class="active1" <?php }?>>
                    <h2><a href="lien-he"><?php echo _lienhe?></a></h2> </li>
                    <li>
                    
                    </li>
                    <li>
                   	
                    </li>
                  </ul> 
                   
                  
                  
            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                      </nav>
                  </div><!--menu-->
 