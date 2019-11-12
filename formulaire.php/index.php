<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/jarditout.css">
    <title>formulaire</title>
</head>

<body class="container-fluid">
    <header>
        <div>
            <img src="assets/img/jarditou_logo.jpg" alt="logo jarditout" id="logo">
            <p class=" float-right" id="ttlejardin">tout le jardin</p>
        </div>
        <nav id="navbar" class="navbar navbar-expand-sm navbar-dark col" style="background-color: #19D053">
            <!--la navbar retrecit au niveau sm et pour changer la couleur de fond soit mette bg-"la couleur" sinon cree un style sur la bar-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="acceuil.html">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exo1.html">exo1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exo2.html">exo2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exo3.html">exo3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exo4.html">exo4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exo5.html">exo5</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exo6.html">exo6</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formulaire.html">Formulaire</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!--image de promotion-->
        <img class="img-fluid col" src="assets\img\promotion.jpg" alt="promotion sur lame de terasse" id="promo">
    </header>
    <!--<a href=""> c'est pour créer un lien hypertexte-->
    <form action="script.php" method="POST">
        <div>
            <div class="form-group">
                <p class="txtform">* Zones obligatoire</p>
                <fieldset class="coordonee">
                    <legend>Vos coordonnées</legend>
                    <div class="col">
                        <!--Label OBLIGATOIRE avant chaque Input // Les écritures sont a TOUJOURS mettre entre les <label></label> !!!-->
                        <!--Required permet de forcer le remplissage de ce champs pour pouvoir valider le formulaire-->
                        <label for="nom">Votre nom: </label><span id="missnom">*</span>
                        <input type="text" id="nom" name="nom" class="coord form-control" required>
                    </div>
                    <div class="col">
                        <label for="prenom">Votre prénom: </label><span id="misspre">*</span>
                        <input type="text" id="prenom" name="prenom" required class="coord form-control" required>
                        <!--Mettre le même name pour pouvoir en cocher qu'un seul sinon sa offre deux possibilités et du coup les deux son cochable-->
                    </div>
                    <div class="col inine">
                        <p id="sexe">Sexe: </p>
                        <input type="radio" class="sexe" name="sexe" value="femme"> <span>Femme</span>
                        <input type="radio" class="sexe" name="sexe" value="homme" checked><span>Homme</span>
                        <!--checked permet d'avoir quelques chose de pré-coché-->
                    </div>
                    <div class="col">
                        <label for="ddn">Date de naissance: </label><span id="missddn">*</span>
                        <input class="form-control" type="date" id="ddn" name="ddn" max="" required>
                    </div>
                    <div class="col">
                        <label for="cpostal">Code postal: </label><span id="missCP"></span>
                        <input class="form-control" type="text" id="cpostal" name="cpostal" required>
                    </div>
                    <div class="col">
                        <label for="adresse">Adresse: </label><span id="missAD"></span>
                        <input class="form-control" type="text" id="adresse" name="adresse" required>
                    </div>
                    <div class="col">
                        <label for="ville">Ville: </label><span id="missCity"></span>
                        <input class="form-control" type="text" id="ville" name="ville" required>
                    </div>
                    <div class="col">
                        <label for="email">Email: </label><span id="missEmail">*</span>
                        <input class="form-control" type="email" id="email" name="email"
                            placeholder="dave.loper@afpa.fr" required>
                        <br>
                    </div>
            </div>
        </div>
        </fieldset>
        <fieldset class="coordonee">
            <legend>Votre demande</legend>
            <!--datalistpermet de cibler une liste d'éléments via un champ <input> et Option c'est les choix et value les trucs que l'ont mes comme choix-->
            <div class="col">
                <label for="sujets">Sujet:</label><span id="misssujet">*</span>
                <!--select permet de faire comme datalist mais sans input et en selectionnant par défaults le choix entré en premier dans la liste-->
                <select id="sujets" class="coord custom-select" required>
                    <option value="0" disabled selected>selectionnez votre demande</option>
                    <option value="Question sur le produit">Question sur le produit</option>
                    <option value="Réclamation">Réclamation</option>
                    <option value="Autres">Autres</option>
                </select>
            </div>
            <div class="col">
                <label for="question">Votre question: </label><span id="missquestion">*</span>
                <textarea class="form-control" placeholder="veuillez écrire votre demande" name="question" id="question"
                    cols="50" rows="2" required></textarea>
                <br>
            </div>
        </fieldset>
        <br>
        <div class="col">
            <p id="okf">J'accepte le traitement informatique de ce formulaire</p>
            <input type="checkbox" id="check" class="txtform" required>
            <label for="check"> </label>
        </div>
        <br>
        <div class="txtform col">
            <input type="submit" id="ok" name="envoyer" value="Envoyez">
            <input type="reset" id="cancel" value="Annuler">
        </div>
    </form>
    <br>
    <footer>
        <nav id="navbar" class="navbar navbar-expand-sm navbar-dark col" style="background-color: #19D053">
            <!--la navbar retrecit au niveau sm et pour changer la couleur de fond soit mette bg-"la couleur" sinon cree un style sur la bar-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="acceuil.html">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exo1.html">exo1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exo2.html">exo2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exo3.html">exo3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exo4.html">exo4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exo5.html">exo5</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="exo6.html">exo6</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formulaire.html">Formulaire</a>
                    </li>
                </ul>
            </div>
        </nav>
    </footer>
    <script src="assets/js/formulaire.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>