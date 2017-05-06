<?php
require_once "lib.php";
if (!empty($_GET["id"])) {
	$_SESSION["id"]=$_GET["id"];
}
?>




<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>luckyparty</title>
		<meta name="description" content="description de ma page">
	</head>
	<body>
		<header>
			<nav>
			<a href="index.php">acceuil</a>
			<?php if (!isConnected()) {?>
				<a href="createUser.php">S'inscrire</a>
				<a href="connect.php">connecter</a>
			<?php } else { ?>
				<a href="disconnect.php">deconexion</a>
				<a href="groupResearch.php">Recherche de groupe </a>
			<?php };  ?>
			</nav>
		</header>
