<?php

?>

<html>

   <head>
      <title>Welcome </title>
   </head>

   <body>
      <h1>Welcome<?php if (isset($_COOKIE["user"])) echo $_COOKIE["name"] . "!"; ?></h1>
      <h3><a class = "View Payroll" href="viewPayroll.php" >View Payroll </a></h3>
      <h3><a class = "View/Swap Shifts"href="viewShiftsEmp.php">View/Swap Shifts</a></h3>
      <h3><a class = "FileShare" href = "viewFileShare.php">File Share</a></h3>
	  <h3><a class = "EditInfo" href = "editPer.php">Edit Personal Information</a></h3>
     <h3><a class = "shifts" href = "shift_ui.php">Edit Shifts</a></h3>
      <h3><a href = "index.php">Sign Out</a></h3>
   </body>
</html>