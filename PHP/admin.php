<?php
    session_start();
    if(isset($_SESSION["check_session"])){
        $check_session = $_SESSION["check_session"];
        // $check_account = $_SESSION["user_id"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../CSS/admin.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="icon" href="../IMG/levents-local-brand.png" type="image/png">
    <title>Levents® - Admin</title>
<body>
    <div class="container_all_admin">
        <div class="container_left">
            <div class="intro">
                <a href="index.php">
                    <img src="../IMG/levents_logo_black.png" alt="">
                </a>
                <p>ADMIN</p>
            </div>
            <hr>    
            <ul class="list_navigation">
                <li><a href="admin.php?admin=home" class="link_admin">Trang chủ</a></li>
                <li><a href="admin.php?admin=product" class="link_admin">Danh mục sản phẩm</a></li>
                <li><a href="admin.php?admin=bill" class="link_admin">Hoá đơn</a></li>
                <li><a href="admin.php?admin=account" class="link_admin">Quản lý tài khoản</a></li>
            </ul>
            <hr>
            <div class="intro">
                <ul class="list_navigation">
                    <li><a href="index.php?logout=<?php echo $check_session ?>" class="link_admin">Đăng Xuất</a></li>
                </ul>  
            </div>
        </div>
        <div class="container_right">
            <?php
            // lưu biến chuyển
                 if(isset($_GET['admin'])){
                     $transfer_admin = $_GET['admin'];
                 }else{
                     $transfer_admin = "";
                     include('admin/home_admin.php');
                 }
             // xử lý chuyển trang
                 if($transfer_admin == 'home'){
                     include('admin/home_admin.php');
                 }elseif($transfer_admin == 'product'){
                     include('admin/product_admin.php');
                 }elseif($transfer_admin == 'add_product'){
                    include('admin/add_product.php');
                 }elseif($transfer_admin == 'update_product'){
                    include('admin/update_product_admint.php');
                 }elseif($transfer_admin == 'account'){
                    include('admin/account_admin.php');
                 }elseif($transfer_admin == 'bill'){
                    include('admin/bill_admin.php');
                 }elseif($transfer_admin == 'detail_bill'){
                    include('admin/detail_bill.php');
                 }
            ?>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'info_product');
    </script>
</body>
</html> 