<section id="commandes">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Mes commandes</h2>
        </div>
		 </div>
		
		
 <!-- /.row -->
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                             <h3 class="section-subheading text-muted">Cet espace vous permet de suivre vos commandes</h3>
                        </div>
						<div id="success"></div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#mes_commandes_en_cours" data-toggle="tab">Mes commandes en cours</a>
                                </li>
                                <li><a href="#mes_commandes_finies" data-toggle="tab">Mes commandes finies</a>
                                </li>
								<li><a href="#mes_commandes_annulees" data-toggle="tab">Mes commandes annulées</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
							
							
                  <div class="tab-pane fade in active" id="mes_commandes_en_cours">
				
				
				
				
				
				

					<?php foreach($com_encours as $c => $cmd): ?>	


					<div class="panel panel-default">
                        <div class="panel-heading">
                           <h3> Commande du 22/01/2016</h3>
                        </div>
                        <div class="panel-body">
						
						
						
					
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
                                <?php $total=0; foreach($cmd as $plat): ?>
                                    <tr>
                                        <td>
                                            <?php echo $plat['pla_titre']; ?>
                                        </td>
                                        <td>
                                            <?php echo $plat['pla_prix']; ?> €
                                        </td>
                                        <td>
                                            <?php echo $plat['detc_qte']; ?>
                                        </td>
                                        <td>
                                            <?php $total += $plat['detc_qte']*$plat['pla_prix']; echo $plat['detc_qte']*$plat['pla_prix']; ?>  €
                                        </td>
                                        <td>
                                            <?php $date=date_create($plat['detc_date_rdv']); echo date_format($date,"d-m-Y") ; ?>
                                        </td>
                                        <td><a class="btn btn-danger" href="<?php echo RACINE_WEB; ?>client/annulerplat/<?php echo $cle; ?>"><i class="fa fa-trash-o"></i> Annuler plat</a></td> 
										</tr>
                                        <?php endforeach; ?>
                                            <tr>
                                                <td colspan="4">Prix total commande</td>
                                                <td>
                                                    <?php echo $total; ?> €
                                                </td>
                                                <td><a class="btn btn-danger" href="<?php echo RACINE_WEB; ?>client/annulercommande/"><i class="fa fa-trash-o"></i> Annuler tout</a></td>
                                            </tr>
                            </tbody>
                        </table>						
						
						
						
						
                           
                        
						
						
						</div>
                    </div>
					
					<?php endforeach; ?>	
						
              </div>
			  
			  
			  
			  

			  
						   			   
          <div class="tab-pane fade" id="mes_commandes_finies">	
 <div class='row'>
		  <div class="col-lg-10 col-lg-offset-1">

					<?php foreach($com_fini as $c => $cmd): ?>	


<div class="panel panel-default">
                        <div class="panel-heading">
                            <h3> Commande du 22/01/2016</h3>
                        </div>
                        <div class="panel-body">
                           
						   <table class="table table-striped">
                            <thead>
                                <th>Intitulé du plat</th>
                                <th>Prix Unitaire</th>
                                <th>Quantité</th>
                                <th>Prix total</th>
                                <th>Date de rdv</th>
             
                            </thead>
                            <tbody>
                                <?php $total=0; foreach($cmd as $plat): ?>
                                    <tr>
                                        <td>
                                            <?php echo $plat['pla_titre']; ?>
                                        </td>
                                        <td>
                                            <?php echo $plat['pla_prix']; ?> €
                                        </td>
                                        <td>
                                            <?php echo $plat['detc_qte']; ?>
                                        </td>
                                        <td>
                                            <?php $total += $plat['detc_qte']*$plat['pla_prix']; echo $plat['detc_qte']*$plat['pla_prix']; ?>  €
                                        </td>
                                        <td>
                                            <?php $date=date_create($plat['detc_date_rdv']); echo date_format($date,"d-m-Y") ; ?>
                                        </td>
                                        </tr>
                                        <?php endforeach; ?>
                                            <tr>
                                                <td colspan="4">Prix total commande</td>
                                                <td>
                                                    <?php echo $total; ?> €
                                                </td>
                 
                                            </tr>
                            </tbody>
                        </table>						
						   
						   
						   
                        </div>
                        
                    </div>


					
						
					<?php endforeach; ?>			  
				
 </div>
 </div>
				
          </div>
		  
		  
		  
								  				  
          <div class="tab-pane fade" id="mes_commandes_annulees">
		  <div class='row'>
		  <div class="col-lg-10 col-lg-offset-1">
		  
					<?php foreach($com_an as $c => $cmd): ?>	

<div class="panel panel-default">
                        <div class="panel-heading">
                            <h3> Commande du 22/01/2016</h3>
                        </div>
                        <div class="panel-body">
                           
						   <table class="table table-striped">
                            <thead>
                                <th>Intitulé du plat</th>
                                <th>Prix Unitaire</th>
                                <th>Quantité</th>
                                <th>Prix total</th>
                                <th>Date de rdv</th>
                               
                            </thead>
                            <tbody>
                                <?php $total=0; foreach($cmd as $plat): ?>
                                    <tr>
                                        <td>
                                            <?php echo $plat['pla_titre']; ?>
                                        </td>
                                        <td>
                                            <?php echo $plat['pla_prix']; ?> €
                                        </td>
                                        <td>
                                            <?php echo $plat['detc_qte']; ?>
                                        </td>
                                        <td>
                                            <?php $total += $plat['detc_qte']*$plat['pla_prix']; echo $plat['detc_qte']*$plat['pla_prix']; ?>  €
                                        </td>
                                        <td>
                                            <?php $date=date_create($plat['detc_date_rdv']); echo date_format($date,"d-m-Y") ; ?>
                                        </td>
                                        </tr>
                                        <?php endforeach; ?>
                                            <tr>
                                                <td colspan="4">Prix total commande</td>
                                                <td>
                                                    <?php echo $total; ?> €
                                                </td>
                                     
                                            </tr>
                            </tbody>
                        </table>						
						   
						   
						   
                        </div>
                        
                    </div>

					
						
					<?php endforeach; ?>	
			
			
			</div>
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
    <!-- container -->
</section>