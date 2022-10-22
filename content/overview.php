<?php
    include 'connect_db.php';
    $budget = mysqli_query($con, "SELECT * FROM `budget`");
    $cash = 0;
    $customerDebt = mysqli_query($con, "SELECT * FROM `customerDebt`");
    $supplerDebt = mysqli_query($con, "SELECT * FROM `supplerDebt`");
    // doanh thu
    $queryRevenu = mysqli_query($con, "SELECT * FROM `sales`");
    $revenu = 0;
    while($row = mysqli_fetch_array($queryRevenu)) {
        $revenu += $row['totalMoney'];
    }
    // tổng thu từng tháng 
    $queryRevenuMonth = mysqli_query($con, "SELECT MONTH(dateTime), `totalMoney`  FROM `sales` ORDER BY `sales`.`dateTime` ASC");
    $RevenuMonth = array();
    
    $th1 = 0;$th2 = 0;$th3 = 0;$th4 = 0;$th5 = 0;$th6 = 0;$th7 = 0;$th8 = 0;$th9 = 0;$th10 = 0;$th11 = 0;$th12 = 0;
    // var_dump($th1);exit;
    while($row = mysqli_fetch_array($queryRevenuMonth)) {
        // var_dump('tháng'.$row['MONTH(dateTime)']);
        // var_dump('tiền'.$row['totalMoney']);

        if($row['MONTH(dateTime)'] == 1) { 
            $th1 += $row['totalMoney'];
            $th1 ? $th1 : 0;
        }
        if($row['MONTH(dateTime)'] == 2) { 
            $th2 += $row['totalMoney'];
            $th2 ? $th2 : 0;
        }
        if($row['MONTH(dateTime)'] == 3) { 
            $th3 += $row['totalMoney'];
            $th3 ? $th3 : 0;
        }
        if($row['MONTH(dateTime)'] == 4) { 
            $th4 += $row['totalMoney'];
            $th4 ? $th4 : 0;
        }
        if($row['MONTH(dateTime)'] == 5) { 
            $th5 += $row['totalMoney'];
            $th5 ? $th5 : 0;
        }
        if($row['MONTH(dateTime)'] == 6) { 
            $th6 += $row['totalMoney'];
            $th6 ? $th6 : 0;
        }
        if($row['MONTH(dateTime)'] == 7) { 
            $th7 += $row['totalMoney'];
            $th7 ? $th7 : 0;
        }
        if($row['MONTH(dateTime)'] == 8) { 
            $th8 += $row['totalMoney'];
            $th8 ? $th8 : 0;
        }
        if($row['MONTH(dateTime)'] == 9) { 
            $th9 += $row['totalMoney'];
            $th9 ? $th9 : 0;
        }
        if($row['MONTH(dateTime)'] == 10) { 
            $th10 += $row['totalMoney'];
            $th10 ? $th10 : 0;
        }
        if($row['MONTH(dateTime)'] == 11) { 
            $th11 += $row['totalMoney'];
            $th11 ? $th11 : 0;
        }
        if($row['MONTH(dateTime)'] == 12) { 
            $th12 += $row['totalMoney'];
            $th12 ? $th12 : 0;
        }
    }
    $RevenuMonth = array($th1, $th2, $th3, $th4, $th5, $th6, $th7, $th8, $th9, $th10, $th11, $th12);
    
    // tổng chi hàng tháng
    $queryCostMonth = mysqli_query($con, "SELECT MONTH(dateTime), `quantity`, `price`  FROM `purchase` ORDER BY `purchase`.`dateTime` ASC");
    $CostMonth = array();
    
    $th1 = 0;$th2 = 0;$th3 = 0;$th4 = 0;$th5 = 0;$th6 = 0;$th7 = 0;$th8 = 0;$th9 = 0;$th10 = 0;$th11 = 0;$th12 = 0;
    // var_dump($th1);exit;
    while($row = mysqli_fetch_array($queryCostMonth)) {
        $totalMoney = $row['quantity'] * $row['price'];
        if($row['MONTH(dateTime)'] == 1) { 
            $th1 += $totalMoney;
            $th1 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 2) { 
            $th2 += $totalMoney;
            $th2 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 3) { 
            $th3 += $totalMoney;
            $th3 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 4) { 
            $th4 += $totalMoney;
            $th4 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 5) { 
            $th5 += $totalMoney;
            $th5 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 6) { 
            $th6 += $totalMoney;
            $th6 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 7) { 
            $th7 += $totalMoney;
            $th7 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 8) { 
            $th8 += $totalMoney;
            $th8 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 9) { 
            $th9 += $totalMoney;
            $th9 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 10) { 
            $th10 += $totalMoney;
            $th10 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 11) { 
            $th11 += $totalMoney;
            $th11 ? : 0;
        }
        if($row['MONTH(dateTime)'] == 12) { 
            $th12 += $totalMoney;
            $th12 ? : 0;
        }
    }
    $CostMonth = array($th1, $th2, $th3, $th4, $th5, $th6, $th7, $th8, $th9, $th10, $th11, $th12);

    // ngân sách tồn 
    $queryExistMonth = mysqli_query($con, "SELECT MONTH(dateTime), `budget`  FROM `budget` ORDER BY `budget`.`dateTime` ASC");
    $ExistMonth = array();
    
    $th1 = 0;$th2 = 0;$th3 = 0;$th4 = 0;$th5 = 0;$th6 = 0;$th7 = 0;$th8 = 0;$th9 = 0;$th10 = 0;$th11 = 0;$th12 = 0;
    while($row = mysqli_fetch_array($queryExistMonth)) {
        if($row['MONTH(dateTime)'] == 1) { 
            $th1 += $row['budget'];
            $th1 ? $th1 : 0;
        }
        if($row['MONTH(dateTime)'] == 2) { 
            $th2 += $row['budget'];
            $th2 ? $th2 : 0;
        }
        if($row['MONTH(dateTime)'] == 3) { 
            $th3 += $row['budget'];
            $th3 ? $th3 : 0;
        }
        if($row['MONTH(dateTime)'] == 4) { 
            $th4 += $row['budget'];
            $th4 ? $th4 : 0;
        }
        if($row['MONTH(dateTime)'] == 5) { 
            $th5 += $row['budget'];
            $th5 ? $th5 : 0;
        }
        if($row['MONTH(dateTime)'] == 6) { 
            $th6 += $row['budget'];
            $th6 ? $th6 : 0;
        }
        if($row['MONTH(dateTime)'] == 7) { 
            $th7 += $row['budget'];
            $th7 ? $th7 : 0;
        }
        if($row['MONTH(dateTime)'] == 8) { 
            $th8 += $row['budget'];
            $th8 ? $th8 : 0;
        }
        if($row['MONTH(dateTime)'] == 9) { 
            $th9 += $row['budget'];
            $th9 ? $th9 : 0;
        }
        if($row['MONTH(dateTime)'] == 10) { 
            $th10 += $row['budget'];
            $th10 ? $th10 : 0;
        }
        if($row['MONTH(dateTime)'] == 11) { 
            $th11 += $row['budget'];
            $th11 ? $th11 : 0;
        }
        if($row['MONTH(dateTime)'] == 12) { 
            $th12 += $row['budget'];
            $th12 ? $th12 : 0;
        }
    }
    $ExistMonth = array($th1,$th2,$th3,$th4,$th5,$th6,$th7,$th8,$th9, $th10, $th11, $th12);
    // var_dump($ExistMonth);exit;
    

    // chi phí
    $queryCost = mysqli_query($con, "SELECT * FROM `purchase`");
    $querycost = mysqli_query($con, "SELECT * FROM `purchase`");
    $cost = 0;
    $costTotal = 0;
    while($row = mysqli_fetch_array($queryCost)) {
        $cost = $row['quantity'] * $row['price'];
        $costTotal += $cost;
    }
    // lượi nhuận
    $profit = $revenu - $cost;

    // hàng tồn kho
    $queryProducts = mysqli_query($con, "SELECT * FROM `products`");
    $queryproducts = mysqli_query($con, "SELECT * FROM `products`");
    $totalProduct = 0;
    $inventoryValue = 0;
    while($row = mysqli_fetch_array($queryProducts)) {
        $totalProduct += $row['quantity'];
        $value = $row['quantity'] * $row['price'];
        $inventoryValue += $value;
    }
    // hàng sắp hết
    $queryProduct = mysqli_query($con, "SELECT * FROM `products`");
    // nợ phải thu
    $customerDebt = mysqli_query($con, "SELECT * FROM `customerDebt`");
    $customerdebt = mysqli_query($con, "SELECT * FROM `customerDebt`");
    $totalCusDebt = 0;
    while($row = mysqli_fetch_array($customerDebt)) {
        $totalCusDebt += $row['debt'];

    }
    // nownp phải trả
    $supplierDebt = mysqli_query($con, "SELECT * FROM `supplierDebt`");
    $supplierdebt = mysqli_query($con, "SELECT * FROM `supplierDebt`");
    $totalSupDebt = 0;
    while($row = mysqli_fetch_array($supplierDebt)) {
        $totalSupDebt += $row['debt'];
    }
    // 
    $productRunout = 0;
    $productOut = 0;
