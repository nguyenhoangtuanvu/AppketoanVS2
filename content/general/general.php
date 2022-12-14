<?php session_start(); 
if(!isset($_SESSION["logged"])) {
    header("location:/AppketoanVS2/login.php");
}
// language
include_once '../../languageHelper.php';
$object = new LanguageHelper();
$lang = $object->checkLang();
include_once('../../'.$lang);
$vi = $main['en-vi'];
$en = $main['en-en'];
$language = $main['language'];
?>
<?php 
    include '../../connect_db.php';
    // hàng nhập xuất kho
    $querySummary = mysqli_query($con, "SELECT * FROM `summary` ORDER BY `summary`.`postedDate` ASC");
    $TableAmount = 0;
    $count = 0;
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
                <div class="nav-general nav-function nav--open-sidebar">
                    <ul class="nav-list">
                        <a href="?generalNav=generalFirst" class="nav-link"><li class="nav-items general-nav nav-items--active">Quy trình </li></a>
                        <a href="?generalNav=generalSecond" class="nav-link"><li class="nav-items general-nav">Kết chuyển lãi lỗ</li></a>
                        <a href="?generalNav=generalThird" class="nav-link"><li class="nav-items general-nav">Báo cáo</li></a>
                    </ul>
                </div>
            </div>
            <!-- navigation end -->

            <!-- content -->
            <div class="content">
                <div class="content-wrapper general sidebar--open home-function">
                <?php
                        if(isset($_GET['generalNav'])&&($_GET['generalNav'])!=''){
                            $tam= $_GET['generalNav'];
                        }else {
                            $tam = 'generalFirst';
                        }if($tam == 'generalFirst'){
                            include('first_function.php');
                        }elseif($tam == 'generalSecond'){
                            include('second_function.php');
                        }elseif($tam == 'generalThird'){
                            include('third_function.php');
                        }
                    ?>   
                </div>
    <script type="text/javascript" src="assets/JS/script.js"></script>
    <!-- <script type="text/javascript">
        var costMonth = <?php json_encode($CostMonth); ?>;
        console.log(costMonth);
    </script> -->
</script>
</body>
</html>