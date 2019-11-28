<?php
/*
-----------PAGE DE DETAIL ADMINISTRATEUR----------
-> partie securisé par session 
->afiche la description produit
->formulaire de modif et de supression 

----------reste a faire---------

-amelioré le formulaire 
-bouton de deconnection
-...
*/ 
session_start();
if (isset($_SESSION["connecte"]) && ($_SESSION["connecte"]) == 'nico'){
require("head.php");
?>
<h1><strong>description des produits</strong></h1>
<form action="modif.php" method="post"></form>

<?php
require("bdd.php");//inclusion de la db
$db=connexionBase();
$pro_id=$_GET["id"];//recupere la variable via GET (url)
$requete="select * from produits where pro_id=".$pro_id;
$result=$db->query($requete);
$produit=$result->fetch(PDO::FETCH_OBJ);
$result->closecursor();
?>
<a href="index.php"  class="btn btn-outline-dark"><i class="fas fa-home"></i></a>
<a href="admin.php"  class="btn btn-outline-dark"><i class="fas fa-chevron-left"></i></a>

<div class="col-12">
    <div class="row">
        <div class="container col-xl-6 col-sm-8 pt-2 pb-2 container1">
            <div class="col-12">
                <div class="row">
                    <div class="container text-center  ">
                    <h1><b><u><?=$produit->pro_libelle?></u></b></h1>
                    <div class="container text-center">
                        <?=$produit->pro_ref?>
                    </div>
                    </div>
                    <div class="container col-xl-4 col-sm-8 "><!--photo-->
                    <a href="assets/img/<?=$produit->pro_id?>.<?=$produit->pro_photo?>"><img src="assets/img/<?=$produit->pro_id?>.<?=$produit->pro_photo?>" class="visuel img-thumbnail img-fluid rounded"></a> 
                    </div>
                    <div class="container prix  border text-center align-self-center col-xl-3 col-sm-3 justify-content-end"><!--prix + nomb en stock-->
                        <h1><b><?=$produit->pro_prix?>€</b></h1>
                        <h3><u>attention</u></h3><br><h5> stock : <br><u> <?=$produit->pro_stock?></u><br> exemplaires!</h5>
                    </div>
                    </div><!--row-->
                    <div class="row">
                        <div class="container text-center ml-2">
                            <h2><b><u> description:</u></b></h2><?=$produit->pro_description?>     
                        </div>
                    </div><!--row-->
            </div>
        </div>
    </div><!--row-->
</div><!--col-->

<form action="modif.php" method="POST" class="form-singin ">
<div class="text-center">
<label for="var"></label>
<input type="hidden" name="var" id="var" <?php echo 'value="'.$pro_id.'"';?>>
<label for="categorie">categorie</label>
<input type="text" id="categorie" name="categorie" value=<?=$produit->pro_ref?>>
<label for="libelle">libellé</label>
<input type="text" name="libelle" id="libelle" value=<?=$produit->pro_libelle?>>
<label for="description">description</label>
<textarea name="description" id="description" cols="20" rows="1" ><?=$produit->pro_description?></textarea>
<div>
    <label for="prix">prix</label>
    <input type="number" name="prix" id="prix" value=<?=$produit->pro_prix?>>
    <label for="stock">stock</label>
    <input type="number" name="stock" id="stock" value=<?=$produit->pro_stock?>>
    <label for="couleur">couleur</label>
    <input type="text" name="couleur" id="couleur" value=<?=$produit->pro_couleur?>>
    <label for="photo">Photo</label>
    <input type="text" name="photo" id="photo" value=<?=$produit->pro_photo?>>
    <label for="bloque">Bloqué</label>
    <input type="radio" name="bloque" id="bloque" value="1"><span>oui</span>
    <input type="radio" name="bloque" id="bloque" value="null" checked><span>non</span>
</div>
<div>
    <input  type="submit" name="modif" value="modifié ce produit" >
</div>

</form>
<form action="modif.php" method="POST">
    <label for="variable"></label>
    <input type="hidden"  id= "variable" name="variable" <?php echo 'value="'.$pro_id.'"';?>>
        <input type="submit" name="supprime" id="suppr" value="supprimé">
</form>
</div>


 <?php   
require("pied.php");
}else{
    header('Location:id.php');
}
?>
