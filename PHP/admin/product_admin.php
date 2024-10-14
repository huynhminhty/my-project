<?php
    include('../PHP/connect.php');
    if (isset($_GET["code_delete"])) {
        $id_product = $_GET["code_delete"];

        $sql = "DELETE FROM `product_table` WHERE `id_product` = '$id_product'";
        $result = mysqli_query($connect,$sql);
    }
?>
<head>
    <link rel="stylesheet" href="../CSS/admin_product.css">
</head>
<body>
    <div class="container_product_admin">
    <?php
        $sql = "SELECT COUNT(`id_product`) AS `bill_count` FROM `product_table`"; 
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($result);
    ?>
        <p style="margin: 10px 0 10px 0;  font-size: 1.3rem;">Bảng danh mục hàng hoá:&nbsp;<?php echo $row['bill_count'] ?>&nbsp; sản phẩm</p>

        <p style="margin: 10px 0 10px 0;  font-size: 1.3rem;"></p>
        <hr>
        <div class="product_tool">
            <form action="admin.php" method="get">
                <input type="text" hidden name="admin" id="" value="product">
                <select name="search" id="">
                    <option value="" disabled selected>Chọn loại hàng cần tìm</option>
                    <?php
                        $sql = "SELECT DISTINCT `type_product` FROM `product_table` WHERE 1";
                        $search = mysqli_query($connect,$sql);
                        while ($row = mysqli_fetch_array($search)) {
                    ?>
                    <option value="<?php echo $row['type_product'] ?>"><?php echo $row['type_product'] ?></option>
                    <?php
                        }
                    ?>
                </select>
                <input type="submit" name="" value="TÌM" id="" class="btn_search">
            </form>
            <button><a href="admin.php?admin=add_product">Thêm</a></button>
        </div>
        <?php
            if (isset($_GET['search'])) {
                $search_type = $_GET['search'];
                if ($search_type == '') {
                    ?>
                    <table class="table_product">
                        <tr>
                            <th>STT</th>
                            <th>MÃ HÀNG</th>
                            <th>TÊN HÀNG</th>
                            <th>GIÁ</th>
                            <th>Loại Hàng</th>
                            <th>ẢNH TRƯỚC</th>
                            <th>ẢNH SAU</th>
                            <th>THÔNG TIN</th>
                            <th colspan="2">TÁC VỤ</th>
                        </tr>
                        <?php
                            $sql = "SELECT * FROM `product_table` WHERE 1";
                            $result = mysqli_query($connect,$sql);
                            $STT = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td class="edit"><?php echo $STT ?></td>
                            <td class="edit"><?php echo $row['code_product'] ?></td>
                            <td class="edit"><?php echo $row['name_product'] ?></td>
                            <td class="edit"><?php echo $row['value_product'] ?>&nbsp;VNĐ</td>
                            <td class="edit"><?php echo $row['type_product'] ?></td>
                            <td class="edit"><img src="../IMG/<?php echo $row['img_first_product'] ?>" alt="first" style='width:100px;'></td>
                            <td class="edit"><img src="../IMG/<?php echo $row['img_last_product'] ?>" alt="last" style='width:100px;'></td>
                            <td class="edit edit1"><?php echo $row['information_product'] ?></td>
                            <td class="edit">
                                <button class="btn_product" style="background-color: black; width: 20px ;"><a href="admin.php?admin=product&code_delete=<?php echo $row['id_product'] ?>"><i class="fa-solid fa-trash"></i></a></button>
                            </td>
                            <td class="edit">
                                <button class="btn_product" style="background-color: black; width: 20px ;"><a href="admin.php?admin=update_product&code_update=<?php echo $row['id_product'] ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                            </td>
                        </tr>
                       <?php
                            $STT++;
                        }
                       ?>
                    </table>
                    <?php
                }else{
                        $sql = "SELECT * FROM `product_table` WHERE `type_product`='$search_type'";
                        $search = mysqli_query($connect,$sql);
                    ?>               
                    <table class="table_product">
                        <tr>
                            <th>STT</th>
                            <th>MÃ HÀNG</th>
                            <th>TÊN HÀNG</th>
                            <th>GIÁ</th>
                            <th>Loại Hàng</th>
                            <th>ẢNH TRƯỚC</th>
                            <th>ẢNH SAU</th>
                            <th>THÔNG TIN</th>
                            <th colspan="2">TÁC VỤ</th>
                        </tr>
                        <?php
                            $STT = 1;
                            while ($row = mysqli_fetch_assoc($search)) {
                        ?>
                        <tr>
                            <td class="edit"><?php echo $STT ?></td>
                            <td class="edit"><?php echo $row['code_product'] ?></td>
                            <td class="edit"><?php echo $row['name_product'] ?></td>
                            <td class="edit"><?php echo $row['value_product'] ?>&nbsp;VNĐ</td>
                            <td class="edit"><?php echo $row['type_product'] ?></td>
                            <td class="edit"><img src="../IMG/<?php echo $row['img_first_product'] ?>" alt="first" style='width:100px;'></td>
                            <td class="edit"><img src="../IMG/<?php echo $row['img_last_product'] ?>" alt="last" style='width:100px;'></td>
                            <td class="edit edit1"><?php echo $row['information_product'] ?></td>
                            <td class="edit">
                                <button class="btn_product" style="background-color: black; width: 20px ;"><a href="admin.php?admin=product&code_delete=<?php echo $row['id_product'] ?>"><i class="fa-solid fa-trash"></i></a></button>
                            </td>
                            <td class="edit">
                                <button class="btn_product" style="background-color: black; width: 20px ;"><a href="admin.php?admin=update_product&code_update=<?php echo $row['id_product'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></button>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    </table>
            <?php
                }
            } else {
            ?>
                <table class="table_product">
                    <tr>
                        <th>STT</th>
                        <th>MÃ HÀNG</th>
                        <th>TÊN HÀNG</th>
                        <th>GIÁ</th>
                        <th>Loại Hàng</th>
                        <th>ẢNH TRƯỚC</th>
                        <th>ẢNH SAU</th>
                        <th>THÔNG TIN</th>
                        <th colspan="2">TÁC VỤ</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM `product_table` WHERE 1";
                        $result = mysqli_query($connect,$sql);
                        $STT = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td class="edit"><?php echo $STT ?></td>
                        <td class="edit"><?php echo $row['code_product'] ?></td>
                        <td class="edit"><?php echo $row['name_product'] ?></td>
                        <td class="edit"><?php echo $row['value_product'] ?>&nbsp;VNĐ</td>
                        <td class="edit"><?php echo $row['type_product'] ?></td>
                        <td class="edit"><img src="../IMG/<?php echo $row['img_first_product'] ?>" alt="first" style='width:100px;'></td>
                        <td class="edit"><img src="../IMG/<?php echo $row['img_last_product'] ?>" alt="last" style='width:100px;'></td>
                        <td class="edit edit1"><?php echo $row['information_product'] ?></td>
                        <td class="edit">
                            <button class="btn_product" style="background-color: black; width: 20px ;"><a href="admin.php?admin=product&code_delete=<?php echo $row['id_product'] ?>"><i class="fa-solid fa-trash"></i></a></button>
                        </td>
                        <td class="edit">
                            <button class="btn_product" style="background-color: black; width: 20px ;"><a href="admin.php?admin=update_product&code_update=<?php echo $row['id_product'] ?>"><i class="fa-solid fa-pen-to-square"></i></button>
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