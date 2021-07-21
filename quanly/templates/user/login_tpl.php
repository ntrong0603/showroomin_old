<script language="javascript">
function js_lost_pw(){
	window.location = '<?php echo @$lost_password_url?>';
}
</script>



<div align="center">




<form action="index.php?com=user&act=login" method="post" class="nhaplieu" id="login">
<table width="500" cellpadding="0" cellspacing="0" border="0" bgcolor="#6699CC" align="center">
<tr>
<td colspan="2" align="center" valign="middle" height="35"><img src="media/images/dangnhapht.jpg" /></td>
</tr>
<tr>
<td style="padding:10px;">
<table width="100%" cellpadding="0" cellspacing="0" border="0"  bgcolor="#FFFFFF">

<tr>

<td width="33%" align="right">

	<strong>Tên đăng nhập</strong></td>
<td width="37%" height="30" align="left">
	<input type="text" name="username" class="input" style="width:100px;" /></td>
<td width="30%" rowspan="3" align="left"><img src="media/images/j_login_lock.jpg" /></td>
</tr>
<tr><td align="right">	
 	<strong>Mật khẩu</strong>
    </td>
<td align="left">
	<input type="password" name="password" class="input" style="width:100px;" /></td>
</tr>

<!--	<b>Nhớ mật khẩu</b>
	<input type="checkbox" name="remember"/><br> -->	
<tr><td colspan="2" align="center">
	<input type="submit" value="Đăng nhập" class="btn" /></td>
  </tr>
</table></td>
</tr>
</table>
<!--	<input type="button" value="Quên mật khẩu" class="btn" onclick="js_lost_pw()" /> -->

</form>

</div>

