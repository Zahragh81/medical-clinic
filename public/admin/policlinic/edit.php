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
    // die('Connection Failed: ' . $conn->connect_error);
} else {
    $id = $_GET['id'];
    $query = 'SELECT * FROM policlinics WHERE id = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $policlinic = $result->fetch_assoc();
    $stmt->close();
}
?>
<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $query = 'select * from clinics';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $clinics = $stmt->get_result();
    $stmt->close();
    $conn->close();
}
?>
<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $query = 'select * from users where user_type_id=2';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $doctors = $stmt->get_result();
    $stmt->close();
    $conn->close();
}
?>
<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    $query = 'select * from users where user_type_id=3';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $secretaries = $stmt->get_result();
    $stmt->close();
    $conn->close();
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
            <input type="hidden" name="id" id="id" value="<?php echo $policlinic["id"]; ?>">
            <div class="row small">
                <div class="col-6 ">
                    <label for="name">نام</label>
                    <input type="text" name="name" id="name" value="<?php echo $policlinic["name"]; ?>" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="phone">تلفن</label>
                    <input type="text" name="phone" id="phone" value="<?php echo $policlinic["phone"]; ?>" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="clinic_id">کلینیک</label>
                    <select name="clinic_id" id="clinic_id" class="form-select">
                        <?php foreach ($clinics as $clinic) { ?>
                            <option value="<?= $clinic['id'] ?>"><?= $clinic['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-6">
                    <label for="doctor_id">پزشکان</label>
                    <select name="doctor_id" id="doctor_id" class="form-select">
                        <?php foreach ($doctors as $doctor) { ?>
                            <option value="<?= $doctor['id'] ?>"><?= $doctor['fullname'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-6">
                    <label for="secretary_id">منشی ها</label>
                    <select name="secretary_id" id="secretary_id" class="form-select">
                        <?php foreach ($secretaries as $secretary) { ?>
                            <option value="<?= $secretary['id'] ?>"><?= $secretary['fullname'] ?></option>
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