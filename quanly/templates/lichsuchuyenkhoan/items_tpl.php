<h3><a href="index.php?com=lichsuchuyenkhoan&act=add">Thêm</a>

    <br/>
   

<form action="#" method="post" name="frmLIST_lichsuchuyenkhoan" id="frmLIST_lichsuchuyenkhoan">
<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>		
   
		 <th style="width:15%;">User khách hàng</th> 
		 <th style="width:15%;">Tên chủ tài khoản</th> 
		 <th style="width:15%;">Ngày chuyển khoản</th> 
		 <th style="width:15%;">Tổng cước chuyển khoản</th> 
	

                        
         
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
          
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;">
			<a href="index.php?com=lichsuchuyenkhoan&act=edit&id_list=<?php echo $items[$i]['id_list']?>&id_cat=<?php echo $items[$i]['id_cat']?>&id=<?php echo $items[$i]['id']?>&curPage=<?php echo $_REQUEST['curPage']?>" style="text-decoration:none;">
				<?php echo $items[$i]['stt']?>
			</a>
		</td>	
		
		
	   
		<td align="center" style="width:25%;">
			<?php echo $items[$i]['user']?> 
			    
		</td>
		
		<td align="center" style="width:25%;">
			<?php echo $items[$i]['tenchutaikhoan']?> 
			    
		</td>
		
		<td align="center" style="width:25%;">
			<?php echo $items[$i]['ngaychuyenkhoan']?> 
			    
		</td>
		
		<td align="center" style="width:25%;">
			<?php echo tien($items[$i]['tongchuyenkhoan'])?> 
			    
		</td>

			
		

		<td style="width:5%;">
			<a href="index.php?com=lichsuchuyenkhoan&act=edit&id_list_l=<?php echo $items[$i]['id_list_l']?>&id_list=<?php echo $items[$i]['id_list']?>&id_cat=<?php echo $items[$i]['id_cat']?>&id_group=<?php echo $items[$i]['id_group']?>&id=<?php echo $items[$i]['id']?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>">
				<img src="media/images/edit.png" border="0" />
			</a>
		</td>
		
		<td style="width:5%;">
			<a href="index.php?com=lichsuchuyenkhoan&act=delete<?php if($_REQUEST['id_cat']!='') echo "&id_cat=".$_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>&id=<?php echo $items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;">
				<img src="media/images/delete.png" border="0" />
			</a>
		</td>
	</tr>
	<?php	}?>
</table>
</form>
<a href="index.php?com=lichsuchuyenkhoan&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?php echo $paging['paging']?></div>