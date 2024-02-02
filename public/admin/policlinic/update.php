<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection FAiled :' . $conn->connect_error);
} else {
    $id = $_POST['id'];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $clinic_id = $_POST["clinic_id"];
    $doctor_id = $_POST["doctor_id"];
    $secretary_id = $_POST["secretary_id"];
    $sql = "UPDATE policlinics SET name=?, phone=?, clinic_id=? ,doctor_id=?,secretary_id=?   WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiiii", $name, $phone, $clinic_id, $doctor_id, $secretary_id, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: index.php");
}
