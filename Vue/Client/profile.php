<section id="profile">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Profile Client</h2>
				</div>
        </div>
		
		<?php if(isset($succes)): ?>
		 <div class="row">
                <div class='col-lg-6 col-lg-offset-3 alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong><?php echo $succes; ?></strong> 
				</div>
        </div>
		<?php endif; ?>
		
		<?php if(isset($erreur)): ?>
		 <div class="row">
                <div class='col-lg-6 col-lg-offset-3 alert alert-danger'>
                   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong><?php echo $erreur; ?></strong>
				</div>
        </div>
		<?php endif; ?>
		
		
		            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                             <h3 class="section-subheading text-muted">Cet espace vous permet de gerer vos informations personnelles</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#mes_infospersonnelles" data-toggle="tab">Mes infos personnelles</a>
                                </li>
                                <li><a href="#mon_adresse" data-toggle="tab">Mon Adresse</a>
                                </li>
                                <li><a href="#mon_motpass" data-toggle="tab">Modifier mon mot de pass</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                  <div class="tab-pane fade in active" id="mes_infospersonnelles">
				<div class="col-lg-8 col-lg-offset-2 bloc_profile">
				<div id="success"></div>
                <form id="info_user" method="post" action="<?php echo RACINE_WEB; ?>client/profile/modifierinfos" novalidate>
                    <fieldset>
                        <legend>Informations personnelles</legend>
                        <div class="form-group">
                            <label for="uti_nom">Votre nom : *</label>
                            <input disabled value="<?php echo $client['uti_nom']; ?>" type="text" class="form-control" placeholder="Votre Nom ..." name="uti_nom" id="uti_nom" required data-validation-required-message="Veuillez entrer votre Nom svp.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="uti_prenom">Votre prénom : *</label>
                            <input disabled value="<?php echo $client['uti_prenom']; ?>" type="text" class="form-control" placeholder="Votre Prénom ..." name="uti_prenom" id="uti_prenom" required data-validation-required-message="Veuillez entrer votre Prénom svp.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="uti_email">Votre Email : *</label>
                            <input value="<?php echo $client['uti_email']; ?>" type="email" class="form-control" placeholder="Votre Email ..." name="uti_email" id="uti_email" required data-validation-required-message="Veuillez entrer votre Email svp.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="uti_tel">Votre téléphone :</label>
                            <input value="<?php echo $client['uti_tel']; ?>" id="uti_tel" name="uti_tel" type="text" placeholder="Votre numéro de téléphone ..." class="form-control" data-validation-required-message="Veuillez entrer votre téléphone svp." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </fieldset>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
						<button id="btn_modif_info" class="btn btn-success" name="submit" type="submit"> <i class="fa fa-edit"></i> Modifier mes informations</button>
					</div>
                </form>
								
			</div>			
              </div>
						   
						   
          <div class="tab-pane fade" id="mon_adresse">					
			<div class="col-lg-8 col-lg-offset-2 bloc_profile">
                <form id="adress_user" method="post" action="<?php echo RACINE_WEB; ?>client/profile/modifieradress">
                    <fieldset>
                        <legend>Votre adresse personnelle</legend>
                        <div class="form-group">
                            <label for="uti_num_rue">Numéro de rue :</label>
                            <input value="<?php echo $client['uti_num_rue']; ?>" id="uti_num_rue" name="uti_num_rue" type="text" class="form-control" data-validation-required-message="Veuillez entrer le numéro de rue svp." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="uti__rue">Nom de la Rue :</label>
                            <input value="<?php echo $client['uti_rue']; ?>" id="uti_rue" name="uti_rue" type="text" class="form-control" data-validation-required-message="Veuillez entrer le nom de la rue svp." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="uti_cp">Code postal :</label>
                            <input value="<?php echo $client['uti_cp']; ?>" id="uti_cp" name="uti_cp" type="text" class="form-control" data-validation-required-message="Veuillez entrer le code postal svp." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="uti__ville">Ville :</label>
                            <input value="<?php echo $client['uti_ville']; ?>" id="uti__ville" name="uti_ville" type="text" class="form-control" data-validation-required-message="Veuillez entrer le nom de la ville svp." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </fieldset>
                    <div class="clearfix"></div>
						<div class="col-lg-12 text-center">
						<button id="btn_modif_adress" class="btn btn-success" name="btn_modif_adress" type="submit"> <i class="fa fa-edit"></i> Modifier mon adresse</button>
					</div>
						
                </form>
            </div>
											
               </div>
								  
								  
								  
          <div class="tab-pane fade" id="mon_motpass">
			<div class="col-lg-8 col-lg-offset-2 bloc_profile">
                <form method="post" action="<?php echo RACINE_WEB; ?>client/profile/modifiermdp">
                    <fieldset>
                        <legend>Modification du mot de pass</legend>
                        <div class="form-group">
                            <label for="encien_mdp">Encien mot de pass :</label>
                            <input id="encien_mdp" name="encien_mdp" type="password" class="form-control" data-validation-required-message="Veuillez entrer votre mot de passe svp." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="nouveau_mdp">Nouveau mot de pass :</label>
                            <input id="nouveau_mdp" name="nouveau_mdp" type="password" class="form-control" data-validation-required-message="Veuillez confirmer votre mot de passe svp." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <label for="mdp_verif">Retapper le mot de passe :</label>
                            <input id="mdp_verif" name="mdp_verif" type="password" class="form-control" data-validation-required-message="Veuillez confirmer votre mot de passe svp." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </fieldset>
                    <div class="clearfix"></div>
					<div class="col-lg-12 text-center">
						<button id="btn_modif_mdp" class="btn btn-success" name="btn_modif_mdp" type="submit"> <i class="fa fa-edit"></i> Modifier mon mot de pass</button>
					</div>
                </form>
            </div>
			</div>
                                
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

            </div>
		
		

    </div>
</section>