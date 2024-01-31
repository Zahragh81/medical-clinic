<?php
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
    die('Connection Failed: ' . $conn->connect_error);
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = 'SELECT * FROM policlinics WHERE id = ?';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $policlinics = $result->fetch_assoc();
        $stmt->close();
    } else {
        echo "خطا: شناسه رکورد مشخص نشده است.";
        exit;
    }
}

if (isset($_POST['update'])) {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $clinic_id = $_POST["clinic_id"];
    $doctor_id = $_POST["doctor_id"];
    $secretary_id = $_POST["secretary_id"];
    $sql = "UPDATE policlinics SET name=?,phone=?, clinic_id=?, doctor_id=? , secretary_id=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiii", $name, $phone, $clinic_id, $doctor_id, $secretary_id);

    if ($stmt->execute()) {
        echo "رکورد با موفقیت بهروز شد.";
    } else {
        echo "خطا در بهروزرسانی رکورد: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
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
        <form action="update.php?id=<?php echo $id; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $policlinics["id"]; ?>">
            <div class="row small">
                <div class="col-6">
                    <label for="name">نام</label>
                    <input type="text" name="name" value="<?php echo $policlinics["name"]; ?>" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="phone">تلفن</label>
                    <input type="text" name="phone" value="<?php echo $policlinics["phone"]; ?>" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="clinic_id">کلینیک</label>
                    <input type="text" name="clinic_id" value="<?php echo $policlinics["clinic_id"]; ?>" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="doctor_id">پزشکان</label>
                    <input type="text" name="doctor_id" value="<?php echo $policlinics["doctor_id"]; ?>" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="secretary_id">منشی ها</label>
                    <input type="text" name="secretary_id" value="<?php echo $policlinics["secretary_id"]; ?>" class="form-control" />
                </div>
            </div>
            <div class="row small">
                <div>
                    <a href="update.php" type="submit" name="update" class="btn btn-primary small mt-3">ویرایش تغییرات</a>
                    <!-- <input type="submit" name="update" value="ویرایش تغییرات" class="btn btn-primary small mt-3"> -->
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<?php
include_once "../master/footer.php";
?>