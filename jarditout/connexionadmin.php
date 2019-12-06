<?php
session_start();

require('bdd.php');
if(isset($_POST["envoyeradm"])){
    
    $identifiant=$_POST["identifiant"];
    $motdepasse=$_POST["mot_de_passe"];

   //-----------------------------------------------------------------------------
    list($db,$connexion)=connexionadmin($identifiant,$motdepasse);
    var_dump($connexion);
    if($connexion==true)
    {
         $_SESSION["connecte"] = 'nico'; 
         var_dump($_SESSION);       
        header('Location:admin.php');
        exit; 
      }else{

        var_dump($identifiant);
      }

}
?>