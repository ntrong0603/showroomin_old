<?php
//qlogo
$d->reset();
$d->setTable('photo');
$d->setWhere('com','banner_top');
$d->select();
$logo = $d->fetch_array();

//qlogo mobile
$d->reset();
$d->setTable('photo');
$d->setWhere('com','banner_top_mobile');
$d->select();
$logo_mobile = $d->fetch_array();

//setting
$d->reset();
$d->setTable('hotline');
$d->select();
$setting=$d->fetch_array();
//title
$d->reset();
$d->setTable('title');
$d->select();
$row_setting=$d->fetch_array();
$title=$row_setting['ten'];
$keywords=$row_setting['keywords'];
$description=$row_setting['description'];

//Google Analytics
$d->reset();
$d->setTable('khaibao');
$d->select();
$khaibao=$d->fetch_array();

//danhmucc1
$d->reset();
$d->setTable('news_danhmuc');
$d->setWhere('hienthi',1);
$d->setOrder("stt");
$d->select();
$danhmucc1=$d->result_array();

//qlogo mobile
$d->reset();
$d->setTable('photo');
$d->setWhere('com','banner_footer');
$d->select();
$banner_footer = $d->fetch_array();
?>