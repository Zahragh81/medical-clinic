<?php
require_once "../../../database/config.php";
$username = $_POST["username"];
$fullname = $_POST["fullname"];
$avatar = $_POST["avatar"];
$status = $_POST["status"];
$medical_code = $_POST["medical_code"];
$created_at = date("Y-m-d H:i:s");
$updated_at = date("Y-m-d H:i:s");
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    // die('Connection FAiled :' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into users(username,fullname,avatar,status,medical_code, created_at, updated_at)  values(?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss", $username, $fullname, $avatar, $status, $medical_code, $created_at, $updated_at);
}
