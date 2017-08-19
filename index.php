<?php
session_start();
if(isset($_SESSION['todo_login'])){
    header("location: home.php");
}else{
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
</body>
</html>