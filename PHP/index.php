<?php 
    include('../PHP/connect.php');
    session_start();
    if(isset($_SESSION["check_session"])){
        $check_session = $_SESSION["check_session"];
        $check_account = $_SESSION["user_id"];
    }
    if(isset($_GET['logout'])) {
        session_destroy();
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../CSS/navigation.css">
    <link rel="icon" href="../IMG/levents-local-brand.png" type="image/png">
    <title>Levents®</title>
</head>
<body>
    <nav class="nav" id="navbar">
        <!-- Nav  top-->
        <div class="nav__top">
            <img src="../IMG/levents_logo_black.png" alt="">
            <div class="nav__top_icon">
                <ul class="nav__top_icon_list">
                    <li><a href="index.php?nav=cart" class="nav__top_icon_link"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <?php 
                        if(isset($_SESSION["check_session"])){
                            $check_session = $_SESSION["check_session"];
                            $check_account = $_SESSION["user_id"];
                            if ($check_session == true && $check_account == "admin") {
                                // Nếu là admin, hiển thị liên kết đến admin.php
                                echo '<li><a href="admin.php" class="nav__top_icon_link"><i class="fa-solid fa-user"></i></a></li>';
                            } else {
                                // Nếu không phải admin, hiển thị liên kết đến index.php?nav=account
                                echo '<li><a href="index.php?nav=account" class="nav__top_icon_link"><i class="fa-solid fa-user"></i></a></li>';
                            }
                        }else {
                            // Nếu không có session, hiển thị liên kết đến index.php?nav=login
                            echo '<li><a href="index.php?nav=login" class="nav__top_icon_link"><i class="fa-solid fa-user"></i></a></li>';
                        }
                    ?>
                </ul>
            </div>  
        </div>
        <hr>
        <!-- nav bot -->
        <div class="nav__bot">
            <ul class="nav__bot_list">
                <li><a href="index.php?nav=home" class="nav__bot_link">Trang chủ</a></li>
                <li><a href="index.php?nav=shop" class="nav__bot_link">Cửa hàng</a></li>
            </ul>
        </div>
    </nav>
    <!-- incluce main -->
    <div class="main">
        <?php
            include('../PHP/main.php');
        ?>
    </div>
    <div class="line"></div>
    <div class="footer">
        <div class="footer_introduce">
            <h4>GIỚI THIỆU</h4>
            <p>Levents® trang mua sắm trực tuyến thời trang STREETWEAR giúp bạn tiếp cận xu hướng mới nhất.</p>
        </div>
        <div class="footer_info">
            <h4>LIÊN HỆ</h4>
            <p><i class="fa-solid fa-phone">&nbsp</i>1900 633 028</p>
            <p><i class="fa-solid fa-envelope">&nbsp</i>Customercare@levents.asia</p>
        </div>
        <div class="footer_contact">
            <h4>LIÊN KẾT</h4>
            <p>Sản phẩm khuyến mãi</p>
            <p>Sản phẩm nổi bật</p>
            <p>T-SHIRTS</p>
            <p>HOODIE</p>
            <P>POLO</P>
        </div>
        <div class="footer_address">
            <h4>CỬA HÀNG</h4>
            <p><i class="fa-solid fa-map-location-dot">&nbsp</i>139E Nguyễn Trãi, Phường Bến Thành, Quận 1, HCM.</p>
            <p><i class="fa-solid fa-map-location-dot">&nbsp</i>842 Sư Vạn Hạnh, Phường 12, Quận 10, HCM.</p>
            <p><i class="fa-solid fa-map-location-dot">&nbsp</i>The new Playground, 04, Quận 1, HCM.</p>
            <p><i class="fa-solid fa-map-location-dot">&nbsp</i>54, Mậu Thân, Phường Xuân Khánh, Quận Ninh Kiều, Cần Thơ.</p>
            <p></p>
        </div>
    </div>
    <script src="../JS/navigation.js"></script>
</body>
</html>