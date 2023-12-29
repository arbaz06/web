<?php
// Include the database connection
include 'db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Blog</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Blog Post Form -->
<div class="container post_blog-container">
    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="post_blog_backend.php" method="post" enctype="multipart/form-data">
        <label>Title:</label>
        <input type="text" name="title" required><br>
        <label>Description:</label>
        <textarea name="description" required></textarea><br>
        <label>Image Upload:</label>
        <input type="file" name="image" accept="image/*" required onchange="previewImage(this)"><br>
        <img id="imagePreview" style="display:none; max-width: 200px; margin-top: 10px;" alt="Image Preview">
        <button type="submit" name="submit">Post Blog</button>
    </form>
</div>

<script>
    function previewImage(input) {
        var preview = document.getElementById('imagePreview');
        preview.style.display = 'block';

        var reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
</script>

</body>
</html>
