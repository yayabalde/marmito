<?php 
$this->titre = $this->nettoyer($plat['pla_titre']) . " - Marmito"; $this->file_ariane = ' Plats > '.$this->nettoyer($plat['pla_titre']); ?>
 <section id="plat">
   <div class="container">
   
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 text-center">
                    <p>
					<span class="btn btn-default"><a href="<?php echo RACINE_WEB; ?>plat"><i class="fa fa-reply"></i> Retour à la liste</a></span>
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
