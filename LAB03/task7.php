

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pattern Table</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <td>
        <?php
    for($a = 1; $a <= 3; $a++) {
        for($b = 1; $b <= $a; $b++) {
            echo "*";
            if($b < $a) {
               echo " ";
            }
        }
        echo "<br>";
    }
?>
        </td>
        <td>
        <?php
    for ($i = 3; $i >= 1; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            echo $j . " ";
        }
        echo "<br>";
    }
    ?>
        </td>
        <td>
        <?php
        $char = 'A';
    for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $char . " ";
        $char++;
    }
    echo "<br>";
}
?>
        </td>
    </tr>
</table>

</body>
</html>
