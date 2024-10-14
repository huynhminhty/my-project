<?php
    include('../PHP/connect.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_product"])) {
        // Lấy dữ liệu từ biểu mẫu
        $id_product = $_POST["id_product"];
        $code_product = $_POST["code_product"];
        $name_product = $_POST["name_product"];
        $value_product = $_POST["value_product"];
        $type_product = $_POST["type_product"];
        // $img_fist_product = $_FILES["img_fist_product"]["name"]; // Tên file ảnh mặt trước
        // $img_last_product = $_FILES["img_last_product"]["name"]; // Tên file ảnh mặt sau
        $info_product = $_POST["info_product"];

        // Đường dẫn lưu trữ ảnh    
        // $upload_dir = "../IMG/";
        // $img_fist_product_path = $upload_dir . $img_fist_product;
        // $img_last_product_path = $upload_dir . $img_last_product;

        // // Di chuyển ảnh vào thư mục lưu trữ
        // move_uploaded_file($_FILES["img_fist_product"]["tmp_name"], $img_fist_product_path); ,`img_first_product`='$img_fist_product',`img_last_product`='$img_last_product',
        // move_uploaded_file($_FILES["img_last_product"]["tmp_name"], $img_last_product_path);

        // Thực hiện truy vấn để thêm dữ liệu vào cơ sở dữ liệu
        $sql ="UPDATE `product_table` SET `code_product`='$code_product',`name_product`='$name_product',`value_product`='$value_product',`type_product`='$type_product',`information_product`='$info_product' WHERE `id_product`='$id_product'";
        $result = mysqli_query($connect, $sql);
    // Đóng kết nối
    $connect->close();
    header("location:admin.php?admin=product");
    }
?>
<head>
    <link rel="stylesheet" href="../CSS/admin_add_product.css">
</head> 
<body>
    <div class="container_add_product_admin">
    <form action="" method="post" enctype="multipart/form-data">
    <?php
        if (isset($_GET["code_update"])) {
            $id_product = $_GET["code_update"];
        
            $sql = "SELECT * FROM `product_table` WHERE `id_product` = '$id_product'";
            $result = mysqli_query($connect,$sql);
            $row = mysqli_fetch_assoc($result);
        }
    ?>
        <p>CHỈNH SỬA THÔNG TIN HÀNG HOÁ</p>
        <div class="form">
            <input type="text" name="id_product" hidden value="<?php echo $row['id_product']?>">
            <label><p1>Mã Hàng:</p1></label>
            <input type="text" name="code_product" class="form__product" placeholder="Mã Hàng" value="<?php echo $row['code_product'] ?>">
            <label><p1>Tên Hàng:</p1></label>
            <input type="text" name="name_product" class="form__product" placeholder="Tên Hàng" value="<?php echo $row['name_product'] ?>">
            <label><p1>Giá Hàng:</p1></label>
            <input type="number" name="value_product" class="form__product" placeholder="Giá Hàng" value="<?php echo $row['value_product'] ?>">
            <label><p1>Loại Hàng:</p1></label>
            <input type="text" name="type_product" class="form__product" placeholder="Loại Hàng" value="<?php echo $row['type_product'] ?>">
            <!-- <label><p1>Ảnh Mặt Trước:</p1></label> -->
            <!-- <input type="file" name="img_fist_product" class="form__product" accept="image/*" value="Ảnh Mặt Trước" value="<?php echo $row['img_first_product'] ?>">
            <label><p1>Ảnh Mặt Sau:</p1></label>
            <input type="file" name="img_last_product" class="form__product" accept="image/*" placeholder="Ảnh Mặt Sau" value="<?php echo $row['img_last_product'] ?>"> -->
            <label><p1>Thông tin sản Phẩm:</p1></label>
            <textarea  rows="10" style="resize: none;" type="text" name="info_product" id="editor1" class="form__product" placeholder="Thông Tin Sản Phẩm"><?php echo $row['information_product'] ?></textarea>
        </div>
        <input type="submit" name="update_product" id="" value="Xác nhận" class="btn_add">
    </form>
    </div>
</body>
</html>