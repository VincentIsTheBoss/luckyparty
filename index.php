<?php
session_start();

	require "conf.php";
	require "lib.php";
	include "header.php";

?>
<section>
	<?php


   	$db = dbconnect();
   	$result=$db->query("SELECT * FROM users WHERE is_deleted=0");
  ?>

  <table border="1px">
             <tr>
                 <th>Id</th>
                 <th>nom</th>
                 <th>prenom</th>
								 <th>sexe</th>
                 <th>Email</th>
                 <th>date_naissance</th>
                 <th>ville</th>
                 <th>CP</th>
                 <th>Date de création</th>
                 <th>Date de update</th>
                 <th>Suprimer</th>
                 <th>Modifier</th>
  </tr>
  <?php
  foreach ($result->fetchAll() as $value) {
  	echo "<tr>
                 <td>".$value["id"]."</td>
                 <td>".$value["nom"]."</td>
                 <td>".$value["prenom"]."</td>
								 <td>".$listOfGender[$value["sexe"]]."</td>
                 <td>".$value["email"]."</td>
                 <td>".$value["date_naissance"]."</td>
                 <td>".$value["ville"]."</td>
                 <td>".$value["CP"]."</td>
                 <td>".$value["date_created"]."</td>
                 <td>".$value["date_updated"]."</td>
                 <td> <center><a href='deleteUsers.php?id=".$value["id"]."'>&cross;</a></center>  </td>
                 <td> <center><a href='modifyUsers.php?id=".$value["id"]."'>&cross;</a></center> </td>
                 </tr>";
  }


  //nouvelle colonne avec un lien  pointant delete.php
  //envoyer sur cette page via le GET l'id du users
  //sur la page en question supprimer de la base l'users
  //et rediriget l'internaute ici
  ?>
  </table>







  </section>
  <?php
  	include "footer.php";
  ?>
