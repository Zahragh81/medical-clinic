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
    $query = 'SELECT * FROM users WHERE id = ? and user_type_id = 4';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $patient = $result->fetch_assoc();
    $stmt->close();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش رکورد در MySQL Database</title>
</head>


<body>
    <div class="container">
        <form action="update.php" method="POST">
            <input type="hidden" name="id" id="id" value="<?php echo $patient["id"]; ?>">
            <div class="row small">
                <div class="col-6">
                    <label for="username">کدملی</label>
                    <input type="text" name="username" id="username" value="<?php echo $patient["username"]; ?>" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="fullname">نام ونام خانوادگی</label>
                    <input type="text" name="fullname" id="fullname" value="<?php echo $patient["fullname"]; ?>" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="avatar">عکس</label>
                    <input type="text" name="avatar" id="avatar" value="<?php echo $patient["avatar"]; ?>" class="form-control" />
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
                    <input type="text" name="mobile" id="mobile" value="<?php echo $patient["mobile"]; ?>" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="address">آدرس</label>
                    <input type="text" name="address" id="address" value="<?php echo $patient["address"]; ?>" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="birth_date">تاریخ تولد</label>
                    <input type="text" name="birth_date" id="birth_date" value="<?php echo $patient["birth_date"]; ?>" class="form-control" />
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