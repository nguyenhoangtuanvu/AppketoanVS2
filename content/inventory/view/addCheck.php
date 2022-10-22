<?php

?>
<div class="form-content">
    <form method="POST" action="addData.php?data=<?=$stt ?>&action=addCheck" class="second-table form-table">
        <div class="row">
            <div class="object-info">
                <h5 class="input-label"><?= $main['Mục đích'] ?></h5>
                <div class="form-input-wrap">
                    <input type="text" name="description" value="<?= isset($showC['content']) ? $showC['content'] : $main['Kiểm kê kho đến ngày'] .date("Y-m-d") ?>" class="form-input">
                </div>
                <h5 class="input-label"><?= $main['Nhân viên'] ?></h5>
                <div class="form-input-wrap">
                    <select class="form-dropdown-box" name="employee">
                        <?php if(isset($showC['employee'])) {  ?>
                            <option value="<?= $showC['employee'] ?>"  selected hidden><?= $showC['employee'] ?> </option>
                        <?php } ?>
                        <?php while($row = mysqli_fetch_array($queryEmployee)) { ?>
                        <option class="form-dropdown-items" value="<?= $row['staffName'] ?>"><?= $row['staffName'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="object-info-wrap">
                    <div class="object-company width-20">
                        <h5 class="input-label"><?= $main['Kho'] ?></h5>
                        <div class="form-input-wrap">
                            <select class="form-dropdown-box border-none" name="inventory">
                                <?php if(isset($showC['inventory'])) {  ?>
                                    <option value="<?= $showC['inventory'] ?>"  selected hidden><?= $showC['inventory'] ?> </option>
                                <?php } ?>
                                    <option class="form-dropdown-items"><?= $main['Tất cả'] ?></option>
                                <?php while($row = mysqli_fetch_array($queryInventory)) { ?>
                                    <option class="form-dropdown-items"><?= $row['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="object-person width-20">
                            <h5 class="input-label"><?= $main['Đến ngày'] ?></h5>
                            <div class="form-input-wrap">
                                <input type="date" name="dateTo" value="<?= isset($showC['dateTo']) ? $showC['dateTo'] : date("Y-m-d") ?>" class="form-input form-input-1-3">
                            </div>
                    </div>
                </div>
            </div>
            <div class="object-transaction">
                <h5 class="input-label"><?= $main['Ngày'] ?></h5>
                <div class="form-input-wrap">
                    <input type="date" name="datetime" value="<?= isset($showC['dateTime']) ? $showC['dateTime'] : date("Y-m-d") ?>" class="form-input">
                </div>
            </div>
            <div class="form-amount">
                <h5 class="form-amount-label"><?= $main['Tổng tiền'] ?></h5>
                <div class="form-amount-money"><?= isset($showC['amount']) ? number_format($showC['amount'], 0, ",",".") : 0 ?></div>
            </div>

        </div>
        <div class="row">
            <div class="form-table-wrap">
                <div class="form-table__thead">
                    <div class="form-row">
                        <div class="form-salesPro__box1 table-header"><?= $main['Tên hàng'] ?></div>              
                        <div class="form-salesPro__box2 table-header"><?= $main['Loại mặt hàng'] ?></div>            
                        <div class="form-salesPro__box3 table-header"><?= $main['Đơn vị'] ?></div>            
                        <div class="form-salesPro__box4 table-header"><?= $main['Số lượng'] ?></div>            
                        <div class="form-salesPro__box5 table-header"><?= $main['Đơn giá'] ?></div>            
                    </div>
                </div> 
                <div class="form-table__body">
                    <div class="form-row">
                        <div class="form-salesPro__box1 table-box">
                            <select class="form-dropdown-box border-none" name="product">
                                <?php if(isset($showC['product'])) {  ?>
                                    <option value="<?= $showC['product'] ?>"  selected hidden><?= $showC['product'] ?> </option>
                                <?php } ?>
                                <?php while($row = mysqli_fetch_array($queryProduct)) { ?>
                                    <option class="form-dropdown-items"><?= $row['proname'] ?></option>
                                <?php } ?>
                            </select>
                        </div>              
                        <div class="form-salesPro__box2 table-box">
                            <select class="form-dropdown-box border-none" name="category">
                                <?php if(isset($showC['category'])) {  ?>
                                    <option value="<?= $showC['category'] ?>"  selected hidden><?= $showC['category'] ?> </option>
                                <?php } ?>
                                <?php while($row = mysqli_fetch_array($queryCategory)) { ?>
                                    <option class="form-dropdown-items"><?= $row['catename'] ?></option>
                                <?php } ?>
                            </select>
                        </div>              
                        <div class="form-salesPro__box3 table-box">
                            <select class="form-dropdown-box border-none" name="unit">
                                <?php if(isset($showC['unit'])) {  ?>
                                    <option value="<?= $showC['unit'] ?>"  selected hidden><?= $showC['unit'] ?> </option>
                                <?php } ?>
                                <option class="form-dropdown-items">Bao</option>
                                <option class="form-dropdown-items">Lít</option>
                                <option class="form-dropdown-items">Chai</option>
                                <option class="form-dropdown-items">Cái</option>
                                <option class="form-dropdown-items">Kg</option>
                            </select>
                        </div>              
                        <div class="form-salesPro__box4 table-box">
                            <input type="text" name="quantity" value="<?= isset($showC['quantity']) ? number_format($showC['quantity'], 0, ",",".") : 0 ?>" class="form-input input-align-right">
                        </div>              
                        <div class="form-salesPro__box5 table-box">
                            <input type="text" name="price" value="<?= isset($price) ? number_format($price, 0, ",",".") : 0 ?>" class="form-input input-align-right">
                        </div>              
                    </div >
                </div>
            </div>
        </div>
        <div class="conclude-wrap">
            <h5 class="input-label"><?= $main['Kết luận'] ?></h5>
            <div class="form-input-wrap">
                <textarea maxlength="255" rows="2" name="conclude" class="form-input height-50px padding-5"></textarea>
            </div>
        </div>
        <div class="footer ">
            <?php if(!isset($_GET['id'])) { ?>
            <button type="submit" class="form-submit margin-30">SAVE</button>
            <?php } ?>
        </div>
    </form>
</div>