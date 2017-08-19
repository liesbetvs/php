<?php
session_start();
unset($_SESSION['todo_login']);
header("location: index.php");
?>
