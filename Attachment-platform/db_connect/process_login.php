<?php
session_start();

// CSRF Protection
if (!isset($_SESSION["csrf_token"]) || !isset($_POST["csrf_token"]) || $_POST["csrf_token"] !== $_SESSION["csrf_token"]) {
    $_SESSION["error"] = "Invalid CSRF token";
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["reg-name"]);
    $password = trim($_POST["pwd"]);

    if (empty($username) || empty($password)) {
        $_SESSION["error"] = "Kindly fill all fields";
        header("Location: ../index.php");
        exit();
    }

    try {
        include_once "../db_connect/db_config.php";

        // Fetch user data
        $stmt = $pdo->prepare("SELECT * FROM students WHERE Students_reg = :student_reg");
        $stmt->bindParam(":student_reg", $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Validate user and password
        if ($password!==$user["pwd"]) {
            $_SESSION["error"] = "Invalid username or password";
            header("Location: ../index.php");
            exit();
        }

    
        session_regenerate_id(true);

        $_SESSION["user_id"] = $user["student_id"];
        $_SESSION["username"] = $user["name"];
        $_SESSION["students_reg"] = $user["Students_reg"];
        $_SESSION["date"] = date("d-m-Y", strtotime($user["created_at"]));
        $_SESSION["cleared"] = $user["cleared_with_finance"];

        $stmt = $pdo->prepare("SELECT students.Students_reg, students.name, students.email, students.cleared_with_finance, 
            attachments.approved_by_director, attachments.cover_letter_generated, attachments.insurance_letter_generated 
            FROM students
            LEFT JOIN attachments ON students.student_id = attachments.student_id
            WHERE students.Students_reg = :student_reg
        ");
        $stmt->bindParam(":student_reg", $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        $_SESSION["status"] = $result["approved_by_director"];

        header("Location: ../student/student.php");
        exit();
        
    } catch (PDOException $e) {
        $_SESSION["error"] = "Database error: " . $e->getMessage();
        header("Location: ../index.php");
        exit();
    }
}
