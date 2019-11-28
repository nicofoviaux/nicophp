<?php
/*
------------------------------------PARTIE DETAIL VU PAR LES CLIENTS-------------------------------
->affiche les detail de l'article

-----------------reste-----------------------

->affiche un caddi si le client est connecté
-> une session de connection
-> bouton retour en arriere 
->....

*/

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
        <div class="container col-xl-6 col-lg-6 col-md-7 col-sm-8 pt-2 pb-2 container1">
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
                    <div class="container prix  border text-center  align-self-center col-xl-3 col-lg-4 col-md-5 col-sm-6 justify-content-end"><!--prix + nomb en stock-->
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
<?php
include("footer.php");
require("pied.php");
?>

