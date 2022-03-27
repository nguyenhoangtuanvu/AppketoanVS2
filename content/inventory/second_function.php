<?php
// hàng nhập xuất kho
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 2;
$current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
$offset = ($current_page - 1) * $item_per_page; 

$queryInventoryHistory = mysqli_query($con, "SELECT * FROM `inventoryHistory` INNER JOIN `products` INNER JOIN `employee` ORDER BY `inventoryHistory`.`dateTime` ASC LIMIT " . $item_per_page . " OFFSET " . $offset);

$totalRecords = mysqli_query($con, "SELECT * FROM `inventoryHistory`");
$totalRecords = $totalRecords-> num_rows;
$totalPage = ceil($totalRecords / $item_per_page);

$TableTotalProduct = 0;


?>
<div class="inventory-second-function inventory-function">
    <div class="second-header">
        <div class="second-header-heading">Danh sách hàng hóa dịch vụ</div>
        <button class="second-header__btn1">Thêm</button>
    </div>
    <div class="fourth-box">
        <div class="fourth-box1">
            <div class="fourth-box1-icon"></div>
            <div class="fourth-box__summary">
                <div class="fourth-box__money orange-color text-align-right"><?= $productRunout ?></div>
                <div class="fourth-box__money-title text-align-right">Hàng hóa</div>
                <div class="fourth-box__money-summary text-align-right">Sắp hết hàng</div>
            </div>
        </div>
        <div class="fourth-box2">
            <div class="fourth-box2-icon"></div>
            <div class="fourth-box__summary">
                <div class="fourth-box__money red-color"><?= $productOut ?></div>
                <div class="fourth-box__money-title">Hàng hóa</div>
                <div class="fourth-box__money-summary">Hết hàng</div>
            </div>
        </div>
    </div>
    <div class="second-content-nav">
        <ul class="second-content-nav__list">
            <li class="second-content-nav__items second-content-nav__items--active">Tất cả</li>
            <li class="second-content-nav__items">Nhập kho</li>
            <li class="second-content-nav__items">Xuất kho</li>
            <li class="second-content-nav__items">Chuyển kho</li>
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
                    <div class="header-end__search-icon"></div>
                </div>
            </div>   
            <div class="second-content-table">
                <table class="second-table">
                    <thead class="second-table__thead">
                        <tr>
                            <th class="second-inventory-table__box1 table-header">Ngày hoạch toán</th>              
                            <th class="second-inventory-table__box2 table-header">STT</th>              
                            <th class="second-inventory-table__box3 table-header">Nội dung</th>              
                            <th class="second-inventory-table__box4 table-header">Hàng hóa</th>              
                            <th class="second-inventory-table__box5 table-header">Số lượng</th>              
                            <th class="second-inventory-table__box6 table-header">Người giao/ nhận</th>              
                            <th class="second-inventory-table__box7 table-header">Chức năng</th>              
                        </tr>
                    </thead> 
                    <tbody class="second-table__body">
                    <?php while($row = mysqli_fetch_array($queryInventoryHistory)) { 
                        $TableTotalProduct += $row['quantity'];
                    ?>
                        <tr>
                            <td class="second-inventory-table__box1 table-box"><?= $row['dateTime'] ?></td>              
                            <td class="second-inventory-table__box2 table-box">1</td>              
                            <td class="second-inventory-table__box3 table-box"><?= $row['content'] ?></td>              
                            <td class="second-inventory-table__box4 table-box"><?= $row['proname'] ?></td>              
                            <td class="second-inventory-table__box5 table-box"><?= $row['inventotyQuantity'] ?></td>              
                            <td class="second-inventory-table__box6 table-box"><?= $row['staffName'] ?></td>              
                            <td class="third-table__box6 table-box">
                                <a href="#" class="third-table-see">Xem</a>
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
                            <th class="second-inventory-table__box1 footer-box">Tổng</th>         
                            <th class="second-inventory-table__box2 footer-box"></th>         
                            <th class="second-inventory-table__box3 footer-box"></th>         
                            <th class="second-inventory-table__box4 footer-box"></th>         
                            <th class="second-inventory-table__box5 footer-box"><?= number_format($TableTotalProduct, 0, ",",".") ?></th>         
                            <th class="second-inventory-table__box6 footer-box"></th>         
                            <th class="second-inventory-table__box7 footer-box"></th>         
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="second-footer">
                <div class="second-footer__label">Tổng số: <span>3</span> bản ghi</div>
                <div class="second-footer-right">
                    <?php include 'inventoryPagin.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>