?>
<!-- <script> 
    const exitMonth = <?= $ExistMonth; ?>;
    console.log(exitMonth);
</script> -->
<div class="overview sidebar--open home-function">
    <div class="row">
        <div class="box financial-situation">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading"><?= $main['tình hình tài chính'] ?></h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title"><?= $main['Tháng này'] ?></span>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="box-time-line__dropdown-list">
                            <li class="dropdown-items dropdown-items--active">Hôm nay</li>
                            <li class="dropdown-items">Tuần này</li>
                            <li class="dropdown-items">Tháng này</li>
                            <li class="dropdown-items">Tháng 1</li>
                            <li class="dropdown-items">Tháng 2</li>
                            <li class="dropdown-items">Tháng 3</li>
                            <li class="dropdown-items">Tháng 4</li>
                            <li class="dropdown-items">Tháng 5</li>
                            <li class="dropdown-items">Tháng 6</li>
                            <li class="dropdown-items">Tháng 7</li>
                            <li class="dropdown-items">Tháng 8</li>
                            <li class="dropdown-items">Tháng 9</li>
                            <li class="dropdown-items">Tháng 10</li>
                            <li class="dropdown-items">Tháng 11</li>
                            <li class="dropdown-items">Tháng 12</li>
                        </ul>
                    </div>
                </div>
                <div class="box__money-unit"><?= $main['Đvt'] . $main['Triệu'] ?></div>
                <div class="financial-content">
                    <ul class="financial-list">
                        <?php while($row = mysqli_fetch_array($budget)) { 
                            $cash = $row['cash'];
                        ?>
                        <li class="financial-items">
                            <span class="money__title"><?= $main['tổng tiền'] ?></span>
                            <span class="financial__money-amount"><?= number_format($row['budget'], 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title"><?= $main['tiền mặt'] ?></span>
                            <span class="financial__money-amount"><?= number_format($row['cash'], 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title"><?= $main['tiền gửi'] ?></span>
                            <span class="financial__money-amount"><?= number_format($row['banking'], 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title"><?= $main['phải thu'] ?></span>
                            <span class="financial__money-amount"><?= number_format($row['customerDebt'], 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title"><?= $main['phải trả'] ?></span>
                            <span class="financial__money-amount"><?= number_format($row['supplierDebt'], 0, ",", ".") ?></span>
                        </li>   
                        <?php } ?>                                       
                    </ul>
                    <ul class="financial-list">
                        <li class="financial-items">
                            <span class="money__title"><?= $main['Doanh thu'] ?></span>
                            <span class="financial__money-amount"><?= number_format($revenu, 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title"><?= $main['Chi phí'] ?></span>
                            <span class="financial__money-amount"><?= number_format($cost, 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title"><?= $main['lơi nhuận'] ?></span>
                            <span class="financial__money-amount"><?= number_format($profit, 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title"><?= $main['hàng tồn kho'] ?></span>
                            <span class="financial__money-amount"><?= number_format($totalProduct, 0, ",", ".") ?></span>
                        </li>                                    
                    </ul>
                </div>
            </div>
        </div>
        <div class="box Aged-receivables-analysis">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading"><?= $main['nợ phải thu theo hạn nợ'] ?></h3>
                </div>
                <div class="debt-receivables-content">
                    <div class="debt-main-summary">
                        <div class="flex">
                            <span class="debt-main-amount"><?= number_format($totalCusDebt, 0, ",", ".") ?></span>
                            <span class="debt-unit"><?= $main['Triệu'] ?></span>
                        </div>
                        <div class="debt-summary-title"><?= $main['Tổng'] ?></div>
                    </div>
                    <div class="debt-secondary-summary">
                        <div class="flex-father">
                            <div class="flex">
                                <span class="debt-secondary-amount debt-secondary-amount--hightlight">0</span>
                                <span class="debt-unit debt-secondary-amount--hightlight"><?= $main['Triệu'] ?></span>
                            </div>
                            <div class="flex">
                                <span class="debt-secondary-amount">0</span>
                                <span class="debt-unit"><?= $main['Triệu'] ?></span>
                            </div>
                        </div>
                        <div class="flex-father">
                            <div class="debt-summary-title"><?= $main['Quá hạn'] ?></div>
                            <div class="debt-summary-title"><?= $main['Trong hạn'] ?></div>
                        </div>
                    </div>
                    <div class="debt-rate-wrap">
                        <div class="debt-rate__left" style="width: 50%;"></div>
                        <div class="debt-rate__right" style="width: 50%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box Aged-payable-analysis">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading"><?= $main['Nợ phải trả theo hạn nợ'] ?></h3>
                </div>
                <div class="debt-receivables-content">
                    <div class="debt-main-summary">
                        <div class="flex">
                            <span class="debt-main-amount"><?= number_format($totalSupDebt, 0, ",", ".") ?></span>
                            <span class="debt-unit"><?= $main['Triệu'] ?></span>
                        </div>
                        <div class="debt-summary-title"><?= $main['Tổng'] ?></div>
                    </div>
                    <div class="debt-secondary-summary">
                        <div class="flex-father">
                            <div class="flex">
                                <span class="debt-secondary-amount debt-secondary-amount--hightlight">0</span>
                                <span class="debt-unit debt-secondary-amount--hightlight"><?= $main['Triệu'] ?></span>
                            </div>
                            <div class="flex">
                                <span class="debt-secondary-amount">0</span>
                                <span class="debt-unit"><?= $main['Triệu'] ?></span>
                            </div>
                        </div>
                        <div class="flex-father">
                            <div class="debt-summary-title"><?= $main['Quá hạn'] ?></div>
                            <div class="debt-summary-title"><?= $main['Trong hạn'] ?></div>
                        </div>
                    </div>
                    <div class="debt-rate-wrap">
                        <div class="debt-rate__left" style="width: 50%;"></div>
                        <div class="debt-rate__right" style="width: 50%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="box Cash-flows">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading"><?= $main['Dòng tiền'] ?></h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title"><?= $main['Tháng này'] ?></span>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="box-time-line__dropdown-list">
                            <li class="dropdown-items dropdown-items--active">Hôm nay</li>
                            <li class="dropdown-items">Tuần này</li>
                            <li class="dropdown-items">Tháng này</li>
                            <li class="dropdown-items">Tháng 1</li>
                            <li class="dropdown-items">Tháng 2</li>
                            <li class="dropdown-items">Tháng 3</li>
                            <li class="dropdown-items">Tháng 4</li>
                            <li class="dropdown-items">Tháng 5</li>
                            <li class="dropdown-items">Tháng 6</li>
                            <li class="dropdown-items">Tháng 7</li>
                            <li class="dropdown-items">Tháng 8</li>
                            <li class="dropdown-items">Tháng 9</li>
                            <li class="dropdown-items">Tháng 10</li>
                            <li class="dropdown-items">Tháng 11</li>
                            <li class="dropdown-items">Tháng 12</li>
                        </ul>
                    </div>
                </div>
                <div class="cash-flows__description">
                    <div class="flex">
                        <span class="cash-main-amount"><?= number_format($revenu, 0, ",",".") ?></span>
                        <span class="debt-unit"><?= $main['Triệu'] ?></span>
                    </div>
                    <div class="flex">
                        <span class="cash-main-amount"><?= number_format($cost, 0, ",",".") ?></span>
                        <span class="debt-unit"><?= $main['Triệu'] ?></span>
                    </div>
                    <div class="flex">
                        <span class="cash-main-amount"><?= number_format($cash, 0, ",",".") ?></span>
                        <span class="debt-unit"><?= $main['Triệu'] ?></span>
                    </div>
                    <div class="box__money-unit2"><?= $main['Đvt'] .$main['Triệu'] ?></div>
                </div>
                <div class="cash-flows-summary">
                    <div class="debt-summary-title"><?= $main['Tổng thu'] ?></div>
                    <div class="debt-summary-title cash-flows-margin"><?= $main['Tổng chi'] ?></div>
                    <div class="debt-summary-title cash-flows-margin"><?= $main['Tồn'] ?></div>
                </div>
                <div class="Cash-flows-chartBox">
                    <canvas id="stackedChart"></canvas>
                </div>
            </div>
        </div>
        <div class="box Receivables-from-customer">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading"><?= $main['Nợ phải thu khách hàng'] ?></h3>
                    <div class="box-time-line">
                        <span class="financial-title"><?= $main['Tháng này'] ?></span>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="box-time-line__dropdown-list">
                            <li class="dropdown-items dropdown-items--active">Hôm nay</li>
                            <li class="dropdown-items">Tuần này</li>
                            <li class="dropdown-items">Tháng này</li>
                            <li class="dropdown-items">Tháng 1</li>
                            <li class="dropdown-items">Tháng 2</li>
                            <li class="dropdown-items">Tháng 3</li>
                            <li class="dropdown-items">Tháng 4</li>
                            <li class="dropdown-items">Tháng 5</li>
                            <li class="dropdown-items">Tháng 6</li>
                            <li class="dropdown-items">Tháng 7</li>
                            <li class="dropdown-items">Tháng 8</li>
                            <li class="dropdown-items">Tháng 9</li>
                            <li class="dropdown-items">Tháng 10</li>
                            <li class="dropdown-items">Tháng 11</li>
                            <li class="dropdown-items">Tháng 12</li>
                        </ul>
                    </div>
                </div>
                <div class="cash-flows__description">
                    <div class="flex">
                        <span class="cash-main-amount"><?= number_format($totalCusDebt, 0, ",",".") ?></span>
                        <span class="debt-unit"><?= $main['Triệu'] ?></span>
                    </div>
                    <div class="box__money-unit2"><?= $main['Đvt'] .$main['Triệu'] ?></div>
                </div>
                <div class="debt-summary-title box5-7-margin-bottom"><?= $main['Tổng'] ?></div>
                <ul class="debt-list">
                    <?php while($row = mysqli_fetch_array($customerdebt)) {
                        if($row['collect'] == 'not collect') {    
                    ?>
                    <li class="debt-items">
                        <div class="debt-num"><?= $row['CusDid']; ?></div>
                        <div class="debt-items__title"><?= $row['customername']; ?></div>
                        <div class="debt-items__cus-name"><?= $row['duration']; ?></div>
                        <div class="debt-items__money"><?= number_format($row['debt'], 0, ",","."); ?></div>
                    </li>
                    <?php } 
                } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="box Revenue">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading"><?= $main['Doanh thu'] ?></h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title"><?= $main['Tháng này'] ?></span>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="box-time-line__dropdown-list">
                            <li class="dropdown-items dropdown-items--active">Hôm nay</li>
                            <li class="dropdown-items">Tuần này</li>
                            <li class="dropdown-items">Tháng này</li>
                            <li class="dropdown-items">Tháng 1</li>
                            <li class="dropdown-items">Tháng 2</li>
                            <li class="dropdown-items">Tháng 3</li>
                            <li class="dropdown-items">Tháng 4</li>
                            <li class="dropdown-items">Tháng 5</li>
                            <li class="dropdown-items">Tháng 6</li>
                            <li class="dropdown-items">Tháng 7</li>
                            <li class="dropdown-items">Tháng 8</li>
                            <li class="dropdown-items">Tháng 9</li>
                            <li class="dropdown-items">Tháng 10</li>
                            <li class="dropdown-items">Tháng 11</li>
                            <li class="dropdown-items">Tháng 12</li>
                        </ul>
                    </div>
                </div>
                <div class="cash-flows__description">
                    <div class="flex">
                        <span class="cash-main-amount"><?= number_format($revenu, 0, ",", ".") ?></span>
                        <span class="debt-unit"><?= $main['Triệu'] ?></span>
                    </div>
                    <div class="box__money-unit2"><?= $main['Đvt'] .$main['Triệu'] ?></div>
                </div>
                <div class="debt-summary-title revenue-flows-margin"><?= $main['Tổng'] ?></div>
                <div class="Cash-flows-linechartBox">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>
        <div class="box Payables-to-supplier">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading"><?= $main['Nợ phải trả nhà cung cấp'] ?></h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title"><?= $main['Tháng này'] ?></span>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="box-time-line__dropdown-list">
                            <li class="dropdown-items dropdown-items--active">Hôm nay</li>
                            <li class="dropdown-items">Tuần này</li>
                            <li class="dropdown-items">Tháng này</li>
                            <li class="dropdown-items">Tháng 1</li>
                            <li class="dropdown-items">Tháng 2</li>
                            <li class="dropdown-items">Tháng 3</li>
                            <li class="dropdown-items">Tháng 4</li>
                            <li class="dropdown-items">Tháng 5</li>
                            <li class="dropdown-items">Tháng 6</li>
                            <li class="dropdown-items">Tháng 7</li>
                            <li class="dropdown-items">Tháng 8</li>
                            <li class="dropdown-items">Tháng 9</li>
                            <li class="dropdown-items">Tháng 10</li>
                            <li class="dropdown-items">Tháng 11</li>
                            <li class="dropdown-items">Tháng 12</li>
                        </ul>
                    </div>
                </div>
                <div class="cash-flows__description">
                    <div class="flex">
                        <span class="cash-main-amount"><?= number_format($totalSupDebt, 0, ",",".") ?></span>
                        <span class="debt-unit"><?= $main['Triệu'] ?></span>
                    </div>
                    <div class="box__money-unit2"><?= $main['Đvt'] .$main['Triệu'] ?></div>
                </div>
                <div class="debt-summary-title box5-7-margin-bottom"><?= $main['Tổng'] ?></div>
                <ul class="debt-list">
                <?php while($row = mysqli_fetch_array($supplierdebt)) { ?>
                    <li class="debt-items">
                        <div class="debt-num"><?= $row['id']; ?></div>
                        <div class="debt-items__title"><?= $row['content']; ?></div>
                        <div class="debt-items__cus-name"><?= $row['suppliername']; ?></div>
                        <div class="debt-items__money"><?= number_format($row['debt'], 0, ".","."); ?></div>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="box On-hand-inventory">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading"><?= $main['Hàng hóa tồn kho'] ?></h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title"><?= $main['Tháng này'] ?></span>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="box-time-line__dropdown-list">
                            <li class="dropdown-items dropdown-items--active">Hôm nay</li>
                            <li class="dropdown-items">Tuần này</li>
                            <li class="dropdown-items">Tháng này</li>
                            <li class="dropdown-items">Tháng 1</li>
                            <li class="dropdown-items">Tháng 2</li>
                            <li class="dropdown-items">Tháng 3</li>
                            <li class="dropdown-items">Tháng 4</li>
                            <li class="dropdown-items">Tháng 5</li>
                            <li class="dropdown-items">Tháng 6</li>
                            <li class="dropdown-items">Tháng 7</li>
                            <li class="dropdown-items">Tháng 8</li>
                            <li class="dropdown-items">Tháng 9</li>
                            <li class="dropdown-items">Tháng 10</li>
                            <li class="dropdown-items">Tháng 11</li>
                            <li class="dropdown-items">Tháng 12</li>
                        </ul>
                    </div>
                </div>
                <div class="cash-flows__description">
                    <div class="flex">
                        <span class="cash-main-amount"><?= number_format($inventoryValue, 0, ",",".") ?></span>
                        <span class="debt-unit"><?= $main['Triệu'] ?></span>
                    </div>
                    <div class="box__money-unit2"><?= $main['Đvt'] .$main['Triệu'] ?></div>
                </div>
                <div class="debt-summary-title box5-7-margin-bottom"><?= $main['Tổng'] ?></div>
                <ul class="debt-title-list">
                    <li class="box8-num"><?= $main['STT'] ?></li>
                    <li class="box8-items__title"><?= $main['Tên'] ?></li>
                    <li class="box8-items__cus-name"><?= $main['Số lượng'] ?></li>
                    <li class="box8-items__money"><?= $main['Giá trị'] ?></li>
                </ul>
                <ul class="debt-list">
                    <?php while($row = mysqli_fetch_array($queryproducts)) { 
                        $value = $row['quantity'] * $row['price'];
                    ?>
                    <li class="debt-items">
                        <div class="box8-num"><?= $row['id']; ?></div>
                        <div class="box8-items__title"><?= $row['proname']; ?></div>
                        <div class="box8-items__cus-name"><?= $row['quantity']; ?></div>
                        <div class="box8-items__money"><?= number_format($value, 0, ",","."); ?></div>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <!-- <div class="box Receivable-due-in-5-day">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Nợ phải thu sắp đến hạn phải thu trong 5 ngày</h3>
                </div>
                <div class="cash-flows__description">
                    <div class="flex">
                        <span class="cash-main-amount">0</span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="box__money-unit2">Đvt: Triệu</div>
                </div>
                <div class="debt-summary-title cash-flows-margin">Tổng</div>
                <ul class="debt-collect-title-list">
                    <li class="debt-collect-title-items">STT</li>
                    <li class="debt-collect-title-items">Hạn thanh toán</li>
                    <li class="debt-collect-title-items">Khách hàng</li>
                    <li class="debt-collect-title-items">số tiền</li>
                </ul>
                <ul class="debt-collect-list">
                    <li class="debt-collect-items">
                        <div class="debt-collect-num">1</div>
                        <div class="debt-collect-items__time">10/3/2022 15:24:2</div>
                        <div class="debt-collect-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-collect-items__money">2.000.000</div>
                    </li>
                    <li class="debt-collect-items">
                        <div class="debt-collect-num">2</div>
                        <div class="debt-collect-items__time">10/3/2022 15:24:2</div>
                        <div class="debt-collect-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-collect-items__money">2.000.000</div>
                    </li>
                    <li class="debt-collect-items">
                        <div class="debt-collect-num">3</div>
                        <div class="debt-collect-items__time">10/3/2022 15:24:2</div>
                        <div class="debt-collect-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-collect-items__money">2.000.000</div>
                    </li>
                    <li class="debt-collect-items">
                        <div class="debt-collect-num">4</div>
                        <div class="debt-collect-items__time">10/3/2022 15:24:2</div>
                        <div class="debt-collect-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-collect-items__money">2.000.000</div>
                    </li>
                </ul>
            </div>
        </div> -->
        
        <div class="box Expense">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading"><?= $main['Chi phí'] ?></h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title"><?= $main['Tháng này'] ?></span>
                        <i class="fa-solid fa-angle-down"></i>
                        <ul class="box-time-line__dropdown-list">
                            <li class="dropdown-items dropdown-items--active">Hôm nay</li>
                            <li class="dropdown-items">Tuần này</li>
                            <li class="dropdown-items">Tháng này</li>
                            <li class="dropdown-items">Tháng 1</li>
                            <li class="dropdown-items">Tháng 2</li>
                            <li class="dropdown-items">Tháng 3</li>
                            <li class="dropdown-items">Tháng 4</li>
                            <li class="dropdown-items">Tháng 5</li>
                            <li class="dropdown-items">Tháng 6</li>
                            <li class="dropdown-items">Tháng 7</li>
                            <li class="dropdown-items">Tháng 8</li>
                            <li class="dropdown-items">Tháng 9</li>
                            <li class="dropdown-items">Tháng 10</li>
                            <li class="dropdown-items">Tháng 11</li>
                            <li class="dropdown-items">Tháng 12</li>
                        </ul>
                    </div>
                </div>
                <div class="cash-flows__description">
                    <div class="flex">
                        <span class="cash-main-amount"><?= number_format($costTotal, 0, ",",".") ?></span>
                        <span class="debt-unit"><?= $main['Triệu'] ?></span>
                    </div>
                    <div class="box__money-unit2"><?= $main['Đvt'] .$main['Triệu'] ?></div>
                </div>
                <div class="debt-summary-title box5-7-margin-bottom"><?= $main['Tổng'] ?></div>
                <ul class="expense-title-list">
                    <li class="expense-num"><?= $main['STT'] ?></li>
                    <li class="expense-items__content"><?= $main['Tên'] ?></li>
                    <li class="expense-items__money"><?= $main['Chi phí'] ?></li>
                </ul>
                <ul class="expense-list">
                <?php while($row = mysqli_fetch_array($querycost)) { 
                    $value = $row['quantity'] * $row['price'];
                ?>
                    <li class="expense-items">
                        <div class="expense-num"><?= $row['id'] ?></div>
                        <div class="expense-items__content"><?= $row['content'] ?></div>
                        <div class="expense-items__money"><?= number_format($value, 0, ",", ".") ?></div>
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="box Running-out-of-stock-items">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading"><?= $main['Hàng hóa sắp hết'] ?></h3>
                </div>
                <ul class="last-box-list">
                    <li class="last-box1 head-text-color"><?= $main['Tên hàng hóa'] ?></li>
                    <li class="last-box2 head-text-color"><?= $main['Kho'] ?></li>
                    <li class="last-box3 head-text-color"><?= $main['SL tồn'] ?></li>
                    <li class="last-box4 head-text-color"><?= $main['SL tồn tối thiểu'] ?></li>
                </ul>
                <ul class="last-box-items-list">
                <?php while($row = mysqli_fetch_array($queryProduct)) { 
                    if($row['quantity'] == 0) {
                        $productOut++;
                    }
                    if($row['quantity'] <= $row['minimumQuantity']) {
                        $productRunout++;
                ?>
                    <li class="last-box-items">
                        <div class="last-box1"><?= $row['proname'] ?></div>
                        <div class="last-box2"><?= $row['inventoryid'] ?></div>
                        <div class="last-box3"><?= $row['quantity'] ?></div>
                        <div class="last-box4"><?= $row['minimumQuantity'] ?></div>
                    </li>
                <?php
                    }
                } 
                ?>
                </ul>
            </div>
        </div>
        <!-- <div class="box Payables-due-in-5-day">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Nợ phải trả sắp đến hạn phải thu trong 5 ngày</h3>
                </div>
                <div class="cash-flows__description">
                    <div class="flex">
                        <span class="cash-main-amount">0</span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="box__money-unit2">Đvt: Triệu</div>
                </div>
                <div class="debt-summary-title cash-flows-margin">Tổng</div>
                <ul class="debt-collect-title-list">
                    <li class="debt-collect-title-items">STT</li>
                    <li class="debt-collect-title-items">Hạn thanh toán</li>
                    <li class="debt-collect-title-items">Khách hàng</li>
                    <li class="debt-collect-title-items">số tiền</li>
                </ul>
                <ul class="debt-collect-list">
                    <li class="debt-collect-items">
                        <div class="debt-collect-num">1</div>
                        <div class="debt-collect-items__time">10/3/2022 15:24:2</div>
                        <div class="debt-collect-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-collect-items__money">2.000.000</div>
                    </li>
                    <li class="debt-collect-items">
                        <div class="debt-collect-num">2</div>
                        <div class="debt-collect-items__time">10/3/2022 15:24:2</div>
                        <div class="debt-collect-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-collect-items__money">2.000.000</div>
                    </li>
                    <li class="debt-collect-items">
                        <div class="debt-collect-num">3</div>
                        <div class="debt-collect-items__time">10/3/2022 15:24:2</div>
                        <div class="debt-collect-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-collect-items__money">2.000.000</div>
                    </li>
                    <li class="debt-collect-items">
                        <div class="debt-collect-num">4</div>
                        <div class="debt-collect-items__time">10/3/2022 15:24:2</div>
                        <div class="debt-collect-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-collect-items__money">2.000.000</div>
                    </li>
                </ul>
            </div>
        </div> -->

    </div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const revennu = <?= json_encode($RevenuMonth); ?>;
    const cost = <?= json_encode($CostMonth); ?>;
    const exist = <?= json_encode($ExistMonth); ?>;
    const stackedData = {
    labels: ['Th1', 'Th2', 'Th3', 'Th4', 'Th5', 'Th6', 'Th7', 'Th8', 'Th9', 'Th10', 'Th11', 'Th12'],
    datasets: [{
    label: 'Tổng thu',
    data: revennu,
    backgroundColor: [
        'rgba(0, 117, 192, 0.7)'
    ],
    borderColor: [
        'rgba(0, 117, 192, 1)'
    ],
    borderWidth: 1
    }, {
    label: 'Tổng chi',
    data: cost,
    backgroundColor: [
        'rgba(212, 215, 220, 0.8)'
    ],
    borderColor: [
        'rgba(212, 215, 220, 1)'
    ],
    borderWidth: 1
    }, {
    label: 'Tồn',
    data: exist,
    backgroundColor: 'rgba(248, 135, 42, 0.2)',
    borderColor: 'rgba(248, 135, 42, 1)',
    tension: .4,
    type: 'line'
    }]
};

// config 
const config = {
    type: 'bar',
    data: stackedData,
    options: {
    scales: {
        x: {
            stacked: true
        },
        y: {
        beginAtZero: true,
        stacked: true
        }
    }
    }
};

// render init block
const stacked = new Chart(
    document.getElementById('stackedChart'),
    config
);
</script>
<script>
    const linedata = <?= json_encode($RevenuMonth); ?>;
    const lineData = {
    labels: ['Th1', 'Th2', 'Th3', 'Th4', 'Th5', 'Th6', 'Th7', 'Th8', 'Th9', 'Th10', 'Th11', 'Th12'],
    datasets: [{
    label: 'Doanh thu',
    data: linedata,
    backgroundColor: 'rgba(248, 135, 42, 0.2)',
    borderColor: 'rgba(248, 135, 42, 1)',
    tension: .4,
    type: 'line'
    }]
};

// config 
const config2 = {
    type: 'line',
    data: lineData,
    options: {
    scales: {
        x: {
            stacked: true
        },
        y: {
        beginAtZero: true,
        stacked: true
        }
    }
    }
};

// render init block
const line = new Chart(
    document.getElementById('lineChart'),
    config2
);
</script>

