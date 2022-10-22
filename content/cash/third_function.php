<?php
include '../../function.php';
$regexResult = checkPrivilege();
if(!$regexResult) {
    echo "Bạn không có quyền truy cập chức năng này";
    exit;
}
    // query check tiền mặt
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
    $current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $queryCheckCash = mysqli_query($con, "SELECT * FROM `checkcash` ORDER BY `dateTime` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    $totalRecords = mysqli_query($con, "SELECT * FROM `checkcash`");
    $totalRecords = $totalRecords-> num_rows;
    $totalPage = ceil($totalRecords / $item_per_page);
    $bankingTotal = 0;
?>
<div class="cash-third-function cash--function">
        <div class="second-header">
            <div class="second-header-heading"><?= $main['Kiểm kê'] ?></div>
            <button class="second-header__btn1">
            <a href="addData.php?cashNav=cashThird&data=check" class="btn-link"><?= $main['Thêm bảng kiểm kê'] ?></a></button>
        </div>
        <div class="second-content">
            <div class="second-content-wrap">
                <div class="second-content-table">
                    <table class="second-table">
                        <thead class="second-table__thead">
                            <tr>
                                <th class="third-table__box1 table-header"><?= $main['Ngày'] ?></th>              
                                <th class="third-table__box2 table-header"><?= $main['Số'] ?></th>              
                                <th class="third-table__box3 table-header"><?= $main['Kiểm kê đến ngày'] ?></th>              
                                <th class="third-table__box4 table-header"><?= $main['Loại tiền'] ?></th>              
                                <th class="third-table__box5 table-header"><?= $main['Mục đích'] ?></th>              
                                <th class="third-table__box6 table-header"><?= $main['Chức năng'] ?></th>              
                            </tr>
                        </thead> 
                        <tbody class="second-table__body">
                            <?php 
                            $count = 0;
                            while($row = mysqli_fetch_array($queryCheckCash)) { 
                                $count++;    
                            ?>
                            <tr>
                                <td class="third-table__box1 table-box"><?= $row['dateTime'] ?></td>              
                                <td class="third-table__box2 table-box"><?= $count ?></td>              
                                <td class="third-table__box3 table-box"><?= $row['dateTimeTo'] ?></td>              
                                <td class="third-table__box4 table-box"><?= $row['moneyUnit'] ?></td>              
                                <td class="third-table__box5 table-box"><?= $row['content'] ?></td>              
                                <td class="third-table__box6 table-box">
                                    <a href="addData.php?cashNav=<?= $tam ?>&data=view&id=<?= $row['id'] ?>" class="third-table-see"><?= $main['Xem'] ?></a>
                                    <i class="fa-solid fa-angle-down open--box-function"></i>
                                    <ul class="third-table-function-list">
                                        <li class="third-table-function-items">
                                            <?php if (checkPrivilege('addData.php?cashNav='.$tam.'&data=delete&id='.$row['id'])) { ?>
                                            <a href="addData.php?cashNav=<?= $tam ?>&data=delete&id=<?= $row['id'] ?>" class="third-table-see"><?= $main['Xóa'] ?></a>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                </td>              
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="second-footer">
                    <div class="second-footer__label"><?= $main['Tổng số'] ?>: <span><?= $count?></span> <?= $main['bản ghi'] ?></div>
                    <div class="second-footer-right">
                        <?php include 'cashPagin.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>