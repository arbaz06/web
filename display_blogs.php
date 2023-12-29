<!-- Post Blogs Button -->
<div class="post">
    <a href="post_blog.php" class="button">Post Blogs</a>
</div>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection
include 'db.php';
session_start();

if (isset($_SESSION['loggedin'])) {
    
    $studentId = $_SESSION['studentId'];

    
    $stmt = $pdo->prepare("SELECT * FROM blogs WHERE student_id = ?");
    $stmt->execute([$studentId]);
    $blogs = $stmt->fetchAll();

    
    if ($blogs) :
        echo '<div class="container display_blogs-container">'; 
        echo "<h1 style=\"margin: 50px; margin-left: 39%;\">Your Blogs</h1>";


        foreach ($blogs as $blog) :
            echo '<div class="blog-item">';
            echo '<h3>' . $blog['title'] . '</h3>';
            echo '<p>' . $blog['description'] . '</p>';

            
            $imageFileName = $blog['image'];
            $imagePath = 'uploads/' . $imageFileName;  

            if (file_exists($imagePath)) {
                echo '<img src="' . $imagePath . '" alt="Blog Image" width="100">';
            } else {
                echo '<p style="color: red;">Image not found</p>';
            }

            echo '<hr>';
            echo '</div>'; 
        endforeach;

        echo '</div>'; 
    else :
        echo '<p>No blogs found.</p>';
    endif;
} else {
    
    header('Location: login.php');
    exit();
}
?>
<link rel="stylesheet" href="styles.css">
