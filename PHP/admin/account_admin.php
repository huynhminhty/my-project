<?php
    include('../PHP/connect.php');
    if (isset($_GET["code_delete"])) {
        $id_customer = $_GET["code_delete"];

        $sql = "DELETE FROM `account_customer_table` WHERE `id_customer` = '$id_customer'";
        $result = mysqli_query($connect,$sql);
    }
?>
<head>
    <link rel="stylesheet" href="../CSS/admin_account.css">
</head>
<body>
    <div class="container_account_admin">
    <?php
        $sql = "SELECT COUNT(`id_customer`) AS `bill_count` FROM `account_customer_table`"; 
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($result);
    ?>
        <p style="margin: 10px 0 10px 0;  font-size: 1.3rem;">Bảng quản lý tài khoản khách hàng:&nbsp;<?php echo $row['bill_count'] ?>&nbsp; tài khoản</p>
        <hr>
        <div class="tool">
            <form action="admin.php?admin=account" method="post">
                <label for="">Nhập số điện thoại hoặc email để tìm kiếm:</label>
                <input type="text" name="search" class="input_seach" value="">
                <input type="submit" name="" value="TÌM" id="" class="btn_search">
            </form>
        </div>
        <?php
            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                if ($search == '') {
                    ?>
                    <table class="table_product">   
                        <tr>
                            <th>STT</th>
                            <th>TÊN KHÁCH HÀNG</th>
                            <th>EMAIL</th>
                            <th>SỐ ĐIỆN THOẠI</th>
                            <th>PASSWORD</th>
                            <th>TÁC VỤ</th>
                        </tr>
                        <?php
                            $STT = 1;
                            $sql = "SELECT * FROM `account_customer_table` WHERE 1";
                            $search = mysqli_query($connect,$sql);
                            while ($row = mysqli_fetch_assoc($search)) {
                        ?>
                                <tr>
                                    <td><?php echo $STT ?></td>
                                    <td><?php echo $row['name_customer'] ?></td>
                                    <td><?php echo $row['email_customer'] ?></td>
                                    <td><?php echo $row['phone_customer'] ?></td>
                                    <td><?php echo $row['password_customer'] ?></td>
                                    <td>
                                        <button class="btn_product" style="background-color: black; width: 20px ;"><a href="admin.php?admin=account&code_delete=<?php echo $row['id_customer'] ?>"><i class="fa-solid fa-trash"></i></a></button>
                                    </td>
                                </tr>   
                        <?php
                                $STT++;
                            }
                        ?>
                </table>
                <?php
                } else {
                    $sql = "SELECT * FROM `account_customer_table` WHERE `email_customer`='$search' OR `phone_customer`='$search'";
                    $search = mysqli_query($connect,$sql);
                    ?>
                    <table class="table_product">   
                    <tr>
                        <th>STT</th>
                        <th>TÊN KHÁCH HÀNG</th>
                        <th>EMAIL</th>
                        <th>SỐ ĐIỆN THOẠI</th>
                        <th>PASSWORD</th>
                        <th>TÁC VỤ</th>
                    </tr>
                    <?php
                        $STT = 1;
                        while ($row = mysqli_fetch_assoc($search)) {
                    ?>
                            <tr>
                                <td><?php echo $STT ?></td>
                                <td><?php echo $row['name_customer'] ?></td>
                                <td><?php echo $row['email_customer'] ?></td>
                                <td><?php echo $row['phone_customer'] ?></td>
                                <td><?php echo $row['password_customer'] ?></td>
                                <td>
                                    <button class="btn_product" style="background-color: black; width: 20px ;"><a href="admin.php?admin=account&code_delete=<?php echo $row['id_customer'] ?>"><i class="fa-solid fa-trash"></i></a></button>
                                </td>
                            </tr>
                    <?php
                            $STT++;
                        }
                    ?>
                    </table>
        <?php
                }
            }else{
        ?>
                <table class="table_product">   
                    <tr>
                        <th>STT</th>
                        <th>TÊN KHÁCH HÀNG</th>
                        <th>EMAIL</th>
                        <th>SỐ ĐIỆN THOẠI</th>
                        <th>PASSWORD</th>
                        <th>TÁC VỤ</th>
                    </tr>
                    <?php
                        $STT = 1;
                        $sql = "SELECT * FROM `account_customer_table` WHERE 1";
                        $search = mysqli_query($connect,$sql);
                        while ($row = mysqli_fetch_assoc($search)) {
                    ?>
                            <tr>
                                <td><?php echo $STT ?></td>
                                <td><?php echo $row['name_customer'] ?></td>
                                <td><?php echo $row['email_customer'] ?></td>
                                <td><?php echo $row['phone_customer'] ?></td>
                                <td><?php echo $row['password_customer'] ?></td>
                                <td>
                                    <button class="btn_product" style="background-color: black; width: 20px ;"><a href="admin.php?admin=account&code_delete=<?php echo $row['id_customer'] ?>"><i class="fa-solid fa-trash"></i></a></button>
                                </td>
                            </tr>   
                    <?php
                            $STT++;
                        }
                    ?>
                </table>
        <?php
            }
        ?>
    </div>
</body>
</html> 