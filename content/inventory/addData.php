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
    if(isset($_GET['inventoryNav']) && $_GET['inventoryNav'] != '') {
        $tam = $_GET['inventoryNav'];
    }else {
        $tam = 'inventorySecond';
    }

    
    if(isset($_GET['data']) && $_GET['data'] != '') {
        $stt = $_GET['data'];
    }else {
        $stt = 'addInput';
    }
    if($stt == 'addInput') {
        $title = $main['Hàng nhập kho'];
    }elseif($stt == 'addExport') {
        $title = $main['hàng xuất kho'];
    }elseif($stt == 'addCheck') {
        $title = $main['kiểm kê hàng hóa'];
    }elseif($stt == 'addPro') {
        $title = $main['thêm hàng hóa'];
    }elseif($stt == 'view') {
        $title = $main['Hàng nhập kho'];
    }

    $querySupplier = mysqli_query($con, "SELECT * FROM `supplier` ");
    $querysupplier = mysqli_query($con, "SELECT * FROM `supplier` ");
    $getSupId = 0;
    $queryCustomer  = mysqli_query($con, "SELECT * FROM `customer` ");
    $querycustomer  = mysqli_query($con, "SELECT * FROM `customer` ");

    $queryEmployee  = mysqli_query($con, "SELECT * FROM `employee` ");

    $queryProduct  = mysqli_query($con, "SELECT * FROM `products` ");
    $queryproductId  = mysqli_query($con, "SELECT * FROM `products` ");
    $getProid = 0;
    $productId = 0;

    $queryCategory  = mysqli_query($con, "SELECT * FROM `category` ");
    $querycategoryId  = mysqli_query($con, "SELECT * FROM `category` ");

    $queryInventory  = mysqli_query($con, "SELECT * FROM `inventory` ");
    $queryinventoryId  = mysqli_query($con, "SELECT * FROM `inventory` ");

    $queryEmployeeId  = mysqli_query($con, "SELECT * FROM `employee` ");
    $employeeId = 0;
    $receiptPayment = '';
    $error = '';

    // inventory update
    $productQ = 0;
    $queryQuantityproduct  = mysqli_query($con, "SELECT * FROM `products` ");
    while($row = mysqli_fetch_array($queryQuantityproduct)) {
        $productQ = $row['quantity'];
    }
    // check
    

    if($stt == 'addInput'){
        $imExport = 'import';
        if (isset($_GET['action']) && ($_GET['action'] == 'addInput')) {
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
            if (isset($_POST['supplier']) && isset($_POST['employee']) && isset($_POST['datetime']) && isset($_POST['product'])) {
                // $title = $_POST['datetime'] . $_POST['content']. $productId . "," .$_POST['quantity'].  "," .$_POST['price'] .   "," .$getSupId .  "," . $employeeId;
                $insertInputInventory = "INSERT INTO `inventoryhistory` (`id`, `content`, `dateTime`, `productid`, `categoryid`, `inventoryQuantity`, `price`, `person`, `employeeid`, `inventoryid`, `supplierid`, `imExport`) 
                VALUES (NULL,'" . $_POST['description'] . "','" . $_POST['datetime'] . "','" .$productId. "','" .$cateId. "', '" . $_POST['quantity'] . "', '" . $_POST['price'] . "', '" . $_POST['person'] . "',
                '" . $employeeId . "', '" . $invenId . "', '" . $getSupId . "', '" . $imExport . "')";
                $result = mysqli_query($con, $insertInputInventory);
                // $title = $_POST['description'] . "','" .$productId. "','" .$cateId. "', '" . $_POST['quantity'] . "', '" . $_POST['price'] . "', '" . $_POST['person'] . "', '" . $employeeId . "', '" . $invenId . "', '" . $getSupId . "', '" . $imExport;
                // update product in inventiry
                if($result) {
                    $productQ += $_POST['quantity'];
                    $updateQuantity = mysqli_query($con, "UPDATE `products` SET `quantity` = '" . $productQ . "' WHERE `products`.`id` =" .$productId);
                }
            }
        }
    }if($stt == 'addExport'){
        $imExport = 'export';
        if (isset($_GET['action']) && ($_GET['action'] == 'addInput')) {
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
            if (isset($_POST['supplier']) && isset($_POST['employee']) && isset($_POST['datetime']) && isset($_POST['product'])) {
                // $title = $_POST['datetime'] . $_POST['content']. $productId . "," .$_POST['quantity'].  "," .$_POST['price'] .   "," .$getSupId .  "," . $employeeId;
                $insertInputInventory = "INSERT INTO `inventoryhistory` (`id`, `content`, `dateTime`, `productid`, `categoryid`, `inventoryQuantity`, `price`, `person`, `employeeid`, `inventoryid`, `supplierid`, `imExport`) 
                VALUES (NULL,'" . $_POST['description'] . "','" . $_POST['datetime'] . "','" .$productId. "','" .$cateId. "', '" . $_POST['quantity'] . "', '" . $_POST['price'] . "', '" . $_POST['person'] . "', '" . $employeeId . "',
                 '" . $invenId . "', '" . $getSupId . "', '" . $imExport . "');";
                $result = mysqli_query($con, $insertInputInventory);

                // update product in inventiry
                if($result) {
                    $productQ -= $_POST['quantity'];
                    $updateQuantity = mysqli_query($con, "UPDATE `products` SET `quantity` = '" . $productQ . "' WHERE `products`.`id` =" .$productId);

                }
            }
        }
    }elseif($stt == 'addCheck'){
        if (isset($_GET['action']) && ($_GET['action'] == 'addCheck')) {
            while($row = mysqli_fetch_array($queryEmployeeId)) { 
                if($row['staffName'] == $_POST['employee']) {
                    $employeeId = $row['id'];
                }
            }
            while($row = mysqli_fetch_array($queryproductId)) { 
                // $title = 'LỖI ID PRODUCT';
                if($row['proname'] == $_POST['product']) {
                    $getProid = $row['id']; // lỗi error
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
            $amount = $_POST['quantity'] * $_POST['price'];
            if (isset($_POST['employee']) && isset($_POST['inventory']) && isset($_POST['product']) && isset($_POST['datetime'])) {
                // $title = $_POST['dateTo'].','. $_POST['datetime'] .',em'. $employeeId .',kho'. $invenId .',pro'. $getProid  .',cate'. $cateId .','.$_POST['unit']  .','. $_POST['quantity']  .','. $amount  .','. $_POST['description'] .','. $_POST['conclude'];
                $insertCheckInven = "INSERT INTO `checkinventory`(`id`, `dateTimeTo`, `dateTime`, `employeeid`, `inventoryid`, `productid`, `categoryid`, `unit`, `quantity`, `amount`, `content`, `conclude`)
                VALUES (NULL,'" . $_POST['dateTo'] . "','" .$_POST['datetime']. "', '" . $employeeId . "', '" . $invenId . "', '" . $getProid . "', '" . $cateId . "', '" . $_POST['unit'] . "', '" . $_POST['quantity'] . "', '" . $amount . "', '" . $_POST['description'] . "', '" . $_POST['conclude'] . "')";
                $result = mysqli_query($con, $insertCheckInven);
            } else { //Nếu có lỗi xảy ra
                $title = "Have a error in the processing";
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
            } else { //Nếu có lỗi xảy ra
                $error = "Have a error in the processing";
            }
        }
    }

    // xem
    
    elseif($stt == 'view') {
        if(isset($_GET['id']) && $_GET['id'] != '') {
            if($tam == 'inventorySecond') {
                $queryById = mysqli_query($con, "SELECT S.name AS supplier, H.person AS person, EM.staffName AS employee, H.content AS content, H.dateTime AS dateTime, PRO.proname AS product, CA.catename AS category, PRO.unit AS unit, H.inventoryQuantity AS quantity, h.price AS price , I.name AS inventory   FROM `inventoryhistory` H
                INNER JOIN `supplier`S ON H.supplierid = S.`id`  
                INNER JOIN `employee` EM ON H.`employeeid` = EM.`id` 
                INNER JOIN `products` PRO ON H.productid = PRO.id 
                INNER JOIN `category` CA ON H.categoryid = CA.id
                INNER JOIN `inventory` I ON H.inventoryid = I.id 
                WHERE H.id =" .$_GET['id'] );
                $showIH = mysqli_fetch_assoc($queryById);
                $amount = $showIH['price'] * $showIH['quantity'];
            }elseif($tam == 'inventoryThird') {
                $queryById = mysqli_query($con, "SELECT C.id AS id, C.dateTimeTo AS dateTo, C.dateTime AS dateTime, I.name AS inventory, C.content AS content, C.conclude AS conclude, EM.staffName AS employee,
                P.proname AS product, CA.catename AS category, C.unit AS unit, C.quantity AS quantity, C.amount AS amount  FROM `checkinventory` C
                INNER JOIN `inventory` I ON C.`inventoryid` = I.`id`
                INNER JOIN `employee` EM ON C.employeeid = EM.id
                INNER JOIN `products` P ON C.productid = P.id
                INNER JOIN `category` CA ON C.categoryid = CA.id where C.`id`=" . $_GET['id']);
                $showC = mysqli_fetch_assoc($queryById);
                $price = $showC['amount'] / $showC['quantity'];
            }
        }
    }elseif($stt == 'delete') {
        if(isset($_GET['id']) && $_GET['id'] != '') {
            if($tam == 'inventoryThird') {
                $queryById = mysqli_query($con, "DELETE FROM `checkinventory` WHERE `id` = " . $_GET['id']);
                // if($queryById) { $title = 'success';}
            }elseif($tam == 'inventoryFourth') {
                $queryById = mysqli_query($con, "DELETE FROM `products` WHERE `id` = " . $_GET['id']);
            }
        }
    }elseif($stt == 'edit') {
        if(isset($_GET['id']) && $_GET['id'] != '') {
            if($tam == 'inventorySecond') {
                $queryById = mysqli_query($con, "SELECT S.name AS supplier, H.person AS person, EM.staffName AS employee, H.content AS content, H.dateTime AS dateTime, PRO.proname AS product, CA.catename AS category, PRO.unit AS unit, H.inventoryQuantity AS quantity, h.price AS price , I.name AS inventory   FROM `inventoryhistory` H
                INNER JOIN `supplier`S ON H.supplierid = S.`id`  
                INNER JOIN `employee` EM ON H.`employeeid` = EM.`id` 
                INNER JOIN `products` PRO ON H.productid = PRO.id 
                INNER JOIN `category` CA ON H.categoryid = CA.id
                INNER JOIN `inventory` I ON H.inventoryid = I.id 
                WHERE H.id =" .$_GET['id'] );
                $showIH = mysqli_fetch_assoc($queryById);
                $amount = $showIH['price'] * $showIH['quantity'];
            }elseif($tam == 'inventoryThird') {
                $queryById = mysqli_query($con, "SELECT * FROM `checkcash` INNER JOIN `countmoney` where `checkcash`.`id`=" . $_GET['id']);
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
            <h2 class="form-title"><?=  $main['Phiếu'] . ' ' ?> <?= $title ?></h2>
            <a href="/AppketoanVS2/content/inventory/inventory.php?inventoryNav=<?= $tam ?>" class="close"></a>
        </div>
        <div class="overlay-not-color" id="overlay-2"></div>
            <?php
            $tam2 = '';
                if(isset($_GET['data'])&&($_GET['data'])!=''){
                    $tam2= $_GET['data'];
                }
                if($tam2 == 'addInput'){
                    include('view/addInput.php');
                }elseif($tam2 == 'addExport'){
                    include('view/addInput.php');
                }elseif($tam2 == 'addCheck'){
                    include('view/addCheck.php');
                }elseif($tam2 == 'addPro'){
                    include('view/addProducts.php');
                }

                // xem
                if($stt == 'view') {
                    if(isset($_GET['id'])&&($_GET['id'])!=''){
                        if($tam == 'inventorySecond') {
                            include('view/addInput.php');
                        }elseif($tam == 'inventoryThird'){
                            include('view/addCheck.php');
                        }
                    }
                }
                if($stt == 'delete') {
                    header("location:/AppketoanVS2/content/inventory/inventory.php?inventoryNav=$tam");
                }
            ?>
    </div>
    <!-- <script type="text/javascript" src="../../assets/JS/script.js"></script> -->
</body>
</html>