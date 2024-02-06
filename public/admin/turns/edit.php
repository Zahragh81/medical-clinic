<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection FAiled :' . $conn->connect_error);
} else {
    $query = "select * from turns where policlinic_id = {$_GET['policlinic_id']}";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $turns = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
}
?>
<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection Failed :' . $conn->connect_error);
} else {
    $query = 'select * from conditions';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $conditions = $stmt->get_result();
    $stmt->close();
    $conn->close();
}
?>
<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection FAiled :' . $conn->connect_error);
} else {
    $query = 'select * from users where user_type_id=4';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $patients = $stmt->get_result();
    $stmt->close();
    $conn->close();
}
?>
<?php
include_once "../master/header.php";
?>

<aside id="sidebar" class="sidebar">
    <?php
    include_once "../master/sidebar.php";
    ?>
</aside>

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
    <style>
        .container {
            background-color: #dcdcdc;
            height: 350px;
            padding-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="update.php?policlinic_id=<?= $_GET['policlinic_id'] ?>" method="POST">
            <input type="hidden" name="id" id="id" value="<?php echo $turns["id"]; ?>">
            <div class="row small">
                <div class="col-6">
                    <label for="condition_id">وضعیت</label>
                    <select name="condition_id" id="condition_id" class="form-select">
                        <?php foreach ($conditions as $condition) { ?>
                            <option value="<?= $condition['id'] ?>"><?= $condition['title'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6 col-12">
                    <label for="flatpickr-datetime" class="form-label">زمان</label>
                    <input type="text" class="form-control flatpickr-datetime" name="time" placeholder="YYYY/MM/DD - HH:MM" value="<?php echo $turns["time"]; ?>">
                </div>
                <div class="col-6">
                    <label for="duration">مدت</label>
                    <input type="text" name="duration" id="duration" class="form-control" value="<?php echo $turns["duration"]; ?>" />
                </div>
                <div class="col-6">
                    <label for="patient_id">بیمار</label>
                    <select name="patient_id" id="patient_id" class="form-select">
                        <?php foreach ($patients as $patient) { ?>
                            <option value="<?= $patient['id'] ?>"><?= $patient['fullname'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!-- Multiple Dates Picker-->
                <div class="col-md-6 col-12 mb-4">
                    <label for="flatpickr-datetime" class="form-label">زمان رزرو</label>
                    <input type="text" class="form-control flatpickr-datetime" name="reservation_time" placeholder="YYYY/MM/DD - HH:MM" value="<?php echo $turns["reservation_time"]; ?>">
                </div>
                <div class="col-6">
                    <label for="amount_visit">مبلغ ویزیت</label>
                    <input type="text" name="amount_visit" id="amount_visit" class="form-control" value="<?php echo $turns["amount_visit"]; ?>" />
                </div>
            </div>
            <div class="row small">
                <div>
                    <button class="btn btn-warning small mt-3">ثبت</button>
                </div>
            </div>
        </form>
    </div>


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
    <script>
        $('.flatpickr-datetime').flatpickr({
            enableTime: true,
            locale: 'fa',
            altInput: true,
            altFormat: 'Y/m/d - H:i',
            disableMobile: true
        });
    </script>
</body>

</html>











<?php
include_once "../master/footer.php";
?>