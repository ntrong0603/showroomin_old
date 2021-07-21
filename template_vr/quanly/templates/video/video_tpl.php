<h3><a href="index.php?com=video&act=add_video">Thêm Video</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>
		<th style="width:40%;">Video</th>
      <th style="width:40%;">Tên video</th>
	  <!--<th style="width:5%;">Vị trí</th>-->
        <th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$i+1?></td>
		<td align="center" style="width:40%;">
        	
			<?php
			 if($items[$i]['video']!="")
				 {
	 			?>
     <video width="150" height="100" controls="controls" > <source src="<?=_upload_video.$items[$i]['video']?>" type="video/mp4"> <object data="" width="150" height="100"> <embed width="150" height="100" src="<?=_upload_video.$items[$i]['video']?>"> </object> </video>
            
		 <?php 
         } 
         else 
         {
         echo "Chưa có video"; 
         }
         ?>
        </td>
        <td align="center" style="width:40%;"><?=$items[$i]['ten_vi']?> </td>
		<!--<td style="width:5%;"><?php if($items[$i]['vitri']==1) echo "Bên trái"; else echo "Bên phải"; ?></td>	-->	
        <td style="width:5%;">
		
        <?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=video&act=man_video&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<?php 
		}
		else
		{
		?>
         <a href="index.php?com=video&act=man_video&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>
        
        
        
        </td>
		<td style="width:5%;"><a href="index.php?com=video&act=edit_video&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:5%;"><a href="index.php?com=video&act=delete_video&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>

<a href="index.php?com=video&act=add_video"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>