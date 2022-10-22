<?php
    $valueMoney = array(500000, 200000, 100000, 50000, 20000, 10000, 5000, 2000, 1000);
?>
<div class="form-content">
    <form method="POST" action="addData.php?data=<?=$stt ?>&action=check" class="second-table form-table">
        <div class="row">
            <div class="object-info">
            <h5 class="input-label"><?= $main['Tổng'] ?>Mục đích</h5>
                <div class="form-input-wrap">
                    <input type="text" name="purpose" value="<?= $main['Tổng'] ?>Kiểm kê tiền mặt tại quỹ đến ngày <?= date("Y-m-d") ?>" class="form-input">
                </div>
                <div class="object-info-wrap-2">
                    <div class="object-company">
                        <h5 class="input-label"><?= $main['Tổng'] ?>Kiểm kê đến ngày</h5>
                        <div class="form-input-wrap">
                            <input type="date" name="dateTo" value="<?= date("Y-m-d") ?>" class="form-input form-input-1-3">
                        </div>
                    </div>
                    <div class="object-person">
                            <h5 class="input-label"><?= $main['Tổng'] ?>Loại tiền</h5>
                            <div class="form-input-wrap">
                                <input type="text" name="moneyUnit" class="form-input form-input-1-3" value="VND">
                            </div>
                    </div>
                </div>
            </div>
            <div class="object-transaction">
                <h5 class="input-label"><?= $main['Tổng'] ?>Ngày</h5>
                <div class="form-input-wrap">
                    <input type="date" name="datetime" value="<?= date("Y-m-d") ?>" class="form-input">
                </div>
            </div>
            <!-- <div class="form-amount">
                <h5 class="form-amount-label">Tổng tiền</h5>
                <div class="form-amount-money">0</div>
            </div> -->
        </div>
        <div class="row">
            <div class="form-table-wrap">
                <div class="form-table__thead">
                    <div class="form-row">
                        <div class="form-check-table__box1 table-header"><?= $main['Tổng'] ?>STT</div>              
                        <div class="form-check-table__box2 table-header"><?= $main['Tổng'] ?>Mệnh giá</div>            
                        <div class="form-check-table__box3 table-header"><?= $main['Tổng'] ?>Số Lượng</div>             
                        <!-- <div class="form-check-table__box4 table-header">Số tiền</div>              -->
                        <div class="form-check-table__box4 table-header"><?= $main['Tổng'] ?>Diễn giải</div>             
                    </div>
                </div> 
                <div class="form-table__body">
                    <?php for($i = 0; $i < count($valueMoney); $i++) { ?>
                    <div class="form-row">
                        <div class="form-check-table__box1 table-box">
                            <input type="text" name="stt" value="<?= $i ?>" class="form-input input-align-center">
                        </div>              
                        <div class="form-check-table__box2 table-box">
                            <input type="text" name="money[]" value="<?= number_format($valueMoney[$i], 0, ",",".") ?>" class="form-input input-align-right">
                        </div>              
                        <div class="form-check-table__box3 table-box">
                            <input type="text" name="quantity[]" value="0"  class="form-input input-align-right">
                        </div>               
                        <div class="form-check-table__box4 table-box">
                            <input type="text" name="content[]" class="form-input">
                        </div>               
                    </div >
                    <?php } ?>
                </div>
                <!-- <div class="form-table__footer">
                    <div class="form-row">
                        <div class="table__box1 footer-box"></div>         
                        <div class="table__box2 footer-box"></div> 
                    </div>
                </div> -->
            </div>
        </div>
        <div class="footer-fixed">
            <button type="submit" class="form-submit">SAVE</button>
        </div>
    </form>
</div>