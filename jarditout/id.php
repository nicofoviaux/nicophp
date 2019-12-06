<?php
/*
-------------------------------------------FORMULAIRE D IDENTIFICATION--------------------------------------
-> formulaire responsive
-> demande le nom d'utilisateur et mot de passe
->redirige vers un script de controle

---------------------reste-------------------
->controle anti injex 
->/!\ SECURITE /!\
*/
require("head.php");
$erreur=isset($_GET["error"]);
$mail="&#xf0e0; Adresse Mail";
$identifiant="&#xf007; Nom d'Utilisateur";
$mdp="&#xf084; Mot de Passe";

switch($erreur){
    case 0;
break;
    case 1;
    $mail="&#xf071; email incorrect";
break;
    case 2;
    $identifiant="&#xf071; identifiant incorrect";
break;
    case 3;
    $mdp="&#xf071; Mot de Passe incorrect";
break;
}
?>
<div class="text-center identification ">
<fieldset class= "d-inline-flex p-2 ">
<form action="controle.php" method="POST" class="form-singin">
    <a href="index.php"><img src="assets/img/jarditou_logo.jpg" alt="logo jarditout" class="mb-4 img-fluid" width="200"></a>
    <h2>connexion</h2>
    <div>
        <label for="mail" class="sr-only"></label>
        <input class="fontAwesome" type="email" name="mail" id="mail" placeholder= "<?=$mail?>" >
     </div>
     <div>
        <label for="nom" class="sr-only">nom</label>
        <input class="fontAwesome" name="identifiant" type="text" id="nom" placeholder="<?=$identifiant?>" required>
        </div>
    <div>
        <label for="mot_de_passe" class="sr-only">mot de passe</label>
        <input class="fontAwesome"  id="mot_de_passe" name="mot_de_passe" required type="password" placeholder="<?=$mdp?>">
    </div>
    <br>
    <p>vous n'avez pas encore de compte? <a href="formulaireInscription.php?error=0"> clicquez ici !</a></p>
</br>
<button class="btn btn-primary " type="submit" name="envoyer">connexion</button>
</form>
</fieldset>
</div>

<?php
require("pied.php");
?>