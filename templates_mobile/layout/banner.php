<?php
	$d->reset();
	$sql = "select * from #_place_danhmuc where hienthi = 1";
	$d->query($sql);
	$pro_danhmuc = $d->result_array();
	
	
?>


<div class="headermenu">
            <div class="container1">
                <div class="col-sm-12 col-lg-10 nopad">
                    <nav class="navbar navbar-default fixdef">
                      <div class="container-fluid fixcon">
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand off" href="#"><img src="images/logo.png" alt="" class="logore">
                          
                          </a>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                          <ul class="nav navbar-nav fixnav">
                            <li class="active"><a href="index"><?php echo _trangchu?><span class="sr-only">(current)</span></a></li>
                            <li><a href="gioi-thieu"><?php echo _gioithieu?></a></li>
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo _sanpham?> <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                              <?php for($i=0;$i<count($pro_danhmuc);$i++){ ?>
                              	<li><a href="<?php echo $pro_danhmuc[$i]['tenkhongdau']?>"><?php echo $pro_danhmuc[$i]['ten'.$lang]?></a></li>
                              <?php }?>
                                
                              </ul>
                            </li>
                            <li><a href="dich-vu"><?php echo _dichvu?></a></li>
                            <li><a href="tin-tuc"> <?php echo _tintuc?></a></li>
                            
                            <li><a href="lien-he"><?php echo _lienhe?>̣</a></li>
                          </ul>
                        </div><!-- /.navbar-collapse -->
                      </div><!-- /.container-fluid -->
                  </nav>
                </div>
               
            </div>
        </div>
