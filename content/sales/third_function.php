<?php 
include '../../function.php';
$regexResult = checkPrivilege();
if(!$regexResult) {
    echo "Bạn không có quyền truy cập chức năng này";
    exit;
}
    // Khách hàng
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
    $current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
    $offset = ($current_page - 1) * $item_per_page; 

    $queryCustomer = mysqli_query($con, "SELECT * FROM `customer` LEFT JOIN `customerDebt` ON `customer`.`id` = `customerdebt`.`customerid` LIMIT " . $item_per_page . " OFFSET " . $offset);
    
    $totalRecords = mysqli_query($con, "SELECT * FROM `customer`");
    $totalRecords = $totalRecords-> num_rows;
    $totalPage = ceil($totalRecords / $item_per_page);
    
    $count = 0;
?>
<div class="sales-third-function sales-function">
    <div class="second-header">
        <div class="second-header-heading"><?= $main['Danh sách Khách hàng'] ?></div>
        <button class="second-header__btn1">
        <a href="addData.php?salesNav=salesThird&data=addCus" class="btn-link"><?= $main['Thêm'] ?></a>
        </button>
    </div>
    <div class="second-box">
        <div class="second-box1">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($DebtCusOver, 0, ",",".") ?></div>
                <div class="second-box__money-title"><?= $main['Nợ quá hạn'] ?></div>
            </div>
        </div>
        <div class="second-box2">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($TotalDebtCollect, 0, ",",".") ?></div>
                <div class="second-box__money-title"><?= $main['Tổng nợ phải thu'] ?></div>
            </div>
        </div>
        <div class="second-box3">
            <div class="second-box-wrap">
                <div class="second-box__money-total"><?= number_format($TotalCusCollected, 0, ",",".") ?></div>
                <div class="second-box__money-title"><?= $main['Đã thanh toán'] ?></div>
            </div>
        </div>
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
                                <li class="dropdown-items">Thu</li>
                                <li class="dropdown-items">Chi</li>
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
                    <i class="fa-solid fa-magnifying-glass header-end__search-icon"></i>
                </div>
            </div>   
            <div class="second-content-table">
                <table class="second-table">
                    <thead class="second-table__thead">
                        <tr>
                            <th class="second-sup-table__box1 table-header"><?= $main['Mã nhà cung cấp'] ?></th>              
                            <th class="second-sup-table__box2 table-header"><?= $main['Tên Khách hàng'] ?></th>              
                            <th class="second-sup-table__box3 table-header"><?= $main['Địa chỉ'] ?></th>              
                            <th class="second-sup-table__box4 table-header"><?= $main['Công nợ'] ?></th>              
                            <th class="second-sup-table__box5 table-header"><?= $main['Số điện thoại'] ?></th>              
                            <th class="second-sup-table__box6 table-header"><?= $main['Chức năng'] ?></th>              
                        </tr>
                    </thead> 
                    <tbody class="second-table__body">
                    <?php while($row = mysqli_fetch_array($queryCustomer)) { 
                        $debt = $row['collect'] == 'not collect' ? $debt = $row['debt'] : $debt = 0;
                        $count++;
                    ?>
                        <tr>
                            <td class="second-sup-table__box1 table-box"><?= $row['id'] ?></td>              
                            <td class="second-sup-table__box2 table-box"><?= $row['name'] ?></td>              
                            <td class="second-sup-table__box3 table-box"><?= $row['location'] ?></td>              
                            <td class="second-sup-table__box4 table-box"><?= number_format($debt, 0, ",",".") ?></td>              
                            <td class="second-sup-table__box5 table-box"><?= $row['phoneNumber'] ?></td>              
                            <td class="third-table__box6 table-box">
                                <a href="#" class="third-table-see"><?= $main['Lập CT bán hàng'] ?></a>
                                <i class="fa-solid fa-angle-down open--box-function"></i>
                                <ul class="third-table-function-list">
                                    <?php if (checkPrivilege('addData.php?salesNav='.$tam.'&data=edit&id='.$row['id'])) { ?>
                                    <li class="third-table-function-items">
                                        <a href="addData.php?salesNav=<?= $tam ?>&data=edit&id=<?= $row['id'] ?>" class="third-table-see"><?= $main['Sửa'] ?></a>
                                    </li>
                                    <?php } ?>
                                    <?php if (checkPrivilege('addData.php?salesNav='.$tam.'&data=delete&id='.$row['id'])) { ?>
                                    <li class="third-table-function-items">
                                        <a href="addData.php?salesNav=<?= $tam ?>&data=delete&id=<?= $row['id'] ?>" class="third-table-see"><?= $main['Xóa'] ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </td>              
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="second-footer">
                <div class="second-footer__label"><?= $main['Tổng số'] ?>: <span><?= $count ?></span> <?= $main['bản ghi'] ?></div>
                <div class="second-footer-right">
                    <?php include 'salesPagin.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>