<?php
    if (isset($_COOKIE['error_message'])) {
        $errorMessage = $_COOKIE['error_message'];
        setcookie("error_message", "", time() - 3600, "/"); // Xóa cookie

        echo '<script>alert("' . $errorMessage . '");</script>';
    }
    include('../PHP/connect.php');
    $check_session = $_SESSION["check_session"];    
    $id_account = $_SESSION['user_id'];
    $sql = "SELECT * FROM `account_customer_table` WHERE `id_customer`='$id_account'";
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST['update_customer'])){
        $id_customer = $_POST['id_customer'];
        $name_customer = $_POST['name_customer'];
        $email_customer = $_POST['email_customer'];
        $phone_customer = $_POST['phone_customer'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        if($name_customer == "" || $email_customer == ""|| $phone_customer == ""){
            setcookie("error_message", "Vui lòng nhập đầy đủ thông tin trước lưu!", time() + 60, "/");
            echo "<script>window.location.href='index.php?nav=account';</script>";
            exit();
        }else{
            if($repassword == ""){
                $sql = "UPDATE `account_customer_table` SET `name_customer`='$name_customer',`email_customer`='$email_customer',`phone_customer`='$phone_customer' WHERE `id_customer`='$id_customer'";
                $result = mysqli_query($connect,$sql);
                setcookie("error_message", "Thông tin vừa được cập nhật!", time() + 60, "/");
                echo "<script>window.location.href='index.php?nav=account';</script>";
                exit();
            }else{
                if($password != $repassword){
                    setcookie("error_message", "Passwork chưa trùng khớp!", time() + 60, "/");
                    echo "<script>window.location.href='index.php?nav=account';</script>";
                    exit();
                }else{
                    $sql = "UPDATE `account_customer_table` SET `name_customer`='$name_customer',`email_customer`='$email_customer',`phone_customer`='$phone_customer',`password_customer`='$repassword' WHERE `id_customer`='$id_customer'";
                    $result = mysqli_query($connect,$sql);
                    setcookie("error_message", "Password vừa được cập nhật!", time() + 60, "/");
                    echo "<script>window.location.href='index.php?nav=account';</script>";
                    exit();
                }
            }
        }
    }
?>
<head>
    <link rel="stylesheet" href="../CSS/account.css">
</head>
<body>
    <div class="container_account">
        <div class="container_account_left"> 
            <img src="../IMG/account.png" alt="">
            <p><?php echo $row['name_customer'] ?></p>
            
            <hr>    
            <ul class="list_navigation">
                <li><a href="index.php?logout=<?php echo $check_session ?>" class="link_admin">Đăng Xuất</a></li>
            </ul>
        </div>
        <div class="container_account_right">
            <p>Thông tin người dùng:</p>
            <form action="index.php?nav=account" method="post">
                <div class="table">
                <table>
                    <input type="text" name="id_customer" hidden value="<?php echo $row['id_customer']?>">
                    <tr>
                        <td><label for="" class="title_inp">Tên:</label><input type="text" name="name_customer" class="" placeholder="Tên người dùng" value="<?php echo $row['name_customer']?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="title_inp">Email:</label><input type="email" name="email_customer" class="" placeholder="Email người dùng" value="<?php echo $row['email_customer']?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="title_inp">Số điện thoại:</label><input type="text" name="phone_customer" class="" placeholder="Số điện thoại người dùng" value="<?php echo $row['phone_customer']?>"></td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td><label for="" class="title_inp">Password:</label><input type="password" name="password" class="" placeholder="Password" value="<?php echo $row['password_customer'] ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="" class="title_inp">Nhập lại Password:</label><input type="password" name="repassword" class="" placeholder="Repassword" value=""></td>
                    </tr>
                </table>
                </div>
                <input type="submit" name="update_customer" id="" style="width: 20%;" value="Lưu">
            </form>
        </div>
    </div>
</body>
</html>