<?php

?>
<div class="form-content">
    <form method="POST" action="addData.php?data=<?=$stt ?>&action=add" class="second-table form-table">
        <div class="row">
            <div class="object-info">
                <div class="object-info-wrap">
                    <div class="object-company">
                        <h5 class="input-label"><?= $main['Đối tượng'] ?></h5>
                        <div class="form-input-wrap border-none">
                            <!-- <input type="text" name="object" value="<?= isset($showCash['object']) ? $showCash['object'] : '' ?>" class="form-input form-input-1-2">
                            <i class="fa-solid fa-caret-down form-box-wrap"></i> -->
                            <select class="form-dropdown-box" name="object">
                            <?php if(isset($showCash['object'])) {  ?>
                                <option value="<?= $showCash['object'] ?>"  selected hidden><?= $showCash['object'] ?> </option>
                            <?php } ?>
                                <?php while($row = mysqli_fetch_array($querySupplier)) { ?>
                                <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
                                <?php } ?>
                                <?php while($row = mysqli_fetch_array($queryCustomer)) { ?>
                                <option value="<?= $row['name'] ?>"><?= $row['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="object-person">
                            <h5 class="input-label"><?= $main['Người nộp'] ?></h5>
                            <div class="form-input-wrap">
                                <input type="text" name="person" value="<?= isset($showCash['person']) ? $showCash['person'] : '' ?>" class="form-input form-input-1-2">
                            </div>
                    </div>
                </div>
                <!-- <h5 class="input-label">Địa chỉ</h5>
                <div class="form-input-wrap">
                    <input type="text" class="form-input">
                </div> -->
                <h5 class="input-label"><?= $main['Nhân viên'] ?></h5>
                <div class="form-input-wrap">
                    <!-- <input type="text" name="employee" value="<?= isset($showCash['staffName']) ?>" class="form-input">
                    <i class="fa-solid fa-caret-down form-box-wrap"></i> -->
                    <select class="form-dropdown-box border-none" name="employee">
                        <?php if(isset($showCash['object'])) {  ?>
                                <option value="<?= $showCash['staffName'] ?>"  selected hidden><?= $showCash['staffName'] ?> </option>
                        <?php } ?>
                        <?php while($row = mysqli_fetch_array($queryEmployee)) { ?>
                        <option class="form-dropdown-items"><?= $row['staffName'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="object-transaction">
                <h5 class="input-label"><?= $main['Ngày nộp'] ?></h5>
                <div class="form-input-wrap">
                    <input type="date" name="datetime" value="<?= isset($showCash['dateTime']) ? $showCash['dateTime'] : date("d-m-y") ?>" class="form-input">
                </div>
            </div>
            <div class="form-amount">
                <h5 class="form-amount-label"><?= $main['Tổng tiền'] ?></h5>
                <div class="form-amount-money"><?= isset($showCash['totalAmount']) ? number_format($showCash['totalAmount'], 0, ",",".") : 0 ?></div>
            </div>
        </div>
        <div class="row">
            <div class="form-table-wrap">
                <div class="form-table__thead">
                    <div class="form-row">
                        <div class="form-table__box1 table-header"><?= $main['Diễn dải'] ?></div>              
                        <div class="form-table__box2 table-header"><?= $main['Số tiền'] ?></div>            
                    </div>
                </div> 
                <div class="form-table__body">
                    <div class="form-row">
                        <div class="form-table__box1 table-box">
                            <input type="text" name="content" value="<?= isset($showCash['content'])? $showCash['content'] : '' ?>" class="form-input">
                        </div>              
                        <div class="form-table__box2 table-box">
                            <input type="text" name="amount" value="<?= isset($showCash['totalAmount']) ? number_format($showCash['totalAmount'], 0, ",",".") : 0 ?>" class="form-input input-align-right">
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
        <div class="footer">
            <?php if(!isset($_GET['id'])) { ?>
            <button type="submit" class="form-submit">SAVE</button>
            <?php } ?>
        </div>
    </form>
</div>