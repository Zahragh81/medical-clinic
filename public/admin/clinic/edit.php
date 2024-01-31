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
    // die('Connection FAiled :' . $conn->connect_error);
} else {
    $id = $_GET['id'];
    $query = 'SELECT * FROM clinics WHERE id = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $clinic = $result->fetch_assoc();
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
            <input type="hidden" name="id" id="id" value="<?php echo $clinic["id"]; ?>">
            <div class="row small">
                <div class="col-6">
                    <label for="name">نام</label>
                    <input type="text" name="name" id="name" value="<?php echo $clinic["name"]; ?>" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="address">آدرس</label>
                    <input type="text" name="address" id="address" value="<?php echo $clinic["address"]; ?>" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="phone">تلفن</label>
                    <input type="text" name="phone" id="phone" value="<?php echo $clinic["phone"]; ?>" class="form-control" />
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