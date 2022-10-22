<?php session_start(); 
if(!isset($_SESSION["logged"])) {
    header("location:/AppketoanVS2/login.php");
}
?>
<?php 
include '../../connect_db.php';
// khách hàng nợ
    $queryCusDebt = mysqli_query($con, "SELECT * FROM `customerdebt`");
    $DebtCusOver = 0;
    $TotalDebtCollect = 0;
    $TotalCusCollected = 0;
    $notInvoice = 0;
    $now = date("y-m-d");
    while($row = mysqli_fetch_array($queryCusDebt)) {
        if($row['collect'] == 'collect') {
            $TotalDebtCollect += $row['debt'];
        }
        if($row['collect'] == 'collect' & strtotime($now) > strtotime($row['duration'])) {
            $DebtCusOver += $row['debt'];
        }
        if($row['collect'] == 'collected') {
            $TotalCusCollected += $row['debt'];
        }
    }
    $querySalesNotInvice = mysqli_query($con, "SELECT * FROM `sales`");
    while($row = mysqli_fetch_array($querySalesNotInvice)) {
        if($row['invoice'] == 1) {
            $notInvoice++;
        }
    }
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
            <!-- navigation start -->
            <div class="navigation">
                <div class="nav-sales nav-function nav--open-sidebar">
                    <ul class="nav-list">
                        <a href="?salesNav=salesFirst" class="nav-link"><li class="nav-items sales-nav nav-items--active"><?= $main['Quy trình'] ?></li></a>
                        <a href="?salesNav=salesSecond" class="nav-link"><li class="nav-items sales-nav"><?= $main['Bán hàng'] ?></li></a>
                        <a href="?salesNav=salesThird" class="nav-link"><li class="nav-items sales-nav"><?= $main['Khách hàng'] ?></li></a>
                        <a href="?salesNav=salesFourth" class="nav-link"><li class="nav-items sales-nav"><?= $main['Hàng hóa, dịch vụ'] ?></li></a>
                        <a href="?salesNav=salesFifth" class="nav-link"><li class="nav-items sales-nav"><?= $main['Báo cáo'] ?></li></a>
                    </ul>
                </div>
            </div>
            <!-- navigation end -->

            <!-- content -->
            <div class="content">
                <div class="content-wrapper sales sidebar--open">
                    <?php
                        if(isset($_GET['salesNav'])&&($_GET['salesNav'])!=''){
                            $tam= $_GET['salesNav'];
                        }else {
                            $tam = 'salesFirst';
                        }if($tam == 'salesFirst'){
                            include('first_function.php');
                        }elseif($tam == 'salesSecond'){
                            include('second_function.php');
                        }elseif($tam == 'salesThird'){
                            include('third_function.php');
                        }elseif($tam == 'salesFourth'){
                            include('fourth_function.php');
                        }
                    ?>
    <script type="text/javascript" src="../../assets/JS/script.js"></script>
    <!-- <script type="text/javascript">
        var costMonth = <?php json_encode($CostMonth); ?>;
        console.log(costMonth);
    </script> -->
    <script>
var boxFunction = document.getElementsByClassName("open--box-function");

var overlay2 = document.querySelector('.overlay-not-color');
var boxFunctionDropdownList = document.querySelectorAll(".third-table-function-list");

for(let i = 0; i < boxFunction.length; i++) {
    boxFunction[i].addEventListener('click', function() {
        overlay2.classList.remove('overlay--active');
        for(let j = 0; j < boxFunctionDropdownList.length; j++) {
            boxFunctionDropdownList[j].classList.remove("dropdown-list--active");
            if(i == j) {
                boxFunctionDropdownList[j].classList.add("dropdown-list--active");
                overlay2.classList.add('overlay--active');
            }
        }
    })
    overlay2.addEventListener('click', function() {
        for(let a = 0; a < boxFunctionDropdownList.length; a++) {
            console.log('over2')
            boxFunctionDropdownList[i].classList.remove("dropdown-list--active");
            overlay2.classList.remove('overlay--active');
        }
    });
}
    </script>
</body>
</html>