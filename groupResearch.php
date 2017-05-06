<?php
session_start();
require_once "lib.php";
include "header.php";
echo $_SESSION["id"]




?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="POST" action="group.php">
    		<input type="image" src="img/validation.jpg" name="researching" width="20px">
    </form>

  </body>
</html>
