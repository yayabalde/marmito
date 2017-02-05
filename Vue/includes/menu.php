<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
    <header id="header" class="container">
        <div class="logo col-lg-3 col-xs-3 col-sm-3 col-md-3"><img src="<?php echo CONTENU; ?>/img/logo_toto_jaune.png" alt="Logo Marmito" width="30px" height="45px"></div>
        <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6">
            <?php if(isset($_SESSION['uti_id']) && !empty($_SESSION['uti_id'])): ?>
                <h6 class="utilisateur">Bonjour
                   <strong> <?php echo $_SESSION['uti_prenom'].' '.$_SESSION['uti_nom'] ?> </strong><br/>vous etes
                       <em>  <?php echo $_SESSION['uti_role']?> </em> 
                </h6>
                <?php endif; ?>
        </div>
        <div class="panier col-lg-3 col-xs-3 col-sm-3 col-md-3"><img src="<?php echo CONTENU; ?>/img/ico_panier_jaune.png" alt="Panier Marmito" width="20px" height="30px"><?php if(!empty($_SESSION['total_produits'])){ echo '<span id="panier-contenu">'.$_SESSION['total_produits'].'</span>';} ?></div>
    </header>
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i> </button> <a class="navbar-brand page-scroll" href="#page-top">Marmito</a> </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li><a class="page-scroll" href="<?php echo RACINE_WEB; ?>" title="accueil"><i class="fa fa-home"></i> Accueil</a></li>
                <li><a class="page-scroll" href="<?php echo RACINE_WEB; ?>plat" title="Liste de nos plats"><i class="fa fa-th-list"></i> Liste des plats</a></li>
                <li><a class="page-scroll" href="<?php echo RACINE_WEB; ?>contact" title="Nous contacter"><i class="fa glyphicon-envelope"></i> Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <?php if(isset($_SESSION['uti_id']) && !empty($_SESSION['uti_id'])): ?>
                    <li><a class="page-scroll" href="<?php echo RACINE_WEB; ?>client/commandes" title="Mes commandes"><i class="fa fa-th-large"></i> Mes commandes</a></li>
					<li><a class="page-scroll" href="<?php echo RACINE_WEB; ?>client/profile" title="Mes commandes"><i class="fa fa-user"></i> Mon espace</a></li>
                    <li><a class="page-scroll" href="<?php echo RACINE_WEB; ?>deconnexion" title="Déconnexion"><i class="fa fa-power-off"></i> Déconnexion</a></li>
                    <?php else: ?>
                        <li class="page-scroll"><a href="<?php echo RACINE_WEB; ?>inscription" title="Inscription"><i class="fa fa-shopping-cart"></i> Inscription</a></li>
                        <li class="page-scroll"><a href="<?php echo RACINE_WEB; ?>connexion" title="Formulaire de Connexion"><i class="fa fa-lock"></i> Connexion</a></li>
                        <?php endif; ?>
                            <li class="page-scroll"><a href="<?php echo RACINE_WEB; ?>plat/monpanier" title="Mon panier"><i class="fa fa-shopping-cart"></i> Mon panier</a></li>
                            <?php if(isset($_SESSION['uti_role']) && $_SESSION['uti_role'] == "admin"): ?>
                                <li class="page-scroll"><a href="<?php echo RACINE_WEB; ?>admin" title="Administration"><i class="fa fa-gear"></i> Admin</a></li>
                                <?php endif; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
