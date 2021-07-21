<?php

session_start();

$session = session_id();

date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once  "Mobile-Detect/Mobile_Detect.php";
$mobile = '';
$detect = new Mobile_Detect;
if ($detect->isMobile() ||  $detect->isTablet()) { //
    $mobile = '_mobile';
    @define('_template', './templates_mobile/');
} else {
    @define('_template', './templates/');
}
@define('_source', './sources/');
@define('_lib', './quanly/lib/');

if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = '';
}

$lang = $_SESSION['lang'];

if (!isset($_SESSION['id_GioHangTam'])) {
    $_SESSION['id_GioHangTam'] = 0;
}
if (!isset($_SESSION['id_userGioHangTam'])) {
    $_SESSION['id_userGioHangTam'] = 0;
}

include_once _template . "lang/lang$lang.php";

include_once _lib . "config.php";
include_once _lib . "constant.php";
include_once _lib . "class.database.php";
include_once _lib . "functions.php";
include_once _lib . "functions_giohang_2.php";
function get_main_danhmuc($d, $idparent = 0, $iddmuc = '')
{
    $dmuc = get_danhmucdacap($d, $idparent);
    $str = '';
    for ($i = 0; $i < count($dmuc); $i++) {
        if ($iddmuc != '' && $dmuc[$i]["id"] == $iddmuc) {
            $str .= '<option value=' . $dmuc[$i]["id"] . ' selected>' . $dmuc[$i]["ten"] . '</option>';
        } else {
            $str .= '<option value=' . $dmuc[$i]["id"] . ' >' . $dmuc[$i]["ten"] . '</option>';
        }
    }
    return $str;
}
include_once _lib . "file_requick.php";
//login
/*
include 'vendor/autoload.php';
include 'config2.php';

use Hybridauth\Hybridauth;

$hybridauth = new Hybridauth($config2);
$adapters = $hybridauth->getConnectedAdapters();*/
//===========================================endlogin
if ($template == 'place3') {
    $_SESSION['active'] = 'active';
} else {
    if ($template == 'place_detail' and $_SESSION['active'] == 'active') {
    } else {
        $_SESSION['active'] = '';
    }
}
if (@$_REQUEST['command'] == 'add' && $_REQUEST['placeid'] > 0) {
    $pid = $_REQUEST['placeid'];
    $com = $_REQUEST['com'];
    addtocart($pid, 1, $com);

    redirect("gio-hang.html");
}
//print_r($_SESSION);

checkGioHangTam();

setcookie('id_userGioHangTam', $_SESSION['id_userGioHangTam'], time() + 144000);
setcookie('id_gioHangTam', $_SESSION['id_GioHangTam'], time() + 144000);

if (isset($_SESSION['user']['id']) && $_SESSION['user']['id'] != 0) {
    updateIDGioHangTam();
}

?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang='vi' class="">

