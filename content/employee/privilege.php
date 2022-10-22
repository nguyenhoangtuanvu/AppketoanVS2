<?php
session_start();
include '../../connect_db.php';


if(!empty($_SESSION['logged'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/base.css">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-free-6.0.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&family=Roboto&display=swap" rel="stylesheet">
    <title>Kế Toán</title>
</head>
<body>
    <div class="grid">
        <?php include '../../sidebar.php' ?>
        <div class="container">
            <!-- header -->
            <?php include '../../header.php'; ?>
            <div class="navigation">
                <div class="nav-overview nav--open-sidebar">
                    <h2 class="overview-heading"><?= $main['Phân quyền thành viên']?></h2>
                </div>
            </div>
            <?php 
                if(!empty($_GET['action']) && $_GET['action'] == 'save') {
                    $data = $_POST;
                    $insertString = "";
                    $deleteOldPrivileges = mysqli_query($con, "DELETE FROM `user_privilege` WHERE `user_id` = ".$data['user_id']);
                    // var_dump($data);exit;
                    foreach($data['privileges'] as $insert) {
                        $insertString .= !empty($insertString) ? "," : "";
                        $insertString .= "(NULL, " . $data['user_id'] . ", " . $insert. ")";
                    }
                    $insertUserPrivi = mysqli_query($con, "INSERT INTO `user_privilege`(`id`, `user_id`, `privilege_id`) VALUES" .$insertString);
                    if(!$insertUserPrivi) {
                        $error = $main['Phân quyền không thành công'];
                    }
                    if(!empty($error)) {
                        ?>
                        <h1 class="head-result"><?= $error ?></h1>
                        <?php
                    }else{
                        ?>
                        <h1 class="head-result"><?= $main['Phân quyền thành công']?></h1>
                        <a href="employee.php" class="privilege-back-link"><?= $main['Quay lại trang quản lý nhân viên']?></a>
                        <?php
                    }

                }else {
                    // get id acount from employee id
                    $queryIdAcount = mysqli_query($con, "SELECT `id` FROM `account` WHERE `em_id`=" .$_GET['id']);
                    $accountId = mysqli_fetch_assoc($queryIdAcount);
                    // var_dump($accountId);exit;

                    $privileges = mysqli_query($con, "SELECT * FROM `privilege`");
                    $privileges = mysqli_fetch_all($privileges, MYSQLI_ASSOC);
                    
                    $privilegeGroup = mysqli_query($con, "SELECT * FROM `privilege_group` ORDER BY `privilege_group`.`position` ASC");
                    $privilegeGroup = mysqli_fetch_all($privilegeGroup, MYSQLI_ASSOC);
                    
                    $currentPrivileges = mysqli_query($con, "SELECT * FROM `user_privilege` WHERE `user_id` = ".$accountId['id']);
                    $currentPrivileges = mysqli_fetch_all($currentPrivileges, MYSQLI_ASSOC);
                    $currentPrivilegeList = array();
                    if(!empty($currentPrivileges)){
                        foreach($currentPrivileges as $currentPrivilege){
                            $currentPrivilegeList[] = $currentPrivilege['privilege_id'];
                        }
                    }
            ?>
            <div class="content-employee">
                <div class="content-box-privilege">
                    <div class="box-heading-privilege"><?= $main['Phân quyền thành viên']?></div>
                    <form action="?action=save" id="privilege-form" method="POST" enctype="multipart/form-data">
                        <input type="submit" title="lưu" value="">
                        <input type="hidden" name="user_id" value="<?= $accountId['id'] ?>">
                        <?php foreach ($privilegeGroup as $group) { ?>
                        <div class="privilege-group">
                            <div class="privilege-group__name"><?= $group['group_name'] ?></div>
                            <ul class="privilege-group-list">
                                <?php foreach ($privileges as $privilege) { ?>
                                    <?php if($privilege['group_id'] == $group['id']) { ?>
                                <li class="privilege-group-items">
                                    <input type="checkbox" 
                                    <?php if(in_array($privilege['id'], $currentPrivilegeList)){ ?> 
                                    checked=""    
                                    <?php } ?>
                                    value="<?= $privilege['id'] ?>" id="privilege_<?= $privilege['id'] ?>" name="privileges[]">
                                    <label class="privilege-label" for="<?= $privilege['id'] ?>"><?= $privilege['name'] ?></label>
                                </li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        <?php 
            }
        ?>
        </div>
    </div>
    <script src="../../assets/JS/script.js"></script>
<?php 
}
?>
</body>
</html>