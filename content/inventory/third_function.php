<?php
    // kiểm kê kho
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 2;
    $current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
    $offset = ($current_page - 1) * $item_per_page; 

    $queryCheckInventoty = mysqli_query($con, "SELECT * FROM `checkinventory` INNER JOIN `inventory` INNER JOIN `products` WHERE checkinventory.productid = products.id ORDER BY `checkinventory`.`dateTimeFrom` ASC");

    $totalRecords = mysqli_query($con, "SELECT * FROM `checkinventory`");
    $totalRecords = $totalRecords-> num_rows;
    $totalPage = ceil($totalRecords / $item_per_page);
?>
<div class="inventory-third-function inventory-function">
    <div class="second-header">
        <div class="second-header-heading">Kiểm kê vật tư hàng hóa</div>
        <button class="second-header__btn1">Thêm bảng kiểm kê</button>
    </div>
    <div class="second-content">
        <div class="second-content-wrap">
            <div class="second-content-table">
                <table class="second-table">
                    <thead class="second-table__thead">
                        <tr>
                            <th class="inventory-third-table__box1 table-header">Ngày</th>              
                            <th class="inventory-third-table__box2 table-header">Kiểm kê kho</th>              
                            <th class="inventory-third-table__box3 table-header">Đến ngày</th>              
                            <th class="inventory-third-table__box4 table-header">Mục đích</th>              
                            <th class="inventory-third-table__box5 table-header">Kết luận</th>              
                            <th class="third-table__box6 table-header">Chức năng</th>              
                        </tr>
                    </thead> 
                    <tbody class="second-table__body">
                        <?php 
                            $count = 0;
                            while($row = mysqli_fetch_array($queryCheckInventoty)) {  
                                $count++;
                        ?>
                        <tr>
                            <td class="inventory-third-table__box1 table-box"><?= $row['dateTimeFrom'] ?></td>              
                            <td class="inventory-third-table__box2 table-box"><?= $row['name'] ?></td>              
                            <td class="inventory-third-table__box3 table-box"><?= $row['dateTimeTo'] ?></td>              
                            <td class="inventory-third-table__box4 table-box"><?= $row['content'] ?></td>              
                            <td class="inventory-third-table__box5 table-box"><?= $row['conclude'] ?></td>              
                            <td class="third-table__box6 table-box">
                                <a href="#" class="third-table-see">Xem</a>
                                <i class="fa-solid fa-angle-down"></i>
                                <ul class="third-table-function-list">
                                    <li class="third-table-function-items">
                                        <a href="#" class="third-table-function__delete">Xóa</a>
                                    </li>
                                </ul>
                            </td>              
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="second-footer">
                <div class="second-footer__label">Tổng số: <span><?= $count ?></span> bản ghi</div>
                <div class="second-footer-right">
                    <?php include 'inventoryPagin.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>