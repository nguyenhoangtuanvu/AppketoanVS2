<?php 
// language
session_start();
include_once '../../languageHelper.php';
$object = new LanguageHelper();
$lang = $object->checkLang();
include_once('../../'.$lang);
$vi = $main['en-vi'];
$en = $main['en-en'];
$language = $main['language'];

include '../../connect_db.php';
    if(isset($_GET['salesNav']) && $_GET['salesNav'] != '') {
        $tam = $_GET['salesNav'];
    }else {
        $tam = 'salesSecond';
    }

    
    if(isset($_GET['data']) && $_GET['data'] != '') {
        $stt = $_GET['data'];
    }else {
        $stt = 'addSales';
    }
    if($stt == 'addSales') {
        $title = 'bán hàng';
    }elseif($stt == 'addCus') {
        $title = 'thêm Khách hàng';
    }elseif($stt == 'addPro') {
        $title = 'thêm hàng hóa';
    }elseif($stt == 'view') {
        $title = 'bán hàng';
    }

    $querySupplier = mysqli_query($con, "SELECT * FROM `supplier` ");
    $querysupplier = mysqli_query($con, "SELECT * FROM `supplier` ");
    $getSupId = 0;
    $queryCustomer  = mysqli_query($con, "SELECT * FROM `customer` ");
    $querycustomer  = mysqli_query($con, "SELECT * FROM `customer` ");

    $queryEmployee  = mysqli_query($con, "SELECT * FROM `employee` ");

    $queryProduct  = mysqli_query($con, "SELECT * FROM `products` ");
    $queryproductId  = mysqli_query($con, "SELECT * FROM `products` ");
    $productId = 0;

    $queryCategory  = mysqli_query($con, "SELECT * FROM `category` ");
    $querycategoryId  = mysqli_query($con, "SELECT * FROM `category` ");

    $queryInventoryId  = mysqli_query($con, "SELECT * FROM `inventory` ");
    $queryinventoryId  = mysqli_query($con, "SELECT * FROM `inventory` ");

    $queryEmployeeId  = mysqli_query($con, "SELECT * FROM `employee` ");
    $employeeId = 0;
    $receiptPayment = '';
    $error = '';

    // check
    

    if($stt == 'addSales'){
        if (isset($_GET['action']) && ($_GET['action'] == 'addSales')) {
            while($row = mysqli_fetch_array($querycustomer)) { 
                if($row['name'] == $_POST['customer']) {
                    $getCusId = $row['id'];
                }
            }
            while($row = mysqli_fetch_array($queryEmployeeId)) { 
                if($row['staffName'] == $_POST['employee']) {
                    $employeeId = $row['id'];
                }
            }
            while($row = mysqli_fetch_array($queryproductId)) { 
                if($row['proname'] == $_POST['product']) {
                    $productId = $row['id'];
                }
            }
            while($row = mysqli_fetch_array($querycategoryId)) { 
                if($row['catename'] == $_POST['category']) {
                    $cateId = $row['id'];
                }
            }
            $totalAmount = $_POST['quantity'] * $_POST['price'];
            if (isset($_POST['customer']) && isset($_POST['employee']) && isset($_POST['duration']) && isset($_POST['product'])) {
                // $title = $_POST['datetime'] . $_POST['content']. $productId . "," .$_POST['quantity'].  "," .$_POST['price'] .   "," .$getSupId .  "," . $employeeId;
                $insertSales = "INSERT INTO `sales` (`id`, `dateTime`, `customerid`, `poductid`, `categoryid`, `employeeid`, `quantity`, `totalMoney`, `invoice`) 
                VALUES (NULL,'" . $_POST['datetime'] . "','" .$getCusId. "','" .$productId. "','" .$cateId. "','" .$employeeId. "', '" . $_POST['quantity'] . "', '" . $totalAmount . "', '0');";
                if($result = mysqli_query($con, $insertSales)) {
                    $idSales = mysqli_insert_id($con);
                    // $title = $getCusId . "', '". $_POST['customer'] ."', '". $totalAmount ."', '". $_POST['duration'] ."', 'not collect', '". $idSales;
                    $insertCusDebt = mysqli_query($con, "INSERT INTO `customerdebt`(`CusDid`, `customerid`, `customername`, `debt`, `duration`, `collect`, `salesid`) 
                    VALUES (NULL, '" . $getCusId . "', '". $_POST['customer'] ."', '". $totalAmount ."', '". $_POST['duration'] ."', 'not collect', '". $idSales ."'); ");
                }
            }
        }
    }elseif($stt == 'addCus'){
        if (isset($_GET['action']) && ($_GET['action'] == 'addCus')) {
            if (isset($_POST['customer']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['email'])) {
                    $result = mysqli_query($con, "INSERT INTO `customer` (`id`, `name`, `location`, `phoneNumber`, `email`, `tax`)
                    VALUES (NULL,'" . $_POST['customer'] . "','" .$_POST['address']. "', '" . $_POST['phone'] . "', '" . $_POST['email'] . "', '" . $_POST['tax'] . "');");
            } else { //Nếu có lỗi xảy ra
                $error = "Have a error in the processing";
            }
        }
    }elseif($stt == 'addPro'){
        if (isset($_GET['action']) && ($_GET['action'] == 'addPro')) {
            while($row = mysqli_fetch_array($querysupplier)) { 
                if($row['name'] == $_POST['supplier']) {
                    $suppId = $row['id'];
                }
            }
            while($row = mysqli_fetch_array($querycategoryId)) { 
                if($row['name'] == $_POST['category']) {
                    $cateId = $row['id'];
                }
            }
            while($row = mysqli_fetch_array($queryinventoryId)) { 
                if($row['name'] == $_POST['inventory']) {
                    $invenId = $row['id'];
                }
            }
            if (isset($_POST['proname']) && isset($_POST['supplier']) && isset($_POST['category']) && isset($_POST['inventory']) && isset($_POST['price'])) {
                    $result = mysqli_query($con, "INSERT INTO `products` (`id`, `proname`, `price`, `quantity`, `minimumQuantity`, `unit`, `inventoryid`, `categoryid`, `supplierid`) 
                    VALUES (NULL,'" . $_POST['proname'] . "','" .$_POST['price']. "', NULL , '" . $_POST['miniQuantity'] . "', '" . $_POST['unit'] . "', '" . $invenId . "', '" . $cateId . "','" . $suppId . "');");
            } else { //Nếu có lỗi xảy ra
                $error = "Have a error in the processing";
            }
        }
    }elseif ($stt == 'check') {
        if (isset($_GET['action']) && ($_GET['action'] == 'check')) {
            if (isset($_POST['purpose']) && isset($_POST['dateTo']) && isset($_POST['datetime'])) {
                $query = "INSERT INTO `checkcash` 
                (`id`, `dateTime`, `dateTimeTo`, `moneyUnit`, `content`) 
                VALUES (NULL,'" . $_POST['datetime'] . "','" .$_POST['dateTo']. "', '" . $_POST['moneyUnit'] . "', '" . $_POST['purpose'] . "');";
                if(mysqli_query($con, $query)) {
                    $idCheckCash = mysqli_insert_id($con);
                    $content = $_POST['content'];
                    $quantity = $_POST['quantity'];
                    $money = array(500000, 200000, 100000, 50000, 20000, 10000, 5000, 2000, 1000);
                    for($i = 0; $i < count($quantity); $i++) {
                        $moneyTotal = 0;
                        $moneyTotal = $money[$i] * $quantity[$i];
                        $insertCountMoney = mysqli_query($con,  "INSERT INTO `countmoney` 
                            (`id`, `money`, `quantity`, `amount`, `description`, `checkCashid`) VALUES (NULL, '".$money[$i]."', '".$quantity[$i]."', '".$moneyTotal."', '".$content[$i]."', '".$idCheckCash."');");
                    }
                }
            } else { //Nếu có lỗi xảy ra
                $error = "Have a error in the processing";
            }
        }
    }
    // xem
    elseif($stt == 'view') {
        if(isset($_GET['id']) && $_GET['id'] != '') {
            if($tam == 'salesSecond') {
                $queryById = mysqli_query($con, "SELECT S.id AS id, C.name AS cusname, EM.staffName AS employee, CD.duration AS duration, S.dateTime AS dateTime, PRO.proname AS product, S.quantity AS quantity, S.totalMoney AS amount, CA.catename AS category, PRO.unit AS unit   FROM `sales` S
                INNER JOIN `customer` C ON S.customerid = C.`id`  
                INNER JOIN `employee` EM ON S.`employeeid` = EM.`id` 
                INNER JOIN `products` PRO ON S.poductid = PRO.`id` 
                INNER JOIN `customerdebt` CD ON S.id = CD.`salesid`
                INNER JOIN `category` CA ON S.categoryid = CA.id
                WHERE S.id =" .$_GET['id'] );
                $showSal = mysqli_fetch_assoc($queryById);
                $price = $showSal['amount'] /  $showSal['quantity'];
            }elseif($tam == 'cashThird') {
                $queryById = mysqli_query($con, "SELECT * FROM `checkcash` INNER JOIN `countmoney` where `checkcash`.`id`=" . $_GET['id']);
            }
        }
    }elseif($stt == 'delete') {
        if(isset($_GET['id']) && $_GET['id'] != '') {
            if($tam == 'salesThird') {
                $queryById = mysqli_query($con, "DELETE FROM `customer` WHERE `id` = " . $_GET['id']);
                // if($queryById) { $title = 'success';}
            }elseif($tam == 'salesFourth') {
                $queryById = mysqli_query($con, "DELETE FROM `products` WHERE `id` = " . $_GET['id']);
            }
        }
    }elseif($stt == 'edit') {
        if($tam == 'salesThird') { 
            $queryById = mysqli_query($con, "SELECT * FROM `customer` WHERE `customer`.`id` =" .$_GET['id'] );
            $showCus = mysqli_fetch_assoc($queryById);
            // $title =  $_POST['supplier'] . ',' . $_POST['address'] . ',' . $_POST['tax'] . ',' . $_POST['phone'] . ',emai=' . $_POST['email'];
            
        }elseif($tam == 'salesFourth') {
            $queryById = mysqli_query($con, "SELECT P.id AS id, P.proname AS product, S.name AS supplier, C.catename AS category, P.price AS price, P.unit AS unit, I.name AS inventory, P.minimumQuantity AS miniquantity FROM `products` P
            INNER JOIN `supplier` S ON P.`supplierid` = S.id
            INNER JOIN `category` C ON P.categoryid = c.id
            INNER JOIN `inventory`I ON P.inventoryid = I.id 
            WHERE p.id =" . $_GET['id']);
            $showPro = mysqli_fetch_assoc($queryById);
        }
    }
    // update
    if(isset($_GET['id']) && $_GET['id'] != '') {
        if(isset($_GET['action']) && ($_GET['action'] == 'editCus')) {
            $updateSup = mysqli_query($con, "UPDATE `customer` SET `name`='" . $_POST['customer'] . "',`location`='" . $_POST['address'] . "',`phoneNumber`='" . $_POST['phone'] . "',
            `email`='" . $_POST['email'] . "',`tax`='" . $_POST['tax'] . "' WHERE `customer`.`id` =" .$_GET['id']);
            // $title = $_POST['customer'] . "','" .$_POST['address']. "', '" . $_POST['tax'] . "', '" . $_POST['phone'] . "', '" . $_POST['email'];
            if($updateSup) {
                $title = 'Cập nhật thành công';
            }
        }elseif(isset($_GET['action']) && ($_GET['action'] == 'editPro')) {
            while($row = mysqli_fetch_array($querysupplier)) { 
                if($row['name'] == $_POST['supplier']) {
                    $supId = $row['id'];
                }
            }
            while($row = mysqli_fetch_array($querycategoryId)) { 
                if($row['catename'] == $_POST['category']) {
                    $cateId = $row['id'];
                }
            }
            while($row = mysqli_fetch_array($queryinventoryId)) { 
                if($row['name'] == $_POST['inventory']) {
                    $invenId = $row['id'];
                }
            }
            $updateSup = mysqli_query($con, "UPDATE `products` SET `proname` = '" .$_POST['proname']. "', `price` = '" .$_POST['price']. "', `minimumQuantity` = '" .$_POST['miniQuantity']. "',
             `unit` = '" .$_POST['unit']. "', `inventoryid` = '" .$invenId. "', `categoryid` = '" .$cateId. "', `supplierid` = '" .$supId. "' WHERE `products`.`id` = " .$_GET['id']);
            if($updateSup) {
                $title = 'Cập nhật thành công';
            }
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
    <div class="form-container">
        <div class="form-header">
            <h2 class="form-title">Phiếu <?= isset($title) ? $title : '' ?></h2>
            <a href="/AppketoanVS2/content/sales/sales.php?salesNav=<?= $tam ?>" class="close"></a>
        </div>
        <div class="overlay-not-color" id="overlay-2"></div>
            <?php
            $tam2 = '';
                if(isset($_GET['data'])&&($_GET['data'])!=''){
                    $tam2= $_GET['data'];
                }
                if($tam2 == 'addSales'){
                    include('view/addSales.php');
                }elseif($tam2 == 'addCus'){
                    include('view/addCus.php');
                }elseif($tam2 == 'addPro'){
                    include('view/addProducts.php');
                }

                // xem
                if($stt == 'view') {
                    if(isset($_GET['id'])&&($_GET['id'])!=''){
                        if($tam == 'salesSecond') {
                            include('view/addSales.php');
                        }elseif($tam == 'salesThird'){
                            include('view/checkBudet.php');
                        }
                    }
                }

                if($stt == 'delete') {
                    header("location:/AppketoanVS2/content/sales/sales.php?salesNav=$tam");
                }
                if($stt == 'edit'){
                    if(isset($_GET['id'])&&($_GET['id'])!=''){
                        if($tam == 'salesThird') {
                            include('view/addCus.php');
                        }elseif($tam == 'salesFourth'){
                            include('view/addProducts.php');
                        }
                    }
                }
            ?>
    </div>
    <!-- <script type="text/javascript" src="../../assets/JS/script.js"></script> -->
</body>
</html>