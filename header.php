<?php 
    include 'connect_db.php';
    $company = mysqli_query($con, "SELECT * FROM `company`");    
    
    // language
include_once 'LanguageHelper.php';
$object = new LanguageHelper();
$lang = $object->checkLang();
include_once($lang);
$vi = $main['en-vi'];
$en = $main['en-en'];
$language = $main['language'];
?>
<script language="javascript">
    function changeValue(val) {
        if (val==="vi") {
        window.location.href = "?lang=vi"; 
        }
        else {
        window.location.href = "?lang=en"; 
        }
    }
</script>
<div class="header">
    <div class="header-head">
        <i class="fa-solid fa-bars header-head__bars-icon"></i>
        <span class="conpany-name"><?= $main['không'] ?></span>
        <a href="#" class="conpany-data__years">
            <i class="fa-solid fa-circle"></i>
            <span class="company-data-years__title"><?= $main['Dữ liệu kế toán năm 2022'] ?></span>
        </a>
    </div>
    <div class="header-end">
        <div class="header-end__download-icon"></div>
        <div class="header-search">
            <input type="text" class="header-search__input" placeholder="<?= $main['Nhập từ khóa tìm kiếm'] ?>">
            <div class="header-end__search-icon"></div>
        </div>
        <div class="header-end__extended-function header--function">
            <div class="header-end__ellipsis-icon"></div>
            <div class="extended-function header--function-box">
                <h2 class="extended-function__title"><?= $main['Tính nắng mở rộng'] ?></h2>
                <div class="extended-function__content">
                    <ul class="extended-function-list">
                        <li class="extended-function-items"><?= $main['Tất cả danh mục'] ?></li>
                        <li class="extended-function-items"><?= $main['Nhập số dư ban đầu'] ?></li>
                    </ul>
                    <ul class="extended-function-list">
                        <li class="extended-function-items"><?= $main['Bảo trì dữ liệu'] ?></li>
                        <li class="extended-function-items"><?= $main['Ghi sổ/bỏ ghi theo lô'] ?></li>
                        <li class="extended-function-items"><?= $main['Đánh lái só chứng từ'] ?></li>
                        <li class="extended-function-items"><?= $main['Kiểm tra đối chiều chứng từ số sách'] ?></li>
                        <li class="extended-function-items"><?= $main['Phục hồi chứng từ đã xóa'] ?></li>
                    </ul>
                    <ul class="extended-function-list">
                        <li class="extended-function-items"><?= $main['Gợi ý nhắc nhở thông minh'] ?></li>
                        <li class="extended-function-items"><?= $main['Tra cứu thông tin doang nghiệp'] ?></li>
                        <li class="extended-function-items"><?= $main['Nhật ký truy cập'] ?></li>
                        <li class="extended-function-items"><?= $main['Lấy chứng từ từ dữ liệu khác'] ?></li>
                        <li class="extended-function-items"><?= $main['Hướng dẫn chuyển đổi từ SME'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-end__setting-function header--function">
            <div class="header-end__setting-icon"></div>
            <div class="setting-function header--function-box">
                <h2 class="setting-function__title"><?= $main['Thiết lập'] ?></h2>
                <div class="setting-function__content">
                    <ul class="setting-function-list">
                        <li class="setting-function-items"><?= $main['Thông tin về công ty'] ?></li>
                        <li class="setting-function-items"><?= $main['Quán lý người dùng'] ?></li>
                        <li class="setting-function-items"><?= $main['Vai trò quyền hạn'] ?></li>
                        <li class="setting-function-items"><?= $main['Quản lý dữ liệu'] ?></li>
                    </ul>
                    <ul class="setting-function-list">
                        <li class="setting-function-items"><?= $main['Tùy chọn'] ?></li>
                        <li class="setting-function-items"><?= $main['Ngày hoạch toán'] ?></li>
                        <li class="setting-function-items setting-function__language"><?= $main['Ngôn ngữ'] ?></li>
                        <li class="setting-function-items"><?= $main['Kết nối ứng dụng'] ?></li>
                        <li class="setting-function-items"><?= $main['Thiết lập cấu hình gửi email'] ?></li>
                        <li class="setting-function-items"><?= $main['Giao diện ứng dụng'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-end__question-function header--function">
            <div class="header-end__question"></div>
            <i class="fa-solid fa-angle-down header-end__down-icon"></i>
            <div class="question-function header--function-box">
                <h2 class="question-function__title"><?= $main['Kênh hỗ trợ'] ?></h2>
                <div class="question-function__content">
                    <ul class="question-function-list">
                        <li class="question-function-items">
                            <div class="question-functon__icon question-functon__icon1"></div>
                            <?= $main['Cộng đồng hỗ trợ miễn phí VINASIMEX kế toán'] ?>
                        </li>
                        <li class="question-function-items">
                            <div class="question-functon__icon question-functon__icon2"></div>
                            <?= $main['Đào tạo/giải đáp trực tuyến qua Zoom'] ?>
                        </li>
                        <li class="question-function-items">
                            <div class="question-functon__icon question-functon__icon3"></div>
                            <?= $main['Hướng dẫn VINASIMEX kế toán qua video'] ?>
                        </li>
                        <li class="question-function-items">
                            <div class="question-functon__icon question-functon__icon4"></div>
                            <?= $main['Diễn đàn VINASIMEX'] ?>
                        </li>
                        <li class="question-function-items">
                            <div class="question-functon__icon question-functon__icon5"></div>
                            <?= $main['Tổng đài VINASIMEX'] ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-end__notification header--function">
            <div class="header-end__bell-icon"></div>
            <div class="header-end__notifino">2</div>
            <div class="notification-function header--function-box">
                <h2 class="notification-function__title"><?= $main['Thông báo'] ?></h2>
                <ul class="notification-function-list">
                    <li class="notification-function-items">
                        <a href="#" class="notification__link">
                            <h4 class="notification-message"><?= $main['Hướng dẫn về vấn đề thường gặp khi lập chứng từ.'] ?></h4>
                            <span class="notification-time">08/2/2022 08:15:20</span>
                        </a>
                    </li>
                    <li class="notification-function-items">
                        <a href="#" class="notification__link">
                            <h4 class="notification-message"><?= $main['Hướng dẫn về vấn đề thường gặp khi lập chứng từ.'] ?></h4>
                            <span class="notification-time">08/2/2022 08:15:20</span>
                        </a>
                    </li>
                    <li class="notification-function-items">
                        <a href="#" class="notification__link">
                            <h4 class="notification-message"><?= $main['Hướng dẫn về vấn đề thường gặp khi lập chứng từ.'] ?></h4>
                            <span class="notification-time">08/2/2022 08:15:20</span>
                        </a>
                    </li>
                    <li class="notification-function-items">
                        <a href="#" class="notification__link">
                            <h4 class="notification-message"><?= $main['Hướng dẫn về vấn đề thường gặp khi lập chứng từ.'] ?></h4>
                            <span class="notification-time">08/2/2022 08:15:20</span>
                        </a>
                    </li>
                    <li class="notification-function-items">
                        <a href="#" class="notification__link">
                            <h4 class="notification-message"><?= $main['Hướng dẫn về vấn đề thường gặp khi lập chứng từ.'] ?></h4>
                            <span class="notification-time">08/2/2022 08:15:20</span>
                        </a>
                    </li>
                    <li class="notification-function-items">
                        <a href="#" class="notification__link">
                            <h4 class="notification-message"><?= $main['Hướng dẫn về vấn đề thường gặp khi lập chứng từ.'] ?></h4>
                            <span class="notification-time">08/2/2022 08:15:20</span>
                        </a>
                    </li>
                    <li class="notification-function-items">
                        <a href="#" class="notification__link">
                            <h4 class="notification-message"><?= $main['Hướng dẫn về vấn đề thường gặp khi lập chứng từ.'] ?></h4>
                            <span class="notification-time">08/2/2022 08:15:20</span>
                        </a>
                    </li>
                </ul>
                <div class="notification__see-more"><?= $main['Xem tất cả'] ?></div>
            </div>
        </div>
        <div class="header-login-user header--function">
            <img src="/AppketoanVS2/assets/img/getavatar.png" alt="" class="user-avatar">
            <span class="login-user-name"><?php echo $_SESSION['logged']['email'] ?></span>
            <i class="fa-solid fa-angle-down header-end__down-icon"></i>
            <div class="login-function header--function-box">
                <div class="login-function__header">
                    <img src="/AppketoanVS2/assets/img/getavatar.png" alt="" class="login-function-img">
                    <div class="login__info">
                        <h2 class="login__users-name"><?php echo $_SESSION['logged']['email'] ?></h2>
                        <a href="#" class="login__account-info"><?= $main['Thông tin tài khoản'] ?></a>
                    </div>
                    <div class="login__icon-chat"></div>
                </div>
                <div class="account__company-head">
                    <h2 class="account__conpany-list-name"><?= $main['Danh sách công ty'] ?></h2>
                    <a href="#" class="account-company-management__link"><?= $main['Quản lý'] ?></a>
                </div>
                <?php while($row = mysqli_fetch_array($company)) { ?>
                <ul class="account-company-list">
                    <li class="account-company-items">
                        <div class="company-info">
                            <img src="/AppketoanVS2/assets/img/getavatar.png" alt="" class="company__avatar">
                            <h4 class="company__name"><?= $row['name'] ?></h4>
                            <div class="company__checked"></div>
                        </div>
                        <ul class="company-data-list">
                            <li class="company-data-items">
                                <div class="company-data__icon"></div>
                                <div class="company-data__icon--noActi"></div>
                                <span class="company-data__name">Dữ liệu nắm 2020</span>
                                <div class="company-data__icon-check--active"></div>
                            </li>
                            <li class="company-data-items">
                                <div class="company-data__icon"></div>
                                <div class="company-data__icon--noActi"></div>
                                <span class="company-data__name">Dữ liệu nắm 2021</span>
                                <div class="company-data__icon-check--active"></div>
                            </li>
                        </ul>
                        <a href="#" class="company__management-data"><?= $main['Quản lý dữ liệu'] ?></a>
                    </li>
                </ul>
                <?php } ?>
                <div class="login-function__footer">
                    <a href="/APPKETOANVS2/logout.php" class="account__logout-link"><button class="account__logout"><?= $main['Đăng xuất'] ?></button></a>
                </div>
            </div>
        </div>
        </div>

        <div class="box-language">
        <div class="box-laneguage-wrap">
            <h3 class="language-heading"><?= $language ?></h3>
            <select class="select-lang" name="lang" id="lang" onchange="changeValue(this.value)">
            <?php
            if (isset($_SESSION['lang'])) {
                if ($_SESSION['lang'] == "vi") {
                    ?>
                    <option value="vi" selected="selected"><?= $vi ?></option>
                    <option value="en"><?= $en ?></option>
                    <?php
                }else {
                    ?>
                    <option value="vi"><?= $vi ?></option>
                    <option value="en" selected="selected"><?= $en ?></option>
                    <?php
                }
            }else {
                ?>
                <option value="vi" selected="selected"><?= $vi ?></option>
                <option value="en"><?= $en ?></option>
                <?php
            } ?>
            </select>
        </div>
        </div>
    </div>
    <div class="overlay" id="overlay"></div>
    <div class="overlay-not-color" id="overlay-2"></div>

    