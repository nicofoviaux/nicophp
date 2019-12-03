<?php
/*
------------------------------------------------------FORMULAIRE D'INSCRIPTION-----------------------------------------------
->demande le nom prenom adresse mail 
-> demande un nom dutilisateur
->demande le mot de passe et demande de le confirmer
->affiche erreur en JS et PHP
->renvoie ver un script php pour le traitement des infos et enregistrement de la bdd
->

*/
require("head.php");
include("header.php");
$error=$_GET["error"];
$PhNom="&#xf1ae; Votre nom";
$PhPrenom="&#xf1ae; Votre prenom";
$PhId="&#xf007; Votre identifiant";
$PhEmail="&#xf0e0; Votre Adresse Mail";
$PhMdp="&#xf084; Votre Mot De Passe";
$PhConf="&#xf084; Confirmez Votre Mot De Passe";

switch($error){
    case 0;
break;
    case 1;
    $PhNom="&#xf071; Veuillez entrer votre nom";
break;
    case 2;
    $PhPrenom="&#xf071; Veuillez entrer votre Prenom";
break;
    case 3;
    $PhId="&#xf071; Veuillez entrer un identifiant correct (lettre et chiffres)";
break;
    case 4;
    $PhEmail="&#xf071; email invalide";
break;
    case 5;
    $PhMdp="&#xf071; Minimum 8 caractere dont speciaux , majuscule et chiffre";
break;
    case 6;
    $PhConf="&#xf071; Mot de Passe different";
break;
}
?>
<div class="col-12">
    <div class="row">
        <div class="container col-xl-8 col-sm-12">
        <h1 class="text-center"><br><u>Bienvenu sur Jarditou</u></h1>
        <p>veuillez remplir ce formulaire pour compléter votre inscription</p>
            <form action="verif.php" method="POST" class="form-group">
                <fieldset class=" container p-4 ">
                <legend class="text-center col-xl-2 col-sm-4 ml-auto mr-auto ">Inscription</legend>
                <div class='row form-group mr-auto ml-auto'>
                    <label for="nom" ></label>
                    <input type="text" name="nom" id="nom2" class="form-control text-center col-xl-5 col-sm-12  fontAwesome" placeholder="<?=$PhNom?>">
                    <label for="prenom" ></label>
                    <input type="text" name="prenom" id="prenom2" class="form-control text-center col-xl-5  col-sm-12 ml-auto fontAwesome" placeholder="<?=$PhPrenom?>">
                    
                </div>
                <div class="row form-group mr-auto ml-auto">
                    <label for="identifiant" ></label>
                    <input type="text" name="identifiant" id="identifiant" class="form-control text-center col-xl-5 col-sm-12 fontAwesome"  placeholder="<?=$PhId?>" >
                    <label for="email" ></label>
                    <input type="email" name="email" id="email2" class="form-control text-center col-xl-5 col-sm-12 ml-auto fontAwesome"  placeholder="<?=$PhEmail?>">
                </div>
                <div class="row form-group mr-auto ml-auto"> 
                    <label for="MDP" ></label>
                    <input type="password" name="MDP" id="MDP" class="form-control text-center col-xl-5  col-sm-12 fontAwesome"  placeholder="<?=$PhMdp?>">
                    <label for="MDPconf"></label>
                    <input type="password" name="MDPconf" id="MDPconf" class="form-control text-center col-xl-5  col-sm-12 ml-auto fontAwesome"  placeholder="<?=$PhConf?>">
                </div>
                </br>
                <div class="row form-group justify-content-around ">
                <button type="submit" class="btn btn-success btn-lg " name="FICheck" ><i class="fas fa-check"></i> Valider</button>
                <button type="cancel" class="btn btn-danger btn-lg " name="FICancel" ><i class="fas fa-times"></i> Annuler</button>
                </div>
                </fieldset>
            </form>
        </div><!--container-->
    </div><!--row-->
</div><!--col-->
<?php
include("footer.php");
require("pied.php");
?>