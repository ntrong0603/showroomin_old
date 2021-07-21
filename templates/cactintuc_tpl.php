<?php
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_tin($_REQUEST['pid']);
		redirect("quan-tri/cac-tin-tuc");
	}
else if($_REQUEST['command']=='clear' && $_REQUEST['pid'] == 0){
		remove_all_tin($_SESSION['user']['id']);
		redirect("quan-tri/cac-tin-tuc");
}
	
?>
<script language="javascript">
	function del(pid){
		if(confirm('Bạn có chắc xóa sản phẩm này không ?')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('Bạn có chắc muốn xóa hết các tin đã đăng?')){
			document.form1.command.value='clear';
			document.form1.pid.value=0;
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
<div class="title_left"><?php echo $title_bar;?></div>
<div class="clear"></div>
<div class="wapper">
	
    <div class="wapper_right">
    	
        <div class="wapper_content">
        	
            <div class="noidung">
            <form name="form1" method="post">
<input type="hidden" name="pid" />
<input type="hidden" name="command" /> 
				<table id="giohang" border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;" width="100%">
                <tr bgcolor="#4CBF02" height="25px" style="font-weight:bold;color:#fff;text-transform:uppercase;">
				<td align="center">STT</td>
				<td align="center">Tên tin</td>
                <td align="center">Ngày đăng</td>
                <td align="center">Sữa</td>
				<td align="center">Xóa</td>
                </tr>
    	<?php if(count($place_tin)>0){
            	
				$max=count($place_tin);
				
				for($i=0;$i<$max;$i++){
				
			?>
            		<tr bgcolor="#eee">
                    <td width="10%" align="center" style="padding:5px;"><?php echo $i+1?></td>
            		<td width="29%"  style="padding:5px;"><?php echo $place_tin[$i]['ten']?></td>
                                     
                    <td width="18%" align="center"  style="padding:5px;"><?php echo make_date($place_tin[$i]['ngaytao'])?></td>
                    
                    <td width="10%" align="center"  style="padding:5px;">
                    <a href="dang-tin/<?php echo $place_tin[$i]['id']?>"><img src="images/edit1.png" border="0" />
                    </a></td>
                    
                    <td width="10%" align="center"  style="padding:5px;">
                    <a href="javascript:del(<?php echo $place_tin[$i]['id']?>)"><img src="images/delete.gif" border="0" />
                    </a></td>
                    
            		</tr>
            <?php }
			?>
				
                <tr>
                	<td colspan="4" align="right" style="padding-top:10px;">
                  
                <input class="btn_search" type="button" value="<?php echo _xoatatca?>" onclick="clear_cart()" class="button">
                
                    </td>
                </tr>
			<?php }
			else{
				echo "<tr bgColor='#FFFFFF'><td style='padding-top:10px;'>Bạn không có tin tức nào đã đăng</td>";
			}
		?>
        </table>			
  </form>
            </div><!--end noidung -->
        </div>
    </div><!--end wapper right -->
    <div class="clear"></div>
    
    

</div>

   <style>
   
   </style>