<?php 
    // Khách hàng
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 1;
    $current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
    $offset = ($current_page - 1) * $item_per_page; 

    $queryCustomer = mysqli_query($con, "SELECT * FROM `customer` INNER JOIN `customerDebt` LIMIT " . $item_per_page . " OFFSET " . $offset);
    
    $totalRecords = mysqli_query($con, "SELECT * FROM `customer`");
    $totalRecords = $totalRecords-> num_rows;
    $totalPage = ceil($totalRecords / $item_per_page);
    
    $count = 0;
?>
<div class="sales-third-function sales-function">
    <div class="second-header">
        <div class="second-header-heading">Danh sách Khách hàng</div>
        <button class="second-header__btn1">Thêm</button>
    </div>
    <div class="second-box">
        <div class="second-box1">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($DebtCusOver, 0, ",",".") ?></div>
                <div class="second-box__money-title">Nợ quá hạn</div>
            </div>
        </div>
        <div class="second-box2">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($TotalDebtCollect, 0, ",",".") ?></div>
                <div class="second-box__money-title">Tổng nợ phải thu</div>
            </div>
        </div>
        <div class="second-box3">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($TotalCusCollected, 0, ",",".") ?></div>
                <div class="second-box__money-title">Đã thanh toán</div>
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
                            <th class="second-sup-table__box1 table-header">Mã nhà cung cấp</th>              
                            <th class="second-sup-table__box2 table-header">Tên Khách hàng</th>              
                            <th class="second-sup-table__box3 table-header">Đại chỉ</th>              
                            <th class="second-sup-table__box4 table-header">Công nợ</th>              
                            <th class="second-sup-table__box5 table-header">Số điện thoại</th>              
                            <th class="second-sup-table__box6 table-header">Chức năng</th>              
                        </tr>
                    </thead> 
                    <tbody class="second-table__body">
                    <?php while($row = mysqli_fetch_array($queryCustomer)) { 
                        $debt = $row['collect'] == 'collect' ? $debt = $row['debt'] : $debt = 0;
                        $count++;
                    ?>
                        <tr>
                            <td class="second-sup-table__box1 table-box"><?= $row['id'] ?></td>              
                            <td class="second-sup-table__box2 table-box"><?= $row['name'] ?></td>              
                            <td class="second-sup-table__box3 table-box"><?= $row['location'] ?></td>              
                            <td class="second-sup-table__box4 table-box"><?= number_format($debt, 0, ",",".") ?></td>              
                            <td class="second-sup-table__box5 table-box"><?= $row['phoneNumber'] ?></td>              
                            <td class="third-table__box6 table-box">
                                <a href="#" class="third-table-see">Lập CT bán hàng</a>
                                <i class="fa-solid fa-angle-down"></i>
                                <ul class="third-table-function-list">
                                    <li class="third-table-function-items">
                                        <a href="#" class="third-table-function__delete">Xem</a>
                                    </li>
                                    <li class="third-table-function-items">
                                        <a href="#" class="third-table-function__delete">Sửa</a>
                                    </li>
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
                    <?php include 'salesPagin.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>