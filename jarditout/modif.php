<?php
/*
MODIFICATION DE LA BASE DE DONNEE AVEC LE SITE
--------------------------------------------------
-requete d'ajout 1ere position
-requete de MAJ 2nd position
-requete de supression 3eme position

*/ 
    require("bdd.php");
    $db=connexionadmin("nikthekiller","PU5aqu962");
//------------------------------------------------------------------------------------AJOUT
if(isset($_POST["ajout"])){
    $id=intval($_POST["id"]);// pour avoir la variable en int
    $categorie=$_POST["categorie"];
    $reference=intval($_POST["reference"]);
    $libelle=$_POST["libelle"];
    $descrip=$_POST["description"];
    $prix=floatval($_POST["prix"]);// pour avoir la variable en decimal
    $stock=intval($_POST["stock"]);
    $couleur=$_POST["couleur"];
    $photo=$_POST["photo"];
    $bloque=$_POST["bloque"];
    $date=date('Y-m-d');//prend la date d'aujourd'hui le "-" pour compatibilité sql
    $modif=null;
    var_dump($id,$reference,$categorie,$libelle,$descrip,$prix,$stock,$couleur,$photo,$date,$modif,$bloque);
    // securité en Cas d'oublie
    if(empty($id)){ echo'id vide</br>';}
    if(empty($categorie)){echo 'categorie vide </br>';}
    if(empty($libelle)){echo 'libelle vide</br>';}
    if(empty($prix)){echo 'prix vide</br>';}
    if(empty($stock)){echo 'stock vide</br>';}
    if(empty($photo)){echo 'photo vide</br>';}
        else{
            //definition de la requète
        $requete='INSERT INTO `produits` (`pro_id`, `pro_cat_id`, `pro_ref`, `pro_libelle`, `pro_description`, `pro_prix`, `pro_stock`, `pro_couleur`, `pro_photo`, `pro_d_ajout`, `pro_d_modif`, `pro_bloque`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
        $q = $db->prepare($requete);
        $q->execute(array($id,$reference,$categorie,$libelle,$descrip,$prix,$stock,$couleur,$photo,$date,$modif,$bloque));  
     header("location:admin.php");
        }
    }
//----------------------------------------------------------------------------MAJ
if(isset($_POST["modif"])){
    $id=intval($_POST["var"]);
 


    $modif=date('d/m/Y');

    var_dump($id,$modif);
}
//----------------------------------------------------------------------------SUPRESSION
if(isset($_POST["supprime"])){
    $id=$_POST["variable"];
    $sql = " DELETE FROM `produits` WHERE `produits`.`pro_id` = ?";
    $q = $db->prepare($sql);
    $q->execute(array($id));
    header("location:admin.php");
}

?>