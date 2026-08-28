<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = trim($_POST['first_name']);
    $last_name  = trim($_POST['last_name']);
    $phone      = trim($_POST['phone']);
    $email      = trim($_POST['email']);
    $password   = $_POST['password'];
    $password2  = $_POST['password2'];

    if ($password !== $password2) {
        die("Passwords do not match. <a href='ipt_system.html'>Back</a>");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, phone, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $first_name, $last_name, $phone, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "Registration successful! <a href='view.php'>View records</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
