<?php
// login.php
session_start();

include 'user.php';
include 'auth_service.php';
include 'config.php';
include_once 'databaseConnection.php';

// Instantiate AuthService
$db = new DatabaseConnection(HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $authService = new AuthService($db);

    $username = ($_POST['username']);
    $password = ($_POST['password']);

    // Authenticate user
    $user = $authService->authenticateUser($username, $password);


    if ($user !== null) {
        // Redirect based on user role
        $_SESSION["userid"] = $user->getId();
        $_SESSION["user"] = $user;
        if ($user->getRole() === 'admin') {
            header('Location: welcomeAdmin.php');
        } else {
            header('Location: welcomeEmployee.php');
        }
    } else {
        // Authentication failed
        $error = "Your username or password are invalid";
        // header('Location: login.php?error=1');
    }

}
?>
<html>

   <head>
      <title>Login Page</title>
   </head>

   <body bgcolor = "#FFFFFF">

      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post">
                  <label>Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

            </div>

         </div>

      </div>

   </body>
</html>