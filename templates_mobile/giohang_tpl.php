<?php
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_place($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['placeid'];
			$q=intval($_REQUEST['place'.$pid]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	}
?>
<script language="javascript">
	function del(pid){
		if(confirm('Do you really mean to delete this item')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}
	
	function goBack()
	  {
	  window.history.back()
	  }
</script>
<div class=" noidung">
	<h1>
    <div class="bar"> 
      <span> <?php echo _giohang?></span>
      
    </div>
    </h1>
    
        <div class="clearfix"></div>
        <div class="">
            <form name="form1" method="post">
<input type="hidden" name="pid" />
<input type="hidden" name="command" /> 
				<table id="giohang" border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;" width="100%">
    	<?php if(is_array($_SESSION['cart'])){
            	echo '<tr bgcolor="#F03226" height="25px" style="font-weight:bold;color:#FFF601">
				<td align="center">'._stt.'</td>
				<td>'._tensp.'</td>
				<td >Hình SP</td>
				<td align="center">'._gia.'</td>
				<td align="center">'._soluong.'</td>
				<td align="center">'._tonggia.'</td><td align="center">'._xoa.'</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['placeid'];
					$q=$_SESSION['cart'][$i]['qty'];		
					$pimg  = get_pro_img($pid);			
					$pname=get_place_name($pid,$lang);
					if($q==0) continue;
			?>
            		<tr bgcolor="#FFFFFF"><td width="10%" align="center" style="padding:5px"><?php echo $i+1?></td>
            		<td width="20%"><?php echo $pname?></td>
                    <td width="20%"  style="padding:10px 0px;"><img style="width:25%;margin:auto;" src="<?php echo _upload_sanpham_l.$pimg?>"/></td>
                    <td width="17%" align="center"><?php echo number_format(get_price($pid),0, ',', '.')?>&nbsp;VNĐ</td>
                    <td width="15%" align="center"><input type="text" name="place<?php echo $pid?>" value="<?php echo $q?>" maxlength="3" size="2" style="text-align:center; border:1px solid #F0F0F0" />&nbsp;</td>                    
                    <td width="10%" align="center"><?php echo number_format(get_price($pid)*$q,0, ',', '.') ?>&nbsp;VNĐ</td>
                    <td width="10%" align="center"><a href="javascript:del(<?php echo $pid?>)"><img src="images/delete.gif" border="0" /></a></td>
            		</tr>
            <?php }
			?>
				<tr><td colspan="7" style="background:#ccc ">
                <h3 style="color:#FFF601; margin:5px 0px; text-align:right;"><?php echo _tonggia?>: <?php echo number_format(get_order_total(),0, ',', '.')?>&nbsp;VNĐ</h3>
                </td></tr>
                <tr>
                	<td colspan="6" align="right">
                     <input class="button" type="button" value="<?php echo _muatiep?>" onclick="window.location='http://<?php echo $config_url?>/san-pham'" class="button">
                <input class="button" type="button" value="<?php echo _xoatatca?>" onclick="clear_cart()" class="button">
                <input class="button" type="button" value="<?php echo _capnhat?>" onclick="update_cart()" class="button">
                <input class="button" type="button" value="<?php echo _thanhtoan?>" onclick="window.location='http://<?php echo $config_url?>/thanh-toan'" class="button">
                    </td>
                </tr>
			<?php }
			else{
				echo "<tr bgColor='#FFFFFF'><td>"._khongcosp."</td>";
			}
		?>
        </table>			
  </form>
            </div><!--end noidung -->
        <div class="clearfix"></div>
	
      
</div>






   <style>
   
   </style>