<?php $this->titre = "Plats - Marmito";  $this->file_ariane = "Plats"; ?>
    <section id="plats" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Liste des plats disponbles</h2>
                    <h3 class="section-subheading text-muted">Vous pouvez commander en quelques clics.</h3>
                </div>
            </div>
            <div class="row">
			
   
        <?php foreach ($plats as $plat): ?>
             <div class="col-md-4 col-sm-6 plat-item">
                    <a href="<?php echo "#platModal" . $this->nettoyer($plat['pla_id']) ?>" class="plat-link" data-toggle="modal">
                        <div class="plat-hover">
                            <div class="plat-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-responsive" src="<?php echo CONTENU.'upload/' . "min_" . $this->nettoyer($plat['pla_img']) ?>" alt="<?php echo $this->nettoyer($plat['pla_img']) ?>">
                    </a>
                    <div class="plat-caption">
                        <h4><?php echo $this->nettoyer($plat['pla_titre']) ?></h4>
                        <p class="text-muted"><?php echo $this->nettoyer($plat['pla_prix']) ?> €<br/>
						<span class="plus"><a href="<?php echo RACINE_WEB; ?>plat/detaile/<?php echo $this->nettoyer($plat['pla_id']) ?>"><i class="fa fa-plus"></i> Détaile</a></span>
						<span class="commander"><a href="<?php echo RACINE_WEB; ?>plat/reserver/<?php echo $this->nettoyer($plat['pla_id']) ?>"><i class="fa fa-tasks"></i> Commander</a></span></p>
                    </div>
                </div>
				
				
						<div class="plats-modal modal fade" id="<?php echo "platModal" . $this->nettoyer($plat['pla_id']) ?>" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                
                   
                        <div class="modal-body">
							  
 <section id="plat">
   <div class="container">
   
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 text-center">
                    <p>
					<span data-dismiss="modal" class="btn btn-default"><a href=""><i class="fa fa-reply"></i> Retour à la liste</a></span>
					<span class="btn btn-default"><a href="<?php echo RACINE_WEB; ?>plat/reserver/<?php echo $this->nettoyer($plat['pla_id']) ?>"><i class="fa fa-plus"></i> Commander</a></span>
					</p>
                </div>
            </div>
            <div class="row">
	              <div class="col-lg-10 col-lg-offset-1 text-center">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="section-heading"><?php echo $this->nettoyer($plat['pla_titre']) ?></h2>
                        </div>
                        <div class="panel-body">
                            <img class="img-responsive" src="<?php echo CONTENU.'upload/'.$this->nettoyer($plat['pla_img']) ?>" alt="<?php echo $this->nettoyer($plat['pla_img']) ?>">
                        </div>
                        <div class="panel-footer">
                           <h3 class="text-center"><?php echo $this->nettoyer($plat['pla_prix']) ?> €</h3>
						   <p class="text-center"><?php echo $this->nettoyer($plat['pla_descr']) ?></p>
                        </div>
					</div>
				  </div>
            </div> 
</div>
 </section>




</div>
                    
              
            </div>
        </div>
    </div>
				
	
            <?php endforeach; ?>
  
            </div>
</div>
  </div>
		
 </section>
 