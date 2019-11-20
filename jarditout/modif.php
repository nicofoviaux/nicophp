<?php
    require("bdd.php");
    $db=connexionadmin("nikthekiller","PU5aqu962");
if($_POST){
    $id=$_POST["id"];
    $categorie=$_POST["categorie"];
    $libelle=$_POST["libelle"];
    $descrip=$_POST["description"];
    $prix=$_POST["prix"];
    $stock=$_POST["stock"];
    $couleur=$_POST["couleur"];
    $photo=$_POST["photo"];
    $bloque=$_POST["bloque"];
    $date=date('d/m/Y');
    var_dump($id,$categorie,$libelle,$descrip,$prix,$stock,$couleur,$photo,$date,$bloque);
        if(empty($id && $categorie && $libelle && $descrip && $prix && $stock && $couleur && $photo && $date && $bloque)){
        echo 'une donnée est vide';
        }else{
        header("Location:admin.php");
        $requeteaj='INSERT INTO jarditou (pro_id,pro_cat_id,pro_ref,pro_libelle,pro_description,pro_prix,pro_stock,pro_couleur,pro_d_ajout,pro_bloque) VALUE (?,?,?,?,?,?,?,?,?,?)';
        $q = $db->prepare($requeteaj);
        $q->execute(array($id,$categorie,$libelle,$descrip,$prix,$stock,$couleur,$photo,$date,$bloque));  
     header("location:admin.php");
        }
}
?>