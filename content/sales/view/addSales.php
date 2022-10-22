<?php

?>
<div class="form-content">
    <form method="POST" action="addData.php?data=<?=$stt ?>&action=addSales" class="second-table form-table">
        <div class="row">
            <div class="object-info">
                <h5 class="input-label">Khách hàng</h5>
                <div class="form-input-wrap">
                    <select class="form-dropdown-box" name="customer">
                        <?php if(isset($showSal['cusname'])) {  ?>
                            <option value="<?= $showSal['cusname'] ?>"  selected hidden><?= $showSal['cusname'] ?> </option>
                        <?php } ?>
                        <?php while($row = mysqli_fetch_array($queryCustomer)) { ?>
                        <option class="form-dropdown-items" value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <h5 class="input-label">Nhân viên bán hàng</h5>
                <div class="form-input-wrap">
                    <select class="form-dropdown-box" name="employee">
                        <?php if(isset($showSal['employee'])) {  ?>
                            <option value="<?= $showSal['employee'] ?>"  selected hidden><?= $showSal['employee'] ?> </option>
                        <?php } ?>
                        <?php while($row = mysqli_fetch_array($queryEmployee)) { ?>
                        <option class="form-dropdown-items" value="<?= $row['staffName'] ?>"><?= $row['staffName'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="object-info-wrap">
                    <div class="object-company width-20">
                        <h5 class="input-label">Số ngày được nợ</h5>
                        <div class="form-input-wrap">
                            <input type="text" name="dateDuration" class="form-input form-input-1-3">
                        </div>
                    </div>
                    <div class="object-person width-20">
                            <h5 class="input-label">Hạn thanh toán</h5>
                            <div class="form-input-wrap">
                                <input type="date" name="duration" value="<?= isset($showSal['duration']) ? $showSal['duration'] : date("Y-m-d+10") ?>" class="form-input form-input-1-3">
                            </div>
                    </div>
                </div>
            </div>
            <div class="object-transaction">
                <h5 class="input-label">Ngày bán</h5>
                <div class="form-input-wrap">
                    <input type="date" name="datetime" value="<?= isset($showSal['dateTime']) ? $showSal['dateTime'] : date("Y-m-d") ?>" class="form-input">
                </div>
            </div>
            <div class="form-amount">
                <h5 class="form-amount-label">Tổng tiền</h5>
                <div class="form-amount-money"><?= isset($showSal['amount']) ? number_format($showSal['amount'], 0, ",",".") : 0 ?></div>
            </div>

        </div>
        <div class="row">
            <div class="form-table-wrap">
                <div class="form-table__thead">
                    <div class="form-row">
                        <div class="form-salesPro__box1 table-header">Tên hàng</div>              
                        <div class="form-salesPro__box2 table-header">loại hàng</div>            
                        <div class="form-salesPro__box3 table-header">Đơn vị</div>            
                        <div class="form-salesPro__box4 table-header">Số lượng</div>            
                        <div class="form-salesPro__box5 table-header">Đơn giá</div>            
                    </div>
                </div> 
                <div class="form-table__body">
                    <div class="form-row">
                        <div class="form-salesPro__box1 table-box">
                            <select class="form-dropdown-box border-none" name="product">
                                <?php if(isset($showSal['product'])) {  ?>
                                        <option value="<?= $showSal['product'] ?>"  selected hidden><?= $showSal['product'] ?> </option>
                                <?php } ?>
                                <?php while($row = mysqli_fetch_array($queryProduct)) { ?>
                                    <option class="form-dropdown-items"><?= $row['proname'] ?></option>
                                <?php } ?>
                            </select>
                        </div>              
                        <div class="form-salesPro__box2 table-box">
                            <select class="form-dropdown-box border-none" name="category">
                                <?php if(isset($showSal['category'])) {  ?>
                                    <option value="<?= $showSal['category'] ?>"  selected hidden><?= $showSal['category'] ?> </option>
                                <?php } ?>
                                <?php while($row = mysqli_fetch_array($queryCategory)) { ?>
                                    <option class="form-dropdown-items"><?= $row['catename'] ?></option>
                                <?php } ?>
                            </select>
                        </div>              
                        <div class="form-salesPro__box3 table-box">
                            <select class="form-dropdown-box border-none" name="unit">
                                <?php if(isset($showSal['unit'])) {  ?>
                                        <option value="<?= $showSal['unit'] ?>"  selected hidden><?= $showSal['unit'] ?> </option>
                                <?php } ?>
                                <option class="form-dropdown-items">Bao</option>
                                <option class="form-dropdown-items">Lít</option>
                                <option class="form-dropdown-items">Chai</option>
                                <option class="form-dropdown-items">Cái</option>
                                <option class="form-dropdown-items">Kg</option>
                            </select>
                        </div>              
                        <div class="form-salesPro__box4 table-box">
                            <input type="text" name="quantity" value="<?= isset($showSal['quantity']) ? number_format($showSal['quantity'], 0, ",",".") : 0 ?>" class="form-input input-align-right">
                        </div>              
                        <div class="form-salesPro__box5 table-box">
                            <input type="text" name="price" value="<?= isset($price) ? number_format($price, 0, ",",".") : 0 ?>" class="form-input input-align-right">
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