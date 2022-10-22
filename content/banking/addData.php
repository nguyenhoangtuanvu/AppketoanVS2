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
    if(isset($_GET['bankingNav']) && $_GET['bankingNav'] != '') {
        $tam = $_GET['bankingNav'];
    }else {
        $tam = 'bankingSecond';
    }

    
    if(isset($_GET['data']) && $_GET['data'] != '') {
        $stt = $_GET['data'];
    }else {
        $stt = 'thu';
    }
    if($stt == 'thu') {
        $title = 'Thu';
    }elseif($stt == 'chi') {
        $title = 'Chi';
    }elseif($stt == 'check') {
        $title = 'Kiểm kê quỹ';
    }

    $querySupplier = mysqli_query($con, "SELECT * FROM `supplier` ");
    $queryCustomer  = mysqli_query($con, "SELECT * FROM `customer` ");
    $queryEmployee  = mysqli_query($con, "SELECT * FROM `employee` ");

    $queryEmployeeName  = mysqli_query($con, "SELECT * FROM `employee` ");
    $employeeId = 0;
    $receiptPayment = '';
    $error = '';

    // budget
    $queryBudget = mysqli_query($con, "SELECT * FROM `budget` WHERE `budget`.`id` = 1 " );
    $budget = 0;
    $cash = 0;
    $banking = 0;
    $customerDebt = 0;
    $supplierDebt = 0;
    while($row = mysqli_fetch_array($queryBudget)) {
        $budget = $row['budget'];
        $cash = $row['cash'];
        $banking = $row['banking'];
        $customerDebt = $row['customerDebt'];
        $supplierDebt = $row['supplierDebt'];
    }
    // check
    

    if($stt == 'thu'){
        $receiptPayment = 'receipt';
        if (isset($_GET['action']) && ($_GET['action'] == 'add')) {
            while($row = mysqli_fetch_array($queryEmployeeName)) { 
                if($row['staffName'] == $_POST['employee']) {
                    $employeeId = $row['id'];
                }
            }
            if (isset($_POST['object']) && isset($_POST['employee']) && isset($_POST['datetime']) && isset($_POST['amount'])) {
                $result = mysqli_query($con, "INSERT INTO `banking` 
                (`id`, `dateTime`, `content`, `object`, `person`, `totalAmount`, `employeeid`, `receiptPayment`, `budgetid`) 
                VALUES (NULL,'" . $_POST['datetime'] . "','" .$_POST['content']. "', '" . $_POST['object'] . "', '" . $_POST['person'] . "', '" . $_POST['amount'] . "', '" . $employeeId . "', '" . $receiptPayment . "', '1');");
                // $title = $_POST['datetime'] . "','" .$_POST['content']. "', '" . $_POST['object'] . "', '" . $_POST['person'] . "', '" . $_POST['amount'] . "', '" . $employeeId . "', '" . $receiptPayment;
                // update budget
                $budget += $_POST['amount'];
                $banking += $_POST['amount'];
                $updateBudget = mysqli_query($con, "UPDATE `budget` SET `budget` = '" . $budget . "', `banking` = '" . $banking . "' WHERE `budget`.`id` = 1");
            } else { //Nếu có lỗi xảy ra
                $error = "Have a error in the processing";
            }
        }
    }elseif($stt == 'chi'){
        $receiptPayment = 'payment';
        if (isset($_GET['action']) && ($_GET['action'] == 'add')) {
            while($row = mysqli_fetch_array($queryEmployeeName)) { 
                if($row['staffName'] == $_POST['employee']) {
                    $employeeId = $row['id'];
                }
            }
            if (isset($_POST['object']) && isset($_POST['employee']) && isset($_POST['datetime']) && isset($_POST['amount'])) {
                $result = mysqli_query($con, "INSERT INTO `banking` 
                (`id`, `dateTime`, `content`, `object`, `person`, `totalAmount`, `employeeid`, `receiptPayment`, `budgetid`) 
                VALUES (NULL,'" . $_POST['datetime'] . "','" .$_POST['content']. "', '" . $_POST['object'] . "', '" . $_POST['person'] . "', '" . $_POST['amount'] . "', '" . $employeeId . "', '" . $receiptPayment . "', '1');");

                // update budget
                $budget -= $_POST['amount'];
                $banking -= $_POST['amount'];
                $updateBudget = mysqli_query($con, "UPDATE `budget` SET `budget` = '" . $budget . "', `banking` = '" . $banking . "' WHERE `budget`.`id` = 1");
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
    if(isset($_GET['id']) && $_GET['id'] != '') {
        if($tam == 'bankingSecond') {
            $queryById = mysqli_query($con, "SELECT * FROM `employee` INNER JOIN `banking` WHERE `banking`.`id`=" . $_GET['id']);
            $showBanking = mysqli_fetch_assoc($queryById);
        }elseif($tam == 'cashThird') {
            $queryById = mysqli_query($con, "SELECT * FROM `checkcash` INNER JOIN `countmoney` where `checkcash`.`id`=" . $_GET['id']);
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
            <h2 class="form-title">Phiếu <?= $title ?></h2>
            <a href="/AppketoanVS2/content/banking/banking.php?bankingNav=<?= $tam ?>" class="close"></a>
        </div>
        <div class="overlay-not-color" id="overlay-2"></div>
            <?php
            $tam2 = '';
                if(isset($_GET['data'])&&($_GET['data'])!=''){
                    $tam2= $_GET['data'];
                }
                if($tam2 == 'thu'){
                    include('view/addbanking.php');
                }elseif($tam2 == 'chi'){
                    include('view/addbanking.php');
                }elseif($tam2 == 'check'){
                    include('view/checkBudet.php');
                }

                if(isset($_GET['id'])&&($_GET['id'])!=''){
                    if($tam == 'bankingSecond') {
                        include('view/addbanking.php');
                    }elseif($tam == 'bankingThird'){
                        include('view/checkBudet.php');
                    }
                }
            ?>
    </div>
    <script type="text/javascript" src="../../assets/JS/script.js"></script>
<script>
var formBoxWrap = document.getElementsByClassName("form-box-wrap");

var overlay2 = document.querySelector('.overlay-not-color');
var boxDropdownList = document.querySelectorAll(".form-dropdown-box");

for(let i = 0; i < formBoxWrap.length; i++) {
    formBoxWrap[i].addEventListener('click', function() {
        console.log('click')
        overlay2.classList.remove('overlay--active');
        for(let j = 0; j < boxDropdownList.length; j++) {
            boxDropdownList[j].classList.remove("dropdown-list--active");
            if(i == j) {
                boxDropdownList[j].classList.add("dropdown-list--active");
                overlay2.classList.add('overlay--active');
            }
        }
    })
    overlay2.addEventListener('click', function() {
        for(let a = 0; a < boxDropdownList.length; a++) {
            console.log('over2');
            boxDropdownList[i].classList.remove("dropdown-list--active");
            overlay2.classList.remove('overlay--active');
        }
    });
}
</script>
</body>
</html>