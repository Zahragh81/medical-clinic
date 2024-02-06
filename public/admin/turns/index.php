<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection FAiled :' . $conn->connect_error);
} else {
    $query = "select * from turns where policlinic_id = {$_GET['policlinic_id']}";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $turns = $stmt->get_result();
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="mb-3">
            <a class="btn btn-secondary" href="./create.php?policlinic_id=<?= $_GET['policlinic_id'] ?>" role="button">افزدن نوبت جدید</a>
        </div>
        <table class="table table-striped text-center small">
            <thead>
                <tr>
                    <th>شناسه</th>
                    <th>وضعیت</th>
                    <th>زمان</th>
                    <th>مدت</th>
                    <th>بیمار</th>
                    <th>زمان رزرو</th>
                    <th>مبلغ ویزیت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($turns as $turn) { ?>
                    <tr>
                        <td><?php echo $turn["id"] ?></td>
                        <td>
                            <?php
                            require_once "../../../database/connection.php";
                            $conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
                            if ($conn->connect_error) {
                                die('Connection Failed: ' . $conn->connect_error);
                            } else {
                                $query = 'SELECT title FROM conditions WHERE id = ?';
                                $stmt = $conn->prepare($query);
                                $stmt->bind_param('i', $turn["condition_id"]);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $condition = $result->fetch_assoc();
                                $stmt->close();
                                $conn->close();
                            }
                            echo $condition["title"];
                            ?>
                        </td>
                        <td><?php echo $turn["time"] ?></td>
                        <td><?php echo $turn["duration"] ?></td>
                        <td>
                            <?php
                            require_once "../../../database/connection.php";
                            $conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
                            if ($conn->connect_error) {
                                die('Connection Failed: ' . $conn->connect_error);
                            } else {
                                $query = 'SELECT fullname FROM users WHERE id = ?';
                                $stmt = $conn->prepare($query);
                                $stmt->bind_param('i', $turn["patient_id"]);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $user = $result->fetch_assoc();
                                $stmt->close();
                                $conn->close();
                            }
                            echo $user["fullname"];
                            ?>
                        </td>
                        <td><?php echo $turn["reservation_time"] ?></td>
                        <td><?php echo $turn["amount_visit"] ?></td>
                        <td>
                            <a class="btn btn-warning" href="edit.php?policlinic_id=<?php echo $turn['policlinic_id']; ?>">ویرایش</a>
                            <a class="btn btn-secondary delete-btn" href="#" data-id="<?php echo $turn['id']; ?>">حذف</a>
                        </td>
                    </tr>
                <?php  } ?>

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
</body>

</html>






<?php
include_once "../master/footer.php";
?>