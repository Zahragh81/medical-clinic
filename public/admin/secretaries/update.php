<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection FAiled :' . $conn->connect_error);
} else {
    $id = $_POST['id'];
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $status = $_POST["status"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
    $sql = "UPDATE users SET username=?, fullname=?, status=?,mobile=?,address=?  WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssissi", $username, $fullname, $status, $mobile, $address, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: index.php");
}
