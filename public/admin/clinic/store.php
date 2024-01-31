<?php
require_once "../../../database/config.php";
$name = $_POST["name"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$created_at = date("Y-m-d H:i:s");
$updated_at = date("Y-m-d H:i:s");
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    // die('Connection FAiled :' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into clinics(name,address,phone, created_at, updated_at) values(?,?,?,?,?)");
    $stmt->bind_param("sssss", $name, $address, $phone, $created_at, $updated_at);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header("Location: index.php");
}
