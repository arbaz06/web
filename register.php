<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container register-container">

<!-- Student Registration Form -->
<form action="register_backend.php" method="post">
    <label>Name:</label>
    <input type="text" name="name" required><br>
    <label>Email:</label>
    <input type="email" name="email" required><br>
    <label>Roll Number:</label>
    <input type="text" name="roll_number" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>
</div>
</body>
</html>
