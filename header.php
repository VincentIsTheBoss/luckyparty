<?php
require_once "lib.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="shortcut icon" href="LuckyParty.ico">
  <title>Lucky Party</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/business-frontpage.css" rel="stylesheet">

	<body>
	  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	    <div class="container">
	      <!-- Brand and toggle get grouped for better mobile display -->
	      <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                  <span class="sr-only">Toggle navigation</span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
										<span class="icon-bar"></span>
	              </button>
	        <a class="navbar-brand" href="index.php">Lucky Party</a>

				</div>
	      <!-- Collect the nav links, forms, and other content for toggling -->
	      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	        <ul class="nav navbar-nav">
	          <li>
	            <a href="#">Evenements</a>
	          </li>

						<li>
	            <a href="#">Musique</a>
	          </li>
							<?php if (!isConnected()) {?>
	          <li>
	            <a href="createUser.php">S'inscrire</a>
	          </li>
						<li>
						 <a href="connect.php">Connexion</a>
					 </li>
					 	<?php } else { ?>
							<li>
							 <a href="disconnect.php">Deconnexion</a>
			          </li>
                <li>
                <a href="groupResearch.php">Recherche de groupe </a>  
                </li>

						<?php }; ?>
	        </ul>
	      </div>
	      <!-- /.navbar-collapse -->
	    </div>
	    <!-- /.container -->
	  </nav>
