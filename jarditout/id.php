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
?>
<div class="text-center identification ">
<fieldset class= "d-inline-flex p-2 ">
<form action="controle.php" method="POST" class="form-singin">
    <a href="index.php"><img src="assets/img/jarditou_logo.jpg" alt="logo jarditout" class="mb-4 img-fluid" width="200"></a>
    <h2>connexion</h2>
    <div>
        <label for="mail" class="sr-only"></label>
        <input class="fontAwesome" type="email" name="mail" id="mail" placeholder="&#xf0e0; Adresse Mail"  >
     </div>
     <div>
        <label for="nom" class="sr-only">nom</label>
        <input class="fontAwesome" name="identifiant" type="text" id="nom" placeholder="&#xf007; Nom d'Utilisateur" required>
        </div>
    <div>
        <label for="mot_de_passe" class="sr-only">mot de passe</label>
        <input class="fontAwesome"  id="mot_de_passe" name="mot_de_passe" required type="password" placeholder="&#xf084; Mot de Passe">
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