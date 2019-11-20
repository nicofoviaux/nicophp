<?php
require('bdd.php');
if(isset($_POST["envoyer"])){
    $identifiant=$_POST["identifiant"];
    $motdepasse=$_POST["mot_de_passe"];
    $db=connexionadmin($identifiant,$motdepasse);
    if($db!=0){
        header('Location: admin.php');
    }else{
        echo "erreur de connexion";
    }
    var_dump($db);
}
?>