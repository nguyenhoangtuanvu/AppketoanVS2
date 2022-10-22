<?php

?>
<div class="form-content">
    <form method="POST" action="addData.php?data=<?=$stt ?>&action=addBuy" class="second-table form-table">
        <div class="row">
            <div class="object-info">
                <div class="object-info-wrap">
                    <div class="object-company">
                        <h5 class="input-label"><?= $main['Nhà cung cấp'] ?></h5>
                        <div class="form-input-wrap">
                            <select class="form-dropdown-box" name="supplier">
                                <?php if(isset($showPur['supname'])) {  ?>
                                    <option value="<?= $showPur['supname'] ?>"  selected hidden><?= $showPur['supname'] ?> </option>
                                <?php } ?>
                                <?php while($row = mysqli_fetch_array($querySupplier)) { ?>
                                <option class="form-dropdown-items" value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="object-person">
                            <h5 class="input-label"><?= $main['Người giao hàng'] ?></h5>
                            <div class="form-input-wrap">
                                <input type="text" name="person" value="<?= isset($showPur['person']) ? $showPur['person'] : '' ?>" class="form-input form-input-1-2">
                            </div>
                    </div>
                </div>
                <!-- <h5 class="input-label">Địa chỉ</h5>
                <div class="form-input-wrap">
                    <input type="text" class="form-input">
                </div> -->
                <h5 class="input-label"><?= $main['Nhân viên'] ?></h5>
                <div class="form-input-wrap">
                    <select class="form-dropdown-box" name="employee">
                        <?php if(isset($showPur['employee'])) {  ?>
                            <option value="<?= $showPur['employee'] ?>"  selected hidden><?= $showPur['employee'] ?> </option>
                        <?php } ?>
                        <?php while($row = mysqli_fetch_array($queryEmployee)) { ?>
                        <option class="form-dropdown-items" value="<?= $row['staffName'] ?>"><?= $row['staffName'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="object-info-wrap">
                    <div class="object-company width-20">
                        <h5 class="input-label"><?= $main['Số ngày được nợ'] ?></h5>
                        <div class="form-input-wrap">
                            <input type="text" name="dateDuration" class="form-input form-input-1-3">
                        </div>
                    </div>
                    <div class="object-person width-20">
                            <h5 class="input-label"><?= $main['Hạn thanh toán'] ?></h5>
                            <div class="form-input-wrap">
                                <input type="date" name="duration" value="<?= isset($showPur['duration']) ? $showPur['duration'] : '' ?>" class="form-input form-input-1-3">
                            </div>
                    </div>
                </div>
            </div>
            <div class="object-transaction">
                <h5 class="input-label"><?= $main['Ngày'] ?></h5>
                <div class="form-input-wrap">
                    <input type="date" name="datetime" value="<?= isset($showPur['dateTime']) ? $showPur['dateTime'] : date("y-m-d") ?>" class="form-input">
                </div>
            </div>
            <div class="form-amount">
                <h5 class="form-amount-label"><?= $main['Tổng tiền'] ?></h5>
                <div class="form-amount-money"><?= isset($amount) ? number_format($amount, 0, ",",".") : 0 ?></div>
            </div>

        </div>
        <div class="row">
            <div class="form-table-wrap">
                <div class="form-table__thead">
                    <div class="form-row">
                        <div class="form-buyPro__box1 table-header"><?= $main['Diễn dải'] ?></div>              
                        <div class="form-buyPro__box2 table-header"><?= $main['Tên hàng'] ?></div>            
                        <div class="form-buyPro__box3 table-header"><?= $main['Số lượng'] ?></div>            
                        <div class="form-buyPro__box4 table-header"><?= $main['Đơn giá'] ?></div>            
                    </div>
                </div> 
                <div class="form-table__body">
                    <div class="form-row">
                        <div class="form-buyPro__box1 table-box">
                            <input type="text" name="content" value="<?= isset($showPur['content']) ? $showPur['content'] : '' ?>" class="form-input">
                        </div>              
                        <div class="form-buyPro__box2 table-box">
                            <select class="form-dropdown-box" name="product">
                                <?php if(isset($showPur['product'])) {  ?>
                                    <option value="<?= $showPur['product'] ?>"  selected hidden><?= $showPur['product'] ?> </option>
                                <?php } ?>
                                <?php while($row = mysqli_fetch_array($queryProduct)) { ?>
                                <option class="form-dropdown-items" value="<?= $row['proname'] ?>"><?= $row['proname'] ?></option>
                                <?php } ?>
                            </select>
                        </div>              
                        <div class="form-buyPro__box3 table-box">
                            <input type="text" name="quantity" value="<?= isset($showPur['quantity']) ? number_format($showPur['quantity'], 0, ",",".") : '' ?>" class="form-input input-align-right">
                        </div>              
                        <div class="form-buyPro__box4 table-box">
                            <input type="text" name="price" value="<?= isset($showPur['price']) ? number_format($showPur['price'], 0, ",",".") : '' ?>" class="form-input input-align-right">
                        </div>              
                    </div >
                </div>
                <!-- <div class="form-table__footer">
                    <div class="form-row">
                        <div class="table__box1 footer-box"></div>         
                        <div class="table__box2 footer-box"></div> 
                    </div>
                </div> -->
            </div>
        </div>
        <div class="footer ">
            <?php if(!isset($_GET['id'])) { ?>
            <button type="submit" class="form-submit margin-30">SAVE</button>
            <?php } ?>
        </div>
    </form>
</div>