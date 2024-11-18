<!DOCTYPE html>
<html lang="en">
<head>
    <title>3</title>
</head>
<body>
    <form method="post">
        <fieldset style="width: 40%;">
            <legend>Gender</legend>
            <label>
                <input name="gender" type="radio" value="Male"> Male
            </label>
            <label>
                <input name="gender" type="radio" value="Female"> Female
            </label>
            <label>
                <input name="gender" type="radio" value="Other"> Other
            </label>
            <br><br>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
        if (empty($_POST['gender'])) {
            echo "<p style='color:red;'>Please select at least one gender.</p>";
        } else {
            echo "<p style='color:green;'>You selected: " . $_POST['gender'] . "</p>";
        }
    }
    ?>
</body>
</html>
