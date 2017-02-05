<section id="reservation">
    <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
                
	<?php if(isset($msg_erreur)&& !empty($msg_erreur)): ?>
	<h2 class="section-heading">Erreur date de reservation</h2>
		<div class='col-lg-6 col-lg-offset-3 alert alert-danger'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> 
		<strong><?php echo $msg_erreur; ?></strong>
		</div>	 
	<?php else: ?>	
<h2 class="section-heading">Confirmation de reservation</h2>	
<div class='col-lg-6 col-lg-offset-3 alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> 
	<strong>Votre reservation a bien été ajouter dans le panier. Veuillez ajouter d'autres reservations ou valider votre commande.</strong> 
	
</div>

<?php endif; ?>
<div class='col-lg-6 col-lg-offset-3'>
     <p>
	<button type="button" class="btn btn-default"><a href="<?php echo RACINE_WEB; ?>plat/monpanier">Voir panier</a></button> 
	<button type="button" class="btn btn-default"><a href="<?php echo RACINE_WEB; ?>plat">Ajouter un autre rdv</a></button>  
	<button type="button" class="btn-success"><a href="<?php echo RACINE_WEB; ?>client/validercommande">Valider ma commande</a></button>  
	 </p>
</div>

		
		</div>
      </div>
   </div>
        


    </div>
</section>
