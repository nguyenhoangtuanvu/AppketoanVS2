<?php session_start(); 
if(!isset($_SESSION["logged"])) {
    header("location:login.php");
}
?>
<?php 
include '../../connect_db.php';
// tổng thu cả năm
    $queryRevenuYear = mysqli_query($con, "SELECT YEAR(dateTime), `totalMoney`  FROM `sales` ORDER BY `sales`.`dateTime` ASC");
    $revenuYear = 0;
    $now = getdate();
    while($row = mysqli_fetch_array($queryRevenuYear)) {
        if($row['YEAR(dateTime)'] == $now['year']) {
            $revenuYear += $row['totalMoney'];
        }
    }
    // tổng chi cả năm
    $queryCostYear = mysqli_query($con, "SELECT YEAR(dateTime), `quantity`, `price`  FROM `purchase` ORDER BY `purchase`.`dateTime` ASC");
    $CostYear = 0;
    while($row = mysqli_fetch_array($queryCostYear)) {
        $totalMoney = $row['quantity'] * $row['price'];
        if($row['YEAR(dateTime)'] == $now['year'])
        $CostYear += $totalMoney;
    }
    // tồn tiền cả năm
    $queryExistYear = mysqli_query($con, "SELECT YEAR(dateTime), `budget`  FROM `budget` ORDER BY `budget`.`dateTime` ASC");
    $ExistYear = 0;
    while($row = mysqli_fetch_array($queryExistYear)) {
        if($row['YEAR(dateTime)'] == $now['year']) {
            $ExistYear += $row['budget'];
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
                <div class="nav-banking nav-function nav--open-sidebar">
                    <ul class="nav-list">
                        <li class="nav-items banking-nav nav-items--active">
                            <a href="?bankingNav=bankingFirst" class="nav-link"> Quy trình</a></li>
                        <li class="nav-items banking-nav">
                            <a href="?bankingNav=bankingSecond" class="nav-link"> Thu, chi tiền</a></li>
                        <li class="nav-items banking-nav">
                            <a href="?bankingNav=bankingThird" class="nav-link"> Báo cáo</a></li>
                    </ul>
                </div>
            </div>
            <!-- navigation end -->

            <!-- content -->
            <div class="content">
                <div class="content-wrapper banking sidebar--open">
                <?php
                        if(isset($_GET['bankingNav'])&&($_GET['bankingNav'])!=''){
                            $tam= $_GET['bankingNav'];
                        }else {
                            $tam = 'bankingFirst';
                        }if($tam == 'bankingFirst'){
                            include('first_function.php');
                        }elseif($tam == 'bankingSecond'){
                            include('second_function.php');
                        }elseif($tam == 'bankingThird'){
                            include('third_function.php');
                        }
                    ?>
                </div>
    <script type="text/javascript" src="../../assets/JS/script.js"></script>
    <!-- <script type="text/javascript">
        var costMonth = <?php json_encode($CostMonth); ?>;
        console.log(costMonth);
    </script> -->
</script>
</body>
</html>