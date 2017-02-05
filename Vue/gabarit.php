<!doctype html>
<html lang="fr">
<?php require_once 'Config/config.php'; ?>

    <head>
        <meta charset="UTF-8" />
        <base href="<?= $racineWeb ?>">
        <meta name="description" content="Marmito site de reservation de plats en ligne" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="<?php echo CONTENU; ?>bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo CONTENU; ?>font-awesome/css/font-awesome.min.css" />
        <!-- Custom Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo CONTENU; ?>css/calendrier1.css">
        <link rel="stylesheet" href="<?php echo CONTENU; ?>css/base1.css" />
        <link rel="stylesheet" href="<?php echo CONTENU; ?>css/style1.css" />
        <link rel="stylesheet" href="<?php echo CONTENU; ?>css/agency.css" />
        <!-- Custom CSS -->
        <link href="<?php echo CONTENU; ?>css/sb-admin-2.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="<?php echo CONTENU; ?>css/metisMenu.min.css" rel="stylesheet">
        <!-- DataTables CSS -->
        <link href="<?php echo CONTENU; ?>css/dataTables.bootstrap.css" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="<?php echo CONTENU; ?>css/dataTables.responsive.css" rel="stylesheet">
        <title>
            <?php echo $titre ?>
        </title>
        <!--[if lt IE 9]>
 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js">
 </script>
 <![endif]-->
    </head>

    <body id="page-top" class="index">
        <?php require_once 'includes/menu.php'; ?>
            <section id="file-ariane">
                <div class="container">
                    <p>Vous êtes ici: Accueil >
                        <?php echo $file_ariane; ?>
                    </p>
                </div>
            </section>
            <!--Debut contenu dynamique-->
            <?php echo $contenu ?>
                <!--Fin contenu dynamique-->
                <footer id="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4"> <span class="copyright">Copyright &copy; Marmito 2016</span> </div>
                            <div class="col-md-4">
                                <ul class="list-inline social-buttons">
                                    <li><a href="#"><i class="fa fa-twitter"></i></a> </li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a> </li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a> </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-inline quicklinks">
                                    <li>Site réalisé par <a href="#"> Yaya BALDE</a> </li>
                                    <li><a href="#">Mentions légales</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
                <script src="<?php echo CONTENU; ?>js/scripts.js"></script>
                <script src="<?php echo CONTENU; ?>js/jquery-1.11.2.min.js"></script>
                <script src="http://code.jquery.com/jquery.min.js"></script>
                <script src="<?php echo CONTENU; ?>bootstrap/js/bootstrap.min.js"></script>
                <!-- Plugin JavaScript -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
                <!-- Contact Form JavaScript -->
                <script src="<?php echo CONTENU; ?>js/jqBootstrapValidation.js"></script>
                <script src="<?php echo AJAX; ?>js/ajaxgen.js"></script>
                <script src="<?php echo AJAX; ?>js/contact.js"></script>
                <script src="<?php echo AJAX; ?>js/inscription_validation.js"></script>
                <script src="<?php echo AJAX; ?>js/connexion_validation.js"></script>
                <script src="<?php echo AJAX; ?>js/modif_info_user.js"></script>
                <script src="<?php echo AJAX; ?>js/ajouter_ingredient.js"></script>
                <script src="<?php echo AJAX; ?>js/ajouter_plat.js"></script>
                <script src="<?php echo AJAX; ?>js/ingredients.js"></script>
                <script src="<?php echo AJAX; ?>js/ajax_jquery_upload.js"></script>
                <!-- Theme JavaScript -->
                <script src="<?php echo CONTENU; ?>js/agency.min.js"></script>
                <!-- Custom Theme JavaScript -->
                <script src="<?php echo CONTENU; ?>js/sb-admin-2.js"></script>
                <!-- Metis Menu Plugin JavaScript -->
                <script src="<?php echo CONTENU; ?>js/metisMenu.min.js"></script>
                <script src="<?php echo CONTENU; ?>js/jquery.dataTables.min.js"></script>
                <script src="<?php echo CONTENU; ?>js/dataTables.bootstrap.min.js"></script>
                <script src="<?php echo CONTENU; ?>js/dataTables.responsive.js"></script>
                <script>
                    $(document).ready(function () {
                        $('.box_jour.ok').click(function () {
                            // Graphique
                            $('.box_jour.ok').removeClass('actif');
                            $(this).addClass('actif');
                            // Fonctionnel
                            id = $(this).attr('id');
                            $('#date_rdv').val(id);
                        });
                        // Gestion du SUBMIT
                        $('#valider_rdv').click(function () {
                            if ($('#date_rdv').val() == '') {
                                alert('Vous devez choisir une date !');
                            }
                            else {
                                $('#form_res').submit();
                            }
                        });
                    });
                </script>
                <!-- Page-Level Demo Scripts - Tables - Use for reference -->
                <script>
                    $(document).ready(function () {
                        $('#dataTables-example').DataTable({
                            responsive: true
                        });
                    });
                </script>
    </body>

</html>