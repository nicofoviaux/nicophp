<header>
        <!--la cellule du haut "container fluid pour tt la page en bootstrap-->
        <div class="col">
            <a href="index.php"><img src="assets/img/jarditou_logo.jpg" alt="logo jarditout" id="logo"></a>
            <p class=" float-right" id="ttlejardin">tout le jardin</p>
            
        </div>
        <!-- class foat-right ou center pour aligné le text-->
        <nav id="navbar" class="navbar navbar-expand-sm navbar-dark col" style="background-color: #19D053">
                <!--la navbar retrecit au niveau sm et pour changer la couleur de fond soit mette bg-"la couleur" sinon cree un style sur la bar-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tableaux.php">Tableau</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="formulaire.php">Formulaire</a>
                        </li>
                    </ul>
                </div>
                <div class="text-right">
        <button type="button"  class=" btn btn-outline-primary waves-effect" onclick="self.location.href='id.php'"><i class="far fa-user pr-2" aria-hidden="true"></i><a href="id.php"></a>connexion</button>           
                </div>
        </nav>
        <!--image de promotion-->
        <img class="img-fluid col" src="assets\img\promotion.jpg" alt="promotion sur lame de terasse" id="promo">
</header>