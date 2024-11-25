<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($_SESSION['users'])) {
        foreach ($_SESSION['users'] as $user) {
            if ($user['email'] == $email && $user['password'] == $password) {
                $_SESSION['name'] = $user['name'];  

                header("Location: home.php");
                exit();
            }
        }
        $error_message = "Invalid email or password!";
    } else {
        $error_message = "No users registered!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>LOGIN</h1> 
    <form action="" method="POST">
        <label for="email">EMAIL</label><br>
        <input type="text" id="email" name="email" required><br><br>

        <label for="password">PASSWORD</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit" name="submit">LOG IN</button>
        <a href="reg.php">
            <button type="button">Registration</button>
        </a>
    </form>

    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
</body>
</html>
