<?php
include_once "classes/User.class.php";
$message = "";
if (!empty($_POST)){
    try {
        $user = new User();
        $user->setFirstname($_POST["firstname"]);
        $user->setLastname($_POST["lastname"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $user->setUsername($_POST["username"]);
        $message = $user->register();
        //$message = "";
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}


include_once "inc/header.inc.php";
showheader('register');

?>

    <div class="container">
  
   <div class="login">
<form action="" method="post">

                <div class="col-md-8 col-md-offset-2">
       
        <legend>Fill in the username and password you want to register with</legend>
                    <div id="message"><?php echo $message; ?></div>
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
    </div>
      </div>
       </form>
    </div>
     <?php include_once "inc/footer.inc.php"; ?> 
</body>
</html>