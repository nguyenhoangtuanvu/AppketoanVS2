<?php
    $budget = mysqli_query($con, "SELECT * FROM `budget`");
    $customerDebt = mysqli_query($con, "SELECT * FROM `customerDebt`");
    $supplerDebt = mysqli_query($con, "SELECT * FROM `supplerDebt`");
?>
<div class="overview sidebar--open home-function">
    <div class="row">
        <div class="box financial-situation">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Tình hình tài chính</h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title">Tháng này</span>
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
                <div class="box__money-unit">Đvt: Triệu</div>
                <div class="financial-content">
                    <ul class="financial-list">
                        <?php while($row = mysqli_fetch_array($budget)) { ?>
                        <li class="financial-items">
                            <span class="money__title">Tổng tiền</span>
                            <span class="financial__money-amount"><?= number_format($row['budget'], 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title">Tiền mặt</span>
                            <span class="financial__money-amount"><?= number_format($row['cash'], 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title">Tiền gửi</span>
                            <span class="financial__money-amount"><?= number_format($row['banking'], 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title">Phải thu</span>
                            <span class="financial__money-amount"><?= number_format($row['customerDebt'], 0, ",", ".") ?></span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title">Phải trả</span>
                            <span class="financial__money-amount"><?= number_format($row['supplierDebt'], 0, ",", ".") ?></span>
                        </li>   
                        <?php } ?>                                       
                    </ul>
                    <ul class="financial-list">
                        <li class="financial-items">
                            <span class="money__title">Doanh thu</span>
                            <span class="financial__money-amount">0</span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title">Chi phí</span>
                            <span class="financial__money-amount">0</span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title">Lợi nhuận</span>
                            <span class="financial__money-amount">0</span>
                        </li>
                        <li class="financial-items">
                            <span class="money__title">Hàng tồn kho</span>
                            <span class="financial__money-amount">0</span>
                        </li>                                    
                    </ul>
                </div>
            </div>
        </div>
        <div class="box Aged-receivables-analysis">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Nợ phải thu theo hạn nợ</h3>
                </div>
                <div class="debt-receivables-content">
                    <div class="debt-main-summary">
                        <div class="flex">
                            <span class="debt-main-amount">0</span>
                            <span class="debt-unit">Triệu</span>
                        </div>
                        <div class="debt-summary-title">Tổng</div>
                    </div>
                    <div class="debt-secondary-summary">
                        <div class="flex-father">
                            <div class="flex">
                                <span class="debt-secondary-amount debt-secondary-amount--hightlight">0</span>
                                <span class="debt-unit debt-secondary-amount--hightlight">Triệu</span>
                            </div>
                            <div class="flex">
                                <span class="debt-secondary-amount">0</span>
                                <span class="debt-unit">Triệu</span>
                            </div>
                        </div>
                        <div class="flex-father">
                            <div class="debt-summary-title">Quá hạn</div>
                            <div class="debt-summary-title">Trong hạn</div>
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
                    <h3 class="box-heading">Nợ phải trả theo hạn nợ</h3>
                </div>
                <div class="debt-receivables-content">
                    <div class="debt-main-summary">
                        <div class="flex">
                            <span class="debt-main-amount">0</span>
                            <span class="debt-unit">Triệu</span>
                        </div>
                        <div class="debt-summary-title">Tổng</div>
                    </div>
                    <div class="debt-secondary-summary">
                        <div class="flex-father">
                            <div class="flex">
                                <span class="debt-secondary-amount debt-secondary-amount--hightlight">0</span>
                                <span class="debt-unit debt-secondary-amount--hightlight">Triệu</span>
                            </div>
                            <div class="flex">
                                <span class="debt-secondary-amount">0</span>
                                <span class="debt-unit">Triệu</span>
                            </div>
                        </div>
                        <div class="flex-father">
                            <div class="debt-summary-title">Quá hạn</div>
                            <div class="debt-summary-title">Trong hạn</div>
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
                    <h3 class="box-heading">Dòng tiền</h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title">Tháng này</span>
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
                        <span class="cash-main-amount">0</span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="flex">
                        <span class="cash-main-amount">0</span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="flex">
                        <span class="cash-main-amount">0</span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="box__money-unit2">Đvt: Triệu</div>
                </div>
                <div class="cash-flows-summary">
                    <div class="debt-summary-title">Tổng thu</div>
                    <div class="debt-summary-title cash-flows-margin">Tổng chi</div>
                    <div class="debt-summary-title cash-flows-margin">Tồn</div>
                </div>
                <div class="Cash-flows-chartBox">
                    <canvas id="stackedChart"></canvas>
                </div>
            </div>
        </div>

        <div class="box Receivables-from-customer">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Nợ phải thu khách hàng</h3>
                    <div class="box-time-line">
                        <span class="financial-title">Tháng này</span>
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
                        <span class="cash-main-amount">0</span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="box__money-unit2">Đvt: Triệu</div>
                </div>
                <div class="debt-summary-title box5-7-margin-bottom">Tổng</div>
                <ul class="debt-list">
                    <li class="debt-items">
                        <div class="debt-num">1</div>
                        <div class="debt-items__title">Nợ tiền vật liệu xây dựng</div>
                        <div class="debt-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-items__money">2.000.000</div>
                    </li>
                    <li class="debt-items">
                        <div class="debt-num">2</div>
                        <div class="debt-items__title">Nợ tiền vật liệu xây dựng</div>
                        <div class="debt-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-items__money">2.000.000</div>
                    </li>
                    <li class="debt-items">
                        <div class="debt-num">3</div>
                        <div class="debt-items__title">Nợ tiền vật liệu xây dựng</div>
                        <div class="debt-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-items__money">2.000.000</div>
                    </li>
                    <li class="debt-items">
                        <div class="debt-num">4</div>
                        <div class="debt-items__title">Nợ tiền vật liệu xây dựng</div>
                        <div class="debt-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-items__money">2.000.000</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="box Revenue">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Doanh thu</h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title">Tháng này</span>
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
                        <span class="cash-main-amount">0</span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="box__money-unit2">Đvt: Triệu</div>
                </div>
                <div class="debt-summary-title revenue-flows-margin">Tồng</div>
                <div class="Cash-flows-linechartBox">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>
        <div class="box Payables-to-supplier">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Nợ phải trả nhà cung cấp</h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title">Tháng này</span>
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
                        <span class="cash-main-amount">0</span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="box__money-unit2">Đvt: Triệu</div>
                </div>
                <div class="debt-summary-title box5-7-margin-bottom">Tồng</div>
                <ul class="debt-list">
                    <li class="debt-items">
                        <div class="debt-num">1</div>
                        <div class="debt-items__title">Nợ tiền vật liệu xây dựng</div>
                        <div class="debt-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-items__money">2.000.000</div>
                    </li>
                    <li class="debt-items">
                        <div class="debt-num">2</div>
                        <div class="debt-items__title">Nợ tiền vật liệu xây dựng</div>
                        <div class="debt-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-items__money">2.000.000</div>
                    </li>
                    <li class="debt-items">
                        <div class="debt-num">3</div>
                        <div class="debt-items__title">Nợ tiền vật liệu xây dựng</div>
                        <div class="debt-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-items__money">2.000.000</div>
                    </li>
                    <li class="debt-items">
                        <div class="debt-num">4</div>
                        <div class="debt-items__title">Nợ tiền vật liệu xây dựng</div>
                        <div class="debt-items__cus-name">Nguyễn hồng duy</div>
                        <div class="debt-items__money">2.000.000</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="box On-hand-inventory">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Hàng hóa tồn kho</h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title">Tháng này</span>
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
                        <span class="cash-main-amount">0</span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="box__money-unit2">Đvt: Triệu</div>
                </div>
                <div class="debt-summary-title box5-7-margin-bottom">Tồng</div>
                <ul class="debt-title-list">
                    <li class="box8-num">STT</li>
                    <li class="box8-items__title">Tên</li>
                    <li class="box8-items__cus-name">Số lượng</li>
                    <li class="box8-items__money">Giá trị</li>
                </ul>
                <ul class="debt-list">
                    <li class="debt-items">
                        <div class="box8-num">1</div>
                        <div class="box8-items__title">Nợ tiền vật liệu xây dựng</div>
                        <div class="box8-items__cus-name">200</div>
                        <div class="box8-items__money">2.000.000</div>
                    </li>
                    <li class="debt-items">
                        <div class="box8-num">2</div>
                        <div class="box8-items__title">Nợ tiền vật liệu xây dựng</div>
                        <div class="box8-items__cus-name">200</div>
                        <div class="box8-items__money">2.000.000</div>
                    </li>
                    <li class="debt-items">
                        <div class="box8-num">3</div>
                        <div class="box8-items__title">Nợ tiền vật liệu xây dựng</div>
                        <div class="box8-items__cus-name">200</div>
                        <div class="box8-items__money">2.000.000</div>
                    </li>
                    <li class="debt-items">
                        <div class="box8-num">4</div>
                        <div class="box8-items__title">Nợ tiền vật liệu xây dựng</div>
                        <div class="box8-items__cus-name">200</div>
                        <div class="box8-items__money">2.000.000</div>
                    </li>
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
                <div class="debt-summary-title cash-flows-margin">Tồng</div>
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
                    <h3 class="box-heading">Chi phí</h3>
                    <div class="box-time-line">
                        <span class="box-time-line-title">Tháng này</span>
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
                        <span class="cash-main-amount">0</span>
                        <span class="debt-unit">Triệu</span>
                    </div>
                    <div class="box__money-unit2">Đvt: Triệu</div>
                </div>
                <div class="debt-summary-title box5-7-margin-bottom">Tồng</div>
                <ul class="expense-title-list">
                    <li class="expense-num">STT</li>
                    <li class="expense-items__content">Tên</li>
                    <li class="expense-items__money">Chi phí</li>
                </ul>
                <ul class="expense-list">
                    <li class="expense-items">
                        <div class="expense-num">1</div>
                        <div class="expense-items__content">nhập 1000 bao xi măng hoàng sơn</div>
                        <div class="expense-items__money">2.000.000</div>
                    </li>
                    <li class="expense-items">
                        <div class="expense-num">2</div>
                        <div class="expense-items__content">nhập 1000 bao xi măng hoàng sơn</div>
                        <div class="expense-items__money">2.000.000</div>
                    </li>
                    <li class="expense-items">
                        <div class="expense-num">3</div>
                        <div class="expense-items__content">nhập 1000 bao xi măng hoàng sơn</div>
                        <div class="expense-items__money">2.000.000</div>
                    </li>
                    <li class="expense-items">
                        <div class="expense-num">4</div>
                        <div class="expense-items__content">nhập 1000 bao xi măng hoàng sơn</div>
                        <div class="expense-items__money">2.000.000</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="box Running-out-of-stock-items">
            <div class="box-wrap">
                <div class="box-header">
                    <h3 class="box-heading">Hàng hóa sắp hết</h3>
                </div>
                <ul class="last-box-list">
                    <li class="last-box1 head-text-color">Tên hàng hóa</li>
                    <li class="last-box2 head-text-color">Kho</li>
                    <li class="last-box3 head-text-color">SL tồn</li>
                    <li class="last-box4 head-text-color">SL tồn tối thiểu</li>
                </ul>
                <ul class="last-box-items-list">
                    <li class="last-box-items">
                        <div class="last-box1">xi măng bỉm sơn</div>
                        <div class="last-box2">200</div>
                        <div class="last-box3">200</div>
                        <div class="last-box4">100</div>
                    </li>
                    <li class="last-box-items">
                        <div class="last-box1">xi măng bỉm sơn</div>
                        <div class="last-box2">200</div>
                        <div class="last-box3">200</div>
                        <div class="last-box4">100</div>
                    </li>
                    <li class="last-box-items">
                        <div class="last-box1">xi măng bỉm sơn</div>
                        <div class="last-box2">200</div>
                        <div class="last-box3">200</div>
                        <div class="last-box4">100</div>
                    </li>
                    <li class="last-box-items">
                        <div class="last-box1">xi măng bỉm sơn</div>
                        <div class="last-box2">200</div>
                        <div class="last-box3">200</div>
                        <div class="last-box4">100</div>
                    </li>
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
                <div class="debt-summary-title cash-flows-margin">Tồng</div>
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