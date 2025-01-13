<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

include '../db.php';

if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $conn->query("DELETE FROM authors WHERE id=$id");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <a href="admin_logout.php">Logout</a><br><br>

    <a href="admin_register.php">Register New Author</a><br><br>

    <h2>Search Authors</h2>
    <input type="text" id="search" placeholder="Search by name">
    <button id="search-btn">Search</button>
    <div id="results"></div><br><br>

    <h2>All Authors</h2>
    <button id="view-authors">View All Authors</button>
    <div id="author-list"></div>

    <script>
        document.getElementById('search-btn').addEventListener('click', function() {
            var searchQuery = document.getElementById('search').value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'admin_search_author.php?q=' + searchQuery, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('results').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        });

        document.getElementById('view-authors').addEventListener('click', function() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'admin_view_all_authors.php', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('author-list').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        });
    </script>
</body>
</html>
