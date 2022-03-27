<?php
    // query check tiền mặt
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 1;
    $current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $queryCheckCash = mysqli_query($con, "SELECT * FROM `checkcash` INNER JOIN `countmoney` LIMIT " . $item_per_page . " OFFSET " . $offset);
    $totalRecords = mysqli_query($con, "SELECT * FROM `checkcash`");
    $totalRecords = $totalRecords-> num_rows;
    $totalPage = ceil($totalRecords / $item_per_page);
    $bankingTotal = 0;
?>
<div class="cash-third-function cash--function">
        <div class="second-header">
            <div class="second-header-heading">Kiểm kê</div>
            <button class="second-header__btn1">Thêm bảng kiểm kê</button>
        </div>
        <div class="second-content">
            <div class="second-content-wrap">
                <div class="second-content-table">
                    <table class="second-table">
                        <thead class="second-table__thead">
                            <tr>
                                <th class="third-table__box1 table-header">Ngày</th>              
                                <th class="third-table__box2 table-header">Số</th>              
                                <th class="third-table__box3 table-header">Kiểm kê đến ngày</th>              
                                <th class="third-table__box4 table-header">Loại tiền</th>              
                                <th class="third-table__box5 table-header">mục đích</th>              
                                <th class="third-table__box6 table-header">sửa xóa</th>              
                            </tr>
                        </thead> 
                        <tbody class="second-table__body">
                            <?php while($row = mysqli_fetch_array($queryCheckCash)) { ?>
                            <tr>
                                <td class="third-table__box1 table-box"><?= $row['dateTime'] ?></td>              
                                <td class="third-table__box2 table-box">1</td>              
                                <td class="third-table__box3 table-box"><?= $row['dateTimeTo'] ?></td>              
                                <td class="third-table__box4 table-box"><?= $row['moneyUnit'] ?></td>              
                                <td class="third-table__box5 table-box"><?= $row['content'] ?></td>              
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
                    <div class="second-footer__label">Tổng số: <span>3</span> bản ghi</div>
                    <div class="second-footer-right">
                        <?php include 'cashPagin.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>