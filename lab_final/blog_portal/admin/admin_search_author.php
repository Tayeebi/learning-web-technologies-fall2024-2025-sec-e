<?php
include '../db.php';

if (isset($_GET['q'])) {
    $search_query = $conn->real_escape_string($_GET['q']);
    $result = $conn->query("SELECT * FROM authors WHERE author_name LIKE '%$search_query%'");

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['author_name'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['address'] . "</td>
                    <td>
                        <a href='admin_update_author.php?id=" . $row['id'] . "'>Edit</a> | 
                        <a href='admin_delete_author.php?id=" . $row['id'] . "'>Delete</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No authors found.";
    }
}
?>
