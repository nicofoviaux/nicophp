<?php 
/*
* formulaire jarditout*

-declaration de regex
-recuperation de variable
-verif si le formulaire et remplie
-
*/
if(isset($_POST["envoyer"])){
    form();
}
function form(){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $sexe=$_POST['sexe'];
    $ddn=$_POST['ddn'];
    $cpostal=$_POST['cpostal'];
    $adresse=$_POST['adresse'];
    $ville=$_POST['ville'];
    $email=$_POST['email'];
    $valid=0;
    //regex
    $filtrecarac='/^[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+(?:(?:\-| )?[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ]+)*$/';
    $filtreCP='/^((?:[013-9]\d)|(?:2[0-9ABab]))\d{3}$/';
    $filtreMail='/^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i';
    $filtreadress='/^(\d+)(\D*)(\s)(\D+)(\s)(.+)$/';
    $filtrenocode='/^[\w+\s\d.,:?!@"&()àèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœÉ\+\*\/\-\=]*$/';

    if(empty($nom)||(!preg_match($filtrecarac,$nom))){
       echo 'veuillez indiquer votre nom.<br/>'; 
       $valid--;
    }else{$valid++;}
    if(empty($prenom)||(!preg_match($filtrecarac,$prenom))){
        echo 'veuillez indiquer votre prenom.<br/>';
        $valid--;
    }else{$valid++;}
    if(empty($ddn)){
        echo 'veuillez indiqué votre date de naissance. <br/>';
        $valid--;
    }else{$valid++;}
    if(empty($cpostal)||(!preg_match($filtreCP,$cpostal))){
        echo 'veuillez indiqué votre code postale.<br/>';
        $valid--;
    }else{$valid++;}
    if(empty($adresse)||(!preg_match($filtreadress,$adresse))){
        echo 'veuillez indiqué votre adresse.<br/>';
        $valid--;
    }else{$valid++;}
    if(empty($ville)||(!preg_match($filtrecarac,$ville))){
        echo 'veuillez indiqué votre ville.<br/>';
        $valid--;
    }else{$valid++;}
    if(empty($email)||(!preg_match($filtreMail,$email))){
        echo 'veuillez indiqué votre email.<br/>';
        $valid--;
    }else{
        $valid++;
    }
    var_dump($valid);
if ($valid==7){
    echo 'nom= '.$nom.'<br/>'.'prenom= '.$prenom.'<br/>'.'sexe= '.$sexe. '<br/>' .'date de naissance= '.$ddn.'<br/>'.'adresse= '.$adresse.'<br/>'.'code postale= '.$cpostal.'<br/>'.'ville= '.$ville.'<br/>'.'email= '.$email.'<br/>';
}else{
    echo 'le formulaire n\'a pas plus s\'envoyé ';
}
}

?>