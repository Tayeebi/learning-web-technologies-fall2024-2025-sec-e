<?php
session_start();

if (isset($_SESSION['author'])) {
    header('Location: author_dashboard.php');
    exit();
}

include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $author_name = $_POST['author_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO authors (author_name, email, phone, address, username, password)
              VALUES ('$author_name', '$email', '$phone', '$address', '$username', '$password')";

    if ($conn->query($query) === TRUE) {
        $message = "New author registered successfully!";
        $success = true;
    } else {
        $message = "Error: " . $query . "<br>" . $conn->error;
        $success = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register New Author</title>
</head>
<body>
    <h1>Register New Author</h1>

    <?php if (isset($message)) { ?>
        <p><?php echo $message; ?></p>
        <?php if ($success) { ?>
            <a href="author_login.php">Go to Login</a>
        <?php } else { ?>
            <a href="author_register.php">Try Again</a>
        <?php } ?>
    <?php } else { ?>
        <form action="" method="POST">
            <label for="author_name">Author Name:</label>
            <input type="text" name="author_name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br><br>

            <label for="phone">Phone:</label>
            <input type="text" name="phone"><br><br>

            <label for="address">Address:</label>
            <input type="text" name="address"><br><br>

            <label for="username">Username:</label>
            <input type="text" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>

            <button type="submit">Register Author</button>
        </form>
    <?php } ?>

</body>
</html>
