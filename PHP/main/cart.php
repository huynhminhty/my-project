<?php
    include('../PHP/connect.php');

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
    
    if (isset($_POST["cart"])) {
        $id_product = $_POST['id_product'];
        $quantity_product = $_POST['quantity'];
        $size_product = $_POST['pa_size'];
        $pay_cart = -1;

        $sql_img = "SELECT * FROM `product_table` WHERE `id_product`='$id_product'";
        $result_img = mysqli_query($connect,$sql_img);
        $row_img = mysqli_fetch_array($result_img);

        $sql_check = "SELECT * FROM `cart_table` WHERE `id_product`='$id_product' AND `id_customer`='$check_account' AND `size_product`='$size_product' AND `pay_cart`=-1";
        $result_check = mysqli_query($connect,$sql_check);

        if ( $result_check -> num_rows > 0) {
            $row_check = mysqli_fetch_array($result_check);
            $id_check = $row_check['id_cart'];
            $update_quantity = $row_check['quantity_product'] + $quantity_product;
            $price_check = $row_img['value_product'] * $update_quantity;

            $sql_up = "UPDATE `cart_table` SET `quantity_product`='$update_quantity', `price_cart`='$price_check' WHERE `id_cart`='$id_check'";
            $result_up = mysqli_query($connect,$sql_up);
        }else{
            $price_cart = $row_img['value_product'] * $quantity_product;
            $sql = "INSERT INTO `cart_table`(`id_product`, `id_customer`, `quantity_product`, `size_product`,`price_cart`,`pay_cart`) VALUES ('$id_product','$check_account','$quantity_product','$size_product','$price_cart','$pay_cart')";
            $result = mysqli_query($connect, $sql);
        }
    }
    if (isset($_GET["delete"])) {
        $delete = $_GET["delete"];
        $sql = "DELETE FROM `cart_table` WHERE `id_cart`='$delete'";
        $result = mysqli_query($connect,$sql);
    }
?>
<head>  
    <link rel="stylesheet" href="../CSS/cart.css">
</head>
<body>
    <div class="container_cart">
        <?php
        if (isset($_SESSION["check_session"])) {
        ?>
            <form action="index.php?nav=order" class="form_cart" method="post">
                <div class="container_detail_cart">
                    <p class="txt_title">Giỏ hàng</p>
                    <hr>
                    <?php
                        $sql_cart = "SELECT * FROM `cart_table` WHERE `pay_cart`=-1 AND `id_customer`='$check_account'";
                        $result_cart = mysqli_query($connect,$sql_cart);
                        while ($row_cart = mysqli_fetch_array($result_cart)) {  
                    ?>
                        <div class="container_detail_cart_product">
                            <div class="product">
                                <?php
                                    $id_product_check = $row_cart["id_product"];
                                    $sql_img = "SELECT * FROM `product_table` WHERE `id_product`='$id_product_check'";
                                    $result_img = mysqli_query($connect,$sql_img);
                                    $row_img = mysqli_fetch_array($result_img);
                                ?>
                                <div class="cart__img">
                                    <img width="125px" src="../IMG/<?php echo $row_img['img_first_product'] ?>" class="">
                                </div>
                                <div class="cart__info">
                                    <div class="wrap_title" style="display: flex; justify-content: space-between;">
                                        <p><?php echo $row_img['name_product'] ?></p>
                                        <a href="index.php?nav=cart&delete=<?php echo $row_cart['id_cart'] ?>" style="text-decoration: none; color: black;"><i class="fa-solid fa-xmark"></i></a>   
                                    </div>
                                    <div class="txt">
                                        <p>Size&nbsp;<span class="size"><?php echo $row_cart['size_product'] ?></span></p>
                                    </div>
                                    <div class="fl_ct">
                                        <p>x&nbsp;<?php echo $row_cart['quantity_product'] ?></p>            
                                        <div class="price">
                                            <span><?php echo $row_cart['price_cart'] ?>&nbsp;<span class="">VNĐ</span></span>            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    <hr>
                    <div class="sum_value">
                        <?php
                            $sql_sum = "SELECT SUM(`price_cart`) AS `price` FROM `cart_table` WHERE `id_customer`='$check_account' AND `pay_cart`=-1";
                            $result_sum = mysqli_query($connect,$sql_sum);
                            $row_sum = mysqli_fetch_array($result_sum);
                        ?>
                        <p>Tổng:</p>
                        <input type="text" name="sum_cart" value="<?php echo $row_sum['price'] ?>" style="width: 100px; float: right; padding: 10px; font-size: 1.1rem; font-family:'Times New Roman', Times, serif ;">
                            &nbsp;<p>VND</p>
                    </div>
                </div>
                <div class="container_info_ship">
                    <p class="txt_title">Thông tin giao hàng</p>
                        <hr>
                        <div class="container_infor_ship">
                            <table style="width: 100%;">
                                <input type="date" hidden name="date_bill" id="ngayHienHanh">
                                <script>
                                    // JavaScript để hiển thị ngày hiện hành
                                    var ngayHienHanh = new Date().toISOString().split('T')[0];
                                    document.getElementById("ngayHienHanh").value = ngayHienHanh;
                                </script>
                                <?php
                                    $sql_cus = "SELECT * FROM `account_customer_table` WHERE `id_customer`= '$check_session'";
                                    $result_cus = mysqli_query($connect,$sql_cus);
                                    $row_cus = mysqli_fetch_array($result_cus);
                                ?>
                                <tr><td style="width: 100px; font-size: 1.1rem;"><label>Tên: </label></td><td><input type="text" class="form__inp" name="name_customer" id="" value="<?php echo $row_cus['name_customer'] ?>"></td></tr>
                                <tr><td style="width: 100px; font-size: 1.1rem;"><label>Số điện thoại: </label></td><td><input type="tel" class="form__inp" name="phone_customer" id="" value="<?php echo $row_cus['phone_customer'] ?>"></td></tr>
                                <tr><td style="width: 100px; font-size: 1.1rem;"><label>Email: </label></td><td><input type="email" class="form__inp" name="mail_customer" id="" value="<?php echo $row_cus['email_customer'] ?>"></td></tr>
                                <tr><td style="width: 100px; font-size: 1.1rem;"><label>Địa chỉ: </label></td><td><input type="text" class="form__inp" name="address_customer" id=""></td></tr>
                                <tr>
                                    <td colspan="2"><p style="padding: 10px; color: red ;">Vui lòng nhập địa chỉ giao hàng (Đối với thông tin khác nếu bỏ trống sẽ lấy dựa trên thông tin cung cấp lúc đăng ký tại khoản)!</p></td>
                                </tr>
                            </table>
                        </div>
                        <hr>
                    </div>
                </div>
                <input type="submit" name="order" class="form__inp" id="" value="Đặt hàng" style="width: 10%; margin-left: 35%;">
            </form>
        <?php
        } else {
        ?>  
            <div class="form_cart"><a href="index.php?nav=login">Đăng nhập để đặt hàng</a></div>
        <?php
        }
        ?>
    </div>
</body>
</html> 