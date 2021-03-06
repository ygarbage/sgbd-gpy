<?php
require_once("php/include.php");
db_connect();
$pages = array("accueil", "ajout", "consultation", "maj", "suppression", "statistiques");

if(isset($_GET["action"])){
  if(!in_array($_GET["action"], $pages))
    $page = "accueil";
  else
    $page = $_GET["action"];
  
  $current_page = $page;

  if(empty($page))
    $page = "accueil";
  
  $page = $page.".php";
}
else{
  $current_page = "accueil";
  $page = "accueil.php";
}

$nb_comments = 10;

if(isset($_POST["nbCommentaires"]) && !empty($_POST["nbCommentaires"])){
  $nb_comments = secure_string($_POST["nbCommentaires"]);
}
?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>dotgame - Accueil</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Our CSS -->
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/base.js"></script>
    <script src="js/select.js"></script>
    <script src="js/add.js"></script>
    <script src="js/delete.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </head>

  <body>

    <!-- Barre de navigation -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Afficher le menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">dot<span class="game">game</span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
	    <!-- Todo : Changer le active en fonction de la page -->
            <!-- <li class="active"><a href="index.php">Accueil</a></li> -->
            <li <?php echo tab_class($current_page, "accueil");?> > <a href="index.php?action=">Accueil</a></li>
            <li <?php echo tab_class($current_page, "consultation");?> > <a href="index.php?action=consultation">Consultation</a></li>
            <li <?php echo tab_class($current_page, "ajout");?> > <a href="index.php?action=ajout">Ajout</a></li>
            <li <?php echo tab_class($current_page, "maj");?> > <a href="index.php?action=maj">Mise à jour</a></li>
	    <li <?php echo tab_class($current_page, "suppression");?> > <a href="index.php?action=suppression">Suppression</a></li>
            <li <?php echo tab_class($current_page, "statistiques");?> > <a href="index.php?action=statistiques">Statistiques</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <?php require($page); ?>

    <!-- Pied de page -->
    <div id="footer">
      <div class="container text-center">
        <p class="text-muted credit">Projet SGBD - dotgame</p>
        <p class="credit">Yvon Garbage - Pierre Lefebvre - Grégoire Pichon</p>
      </div>
    </div>
  </body>
</html>
