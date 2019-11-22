<?php
require('head.php');
require('bdd.php');
?>
<div class="admin" >
<header class="text-center">
    <h1><strong>Bienvenue Nicolas</strong></h1>
</header>
 <div class="row">
   <div class="col-2">
    <aside class=" position-fixed ">
        <form action="modif.php" method="POST" class="form-singin ">
            <div class="text-center">
                <div>
                    <a href="index.php"><img src="assets/img/jarditou_logo.jpg" alt="logo jarditout" class=" img-thumbnail img-fluid rounded" width="200" ></a>
                </div>
                <div>
                    <label for="id">id</label>
                    <input type="number" id="id" name="id" >
                </div>
                <div>
                    <label for="categorie">categorie</label>
                    <input type="text" id="categorie" name="categorie">
                </div>
                <div>
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
                </div>
                <div>
                    <label for="libelle">libellé</label>
                    <input type="text" name="libelle" id="libelle">
                </div>
                <div>
                    <label for="description">description</label>
                    <textarea name="description" id="description" cols="20" rows="1"></textarea>
                </div>
                <div>
                    <label for="prix">prix</label>
                    <input type="number" name="prix" id="prix">
                </div>
                <div>
                    <label for="stock">stock</label>
                    <input type="number" name="stock" id="stock">
                </div>
                <div>
                    <label for="couleur">couleur</label>
                    <input type="text" name="couleur" id="couleur">
                </div>
                <div>
                    <label for="photo">Photo</label>
                    <input type="text" name="photo" id="photo">
                </div>
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
    </aside>
    </div>
<?php
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
<div class="col-10 table-responsive">
<table class="table-bordered col">
 <thead>
    <tr>
        <th scope="col"><b>Photo</b></th>
        <th scope="col"><b>ID</b></th>
        <th scope="col"><b>Catégorie</b></th>
        <th scope="col"><b>Libellé</b></th>
        <th scope="col"><b>Prix</b></th>
        <th scope="col"><b>Couleur</b></th>
        <th scope="col"><b>Ajout</b></th>
        <th scope="col"><b>Modif</b></th>
        <th scope="col"><b>Bloqué</b></th>
    </tr>
</thead>
<tbody>
<?php
while($row=$result->fetchObject()){
    ?>
 <tr>
    <td scope='row'><img class='visuel img-thumbnail img-fluid rounded' src='assets/img/<?=$row->pro_id?>.<?=$row->pro_photo?>'></td>
    <td><?=$row->pro_id?></td>
    <td><?=$row->pro_ref?></td>
    <td><a href="detailadmin.php?id=<?=$row->pro_id?>"><?=$row->pro_libelle?></a></td>
    <td><?=$row->pro_prix?>€</td>
    <td><?=$row->pro_couleur?></td>
    <td><?=$row->pro_d_ajout?></td>
    <td><?=$row->pro_d_modif?></td>
    <td><?=$row->pro_bloque?></td>
    </tr>
    <?php
    }
    ?>
    </tbody>
</table>
</div>
</div>
<?php
require('pied.php');
?>
</div>