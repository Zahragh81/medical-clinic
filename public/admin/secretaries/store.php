<?php
require_once "../../../database/config.php";
$username = $_POST["username"];
$fullname = $_POST["fullname"];
$status = $_POST["status"];
$mobile = $_POST["mobile"];
$address = $_POST["address"];
$user_type_id = 3;
$created_at = date("Y-m-d H:i:s");
$updated_at = date("Y-m-d H:i:s");
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection FAiled :' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into users(username,fullname,status,mobile,address,user_type_id, created_at, updated_at)  values(?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssississ", $username, $fullname, $status, $mobile, $address, $user_type_id, $created_at, $updated_at);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header("Location: index.php");
}
