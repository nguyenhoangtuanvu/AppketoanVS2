<?php
    // query tiền mặt
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
    $current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
    $offset = ($current_page - 1) * $item_per_page; 

    $queryCash = mysqli_query($con, "SELECT * FROM `cash` LIMIT " . $item_per_page . " OFFSET " . $offset);
    $totalRecords = mysqli_query($con, "SELECT * FROM `cash`");
    $totalRecords = $totalRecords-> num_rows;
    $totalPage = ceil($totalRecords / $item_per_page);
    $cashTotal = 0;
?>
<div class="cash-second-function cash--function">
    <div class="second-header">
        <div class="second-header-heading"><?= $main['Thu chi tiền mặt'] ?></div>
        <button class="second-header__btn1">
            <a href="addData.php?cashNav=cashSecond&data=thu" class="btn-link"><?= $main['Thêm thu tiền'] ?></a> </button>
        <button class="second-header__btn2">
            <a href="addData.php?cashNav=cashSecond&data=chi" class="btn-link"><?= $main['Thêm chi tiền'] ?></a> </button>
    </div>
    <div class="second-box">
        <div class="second-box1">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($revenuYear, 0, ",",".") ?></div>
                <div class="second-box__money-title"><?= $main['Tổng thu đầu năm đến hiện tại'] ?></div>
            </div>
        </div>
        <div class="second-box2">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($CostYear, 0, ",",".") ?></div>
                <div class="second-box__money-title"><?= $main['Tổng chi đầu năm đến hiện tại'] ?></div>
            </div>
        </div>
        <div class="second-box3">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($ExistYear, 0, ",",".") ?></div>
                <div class="second-box__money-title"><?= $main['Tồn quỹ hiện tại'] ?></div>
            </div>
        </div>
    </div>
    <div class="second-content-nav">
        <ul class="second-content-nav__list">
            <li class="second-content-nav__items second-content-nav__items--active"><?= $main['Tất cả'] ?></li>
            <li class="second-content-nav__items"><?= $main['Thu tiền'] ?></li>
            <li class="second-content-nav__items"><?= $main['Chi tiền'] ?></li>
        </ul>
    </div>
    <div class="second-content">
        <div class="second-content-wrap">
            <div class="second-content-header">
                <div class="second-content__filter">
                    <span class="second-content__filter-label"><?= $main['Lọc'] ?></span>
                    <i class="fa-solid fa-angle-down"></i>
                    <form method="GET" class="second-content-time-line__dropdown-list">
                        <span class="dropdown-label">Thu, chi</span>
                        <div class="dropdown-box-wrap"> 
                            <select name="receipt" class="dropdown-input">
                                <option value="receipt">receipt</option>
                                <option value="payment">payment</option>
                            </select>
                        </div>
                        <span class="dropdown-label">Thời gian</span>
                        <div class="dropdown-box-wrap">
                            <select class="dropdown-input">
                                <option class="dropdown-items" value="Hôm nay">Hôm nay</option>
                                <option class="dropdown-items" value="Tuần này">Tuần này</option>
                                <option class="dropdown-items" value="Tháng này">Tháng này</option>
                                <option class="dropdown-items" value="Tháng 1">Tháng 1</option>
                                <option class="dropdown-items" value="Tháng 2">Tháng 2</option>
                                <option class="dropdown-items" value="Tháng 3">Tháng 3</option>
                                <option class="dropdown-items" value="Tháng 4">Tháng 4</option>
                                <option class="dropdown-items" value="Tháng 5">Tháng 5</option>
                                <option class="dropdown-items" value="Tháng 6">Tháng 6</option>
                                <option class="dropdown-items" value="Tháng 7">Tháng 7</option>
                                <option class="dropdown-items" value="Tháng 8">Tháng 8</option>
                                <option class="dropdown-items" value="Tháng 9">Tháng 9</option>
                                <option class="dropdown-items" value="Tháng 10">Tháng 10</option>
                                <option class="dropdown-items" value="Tháng 11">Tháng 11</option>
                                <option class="dropdown-items" value="Tháng 12">Tháng 12</option>
                            </select>
                        </div>
                        <div class="dropdown-btn-wrap"><input type="submit" class="dropdown-btn">Lọc</input></div>
                    </form>
                </div>
                <span class="second-content-filter__value"><?= $main['Hôm nay'] ?></span>
                <div class="header-search">
                    <input type="text" class="header-search__input" placeholder="Nhập từ khóa tìm kiếm">
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
                            <th class="third-table__box6 table-header"><?= $main['Chức năng'] ?></th>              
                        </tr>
                    </thead> 
                    <tbody class="second-table__body">
                        <?php 
                        $count = 0;
                        while($row = mysqli_fetch_array($queryCash)) { 
                            $cashTotal += $row['totalAmount'];
                            $count++;
                        ?>
                        <tr>
                            <td class="second-table__box1 table-box"><?= $row['dateTime'] ?></td>              
                            <td class="second-table__box2 table-box"><?= $row['id'] ?></td>              
                            <td class="second-table__box3 table-box"><?= $row['content'] ?></td>              
                            <td class="second-table__box4 table-box"><?= number_format($row['totalAmount'], 0, ",",".") ?></td>              
                            <td class="second-table__box5 table-box"><?= $row['object'] ?></td>              
                            <td class="third-table__box6 table-box">
                                <a href="addData.php?cashNav=<?= $tam ?>&id=<?= $row['id'] ?>" class="third-table-see"><?= $main['Xem'] ?></a>
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
                            <th class="second-table__box4 footer-box"><?= number_format($cashTotal, 0, ",",".") ?></th>         
                            <th class="second-table__box5 footer-box"></th>         
                            <th class="second-table__box6 footer-box"></th>         
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="second-footer">
                <div class="second-footer__label"><?= $main['Tổng số'] ?>: <span><?= $count ?></span> <?= $main['bản ghi'] ?></div>
                <div class="second-footer-right">
                    <?php include 'cashPagin.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>