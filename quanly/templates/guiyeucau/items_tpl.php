<h3>Yêu cầu từ khách hàng</h3>
   

<form action="#" method="post" name="frmLIST_guiyeucau" id="frmLIST_guiyeucau">
<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>		
   
		 <th style="width:15%;">Tiêu đề </th> 
		 <th style="width:15%;">Tên người gửi </th> 
		 <th style="width:15%;">Điện thoại </th> 
		 <th style="width:15%;">Nội dung </th> 
		 <th style="width:15%;">status</th> 
	

                        
                     

		<th style="width:5%;">Xem</th>
	
          
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;">
			<a href="index.php?com=guiyeucau&act=edit&id_list=<?php echo $items[$i]['id_list']?>&id_cat=<?php echo $items[$i]['id_cat']?>&id=<?php echo $items[$i]['id']?>&curPage=<?php echo $_REQUEST['curPage']?>" style="text-decoration:none;">
				<?php echo $i +1;?>
			</a>
		</td>	
		
		
	   
		<td align="center" style="width:25%;">
			<?php echo $items[$i]['ten']?> 
			    
		</td>
		<td align="center" style="width:25%;">
			<?php echo $items[$i]['tennguoigui']?> 
			    
		</td>
		<td align="center" style="width:25%;">
			<?php echo $items[$i]['dienthoai']?> 
			    
		</td>
			<td align="center" style="width:25%;">
			<?php echo $items[$i]['noidung']?> 
			    
		</td>
		
		<td align="center" <?php if( $items[$i]['status']=='wait' ){echo " class='red' " ;}?> style="width:25%;">
			<?php echo $items[$i]['status']?> 
			    
		</td>
			
		

		

		<td style="width:5%;">
			<a href="index.php?com=guiyeucau&act=edit&id_list_l=<?php echo $items[$i]['id_list_l']?>&id_list=<?php echo $items[$i]['id_list']?>&id_cat=<?php echo $items[$i]['id_cat']?>&id_group=<?php echo $items[$i]['id_group']?>&id=<?php echo $items[$i]['id']?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>">
				<img src="media/images/edit.png" border="0" />
			</a>
		</td>
		
		
	</tr>
	<?php	}?>
</table>
</form>
<div class="paging"><?php echo $paging['paging']?></div>