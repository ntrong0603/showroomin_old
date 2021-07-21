<h3><a href="index.php?com=quan&act=add">Thêm</a>

    <br/>
   

<form action="#" method="post" name="frmLIST_quan" id="frmLIST_quan">
<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>		
   
		 <th style="width:15%;">Tên </th> 
	

                        
                     

        <th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
          
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;">
			<a href="index.php?com=quan&act=edit&id_list=<?php echo $items[$i]['id_list']?>&id_cat=<?php echo $items[$i]['id_cat']?>&id=<?php echo $items[$i]['id']?>&curPage=<?php echo $_REQUEST['curPage']?>" style="text-decoration:none;">
				<?php echo $items[$i]['stt']?>
			</a>
		</td>	
		
		
	   
		<td align="center" style="width:25%;">
			<?php echo $items[$i]['ten']?> 
			    
		</td>

			
		<td style="width:5%;" id="hienthi">
			<?php 
			if(@$items[$i]['hienthi']==1)
			{
			?>
				<a href="index.php?com=quan&act=man&hienthi=<?php echo $items[$i]['id']?><?php if($_REQUEST['id_list_l']!='') echo'&id_list_l='. $_REQUEST['id_list_l'];?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" id="hien_thi">
					<img src="media/images/active_1.png" border="0" />
				</a>
			<?php 
			
			}
			else
			{
			?>
				<a href="index.php?com=quan&act=man&hienthi=<?php echo $items[$i]['id']?><?php if($_REQUEST['id_list_l']!='') echo'&id_list_l='. $_REQUEST['id_list_l'];?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" id="hien_thi">
					<img src="media/images/active_0.png"  border="0"/>
				</a>
			 <?php
			}
			?>
		</td>

		

		<td style="width:5%;">
			<a href="index.php?com=quan&act=edit&id_list_l=<?php echo $items[$i]['id_list_l']?>&id_list=<?php echo $items[$i]['id_list']?>&id_cat=<?php echo $items[$i]['id_cat']?>&id_group=<?php echo $items[$i]['id_group']?>&id=<?php echo $items[$i]['id']?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>">
				<img src="media/images/edit.png" border="0" />
			</a>
		</td>
		
		<td style="width:5%;">
			<a href="index.php?com=quan&act=delete<?php if($_REQUEST['id_cat']!='') echo "&id_cat=".$_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>&id=<?php echo $items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;">
				<img src="media/images/delete.png" border="0" />
			</a>
		</td>
	</tr>
	<?php	}?>
</table>
</form>
<a href="index.php?com=quan&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?php echo $paging['paging']?></div>