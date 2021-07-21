<?php
$d->reset();
$d->setTable('baiviet');
$d->setWhere('loaitin',$com);
$d->select();
$baiviet=$d->fetch_array();
$title = $baiviet['title'];
$description = $baiviet['description'];
$keyword = $baiviet['keywords'];
$title_bar = $baiviet['ten'.$lang];

?>