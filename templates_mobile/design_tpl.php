


<script language="javascript">
	function addtocart(pid){
		document.form1.placeid.value=pid;
		document.form1.command.value='add';
		document.form1.submit();
	}
</script>

<form name="form1" action="index.php">
	<input type="hidden" name="placeid" />
    <input type="hidden" name="command" />
</form>
<?php if($_GET['com']=='thiet-ke'){ ?>
	<div class="wrapper_content">
    <h1>
    	<div class="danhmuc_title">
        	<?php echo _designs?>
        </div>
   </h1>
        <div class="content_pro">
        	<?php for($i=0;$i<count($sanpham);$i++){?>
        	<div class="item_dm_pro">
            	<div class="img_item_dm">
                	<img src="<?php echo _upload_tintuc_l.$sanpham[$i]['thumb']?>" />
                    <?php 
					$sql = "select * from #_news_list where hienthi=1 and id_danhmuc ='".$sanpham[$i]['id']."' order by stt,id desc";
					$d->query($sql);
					$sanpham1 = $d->result_array();
					if(count($sanpham1)>0){?>
                    
                        <div class="content_dm2">
                        <?php for($j=0;$j<count($sanpham1);$j++){  ?>
                            <h3><a href="<?php echo $sanpham1[$j]['tenkhongdau']?>" class="item_dm2">
                               <?php echo $sanpham1[$j]['ten'.$lang]?>
                            </a></h3>
                        <?php }?>
                    	</div><!--end comtent dm 2-->
                    <?php }?>
                </div><!--end img item dm -->
                <h2><a class="name1" href="<?php echo $sanpham[$i]['tenkhongdau']?>"><?php echo $sanpham[$i]['ten'.$lang]?></a></h2>
            </div><!-- end item dm -->
            
            <?php }?>
        </div><!--end content pro -->
        <div class="clearfix"></div>
    </div>
<?php } else{?>
    <div class="wrapper_content"><br>
            
            <div class="clearfix"></div>
            <?php include _template."layout/left.php";?>
            
            <div class="menu-right">
                <div class="bar"><a href="index"> <?php echo _trangchu?> > </a> <h1> <?php echo $title_page?></h1></div>
                
                <div class="clearfix"></div>
                <?php $j=1;
				for($i=0;$i<count($sanpham);$i++){
                    $sql = "select * from #_news_danhmuc where hienthi=1 and id='".$sanpham[$i]['id_danhmuc']."'";
                    $d->query($sql);
                    $row_danhmuc = $d->fetch_array();
                ?>
                
                      <div class="item_sanpham item_sp<?php echo $j?>">
                       <a href="<?php if($row_danhmuc['tenkhongdau'] != ''){ echo $row_danhmuc['tenkhongdau'];} else{ echo 'san-pham'; }?>/<?php echo $sanpham[$i]['tenkhongdau']; ?>">
                        <div class="img_item_pro">			
						<?php if($place_sp[$i]['spmoi']==1){ ?> <img class='spmoi' src='images/icon_new.gif' alt='sản phẩm mới' title='sản phẩm mới' />
						<?php } ?>
                       
                          <img src="<?php echo _upload_tintuc_l.$sanpham[$i]['thumb'] ?>"  alt="<?php echo $sanpham[$i]['ten'.$lang]?>" class="img-item">
                          <h3><div class="tenpro"><?php echo $sanpham[$i]['ten'.$lang]?></div></h3>
                        </div>
                        </a>
                      </div>
                      
                <?php 
				if($j==3){
					$j=0;
					}
				$j = $j+1;
				}?>
                <div class="clearfix"></div>
                <div class="text-center">
                <div class="phantrang" ><?php echo $paging['paging']?></div>
                </div>
                <div class="clearfix"></div>
                
            </div><!--menu right-->
            <div class="clearfix"></div>
     </div>
<?php }?>
    