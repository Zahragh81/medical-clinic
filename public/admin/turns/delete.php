<?php
require_once "../../../database/connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $conn = new mysqli('localhost', 'root', '', 'medical-clinic-appointments');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    }

    $query = 'DELETE FROM turns WHERE id = ?';
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        echo "ّایا از حذف رکورداطمینان دارید!";
    } else {
        echo "خطا در حذف رکورد: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "خطا: شناسه رکورد مشخص نشده است.";
}
