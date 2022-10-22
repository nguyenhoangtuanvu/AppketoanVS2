<?php

?>
<div class="form-content display-center">
    <form method="POST" action="addData.php?data=<?=$stt ?>&action=addPro" class="second-table form-table-50-100">
        <div class="row">
            <div class="object-info ful-width">
                <div class="object-info-wrap">
                    <div class="object-company">
                        <h5 class="input-label"><?= $main['Tên hàng hóa'] ?></h5>
                        <div class="form-input-wrap">
                            <input type="text" name="proname" value="" class="form-input form-input-1-2">
                        </div>
                    </div>
                    <div class="object-person">
                        <h5 class="input-label"><?= $main['Nhà cung cấp'] ?></h5>
                        <div class="form-input-wrap">
                            <select class="form-dropdown-box border-none" name="supplier">
                            <?php if(isset($showCash['object'])) {  ?>
                                    <option value="<?= $showCash['staffName'] ?>"  selected hidden><?= $showCash['staffName'] ?> </option>
                            <?php } ?>
                            <?php while($row = mysqli_fetch_array($querySupplier)) { ?>
                                <option class="form-dropdown-items"><?= $row['name'] ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- <h5 class="input-label">Địa chỉ</h5>
                <div class="form-input-wrap">
                    <input type="text" name="address" class="form-input">
                </div> -->
                <div class="object-info-wrap">
                    <div class="object-company width-30">
                        <h5 class="input-label"><?= $main['Loại mặt hàng'] ?></h5>
                        <div class="form-input-wrap">
                            <select class="form-dropdown-box border-none" name="category">
                                <?php if(isset($showCash['object'])) {  ?>
                                        <option value="<?= $showCash['staffName'] ?>"  selected hidden><?= $showCash['staffName'] ?> </option>
                                <?php } ?>
                                <?php while($row = mysqli_fetch_array($queryCategory)) { ?>
                                    <option class="form-dropdown-items"><?= $row['catename'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="object-person width-30">
                        <h5 class="input-label"><?= $main['Giá cả'] ?></h5>
                        <div class="form-input-wrap">
                            <input type="text" name="price" value="" class="form-input form-input-1-3">
                        </div>
                    </div>
                    <div class="object-person width-30">
                        <h5 class="input-label"><?= $main['Đơn vị'] ?></h5>
                        <div class="form-input-wrap">
                        <select class="form-dropdown-box border-none" name="unit">
                            <?php if(isset($showCash['object'])) {  ?>
                                    <option value="<?= $showCash['staffName'] ?>"  selected hidden><?= $showCash['staffName'] ?> </option>
                            <?php } ?>
                            <option class="form-dropdown-items">Bao</option>
                            <option class="form-dropdown-items">Lít</option>
                            <option class="form-dropdown-items">Chai</option>
                            <option class="form-dropdown-items">Cái</option>
                            <option class="form-dropdown-items">Kg</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="object-info-wrap">
                    <div class="object-company width-30">
                        <h5 class="input-label"><?= $main['Kho'] ?></h5>
                        <div class="form-input-wrap">
                        <select class="form-dropdown-box border-none" name="inventory">
                            <?php if(isset($showCash['object'])) {  ?>
                                    <option value="<?= $showCash['staffName'] ?>"  selected hidden><?= $showCash['staffName'] ?> </option>
                            <?php } ?>
                            <?php while($row = mysqli_fetch_array($queryInventory)) { ?>
                                <option class="form-dropdown-items"><?= $row['name'] ?></option>
                            <?php } ?>
                        </select>
                        </div>
                    </div>
                    <div class="object-person width-30">
                        <h5 class="input-label"><?= $main['SL tồn tối thiểu'] ?></h5>
                        <div class="form-input-wrap">
                            <input type="text" name="miniQuantity" value="" class="form-input form-input-1-3">
                        </div>
                    </div>
                </div>
                <div class="footer ">
                    <?php if(!isset($_GET['id'])) { ?>
                    <button type="submit" class="form-submit margin-30">SAVE</button>
                    <?php } ?>
                </div>
            </div>
    </form>
</div>