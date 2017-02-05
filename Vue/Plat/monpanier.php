<?php 
$this->titre = "Mon panier - Marmito"; $this->file_ariane = ' plats > Mon panier'; ?>
    <section id="monpanier" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Detaile de votre panier</h2>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">

                    <?php if(isset($plats)&&!empty($plats)): ?>
                        <table class="table table-striped">
                            <thead>
                                <th>Intitulé du plat</th>
                                <th>Prix Unitaire</th>
                                <th>Quantité</th>
                                <th>Prix total</th>
                                <th>Date de rdv</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php foreach($plats as $cle => $plat): ?>
                                    <tr>
                                        <td>
                                            <?php echo $plat['pla_titre']; ?>
                                        </td>
                                        <td>
                                            <?php echo $plat['pla_prix']; ?> €
                                        </td>
                                        <td>
                                            <?php echo $plat['pla_qte']; ?>
                                        </td>
                                        <td>
                                            <?php echo $plat['pla_qte']*$plat['pla_prix']; ?>  €
                                        </td>
                                        <td>
                                            <?php $date=date_create($cle); echo date_format($date,"d-m-Y") ; ?>
                                        </td>
                                        <td><a class="btn btn-danger" href="<?php echo RACINE_WEB; ?>plat/annulerplat/<?php echo $cle; ?>"><i class="fa fa-trash-o"></i> supprimer</a></td </tr>
                                        <?php endforeach; ?>
                                            <tr>
                                                <td colspan="4">Prix total commande</td>
                                                <td>
                                                    <?php echo $_SESSION['total_prix']; ?> €
                                                </td>
                                                <td><a class="btn btn-danger" href="<?php echo RACINE_WEB; ?>plat/viderpanier"><i class="fa fa-trash-o"></i> vider panier</a></td>
                                            </tr>
                            </tbody>
                        </table>

                    <div class='col-lg-8 col-lg-offset-2'>
                        <p>
            <button type="button" class="btn btn-default"><a href="<?php echo RACINE_WEB; ?>plat"><i class="fa fa-plus"></i> ajouter un autre rdv</a></button><button type="button" class="btn btn-default"><a href="<?php echo RACINE_WEB; ?>client/validercommande"><i class="fa fa-check"></i> valider ma commande</a></button>
                             
                        </p>
                    </div>
                        <?php else: ?>
                            <h3>Votre panier est vide!</h3>
                            <div class='col-lg-6 col-lg-offset-3'>
                                <p>
                                    <button type="button" class="btn btn-default"><a href="<?php echo RACINE_WEB; ?>plat">Commander</a></button>
                                </p>
                            </div>

                            <?php endif; ?>

                </div>
            </div>
        </div>
    </section>