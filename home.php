<?php
include_once "inc/header.inc.php";
showheader('home');

if(!isset($_SESSION['todo_login'])){
	//er is nog niet ingelogd
    header("location: login.php");
}
?>

<div class="container">
<div class="login">
<div class="row">

<div class="col-md-4" id="overzicht">
    <a href="logout.php" target="_self">Logout</a>
     <img src="" alt=""> 
     <h2><?php echo $_SESSION['todo_fullname']; ?></h2>
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