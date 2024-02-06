<?php
require_once "../../../database/connection.php";
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection FAiled :' . $conn->connect_error);
} else {
    $id = $_POST['id'];
    $policlinic_id = $_GET['policlinic_id'];
    $condition_id  = $_POST["condition_id"];
    $time = $_POST["time"];
    $duration = $_POST["duration"];
    $patient_id = $_POST["patient_id"];
    $reservation_time = $_POST["reservation_time"];
    $amount_visit = $_POST["amount_visit"];
    $sql = "UPDATE turns SET id=? , policlinic_id=?, condition_id=?,time=?,duration=?,patient_id=?,reservation_time=?,amount_visit=?   WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiississi", $id, $policlinic_id, $condition_id, $time, $duration, $patient_id, $reservation_time, $amount_visit, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    header("Location: index.php?policlinic_id=" . $_GET['policlinic_id']);
}
