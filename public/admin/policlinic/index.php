<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    // die('Connection FAiled :' . $conn->connect_error);
} else {
    $query = 'select * from policlinics';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $policlinics = $stmt->get_result();
    $stmt->close();
    $conn->close();
} ?>

<?php
include_once "../master/header.php";
?>

<aside id="sidebar" class="sidebar">
    <?php
    include_once "../master/sidebar.php";
    ?>
</aside>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="mb-3">
            <a class="btn btn-secondary" href="./create.php" role="button">افزودن مطب جدید</a>
        </div>
        <table class="table table-striped text-center small">
            <thead>
                <tr>
                    <th>شناسه</th>
                    <th> نام</th>
                    <th>تلفن</th>
                    <th>کلینیک</th>
                    <th>پزشکان</th>
                    <th>منشی ها</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($policlinics as $policlinic) { ?>
                    <tr>
                        <td><?php echo $policlinic["id"] ?></td>
                        <td><?php echo $policlinic["name"] ?></td>
                        <td><?php echo $policlinic["phone"] ?></td>
                        <td><?php echo $policlinic["clinic_id"] ?></td>
                        <td><?php echo $policlinic["doctor_id"] ?></td>
                        <td><?php echo $policlinic["secretary_id"] ?></td>
                        <td>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $policlinic['id']; ?>">ویرایش</a>
                            <a class="btn btn-secondary delete-btn" href="#" data-id="<?php echo $policlinic['id']; ?>">حذف</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".delete-btn").on("click", function() {
                var recordId = $(this).data("id");

                $.ajax({
                    type: "GET",
                    url: "delete.php",
                    data: {
                        id: recordId
                    },
                    success: function(response) {
                        alert(response);
                        location.reload();
                    },
                    error: function() {
                        alert("خطا در ارسال درخواست.");
                    }
                });
            });
        });
    </script>





</body>

</html>



<?php
include_once "../master/footer.php";
?>