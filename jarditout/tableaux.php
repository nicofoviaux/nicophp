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
echo '<div class="table-responsive">
<table class="table-bordered col">
 <thead>
    <tr>
        <th scope="col"><b>Photo</b></th>
        <th scope="col"><b>ID</b></th>
        <th scope="col"><b>Catégorie</b></th>
        <th scope="col"><b>Libellé</b></th>
        <th scope="col"><b>Prix</b></th>
        <th scope="col"><b>Couleur</b></th>

    </tr>
</thead>';
while($row=$result->fetch(PDO::FETCH_OBJ)){
  echo"<tr>";
    echo "<td scope='row'><img class='visuel img-thumbnail img-fluid rounded' src='assets/img/".$row->pro_id.'.'.$row->pro_photo."'></td>\n";
    echo"<td>".$row->pro_id."</td>";
    echo"<td>".$row->pro_ref."</td>";
    echo"<td><a href=\"detail.php?id=".$row->pro_id."\">".$row->pro_libelle."</a></td>";
    echo"<td>".$row->pro_prix."</td>";
    echo "<td>".$row->pro_couleur."</td>";
    echo"</tr>";
}
echo"</table>
</div> ";
include("footer.php");
require("pied.php");
?>