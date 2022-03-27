<?php 
    //    sản phẩm
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 1;
    $current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
    $offset = ($current_page - 1) * $item_per_page; 

    $Products = mysqli_query($con, "SELECT * FROM `products` LIMIT " . $item_per_page . " OFFSET " . $offset);

    $totalRecords = mysqli_query($con, "SELECT * FROM `products`");
    $totalRecords = $totalRecords-> num_rows;
    $totalPage = ceil($totalRecords / $item_per_page);

    $tableTotalQuantity = 0;
    $tableTotalValue = 0;

    $queryProductsOut = mysqli_query($con, "SELECT * FROM `products`");
    $productRunout = 0;
    $productOut = 0;
    while($row = mysqli_fetch_array($queryProductsOut)) {
        if($row['quantity'] == 0) {
            $productOut++;
        }
        if($row['quantity'] <= $row['minimumQuantity']) {
            $productRunout++;
        }
    }
?>
<div class="sales-fourth-function sales-function">
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
                            <th class="second-goods-table__box1 table-header">Tên</th>              
                            <th class="second-goods-table__box2 table-header">Mã</th>              
                            <th class="second-goods-table__box3 table-header">Loại mặt hàng</th>              
                            <th class="second-goods-table__box4 table-header">Số lượng tồn</th>              
                            <th class="second-goods-table__box5 table-header">Giá trị tồn</th>              
                            <th class="second-goods-table__box6 table-header">Chức năng</th>              
                        </tr>
                    </thead> 
                    <tbody class="second-table__body">
                    <?php 
                        $count2 = 0;
                        while($row = mysqli_fetch_array($Products)) { 
                        $value = $row['quantity'] * $row['price'];
                        $tableTotalQuantity += $row['quantity'];
                        $tableTotalValue += $value;
                        $count2++;
                    ?>
                        <tr>
                            <td class="second-goods-table__box1 table-box"><?= $row['proname'] ?></td>              
                            <td class="second-goods-table__box2 table-box">D001</td>              
                            <td class="second-goods-table__box3 table-box"><?= $row['nature'] ?></td>              
                            <td class="second-goods-table__box4 table-box"><?= number_format($row['quantity'], 0, ",",".") ?></td>              
                            <td class="second-goods-table__box5 table-box"><?= number_format($value, 0, ",",".") ?></td>              
                            <td class="third-table__box6 table-box">
                                <a href="#" class="third-table-see">Sửa</a>
                                <i class="fa-solid fa-angle-down"></i>
                                <ul class="third-table-function-list">
                                    <li class="third-table-function-items">
                                        <a href="#" class="third-table-function__delete">Nhân bản</a>
                                    </li>
                                    <li class="third-table-function-items">
                                        <a href="#" class="third-table-function__delete">Xóa</a>
                                    </li>
                                </ul>
                            </td>              
                        </tr>
                    <?php } ?>
                    </tbody>
                    <tfoot class="second-table__footer">
                        <tr>
                            <th class="second-goods-table__box1 footer-box">Tổng</th>         
                            <th class="second-goods-table__box2 footer-box"></th>         
                            <th class="second-goods-table__box3 footer-box"></th>         
                            <th class="second-goods-table__box4 footer-box">1.000</th>         
                            <th class="second-goods-table__box5 footer-box">10.000.000</th>         
                            <th class="second-goods-table__box6 footer-box"></th>         
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="second-footer">
                <div class="second-footer__label">Tổng số: <span><?= $count2 ?></span> bản ghi</div>
                <div class="second-footer-right">
                    <?php include 'salesPagin.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>