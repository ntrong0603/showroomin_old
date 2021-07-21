
<form action="#" method="post" name="frmLIST_PRODUCT" id="frmLIST_PRODUCT">
<table class="blue_table">
	<tr>
		<th style="width:5%;">STT</th>		
        <th style="width:10%;">Họ tên</th>
        <th style="width:10%;">Email</th>
        <th style="width:10%;">Tên sản phẩm</th>
        <th style="width:25%;">Nội dung</th>
		<th style="width:5%;">Hiển thị</th>
        <th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
            <input name="ids" type="hidden" id="ids">
            <input name="mod" type="hidden" id="mod">
            <input name="strID" type="hidden" id="strID">
            <input name="txtLIST_ID" type="hidden" id="txtLIST_ID" value="<?=$_POST['txtLIST_ID']?>">
	</tr>
	<?php
        for($i=0, $count=count($items); $i<$count; $i++){
        $id_product = $items[$i]['id_product'];
    ?>
	<tr>
		<td style="width:5%;">
		    <?=$i?>
		</td>	
		
		

		<td style="width:5%;">
            <?=$items[$i]['name']?>
		</td>
        
        <td style="width:5%;">
            <?=$items[$i]['email']?>
        </td>
		<td style="width:5%;">
            <?php
            $d->reset();
            $sql = "select * from table_product where id =$id_product";
            $d->query($sql);
            $result_name_product = $d->result_array();
            ?>
			<?=$result_name_product[0]['ten_vi']?>
		</td>

		<td align="center" style="width:15%;">
           <?=$items[$i]['content']?>
		</td>   	
		<td style="width:5%;" id="hienthi">
			<?php 
			if(@$items[$i]['show']==1)
			{
			?>
				<a href="index.php?com=productComments&act=man&assent=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" id="hien_thi">
					<img src="media/images/active_1.png" border="0" />
				</a>
			<?php 
			
			}
			else
			{
			?>
				<a href="index.php?com=productComments&act=man&assent=<?=$items[$i]['id']?>" id="hien_thi">
					<img src="media/images/active_0.png"  border="0"/>
				</a>
			 <?php
			}
			?>
		</td>
        <td style="width:5%;">
            <a href="index.php?com=productComments&act=edit&id=<?=$items[$i]['id']?>" id="edit">
                <img src="media/images/edit.png" border="0" />
            </a>
        </td>
		<td style="width:5%;">
			<a href="index.php?com=productComments&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;">
				<img src="media/images/delete.png" border="0" />
			</a>
		</td>
	</tr>
	<?php	}?>
</table>
</form>
<div class="paging"><?=$paging['paging']?></div>