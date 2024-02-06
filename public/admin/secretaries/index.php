<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    // die('Connection FAiled :' . $conn->connect_error);
} else {
    $query = 'select * from users where user_type_id = 3';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $secretaries = $stmt->get_result();
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
            <a class="btn btn-secondary" href="./create.php" role="button">افزودن منشی جدید</a>
        </div>
        <table class="table table-striped text-center small">
            <thead>
                <tr>
                    <th>شناسه</th>
                    <th>کدملی</th>
                    <th> نام و نام خانوادگی</th>
                    <th>وضعیت</th>
                    <th>موبایل</th>
                    <th>ادرس</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($secretaries as $secretary) { ?>
                    <tr>
                        <td><?php echo $secretary["id"] ?></td>
                        <td><?php echo $secretary["username"] ?></td>
                        <td><?php echo $secretary["fullname"] ?></td>
                        <td><?= $secretary['status'] ? 'فعال' : 'غیرفعال' ?></td>
                        <td><?php echo $secretary["mobile"] ?></td>
                        <td><?php echo $secretary["address"] ?></td>
                        <td>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $secretary['id']; ?>">ویرایش</a>
                            <a class="btn btn-secondary delete-btn" href="#" data-id="<?php echo $secretary['id']; ?>">حذف</a>
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