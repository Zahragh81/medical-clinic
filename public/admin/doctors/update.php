<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection FAiled :' . $conn->connect_error);
} else {
    $id = $_POST['id'];
    $avatar = $_POST["avatar"];
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $status = $_POST["status"];
    $mobile = $_POST["mobile"];
    $medical_code = $_POST["medical_code"];
    $sql = "UPDATE users SET avatar=?, username=?, fullname=?,status=?,mobile=?,medical_code=?  WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssissi", $avatar, $username, $fullname, $status, $mobile, $medical_code, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: index.php");
}
