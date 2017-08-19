<?php
include_once "inc/header.inc.php";
showheader('home');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Taken</title>
</head>
<body>
<div class="container">
<div class="login">
<div class="row">

<div class="col-md-4" id="overzicht">
    <a href="logout.php">Logout</a>
     <img src="" alt=""> 
     <h2>Naam student</h2>
   <a href="">Add task</a>
</div>

<div class="col-md-4" id="taken">
<ul><li>
    <img src="" alt="">
    <h2>titel</h2>
    <p>student die taak toevoegt</p>
    <input type="checkbox">
</li></ul>    
</div>


<div class="col-md-4" id="leden">
<ul><li>
    <img src="" alt="">
    <h2>naam</h2>
    <p>functie</p>
</li></ul>    
</div>
</div>
</div>
</div>

</body>
</html>