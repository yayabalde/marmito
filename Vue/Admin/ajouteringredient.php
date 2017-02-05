<?php $this->titre = "Ingrédients admin - Marmito" ; $this->file_ariane = 'Administration > Ingrédients > Ajouter ingrédient'; ?>
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
                                    <h1 class="page-header text-center">Gestion des ingredients</h1> </div>
                            </div>
                            <!-- debut contenu table-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"> Cet espace vous permet de gerer vos ingrédients </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <form name="ajout_ingredient" id="ajout_ingredient" novalidate>
                                                <div class="row">
                                                    <div class="col-md-8 col-md-offset-2">
                                                        <div class="form-group">
                                                            <label for="message">Description de l'ingredient</label>
                                                            <textarea value="description" class="form-control" placeholder="description ..." name="ingredient_contenu" id="ingredient_contenu" required data-validation-required-message="Veuillez entrer votre message."></textarea>
                                                            <p class="help-block text-danger"></p>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="col-lg-12 text-center">
                                                        <div id="success"></div>
                                                        <button id="btn_ajouter_ingredient" type="submit" class="btn btn-xl">Ajouter l'ingredient</button>
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