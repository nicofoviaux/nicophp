<?php
/*
-----------------------HEADER-----------------------------
->logo et sloggan du site
->navbar
->promotion
-> les 3 son des container bootstrap
*/
session_start();
$compte=isset($_GET["account"]);
?>
<header>
<div class="col-12">
    <div class="row">
<!-------------------------------------------- ENTETE JARDITOUT + TT LE JARDIN----------------------------------------------------------->
        <div class="container col-12 ">
            <a href="index.php"><img src="assets/img/jarditou_logo.jpg" alt="logo jarditout" id="logo"></a>
            <p class=" float-right" id="ttlejardin">tout le jardin</p>
        </div>
      
<!-----------------------------------------------------NAVBAR-------------------------------------------------------------------------------->
    <div class="container col-12">
        <nav id="navbar" class="navbar navbar-expand-sm navbar-dark col" style="background-color: #19D053">
        <!--la navbar retrecit au niveau sm et pour changer la couleur de fond soit mette bg-"la couleur" sinon cree un style sur la bar-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="tableaux.php">Nos Produits</a></li>
                    <li class="nav-item"><a class="nav-link" href="formulaire.php">Contact</a></li>
                </ul>
<?php   
if (isset($_SESSION["connecte"]) && ($_SESSION["connecte"]) == "client"){
   // var_dump($_SESSION);
    
    ?>
<ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle  " data-toggle="dropdown"><i class="fas fa-user"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item">Compte</a>
                        <a href="#" class="dropdown-item">Commandes</a>
                        <div class="dropdown-divider"></div>
                        <a href="deconnection.php"class="dropdown-item">Deconnexion</a>
                    </div>
                </li>
            </ul>
    </div>

<?php

}else{
    
    ?>         
    <div class="ml-auto">
            <a href="id.php" class="btn btn-outline-dark"><i class="fas fa-user icon-large"></i></a>
    </div>
<?php
}
?>
           
        </nav>
    </div>
<!-------------------------------------------------PROMOTION----------------------------------------------------------------------------------------->    
    <div class="container col">
    <!--image de promotion-->
    <a href=""><img class="img-fluid col-12" src="assets\img\promotion.jpg" alt="promotion sur lame de terasse"></a>
    </div>
    </div><!--row-->
</div><!--col-->
</header>