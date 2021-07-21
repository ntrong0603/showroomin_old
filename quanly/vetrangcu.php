<?php
session_start();
$_SESSION['backurl']=$_POST['url2'];
echo $_SESSION['backurl'];
?>
