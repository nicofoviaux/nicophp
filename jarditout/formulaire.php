<?php
require("head.php");
include("header.php");
?>
<div class="col-12">
    <div class="row">
        <div class="container col-xl-4 col-sm-8 ">
           <form action="script.php" method="post">
           
           <div class="text-center">
                <p class="textform">* Zones obligatoire</p>
            <fieldset>
                <legend>Vos coordonnées</legend>
                        <!--Label OBLIGATOIRE avant chaque Input // Les écritures sont a TOUJOURS mettre entre les <label></label> !!!-->
                        <!--Required permet de forcer le remplissage de ce champs pour pouvoir valider le formulaire-->
                        <div class="form-group  w-50 offset-3">
                             <label for="nom">Votre nom: </label>
                             <span id="missnom">*</span>
                             <input type="text" id="nom" name="nom" class="form-control" required>
                        </div>
                        
                        <div class="form-group  w-50 offset-3">
                            <label for="prenom">Votre prénom: </label><span id="misspre">*</span>
                            <input type="text" id="prenom" name="prenom" class=" form-control" required>
                            <!--Mettre le même name pour pouvoir en cocher qu'un seul sinon sa offre deux possibilités et du coup les deux son cochable-->
                        </div>

                        <div class="form-group  w-50 offset-3">
                            <p id="sexe">Sexe: </p>
                            <input type="radio" class="sexe" name="sexe" value="femme"> <span>Femme</span>
                            <input type="radio" class="sexe" name="sexe" value="homme" checked><span>Homme</span><!--checked permet d'avoir quelques chose de pré-coché-->
                        </div>
                            <br>
                        <div class="form-group  w-50 offset-3">
                            <label for="ddn">Date de naissance: </label><span id="missddn">*</span>
                            <input class="form-control" type="date" id="ddn" name="ddn" max="" required>
                        </div>  
                        
                        <div class="form-group  w-50 offset-3">
                            <label for="cpostal">Code postal: </label><span id="missCP"></span>
                            <input class="form-control" type="text" id="cpostal" name="cpostal" required>
                        </div>  

                        <div class="form-group  w-50 offset-3">
                            <label for="adresse">Adresse: </label><span id="missAD"></span>
                            <input class="form-control" type="text" id="adresse" name="adresse" required>
                        </div>  

                        <div class="form-group  w-50 offset-3">
                            <label for="ville">Ville: </label><span id="missCity"></span>
                            <input class="form-control" type="text" id="ville" name="ville" required>
                        </div>  

                        <div class="form-group  w-50 offset-3">
                            <label for="email">Email: </label><span id="missEmail">*</span>
                            <input class="form-control" type="email" id="email" name="email" placeholder="dave.loper@afpa.fr" required>
                        </div>  
                    <br>
                    </div>
            </fieldset>
            <fieldset>
                <legend>Votre demande</legend>
                <!--datalistpermet de cibler une liste d'éléments via un champ <input> et Option c'est les choix et value les trucs que l'ont mes comme choix-->
                    <div class="form-group  w-50 offset-3">
                    <label for="sujets">Sujet:</label><span id="misssujet">*</span>
                    <!--select permet de faire comme datalist mais sans input et en selectionnant par défaults le choix entré en premier dans la liste-->
                    <select id="sujets" class=" custom-select" required>
                        <option value="0" disabled selected>selectionnez votre demande</option>
                        <option value="Question sur le produit">Question sur le produit</option>
                        <option value="Réclamation">Réclamation</option>
                        <option value="Autres">Autres</option>
                    </select>
                    </div>
                    <div class="form-group  w-50 offset-3">
                    <label for="question">Votre question: </label><span id="missquestion">*</span>
                    <textarea class="form-control" placeholder="veuillez écrire votre demande" name="question" id="question"cols="50" rows="2" required></textarea>
                    </div>
                    <br>
            </fieldset>
                <br>
                <div class="text-center">
                <div class="form-group container ">
                    <input type="checkbox" id="check" class="form-check-input" required>
                    <label class="form-check-label" for="check" id="okf">J'accepte le traitement informatique de ce formulaire</label>
                </div>
                <br>
                <div class="form-group container">
                <input type="submit" id="ok" name="envoyer" value="Envoyez">
                <input type="reset" id="cancel" value="Annuler">
                </div>
                </div>
                </form>

         </div> <!-- .container -->
    </div> <!-- .row -->
</div> <!-- col -->
<?php
include("footer.php");
require("pied.php");
?>