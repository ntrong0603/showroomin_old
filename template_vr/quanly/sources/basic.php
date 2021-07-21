<?php
$d->reset();
$d->setTable('user');
$d->setWhere('username',$_SESSION['login']['username']);
$d->select();
$user=$d->fetch_array();
$d->reset();

?>