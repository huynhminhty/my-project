<?php
    // login
    if (isset($_SESSION['error_message'])) {
        $errorMessage = $_SESSION['error_message'];
        unset($_SESSION['error_message']); // Xóa thông báo lỗi

        echo '<script>alert("' . $errorMessage . '");</script>';
    }
    // register
    if (isset($_COOKIE['error_message'])) {
        $errorMessage = $_COOKIE['error_message'];
        setcookie("error_message", "", time() - 3600, "/"); // Xóa cookie
    
        echo '<script>alert("' . $errorMessage . '");</script>';
    }
?>
<head>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
    <div class="container_login">
        <div class="login">
            <form action="login_handling.php" id="" method="get">
                <p>ĐĂNG NHẬP</p>
                <div class="form">                
                    <input type="text" name="user_name" class="form__inp" placeholder="Email">
                    <input type="password" name="user_pass" class="form__inp" placeholder="Mật khẩu">
                    <div class="form__bot">
                        <!-- <a href="" class="form__link" style="padding: 10px 30px;">
                            Quên mật khẩu ?
                        </a> -->
                        <input type="submit" class="input_submit" name="login_user" value="Đăng nhập"></input>
                    </div>
                </div>
            </form>
        </div>
        <div class="register">
            <form action="login_handling.php" id="registerForm" method="get">
                <p>TẠO TÀI KHOẢN</p>
                <div class="form">
                    <input type="text" name="register_name" class="form__inp" placeholder="Họ và tên">
                    <input type="email" name="register_email" class="form__inp" placeholder="Email">
                    <input type="tel" name="register_phone" minlength="10" maxlength="10" class="form__inp" placeholder="Số điện thoại">
                    <input type="password" name="register_pass" class="form__inp" placeholder="Mật khẩu">
                    <input type="password" name="register_repass" class="form__inp" placeholder="Xác nhận mật khẩu">
                    <div class="form__bot form__mb m-cus-btn-f-register"> 
                        <input type="submit" class="input_submit" name="register_user" value="Tạo"></input>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 5000); // 5 giây sau đó ẩn thông điệp lỗi
            }
        });
    </script> -->
</body>
</html> 