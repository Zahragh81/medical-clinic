<?php
require_once "../../../database/config.php";

$name = $_POST["name"];
$phone = $_POST["phone"];
$clinic_id = $_POST["clinic_id"];
$doctor_id = $_POST["doctor_id"];
$secretary_id = $_POST["secretary_id"];
$created_at = date("Y-m-d H:i:s");
$updated_at = date("Y-m-d H:i:s");
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection FAiled :' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO policlinics(name, phone,clinic_id,doctor_id,secretary_id, created_at, updated_at) VALUES (?, ?, ?, ?, ?,?,?)");
    $stmt->bind_param("ssiiiss", $name, $phone, $clinic_id, $doctor_id, $secretary_id, $created_at, $updated_at);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header("Location: index.php");
}
