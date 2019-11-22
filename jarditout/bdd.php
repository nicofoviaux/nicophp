<?php
function connexionBase(){
    $database='nfoviaux';
    $identifiant='nfoviaux';
    $mdp='19120nf';
    try{
        $db=new PDO('mysql:host=localhost;charset=utf8;dbname='.$database,$identifiant,$mdp);
        return $db;
    }catch(exeption $e){
        echo "Erreur: ".$e->getmessage()."</br>";
        echo  "N°: ".$e->getcode();
        die("connexion au serveur impossible");
    }
}
function connexionadmin($identifiantadm,$motdepasse){
    try{
        $db=new PDO('mysql:host=localhost;charset=utf8;dbname='.$database,$identifiantadm,$motdepasse);
        $connexion=true;
        return $db;
    }catch(exeption $e){
        echo "Erreur: ".$e->getmessage()."</br>";
        echo  "N°: ".$e->getcode();
        die("connexion au serveur impossible");
        $connexion=false;
        
    }
}
?>
