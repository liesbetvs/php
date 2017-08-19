<?php

session_start();
include_once "inc/header.inc.php";
//showheader('login');

$error= "";

try {

    if (!empty($_POST)) {
        $username = @htmlspecialchars($_POST['username']);
        $password = @htmlspecialchars($_POST['password']);
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);

        // 3) login functie:
        if ($user->canLogin()==true) {
            $error = "gelukt";
            /*
            $user_data = $user->getDetails();
            $_SESSION['id'] = $user_data->id;
            $_SESSION['username'] = $user_data->username;
            $_SESSION['email'] = $user_data->email;
            $_SESSION['fullname'] = $user_data->fullname;
            $_SESSION['loggedin'] = true;
            header('location: index.php');
            */
        } else {
                    $error = "Wrong username/password combination";
        }
    }



}
catch(Exception $e){
    $error = $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<?php include_once "inc/header.inc.php"; ?>
<div class="container">
  
   <div class="login">
   <h1>LOGIN</h1>
    <form action="login">
        <label for="username">username</label>
        <input type="text" id="username">
        <br>
        <label for="password">password</label>
        <input type="password" id="password">
        <br>
        <button>login</button>
        <p>or</p>
        <a href="register.php">register</a>
    </form>
    </div>
        </div>
        
        
<?php include_once "inc/footer.inc.php"; ?>
</body>
</html>