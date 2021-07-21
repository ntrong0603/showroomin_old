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

<script type="text/javascript">
function validEmail(obj) {
	var s = obj.value;
	for (var i=0; i<s.length; i++)
		if (s.charAt(i)==" "){
			return false;
		}
	var elem, elem1;
	elem=s.split("@");
	if (elem.length!=2)	return false;

	if (elem[0].length==0 || elem[1].length==0)return false;

	if (elem[1].indexOf(".")==-1)	return false;

	elem1=elem[1].split(".");
	for (var i=0; i<elem1.length; i++)
		if (elem1[i].length==0)return false;
	return true;
}//Kiem tra dang email
function IsNumeric(sText)
{
	var ValidChars = "0123456789";
	var IsNumber=true;
	var Char;

	for (i = 0; i < sText.length && IsNumber == true; i++) 
	{ 
		Char = sText.charAt(i); 
		if (ValidChars.indexOf(Char) == -1) 
		{
			IsNumber = false;
		}
	}
	return IsNumber;
}//Kiem tra dang so
function check()
		{
			var frm 	= document.frm_order;
			
			if(frm.ten.value=='') 
			{ 
				alert( "Bạn chưa điền họ tên." );
				frm.ten.focus();
				return false;
			}
			if(frm.dienthoai.value=='') 
			{ 
				alert( "Bạn chưa điền điện thoại." );
				frm.dienthoai.focus();
				return false;
			}
			if(frm.diachi.value=='') 
			{ 
				alert( "Bạn chưa điền địa chỉ." );
				frm.diachi.focus();
				return false;
			}
			
			if(frm.email.value=='') 
			{ 
				alert( "Bạn chưa điền email." );
				frm.email.focus();
				return false;
			}
			if(!validEmail(frm.email)){
				alert('Vui lòng nhập đúng địa chỉ email');
				frm.email.focus();
				return false;
			}												
			frm.submit();		
		}	
</script>
<style>

	table#tt td input.t
	{
		width:300px;
		height:20px;
		margin:3px 0px 5px 0px;
		border:1px solid #DDD;
	}
	table#tt span
	{
		color:red;
x;
	}
</style>

<div class=" noidung">
	<h1>
    <div class="bar"> 
      <span><?php echo _dathang?></span>
      
    </div>
    </h1>
    
        <div class="clearfix"></div>
        <div class="wapper_right">
    	<form name="form1" method="post">
<input type="hidden" name="pid" />
<input type="hidden" name="command" /> 
           
			<table id="giohang" border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size:11px;" width="100%">
    	<?php
			echo '<tr bgcolor="#F03226" height="25px" style="font-weight:bold;color:#fff">
				<td align="center">'._stt.'</td>
				<td>'._tensp.'</td>
				<td >Hình SP</td>
				<td align="center">'._gia.'</td>
				<td align="center">'._soluong.'</td>
				<td align="center">'._tonggia.'</td></tr>';
			if(is_array($_SESSION['cart'])){
            	
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['placeid'];
					$q=$_SESSION['cart'][$i]['qty'];		
					$pimg  = get_pro_img($pid);				
					$pname=get_place_name($pid,$lang);
					if($q==0) continue;
			?>
            		<tr bgcolor="#FFFFFF"><td width="10%" align="center" style="padding:5px;"><?php echo $i+1?></td>
            		<td width="29%"><?php echo $pname?></td>
                    <td width="20%"  style="padding:10px 0px;"><img style="width:25%;margin:auto;" src="<?php echo _upload_sanpham_l.$pimg?>"/></td>
                    <td width="17%" align="center"><?php echo number_format(get_price($pid),0, ',', '.')?>&nbsp;VNĐ</td>
                    <td width="15%" align="center"><?php echo $q?></td>                    
                    <td width="18%" align="center"><?php echo number_format(get_price($pid)*$q,0, ',', '.') ?>&nbsp;VNĐ</td>
                   
            		</tr>
            <?php					
				}
			?>
				<tr><td colspan="6" style="background:#ccc">
                <h3 style="color:#FFF601; margin:5px 0px; text-align:right;"><?php echo _tonggia?>: <?php echo number_format(get_order_total(),0, ',', '.')?>&nbsp;VNĐ</h3>
                </td></tr>
                
			<?php }
			else{
				echo "<tr bgColor='#FFFFFF'><td>"._khongcosp."</td>";
			}
			
		?>
        
        </table>				
 	<form method="post" name="frm_order" action="" enctype="multipart/form-data" onsubmit="return check();">          
    <table id="tt" width="100%" cellpadding="5" cellspacing="0" border="0" class="tablelienhe">   
      <tr>
        <td colspan="2"><b><?php echo _thongtinkhachhang?></b></td>                
      </tr>
      <tr>
        <td><?php echo _hovaten?>:<span>*</span></td>        
        <td class="input-text" ><input  type='text' placeholder='<?php echo _hovaten?>'  class="input" name="ten" id="ten" class="input" value="<?php echo $_POST['ten']?>" required /></td>
      </tr>
      <tr>
        <td><?php echo _sodienthoai?>: <span>*</span></td>
        <td class="input-text" ><input type='text'  placeholder='<?php echo _sodienthoai?>'  class="input" name="dienthoai" id="dienthoai" class="input" value="<?php echo $_POST['dienthoai']?>"  required /></td>
      </tr>
      
      <tr>
        <td><?php echo _diachi?>:<span>*</span></td>
        <td class="input-text" ><input  type='text'  placeholder='<?php echo _diachi?>'  class="input"  name="diachi"  id="diachi" class="input"  value="<?php echo $_POST['diachi']?>" required /></td>
       </tr>
       <tr>
        <td>E-mail<span>*</span></td>
        <td class="input-text" ><input type='text'   placeholder='<?php echo "E-mail";?>'  class="input" name="email" id="email" class="input"  value="<?php echo $_POST['email']?>" required /></td>
      </tr>     
      <tr>
        <td><?php echo _noidung?></td>
        <td class="input-area" ><textarea name="noidung"  class="ta_noidung" cols="50" rows="5"  required  > <?php echo _noidung?></textarea></td>
        </tr>      
           
    </table>

    <div style="text-align: right; padding-top:10%;">
      
        <input title='<?php echo _tieptuc?>' class="button" type="submit" name="next" value="<?php echo _tieptuc?>" style="cursor:pointer;"/>  
    </div>
      </form>
       
    </div><!--end noidung -->
        <div class="clearfix"></div>
	
      
</div>


