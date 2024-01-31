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
        height: 500px;
        padding-top: 30px;
    }
</style>
<div class="container">
    <form action="store.php" method="POST">
        <div class="row small">
            <div class="col-6 ">
                <label for="username">کدملی</label>
                <input type="text" name="username" id="username" class="form-control" />
            </div>
            <div class="col-6 ">
                <label for="fullname">نام ونام خانوادگی</label>
                <input type="text" name="fullname" id="fullname" class="form-control" />
            </div>
            <div class="col-6">
                <label for="avatar">عکس</label>
                <input type="text" name="avatar" id="avatar" class="form-control" />
            </div>
            <div class="col-6">
                <label for="status">وضعیت</label>
                <input type="text" name="status" id="status" class="form-control" />
            </div>
            <div class="col-6">
                <label for="mobile">موبایل</label>
                <input type="text" name="mobile" id="mobile" class="form-control" />
            </div>
            <div class="col-6">
                <label for="address">ادرس</label>
                <input type="text" name="address" id="address" class="form-control" />
            </div>
            <div class="col-6">
                <label for="medical_code">کدنظام پزشکی</label>
                <input type="text" name="medical_code" id="medical_code" class="form-control" />
            </div>
            <div class="col-6">
                <label for="birth_date">تاریخ تولد</label>
                <input type="text" name="birth_date" id="birth_date" class="form-control" />
            </div>
            <div class="col-6">
                <label for="gender_id">جنسیت</label>
                <input type="text" name="gender_id" id="gender_id" class="form-control" />
            </div>
        </div>
        <div class="row small">
            <div>
                <button class="btn btn-warning small mt-3">ثبت</button>
            </div>
        </div>
        <div>
            <a href="index.php" class="btn btn-secondary small mt-3">بازگشت</a>
        </div>
    </form>
</div>

<?php
include_once "../master/footer.php";
?>