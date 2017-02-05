<?php $this->titre = "Ingrédients admin - Marmito" ; $this->file_ariane = 'Administration > Plats > Ajouter plat'; ?>
    <section id="admin" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="wrapper">
                        <!-- debut menut horizontale-->
                        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                            <!--debut menu horizontale -->
                            <?php require_once 'Vue/includes/admin_menu_horizontale.php'; ?>
                                <!-- fin menu horizontale -->
                                <!-- debut menu verticale -->
                                <?php require_once 'Vue/includes/admin_menu_verticale.php'; ?>
                                    <!-- fin menu verticale -->
                        </nav>
                        <div id="page-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="page-header text-center">Gestion des plats</h1> </div>
                            </div>
                            <!-- debut contenu table-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"> Cet espace vous permet de gerer vos plats </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <form name="ajout_plat" id="ajout_plat" enctype="multipart/form-data" novalidate>
                                                <div class="row">
                                                    <div class="col-md-8 col-md-offset-2">
                                                        <div class="form-group">
                                                            <label for="pla_titre">Titre du plat</label>
                                                            <input value="" class="form-control" placeholder="titre ..." name="pla_titre" id="pla_titre" required data-validation-required-message="Veuillez entrer l titre du plat.">
                                                            <p class="help-block text-danger"></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pla_descr">Description du plat</label>
                                                            <textarea value="" class="form-control" placeholder="description ..." name="pla_descr" id="pla_descr" required data-validation-required-message="Veuillez entrer la description du plat"></textarea>
                                                            <p class="help-block text-danger"></p>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pla_prix">Prix du plat</label>
                                                            <input value="" class="form-control" placeholder="prix ..." name="pla_prix" id="pla_prix" required data-validation-required-message="Veuillez entrer le prix du plat.">
                                                            <p class="help-block text-danger"></p>
                                                        </div>
														<div class="form-group">
                                                            <label for="pla_file">Selectionner une photo</label>
                                                            <input type="file" name="pla_file" id="pla_file" value="" class="form-control" placeholder="choisir une photo ..." required data-validation-required-message="Veuillez selectionner la photo du plat">
                                                            <p class="help-block text-danger"></p>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-lg-12 text-center">
                                                        <div id="success"></div>
                                                        <button id="btn_ajouter_plat" type="submit" class="btn btn-xl">Ajouter le plat</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-lg-12 -->
                            </div>
                            <!-- fin contenu table -->
                        </div>
                        <!-- /#page-wrapper -->
                    </div>
                    <!-- /#wrapper -->
                </div>
            </div>
        </div>
    </section>