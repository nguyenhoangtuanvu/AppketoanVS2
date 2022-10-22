<?php
session_start();
if(!isset($_SESSION["logged"])) {
    header("location:/AppketoanVS2/login.php");
}
// var_dump($_SESSION['logged']);exit;
include '../../connect_db.php';
include '../../function.php';
$regexResult = checkPrivilege();
if(!$regexResult) {
    echo "Bạn không có quyền truy cập chức năng này";
    exit;
}

$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 5;
$current_page = !empty($_GET['currant_page']) ? $_GET['currant_page'] : 1;
$offset = ($current_page - 1) * $item_per_page; 

$queryEm = mysqli_query($con,"SELECT * FROM `employee` LIMIT " . $item_per_page . " OFFSET " . $offset);

$totalRecords = mysqli_query($con, "SELECT * FROM `employee`");
$totalRecords = $totalRecords-> num_rows;
$totalPage = ceil($totalRecords / $item_per_page);

// var_dump($_SESSION["logged"]['Privileges']);exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-free-6.0.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&family=Roboto&display=swap" rel="stylesheet">
    <title>Kế Toán</title>
</head>
<body>
    <div class="grid">
        <?php include '../../sidebar.php' ?>
        <div class="container">
            <!-- header -->
            <?php include '../../header.php'; ?>
            <div class="navigation">
                <div class="nav-overview nav--open-sidebar">
                    <h2 class="overview-heading"><?= $main['Phân quyền thành viên'] ?></h2>
                </div>
            </div>
            <div class="content-employee">
                <div class="content-box">
                    <div class="box-heading-em"><?= $main['Danh sách nhân viên'] ?></div>
                    <table class="employee-list">
                        <thead>
                            <th class="table-box-1 table-header"><?= $main['Tên'] ?></th>
                            <th class="table-box-2 table-header"><?= $main['tuổi'] ?></th>
                            <th class="table-box-3 table-header"><?= $main['Địa chỉ'] ?></th>
                            <th class="table-box-4 table-header"><?= $main['Giới tính'] ?></th>
                            <th class="table-box-5 table-header"><?= $main['Số điện thoại'] ?></th>
                            <th class="table-box-6 table-header"><?= $main['Chức năng'] ?></th>
                        </thead>
                        <tbody>
                            <?php $count = 0;
                             while($row = mysqli_fetch_array($queryEm)) { 
                                $count++;     
                            ?>
                            <tr>
                                <td class="table-box-1 table-box"><?= $row['staffName'] ?></td>
                                <td class="table-box-2 table-box"><?= $row['age'] ?></td>
                                <td class="table-box-3 table-box"><?= $row['location'] ?></td>
                                <td class="table-box-4 table-box"><?= $row['gender'] ?></td>
                                <td class="table-box-5 table-box"><?= $row['phoneNumber'] ?></td>
                                <td class="table-box-6 table-box">
                                    <a href="privilege.php?&id=<?= $row['id'] ?>" class="third-table-see"><?= $main['Phân quyền'] ?></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="second-footer">
                    <div class="second-footer__label"><?= $main['Tổng số'] ?>: <span><?= $count ?></span> <?= $main['bản ghi'] ?></div>
                    <div class="second-footer-right">
                        <?php include 'EmPagin.php' ?>
                    </div>
            </div>
                </div>
            </div>

        </div>
    </div>
    <script src="../../assets/JS/script.js"></script>
</body>
</html>