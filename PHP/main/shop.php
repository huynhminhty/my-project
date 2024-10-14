<?php
    include('../PHP/connect.php');
    if (isset($_GET["type"])) {
        $type = $_GET["type"];
    }
?>
<head>
    <link rel="stylesheet" href="../CSS/shop.css">
    <link rel="stylesheet" href="../CSS/product.css">
</head>
<body>
    <label for="search_filter" class="shop_overplay"></label>
    <div class="search">
        <label for="search_filter"><i class="fa-solid fa-filter" style="color: #000000;"></i>&nbsp; Bộ lọc</label>
        <input type="checkbox" id="search_filter" value="" hidden class="search_filter">
        <nav class="search_product" for="search_filter">
            <ul class="list_search">
                <li class="list_product">
                    <label for="check_shirt"><p>Áo</p></label>
                    <input type="checkbox" id="check_shirt" hidden class="filter_shirt">
                    <ul class="list_search_item" for="check_shirt">
                        <li class="list_product_item"><a href="index.php?nav=shop&type=Thun">Thun</a></li>
                        <li class="list_product_item"><a href="index.php?nav=shop&type=Polo">POLO</a></li>
                        <li class="list_product_item"><a href="index.php?nav=shop&type=Sơ Mi">Sơ Mi</a></li>
                    </ul>
                </li>
                <div class="line"></div>
                <li class="list_product">
                    <label for="check_trousers"><p>Quần</p></label>
                        <input type="checkbox" id="check_trousers" hidden class="filter_trousers">
                        <ul class="list_search_item" for="check_trousers">
                        <li class="list_product_item"><a href="index.php?nav=shop&type=Shorts">Shorts</a></li>
                        <li class="list_product_item"><a href="index.php?nav=shop&type=Dài">Dài</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <div class="line">
    </div>
    <div class="product">
        <?php
            if(isset($type)){
                $sql = "SELECT * FROM `product_table` WHERE `type_product` LIKE '%$type%' ORDER BY `product_table`.`type_product` ASC";
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
            }else{
        ?>
        <?php 
            $sql = "SELECT * FROM `product_table` WHERE 1 ORDER BY `product_table`.`type_product` ASC";
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
            }
        ?>
    </div>
</body>
</html> 