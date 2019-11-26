<?php
/*
PARTIE ADMINISTRATEUR 
->formulaire d'ajout
->tableau recapitulatif
*/ 
require('head.php');
require('bdd.php');
?>
<div class="admin" >
    <header class="text-center sticky-top  bg-secondary formajout ">
        <h1><strong>Bienvenue Nicolas</strong></h1>
        <!--fromulaire d'ajout -->
        <nav id="navbar" class="navbar navbar-expand-sm navbar-dark col">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <form action="modif.php" method="POST" class="form-singin ">
                        <div class="text-center">
                            <a href="index.php"><img src="assets/img/jarditou_logo.jpg" alt="logo jarditout" class=" img-thumbnail img-fluid rounded" width="200" ></a>
                            <!--ID -->
                            <label for="id">id</label>
                            <input type="number" id="id" name="id" >
                            <!--CATEGORIE -->
                            <label for="categorie">categorie</label>
                            <input type="text" id="categorie" name="categorie">
                            <!--REFERENCE -->
                            <label for="reference">reference</label>
                            <select name="reference" id="reference">
                                <?php
                            $db=connexionBase();
                            $requeteB="SELECT * FROM `categories` ORDER BY cat_id ASC";
                            $resultB=$db->query($requeteB);
                            while($rowB=$resultB->fetch(PDO::FETCH_OBJ)){
                                ?>
                            <option value="<?= $rowB->cat_id?>"> <?=$rowB->cat_nom?></option>
                            <?php 
                            }
                            ?>
                            </select>
                            <!--LIBELLE -->
                            <label for="libelle">libellé</label>
                            <input type="text" name="libelle" id="libelle">
                            <!--DESCRIPTION -->
                            <label for="description">description</label>
                            <textarea name="description" id="description" cols="20" rows="1"></textarea>
                            <!--PRIX -->
                            <label for="prix">prix</label>
                            <input type="number" name="prix" id="prix">
                            <!--STOCK -->
                        <label for="stock">stock</label>
                        <input type="number" name="stock" id="stock">
                        <!--COULEUR -->
                        <label for="couleur">couleur</label>
                        <input type="text" name="couleur" id="couleur">
                        <!--FORMAT PHOTO -->
                        <label for="photo">Photo</label>
                        <input type="text" name="photo" id="photo">
                        <!--BLOQUAGE -->
                        <label for="bloque">Bloqué</label>
                        <input type="radio" name="bloque" id="bloque" value="1"><span>oui</span>
                        <input type="radio" name="bloque" id="bloque" value="0" checked><span>non</span>
                        <div>
                            <input  type="submit" name="ajout" value="ajouté ce produit" >
                        </div>
                    </div>
                </form>
            </div>
    </nav>
    </header>
    <?php
    /* TABLEAU RECAPITULATIF
    ->connexion au la database
    ->affichage du tableau
    */
    $db=connexionBase();//appel la fonction de connexion
    $requete="SELECT * FROM produits ORDER BY pro_id ASC";
    $result=$db->query($requete);
    if(!$result){
    $tableauErreur=$db->errorinfo();
    echo$tableauErreur[2];
    die("Erreur dans la requête");
    }
    if($result->rowCount()==0){
    die("la table est vide");
    }
    ?>
    <div class="table-responsive position-relative tabadm ">
        <table class="table-bordered col">
            <thead>
                <tr>
                    <th class= "col"><b>Photo</b></th>
                    <th class="col"><b>ID</b></th>
                    <th class= "col"><b>Catégorie</b></th>
                    <th class= "col"><b>Libellé</b></th>
                    <th class= "col"><b>Prix</b></th>
                    <th  class=" col " ><b>Couleur</b></th>
                    <th  class="col"><b>Ajout</b></th>
                    <th  class="col "><b>Modif</b></th>
                    <th  class="col"><b>Bloqué</b></th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row=$result->fetchObject()){
                ?>
                <tr>
                    <td ><img class='visuel img-thumbnail img-fluid rounded' src='assets/img/<?=$row->pro_id?>.<?=$row->pro_photo?>'></td>
                    <td ><?=$row->pro_id?></td>
                    <td ><?=$row->pro_ref?></td>
                    <td ><a href="detailadmin.php?id=<?=$row->pro_id?>"><?=$row->pro_libelle?></a></td>
                    <td ><?=$row->pro_prix?>€</td>
                    <td  ><?=$row->pro_couleur?></td>
                    <td  ><?=$row->pro_d_ajout?></td>
                    <td  ><?=$row->pro_d_modif?></td>
                    <td  ><?=$row->pro_bloque?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
    require('pied.php');
    ?>
</div>