<!DOCTYPE html>
<html lang="en">
<head>
    <title>2</title>
</head>
<body>
<form method="post">
    <fieldset style="width: 25%;">
        <legend>EMAIL</legend>
        <br>
        <input name="email" type="text">
        <br>
        <hr>
        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    
    if (empty($email)) {
        echo "<p style='color:red;'>Email cannot be empty.</p>";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red;'>Please enter a valid email address (e.g., anything@example.com).</p>";
    }
    else {
        echo "<p style='color:green;'>The email is valid!</p>";
    }
}
?>

</body>
</html>
