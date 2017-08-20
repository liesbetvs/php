<?php
	include_once "inc/header.inc.php";

$error = "";

try {

    if (!empty($_POST)) {
        $username = @htmlspecialchars($_POST['username']);
        $password = @htmlspecialchars($_POST['password']);
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);

        if ( $user->canLogin() == true) {
			$error = "gelukt";
			
			$user_data = $user->getDetails();
            $_SESSION['todo_admin'] = $user_data['admin'];
			$_SESSION['todo_fullname'] = $user_data['fullname'];
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

showheader('login');
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
        <br>or <br>
        <a href="register.php">register</a>
    </form>
    </div>
        </div>
        
        
<?php include_once "inc/footer.inc.php"; ?>