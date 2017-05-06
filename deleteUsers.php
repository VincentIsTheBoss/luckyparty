<?php
require "lib.php";


$db = dbconnect();
$result=$db->prepare("UPDATE users SET is_deleted=1 WHERE id=:id");
$result->execute($_GET);


header("Location: index.php");
?>
