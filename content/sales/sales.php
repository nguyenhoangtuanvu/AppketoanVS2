<?php session_start(); 
if(!isset($_SESSION["logged"])) {
    header("location:login.php");
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
                        <li class="nav-items sales-nav nav-items--active">
                            <a href="?salesNav=salesFirst" class="nav-link">Quy trình</a></li>
                        <li class="nav-items sales-nav">
                            <a href="?salesNav=salesSecond" class="nav-link">Bán hàng</a></li>
                        <li class="nav-items sales-nav">
                            <a href="?salesNav=salesThird" class="nav-link">Khách hàng</a></li>
                        <li class="nav-items sales-nav">
                            <a href="?salesNav=salesFourth" class="nav-link">Hàng hóa, dịch vụ</a></li>
                        <li class="nav-items sales-nav">
                            <a href="?salesNav=salesFifth" class="nav-link">Báo cáo</a></li>
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
</script>
</body>
</html>