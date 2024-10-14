<?php
    include('../PHP/connect.php');
    if (isset($_GET["code"])) {
        $code = $_GET["code"];

        $sql = "SELECT * FROM `product_table` WHERE `id_product`='$code'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
    }
?>
<head>
    <link rel="stylesheet" href="../CSS/detail.css">
</head>
<body>
    <div class="container_all">
        <div class="container_img_product">
            <img src="../IMG/<?php echo $row['img_first_product'] ?>" alt="">
            <img src="../IMG/<?php echo $row['img_last_product'] ?>" alt="">
        </div>
        <div class="container_info_product">
            <div class="container_form_product">
                <form action="index.php?nav=cart" method="post">
                    <input type="text" hidden name="id_product" id="" value="<?php echo $row['id_product'] ?>">
                    <div class="product_name"><?php echo $row['name_product'] ?></div>
                    <div class="product_price">
                        <?php echo $row['value_product'] ?>
                        &nbsp;VND
                    </div>
                    <div class="product_size">
                        <div class="txt">Size:</div>
                        <div class="wrap-size">
                            <span class="item-radio ">
                                <input name="pa_size" type="radio" id="input-size-1" value="1">
                                <label for="input-size-1" class="m-radio-label">SIZE 1</label>
                            </span>
                            <span class="item-radio ">
                                <input name="pa_size" type="radio" id="input-size-2" value="2">
                                <label for="input-size-2" class="m-radio-label">SIZE 2</label>
                            </span>
                            <span class="item-radio ">
                                <input name="pa_size" type="radio" id="input-size-3" value="3">
                                <label for="input-size-3" class="m-radio-label">SIZE 3</label>
                            </span>
                            <span class="item-radio">
                                <input name="pa_size" type="radio" id="input-size-4" value="4">
                                <label for="input-size-4" class="m-radio-label">SIZE 4</label>
                            </span>
                        </div>
                    </div>
                    <div class="product_quantity">
                        <div class="shop-dt__qan">Số lượng:</div>
                        <div class="quantity_select">
                            <div class="minus_quantity" onclick="decreaseQuantity()"><i class="fa-solid fa-minus" style="color: #000000;"></i></div>
                            <input type="number" class="number rs-form amoVal" name="quantity" id="quantityInput" value="1" min="1" max="999">
                            <div class="plus_quantity" onclick="increaseQuantity()"><i class="fa-solid fa-plus" style="color: #000000;"></i></div>
                        </div>
                    </div>
                    <script>
                        function decreaseQuantity() {
                            var quantityInput = document.getElementById('quantityInput');
                            var currentValue = parseInt(quantityInput.value, 10);
                            if (currentValue > 1) {
                                quantityInput.value = currentValue - 1;
                            }
                        }
                    
                        function increaseQuantity() {
                            var quantityInput = document.getElementById('quantityInput');
                            var currentValue = parseInt(quantityInput.value, 10);
                            var maxValue = parseInt(quantityInput.getAttribute('max'), 10);
                            if (currentValue < maxValue) {
                                quantityInput.value = currentValue + 1;
                            }
                        }
                    </script>
                    <div class="fl-wrap aln-ct">
                        <?php 
                            if (isset($_SESSION['check_session'])) {
                                echo '<input type="submit" class="shop-dt__btn" name="cart" value="Thêm vào giỏ">';
                            }else{
                                echo '<a href="index.php?nav=login" style="text-decoration: none; color: white; padding: 5px; background-color: black;">Đăng nhập để thêm vào giỏ hàng</a></input>';
                            }
                        ?>
                    </div>
                </form>
            </div>
            <div class="line" style="margin: 10px 0 10px 0;"></div>
            <div class="product_information">
                <div class="txt">Thông tin</div>
                <div class="product_information_content">
                        <?php echo $row['information_product']?>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 