<head>

    <base href="<?php echo BASE_URL; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-105253669-5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-105253669-5');
    </script>

    <link href="./images/favicon.png" rel="shortcut icon" type="image/x-icon">
    <meta name="keywords" content="<?php if ($keyword == '') {
                                        if ($title_bar == '') {
                                            echo $row_title['keywords'];
                                        } else {
                                            echo $title_bar;
                                        }
                                    } else {
                                        echo $keyword;
                                    } ?>" />
    <meta name="description" content="<?php if ($description == '') {
                                            if ($title_bar == '') {
                                                echo $row_title['description'];
                                            } else {
                                                echo $title_bar;
                                            }
                                        } else {
                                            echo $description;
                                        } ?>" />


    <title><?php if ($title == '') {
                if ($title_bar == '') {
                    echo $row_title['ten'];
                } else {
                    echo $title_bar;
                }
            } else {
                echo $title;
            }
            ?>
    </title>
    <?php echo $meta['ten']; ?>
    <link rel="alternate" type="application/rss+xml" title="rss-feeds" href="./Feeds/">
    <link href="/upload/hinhanh/favicon.png" rel="shortcut icon" type="image/x-icon">

    <meta name="robots" content="index,follow">

    <meta content="global" name="distribution">
    <meta content="general" name="rating">
    <meta name="format-detection" content="telephone=no">

    <!--=============================-->

    <meta property="og:type" content="website" />

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="<?php if ($description == '') {
                                                    if ($title_bar == '') {
                                                        echo $row_title['description'];
                                                    } else {
                                                        echo $title_bar;
                                                    }
                                                } else {
                                                    echo $description;
                                                } ?>" />
    <meta name="twitter:title" content="<?php echo $title; ?>" />
    <meta property="fb:app_id" content="474961352686794" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:title" content="<?php if ($title == '') {
                                            if ($title_bar == '') {
                                                echo $row_title['ten'];
                                            } else {
                                                echo $title_bar;
                                            }
                                        } else {
                                            echo $title;
                                        }
                                        ?>">
    <meta property="og:site_name" content="<?php echo $title; ?>">
    <meta property="og:url" content="https://<?= $_SERVER['SERVER_NAME']; ?><?= $_SERVER['REQUEST_URI'] ?>">
    <meta property="og:description" content="<?php if ($description == '') {
                                                    if ($title_bar == '') {
                                                        echo $row_title['description'];
                                                    } else {
                                                        echo $title_bar;
                                                    }
                                                } else {
                                                    echo $description;
                                                } ?>">
    <?php if (isset($seo_image)) { ?>
        <meta property="og:image" content="<?php echo $seo_image; ?>">
    <?php } ?>
    <link rel="alternate" href="<?php $full_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI];
                                echo $full_url; ?>" hreflang="vi-vn" />
    <meta property="og:type" content="article">
    <meta property="article:publisher" content="<?php echo $setting['ten']; ?>">
    <meta property="article:author" content="<?php echo $setting['ten']; ?>">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin-top: 20px;
        }
    </style>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./css/bootstrap-rating.js"></script>
    <script src="./css/jquery.lockfixed.js"></script>




    <link href="./css/ionicons.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" id="camera-css" href="css/camera.css" type="text/css" media="all">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css<?php echo $mobile; ?>/style.css" rel="stylesheet">
    <link href="css/bootstrap-rating.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet">
    <!--<link href="css/theme.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="css/skins/tango/skin.css" />

    <link href="css/docs.css" rel="stylesheet">
    <link href="js/google-code-prettify/prettify.css" rel="stylesheet">

    <style>
        .carousel-inner>.item>img,
        .carousel-inner>.item>a>img {
            width: 70%;
            margin: auto;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <script type="text/javascript" src="slick/slick.min.js"></script>


    <?php if (isset($_GET['sp'])) { ?>
        <script>
            var id_sp_vr = <?php echo $_GET['sp'] ?>;
        </script>
    <?php } else { ?>
        <script>
            var id_sp_vr = 0;
        </script>
    <?php } ?>
    <?php if (isset($_GET['c'])) { ?>
        <script>
            var id_dm_vr = <?php echo $_GET['c'] ?>;
        </script>
    <?php } else { ?>
        <script>
            var id_dm_vr = 0;
        </script>
    <?php } ?>

    <script src="./js/main_vr<?php echo $mobile; ?>.js"></script>
    <?php if (isset($_SESSION['thanhtoan_popup'])) { ?>
        <script>
            var o_ThanhToan = <?php echo $_SESSION['thanhtoan_popup']; ?>;
        </script>
    <?php } ?>

    <script>
        $(document).ready(function() {

            capnhatslsp();
        })

        function capnhatinMainPage() {
            capnhatslsp();
        }
    </script>
    <?php if ($mobile == '') {
        if ($template == 'index') { ?>
            <style>
                #search-form .form-control {
                    height: 60px;
                    font-size: 16px;
                }
            </style>

        <?php    } else { ?>
            <style>
                #search-form .form-control {
                    height: 50px;
                    font-size: 14px;
                }

                #btn-submit {
                    height: 50px !important;
                }
            </style>
        <?php }
    } else { ?>
        <script>
            $(document).ready(function() {

                khung = 1;
                $('body').on('click', '#icon-go-up', function() {

                    $("html, body").animate({
                        scrollTop: (khung - 2) * $(window).height()
                    }, "slow");
                    if (khung > 1) {
                        khung = khung - 1;
                    }

                })
                $('body').on('click', '#icon-go-down', function() {


                    $("html, body").animate({
                        scrollTop: khung * $(window).height()
                    }, "slow");
                    khung = khung + 1;


                })
            })
        </script>
        <div id='' class='scroll-icon'>
            <img id="icon-go-up" src='./images/icon-go-up.svg' alt='' title='Go up' />
            <img id="icon-go-down" src='./images/icon-go-down.svg' alt='' title='Go down' />
        </div>
    <?php } ?>

<body>
    <!--<img src='banner.png' alt='' title='Coming soon!!' style='width: 100%;' />-->

    <?php include _template . "layout/header.php"; ?>
    <?php include _template . $template . "_tpl.php"; ?>
    <?php include _template . "layout/footer.php"; ?>

    <?php
    @define('_templates_vr', 'template_vr/templates' . $mobile . '/');
    @define('_source_vr', 'template_vr/sources' . $mobile . '/');
    ?>
    <link href="css<?php echo $mobile; ?>/style_danhmuc_vr.css" rel="stylesheet">
    <div id='popup1'>
        <?php include _templates_vr . "gianhang.php"; ?>
    </div>

    <div id="popup2">
        <?php include _templates_vr . "giohang.php"; ?>
    </div>
    <div id="popup3">
        <?php include _templates_vr . "dathang.php"; ?>
    </div>
    <div id="popup4">
        <?php include _templates_vr . "chitietsanpham.php"; ?>
    </div>
    <div id="popup5">
        <?php include _templates_vr . "concept.php"; ?>
    </div>

    <script src="/js/bootstrap.min.js"></script>

</body>

</html>