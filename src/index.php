<?php
	header("location: login.php");
   session_start();

//    include_once("config.php");
//    include("databaseConnection.php");
//    include("user.php");
//    $db = new DatabaseConnection(HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
//    if($_SERVER["REQUEST_METHOD"] == "POST") {

// 		$username = $db->connection->real_escape_string($_POST['username']);
// 		$password = $db->connection->real_escape_string($_POST['password']);

		

// 		$sql = "SELECT * FROM admins WHERE name = ? and password = ?";
// 		$result = $db->query($sql, [$username, $password]);
// 		$row = $result->fetch_assoc();
// 		$_SESSION["user_id"] = $row["userId"];
// 		$count = mysqli_num_rows($result);
// 		if($count >= 1) {
// 			$_SESSION['login_user'] = $myusername;
// 			$_SESSION['admin'] = True;
// 			setcookie('user', $row['Name'], time()+3600);
// 			header("location: welcomeAdmin.php");
// 		}
// 		else {
// 			$sql = "SELECT * FROM employee WHERE username = ? and password = ?";
// 			$result = $db->query($sql, [$username, $password]);
// 			$row = $result->fetch_assoc();
// 			$count = mysqli_num_rows($result);

// 			if($count >= 1) {
// 				// session_register("myusername");
// 				$_SESSION['login_user'] = $username;
// 				$_SESSION['user_id'] = $username;
// 				if ($username == "frontdesk") {

// 					header("location: welcomeFrontDesk.php");
// 				}
// 				else {
// 					setcookie('user', $row['SIN'], time()+3600);
// 					setcookie('name', $row['First_Name'], time()+3600);
// 					// header("location: welcomeEmployee.php");
// 					echo $_SESSION["user_id"];
// 				}
// 			}
// 			else{
// 				$error = "Your Login Name or Password is invalid";
// 			}
// 		}
// 	}
?>
<html>

   <!-- <head>
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

   </body> -->
</html>