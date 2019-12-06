<?php
/*
----------------------------CONTROLE DE L IDENTIFICATION--------------------------
->identification client 

*/
    
    session_start();
    require('bdd.php');
    $db=connexionBase();
if(isset($_POST["envoyer"])){

    $mail=$_POST["mail"];
    $identifiant=$_POST["identifiant"];
    $password= $_POST["mot_de_passe"];
    $requete='SELECT * FROM clients where cli_identifiant = "'.$identifiant.'"';
    $result=$db->query($requete);
    $donee=$result->fetchObject();

    var_dump($donee->cli_identifiant,$identifiant);
    if($donee->cli_mail != $mail){
        header("Location:id.php?error=1");
        exit;
    }else if($donee->cli_identifiant != $identifiant){
        header("Location:id.php?error=2");
        exit;
    }elseif(password_verify($password,$donee->cli_MDP)){
        $_SESSION["connecte"]='client';
        header("Location:index.php?account='".$identifiant."'");
        exit;
    }else{
        var_dump(password_verify($password,$donee->cli_MDP));
       header("Location:id.php?error=3");
        exit;
    }   
}


?>