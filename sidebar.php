<?php
include_once 'languageHelper.php';
$object = new LanguageHelper();
$lang = $object->checkLang();
include_once($lang);
$vi = $main['en-vi'];
$en = $main['en-en'];
$language = $main['language'];
?>
<div class="sidebar">
    <header class="sidebar-header">
        <a href="../index.html" class="sidebar-home"><i class="fa-solid fa-house"></i></a>
        <!-- <img src="assets/img/Picture1.png" alt="" class="sidebar-ketoan-img"> -->
        <h3 class="sidebar-head">Kế Toán</h3>
    </header>
    <ul class="sidebar-work-list">
        <li class="sidebar-work-items sidebar-work-list--active">
            <a class="sidebar-work__link" href="/AppketoanVS2/index.php"><i class="fa-solid fa-gauge-high"></i><span class="sidebar-work-title"><?= $main['tổng quan'] ?></span></a>
        </li>
        <li class="sidebar-work-items">
            <a class="sidebar-work__link" href="/AppketoanVS2/content/cash/cash.php"><i class="fa-solid fa-dollar-sign"></i><span class="sidebar-work-title"><?= $main['tiền mặt'] ?></span></a>
        </li>
        <li class="sidebar-work-items">
            <a class="sidebar-work__link" href="/AppketoanVS2/content/banking/banking.php"><i class="fa-solid fa-piggy-bank"></i><span class="sidebar-work-title"><?= $main['Tiền gửi'] ?></span></a>
        </li>
        <li class="sidebar-work-items">
            <a class="sidebar-work__link" href="/AppketoanVS2/content/purchase/purchase.php"><i class="fa-solid fa-bag-shopping"></i><span class="sidebar-work-title"><?= $main['Mua hàng'] ?></span></a>
        </li>
        <li class="sidebar-work-items">
            <a class="sidebar-work__link" href="/AppketoanVS2/content/sales/sales.php"><i class="fa-solid fa-cart-shopping"></i><span class="sidebar-work-title"><?= $main['Bán hàng'] ?></span></a>
        </li>
        <li class="sidebar-work-items">
            <a class="sidebar-work__link" href="/AppketoanVS2/content/invoice/invoice.php"><i class="fa-solid fa-file-invoice-dollar"></i><span class="sidebar-work-title"><?= $main['Quản lý hóa đơn'] ?></span></a>
        </li>
        <li class="sidebar-work-items">
            <a class="sidebar-work__link" href="/AppketoanVS2/content/inventory/inventory.php"><i class="fa-solid fa-store"></i><span class="sidebar-work-title"><?= $main['Kho'] ?></span></a>
        </li>
        <li class="sidebar-work-items">
            <a class="sidebar-work__link" href="#"><i class="fa-solid fa-screwdriver-wrench"></i><span class="sidebar-work-title"><?= $main['Công cụ'] ?></span></a>
        </li>
        <li class="sidebar-work-items">
            <a class="sidebar-work__link" href="#"><i class="fa-solid fa-car"></i><span class="sidebar-work-title"><?= $main['Tài sản cố định'] ?></span></a>
        </li>
        <li class="sidebar-work-items">
            <a class="sidebar-work__link" href="#"><i class="fa-solid fa-building-columns"></i><span class="sidebar-work-title"><?= $main['Thuế'] ?></span></a>
        </li>
        <li class="sidebar-work-items">
            <a class="sidebar-work__link" href="#"><i class="fa-solid fa-tag"></i><span class="sidebar-work-title"><?= $main['Giá thành'] ?></span></a>
        </li>
        <li class="sidebar-work-items">
            <a class="sidebar-work__link" href="/AppketoanVS2/content/general/general.php"><i class="fa-solid fa-book"></i><span class="sidebar-work-title"><?= $main['Tổng hợp'] ?></span></a>
        </li>
        <li class="sidebar-work-items">
            <a class="sidebar-work__link" href="#"><i class="fa-solid fa-money-bill-1-wave"></i><span class="sidebar-work-title"><?= $main['Ngân sách'] ?></span></a>
        </li>
        <li class="sidebar-work-items">
            <a class="sidebar-work__link" href="#"><i class="fa-solid fa-file-invoice"></i><span class="sidebar-work-title"><?= $main['Báo cáo'] ?></span></a>
        </li>
        <li class="sidebar-work-items">
            <a class="sidebar-work__link" href="#"><i class="fa-solid fa-chart-line"></i><span class="sidebar-work-title"><?= $main['Phân tích tài chính'] ?></span></a>
        </li>
        <li class="sidebar-work-items">
            <a class="sidebar-work__link" href="/AppketoanVS2/content/employee/employee.php"><i class="fa-solid fa-user-group"></i><span class="sidebar-work-title"><?= $main['Nhân viên'] ?></span></a>
        </li>
    </ul>
</div>