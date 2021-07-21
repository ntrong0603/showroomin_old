<h3><a href="index.php?com=fanpage&act=add">Fanpage</a></h3>


<form action="#" method="post" name="frmLIST_place" id="frmLIST_place">
<table class="blue_table">
	<tr>
		 <th style="width:30%;">Tên fanpage</th>                            
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
            <input name="ids" type="hidden" id="ids">
            <input name="mod" type="hidden" id="mod">
            <input name="strID" type="hidden" id="strID">
            <input name="txtLIST_ID" type="hidden" id="txtLIST_ID" value="<?php echo $_POST['txtLIST_ID']?>">
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
      <td align="center" style="width:35%;">
	 <a href="index.php?com=fanpage&act=edit" style="text-decoration:none;">
	  <?php echo $items[$i]['fanpage_name']?> 
      </a>    
      </td>                      
         
		<td style="width:5%;">
			<a href="index.php?com=fanpage&act=edit">
				<img src="media/images/edit.png" border="0" />
			</a>
		</td>
		<td style="width:5%;">
			<a href="index.php?com=fanpage&act=delete" onClick="if(!confirm('Xác nhận xóa')) return false;">
				<img src="media/images/delete.png" border="0" />
			</a>
		</td>
	</tr>
	<?php	}?>
</table>
</form>
<?php
	if(count($items)==0)
	{
?>
<a href="index.php?com=fanpage&act=add"><img src="media/images/add.jpg" border="0"  /></a>

<?php
	}
	
?>
