<?php 
    // bán hàng
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 1;
    $current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
    $offset = ($current_page - 1) * $item_per_page; 

    $querySales = mysqli_query($con, "SELECT * FROM `sales` INNER JOIN `customer` ORDER BY `sales`.`dateTime` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);
    
    $totalRecords = mysqli_query($con, "SELECT * FROM `sales`");
    $totalRecords = $totalRecords-> num_rows;
    $totalPage = ceil($totalRecords / $item_per_page);
    
    $TableTotalMoney = 0;
    $salesCount = 0;

    // tổng thu cả năm
    $queryRevenuYear = mysqli_query($con, "SELECT YEAR(dateTime), `totalMoney`  FROM `sales` ORDER BY `sales`.`dateTime` ASC");
    $revenuYear = 0;
    $now = getdate();
    while($row = mysqli_fetch_array($queryRevenuYear)) {
        if($row['YEAR(dateTime)'] == $now['year']) {
            $revenuYear += $row['totalMoney'];
        }
    }
?>
<div class="sales-second-function sales-function">
    <div class="second-header">
        <div class="second-header-heading">Giao dịch bán hàng</div>
        <button class="second-header__btn1">Thêm</button>
    </div>
    <div class="second-box">
        <div class="sales-second-box1">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($revenuYear, 0, ",",".") ?></div>
                <div class="second-box__money-title">Doanh thu trong năm</div>
            </div>
        </div>
        <div class="sales-second-box2">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($notInvoice, 0, ",",".") ?></div>
                <div class="second-box__money-title">Chưa xuất hóa đơn</div>
            </div>
        </div>
        <div class="sales-second-box3">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($DebtCusOver, 0, ",",".") ?></div>
                <div class="second-box__money-title">Nợ quá hạn</div>
            </div>
        </div>
        <div class="sales-second-box4">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($TotalDebtCollect, 0, ",",".") ?></div>
                <div class="second-box__money-title">Tổng nợ phải thu</div>
            </div>
        </div>
        <div class="sales-second-box5">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($TotalCusCollected, 0, ",",".") ?></div>
                <div class="second-box__money-title">Đã thanh toán</div>
            </div>
        </div>
    </div>
    <div class="second-content-nav">
        <ul class="second-content-nav__list">
            <li class="second-content-nav__items second-content-nav__items--active">Bán hàng</li>
            <li class="second-content-nav__items">Hóa đơn</li>
        </ul>
    </div>
    <div class="second-content">
        <div class="second-content-wrap">
            <div class="second-content-header">
                <div class="second-content__filter">
                    <span class="second-content__filter-label">Lọc</span>
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
                                <li class="dropdown-items dropdown-items--active">Hôm nay</li>
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
                        <button class="dropdown-btn">Lọc</button>
                    </div>
                </div>
                <span class="second-content-filter__value">Hôm nay</span>
                <div class="header-search">
                    <input type="text" class="header-search__input" placeholder="Nhập từ khóa tìm kiếm">
                    <i class="fa-solid fa-magnifying-glass header-end__search-icon"></i>
                </div>
            </div>   
            <div class="second-content-table">
                <table class="second-table">
                    <thead class="second-table__thead">
                        <tr>
                            <th class="sales-second-table__box1 table-header">Ngày hoạch toán</th>              
                            <th class="sales-second-table__box2 table-header">Số hóa đơn</th>              
                            <th class="sales-second-table__box3 table-header">Khách hàng</th>              
                            <th class="sales-second-table__box4 table-header">Tổng tiền thanh toán</th>              
                            <th class="sales-second-table__box5 table-header">TT lập hóa đơn</th>              
                            <th class="sales-second-table__box6 table-header">Chức năng</th>              
                        </tr>
                    </thead> 
                    <tbody class="second-table__body">
                        <?php while($row = mysqli_fetch_array($querySales)) {
                            $TableTotalMoney += $row['totalMoney'];
                            $invoice = $row['invoice'] == '1' ? 'Chưa lập' : 'Đã lập' ;
                            $salesCount++; 
                        ?>
                        <tr>
                            <td class="sales-second-table__box1 table-box"><?= $row['dateTime'] ?></td>              
                            <td class="sales-second-table__box2 table-box">1</td>              
                            <td class="sales-second-table__box3 table-box"><?= $row['name'] ?></td>              
                            <td class="sales-second-table__box4 table-box"><?= number_format($row['totalMoney'], 0, ",",".") ?></td>              
                            <td class="sales-second-table__box5 table-box"><?= $invoice ?></td>              
                            <td class="third-table__box6 table-box">
                                <a href="#" class="third-table-see">Phát hành hóa đơn</a>
                                <i class="fa-solid fa-angle-down"></i>
                                <ul class="third-table-function-list">
                                    <li class="third-table-function-items">
                                        <a href="#" class="third-table-function__delete">Nhân bản</a>
                                    </li>
                                </ul>
                            </td>             
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot class="second-table__footer">
                        <tr>
                            <th class="second-table__box1 footer-box">Tổng</th>         
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
                <div class="second-footer__label">Tổng số: <span><?= $salesCount ?></span> bản ghi</div>
                <div class="second-footer-right">
                    <?php include 'salesPagin.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>