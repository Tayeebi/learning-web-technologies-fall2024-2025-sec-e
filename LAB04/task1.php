<!DOCTYPE html>
<html>
<head>
    <title>Task 1</title>
</head>
<body>
    <form method="post">
        <fieldset style="width: 25%;">
            <legend>NAME</legend>
            <input type="text" name="name" required>
            <br>
            <hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];

        if (empty($name)) {
            echo "<p style='color:red;'>Name cannot be empty.</p>";
        }
        else if (str_word_count(trim($name)) < 2) {
            echo "<p style='color:red;'>Name must contain at least two words.</p>";
        }
        else if (!($name[0] >= 'a' && $name[0] <= 'z') && !($name[0] >= 'A' && $name[0] <= 'Z')) {
            echo "<p style='color:red;'>Name must start with a letter.</p>";
        }
        else {
            $isValid = true;
            for ($i = 0; $i < strlen($name); $i++) {
                $char = $name[$i];
                if (!(($char >= 'a' && $char <= 'z') || ($char >= 'A' && $char <= 'Z') || $char == '.' || $char == '-' || $char == ' ')) {
                    $isValid = false;
                    break;
                }
            }
            if (!$isValid) {
                echo "<p style='color:red;'>Name can only contain letters, period, dash, and spaces.</p>";
            } else {
                echo "<p style='color:green;'>The name is valid!</p>";
            }
        }
    }
    ?>
</body>
</html>
