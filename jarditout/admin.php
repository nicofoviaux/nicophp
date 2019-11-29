<?php
/*
PARTIE ADMINISTRATEUR 
-> partie securisé par la session "nico"
->formulaire d'ajout
->tableau recapitulatif

----------------------------------
reste a faire
- insertion d'image + securité image 
-
-
*/ 
session_start();
if (isset($_SESSION["connecte"]) && ($_SESSION["connecte"]) == 'nico'){
require('head.php');
require('bdd.php');
?>
<div class="col-12">
    <div class="row">
            <!--------------------------------------------------------------HEADER---------------------------------------->
            <header class="container col bg-secondary "> 
                <h1><strong>Bienvenue Nicolas</strong></h1>
                <div class="float-right">
                    <a href="index.php" title="acceuil" class="btn btn-outline-dark"><i class="fas fa-home"></i></a>
                    <a href="deconnection.php" title="deconnexion" class="btn btn-outline-dark"><i class="fas fa-power-off"></i></a>
                </div>
            </header>
    </div><!-- fin de row-->
    <div class="row">
        <!--------------------------------------------FORMULAIRE---------------------------->
        <div class="container col-xl-2 col-sm-12 ">
            <form action="modif.php" method="POST" enctype="multipart/form-data" class="form-singin ">
                <div class="form-group">
                    <div>
                        <a href="index.php"><img src="assets/img/jarditou_logo.jpg" alt="logo jarditout" class=" img-thumbnail img-fluid rounded" width="200" ></a>
                    </div>
                    <!--ID -->
                    <div>
                        <label for="id" class="sr-only">id</label>
                        <input type="number" id="id" name="id" placeholder="Id" >
                    </div>
                    <!--CATEGORIE -->
                    <div>
                        <label for="categorie" class="sr-only">categorie</label>
                        <input type="text" id="categorie" name="categorie" placeholder="Reference">
                    </div>
                    <!--REFERENCE -->
                    <div>
                        <label for="reference"class="sr-only" >reference</label>
                        <select name="reference" id="reference">
                        <option  disabled selected>Categorie</option>
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
                    </div>
                    <!--LIBELLE -->
                    <div>
                        <label for="libelle" class="sr-only">libellé</label>
                        <input type="text" name="libelle" id="libelle" placeholder="Libelle">
                    </div>
                    <!--DESCRIPTION -->
                    <div>
                        <label for="description" class="sr-only">description</label>
                        <textarea name="description" id="description" cols="20" rows="1" placeholder="Description"></textarea>
                    </div>
                    <!--PRIX -->
                    <div>
                        <label for="prix" class="sr-only">prix</label>
                        <input type="number" step="any" name="prix" id="prix" placeholder="prix">
                    </div>
                    <!--STOCK -->
                    <div>
                        <label for="stock" class="sr-only">stock</label>
                        <input type="number" name="stock" id="stock" placeholder="stock">
                    </div>
                    <!--COULEUR -->
                    <div>
                        <label for="couleur" class="sr-only">couleur</label>
                        <input type="text" name="couleur" id="couleur" placeholder="couleur">
                    </div>
                     <!--FORMAT PHOTO -->
                     <div>
                         <label for="photo" class="sr-only">Photo</label>
                         <input type="file" name="photo" id="photo" placeholder="photo">
                     </div>
                     <!--BLOQUAGE -->
                     <div>
                         <label for="bloque">Bloqué</label>
                         <input type="radio" name="bloque" id="bloque" value="1"><span>oui</span>
                         <input type="radio" name="bloque" id="bloque" value="0" checked><span>non</span>
                     </div>
                    <div>
                        <input  type="submit" name="ajout" value="ajouté ce produit" >
                    </div>
                </div>
            </form>
        </div><!-- fin du container form-->

    <!------------------------------------TABLEAU------------------------------------->
        <div class="container col-xl-10 col-sm-12">
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
        </div><!-- fin du container-->
                                    <?php
                                    require('pied.php');
                                    ?>
                                    

    </div><!--row-->
</div><!-- col-->
    <?php 
}
else 
{
    var_dump($_SESSION['connecte']);
    header("Location:id.php");
    exit;
}
?>

<!--fromulaire d'ajout -->
<!--<nav id="navbar" class="navbar navbar-expand-sm navbar-dark col">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        </nav>
        -->