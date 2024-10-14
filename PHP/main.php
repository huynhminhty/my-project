<?php
// lưu biến chuyển
    if(isset($_GET['nav'])){
        $transfer = $_GET['nav'];
    }else{
        $transfer = "";
        include('main/home.php');
    }
// xử lý chuyển trang
    if($transfer == 'home'){
        include('main/home.php');
    }elseif ($transfer == 'shop') {
        include('main/shop.php');
    }elseif ($transfer == 'detail') {
        include('main/detail.php');
    }elseif ($transfer == 'login') {
        include('main/login.php');
    }elseif ($transfer == 'cart') {
        include('main/cart.php');
    }elseif ($transfer == 'account') {
        include('main/account.php');
    }elseif ($transfer == 'order') {
        include('main/order.php');
    }
?>