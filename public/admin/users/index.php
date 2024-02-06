<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    // die('Connection FAiled :' . $conn->connect_error);
} else {
    $query = 'select * from users';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $users = $stmt->get_result();
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
            <a class="btn btn-secondary" href="./create.php" role="button">افزودن کاربر جدید</a>
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
                    <th>کدنظام پزشکی</th>
                    <th>تاریخ تولد</th>
                    <th>جنسیت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) { ?>
                    <tr>
                        <td><?php echo $user["id"] ?></td>
                        <td><?php echo $user["username"] ?></td>
                        <td><?php echo $user["fullname"] ?></td>
                        <td><?= $user['status'] ? 'فعال' : 'غیرفعال' ?></td>
                        <td><?php echo $user["mobile"] ?></td>
                        <td><?php echo $user["address"] ?></td>
                        <td><?php echo $user["medical_code"] ?></td>
                        <td><?php echo $user["birth_date"] ?></td>
                        <td>
                            <?php
                            require_once "../../../database/connection.php";
                            $conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
                            if ($conn->connect_error) {
                                die('Connection Failed: ' . $conn->connect_error);
                            } else {
                                $query = 'SELECT title FROM genders WHERE id = ?';
                                $stmt = $conn->prepare($query);
                                $stmt->bind_param('i', $user["gender_id"]);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $gender = $result->fetch_assoc();
                                $stmt->close();
                                $conn->close();
                            }
                            echo $gender['title'] ?? 'نامشخص';
                            ?>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="edit.php?id=<?php echo $user['id']; ?>">ویرایش</a>
                            <a class="btn btn-secondary delete-btn" href="#" data-id="<?php echo $user['id']; ?>">حذف</a>
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