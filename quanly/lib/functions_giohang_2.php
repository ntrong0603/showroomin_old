<?php
function get_product_name($pid)
{
    global $d, $row;
    $sql = "select ten from #_product where id=$pid";
    $d->query($sql);
    $row = $d->fetch_array();
    return $row['ten'];
}
function get_product_image($pid)
{
    global $d, $row;
    $sql = "select photo from table_product where id=" . $pid;
    $d->query($sql);
    $row = $d->fetch_array();
    return $row['photo'];
}
function get_price($pid)
{
    global $d, $row;
    $sql = "select gia from table_product where id=$pid";
    $d->query($sql);
    $row = $d->fetch_array();
    if ($row['gia'] != 0)
        return $row['gia'];
    else
        return 0;
}

function get_total_new_price()
{

    $sum = 0;
    foreach ($_SESSION['cart'] as $cart) {
        $pid = $cart['productid'];

        $q = $cart['qty'];

        $price = get_price($pid) * $q;
        //echo $price .'<br />';
        $sum += $price;
    }

    return $sum;
}

function remove_product($pid)
{
    $pid = intval($pid);
    $max = count($_SESSION['cart']);
    for ($i = 0; $i < $max; $i++) {
        if ($pid == $_SESSION['cart'][$i]['productid']) {
            unset($_SESSION['cart'][$i]);
            break;
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    update_GioHangTam();
}
function get_order_total()
{
    $max = count($_SESSION['cart']);
    $sum = 0;
    for ($i = 0; $i < $max; $i++) {
        $pid = $_SESSION['cart'][$i]['productid'];
        $q = $_SESSION['cart'][$i]['qty'];
        $price = get_price($pid);
        $sum += $price * $q;
    }
    return $sum;
}

function get_total()
{
    $max = count($_SESSION['cart']);
    $sum = 0;
    for ($i = 0; $i < $max; $i++) {
        $pid = $_SESSION['cart'][$i]['productid'];
        $q = $_SESSION['cart'][$i]['qty'];
        $sum += $q;
    }
    return $sum;
}


function addtocart($pid, $q)
{
    if ($pid < 1 or $q < 1) return;

    if (isset($_SESSION['cart']) && $_SESSION['id_GioHangTam'] != 0) {
        if (product_exists($pid, $q) == 0) {
            $max = count($_SESSION['cart']);
            $_SESSION['cart'][$max]['productid'] = $pid;
            $_SESSION['cart'][$max]['qty'] = $q;
            update_GioHangTam();
        }
    } else {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][0]['productid'] = $pid;
        $_SESSION['cart'][0]['qty'] = $q;
        create_GioHangTam();
    }
}
function product_exists($pid, $q)
{
    $pid = intval($pid);
    $max = count($_SESSION['cart']);
    $flag = 0;
    for ($i = 0; $i < $max; $i++) {
        if ($pid == $_SESSION['cart'][$i]['productid']) {
            $_SESSION['cart'][$i]['qty'] += $q;
            $flag = 1;
            break;
        }
    }
    return $flag;
}

function update_qty($pid, $q)
{
    $pid = intval($pid);
    $q = intval($q);
    $max = count($_SESSION['cart']);

    for ($i = 0; $i < $max; $i++) {
        if ($pid == $_SESSION['cart'][$i]['productid']) {
            $_SESSION['cart'][$i]['qty'] = $q;
            break;
        }
    }

    $_SESSION['cart'] = array_values($_SESSION['cart']);
}
/**
    Function đơn hàng tạm
 */
function create_GioHangTam()
{
    global $d;
    $array_cart_tam = json_encode($_SESSION['cart']);
    $data['ip'] = get_client_ip();
    $data['donhang'] = $array_cart_tam;
    if (isset($_SESSION['user']['id']) && $_SESSION['user']['id'] != 0) {
        $data['id_user'] = $_SESSION['user']['id'];
        $_SESSION['id_userGioHangTam'] = $_SESSION['user']['id'];
    }
    $data['ngaytao'] = time();
    $d->reset();
    $d->setTable('donhang_tam');
    $_SESSION['id_GioHangTam'] = $d->insert2($data);
}
function update_GioHangTam()
{
    global $d;
    $array_cart_tam = json_encode($_SESSION['cart']);
    $data['donhang'] = $array_cart_tam;
    if (isset($_SESSION['user']['id']) && $_SESSION['user']['id'] != 0) {
        $data['id_user'] = $_SESSION['user']['id'];
    }
    $d->reset();
    $d->setTable('donhang_tam');
    $d->setWhere('id', $_SESSION['id_GioHangTam']);
    $d->update($data);
}
function delete_GioHangTam()
{
    global $d;
    if (isset($_SESSION['id_GioHangTam']) && isset($_SESSION['id_GioHangTam']) != 0) {
        $sql = "delete from table_donhang_tam where id='" . $_SESSION['id_GioHangTam'] . "'";
        $d->query($sql);
        $_SESSION['id_GioHangTam'] = 0;
        $_SESSION['id_userGioHangTam'] = 0;
    }
}

function updateIDGioHangTam()
{
    global $d;
    if (isset($_SESSION['user']['id']) && $_SESSION['user']['id'] != 0 && isset($_SESSION['id_GioHangTam']) && isset($_SESSION['id_GioHangTam']) != 0) {
        $data['id_user'] = $_SESSION['user']['id'];
        $d->reset();
        $d->setTable('donhang_tam');
        $d->setWhere('id', $_SESSION['id_GioHangTam']);
        $d->update($data);
    }
}
function checkGioHangTam()
{
    global $d;

    if (isset($_SESSION['user']['id']) && $_SESSION['user']['id'] != 0) {
        $sql = "select * from table_donhang_tam where id_user='" . $_SESSION['user']['id'] . "'";
        $d->query($sql);
        $gioHangTam = $d->fetch_array();
        if ($gioHangTam['id'] != $_SESSION['id_GioHangTam'] || !isset($_SESSION['id_GioHangTam'])) {
            $array_giohangtam = json_decode($gioHangTam['donhang'], true);
            for ($i = 0; $i < count($array_giohangtam); $i++) {
                addtocart($array_giohangtam[$i]['productid'], $array_giohangtam[$i]['qty']);
            }
            $sql = "delete from table_donhang_tam where id='" . $gioHangTam['id'] . "'";
            $d->query($sql);
        }
    } else if ((isset($_COOKIE['id_gioHangTam']) && $_COOKIE['id_gioHangTam'] != 0)) {
        $sql = "select * from table_donhang_tam where id='" . $_COOKIE['id_gioHangTam'] . "' and id_user=0";
        $d->query($sql);
        $gioHangTam = $d->fetch_array();

        if ($gioHangTam['id'] != $_SESSION['id_GioHangTam'] || !isset($_SESSION['id_GioHangTam'])) {
            $array_giohangtam = json_decode($gioHangTam['donhang'], true);
            for ($i = 0; $i < count($array_giohangtam); $i++) {
                addtocart($array_giohangtam[$i]['productid'], $array_giohangtam[$i]['qty']);
            }
            if ($gioHangTam['id_user'] == 0) {
                $sql = "delete from table_donhang_tam where id='" . $gioHangTam['id'] . "'";
                $d->query($sql);
            }
        }
    } else {
        $sql = "select * from table_donhang_tam where ip='" . get_client_ip() . "' and id_user=0";
        $d->query($sql);
        $gioHangTam = $d->fetch_array();

        if ($gioHangTam['id'] != $_SESSION['id_GioHangTam'] || !isset($_SESSION['id_GioHangTam'])) {
            $array_giohangtam = json_decode($gioHangTam['donhang'], true);
            for ($i = 0; $i < count($array_giohangtam); $i++) {
                addtocart($array_giohangtam[$i]['productid'], $array_giohangtam[$i]['qty']);
            }
            if ($gioHangTam['id_user'] == 0) {
                $sql = "delete from table_donhang_tam where id='" . $gioHangTam['id'] . "'";
                $d->query($sql);
            }
        }
    }
}
