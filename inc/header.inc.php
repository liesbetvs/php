<?php
session_start();
spl_autoload_register(function($class){
    include_once("classes/". $class . ".class.php");
});

function showheader($title){ ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
           <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
       <link rel="stylesheet" href="css/style.css">
       <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script> 
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
    </head>
    <body>
        
<?php if( isset($_SESSION['todo_admin']) &&($_SESSION['todo_admin'] == 1)){
    ?>
    
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Todo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Taken</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Vakken</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </nav>
<?php
    }
}
?>