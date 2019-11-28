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
<div class="text-center identification  ">
<fieldset class= "d-inline-flex p-2 ">
<form action="controle.php" method="POST" class="form-singin">
    <a href="index.php"><img src="assets/img/jarditou_logo.jpg" alt="logo jarditout" class="mb-4 img-fluid" width="200"></a>
    <h2>connexion</h2>
    <div>
        <label for="nom" class="sr-only">nom</label>
        <input class="fontAwesome" name="identifiant" type="text" id="nom" placeholder="&#xf007; nom d'utilisateur" required>
    </div>
    <div>
        <label for="mot_de_passe" class="sr-only">mot de passe</label>
        <input class="fontAwesome"  id="mot_de_passe" name="mot_de_passe" required type="password" placeholder="&#xf084; mot de passe">
    </div>
</br>
<button class="btn btn-primary " type="submit" name="envoyer">connexion</button>
</form>
</fieldset>
</div>

<?php
require("pied.php");
?>