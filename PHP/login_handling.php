<?php
    session_start(); // Bắt đầu phiên làm việc
    include('../PHP/connect.php');
    // Chức năng đăng ký
// Kiểm tra xem biểu mẫu đã được gửi đi hay chưa
    if (isset($_GET['register_user'])) {
        // Lấy dữ liệu từ biểu mẫu
        $name = $_GET['register_name'];
        $email = $_GET['register_email'];
        $phone = $_GET['register_phone'];
        $password = $_GET['register_pass'];
        $repassword = $_GET['register_repass'];

        // Kiểm tra xem mật khẩu và xác nhận mật khẩu có khớp nhau hay không
        if ($name == "" || $email == "" || $phone == "" || $password == "" || $repassword == "") {
            setcookie("error_message", "Vui lòng nhập đầy đủ thông tin trước khi đăng ký!", time() + 60, "/");
            echo "<script>window.location.href='index.php?nav=login';</script>";
            exit();
        }else{
            if ($password !== $repassword) {
                setcookie("error_message", "Mật khẩu và xác nhận mật khẩu không khớp", time() + 60, "/");
                echo "<script>window.location.href='index.php?nav=login';</script>";
                exit();
            }else{
                $sql_exam = "SELECT * FROM `account_customer_table` WHERE `email_customer` = '$email' AND `password_customer` = '$password'";
                $result_exam = mysqli_query($connect,$sql_exam);
                if ($result_exam -> num_rows > 0) {
                    setcookie("error_message", "Tài khoản đã tồn tại, vui lòng nhập email và password khác!", time() + 60, "/");
                    echo "<script>window.location.href='index.php?nav=login';</script>";
                }else{
                    $sql = "INSERT INTO `account_customer_table` (`name_customer`, `email_customer`, `phone_customer`, `password_customer`) VALUES ('$name','$email','$phone','$password')";
                    $result = mysqli_query($connect,$sql);
                    setcookie("error_message", "Đăng ký thành công! Hãy đăng nhập!", time() + 60, "/");
                    echo "<script>window.location.href='index.php?nav=login';</script>";
                }
            }
        }
    } else {
        // Nếu không có biểu mẫu được gửi, chuyển hướng hoặc xử lý theo nhu cầu của bạn
        header("location:index.php?nav=login");
    }
// Chức năng đăng nhập
    if (isset($_GET['login_user'])) {
        $userEmail = mysqli_real_escape_string($connect, $_GET['user_name']);
        $password = mysqli_real_escape_string($connect, $_GET['user_pass']);

        $query = "SELECT * FROM `account_customer_table` WHERE `email_customer` = '$userEmail' AND `password_customer` = '$password'";
        $result = mysqli_query($connect, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Đăng nhập thành công
            $_SESSION['user_id'] = $row['id_customer'];
            $_SESSION['check_session'] = true;
            header("Location: index.php"); // Chuyển hướng đến trang chính hoặc trang dashboard của ứng dụng của bạn
            exit();
        } else {
            $query = "SELECT * FROM `admin_table` WHERE `user_admin` = '$userEmail' AND `password_admin` = '$password'";
            $result = mysqli_query($connect, $query);
            
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['user_id'] = $row['user_admin'];
                $_SESSION['check_session'] = true;
                header("Location: admin.php"); // Chuyển hướng đến trang chính hoặc trang dashboard của ứng dụng của bạn
                exit();
            } else {
                // Sai mật khẩu hoặc người dùng không tồn tại
                $_SESSION['error_message'] = "Sai mật khẩu hoặc người dùng không tồn tại. Vui lòng thử lại.";
                header("Location: index.php?nav=login");
                exit();
            }
        }
    } else {
        // Nếu không có biểu mẫu được gửi, chuyển hướng hoặc xử lý theo nhu cầu của bạn
        header("Location: index.php?nav=login");
        exit();
    }
?>