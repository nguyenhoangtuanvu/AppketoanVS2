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
    if(isset($_GET['purchaseNav']) && $_GET['purchaseNav'] != '') {
        $tam = $_GET['purchaseNav'];
    }else {
        $tam = 'purchaseSecond';
    }

    
    if(isset($_GET['data']) && $_GET['data'] != '') {
        $stt = $_GET['data'];
    }else {
        $stt = 'addBuy';
    }
    if($stt == 'addBuy') {
        $title = $main['Mua hàng'];
    }elseif($stt == 'addSup') {
        $title = $main['thêm nhà cung cấp'];
    }elseif($stt == 'addPro') {
        $title = $main['thêm hàng hóa'];
    }elseif($stt == 'view') {
        $title = $main['Mua hàng'];
    }elseif($stt == 'edit') {
        if($tam == 'purchaseThird'){
            $title = $main['sửa thông tin nhà cung cấp'];
        }elseif($tam == 'purchaseFourth'){
            $title = $main['sửa thông tin sản phẩm'];
        }
    }

    $querySupplier = mysqli_query($con, "SELECT * FROM `supplier` ");
    $querysupplier = mysqli_query($con, "SELECT * FROM `supplier` ");
    $getSupId = 0;
    $queryCustomer  = mysqli_query($con, "SELECT * FROM `customer` ");
    $queryEmployee  = mysqli_query($con, "SELECT * FROM `employee` ");

    $queryProduct = mysqli_query($con, "SELECT * FROM `products` ");
    $queryproductId  = mysqli_query($con, "SELECT * FROM `products` ");
    $productId = 0;

    $queryCategoryId  = mysqli_query($con, "SELECT * FROM `category` ");
    $querycategoryId  = mysqli_query($con, "SELECT * FROM `category` ");

    $queryInventoryId  = mysqli_query($con, "SELECT * FROM `inventory` ");
    $queryinventoryId  = mysqli_query($con, "SELECT * FROM `inventory` ");

    $queryEmployeeId  = mysqli_query($con, "SELECT * FROM `employee` ");
    $employeeId = 0;
    $receiptPayment = '';
    $error = '';

    // check
    

    if($stt == 'addBuy'){
        if (isset($_GET['action']) && ($_GET['action'] == 'addBuy')) {
            while($row = mysqli_fetch_array($querysupplier)) { 
                if($row['name'] == $_POST['supplier']) {
                    $getSupId = $row['id'];
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
            if (isset($_POST['supplier']) && isset($_POST['employee']) && isset($_POST['datetime']) && isset($_POST['product'])) {
                // $title = $_POST['datetime'] . $_POST['content']. $productId . "," .$_POST['quantity'].  "," .$_POST['price'] .   "," .$getSupId .  "," . $employeeId;
                $insertPurchase = "INSERT INTO `purchase` (`id`, `dateTime`, `content`, `productid`, `quantity`, `price`, `supplierid`, `employeeid`, `person`)  
                VALUES (NULL,'" . $_POST['datetime'] . "','" .$_POST['content']. "','" .$productId. "', '" . $_POST['quantity'] . "', '" . $_POST['price'] . "', '" . $getSupId . "', '" . $employeeId . "', '" . $_POST['person'] . "');";
                if($result = mysqli_query($con, $insertPurchase)) {
                    $amount = $_POST['quantity'] * $_POST['price'];
                    $idPurchase = mysqli_insert_id($con);
                    $insertSupDebt = mysqli_query($con, "INSERT INTO `supplierdebt` (`id`, `supplierid`, `suppliername`, `content`, `debt`, `duration`, `paid`, `purchaseid`) 
                    VALUES (NULL, '" . $getSupId . "', '". $_POST['supplier'] ."', '". $_POST['content'] ."', '". $amount ."', '". $_POST['duration'] ."', 'unpaid', '". $idPurchase ."'); ");
                }
            }
        }
    }elseif($stt == 'addSup'){
        if (isset($_GET['action']) && ($_GET['action'] == 'addSup')) {
            if (isset($_POST['supplier']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['email'])) {
                    $result = mysqli_query($con, "INSERT INTO `supplier` (`id`, `name`, `location`, `tax`, `phonenumber`, `email`) 
                    VALUES (NULL,'" . $_POST['supplier'] . "','" .$_POST['address']. "', '" . $_POST['tax'] . "', '" . $_POST['phone'] . "', '" . $_POST['email'] . "');");
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
                if($row['catename'] == $_POST['category']) {
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
                if($result) {
                    $title = 'thêm sản phẩm thành công';
                }
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
    }elseif($stt == 'view') {
        if(isset($_GET['id']) && $_GET['id'] != '') {
            if($tam == 'purchaseSecond') {
                $queryById = mysqli_query($con, "SELECT S.name AS supname, PU.person AS person, EM.staffName AS employee, SD.duration AS duration, PU.dateTime AS dateTime, 
                PU.content AS content, PRO.proname AS product, PU.quantity AS quantity, PU.price AS price   FROM `purchase` PU
                INNER JOIN `supplier` S ON PU.`supplierid` = S.`id`  
                INNER JOIN `employee` EM ON PU.`employeeid` = EM.`id` 
                INNER JOIN `products` PRO ON PU.`productid` = PRO.`id` 
                INNER JOIN `supplierdebt` SD ON PU.id = SD.`purchaseid`
                WHERE PU.id =" .$_GET['id'] );
                $showPur = mysqli_fetch_assoc($queryById);
                $amount = $showPur['quantity'] * $showPur['price'];
            }
        }
    }
    elseif($stt == 'delete') {
        if(isset($_GET['id']) && $_GET['id'] != '') {
            if($tam == 'purchaseThird') {
                $queryById = mysqli_query($con, "DELETE FROM `supplier` WHERE `id` = " . $_GET['id']);
                // if($queryById) { $title = 'success';}
            }elseif($tam == 'purchaseFourth') {
                $queryById = mysqli_query($con, "DELETE FROM `products` WHERE `id` = " . $_GET['id']);
            }
        }
    }elseif($stt == 'edit') {
        if($tam == 'purchaseThird') { 
            $queryById = mysqli_query($con, "SELECT * FROM `supplier` WHERE `supplier`.`id` =" .$_GET['id'] );
            $showSup = mysqli_fetch_assoc($queryById);
            // $title =  $_POST['supplier'] . ',' . $_POST['address'] . ',' . $_POST['tax'] . ',' . $_POST['phone'] . ',emai=' . $_POST['email'];
            
        }elseif($tam == 'purchaseFourth') {
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
        if(isset($_GET['action']) && ($_GET['action'] == 'editSup')) {
            $updateSup = mysqli_query($con, "UPDATE `supplier` SET `name`='" . $_POST['supplier'] . "',`location`='" . $_POST['address'] . "',
            `tax`='" . $_POST['tax'] . "',`phonenumber`='" . $_POST['phone'] . "',`email`='" . $_POST['email'] . "' WHERE `supplier`.`id` =" .$_GET['id']);
            // $title = $_POST['supplier'] . "','" .$_POST['address']. "', '" . $_POST['tax'] . "', '" . $_POST['phone'] . "', '" . $_POST['email'];
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
<?php

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
            <h2 class="form-title"><?=  $main['Phiếu'] . ' ' ?> <?= isset($title) ? $title : '' ?></h2>
            <a href="/AppketoanVS2/content/purchase/purchase.php?purchaseNav=<?= $tam ?>" class="close"></a>
        </div>
        <div class="overlay-not-color" id="overlay-2"></div>
            <?php
            $tam2 = '';
                if(isset($_GET['data'])&&($_GET['data'])!=''){
                    $tam2= $_GET['data'];
                }
                if($tam2 == 'addBuy'){
                    include('view/addpurchase.php');
                }elseif($tam2 == 'addSup'){
                    include('view/addSup.php');
                }elseif($tam2 == 'addPro'){
                    include('view/addProducts.php');
                }

                // xem
                if($stt == 'view') {
                    if(isset($_GET['id'])&&($_GET['id'])!=''){
                        if($tam == 'purchaseSecond') {
                            include('view/addpurchase.php');
                        }elseif($tam == 'purchaseThird'){
                            include('view/addSup.php');
                        }
                    }
                }
                if($stt == 'delete') {
                    header("location:/AppketoanVS2/content/purchase/purchase.php?purchaseNav=$tam");
                }
                if($stt == 'edit'){
                    if(isset($_GET['id'])&&($_GET['id'])!=''){
                        if($tam == 'purchaseThird') {
                            include('view/addSup.php');
                        }elseif($tam == 'purchaseFourth'){
                            include('view/addProducts.php');
                        }
                    }
                }
            ?>
    </div>
    <!-- <script type="text/javascript" src="../../assets/JS/script.js"></script> -->
</body>
</html>