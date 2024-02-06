<?php
include_once "../master/header.php";
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
                var medical_code = $('#medical_code').val().trim();
                if (username === "" || fullname === "" || medical_code === "") {
                    alert('واردکردن کدملی،نام ونام خانوادگی وکدنظام پزشکی الزامی است!');
                    e.preventDefault();
                }
            });
        });
    </script>
</head>

<?php
if (isset($_POST["submit"])) {
    $dir = "uploads/";
    $name = $_FILES["avatar"]["name"];
    $check = move_uploaded_file($_FILES["avatar"]["tmp_name"], $dir . $name);
    if ($check) {
        echo "$name is uploaded";
    } else {
        echo "$name is not uploaded";
    }
}
?>

<body>
    <div class="container">
        <form action="store.php" method="POST" enctype="multipart/form-data" id="formValidation">
            <div class="row small">
                <div class="col-6 ">
                    <label for="avatar">عکس</label>
                    <input type="file" name="avatar" id="avatar" class="form-control" />
                </div>
                <div class="col-6 ">
                    <label for="username">کدملی</label>
                    <input type="text" name="username" id="username" class="form-control" />
                </div>
                <div class="col-6 ">
                    <label for="fullname">نام ونام خانوادگی</label>
                    <input type="text" name="fullname" id="fullname" class="form-control" />
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
                    <label for="medical_code">کدنظام پزشکی</label>
                    <input type="text" name="medical_code" id="medical_code" class="form-control" />
                </div>
            </div>
            <div class="row small">
                <div>
                    <input class="btn btn-warning small mt-3" type="submit" value="ثبت" name="submit">
                </div>
            </div>
            <div>
                <a href="index.php" class="btn btn-secondary small mt-3">بازگشت</a>
            </div>
        </form>
    </div>
</body>

</html>
<?php
include_once "../master/footer.php";
?>