<?php $this->titre = "Ingrédients admin - Marmito" ; $this->file_ariane = 'Administration > ingrédients'; ?>
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
                                        <div class="panel-heading"> Cet espace vous permet de gerer vos ingrédients </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>Titre</th>
                                                        <th>Description</th>
                                                        <th>Prix</th>
                                                        <th>Etat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($plats as $plat): ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $plat['pla_titre'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $plat['pla_descr'] ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo $plat['pla_prix'] ?> € </td>
                                                            <td class="text-center">
                                                                <?php if($plat['pla_est_dispo']){echo "disponible";}else{echo "indisponible";} ?>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <!-- /.table-responsive -->
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