<?php 
	$d->reset();
	$sql="select * from #_doitac where hienthi=1";
	$d->query($sql);
	$doitac=$d->result_array();
	
?>
<ul id="scroller1">
                 
                     <?php for($i=0,$count_result_quangcao=count($doitac);$i<$count_result_quangcao;$i++){	?>
                           	  <li>
                                      <a  href="san-pham/<?php echo $doitac[$i]['id']?>/<?php echo $doitac[$i]['tenkhongdau']?>"><img src="<?php if($doitac[$i]['photo']!=NULL) echo _upload_hinhanh_l.$doitac[$i]['photo']; else echo 'images/noimage.gif';?>" 
                                     
                                      />
                                      
                                     
                                      </a>	        
                    
                         </li>
                        <?php } ?>    
                    
</ul> 
