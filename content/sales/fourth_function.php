<?php 
include '../../function.php';
$regexResult = checkPrivilege();
if(!$regexResult) {
    echo "Bạn không có quyền truy cập chức năng này";
    exit;
}
    //    sản phẩm
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
    $current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
    $offset = ($current_page - 1) * $item_per_page; 

    $Products = mysqli_query($con, "SELECT P.id AS id, P.proname AS product, C.catename AS category, P.quantity AS quantity, P.price AS price FROM `products` P
    INNER JOIN `category` C ON P.`categoryid` = C.`id`
    LIMIT " . $item_per_page . " OFFSET " . $offset);
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
        <div class="second-header-heading"><?= $main['Danh sách hàng hóa dịch vụ'] ?></div>
        <button class="second-header__btn1">
        <a href="addData.php?salesNav=salesFourth&data=addPro" class="btn-link"><?= $main['Thêm'] ?></a>
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
                    <div class="header-end__search-icon"></div>
                </div>
            </div>   
            <div class="second-content-table">
                <table class="second-table">
                    <thead class="second-table__thead">
                        <tr>
                            <th class="second-goods-table__box1 table-header"><?= $main['Tên'] ?></th>              
                            <th class="second-goods-table__box2 table-header"><?= $main['Mã'] ?></th>              
                            <th class="second-goods-table__box3 table-header"><?= $main['Loại mặt hàng'] ?></th>              
                            <th class="second-goods-table__box4 table-header"><?= $main['Số lượng tồn'] ?></th>              
                            <th class="second-goods-table__box5 table-header"><?= $main['Giá trị tồn'] ?></th>              
                            <th class="second-goods-table__box6 table-header"><?= $main['Chức năng'] ?></th>              
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
                            <td class="second-goods-table__box1 table-box"><?= $row['product'] ?></td>              
                            <td class="second-goods-table__box2 table-box">D001</td>              
                            <td class="second-goods-table__box3 table-box"><?= $row['category'] ?></td>              
                            <td class="second-goods-table__box4 table-box"><?= number_format($row['quantity'], 0, ",",".") ?></td>              
                            <td class="second-goods-table__box5 table-box"><?= number_format($value, 0, ",",".") ?></td>              
                            <td class="third-table__box6 table-box">
                                <?php if (checkPrivilege('addData.php?salesNav='.$tam.'&data=edit&id='.$row['id'])) { ?>
                                <a href="addData.php?salesNav=<?= $tam ?>&data=edit&id=<?= $row['id'] ?>" class="third-table-see"><?= $main['Sửa'] ?></a>
                                <?php } ?>
                                <i class="fa-solid fa-angle-down open--box-function"></i>
                                <ul class="third-table-function-list">
                                    <li class="third-table-function-items">
                                        <a href="#" class="third-table-see"><?= $main['Nhân bản'] ?></a>
                                    </li>
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
                    <tfoot class="second-table__footer">
                        <tr>
                            <th class="second-goods-table__box1 footer-box"><?= $main['Tổng'] ?></th>         
                            <th class="second-goods-table__box2 footer-box"></th>         
                            <th class="second-goods-table__box3 footer-box"></th>         
                            <th class="second-goods-table__box4 footer-box"><?= number_format($tableTotalQuantity, 0, ",",".") ?></th>         
                            <th class="second-goods-table__box5 footer-box"><?= number_format($tableTotalValue, 0, ",",".") ?></th>         
                            <th class="second-goods-table__box6 footer-box"></th>         
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="second-footer">
                <div class="second-footer__label"><?= $main['Tổng số'] ?>: <span><?= $count2 ?></span> <?= $main['bản ghi'] ?></div>
                <div class="second-footer-right">
                    <?php include 'salesPagin.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>