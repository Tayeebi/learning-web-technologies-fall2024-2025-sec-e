<?php
session_start();
session_destroy();
header("Location: author_login.php");
exit();
?>
