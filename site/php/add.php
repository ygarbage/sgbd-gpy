<?php

require("base.php");
//Ajout d'un jeu
// idEditeur = selection avec (1)
// idPlateforme = selection avec (2)
// idCategorie = selection avec (3)

function add_game($name, $category, $platform, $editor){
  $id_category = get_category_by_name($category);
  $id_platform = get_plateform_by_name($platform);
  $id_editor = get_editor_by_name($editor);

  $query = "INSERT INTO jeu VALUES ('', '$name', idEditeur);";
  mysql_query($query) or die(mysql_error());

  $last_game_id = mysql_query("SELECT LAST_INSERT_ID() FROM jeu");
  
  $query = "INSERT INTO estDisponible VALUES ('$id_platform', '$last_game_id')";
  mysql_query($query) or die(mysql_error());
  
  $query = "INSERT INTO appartient VALUES ('$id_category',  '$last_game_id)'";
  mysql_query($query) or die(mysql_error());
}


 /* Ajout d'un joueur */
 /* idPlateforme preferee = selection avec (2) */
 /* idCategorie preferee = selection avec (3) */
function add_player($login, $last__name, $first_name, $mail, $platform, $category){
  $id_platform = get_platform_by_name($platform);
  $id_category = get_category_by_name($category);

  $query = "INSERT INTO joueur VALUES ('', '$last_name', '$first_name', '$mail', '$id_platform', '$id_category')";
  mysql_query($query) or die(mysql_error());
}
?>