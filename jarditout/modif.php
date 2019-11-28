<?php
/*
MODIFICATION DE LA BASE DE DONNEE AVEC LE SITE
--------------------------------------------------
-requete d'ajout 1ere position
-requete de MAJ 2nd position
-requete de supression 3eme position

*/ 
    require("bdd.php");
    $db=connexionBase();
//---------------------------------------------------------------------------------------------------AJOUT
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
    $bloque=intval($_POST["bloque"]);
    $date=date('Y-m-d');//prend la date d'aujourd'hui le "-" pour compatibilité sql
    $modif=null;
    var_dump($id,$reference,$categorie,$libelle,$descrip,$prix,$stock,$couleur,$photo,$date,$modif,$bloque);
    // securité en Cas d'oublie
    if(empty($id)){ echo'id vide</br>';  
    }elseif(empty($categorie)){echo 'categorie vide </br>';
    }elseif(empty($libelle)){echo 'libelle vide</br>';
    }elseif(empty($prix)){echo 'prix vide</br>';
    }elseif(empty($stock)){echo 'stock vide</br>';
    }elseif(empty($photo)){echo 'photo vide</br>';}
        else{
            //definition de la requète
    $requete='INSERT INTO `produits` (`pro_id`, `pro_cat_id`, `pro_ref`, `pro_libelle`, `pro_description`, `pro_prix`, `pro_stock`, `pro_couleur`, `pro_photo`, `pro_d_ajout`, `pro_d_modif`, `pro_bloque`) VALUES (:id,:cat,:ref,:libelle,:descrip,:prix,:stock,:couleur,:photo,:ajout,:modif,:bloque)';
    $q = $db->prepare($requete);
    $q -> bindValue(":id",$id,PDO::PARAM_INT);
    $q -> bindValue(":cat",$reference,PDO::PARAM_INT);
    $q -> bindValue(":ref",$categorie,PDO::PARAM_STR);
    $q -> bindValue(":libelle",$libelle,PDO::PARAM_STR);
    $q -> bindValue(":descrip",$descrip,PDO::PARAM_STR);
    $q -> bindValue(":prix",$prix,PDO::PARAM_INT);
    $q -> bindValue(":stock",$stock,PDO::PARAM_INT);
    $q -> bindValue(":couleur",$couleur,PDO::PARAM_STR);
    $q -> bindValue(":photo",$photo,PDO::PARAM_STR);
    $q -> bindValue(":ajout",$date,PDO::PARAM_STR);
    $q -> bindValue(":modif",$modif,PDO::PARAM_STR);
    $q -> bindValue(":bloque",$bloque,PDO::PARAM_INT);
    $q->execute();  
}
    if(!$q){
        $tableauErreur=$db->errorinfo();
        echo$tableauErreur[2];
        die("Erreur dans la requête");
        var_dump($id,$reference,$categorie,$libelle,$descrip,$prix,$stock,$couleur,$photo,$date,$modif,$bloque);
    }else{

        header("location:admin.php");
    }
     
    }
//----------------------------------------------------------------------------MAJ
if(isset($_POST["modif"])){
    $id=intval($_POST["var"]);
    $sql2='SELECT * FROM `produits` WHERE pro_id='.$id;
    $result=$db->query($sql2);
    $donee=$result->fetchObject();
//assignation des variables
    $categorie=$_POST["categorie"];
    $reference=$donee->pro_cat_id;
    $libelle=$_POST["libelle"];
    $descrip=$_POST["description"];
    $prix=floatval($_POST["prix"]);
    $stock=intval($_POST["stock"]);
    $couleur=$_POST["couleur"];
    $photo=$_POST["photo"];
    $bloque=intval($_POST["bloque"]);
    $date=$donee->pro_d_ajout;//va les cherche directement en bdd
    $modif=date('Y-m-d H:i:s');

    if(empty($id)){ echo'id vide</br>';
    }elseif(empty($categorie)){echo 'categorie vide </br>';
    }elseif(empty($libelle)){echo 'libelle vide</br>';
    }elseif(empty($prix)){echo 'prix vide</br>';
    }elseif(empty($stock)){echo 'stock vide</br>';
    }elseif(empty($photo)){echo 'photo vide</br>';}
        else{
    // requete
    $Maj='UPDATE `produits` SET pro_id=:id,pro_cat_id=:cat,pro_ref=:ref,pro_libelle=:libelle,pro_description=:descrip,pro_prix=:prix,pro_stock=:stock,pro_couleur=:couleur,pro_photo=:photo,pro_d_ajout=:ajout,pro_d_modif=:modif,pro_bloque=:bloque WHERE `produits`.`pro_id` = '.$id;
    $q = $db->prepare($Maj);
    $q -> bindValue(":id",$id,PDO::PARAM_INT);
    $q -> bindValue(":cat",$reference,PDO::PARAM_INT);
    $q -> bindValue(":ref",$categorie,PDO::PARAM_STR);
    $q -> bindValue(":libelle",$libelle,PDO::PARAM_STR);
    $q -> bindValue(":descrip",$descrip,PDO::PARAM_STR);
    $q -> bindValue(":prix",$prix,PDO::PARAM_INT);
    $q -> bindValue(":stock",$stock,PDO::PARAM_INT);
    $q -> bindValue(":couleur",$couleur,PDO::PARAM_STR);
    $q -> bindValue(":photo",$photo,PDO::PARAM_STR);
    $q -> bindValue(":ajout",$date,PDO::PARAM_STR);
    $q -> bindValue(":modif",$modif,PDO::PARAM_STR);
    $q -> bindValue(":bloque",$bloque,PDO::PARAM_INT);
    }
    if($q->execute())
    {
        header("location:admin.php");
        exit;
    }else{
        $tableauErreur=$db->errorinfo();
        echo$tableauErreur[2];
        die("Erreur dans la requête");
        var_dump($id,$reference,$categorie,$libelle,$descrip,$prix,$stock,$couleur,$photo,$date,$modif,$bloque);
    }
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