<?php
	session_start();
	require "lib.php";
	include "header.php"
?>
<section >
<?php
if(isset($_SESSION["error"])){
		//?errors=1,2,3,4,6
		$list_Errors = explode(",", $_SESSION["error"]);
		foreach ($list_Errors as $error) {
			echo "<li>".$msgError[$error];
		}
		$form = $_SESSION["data"];
		unset($_SESSION["data"]);
		unset($_SESSION["error"]);

	}
?>
<form method="POST" action="saveUser.php">

		<input type="text" name="nom" placeholder="Votre nom" required="requried"
		value="<?php echo (isset($form["nom"]))?$form["nom"]:"" ?>">
		<br>
		<input type="prenom" name="prenom" placeholder="Votre prenom" required="requried" value="<?php echo (isset($form["prenom"]))?$form["prenom"]:"" ?>">
		<br>
		<input type="text" name="pseudo" placeholder="Votre pseudo" required="requried"
		value="<?php echo (isset($form["pseudo"]))?$form["pseudo"]:"" ?>">
		<br>
		<?php
			//$listOfGender
			foreach ($listOfGender as $key => $value) {
				echo '<label><input type="radio" '.
				(( isset($form["sexe"]) && $form["sexe"] == $key)?"checked='checked'":"")
				.' name="sexe" value="'.$key.'">'.$value.'</label>';
			}
		?>
		<br>
		<input type="email" name="email" placeholder="Votre email" required="requried" value="<?php echo (isset($form["email"]))?$form["email"]:"" ?>">
		<br>
		<input type="text" name="ville" placeholder="ville" required="requried" value="<?php echo (isset($form["ville"]))?$form["ville"]:"" ?>">
		<br>
		<input type="text" name="CP" placeholder="code postal" required="requried" value="<?php echo (isset($form["CP"]))?$form["CP"]:"" ?>">
		<br>
		<input type="date" name="date_naissance"
		value="<?php echo (isset($form["date_naissance"]))?$form["date_naissance"]:""; ?>">
		<br>
		<input type="password" name="pwd" placeholder="Votre mot de passe" required="requried">
		<br>
		<input type="password" name="pwd2" placeholder="Confirmation" required="requried">
		<br>
		<img src="captcha.php">
		<br>
		<input type="text" name="captcha" required="required">
		<br>


		<label>J'accèpte les CGU <input type="checkbox" name="cgu" required></label>
		<br>
		<input type="image" src="img/validation.jpg" width="40px">

	</form>
</section>
<?php
	require "footer.php";
?>
