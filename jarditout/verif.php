<?php
/*
----------------------------------------------VERIFICATION FORMULAIRE D'INSCRIPTION---------------------------

->designarion de regex
->recuperation de variable
->assignation d'erreur/confirmation
->renvoie sur le formulaire si erreur
->verif du mdp
->hache le mdp
->enregistre sur la base de donnée
*/
require("bdd.php");
$db=connexionBase();
if(isset($_POST["FICheck"])){

$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$identifiant=$_POST["identifiant"];
$email=$_POST["email"];
$Mdp=$_POST["MDP"];
$MdpVerif=$_POST["MDPconf"];
$valid=0;
//---------------------------------------------------------------------------------VERIF IDENTIFIANT----------------------------------------------------------------
$requete='SELECT * FROM clients where cli_identifiant = "'.$identifiant.'"';
$result=$db->query($requete);
$donee=$result->fetchObject();
//--------------------------------------------------------------------------------------VERIF MAIL--------------------------------------------------------------
$requete2='SELECT * FROM clients where cli_mail= "'.$email.'"';
$result2=$db->query($requete2);
$donee2=$result2->fetchObject();
//-------------------------------------------------REGEX----------------------------------------------------------------------
$filtreNom='/^[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+(?:(?:\-| )?[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+)*$/';
$filtreEmail='/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i';
$filtreId='/[[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+[0-9]*/';
$filtreMdp='/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}/';
//-------------------------------------------VERIF-----------------------
if((empty($nom))||(!preg_match($filtreNom,$nom))){
    header("Location:formulaireInscription.php?error=1");
    exit;
}elseif((empty($prenom))||(!preg_match($filtreNom,$prenom))){
    header("Location:formulaireInscription.php?error=2");
    exit;
}elseif((empty($identifiant))||(!preg_match($filtreId,$identifiant))){
    header("Location:formulaireInscription.php?error=3");
    exit;
}elseif((empty($email))||(!preg_match($filtreEmail,$email))){
    header("Location:formulaireInscription.php?error=4");
    exit;
}elseif((empty($Mdp))||(!preg_match($filtreMdp,$Mdp))){
    header("Location:formulaireInscription.php?error=5");
    exit;
}elseif((empty($MdpVerif))||($Mdp!=$MdpVerif)){
    var_dump($Mdp,$MdpVerif);
    //header("Location:formulaireInscription.php?error=6");
    exit;
}elseif($donee!=false){
   header("Location:formulaireInscription.php?error=7");
   exit;
}elseif($donee2!=false){
    header("Location:formulaireInscription.php?error=8");
    exit;
}else{
//-----------------------------------SI TT OK--------------------------------------------------------------------
//------------------------------------------haschage de MDP------------------------------------------------------
$password= password_hash($Mdp, PASSWORD_DEFAULT);
//------------------------------------------------------INSERTION BDD----------------------------------------------------

$requete='INSERT INTO `clients` (`cli_identifiant`, `cli_nom`, `cli_prenom`, `cli_mail`, `cli_MDP`, `cli_adresse`, `cli_CP`, `cli_ville`, `cli_tel`) VALUES (:identifiant,:nom,:prenom,:mail,:MDP,null,null,null,null)';
$q = $db->prepare($requete);
    $q -> bindValue(":identifiant",$identifiant,PDO::PARAM_STR);
    $q -> bindValue(":nom",$nom,PDO::PARAM_STR);
    $q -> bindValue(":prenom",$prenom,PDO::PARAM_STR);
    $q -> bindValue(":mail",$email,PDO::PARAM_STR);
    $q -> bindValue(":MDP",$password,PDO::PARAM_STR);
    $q->execute();  
    if(!$q){   
        die("une erreur c'est produite veuillez reesayez ulterieuremet");
    }else{
        require("head.php");
        ?>
        <div class="container">
        <div class="text-center triste">
        <h1><u>votre compte a bien etait enregistré</u></h1>
        <i class="fas fa-check fa-9x"></i>
        <br>
        <hr>
        <i class="fas fa-exclamation-triangle fa-2x "><h2><b><u>conservez votre Mot de Passe il ne pourra vous etre renvoyé </u></b></h2></i>
        <hr>
        <p>un mail vous a été envoyé sur votre messagerie personnelle</p>
        </div>
        </div>
        <?php
        require("pied.php");
        header("Refresh:5,id.php?error=0");
    }
}

}
//-----------------------------------------------------------ANNULATION------------------------------------
if(isset($_POST["FICancel"])){
    require("head.php");
    ?>
    <div class="container">
    <div class="text-center triste">
    <h1><u>formulaire annulé</u></h1>
    <i class="fas fa-sad-tear fa-9x"></i>
    <p>vous allez etre rediriger vers l'acceuil </p>
    </div>
    </div>
    <?php
    require("pied.php");
    header("Refresh:3,index.php");
}


?>