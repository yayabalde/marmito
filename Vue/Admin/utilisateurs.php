<?php $this->titre = "Utilisateurs admin - Marmito" ; $this->file_ariane = 'Administration > utilisateurs'; ?>
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
                                    <h1 class="page-header">Gestion des utilisateurs</h1> </div>
                            </div>
                            <!-- debut contenu table-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"> Cet espace vous permet de gerer vos utilisateurs </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Prénom</th>
                                                        <th>Email</th>
                                                        <th>Téléphone</th>
                                                        <th>Role</th>
                                                        <th>Etat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($users as $user): ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $user['uti_nom'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $user['uti_prenom'] ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $user['uti_email'] ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo $user['uti_tel'] ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php echo $user['uti_role'] ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php if($user['uti_est_actif']){echo "actif";}else{echo "desactiver";} ?>
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