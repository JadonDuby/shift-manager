<html>
   <head>
      <title>Welcome </title>
   </head>
   <body>
      <h1>Welcome <?php if (isset($_COOKIE["user"])) echo $_COOKIE["user"] . "!"; ?></h1>
	  <h3><a class="manageemployee" href="viewEmp.php">Manage Employee</a></h3>
      <h3><a class="manageshifts" href="viewShifts.php">Manage Shifts</a></h3>
      <h3><a href="index.php">Sign Out</a></h3>
   </body>
</html>
