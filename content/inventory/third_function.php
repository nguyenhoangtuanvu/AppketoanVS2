<?php
include '../../function.php';
$regexResult = checkPrivilege();
if(!$regexResult) {
    echo "Bạn không có quyền truy cập chức năng này";
    exit;
}
    // kiểm kê kho
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
    $current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
    $offset = ($current_page - 1) * $item_per_page; 

    $queryCheckInventory = mysqli_query($con, "SELECT C.id AS id, C.dateTimeTo AS dateTo, C.dateTime AS dateTime, I.name AS inventory, C.content AS content, C.conclude AS conclude FROM `checkinventory` C
    INNER JOIN `inventory` I ON C.`inventoryid` = I.`id` 
    LIMIT " . $item_per_page . " OFFSET " . $offset);

    $totalRecords = mysqli_query($con, "SELECT * FROM `checkinventory`");
    $totalRecords = $totalRecords-> num_rows;
    $totalPage = ceil($totalRecords / $item_per_page);
?>
<div class="inventory-third-function inventory-function">
    <div class="second-header">
        <div class="second-header-heading"><?= $main['Kiểm kê vật tư hàng hóa'] ?></div>
        <button class="second-header__btn1">
        <a href="addData.php?inventoryNav=inventoryThird&data=addCheck" class="btn-link"><?= $main['Thêm bảng kiểm kê'] ?></a></button>
    </div>
    <div class="second-content">
        <div class="second-content-wrap">
            <div class="second-content-table">
                <table class="second-table">
                    <thead class="second-table__thead">
                        <tr>
                            <th class="inventory-third-table__box1 table-header"><?= $main['Ngày'] ?></th>              
                            <th class="inventory-third-table__box2 table-header"><?= $main['Kiểm kê kho'] ?></th>              
                            <th class="inventory-third-table__box3 table-header"><?= $main['Đến ngày'] ?></th>              
                            <th class="inventory-third-table__box4 table-header"><?= $main['Mục đích'] ?></th>              
                            <th class="inventory-third-table__box5 table-header"><?= $main['Kết luận'] ?></th>              
                            <th class="third-table__box6 table-header"><?= $main['Chức năng'] ?></th>              
                        </tr>
                    </thead> 
                    <tbody class="second-table__body">
                        <?php 
                            $count = 0;
                            while($row = mysqli_fetch_array($queryCheckInventory)) {  
                            $count++;
                        ?>
                        <tr>
                            <td class="inventory-third-table__box1 table-box"><?= $row['dateTime'] ?></td>              
                            <td class="inventory-third-table__box2 table-box"><?= $row['inventory'] ?></td>              
                            <td class="inventory-third-table__box3 table-box"><?= $row['dateTo'] ?></td>              
                            <td class="inventory-third-table__box4 table-box"><?= $row['content'] ?></td>              
                            <td class="inventory-third-table__box5 table-box"><?= $row['conclude'] ?></td>              
                            <td class="third-table__box6 table-box">
                                <a href="addData.php?inventoryNav=<?= $tam ?>&data=view&id=<?= $row['id'] ?>" class="third-table-see"><?= $main['Xem'] ?></a>
                                <i class="fa-solid fa-angle-down open--box-function"></i>
                                <ul class="third-table-function-list">
                                <?php if (checkPrivilege('addData.php?inventoryNav='.$tam.'&data=delete&id='.$row['id'])) { ?>
                                    <li class="third-table-function-items">
                                        <a href="addData.php?inventoryNav=<?= $tam ?>&data=delete&id=<?= $row['id'] ?>" class="third-table-see"><?= $main['Xóa'] ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </td>              
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="second-footer">
                <div class="second-footer__label"><?= $main['Tổng số'] ?>: <span><?= $count ?></span> <?= $main['bản ghi'] ?></div>
                <div class="second-footer-right">
                    <?php include 'inventoryPagin.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>