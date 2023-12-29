<?php
// Include the database connection
include 'db.php';
session_start();

if (isset($_SESSION['loggedin'])) {
    $studentId = $_SESSION['studentId'];

    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    $target_directory = "uploads/";  // Specify the directory where you want to store the uploaded files
    $target_file = $target_directory . basename($_FILES['image']['name']);

    // Move the file to the specified directory
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // File was successfully uploaded

        $stmt = $pdo->prepare("INSERT INTO blogs (title, description, image, student_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $description, $image, $studentId]);

        // Redirect to the display blogs page after posting a blog
        header('Location: display_blogs.php');
        exit();
    } else {
        // Error uploading file
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    // Redirect to the login page if not logged in
    header('Location: login.php');
    exit();
}
?>
