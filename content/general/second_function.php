<div class="general-second-function general-function">
    <div class="second-header">
        <div class="second-header-heading">Kết chuyển lãi lỗ</div>
        <button class="second-header__btn1">Thêm chuyển lãi lỗ</button>
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
                            <th class="general-second-table__box1 table-header">Số chứng từ</th>              
                            <th class="general-second-table__box2 table-header">Ngày hoạch toán</th>              
                            <th class="general-second-table__box3 table-header">Ngày chứng từ</th>              
                            <th class="general-second-table__box4 table-header">Diễn dải</th>              
                            <th class="general-second-table__box5 table-header">Số tiền</th>              
                            <th class="general-second-table__box6 table-header">Chức năng</th>              
                        </tr>
                    </thead> 
                    <tbody class="second-table__body">
                        <?php while($row = mysqli_fetch_array($querySummary)) {
                            $TableAmount += $row['amount']; 
                            $count++;   
                        ?>
                        <tr>
                            <td class="general-second-table__box1 table-box"><?= $row['id'] ?></td>              
                            <td class="general-second-table__box2 table-box"><?= $row['postedDate'] ?></td>              
                            <td class="general-second-table__box3 table-box"><?= $row['voucherDate'] ?></td>              
                            <td class="general-second-table__box4 table-box"><?= $row['descrition'] ?></td>   
                            <th class="general-second-table__box5 table-header"><?= number_format($row['amount'], 0, ",",".") ?></th>              
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
                            <th class="general-second-table__box1 footer-box">Tổng</th>         
                            <th class="general-second-table__box2 footer-box"></th>         
                            <th class="general-second-table__box3 footer-box"></th>         
                            <th class="general-second-table__box4 footer-box"></th>         
                            <th class="general-second-table__box5 footer-box"><?= number_format($TableAmount, 0, ",",".") ?></th>         
                            <th class="general-second-table__box6 footer-box"></th>         
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="second-footer">
                <div class="second-footer__label">Tổng số: <span><?= $count ?></span> bản ghi</div>
                <div class="second-footer-right">
                    <?php '../pagination.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>