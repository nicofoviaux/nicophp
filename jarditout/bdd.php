<?php
function connexionBase(){
    try{
        $db=new PDO('mysql:host=localhost;charset=utf8;dbname=jarditou','root', '"PU5aqu962"');
        return $db;
    }catch(exeption $e){
        echo "Erreur: ".$e->getmessage()."</br>";
        echo  "N°: ".$e->getcode();
        die("connexion au serveur impossible");
    }
}
?>
