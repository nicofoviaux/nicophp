<?php
require('database.php');
if($_SERVEUR["REQUEST_METHOD"]=="GET" && !empty($_GET)){
$sql= "INSERT INTO  `produits` (pro_cat_id,pro_ref,pro_libelle,pro_description, pro_couleur,pro_photo,pro_d_ajout, pro_d_modif, pro_bloque) VALUE ($categorie,$ref,$libelle,$description,$couleur,$photo,$ajout,$modif,$bloqué)";
$PDO->prepare($sql);
}

?>