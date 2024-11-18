<!DOCTYPE html>
<html lang="en">
<head>
    <title>4</title>
</head>
<body>
    <form method="post">
        <fieldset style="width: 30%;">
            <legend>Date of Birth</legend>
            <input name="date" type="date">
            <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['date'])) {
            echo "<p style='color:red;'>Date of birth cannot be empty.</p>";
        } else {
            $date = $_POST['date'];
            if (strtotime($date) === false) {
                echo "<p style='color:red;'>Please enter a valid date.</p>";
            } else {
                echo "<p style='color:green;'>You selected: " . $date . "</p>";
            }
        }
    }
    ?>
</body>
</html>
