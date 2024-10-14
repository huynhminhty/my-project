<?php
   $servername = "localhost";  // Tên máy chủ
   $username = "root"; // Tên người dùng MySQL
   $password = ""; // Mật khẩu MySQL
   $dbname = "sales_manager";   // Tên cơ sở dữ liệu
   
   // Tạo kết nối
   $connect = new mysqli($servername, $username, $password, $dbname);
   
   // Kiểm tra kết nối
   if ($connect->connect_error) {
       die("Kết nối không thành công: " . $connect->connect_error);
   }
?>  