<?php
    include('../PHP/connect.php');
    if (isset($_GET["code_delete"])) {
        $id_customer = $_GET["code_delete"];

        $sql = "";
        $result = mysqli_query($connect,$sql);
    }
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        if ($search != '') {
            $sql = "SELECT `id_customer` FROM `account_customer_table` WHERE `email_customer`='$search' OR `phone_customer`='$search'";
            $result = mysqli_query($connect,$sql);
            $row = mysqli_fetch_array($result);
            $id_customer = $row['id_customer'];
        }
    }
?>
<head>
    <link rel="stylesheet" href="../CSS/admin_bill.css">
</head>
<body>
    <div class="container_account_admin">
    <?php
        $sql = "SELECT COUNT(`id_bill`) AS `bill_count` FROM `bill_table`"; 
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($result);
    ?>
        <p style="margin: 10px 0 10px 0;  font-size: 1.3rem;">Bảng quản lý hoá đơn đặt hàng:&nbsp;<?php echo $row['bill_count'] ?>&nbsp; hoá đơn</p>
        <hr>
        <div class="tool">
            <form action="admin.php?admin=bill" method="post">
                <label for="">Nhập số điện thoại hoặc email để tìm kiếm hoá đơn khách hàng:</label>
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
                            <th>MÃ KHÁCH HÀNG</th>
                            <th>ĐỊA CHỈ GIAO HÀNG</th>
                            <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                            <th colspan="2">TÁC VỤ</th>
                        </tr>
                        <?php
                            $STT = 1;
                            $sql = "SELECT * FROM `bill_table` WHERE 1";
                            $search = mysqli_query($connect,$sql);
                            while ($row = mysqli_fetch_assoc($search)) {
                        ?>
                                <tr>
                                    <td><?php echo $STT ?></td>
                                    <td><?php echo $row['id_customer'] ?></td>
                                    <td><?php echo $row['address_bill'] ?></td>
                                    <td><?php echo $row['price_bill'] ?>&nbsp;VNĐ</td>
                                    <td>
                                        <button class="btn_product" style="background-color: black; width: 20px ;"><a href="admin.php?admin=detail_bill&code_info=<?php echo $row['id_bill'] ?>"><i class="fa-solid fa-inbox"></i></a></button>
                                        <button class="btn_product" style="background-color: black; width: 20px ;"><a href="admin.php?admin=bill&code_delete=<?php echo $row['id_bill'] ?>"><i class="fa-solid fa-trash"></i></a></button>
                                    </td>
                                </tr>   
                        <?php
                                $STT++;
                            }
                        ?>
                </table>
                <?php
                } else {
                    $sql = "SELECT * FROM `bill_table` WHERE `id_customer`='$id_customer'";
                    $search = mysqli_query($connect,$sql);
                    ?>
                    <table class="table_product">   
                        <tr>
                            <th>STT</th>
                            <th>MÃ KHÁCH HÀNG</th>
                            <th>ĐỊA CHỈ GIAO HÀNG</th>
                            <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                            <th colspan="2">TÁC VỤ</th>
                        </tr>
                        <?php
                            $STT = 1;
                            while ($row = mysqli_fetch_assoc($search)) {
                        ?>
                                <tr>
                                    <td><?php echo $STT ?></td>
                                    <td><?php echo $row['id_customer'] ?></td>
                                    <td><?php echo $row['address_bill'] ?></td>
                                    <td><?php echo $row['price_bill'] ?>&nbsp;VNĐ</td>
                                    <td>
                                        <button class="btn_product" style="background-color: black; width: 20px ;"><a href="admin.php?admin=detail_bill&code_info=<?php echo $row['id_bill'] ?>"><i class="fa-solid fa-inbox"></i></a></button>
                                        <button class="btn_product" style="background-color: black; width: 20px ;"><a href="admin.php?admin=bill&code_delete=<?php echo $row['id_bill'] ?>"><i class="fa-solid fa-trash"></i></a></button>
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
                            <th>MÃ KHÁCH HÀNG</th>
                            <th>ĐỊA CHỈ GIAO HÀNG</th>
                            <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                            <th colspan="2">TÁC VỤ</th>
                        </tr>
                        <?php
                            $STT = 1;
                            $sql = "SELECT * FROM `bill_table` WHERE 1";
                            $search = mysqli_query($connect,$sql);
                            while ($row = mysqli_fetch_assoc($search)) {
                        ?>
                                <tr>
                                    <td><?php echo $STT ?></td>
                                    <td><?php echo $row['id_customer'] ?></td>
                                    <td><?php echo $row['address_bill'] ?></td>
                                    <td><?php echo $row['price_bill'] ?>&nbsp;VNĐ</td>
                                    <td>
                                        <button class="btn_product" style="background-color: black; width: 20px ;"><a href="admin.php?admin=detail_bill&code_info=<?php echo $row['id_bill'] ?>"><i class="fa-solid fa-inbox"></i></i></a></button>
                                        <button class="btn_product" style="background-color: black; width: 20px ;"><a href="admin.php?admin=bill&code_delete=<?php echo $row['id_bill'] ?>"><i class="fa-solid fa-trash"></i></a></button>
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