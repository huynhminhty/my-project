<?php
    include('../PHP/connect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product"])) {
        // Lấy dữ liệu từ biểu mẫu
        $code_product = $_POST["code_product"];
        $name_product = $_POST["name_product"];
        $value_product = $_POST["value_product"];
        $type_product = $_POST["type_product"];
        $img_fist_product = $_FILES["img_fist_product"]["name"]; // Tên file ảnh mặt trước
        $img_last_product = $_FILES["img_last_product"]["name"]; // Tên file ảnh mặt sau
        $info_product = $_POST["info_product"];

        // Đường dẫn lưu trữ ảnh    
        $upload_dir = "../IMG/";
        $img_fist_product_path = $upload_dir . $img_fist_product;
        $img_last_product_path = $upload_dir . $img_last_product;

        // Di chuyển ảnh vào thư mục lưu trữ
        move_uploaded_file($_FILES["img_fist_product"]["tmp_name"], $img_fist_product_path);
        move_uploaded_file($_FILES["img_last_product"]["tmp_name"], $img_last_product_path);

        // Thực hiện truy vấn để thêm dữ liệu vào cơ sở dữ liệu
        $sql ="INSERT INTO `product_table`(`code_product`, `name_product`, `value_product`,`type_product`, `img_first_product`, `img_last_product`, `information_product`) 
                    VALUES ('$code_product', '$name_product', '$value_product','$type_product', '$img_fist_product', '$img_last_product', '$info_product')";
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
        <p>THÊM HÀNG HOÁ</p>
        <div class="form">
            <label><p1>Mã Hàng:</p1></label>
            <input type="text" name="code_product" class="form__product" placeholder="Mã Hàng">
            <label><p1>Tên Hàng:</p1></label>
            <input type="text" name="name_product" class="form__product" placeholder="Tên Hàng">
            <label><p1>Giá Hàng:</p1></label>
            <input type="number" name="value_product" class="form__product" placeholder="Giá Hàng">
            <label><p1>Loại Hàng:</p1></label>
            <input type="text" name="type_product" class="form__product" placeholder="Loại Hàng">
            <label><p1>Ảnh Mặt Trước:</p1></label>
            <input type="file" name="img_fist_product" class="form__product" accept="image/*" value="Ảnh Mặt Trước">
            <label><p1>Ảnh Mặt Sau:</p1></label>
            <input type="file" name="img_last_product" class="form__product" accept="image/*" placeholder="Ảnh Mặt Sau">
            <label><p1>Thông tin sản Phẩm:</p1></label>
            <textarea  rows="10" style="resize: none;" type="text" name="info_product" id="editor1" class="form__product" placeholder="Thông Tin Sản Phẩm"></textarea>
        </div>
        <input type="submit" name="product" id="" value="Thêm" class="btn_add">
    </form>
    </div>
</body>
</html>