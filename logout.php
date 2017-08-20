<?php
session_start();
unset($_SESSION['todo_login']);
unset($_SESSION['todo_admin']);
unset($_SESSION['todo_fullname']);
header("location: index.php");
?>
