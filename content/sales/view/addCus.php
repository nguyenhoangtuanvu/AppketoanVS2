<?php

?>
<div class="form-content display-center">
    <form method="POST" action="<?= $_GET['data'] == 'edit' ? "addData.php?salesNav=$tam&action=editCus&id=" . $_GET['id'] : "addData.php?data=$stt&action=addCus" ?>" class="second-table form-table-50-100">
        <div class="row">
            <div class="object-info ful-width">
                <div class="object-info-wrap">
                    <div class="object-company">
                        <h5 class="input-label">Mã số thuế</h5>
                        <div class="form-input-wrap">
                            <input type="text" name="tax" value="<?= isset($showCus['tax']) ? $showCus['tax'] : 0  ?>" class="form-input form-input-1-2">
                        </div>
                    </div>
                    <div class="object-person">
                            <h5 class="input-label">Tên Khách hàng</h5>
                            <div class="form-input-wrap">
                                <input type="text" name="customer" value="<?= isset($showCus['name']) ? $showCus['name'] : ''  ?>" class="form-input form-input-1-2">
                            </div>
                    </div>
                </div>
                <h5 class="input-label">Địa chỉ</h5>
                <div class="form-input-wrap">
                    <input type="text" name="address" value="<?= isset($showCus['location']) ? $showCus['location'] : ''  ?>" class="form-input">
                </div>
                <div class="object-info-wrap">
                    <div class="object-company width-30">
                        <h5 class="input-label">Số điện thoại</h5>
                        <div class="form-input-wrap">
                            <input type="text" name="phone" value="<?= isset($showCus['phoneNumber']) ? $showCus['phoneNumber'] : 0  ?>" class="form-input form-input-1-3">
                        </div>
                    </div>
                    <div class="object-person width-30">
                            <h5 class="input-label">Email</h5>
                            <div class="form-input-wrap">
                                <input type="email" name="email" value="<?= isset($showCus['email']) ? $showCus['email'] : ''  ?>" class="form-input form-input-1-3">
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