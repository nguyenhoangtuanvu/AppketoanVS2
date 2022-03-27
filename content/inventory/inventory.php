<?php session_start(); 
if(!isset($_SESSION["logged"])) {
    header("location:login.php");
}
?>
<?php 
include '../../connect_db.php';
    
// hang hóa sắp hết và đã hết
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
                <div class="nav-inventory nav-function nav--open-sidebar">
                    <ul class="nav-list">
                        <li class="nav-items inventory-nav nav-items--active">
                            <a href="?inventoryNav=inventoryFirst" class="nav-link">Quy trình</a></li>
                        <li class="nav-items inventory-nav">
                            <a href="?inventoryNav=inventorySecond" class="nav-link">Nhập, xuất kho</a></li>
                        <li class="nav-items inventory-nav">
                            <a href="?inventoryNav=inventoryThird" class="nav-link">Kiểm kê</a></li>
                        <li class="nav-items inventory-nav">
                            <a href="?inventoryNav=inventoryFourth" class="nav-link">Hàng hóa, dịch vụ</a></li>
                        <li class="nav-items inventory-nav">
                            <a href="?inventoryNav=inventoryFifth" class="nav-link">Báo cáo</a></li>
                    </ul>
                </div>
            </div>
            <!-- navigation end -->

            <!-- content -->
            <div class="content">
                <div class="content-wrapper inventory sidebar--open">
                <?php
                        if(isset($_GET['inventoryNav'])&&($_GET['inventoryNav'])!=''){
                            $tam= $_GET['inventoryNav'];
                        }else {
                            $tam = 'inventoryFirst';
                        }if($tam == 'inventoryFirst'){
                            include('first_function.php');
                        }elseif($tam == 'inventorySecond'){
                            include('second_function.php');
                        }elseif($tam == 'inventoryThird'){
                            include('third_function.php');
                        }elseif($tam == 'inventoryFourth'){
                            include('fourth_function.php');
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