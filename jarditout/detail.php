<?php
require("head.php");
include("header.php");
require("bdd.php");//inclusion de la db
$db=connexionBase();//appel la fonction de connexion
$pro_id=$_GET["id"];//recupere la variable via GET (url)
$requete="select * from produits where pro_id=".$pro_id;
$result=$db->query($requete);
$produit=$result->fetch(PDO::FETCH_OBJ);
$result->closecursor();
?>
<div class="col-12">
    <div class="row">
        <div class="container col-xl-6 col-sm-8 pt-2 pb-2">
            <div class="col-12">
                <div class="row">
                    <div class="container col-4 ">
                        <img src="assets/img/<?=$produit->pro_id?>.<?=$produit->pro_photo?>" class="visuel img-thumbnail img-fluid rounded">
                    </div>
                    <div class="container ">
                        <h2>reference:</h2><?=$produit->pro_ref?>
                    </div>
                    <div class="container ">
                        <h2>libelle:</h2><?=$produit->pro_libelle?>
                    </div>
                    <div class="container justify-content-center">
                        <h2>description:</h2><?=$produit->pro_description?>
                    </div>
                    <div class="container text-right col-3 justify-content-end">
                        <h2>prix:</h2><?=$produit->pro_prix?>€
                    </div>
                </div>
            </div>
        </div>
    </div><!--row-->
</div><!--col-->
<?php
include("footer.php");
require("pied.php");
?>
