<?php

?>
<div class="form-content display-center">
    <form method="POST" action="<?= $_GET['data'] == 'edit' ? "addData.php?purchaseNav=$tam&action=editSup&id=" . $_GET['id'] : "addData.php?data=$stt&action=addSup" ?>" class="second-table form-table-50-100">
        <div class="row">
            <div class="object-info ful-width">
                <div class="object-info-wrap">
                    <div class="object-company">
                        <h5 class="input-label"><?= $main['Mã số thuế'] ?></h5>
                        <div class="form-input-wrap">
                            <input type="text" name="tax" value="<?= isset($showSup['tax']) ? $showSup['tax'] : '' ?>" class="form-input form-input-1-2">
                        </div>
                    </div>
                    <div class="object-person">
                            <h5 class="input-label"><?= $main['Tên nhà cung cấp'] ?></h5>
                            <div class="form-input-wrap">
                                <input type="text" name="supplier" value="<?= isset($showSup['name']) ? $showSup['name'] : ''  ?>" class="form-input form-input-1-2">
                            </div>
                    </div>
                </div>
                <h5 class="input-label"><?= $main['Địa chỉ'] ?></h5>
                <div class="form-input-wrap">
                    <input type="text" name="address" value="<?= isset($showSup['location']) ? $showSup['location'] : ''  ?>" class="form-input">
                </div>
                <div class="object-info-wrap">
                    <div class="object-company width-30">
                        <h5 class="input-label"><?= $main['Số điện thoại'] ?></h5>
                        <div class="form-input-wrap">
                            <input type="text" name="phone" value="<?= isset($showSup['phonenumber']) ? $showSup['phonenumber'] : ''  ?>" class="form-input form-input-1-3">
                        </div>
                    </div>
                    <div class="object-person width-30">
                            <h5 class="input-label">Email</h5>
                            <div class="form-input-wrap">
                                <input type="email" name="email" value="<?= isset($showSup['email']) ? $showSup['email'] : ''  ?>" class="form-input form-input-1-3">
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