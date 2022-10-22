<?php

?>
<div class="form-content">
    <form method="POST" action="addData.php?data=<?=$stt ?>&action=addInput" class="second-table form-table">
        <div class="row">
            <div class="object-info">
                <div class="object-info-wrap">
                    <div class="object-company">
                        <h5 class="input-label"><?= $main['Nhà cung cấp'] ?></h5>
                        <div class="form-input-wrap">
                            <select class="form-dropdown-box" name="supplier">
                                <?php if(isset($showIH['supplier'])) {  ?>
                                    <option value="<?= $showIH['supplier'] ?>"  selected hidden><?= $showIH['supplier'] ?> </option>
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
                                <input type="text" name="person" value="<?= isset($showIH['person']) ? $showIH['person'] : '' ?>" class="form-input form-input-1-2">
                            </div>
                    </div>
                </div>
                <h5 class="input-label"><?= $main['Nhân viên'] ?></h5>
                <div class="form-input-wrap">
                    <select class="form-dropdown-box" name="employee">
                        <?php if(isset($showIH['employee'])) {  ?>
                            <option value="<?= $showIH['employee'] ?>"  selected hidden><?= $showIH['employee'] ?> </option>
                        <?php } ?>
                        <?php while($row = mysqli_fetch_array($queryEmployee)) { ?>
                        <option class="form-dropdown-items" value="<?= $row['staffName'] ?>"><?= $row['staffName'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <h5 class="input-label"><?= $main['Diễn dải'] ?></h5>
                <div class="form-input-wrap">
                    <input type="text" name="description" value=" <?= isset($showIH['content']) ? $showIH['content'] : 'nhập, xuất kho ngày' .date("Y-m-d") ?>" class="form-input">
                </div>
            </div>
            <div class="object-transaction">
                <h5 class="input-label"><?= $main['Ngày'] ?></h5>
                <div class="form-input-wrap">
                    <input type="datetime-local" name="datetime" value="<?= isset($showIH['dateTime']) ? $showIH['dateTime'] : date("Y-m-d h:i:sa") ?>" class="form-input">
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
                        <div class="form-salesPro__box1 table-header"><?= $main['Tên hàng'] ?></div>              
                        <div class="form-salesPro__box2 table-header"><?= $main['Loại mặt hàng'] ?></div>            
                        <div class="form-salesPro__box3 table-header"><?= $main['Kho'] ?></div>            
                        <div class="form-salesPro__box3 table-header"><?= $main['Đơn vị'] ?></div>            
                        <div class="form-salesPro__box4 table-header"><?= $main['Số lượng'] ?></div>            
                        <div class="form-salesPro__box5 table-header"><?= $main['Đơn giá'] ?></div>            
                    </div>
                </div> 
                <div class="form-table__body">
                    <div class="form-row">
                        <div class="form-salesPro__box1 table-box">
                            <select class="form-dropdown-box border-none" name="product">
                                <?php if(isset($showIH['product'])) {  ?>
                                        <option value="<?= $showIH['product'] ?>"  selected hidden><?= $showIH['product'] ?> </option>
                                <?php } ?>
                                <?php while($row = mysqli_fetch_array($queryProduct)) { ?>
                                    <option class="form-dropdown-items"><?= $row['proname'] ?></option>
                                <?php } ?>
                            </select>
                        </div>              
                        <div class="form-salesPro__box2 table-box">
                            <select class="form-dropdown-box border-none" name="category">
                                <?php if(isset($showIH['category'])) {  ?>
                                        <option value="<?= $showIH['category'] ?>"  selected hidden><?= $showIH['category'] ?> </option>
                                <?php } ?>
                                <?php while($row = mysqli_fetch_array($queryCategory)) { ?>
                                    <option class="form-dropdown-items"><?= $row['catename'] ?></option>
                                <?php } ?>
                            </select>
                        </div>              
                        <div class="form-salesPro__box3 table-box">
                            <select class="form-dropdown-box border-none" name="inventory">
                                <?php if(isset($showIH['inventory'])) {  ?>
                                        <option value="<?= $showIH['inventory'] ?>"  selected hidden><?= $showIH['inventory'] ?> </option>
                                <?php } ?>
                                <?php while($row = mysqli_fetch_array($queryInventory)) { ?>
                                    <option class="form-dropdown-items"><?= $row['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>              
                        <div class="form-salesPro__box3 table-box">
                            <select class="form-dropdown-box border-none" name="unit">
                                <?php if(isset($showIH['unit'])) {  ?>
                                    <option value="<?= $showIH['unit'] ?>"  selected hidden><?= $showIH['unit'] ?> </option>
                                <?php } ?>
                                <option class="form-dropdown-items">Bao</option>
                                <option class="form-dropdown-items">Lít</option>
                                <option class="form-dropdown-items">Chai</option>
                                <option class="form-dropdown-items">Cái</option>
                                <option class="form-dropdown-items">Kg</option>
                            </select>
                        </div>              
                        <div class="form-salesPro__box4 table-box">
                            <input type="text" name="quantity" value="<?= isset($showIH['quantity']) ? number_format($showIH['quantity'], 0, ",",".") : 0 ?>" class="form-input input-align-right">
                        </div>              
                        <div class="form-salesPro__box5 table-box">
                            <input type="text" name="price" value="<?= isset($showIH['price']) ? number_format($showIH['price'], 0, ",",".") : 0 ?>" class="form-input input-align-right">
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