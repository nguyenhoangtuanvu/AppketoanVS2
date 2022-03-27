<?php session_start(); 
if(!isset($_SESSION["logged"])) {
    header("location:login.php");
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
                <div class="nav-invoice-managing nav-function nav--open-sidebar">
                    <ul class="nav-list">
                        <li class="nav-items nav-items--active">Quy trình</li>
                    </ul>
                </div>
            </div>
            <!-- navigation end -->

            <!-- content -->
            <div class="content">
                <div class="content-wrapper invoice-managing sidebar--open">
                    <div class="invoice-first-function home-function">
                        <div class="cash-first-wrap">
                            <div class="cash-first-column-left">
                                <div class="cash-operation">
                                    <div class="cash-operation__heading">NGHIỆP VỤ HÓA ĐƠN ĐIỆN TỬ</div>
                                    <div class="bill-operation-content">
                                        <div class="purchase-operation-box bill-operation-box1">Khởi tạo mẫu</div>
                                        <div class="purchase-operation-box bill-operation-box2">TB điều chỉnh HD</div>
                                        <div class="purchase-operation-box bill-operation-box3">Gửi hóa đơn qua email</div>
                                        <div class="purchase-operation-box bill-operation-box4">Xóa hóa đơn</div>
                                        <div class="purchase-operation-box bill-operation-box5">Lập quyết định</div>
                                        <div class="purchase-operation-box bill-operation-box6">Xuất hóa đơn</div>
                                        <div class="purchase-operation-box bill-operation-box7">Thông báo phát hành</div>
                                        <div class="purchase-operation-box bill-operation-box8">Hủy hóa đơn</div>
                                        <div class="purchase-operation-box bill-operation-box9">Chuyển thành hóa đơn giấy</div>
                                    </div>
                                </div>
                                <div class="cash-first-column-left-bottom">
                                    <div class="cash-first-bottom-box3">
                                        <div class="cash-icon-wrap">
                                            <div class="cash-first-email-icon"></div>
                                            <span class="cash-first-heading">Thiết lập email gửi hóa đơn</span>
                                        </div>
                                    </div>
                                    <div class="cash-first-bottom-box3 cash-first-bottom-box-center">
                                        <div class="cash-icon-wrap">
                                            <div class="cash-first-sms-icon"></div>
                                            <span class="cash-first-heading">Thiết lập SMS gửi hóa đơn</span>
                                        </div>
                                    </div>
                                    <div class="cash-first-bottom-box3">
                                        <div class="cash-icon-wrap">
                                            <div class="cash-first-pen-icon"></div>
                                            <span class="cash-first-heading">Thiết lập chữ ký số</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="process-report">
                                <div class="process-report__heading">Báo cáo</div>
                                <ul class="process-report-list">
                                    <li class="process-report-items">Báo cáo tình hình sử dụng hóa đơn</li>
                                    <li class="process-report-items">Bảng kê hóa đơn đang sử dụng</li>
                                    <li class="process-report-items">Thống kê số lượng hóa đơn đã phát hành</li>
                                </ul>
                                <div class="process-report__footer">Tất cả báo cáo</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/JS/script.js"></script>
    <!-- <script type="text/javascript">
        var costMonth = <?php json_encode($CostMonth); ?>;
        console.log(costMonth);
    </script> -->
</script>
</body>
</html>