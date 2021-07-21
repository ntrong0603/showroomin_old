<?php 
	$d->reset();
	$sql="select * from #_place where hienthi=1 and noibat =1 order by stt,id desc";
	$d->query($sql);
	$pro_right=$d->result_array();
	
?>
<ul id="scroller">
                 
                     <?php for($i=0,$count_result_quangcao=count($pro_right);$i<$count_result_quangcao;$i++){	?>
                           	  <li>
                                      <a  href="san-pham/<?php echo $pro_right[$i]['id']?>/<?php echo $pro_right[$i]['tenkhongdau']?>"><img src="<?php if($pro_right[$i]['thumb']!=NULL) echo _upload_sanpham_l.$pro_right[$i]['thumb']; else echo 'images/noimage.gif';?>" 
                                      
                                      />
                                      <span style="color:#666;"><?php echo $pro_right[$i]['ten']?></span><br />
                                     
                                      </a>	        
                    
                         </li>
                        <?php } ?>    
                    
</ul>      
