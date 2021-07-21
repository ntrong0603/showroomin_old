
<form action="#" method="post" name="frmLIST_place" id="frmLIST_place">
<table class="blue_table">
	<tr>
		<th style="width:5%;">Số thứ tự </th>		
 
		 <th style="width:15%;">Tên</th>                            
         <th style="width:15%;">Email</th>  
        <th style="width:5%;">Hiển thị</th>
         <th style="width:5%;">Gửi mail</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
            <input name="ids" type="hidden" id="ids">
            <input name="mod" type="hidden" id="mod">
            <input name="strID" type="hidden" id="strID">
            <input name="txtLIST_ID" type="hidden" id="txtLIST_ID" value="<?php echo $_POST['txtLIST_ID']?>">
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?php echo $i+1;?></a></td>		      
       
	    
      <td align="center" style="width:15%;">
	  <?php echo $items[$i]['ten']?>     
      </td>                      

        <td align="center" style="width:15%;">
    <?php echo $items[$i]['email']?>      
        
        </td>
        <td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
			<a href="index.php?com=khachhang&act=man&hienthi=<?php echo $items[$i]['id']?>">
				<img src="media/images/active_1.png" border="0" />
			</a>
		<?php
		}
		else
		{
		?>
         <a href="index.php?com=khachhang&act=man&hienthi=<?php echo $items[$i]['id']?>">
			<img src="media/images/active_0.png"  border="0"/>
		 </a>
         <?php
		 }?>
		 </td>
         
        <td style="width:10%">
        <a href="index.php?com=khachhang&act=guimail&id=<?php echo $items[$i]['id']?>"><img src="media/images/mail.jpg" border="0" /></a>
        
        </td> 
		<td style="width:5%;">
			<a href="index.php?com=khachhang&act=edit&id=<?php echo $items[$i]['id']?>">
				<img src="media/images/edit.png" border="0" />
			</a>
		</td>
		<td style="width:5%;">
			<a href="index.php?com=khachhang&act=delete&id=<?php echo $items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;">
				<img src="media/images/delete.png" border="0" />
			</a>
		</td>
	</tr>
	<?php	}?>
</table>
</form>
<a href="index.php?com=khachhang&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?php echo $paging['paging']?></div>