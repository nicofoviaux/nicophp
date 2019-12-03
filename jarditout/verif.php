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
if(isset($_POST["FICheck"])){

$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$identifiant=$_POST["identifiant"];
$email=$_POST["email"];
$Mdp=$_POST["MDP"];
$MdpVerif=$_POST["MDPconf"];
$valid=0;
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
    header("Location:formulaireInscription.php?error=6");
    exit;
}else{
//-----------------------------------SI TT OK----------------------





}


}
if(isset($_POST["FICancel"])){
    require("head.php");
    ?>
    <div class="container">
    <div class="text-center identification">
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