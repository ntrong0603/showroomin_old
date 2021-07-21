<?php
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_giohang($_REQUEST['pid']);
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
		if(confirm('Do you really mean to delete this item ???')){
			document.formgh.pid.value=pid;
			document.formgh.command.value='delete';
			document.formgh.submit();
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
<div class="clearfix"></div>
<div class="hei7"></div>
<div style="width:87%; height:auto; margin:0 auto; ">
    <div class="col-md-3 nopad">
   		<?php include _template."layout/left.php";?>
   </div>
   <div class="col-md-9" >
   		<div class="bar"><a href="index"><?php echo _trangchu?>> </a> <h1> &nbsp; <?php echo _donhangcuaban?></h1></div>
   		
            <div class="clearfix"></div>
            <form name="formgh" method="post">
            <input type="hidden" name="pid" />
            <input type="hidden" name="command" />
            </form> 
            <div class="noidung">
            <?php
			$d->reset();
			$d->setTable('donhang');
			$d->setWhere('id_user',$_SESSION['user']['id']);
			$d->select();
			$user_donhang=$d->result_array();
			for($j= 0 ;$j <count($user_donhang);$j++){
			?>
           	<div class="ngaydat"><span class="ngay"><?php echo make_date($user_donhang[$j]['ngaytao'])?></span><span class="trangthai"><?php if($user_donhang[$j]['tinhtrang']==1) echo _moidat; else if($user_donhang[$j]['tinhtrang']==2)
			 echo _daxacnhan; else if($user_donhang[$j]['tinhtrang']==3) echo _danggiaohang; if($user_donhang[$j]['tinhtrang']==4) echo _dagiao;?></span></div>
            
            <table id="giohang" border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;" width="100%">
            
    	<?php $d->reset();
		$d->setTable('giohang');
		$d->setWhere('id_cart',$user_donhang[$j]['id']);
		$d->select();
		$giohang=$d->result_array();
			if(count($giohang)){
            	echo '<tr height="25px" bgcolor="#127EA5" style="font-weight:bold;color:#FFF"><td align="center">'._stt.'</td><td>'._ten.' tour</td><td align="center">'._gia.'</td><td align="center">'._soluong.'</td><td align="center">'._tonggia.'</td><td align="center">'._xoa.'</td></tr>';
				$max=count($giohang);
				for($i=0;$i<$max;$i++){
					$pid=$giohang[$i]['pid'];
					$q=$giohang[$i]['soluong'];				
					$pname=$giohang[$i]['ten'];	

					if($q==0) continue;
			?>
            		<tr bgcolor="#FFFFFF" >
                    <td width="10%" class="td_padding" align="center"><?php echo $i+1?></td>
            		<td width="29%"><?php echo $pname?></td>
                    <td width="20%" align="center"><?php echo number_format($giohang[$i]['gia'],0, ',', '.')?>&nbsp;VNĐ</td>
                    <td width="14%" align="center"><?php echo $q?></td>                    
                    <td width="17%" align="center"><?php echo number_format($giohang[$i]['gia']*$q,0, ',', '.')?>&nbsp;VNĐ</td>                   <td width="10%" align="center"><a href="javascript:del(<?php echo $giohang[$i]['id'];?>)"><img src="images/delete.gif" border="0" /></a></td>
            		</tr>
            <?php }
			?>
				<tr><td colspan="5">
              <table width="100%" cellpadding="0" cellspacing="0" border="0">
              <tr>
              <td>  
                <?php 
				$tong = 0;
				for($i=0;$i<$max;$i++){
					$tong = $tong+ ($giohang[$i]['soluong'] * $giohang[$i]['gia']);
					}
				?>
                <h3 style="color:red; line-height:25px;padding:5px 0px;text-align:right;"><?php echo _tonggia?>: <?php echo number_format($tong,0, ',', '.')?>&nbsp;VNĐ</h3></td>
              <td colspan="5" align="right">&nbsp;</td>
             </tr>
             </table>   
                </td></tr>
			<?php }
			else{
				echo "<tr bgColor='#FFFFFF'><td>"._khongcosp."</td>";
			}
		?>
        </table>
         	<?php }?>
       </div>
   </div></div>
<div class="clearfix"></div> <div class="hei7"></div>


   <style>
   
   </style>