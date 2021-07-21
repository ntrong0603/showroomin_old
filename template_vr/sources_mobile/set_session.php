<?php 
session_start ();
$val_session = $_POST['val_session'];
$_SESSION['thanhtoan_popup'] = $val_session;
?>