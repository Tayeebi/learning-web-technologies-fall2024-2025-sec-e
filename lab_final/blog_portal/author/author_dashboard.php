<?php
session_start();

if (!isset($_SESSION['author'])) {
    header('Location: author_login.php');
    exit();
}

include '../db.php';

$username = $_SESSION['author'];
$query = "SELECT * FROM authors WHERE username='$username'";
$result = $conn->query($query);
$author = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $author_name = $_POST['author_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $update_query = "UPDATE authors SET 
                     author_name='$author_name', 
                     email='$email', 
                     phone='$phone', 
                     address='$address' 
                     WHERE username='$username'";

    if ($conn->query($update_query) === TRUE) {
        $message = "Your information has been updated successfully!";
        $_SESSION['author'] = $author_name;
    } else {
        $message = "Error: " . $conn->error;
    }

    $result = $conn->query($query);
    $author = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Author Dashboard</title>
</head>
<body>
    <h1>Welcome to your Dashboard, <?php echo $author['author_name']; ?>!</h1>
    <a href="author_logout.php">Logout</a><br><br>

    <h2>Your Information</h2>
    <?php if (isset($message)) { ?>
        <p style="color: green;"><?php echo $message; ?></p>
    <?php } ?>

    <form action="" method="POST">
        <label for="author_name">Name:</label>
        <input type="text" name="author_name" value="<?php echo $author['author_name']; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $author['email']; ?>" required><br><br>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $author['phone']; ?>"><br><br>

        <label for="address">Address:</label>
        <input type="text" name="address" value="<?php echo $author['address']; ?>"><br><br>

        <button type="submit">Update Information</button>
    </form>

</body>
</html>
