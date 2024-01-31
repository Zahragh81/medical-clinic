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
        height: 300px;
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
                var name = $('#name').val().trim();
                var address = $('#address').val().trim();
                var phone = $('#phone').val().trim();
                if (name === "" || address === "" || phone === "") {
                    alert('لطفاً همه فیلدها را پر کنید.');
                    e.preventDefault();
                }
            });
        });
    </script>
</head>

<body>

    <div class="container">
        <form action="store.php" method="POST" name="formValidation" id="formValidation">
            <div class="row small">
                <div class="col-6 ">
                    <label for="name">نام</label>
                    <input type="text" name="name" id="name" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="address">ادرس</label>
                    <input type="text" name="address" id="address" class="form-control" />
                </div>
                <div class="col-6">
                    <label for="phone">تلفن</label>
                    <input type="text" name="phone" id="phone" class="form-control" />
                </div>
            </div>
            <div class="row small">
                <div>
                    <input type="submit" value="ثبت" class="btn btn-secondary small mt-3">
                </div>
            </div>
            <div>
                <a href="index.php" class="btn btn-warning small mt-3">بازگشت</a>
            </div>
        </form>
    </div>
</body>

</html>

<?php
include_once "../master/footer.php";
?>