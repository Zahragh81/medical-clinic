<?php
// require_once "../../../database/config.php";
// $username = $_POST["username"];
// $fullname = $_POST["fullname"];
// $status = $_POST["status"];
// $mobile = $_POST["mobile"];
// $address = $_POST["address"];
// $birth_date = $_POST["birth_date"];
// $gender_id = $_POST["gender_id"];
// $created_at = date("Y-m-d H:i:s");
// $updated_at = date("Y-m-d H:i:s");
// $conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
// if ($conn->connect_error) {
//     die('Connection FAiled :' . $conn->connect_error);
// } else {
//     $stmt = $conn->prepare("insert into users(username,fullname,status,mobile,address,birth_date,gender_id, created_at, updated_at)  values(?,?,?,?,?,?,?,?,?)");
//     $stmt->bind_param("ssisssiss", $username, $fullname, $status, $mobile, $address, $birth_date, $gender_id, $created_at, $updated_at);
//     $stmt->execute();
//     $stmt->close();
//     $conn->close();

//     header("Location: index.php");
// }





require_once "../../../database/config.php";

// اطمینان حاصل کنید که متغیر‌ها از $_FILES به جای $_POST گرفته شوند
$avatar = isset($_FILES["avatar"]) ? $_FILES["avatar"]["name"] : null;
$tmp_name = isset($_FILES["avatar"]) ? $_FILES["avatar"]["tmp_name"] : null;

// متغیر‌های دیگر از $_POST گرفته می‌شوند
$username = $_POST["username"];
$fullname = $_POST["fullname"];
$status = $_POST["status"];
$mobile = $_POST["mobile"];
$address = $_POST["address"];
$birth_date = $_POST["birth_date"];
$gender_id = $_POST["gender_id"];
$created_at = date("Y-m-d H:i:s");
$updated_at = date("Y-m-d H:i:s");
// اتصال به دیتابیس
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    // اگر آپلود فایل موفقیت‌آمیز بود، اطلاعات به دیتابیس اضافه می‌شود
    if ($avatar !== null && move_uploaded_file($tmp_name, "uploads/" . $avatar)) {
        $stmt = $conn->prepare("INSERT INTO users (avatar, username, fullname, status, mobile, address, birth_date,gender_id,created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param("sssisssiss", $avatar, $username, $fullname, $status, $mobile, $address, $birth_date, $gender_id, $created_at, $updated_at);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        header("Location: index.php");
    } else {
        // echo "آپلود فایل با مشکل مواجه شده است.";
    }
}
