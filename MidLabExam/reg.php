<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "Not Specified";

    $_SESSION['users'][] = [
        "name" => $name,
        "email" => $email,
        "password" => $password,
        "phone" => $phone,
        "gender" => $gender
    ];

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h1>Register</h1>
    <form action="" method="POST">
        <label>NAME:</label><br>
        <input type="text" name="name" required><br><br>

        <label>EMAIL:</label><br>
        <input type="email" name="email" required><br><br>

        <label>PASSWORD:</label><br>
        <input type="password" name="password" required><br><br>

        <label>PHONE:</label><br>
        <input type="text" name="phone" required><br><br>

        <label>GENDER:</label><br>
        <input type="radio" name="gender" value="male"> Male<br>
        <input type="radio" name="gender" value="female"> Female<br>
        <input type="radio" name="gender" value="other"> Other<br><br>

        <button type="submit" name="submit">SUBMIT</button>

        <a href="login.php">
            <button type="button">Go to Login</button>
        </a>
    </form>
</body>
</html>
