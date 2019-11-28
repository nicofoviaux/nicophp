<?php
/*
-------------------------------CONNEXION BASE DE DONNEE---------------------------------
->2 fonction la 1ere pour afficher la base au client /!\ ici non securisée pour site fictif normalement juste select autorisé /!\
->2nd pour confirmé la connection du propriaitaire de la base /!\/!\ ATTENTION A LA SECURITE ET VERIF DES REQUETES/!\/!\
*/
function connexionBase(){
    $database='nfoviaux';
    $identifiant='nfoviaux';
    $mdp='19120nf';
    try{
        $db=new PDO('mysql:host=localhost;charset=utf8;dbname='.$database,$identifiant,$mdp);
        return $db;
    }catch(exception $e){
        echo "Erreur: ".$e->getmessage()."</br>";
        echo  "N°: ".$e->getcode();
        die("connexion au serveur impossible");
    }
}



function connexionadmin($identifiantadm,$motdepasse){

    $database = "nfoviaux";

    try{
        $db=new PDO('mysql:host=localhost;charset=utf8;dbname='.$database,$identifiantadm,$motdepasse);
        $connexion=true;
        return array($db,$connexion);
    }catch(exception $e){
        die("mot de passe ou identifiant incorrect");
        header('Location:id.php');

        
    }
}
?>
