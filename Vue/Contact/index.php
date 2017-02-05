<?php $this->titre = "Contact - Marmito";  $this->file_ariane = "Contact"; ?>
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Formulaire de contact</h2>
                <h3 class="section-subheading text-muted">Veuillez remplir le formulaire. Tous les champs sont obligatoires.</h3> </div>
        </div>
        <?php if(isset($msg)){
                      echo '<p class="msg">'. $msg . '</p>';
                       }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contact" novalidate>
                        <div class="row">
                           <div class="col-md-12">
							<div class="form-group">
								<label for="civilite">Civilité *</label>
								<select name="civilite" id="civilite">
								<option value="f" selected="selected">Mme</option>
								<option value="f">Mlle</option>
								<option value="h">Mr</option>
								</select>
                                 <p class="help-block text-danger"></p>
                            </div>
					</div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nom">Votre nom : *</label>
                                    <input type="text" class="form-control" placeholder="Votre Nom ..." name="nom" id="nom" required data-validation-required-message="Veuillez entrer votre Nom svp.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Votre Email : *</label>
                                    <input type="email" class="form-control" placeholder="Votre Email ..." name="email" id="email" required data-validation-required-message="Veuillez entrer votre Email svp.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label for="sujet">Sujet du contact : *</label>
                                    <input type="text" class="form-control" placeholder="Votre sujet ..." name="sujet" id="sujet" required data-validation-required-message="Veuillez preciser le sujet de votre message svp.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="message">Votre Message *</label>
                                    <textarea class="form-control" placeholder="Votre message ..." id="message" required data-validation-required-message="Veuillez entrer votre message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Envoyer le Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
</section>