<?php
require('head.php');
require('bdd.php');
?>
<header class="text-center">
    <h1><strong>bienvenue Nicolas</strong></h1>
</header>
<form action="modif.php" methode="POST" class="form-singin "></form>
<div class="text-center">
    <div>

        <img src="assets/img/jarditou_logo.jpg" alt="logo jarditout" class=" img-fluid" width="200">
    </div>
<label for="id">id</label>
<input type="number" id="id" name="id" >
<label for="categorie">categorie</label>
<input type="text" id="categorie" name="categorie">
<label for="prix">prix</label>
<input type="number" name="prix" id="prix">
<label for="couleur">couleur</label>
<input type="text" name="couleur" id="couleur">
<label for="bloque">Bloqué</label>
<input type="radio" name="bloque" id="bloque" value="oui"><span>oui</span>
<input type="radio" name="bloque" id="bloque" value="false" checked><span>non</span>
<div>
    <button type="submit" name="ajout" >ajouté ce produit</button>
</div>
</div>

<?php
$db=connexionadmin("nikthekiller","PU5aqu962");//appel la fonction de connexion
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
        <th scope="col"><b>Ajout</b></th>
        <th scope="col"><b>Modif</b></th>
        <th scope="col"><b>Bloqué</b></th>
    </tr>
</thead>';
while($row=$result->fetch(PDO::FETCH_OBJ)){
  echo"<tr>";
    echo "<td scope='row'><img class='visuel img-thumbnail img-fluid rounded' src='assets/img/".$row->pro_id.'.'.$row->pro_photo."'></td>\n";
    echo"<td>".$row->pro_id."</td>";
    echo"<td>".$row->pro_ref."</td>";
    echo"<td><a href=\"detailadmin.php?id=".$row->pro_id."\">".$row->pro_libelle."</a></td>";
    echo"<td>".$row->pro_prix."</td>";
    echo "<td>".$row->pro_couleur."</td>";
    echo"<td>".$row->pro_d_ajout."</td>";
    echo"<td>".$row->pro_d_modif."</td>";
    echo"<td>".$row->pro_bloque."</td>";
    echo"</tr>";
}
echo"</table>
</div> ";
require('pied.php');
?>