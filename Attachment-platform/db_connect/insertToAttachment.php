<?php
session_start();
require_once "../db_connect/db_config.php";


if (!isset($_SESSION["username"]) || !isset($_SESSION["status"]) || !isset($_SESSION["cleared"]) || !isset($_SESSION["user_id"])) {
     
    die("Invalid request");
}

try {

    $stmt = $pdo->prepare("SELECT cleared_with_finance FROM students WHERE student_id = :student_id");
    $stmt->bindParam(":student_id", $_SESSION["user_id"], PDO::PARAM_INT);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($student && $student["cleared_with_finance"]) {
      $stmt = $pdo->prepare("SELECT student_id FROM students WHERE student_id = :student_id");
        $stmt->bindParam(":student_id", $_SESSION["user_id"], PDO::PARAM_INT);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            die("User already exists");
        }
        
        $stmt = $pdo->prepare("INSERT INTO attachments (student_id) VALUES (:student_id)");
        $stmt->bindParam(":student_id", $_SESSION["user_id"], PDO::PARAM_INT);
        $stmt->execute();

        echo "Student successfully added to attachments!";
    } else {
        echo "Student is not cleared with finance. Cannot add to attachments.";
    }
} catch (PDOException $e) {
    die("Error occurred: " . $e->getMessage());
}
?>
