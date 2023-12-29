<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- Student Login Form -->
<div class="container login-container">
<form action="login_backend.php" method="post">
    <label>Roll Number:</label>
    <input type="text" name="roll_number" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
</div>

</body>
</html>