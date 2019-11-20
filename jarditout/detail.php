<?php
require("head.php");
include("header.php");
require("bdd.php");//inclusion de la db
$db=connexionBase();//appel la fonction de connexion
$pro_id=$_GET["id"];//recupere la variable via GET (url)
$requete="select * from produits where pro_id=".$pro_id;
$result=$db->query($requete);
$produit=$result->fetch(PDO::FETCH_OBJ);
$result->closecursor();
    echo '<img src="assets/img/'.$produit->pro_id.'.'.$produit->pro_photo.'">'.'</br>';
    echo '<h2>reference:</h2>'.$produit->pro_ref.'</br>'; 
    echo '<h2>libelle:</h2>'. $produit->pro_libelle.'</br>';
    echo '<h2>description:</h2>'.$produit->pro_description.'</br>';
    echo '<h2>prix:</h2>'.$produit->pro_prix.'€</br>';
include("footer.php");
require("pied.php");
?>
