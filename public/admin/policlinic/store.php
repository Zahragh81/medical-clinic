<?php
require_once "../../../database/config.php";

$name = $_POST["name"];
$phone = $_POST["phone"];
$clinic_id = $_POST["clinic_id"];
$doctor_id = $_POST["doctor_id"];
$secretary_id = $_POST["secretary_id"];
// $clinic_id = isset($_POST["clinic_id"]) ? $_POST["clinic_id"] : null;
$created_at = date("Y-m-d H:i:s");
$updated_at = date("Y-m-d H:i:s");

$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');

// die('Connection Failed: ' . $conn->connect_error);
// } else {
// بررسی وجود مقدار clinic_id
// if ($clinic_id === null) {
//     echo "Error: clinic_id is not set in the form.";
// } 
if ($conn->connect_error) {
} else {
    // اجرای استعلام برای افزودن ردیف به جدول policlinic
    $stmt = $conn->prepare("INSERT INTO policlinics(name, phone,clinic_id,doctor_id,secretary_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?,?,?)");
    $stmt->bind_param("ssiiiss", $name, $phone, $clinic_id, $doctor_id, $secretary_id, $created_at, $updated_at);
    // $stmt->execute();
    $stmt->close();
    header("Location: index.php");
}

$conn->close();
















// require_once "../../../database/config.php";
// $name = $_POST["name"];
// $phone = $_POST["phone"];
// $clinic_id = $_POST["clinic_id"]; // اضافه کردن این خط
// $created_at = date("Y-m-d H:i:s");
// $updated_at = date("Y-m-d H:i:s");
// $conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
// if ($conn->connect_error) {
//     // die('Connection FAiled :' . $conn->connect_error);
// } else {
//     $stmt = $conn->prepare("insert into policlinic(name, phone, created_at, updated_at, clinic_id) values(?,?,?,?,?)");
//     $stmt->bind_param("ssssi", $name, $phone, $created_at, $updated_at, $clinic_id); // تغییر این خط

//     // $stmt = $conn->prepare("insert into policlinic(name,phone, created_at, updated_at) values(?,?,?,?)");
//     // $stmt->bind_param("ssss", $name, $phone, $created_at, $updated_at);
//     $stmt->execute();
//     $stmt->close();
//     $conn->close();

//     header("Location: index.php");
// }




// require_once "../../../database/config.php";

// $name = $_POST["name"];
// $phone = $_POST["phone"];
// $clinic_id = $_POST["clinic_id "];
// $created_at = date("Y-m-d H:i:s");
// $updated_at = date("Y-m-d H:i:s");

// $conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');

// if ($conn->connect_error) {
//     // die('Connection Failed: ' . $conn->connect_error);
// } else {
//     // اجرای استعلام برای افزودن ردیف به جدول policlinic
//     $stmt = $conn->prepare("INSERT INTO policlinic(name, phone, created_at, updated_at, clinic_id ) VALUES (?, ?, ?, ?, ?)");
//     $stmt->bind_param("ssssi", $name, $phone, $created_at, $updated_at, $clinic_id);
//     $stmt->execute();
//     $stmt->close();

    // // اجرای استعلام برای تعیین id جدید افزوده شده
    // $result = $conn->query("SELECT LAST_INSERT_ID() as last_id");
    // $row = $result->fetch_assoc();
    // $last_id = $row['last_id'];

    // // اجرای استعلام برای به‌روزرسانی جدول clinic با آخرین id
    // $stmt = $conn->prepare("UPDATE clinic SET last_policlinic_id = ? WHERE id = ?");
    // $stmt->bind_param("ii", $last_id, $clinic_id);
    // $stmt->execute();
    // $stmt->close();

    // $conn->close();

    // header("Location: index.php");
// }
