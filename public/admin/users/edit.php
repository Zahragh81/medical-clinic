<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $query = 'select * from genders';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $genders = $stmt->get_result();
    $stmt->close();
    $conn->close();
}
include_once "../master/header.php";
?>

<aside id="sidebar" class="sidebar">
    <?php
    include_once "../master/sidebar.php";
    ?>
</aside>


<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    // die('Connection Failed: ' . $conn->connect_error);
} else {
    $id = $_GET['id'];
    $query = 'SELECT * FROM users WHERE id = ? ';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
}



?>

<!DOCTYPE html>
<html lang="fa" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>انتخاب‌گرها - فرم‌ها | فرست - قالب مدیریت بوت‌استرپ</title>

    <meta name="description" content="">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico">

    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icons.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/rtl/core.css" class="template-customizer-core-css">
    <link rel="stylesheet" href="../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css">
    <link rel="stylesheet" href="../assets/css/demo.css">
    <link rel="stylesheet" href="../assets/vendor/css/rtl/rtl.css">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendor/libs/typeahead-js/typeahead.css">
    <link rel="stylesheet" href="../assets/vendor/libs/flatpickr/flatpickr.css">
    <link rel="stylesheet" href="../assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../assets/vendor/libs/pickr/pickr-themes.css">
    <link rel="stylesheet" href="../assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css">
    <link rel="stylesheet" href="../assets/vendor/libs/jquery-timepicker/jquery-timepicker.css">

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
</head>

<body>
    <div class="container">
        <form action="update.php" method="POST">
            <input type="hidden" name="id" id="id" value="<?php echo $user["id"]; ?>">
            <div class="row small">
                <div class="col-6 ">
                    <label for="username">کدملی</label>
                    <input type="text" name="username" id="username" value="<?php echo $user["username"]; ?>" class="form-control" />
                </div>
                <div class="col-6 ">
                    <label for="fullname">نام ونام خانوادگی</label>
                    <input type="text" name="fullname" id="fullname" value="<?php echo $user["fullname"]; ?>" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="status">وضعیت</label>
                    <select name="status" id="status" class="form-select">
                        <?php $selected = ($user['status'] == 1) ? 'selected' : ''; ?>
                        <option value="1" <?= $selected ?>>فعال</option>
                        <option value="0" <?= $selected ?>>غیرفعال</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="mobile">موبایل</label>
                    <input type="text" name="mobile" id="mobile" value="<?php echo $user["mobile"]; ?>" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="address">ادرس</label>
                    <input type="text" name="address" id="address" value="<?php echo $user["address"]; ?>" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="medical_code">کدنظام پزشکی</label>
                    <input type="text" name="medical_code" id="medical_code" value="<?php echo $user["medical_code"]; ?>" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="flatpickr-date" class="form-label">تاریخ تولد</label>
                    <input type="text" class="form-control" name="birth_date" placeholder="YYYY/MM/DD" id="flatpickr-date" value="<?php echo $patient["birth_date"]; ?>">
                </div>
                <div class="col-6">
                    <label for="gender_id">جنسیت</label>
                    <select name="gender_id" id="gender_id" class="form-select">
                        <?php foreach ($genders as $gender) { ?>
                            <option value="<?= $gender['id'] ?>"><?= $gender['title'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="row small">
                    <div>
                        <input type="submit" value="ثبت" class="btn btn-secondary small mt-3">
                    </div>
                </div>
        </form>
    </div>
</body>

</html>

<?php
include_once "../master/footer.php";
?>

 <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/libs/hammer/hammer.js"></script>

    <script src="../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/moment/moment.js"></script>
    <script src="../assets/vendor/libs/jdate/jdate.js"></script>
    <script src="../assets/vendor/libs/flatpickr/flatpickr-jdate.js"></script>
    <script src="../assets/vendor/libs/flatpickr/l10n/fa-jdate.js"></script>
    <script src="../assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="../assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="../assets/vendor/libs/jquery-timepicker/jquery-timepicker.js"></script>
    <script src="../assets/vendor/libs/pickr/pickr.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/forms-pickers.js"></script>
</body>

</html>  