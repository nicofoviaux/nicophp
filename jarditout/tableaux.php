<?php
require("head.php");
include("header.php");
require('bdd.php');
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
<div class="col-12">
    <div class="row">
<aside class="container text center col-3 sm-8 pt-2 pb-2 ">[PROCHAINEMENT]</aside>
<div class="table-responsive container col-xl-6 col-sm-8 pt-2 pb-2 ">
<table class="table-bordered col">
    
<tbody>
<?php
while($row=$result->fetchObject()){
    ?>
 <tr class="col-12">
    <td scope='row'>
    <div class="container text-center "><a href="detail.php?id=<?=$row->pro_id?>"><h3><b><?=$row->pro_libelle?></b></h3></a></div>
    <div class="container col-5 float-left pl-2"><a href="detail.php?id=<?=$row->pro_id?>"><img class='visuel img-thumbnail img-fluid rounded' src='assets/img/<?=$row->pro_id?>.<?=$row->pro_photo?>'></a></div>
    <div class="container"><h5><b><u>ref: </u></b><?=$row->pro_ref?></h5></div>
    <div class="container col-4 float-right"><h3><b><u>Prix: </u></b></h3><br><h4><b><u><?=$row->pro_prix?>€</u></b></h4></div>
    <div class="container col-3 pt-5"><h5><b><u>couleur: </u></b><?=$row->pro_couleur?></h5></div></td>
    </tr>
    <?php
    }
    ?>
    </tbody>
</table>
</div><!--container-->
<aside class="container text center col-3 sm-8 pt-2 pb-2">[PROCHAINEMENT]</aside>
</div><!--row-->
</div><!--col-->
<?php
include("footer.php");
require("pied.php");
?>

