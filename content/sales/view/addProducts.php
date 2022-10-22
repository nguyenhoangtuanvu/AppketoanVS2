<?php

?>
<div class="form-content display-center">
    <form method="POST" action="<?= $_GET['data'] == 'edit' ? "addData.php?salesNav=$tam&action=editPro&id=" .$_GET['id'] : "addData.php?data=$stt&action=addPro" ?>" class="second-table form-table-50-100">
        <div class="row">
            <div class="object-info ful-width">
                <div class="object-info-wrap">
                    <div class="object-company">
                        <h5 class="input-label">Tên hàng hóa</h5>
                        <div class="form-input-wrap">
                            <input type="text" name="proname" value="<?= isset($showPro['product']) ? $showPro['product'] : '' ?>" class="form-input form-input-1-2">
                        </div>
                    </div>
                    <div class="object-person">
                        <h5 class="input-label">Nhà cung cấp</h5>
                        <div class="form-input-wrap">
                            <select class="form-dropdown-box border-none" name="supplier">
                            <?php if(isset($showPro['supplier'])) {  ?>
                                    <option value="<?= $showPro['supplier'] ?>"  selected hidden><?= $showPro['supplier'] ?> </option>
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
                        <h5 class="input-label">Loại sản phẩm</h5>
                        <div class="form-input-wrap">
                            <select class="form-dropdown-box border-none" name="category">
                                <?php if(isset($showPro['category'])) {  ?>
                                        <option value="<?= $showPro['category'] ?>"  selected hidden><?= $showPro['category'] ?> </option>
                                <?php } ?>
                                <?php while($row = mysqli_fetch_array($queryCategoryId)) { ?>
                                    <option class="form-dropdown-items"><?= $row['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="object-person width-30">
                        <h5 class="input-label">Giá cả</h5>
                        <div class="form-input-wrap">
                            <input type="text" name="price" value="<?= isset($showPro['price']) ? $showPro['price'] : '' ?>" class="form-input form-input-1-3">
                        </div>
                    </div>
                    <div class="object-person width-30">
                        <h5 class="input-label">Đơn vị</h5>
                        <div class="form-input-wrap">
                        <select class="form-dropdown-box border-none" name="unit">
                            <?php if(isset($showPro['unit'])) {  ?>
                                <option value="<?= $showPro['unit'] ?>"  selected hidden><?= $showPro['unit'] ?> </option>
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
                        <h5 class="input-label">Kho</h5>
                        <div class="form-input-wrap">
                        <select class="form-dropdown-box border-none" name="inventory">
                            <?php if(isset($showPro['inventory'])) {  ?>
                                <option value="<?= $showPro['inventory'] ?>"  selected hidden><?= $showPro['inventory'] ?> </option>
                            <?php } ?>
                            <?php while($row = mysqli_fetch_array($queryInventoryId)) { ?>
                                <option class="form-dropdown-items"><?= $row['name'] ?></option>
                            <?php } ?>
                        </select>
                        </div>
                    </div>
                    <div class="object-person width-30">
                        <h5 class="input-label">Số lượng tồn tối thiểu</h5>
                        <div class="form-input-wrap">
                            <input type="text" name="miniQuantity" value="<?= isset($showPro['miniquantity']) ? $showPro['miniquantity'] : '' ?>" class="form-input form-input-1-3">
                        </div>
                    </div>
                </div>
                <div class="footer ">
                    <?php if($_GET['data'] != 'view') { ?>
                    <button type="submit" class="form-submit margin-30">SAVE</button>
                    <?php } ?>
                </div>
            </div>
    </form>
</div>