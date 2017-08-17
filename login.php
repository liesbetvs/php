<?php
try {

    if (!empty($_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);

        // 3) login functie:
        if ($user->canLogin()) {
            $user_data = $user->getDetails();
            $_SESSION['id'] = $user_data->id;
            $_SESSION['username'] = $user_data->username;
            $_SESSION['email'] = $user_data->email;
            $_SESSION['fullname'] = $user_data->fullname;
            $_SESSION['loggedin'] = true;
            header('location: index.php');
        } else {

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
        <input type="text" id="password">
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