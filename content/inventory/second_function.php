<?php
// hàng nhập xuất kho
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
$current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
$offset = ($current_page - 1) * $item_per_page; 

$queryInventoryHistory = mysqli_query($con, "SELECT h.id AS id, h.dateTime AS `dateTime`, h.content AS `content`, p.proname AS `product`, h.inventoryQuantity AS `quantity`, em.staffName AS `employee`
FROM `inventoryhistory` h
    INNER JOIN `products` p ON h.productid = p.id
    INNER JOIN `employee` em ON h.employeeid = em.id 
    LIMIT " . $item_per_page . " OFFSET " . $offset);

$totalRecords = mysqli_query($con, "SELECT * FROM `inventoryHistory`");
$totalRecords = $totalRecords-> num_rows;
$totalPage = ceil($totalRecords / $item_per_page);

$TableTotalProduct = 0;


?>
<div class="inventory-second-function inventory-function">
    <div class="second-header">
        <div class="second-header-heading"><?= $main['Nhập, xuất kho'] ?></div>
        <button class="second-header__btn1">
        <a href="addData.php?inventoryNav=inventorySecond&data=addInput" class="btn-link"><?= $main['Thêm nhập kho'] ?></a>
        </button>
        <button class="second-header__btn2">
        <a href="addData.php?inventoryNav=inventorySecond&data=addExport" class="btn-link"><?= $main['Thêm xuất kho'] ?></a>
        </button>
    </div>
    <div class="fourth-box">
        <div class="fourth-box1">
            <div class="fourth-box1-icon"></div>
            <div class="fourth-box__summary">
                <div class="fourth-box__money orange-color text-align-right"><?= $productRunout ?></div>
                <div class="fourth-box__money-title text-align-right"><?= $main['Hàng hóa'] ?></div>
                <div class="fourth-box__money-summary text-align-right"><?= $main['Sắp hết hàng'] ?></div>
            </div>
        </div>
        <div class="fourth-box2">
            <div class="fourth-box2-icon"></div>
            <div class="fourth-box__summary">
                <div class="fourth-box__money red-color"><?= $productOut ?></div>
                <div class="fourth-box__money-title"><?= $main['Hàng hóa'] ?></div>
                <div class="fourth-box__money-summary"><?= $main['Hết hàng'] ?></div>
            </div>
        </div>
    </div>
    <div class="second-content-nav">
        <ul class="second-content-nav__list">
            <li class="second-content-nav__items second-content-nav__items--active"><?= $main['Tất cả'] ?></li>
            <li class="second-content-nav__items"><?= $main['Nhập kho'] ?></li>
            <li class="second-content-nav__items"><?= $main['Xuất kho'] ?></li>
            <li class="second-content-nav__items"><?= $main['Chuyển kho'] ?></li>
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
                            <input type="text" class="dropdown-input" placeholder="<?= $main['Tất cả'] ?>">
                            <i class="fa-solid fa-angle-down"></i>
                            <ul class="dropdown-box-list">
                                <li class="dropdown-items dropdown-items--active"><?= $main['Tất cả'] ?></li>
                                <li class="dropdown-items"><?= $main['Thu'] ?></li>
                                <li class="dropdown-items"><?= $main['Chi'] ?></li>
                            </ul>
                        </div>
                        <span class="dropdown-label">Thời gian</span>
                        <div class="dropdown-box-wrap">
                            <input type="text" class="dropdown-input" placeholder="<?= $main['Hôm nay'] ?>">
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
                            <th class="second-inventory-table__box1 table-header"><?= $main['Ngày hoạch toán'] ?></th>              
                            <th class="second-inventory-table__box2 table-header"><?= $main['STT'] ?></th>              
                            <th class="second-inventory-table__box3 table-header"><?= $main['Nội dung'] ?></th>              
                            <th class="second-inventory-table__box4 table-header"><?= $main['Hàng hóa'] ?></th>              
                            <th class="second-inventory-table__box5 table-header"><?= $main['Số lượng'] ?></th>              
                            <th class="second-inventory-table__box6 table-header"><?= $main['Người giao/ nhận'] ?></th>              
                            <th class="second-inventory-table__box7 table-header"><?= $main['Chức năng'] ?></th>              
                        </tr>
                    </thead> 
                    <tbody class="second-table__body">
                    <?php $count =0; 
                    while($row = mysqli_fetch_array($queryInventoryHistory)) { 
                        $TableTotalProduct += $row['quantity'];
                        $count++;
                    ?>
                        <tr>
                            <td class="second-inventory-table__box1 table-box"><?= $row['dateTime'] ?></td>              
                            <td class="second-inventory-table__box2 table-box">1</td>              
                            <td class="second-inventory-table__box3 table-box"><?= $row['content'] ?></td>              
                            <td class="second-inventory-table__box4 table-box"><?= $row['product'] ?></td>              
                            <td class="second-inventory-table__box5 table-box"><?= $row['quantity'] ?></td>              
                            <td class="second-inventory-table__box6 table-box"><?= $row['employee'] ?></td>              
                            <td class="third-table__box6 table-box">
                                <a href="addData.php?inventoryNav=<?= $tam ?>&data=view&id=<?= $row['id'] ?>" class="third-table-see"><?= $main['Xem'] ?></a>
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
                            <th class="second-inventory-table__box1 footer-box"><?= $main['Tổng'] ?></th>         
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
                <div class="second-footer__label"><?= $main['Tổng số'] ?>: <span><?= $count ?></span> <?= $main['bản ghi'] ?></div>
                <div class="second-footer-right">
                    <?php include 'inventoryPagin.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>