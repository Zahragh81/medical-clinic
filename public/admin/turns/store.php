<?php
require_once "../../../database/config.php";
$policlinic_id = $_GET['policlinic_id'];
$condition_id  = $_POST["condition_id"];
$time = $_POST["time"];
$duration = $_POST["duration"];
$patient_id = $_POST["patient_id"];
$reservation_time = $_POST["reservation_time"];
$amount_visit = $_POST["amount_visit"];
$created_at = date("Y-m-d H:i:s");
$updated_at = date("Y-m-d H:i:s");
$conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
if ($conn->connect_error) {
    die('Connection FAiled :' . $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into turns(policlinic_id,condition_id ,time,duration,patient_id,reservation_time,amount_visit, created_at, updated_at)  values(?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("iississss", $policlinic_id, $condition_id, $time, $duration, $patient_id, $reservation_time, $amount_visit, $created_at, $updated_at);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header("Location: index.php?policlinic_id=$policlinic_id");
}
