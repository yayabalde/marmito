<?php $this->titre = "Connexion - Marmito"; $this->file_ariane = "Connexion"; ?>
    <section id="connexion">
		 <div class="container">
		 <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Formulaire de connexion </h2>
					</div>
            </div>
	  <?php if (isset($msgErreur)): ?>
			<div class='col-lg-6 col-lg-offset-3 alert alert-danger'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong><?php echo $msgErreur ?>.</strong> </div>
			<?php endif; ?>
      <?php if(!isset($_SESSION['uti_id'] )): ?>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Veuillez vous identifier</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="connexion" method="post" id="connexion" novalidate>
                            <fieldset>
                                <div class="form-group">
								<input id="id_login" placeholder="Votre identifiant ..." class="form-control" name="login" type="text" required data-validation-required-message="Veuillez entrer votre identifiant." >
                                <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
							      <input class="form-control" id="id_mdp" name="mdp" placeholder="votre mot de pass ..." data-validation-required-message="Veuillez entrer  votre mot de pass svp." type="password" />
                                  <p class="help-block text-danger"></p>
                                </div>
                                <div class="checkbox">
									<label>
                                            <input id="connexion_auto" name="connexion_auto" type="checkbox" value="Se souvenir de moi"> Se souvenir de moi
									</label>
                                </div>
								<div class="col-lg-12 text-center">
                                        <input class="btn btn-xl" name="submit" type="submit" value="Se connecter" />
                                        <input class="btn btn-xl" name="reset" type="reset" value="Annuler" />
									</div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<?php else: ?>
		<div class='col-lg-6 col-lg-offset-3 alert alert-danger'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong>Vous etes deja en ligne. Unitile de refaire cette action.</strong> </div>
		<?php endif; ?>
    </div>
    </section>
	
