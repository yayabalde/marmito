<?php require_once 'Modele/Commande.php'; $this->titre = " Reservation - Marmito"; $this->file_ariane = ' Plats > Reservation'; ?>
   <section id="reservation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Reservation</h2>
				<h3 class="section-subheading text-muted">Vous avez choisi <strong class="plat-res"><?php echo " ".$pla_nom; ?></strong></h3>
					<h3 class="section-subheading text-muted">Veuillez choisir la date du RDV.</h3>
				</div>
                 </div>
        </div>
		
        <div class="row">
            <?php

// Préparation
	$cmd = new Commande();
	$dates_rdv = $cmd->getDateRdvCommande();
	
	$tab_mois = array ('','janvier','février','mars','avril','mai','juin','juillet','août','septembre','octobre','novembre','décembre');
	$tab_jour = array ('','Lu','Ma','Me','Je','Ve','Sa','Di');

// Détermination de la date actuelle
	$actu_jour = date('j');
	$actu_mois = date('n');
	$actu_annee = date('Y');

// Boucle sur 3 mois
	for ($i=0;$i<3;$i++) {
		// Calcul de la date
		$mois = $actu_mois + $i;
		$annee = $actu_annee;
		if ($mois>12) {
			$mois-=12;
			$annee = $actu_annee+1;
		}
		echo "<div class='col-lg-4'><div class='box_mois'>\n";
		// Titre du mois
		echo "<h3>".$tab_mois[$mois]." ".$annee."</h3>\n";
		// Affichage du nom des jours
		for ($j=1;$j<=7;$j++) {
			echo "<div class='box_jour'>".$tab_jour[$j]."</div>\n";
		}
        
		// Debug
		$prem_jour = date('w',mktime(0,0,0,$mois,1,$annee));
		$nbr_jour = date('t',mktime(0,0,0,$mois,1,$annee));
		// ATTENTION : 0 -> dimanche
		if ($prem_jour==0) {$prem_jour=7;}
		
		// Affichage décalage
		for ($l=1;$l<$prem_jour;$l++) {
			echo "<div class='box_jour'></div>\n";
		}
		
		// Affichage des jours
		for ($k=1;$k<=$nbr_jour;$k++) {
			// On vérifie qu'on ne soit pas dans le passé
			$d = $annee.$mois.$k;
			if((($k<=$actu_jour) && ($mois==$actu_mois)) || in_array($d, $dates_rdv) ) {
				echo "<div class='box_jour ko'>".$k."</div>\n";
			} else {
				echo "<div class='box_jour ok' id='".$annee.$mois.$k."'>".$k."</div>\n";
			}
		}
        
		echo "</div></div>\n";
	}     
?>
                <div class="col-lg-4 col-lg-offset-4">
                    <form method="post" action="<?php echo RACINE_WEB; ?>plat/reservation" id="form_res">
						<label>Veuillez entrer le nombre de plats:</label><input id='qte' type='number' name='qte' value='1' min="1" max="5"> 
                        <input id='date_rdv' type='hidden' name='date_rdv' value='20161005'>
                        <br/>
						<span class="btn btn-default"><a href="<?php echo RACINE_WEB; ?>plat"><i class="fa fa-twitter fa-reply"> Retour à la liste</a></span>
						<input id="valider_rdv" class="btn btn-xl" name="valider_rdv" type="submit" value='COMMANDER' />
					</form>
                </div>
        </div>
    </div>
</section>
