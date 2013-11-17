<?php
require_once("../php/include.php");
require_once("../php/add.php");

//Connexion a la base
$err = db_connect();

if(!$err){
  echo "Une erreur est survenue lors de la connexion à la base.";
  exit;
}

//Protection des de la chaine de caractere
$game_name = secure_string($_GET["nomJeu"]);
$id_editor = secure_string($_GET["idEditeur"]);

//Selection dans la base
if(!add_game($game_name, $editor)){
  echo "Une erreur est survenue lors de l'ajout jeu";
  exit;
}

echo "Le jeu a bien été ajouté";

?>