<?php
require_once "lib.php";
session_start();

$db=dbconnect();
$query = $db->prepare("UPDATE users SET researching=1 WHERE id=:id"
);
$query->execute(["id"=>$_SESSION["id"]]);

$queryid = $db->prepare("SELECT id,nom,prenom,pseudo FROM users WHERE id!=:id AND researching=1 ORDER BY RAND() LIMIT 3;");
$queryid->execute(["id"=>$_SESSION["id"]]);
?>
  <table border="1px">
             <tr>
                 <th>nom</th>
                 <th>prenom</th>
                 <th>pseudo</th>
            </tr>
  <?php
  $query = $db->prepare("INSERT INTO groupe(capacite_max,is_active) VALUES (4,1);");
  $query->execute();

  $query=$db->prepare("SELECT id_groupe FROM groupe WHERE is_active=1");
  $query->execute();
  $result=$query->fetch();

  foreach ($queryid->fetchAll() as $value) {
    $query = $db->prepare("UPDATE users SET id_groupe=:id_groupe WHERE id=:id");
    $query->execute(["id"=>$value["id"],
                     "id_groupe"=>$result["id_groupe"]]);
    echo "<tr>
                 <td>".$value["nom"]."</td>
                 <td>".$value["prenom"]."</td>
                 <td>".$value["pseudo"]."</td>
                 </tr>";
  }
  $query = $db->prepare("UPDATE users SET id_groupe=:id_groupe WHERE id=:id");
  $query->execute(["id"=>$_SESSION["id"],
                   "id_groupe"=>$result["id_groupe"]]);


$query = $db->prepare("UPDATE users SET researching=0 WHERE id=:id AND researching=1"
);
$query->execute(["id"=>$_SESSION["id"]]);
?>
