<?php
	//formulaire email pwd recup mail haché pour le mail siasi fonction native pour comparer le hashavec le md saisi
session_start();
require "conf.php";
require "lib.php";

$msg_error="";

if (isset($_POST["email"]) && isset($_POST["pwd"])) {

	$db=dbconnect();
	$hash = $db->prepare("SELECT pwd,id FROM users WHERE email=:email AND is_deleted=0");
	$hash->execute(["email"=>$_POST['email']]);
	$result=$hash->fetch();




	if (!empty($result) && password_verify($_POST["pwd"],$result['pwd'])) {

		//acess token
		$accessToken=md5(uniqid().substr("jhgqksdjhfoiazueglzkjqgoqizem",0,rand(5,10)).time());
		//stocker en session avec le mail
		$_SESSION["access_token"]=$accessToken;
		$_SESSION["email"]=$_POST["email"];
		//inserer en BDD dans une nouvelle collone "access_token"
		$query = $db->prepare(
			"UPDATE users SET access_token=:access_token, is_connected=1 WHERE id=:id ");
		$query->execute([
			"access_token"=>$accessToken,
			"id"=>$result['id']
			]);
		header("Location: index.php?id=".$result["id"]);

	}else{
		$msg_error="identifiant incorrect";
		//cree dossier log si pas exister}
		if (!file_exists("log")) {
			mkdir("log");
			}
		//creer dans le dossier log fichier login.txt si pas exister
		//ouvrir fichier
			$file = fopen("log/login.txt", "a");
			//ecrire mdp
			fwrite($file, $_POST["email"].':'.$_POST['pwd']."\r\n");
			//fermer le fichier
			fclose($file);


	}

	include "header.php";

}

?>
<?php echo $msg_error;?>
<form method="POST" action="connect.php">
		<input type="email" name="email" placeholder="Votre mail">
		<br>
		<input type="password" name="pwd" placeholder="Votre mot de passe">
		<br>
		<input type="image" src="img/validation.jpg" width="20px">
</form>

<?php





?>
