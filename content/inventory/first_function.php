<div class="inventory-first-function inventory-function home-function">
    <div class="cash-first-wrap">
        <div class="cash-first-column-left">
            <div class="cash-operation">
                <div class="cash-operation__heading"><?= $main['NGHIỆP VỤ KHO'] ?></div>
                <div class="inventory-operation-content">
                    <div class="purchase-operation-box inventory-operation-box1"><?= $main['Lệnh sản xuất'] ?></div>
                    <a href="addData.php?inventoryNav=inventoryFirst&data=addInput" class="box-link">
                        <div class="purchase-operation-box inventory-operation-box2"><?= $main['Xuất kho'] ?></div></a>
                    <div class="purchase-operation-box inventory-operation-box3"><?= $main['Chuyển kho'] ?></div>
                    <div class="purchase-operation-box inventory-operation-box4"><?= $main['Lắp ráp, tháo dỡ'] ?></div>
                    <a href="addData.php?inventoryNav=inventoryFirst&data=addInput" class="box-link">
                        <div class="purchase-operation-box inventory-operation-box5"><?= $main['Nhập kho'] ?></div></a>
                    <div class="purchase-operation-box inventory-operation-box6"><?= $main['Tính giá xuất kho'] ?></div>
                    <div class="purchase-operation-box inventory-operation-box7"><?= $main['Kiểm kê'] ?></div>
                </div>
            </div>
            <div class="cash-first-column-left-bottom">
                <div class="cash-first-bottom-box3 purchase-first-width">
                    <div class="cash-icon-wrap">
                        <div class="cash-first-store-icon"></div>
                        <span class="cash-first-heading"><?= $main['Kho'] ?></span>
                    </div>
                </div>
                <div class="cash-first-bottom-box3 purchase-first-width">
                    <div class="cash-icon-wrap">
                        <div class="cash-first-inventory-icon"></div>
                        <span class="cash-first-heading"><?= $main['Vật tư hàng hóa'] ?></span>
                    </div>
                </div>
                <div class="cash-first-bottom-box3 purchase-first-width">
                    <div class="cash-icon-wrap">
                        <div class="cash-first-unit-icon"></div>
                        <span class="cash-first-heading"><?= $main['Đơn vị tính'] ?></span>
                    </div>
                </div>
                <div class="cash-first-bottom-box3 purchase-first-width">
                    <div class="cash-icon-wrap">
                        <div class="cash-first-tool-icon"></div>
                        <span class="cash-first-heading"><?= $main['Tiện ích'] ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="process-report">
            <div class="process-report__heading"><?= $main['Báo cáo'] ?></div>
            <ul class="process-report-list">
                <li class="process-report-items"><?= $main['Sổ chi tiết vật liệu, dụng cụ, sản phẩm, hàng hóa'] ?></li>
                <li class="process-report-items"><?= $main['Tổng hợp tồn kho'] ?></li>
                <li class="process-report-items"><?= $main['Báo cáo tiến độ sản xuất'] ?></li>
                <li class="process-report-items"><?= $main['Đối chiếu giá trị nhập, xuất kho của lệnh lắp ráp, tháo dỡ'] ?></li>
                <li class="process-report-items"><?= $main['Tổng hợp nhập xuất tồn trên nhiều kho'] ?></li>
            </ul>
            <div class="process-report__footer"><?= $main['Tất cả báo cáo'] ?></div>
        </div>
    </div>
</div>