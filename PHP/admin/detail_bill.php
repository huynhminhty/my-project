<?php
    include('../PHP/connect.php');
    if(isset($_GET['code_info'])){
        $id_bill = $_GET['code_info'];

        $sql = "SELECT * FROM `cart_table` WHERE `id_bill`='$id_bill'";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($result);
        $id_customer = $row['id_customer'];
    }
?>
<head>
    <link rel="stylesheet" href="../CSS/detail_bill.css">
</head>
<body>
    <div class="container">
        <p style="margin: 10px 0 10px 0;  font-size: 1.3rem;">Chi tiết hoá đơn khách hàng</p>
        <hr>
        <div class="container_detail_cart">
            <?php 
                $sql = "SELECT * FROM `account_customer_table` WHERE `id_customer` = '$id_customer'";
                $result = mysqli_query($connect,$sql);
                $row = mysqli_fetch_array($result);
            ?>
            <table>
                <tr>
                    <td>MÃ KHÁCH HÀNG:</td>
                    <td><?php echo $row['id_customer'] ?></td>
                    <td>TÊN KHÁCH HÀNG:</td>
                    <td><?php echo $row['name_customer'] ?></td>
                </tr>
                <tr>
                    <td>EMAIL:</td>
                    <td><?php echo $row['email_customer'] ?></td>
                    <td>SỐ ĐIỆN THOẠI:</td>
                    <td><?php echo $row['phone_customer'] ?></td>
                </tr>
                <tr>
                    <?php 
                        $sql = "SELECT `address_bill` FROM `bill_table` WHERE `id_bill`='$id_bill'";
                        $result = mysqli_query($connect,$sql);
                        $row = mysqli_fetch_array($result);
                    ?>
                    <td>MÃ KHÁCH HÀNG:</td>
                    <td colspan="3"><?php echo $row['address_bill'] ?></td>
                </tr>
            </table>
            <p class="txt_title"></p>
            <hr>
            <?php
                $sql = "SELECT * FROM `cart_table` WHERE `pay_cart`= 0 AND `id_bill`='$id_bill'";
                $result= mysqli_query($connect,$sql);
                while ($row_cart = mysqli_fetch_array($result)) {  
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
                    $sql_sum = "SELECT `price_bill` FROM `bill_table` WHERE `id_bill`='$id_bill'";
                    $result_sum = mysqli_query($connect,$sql_sum);
                    $row_sum = mysqli_fetch_array($result_sum);
                ?>
                <p>Tổng:</p>
                <p style="color: red; width: 100px; float: right; padding: 10px; font-size: 1.1rem; font-family:'Times New Roman', Times, serif ;">
                <?php echo $row_sum['price_bill'] ?>&nbsp;<p>VND</p>
            </div>
        </div>
    </div>
</body>
</html> 