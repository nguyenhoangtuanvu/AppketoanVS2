<?php session_start(); 
if(!isset($_SESSION["logged"])) {
    header("location:login.php");
}

    // language
    include_once 'LanguageHelper.php';
    $object = new LanguageHelper();
    $lang = $object->checkLang();
    include_once($lang);
    $vi = $main['en-vi'];
    $en = $main['en-en'];
    $language = $main['language'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-free-6.0.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&family=Roboto&display=swap" rel="stylesheet">
    <title>Kế Toán</title>
    <script language="javascript">
    function changeValue(val) {
        if (val==="vi") {
        window.location.href = "?lang=vi"; 
        }
        else {
        window.location.href = "?lang=en"; 
        }
    }
</script>
</head>
<body>
    <div class="grid">
        <?php include 'sidebar.php' ?>
        <div class="container">
            <!-- header -->
            <!-- navigation start -->
            <div class="navigation">
                <div class="nav-overview nav--open-sidebar">
                    <h2 class="overview-heading"><?= $main['tổng quan'] ?></h2>
                </div>
            </div>
            <!-- navigation end -->

            <!-- content -->
            <div class="content">
                <!-- overview -->
                <?php include 'content/overview.php'; 
                ?>
                
                <div class="content-wrapper tool sidebar--open home-function"></div>
                <div class="content-wrapper fixed-assets sidebar--open home-function"></div>
                <div class="content-wrapper tax sidebar--open home-function"></div>
                <div class="content-wrapper price sidebar--open home-function"></div>
                <!-- general -->
                
                
                <div class="content-wrapper budget sidebar--open home-function"></div>
                <div class="content-wrapper report sidebar--open home-function"></div>
                <div class="content-wrapper financial-analysis sidebar--open home-function"></div>
            </div>
        </div>
    </div>




    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="assets/JS/script.js"></script>
    <!-- <script type="text/javascript">
        var costMonth = <?php json_encode($CostMonth); ?>;
        console.log(costMonth);
    </script> -->
</script>
</body>
</html>