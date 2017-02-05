<?php 
$this->titre = "Inscription - Marmito"; $this->file_ariane = "Inscription"; ?>
<section id="inscription">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Formulaire d'inscription</h2>
                 </div>
        </div>
        <?php

if (!empty($erreurs_inscription)) {

	echo "<div class='col-lg-6 col-lg-offset-3 alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <ul>"."\n";
	
	foreach($erreurs_inscription as $c => $e) {
	
		echo '	<li>'.$e.'</li>'."\n";
	}
	
	echo '</ul></div>';
    
}

if(isset($succes_inscription)) {
    echo "<div class='col-lg-6 col-lg-offset-3 alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"."\n";
    echo $succes_inscription;
    
    echo '</div>';
}else{ ?>
            <!-- formulaire d'inscription -->
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
				
				<div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Tous les champs suivi de * sont obligatoires</h3>
                    </div>
                    <div class="panel-body">
				
				
				
				
				
                    <form method="post" action="inscription" id="inscription" novalidate>
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="form-group">
                                    <label for="nom">Votre nom : *</label>
                                    <input type="text" class="form-control" placeholder="Votre Nom ..." name="nom" id="nom" required data-validation-required-message="Veuillez entrer votre Nom svp.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Votre prénom : *</label>
                                    <input type="text" class="form-control" placeholder="Votre Prénom ..." name="prenom" id="prenom" required data-validation-required-message="Veuillez entrer votre Prénom svp.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input id="id_genre_1" name="genre" type="radio" value="f" />
                                    <label for="id_genre_1">Mme</label>
                                    <input id="id_genre_2" name="genre" type="radio" value="f" />
                                    <label for="id_genre_2">Mlle</label>
                                    <input id="id_genre_3" name="genre" type="radio" value="h" />
                                    <label for="id_genre_3">Mr</label>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Votre Email : *</label>
                                    <input type="email" class="form-control" placeholder="Votre Email ..." name="email" id="email" required data-validation-required-message="Veuillez entrer votre Email svp.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="id_mdp">Votre mot de passe :</label>
                                    <input id="id_mdp" name="mdp" type="password" class="form-control" data-validation-required-message="Veuillez entrer votre mot de passe svp." />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="id_mdp_verif">Retapper le mot de passe :</label>
                                    <input id="id_mdp_verif" name="mdp_verif" type="password" class="form-control" data-validation-required-message="Veuillez confirmer votre mot de passe svp." />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="id_tel">Votre téléphone :</label>
                                    <input id="id_tel" name="tel" type="text" placeholder="Votre numéro de téléphone ..." class="form-control" data-validation-required-message="Veuillez entrer votre téléphone svp." />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="id_num">Numéro de rue :</label>
                                    <input id="id_num" name="num" type="text" class="form-control" data-validation-required-message="Veuillez entrer le numéro de rue svp." />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="id_rue">Nom de la Rue :</label>
                                    <input id="id_rue" name="rue" type="text" class="form-control" data-validation-required-message="Veuillez entrer le nom de la rue svp." />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="id_cp">Code postal :</label>
                                    <input id="id_cp" name="cp" type="text" class="form-control" data-validation-required-message="Veuillez entrer le code postal svp." />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="id_ville">Ville :</label>
                                    <input id="id_ville" name="ville" type="text" class="form-control" data-validation-required-message="Veuillez entrer le nom de la ville svp." />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <input class="btn btn-xl" name="submit" type="submit" value="S'inscrire" />
                                    <input class="btn btn-xl" name="submit" type="submit" value="Annuler" /> </div>
                            </div>
                        </div>
                    </form>
					</div>
					</div>
                </div>
            </div>
            <?php } ?>
    </div>
    <!-- container -->
</section>