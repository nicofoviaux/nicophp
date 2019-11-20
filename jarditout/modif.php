<?php
    require("bdd.php");
    $db=connexionadmin("nikthekiller","PU5aqu962");
if(isset($_POST["ajout"])){
    $id=$_POST["id"];
    $categorie=$_POST["categorie"];
    $reference=$_POST["reference"];
    $libelle=$_POST["libelle"];
    $descrip=$_POST["description"];
    $prix=$_POST["prix"];
    $stock=$_POST["stock"];
    $couleur=$_POST["couleur"];
    $photo=$_POST["photo"];
    $bloque=$_POST["bloque"];
    $date=date('d/m/Y');
    $modif=null;
    var_dump($id,$categorie,$libelle,$descrip,$prix,$stock,$couleur,$photo,$date,$bloque);
    if(empty($id)){ echo 'id vide</br>';}
    if(empty($categorie)){echo 'categorie vide </br>';}
    if(empty($libelle)){echo 'libelle vide</br>';}
    if(empty($prix)){echo 'prix vide</br>';}
    if(empty($stock)){echo 'stock vide</br>';}
    if(empty($photo)){echo 'photo vide</br>';}
        else{
        $requete='INSERT INTO `produits` (`pro_id`, `pro_cat_id`, `pro_ref`, `pro_libelle`, `pro_description`, `pro_prix`, `pro_stock`, `pro_couleur`, `pro_photo`, `pro_d_ajout`, `pro_d_modif`, `pro_bloque`)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
        $q = $db->prepare($requete);
        $q->execute(array($id,$reference,$categorie,$libelle,$descrip,$prix,$stock,$couleur,$photo,$date,$modif,$bloque));  
     header("location:admin.php");
        }
    }
if(isset($_POST["modif"])){
    $id=$_POST["var"];
    $categorie=$_POST["categorie"];
    $reference=$_POST["reference"];
    $libelle=$_POST["libelle"];
    $descrip=$_POST["description"];
    $prix=$_POST["prix"];
    $stock=$_POST["stock"];
    $couleur=$_POST["couleur"];
    $photo=$_POST["photo"];
    $bloque=$_POST["bloque"];
    $date=date('d/m/Y');
    $modif=null;
    var_dump($id,$reference,$categorie,$libelle,$descrip,$prix,$stock,$couleur,$photo,$date,$modif,$bloque);
}
if(isset($_POST["supprime"])){
    $id=$_POST["variable"];
    $sql = " DELETE FROM `produits` WHERE `produits`.`pro_id` = ?";
    $q = $db->prepare($sql);
    $q->execute(array($id));
    header("location:admin.php");
}

?>