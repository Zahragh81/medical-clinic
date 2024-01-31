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
<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $query = 'select * from users';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $users = $stmt->get_result();
    $stmt->close();
    $conn->close();
}
?>







<aside id="sidebar" class="sidebar">
    <?php
    include_once "../master/sidebar.php";
    ?>
</aside>
<style>
    .container {
        background-color: #dcdcdc;
        height: 420px;
        padding-top: 30px;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#formValidation").submit(function(e) {
                var username = $('#username').val().trim();
                var fullname = $('#fullname').val().trim();
                var mobile = $('#mobile').val().trim();
                var birth_date = $('#birth_date').val().trim();
                if (username === "" || fullname === "" || mobile === "" || birth_date === "") {
                    alert('واردکردن کدملی،نام ونام خانوادگی ،شماره موبایل وتاریخ تولد الزامی است!');
                    e.preventDefault();
                }
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <form action="store.php" method="POST" id="formValidation">
            <div class="row small">
                <div class="col-6 ">
                    <label for="username">کدملی</label>
                    <input type="text" name="username" id="username" class="form-control" />
                </div>
                <div class="col-6 ">
                    <label for="fullname">نام ونام خانوادگی</label>
                    <input type="text" name="fullname" id="fullname" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="avatar">عکس</label>
                    <input type="text" name="avatar" id="avatar" class="form-control" />
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
                    <input type="text" name="mobile" id="mobile" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="address">ادرس</label>
                    <input type="text" name="address" id="address" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="birth_date">تاریخ تولد</label>
                    <input type="text" name="birth_date" id="birth_date" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="gender_id">جنسیت</label>
                    <select name="gender_id" id="gender_id" class="form-select">
                        <?php foreach ($genders as $gender) { ?>
                            <option value="<?= $gender['id'] ?>"><?= $gender['title'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row small">
                <div>
                    <button class="btn btn-warning small mt-3">ثبت</button>
                </div>
            </div>
            <div>
                <a href="index.php" class="btn btn-secondary small mt-3">بازگشت</a>
            </div>
        </form>
    </div>

    <?php
    include_once "../master/footer.php";
    ?>