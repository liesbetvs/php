<?php
if (!empty($_POST)){
    try {
        $user = new User();
        $user->setFullname($_POST["fullname"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $user->setUsername($_POST["username"]);
        $user->register();
        $message = "";
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}else{

};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
<?php
include_once "inc/header.inc.php";
?>
    <div class="container">
  
   <div class="login">
<form action="" method="post">

                <div class="col-md-8 col-md-offset-2">
       
        <legend>Fill in the username and password you want to register with</legend>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" id="firstname">
        </div>
                <div>
            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" id="lastname">
        </div>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>


    <button class="btn" type="submit" >Submit</button>    
</body>
</html>