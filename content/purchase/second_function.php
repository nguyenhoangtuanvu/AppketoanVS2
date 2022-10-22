<?php
// mua hàng
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
$current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
$offset = ($current_page - 1) * $item_per_page; 

$queryPurchase = mysqli_query($con, "SELECT PU.id AS id, PU.dateTime AS dateTime, PU.content AS content, PU.quantity AS quantity, PU.price AS price, S.name AS supplier  FROM `purchase` PU
INNER JOIN `supplier` S ON PU.`supplierid` = S.`id` 
LIMIT " . $item_per_page . " OFFSET " . $offset);

$totalRecords = mysqli_query($con, "SELECT * FROM `purchase`");
$totalRecords = $totalRecords-> num_rows;
$totalPage = ceil($totalRecords / $item_per_page);

$TableTotalMoney = 0;
?>
<div class="purchase-second-function purchase-function">
    <div class="second-header">
        <div class="second-header-heading"><?= $main['Giao dịch mua hàng'] ?></div>
        <button class="second-header__btn1">
        <a href="addData.php?purchaseNav=purchaseSecond&data=addBuy" class="btn-link"><?= $main['Thêm'] ?></a>
        </button>
    </div>
    <div class="second-box">
        <div class="second-box1">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($DebtOver, 0, ",",".") ?></div>
                <div class="second-box__money-title"><?= $main['Nợ quá hạn'] ?></div>
            </div>
        </div>
        <div class="second-box2">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($TotalDebtPay, 0, ",",".") ?></div>
                <div class="second-box__money-title"><?= $main['Tổng nợ phải trả'] ?></div>
            </div>
        </div>
        <div class="second-box3">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($TotalPaid, 0, ",",".") ?></div>
                <div class="second-box__money-title"><?= $main['Đã thanh toán'] ?></div>
            </div>
        </div>
    </div>
    <div class="second-content-nav">
        <ul class="second-content-nav__list">
            <li class="second-content-nav__items second-content-nav__items--active"><?= $main['Mua hàng hóa, dịch vụ'] ?></li>
            <li class="second-content-nav__items"><?= $main['Nhận hóa đơn'] ?></li>
        </ul>
    </div>
    <div class="second-content">
        <div class="second-content-wrap">
            <div class="second-content-header">
                <div class="second-content__filter">
                    <span class="second-content__filter-label"><?= $main['Lọc'] ?></span>
                    <i class="fa-solid fa-angle-down"></i>
                    <div class="second-content-time-line__dropdown-list">
                        <span class="dropdown-label">Thu, chi</span>
                        <div class="dropdown-box-wrap"> 
                            <input type="text" class="dropdown-input" placeholder="Tất cả">
                            <i class="fa-solid fa-angle-down"></i>
                            <ul class="dropdown-box-list">
                                <li class="dropdown-items dropdown-items--active">Tất cả</li>
                                <li class="dropdown-items">Thu</li>
                                <li class="dropdown-items">Chi</li>
                            </ul>
                        </div>
                        <span class="dropdown-label">Thời gian</span>
                        <div class="dropdown-box-wrap">
                            <input type="text" class="dropdown-input" placeholder="Hôm nay">
                            <i class="fa-solid fa-angle-down"></i>
                            <ul class="dropdown-box-list">
                                <li class="dropdown-items dropdown-items--active"><?= $main['Hôm nay'] ?></li>
                                <li class="dropdown-items">Tuần này</li>
                                <li class="dropdown-items">Tháng này</li>
                                <li class="dropdown-items">Tháng 1</li>
                                <li class="dropdown-items">Tháng 2</li>
                                <li class="dropdown-items">Tháng 3</li>
                                <li class="dropdown-items">Tháng 4</li>
                                <li class="dropdown-items">Tháng 5</li>
                                <li class="dropdown-items">Tháng 6</li>
                                <li class="dropdown-items">Tháng 7</li>
                                <li class="dropdown-items">Tháng 8</li>
                                <li class="dropdown-items">Tháng 9</li>
                                <li class="dropdown-items">Tháng 10</li>
                                <li class="dropdown-items">Tháng 11</li>
                                <li class="dropdown-items">Tháng 12</li>
                            </ul>
                        </div>
                        <button class="dropdown-btn"><?= $main['Lọc'] ?></button>
                    </div>
                </div>
                <span class="second-content-filter__value"><?= $main['Hôm nay'] ?></span>
                <div class="header-search">
                    <input type="text" class="header-search__input" placeholder="<?= $main['Nhập từ khóa tìm kiếm'] ?>">
                    <div class="header-end__search-icon"></div>
                </div>
            </div>   
            <div class="second-content-table">
                <table class="second-table">
                    <thead class="second-table__thead">
                        <tr>
                            <th class="second-table__box1 table-header"><?= $main['Ngày hoạch toán'] ?></th>              
                            <th class="second-table__box2 table-header"><?= $main['STT'] ?></th>              
                            <th class="second-table__box3 table-header"><?= $main['Nội dung'] ?></th>              
                            <th class="second-table__box4 table-header"><?= $main['Số tiền'] ?></th>              
                            <th class="second-table__box5 table-header"><?= $main['Đối tượng'] ?></th>              
                            <th class="second-table__box6 table-header"><?= $main['Chức năng'] ?></th>              
                        </tr>
                    </thead> 
                    <tbody class="second-table__body">
                        <?php $count = 0;
                        while($row = mysqli_fetch_array($queryPurchase)) {
                            $Money = $row['quantity'] * $row['price'];
                            $TableTotalMoney += $Money;
                            $count++;
                        ?>
                        <tr>
                            <td class="second-table__box1 table-box"><?= $row['dateTime'] ?></td>              
                            <td class="second-table__box2 table-box"><?= $row['id'] ?></td>              
                            <td class="second-table__box3 table-box"><?= $row['content'] ?></td>              
                            <td class="second-table__box4 table-box"><?= number_format($Money, 0, ",",".") ?></td>              
                            <td class="second-table__box5 table-box"><?= $row['supplier'] ?></td>              
                            <td class="third-table__box6 table-box">
                                <a href="addData.php?purchaseNav=<?= $tam ?>&data=view&id=<?= $row['id'] ?>" class="third-table-see"><?= $main['Xem'] ?></a>
                                <i class="fa-solid fa-angle-down open--box-function"></i>
                                <ul class="third-table-function-list">
                                    <li class="third-table-function-items">
                                        <a href="#" class="third-table-see"><?= $main['Nhân bản'] ?></a>
                                    </li>
                                </ul>
                            </td>              
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot class="second-table__footer">
                        <tr>
                            <th class="second-table__box1 footer-box"><?= $main['Tổng'] ?></th>         
                            <th class="second-table__box2 footer-box"></th>         
                            <th class="second-table__box3 footer-box"></th>         
                            <th class="second-table__box4 footer-box"><?= number_format($TableTotalMoney, 0, ",",".") ?></th>         
                            <th class="second-table__box5 footer-box"></th>         
                            <th class="second-table__box6 footer-box"></th>         
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="second-footer">
                <div class="second-footer__label"><?= $main['Tổng số'] ?>: <span><?= $count ?></span> <?= $main['bản ghi'] ?></div>
                <div class="second-footer-right">
                    <?php include 'purchasePagin.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>