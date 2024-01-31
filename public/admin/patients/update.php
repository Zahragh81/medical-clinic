<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection FAiled :' . $conn->connect_error);
} else {
    $id = $_POST['id'];
    $username = $_POST["username"];
    $fullname = $_POST["fullname"];
    $avatar = $_POST["avatar"];
    $status = $_POST["status"];
    $mobile = $_POST["mobile"];
    $address = $_POST["address"];
    $birth_date = $_POST["birth_date"];
    $gender_id = $_POST["gender_id"];
    $sql = "UPDATE users SET username=?, fullname=?, avatar=? ,status=?,mobile=?,address=?,birth_date=?,gender_id=?   WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssisssii", $username, $fullname, $avatar, $status, $mobile, $address, $birth_date, $gender_id, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: index.php");
}
