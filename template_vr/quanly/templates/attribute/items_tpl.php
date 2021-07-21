<h3><a href="index.php?com=attribute&act=add">Thêm tin thuộc tính</a></h3>


<form action="#" method="post" name="frmLIST_PRODUCT" id="frmLIST_PRODUCT">
<table class="blue_table">
	<tr>	
		<th style="width:30%;">Tên Attribute</th>                         
        <th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
        <input name="ids" type="hidden" id="ids">
        <input name="mod" type="hidden" id="mod">
        <input name="strID" type="hidden" id="strID">
        <input name="txtLIST_ID" type="hidden" id="txtLIST_ID" value="<?=$_POST['txtLIST_ID']?>">
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		  <td align="center" style="width:35%;">
		  	<a href="index.php?com=attribute&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;">
		  		<?=$items[$i]['mota_vi']?> 
		  	</a>      
		  </td>                      
         
        <td style="width:5%;">
		<?php 
			if(@$items[$i]['hienthi']==1)
			{
			?>
        
        		<a href="index.php?com=attribute&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_danhmuc']!='') echo'&id_danhmuc='. $_REQUEST['id_danhmuc'];?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
			<?php 
			}
			else
			{
			?>
         		<a href="index.php?com=attribute&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_danhmuc']!='') echo'&id_danhmuc='. $_REQUEST['id_danhmuc'];?><?php if($_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         	<?php
		 	}?>        
		 </td>
         
		<td style="width:5%;">
			<a href="index.php?com=attribute&act=edit&id_danhmuc=<?=$items[$i]['id_danhmuc']?>&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>">
				<img src="media/images/edit.png" border="0" />
			</a>
		</td>
		
		<td style="width:5%;">
			<a href="index.php?com=attribute&act=delete<?php if($_REQUEST['id_cat']!='') echo "&id_cat=".$_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;">
				<img src="media/images/delete.png" border="0" />
			</a>
		</td>
	</tr>
	<?php	}?>
</table>
</form>
<a href="index.php?com=attribute&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>