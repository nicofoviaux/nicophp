<div class="text-center identification">
<form action="controle.php" method="POST" class="form-singin">
    <img src="assets/img/jarditou_logo.jpg" alt="logo jarditout" class="mb-4 img-fluid" width="200">
    <h2>connexion</h2>
    <div>
        <label for="nom" class="sr-only">nom</label>
        <input name="identifiant" type="text" id="nom" placeholder="nom d'utilisateur" require>
    </div>
    <div>
        <label for="mot_de_passe" class="sr-only">mot de passe</label>
        <input  id="mot_de_passe" name="mot_de_passe" required="" type="password" placeholder="mot de passe">
    </div>
</br>
<button class="btn btn-primary " type="submit" name="envoyer">connexion</button>
</div>
</form>
