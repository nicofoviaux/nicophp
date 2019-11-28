<?php
/*
----------------------------CONTROLE DE L IDENTIFICATION--------------------------
->identification admin
   *verif des autorisation de modif de BDD 
   *connection a la session admin 
->identification client 
    *reste a faire
*/
session_start();

require('bdd.php');
if(isset($_POST["envoyer"])){
    
    $identifiant=$_POST["identifiant"];
    $motdepasse=$_POST["mot_de_passe"];
    list($db,$connexion)=connexionadmin($identifiant,$motdepasse);
    var_dump($connexion);
    if($connexion==true)
    {
         $_SESSION["connecte"] = 'nico'; 
         var_dump($_SESSION);       
        header('Location:admin.php');
        exit; 
      }
}
?>