<?php
include '../db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM authors WHERE id=$id");
    $author = $result->fetch_assoc();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $author_name = $_POST['author_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $conn->query("UPDATE authors SET author_name='$author_name', email='$email', phone='$phone', address='$address' WHERE id=$id");
    header('Location: admin_dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Author</title>
</head>
<body>
    <h1>Update Author</h1>
    <form method="POST">
        <label for="author_name">Name:</label><br>
        <input type="text" name="author_name" value="<?php echo $author['author_name']; ?>" required><br>
        
        <label for="email">Email:</label><br>
        <input type="email" name="email" value="<?php echo $author['email']; ?>" required><br>

        <label for="phone">Phone:</label><br>
        <input type="text" name="phone" value="<?php echo $author['phone']; ?>"><br>

        <label for="address">Address:</label><br>
        <textarea name="address" required><?php echo $author['address']; ?></textarea><br>

        <button type="submit">Update Author</button>
    </form>
</body>
</html>
