<?php
    include('../PHP/connect.php');
// Kiểm tra xem biểu mẫu đã được gửi đi hay chưa
    if (isset($_POST['order'])) {
        // Lấy dữ liệu từ biểu mẫu
        $name = $_POST['name_customer'];
        $phone = $_POST['phone_customer'];
        $email = $_POST['mail_customer'];
        $address = $_POST['address_customer'];
        $date = $_POST['date_bill'];
        $price = $_POST['sum_cart'];
        $pay = 0;
       

        // Kiểm tra xem mật khẩu và xác nhận mật khẩu có khớp nhau hay không
        if ($address == "") {
            setcookie("error_message", "Vui lòng nhập địa chỉ giao hàng (Đối với thông tin khác nếu bỏ trống sẽ lấy dựa trên thông tin cung cấp lúc đăng ký tại khoản)!", time() + 60, "/");
            echo "<script>window.location.href='index.php?nav=cart';</script>";
            exit();
        }else{
            $sql = "INSERT INTO `bill_table`(`id_customer`, `address_bill`, `price_bill`) VALUES ('$check_account','$address','$price')";
            $result = mysqli_query($connect,$sql);

            $sql = "SELECT `id_bill` FROM `bill_table` ORDER BY `id_bill` DESC LIMIT 1";
            $result = mysqli_query($connect,$sql);
            $row = mysqli_fetch_array($result);

            if ($row["id_bill"] == "") {
                $id_bill = 1;
            }else{
                $id_bill = $row["id_bill"];
            }

            $sql = "UPDATE `cart_table` SET `id_bill`='$id_bill',`pay_cart`='$pay',`date_bill`='$date' WHERE `id_customer`='$check_account' AND `pay_cart`=-1";
            $result = mysqli_query($connect,$sql);
            setcookie("error_message","Đã đặt hàng thành công!", time() + 60, "/");
            echo "<script>window.location.href='index.php?nav=cart';</script>";
            exit();
        }
    }else{
        header("location:index.php?nav=cart");
    }
?>  