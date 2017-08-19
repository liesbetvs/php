<?php
include_once "inc/header.inc.php";
showheader('login');

$error= "";

try {

    if (!empty($_POST)) {
        $username = @htmlspecialchars($_POST['username']);
        $password = @htmlspecialchars($_POST['password']);
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);

        // 3) login functie:
        if ($user->canLogin() == true) {
            $error = "gelukt";
            
            $user_data = $user->getDetails();
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['email'] = $user_data['email'];
            $_SESSION['fullname'] = $user_data['fullname'];
            $_SESSION['todo_login'] = true;
            header('location: index.php');
        } else {
                    $error = "Wrong username/password combination";
        }
    }



}
catch(Exception $e){
    $error = $e->getMessage();
}

?>

<div class="container">
  
   <div class="login">
   <h1>LOGIN</h1>
   <div id="error"><?php echo $error ?></div>
    <form action="login.php" method="post">
        <label for="username">username</label>
        <input type="text" id="username" name="username">
        <br>
        <label for="password">password</label>
        <input type="password" id="password" name="password">
        <br>
        <input type="submit" class="button" name="login" value="login">
        <p>or</p>
        <a href="register.php">register</a>
    </form>
    </div>
        </div>
        
        
<?php include_once "inc/footer.inc.php"; ?>