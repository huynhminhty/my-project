<?php
    include('../PHP/connect.php');
?>
<head>
    <link rel="stylesheet" href="../CSS/home.css">
    <link rel="stylesheet" href="../CSS/product.css">
</head>
<body>
    <!-- header main -->
    <div class="header">
        <div class="intro">
            <img src="../IMG/intro1.png" id="image1" alt="Image 1">
            <img src="../IMG/intro2.png" id="image2" alt="Image 2">
            <img src="../IMG/intro3.png" id="image3" alt="Image 3">
        </div>
        <br>
        <!-- detail product -->
        <div class="detail">
            <h1>MỘT SỐ SẢN PHẨM</h1>
                <div class="deatail__product">
                    <div class="product-list">
                    <?php 
                        $sql = "SELECT * FROM `product_table` ORDER BY `id_product` DESC LIMIT 8;";
                        $result = mysqli_query($connect,$sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <a href="index.php?nav=detail&code=<?php echo $row['id_product'] ?>" class="product-container">
                            <div class="image_container">
                                <img src="../IMG/<?php echo $row['img_first_product'] ?>" alt="Product Image 1">
                                <img src="../IMG/<?php echo $row['img_last_product'] ?>" alt="Product Image 2">
                            </div>
                            <div class="product-info">
                                <h3><?php echo $row['name_product'] ?></h3>
                                <div class="conts">
                                    <p><?php echo $row['value_product'] ?></p>
                                    &nbsp   
                                    <p>VNĐ</p>
                                </div>
                            </div>
                        </a>
                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div class="k_a">
                <a href="index.php?nav=shop" class="detail__show_add">XEM THÊM</a>
            </div>
        </div>
        <!-- collection -->
        <div class="header_special">
            <h1>MỘT SỐ BỘ SƯU TẬP NỔI BẬT</h1>
            <div class="list_BST">
                <button class="slider-btn" data-role="none"><i class="fa-solid fa-angle-left"></i></button>
                <div class="slider">
                      <img src="../IMG/BST1.jpg" alt="Image 4">
                      <img src="../IMG/BST2.jpg" alt="Image 5">
                      <img src="../IMG/BST3.jpg" alt="Image 6">
                </div>
                <button class="slider-btn" data-role="none"><i class="fa-solid fa-angle-right"></i></button>
            </div>
        </div>
    </div>
    <script src="../JS/home.js"></script>
    <!-- Bao gồm thư viện jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Bao gồm thư viện Slick Slider -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
    // Khởi tạo Slick Slider
    $(document).ready(function(){
        $('.slider').slick({
        prevArrow: $('.slider-btn[data-role="none"]:first-child'),
        nextArrow: $('.slider-btn[data-role="none"]:last-child')
        });
    });
    </script>
</body>
</html>