<?php
require("head.php");
?>
<h1><strong>description des produits</strong></h1>
<form action="modif.php" method="post"></form>

<?php
require("bdd.php");//inclusion de la db
$db=connexionadmin("nikthekiller","PU5aqu962");
$pro_id=$_GET["id"];//recupere la variable via GET (url)
$requete="select * from produits where pro_id=".$pro_id;
$result=$db->query($requete);
$produit=$result->fetch(PDO::FETCH_OBJ);
$result->closecursor();
    echo '<img src="assets/img/'.$produit->pro_id.'.'.$produit->pro_photo.'">'.'</br>';
    echo '<h2>reference:</h2>'.$produit->pro_ref.'</br>'; 
    echo '<h2>libelle:</h2>'. $produit->pro_libelle.'</br>';
    echo '<h2>description:</h2>'.$produit->pro_description.'</br>';
    echo '<h2>prix:</h2>'.$produit->pro_prix.'€</br>';?>

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
?>
