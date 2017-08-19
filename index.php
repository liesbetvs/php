<?php
session_start();
if(isset($_SESSION['todo_login'])){
    header("location: home.php");
}else{
    header("location:login.php");
}
?>
