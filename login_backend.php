<?php
// Include the database connection
include 'db.php';
session_start();

$rollNumber = $_POST['roll_number'];
$password = $_POST['password'];

$stmt = $pdo->prepare("SELECT id, password FROM students WHERE roll_number = ?");
$stmt->execute([$rollNumber]);

if ($stmt->rowCount() > 0) {
    $result = $stmt->fetch();
    $storedPassword = $result['password'];

    // Verify the entered password against the stored hashed password
    if (password_verify($password, $storedPassword)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['studentId'] = $result['id'];

        // Redirect to the blog post page after login
        header('Location: display_blogs.php');
        exit();
    }
}

// Redirect to the login page if login fails
header('Location: login.php');
exit();
?>
