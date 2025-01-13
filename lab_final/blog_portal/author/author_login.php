<?php
session_start();

if (isset($_SESSION['author'])) {
    header('Location: author_dashboard.php');
    exit();
}

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM authors WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $author = $result->fetch_assoc();
        if (password_verify($password, $author['password'])) {
            $_SESSION['author'] = $author['username'];
            header('Location: author_dashboard.php');
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "No author found with that username.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Author Login</title>
</head>
<body>
    <h1>Login as Author</h1>

    <?php if (isset($error_message)) { ?>
        <p style="color:red;"><?php echo $error_message; ?></p>
    <?php } ?>

    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="author_register.php">Register here</a></p>

</body>
</html>
