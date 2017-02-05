
	<?php if(isset($msg_succes)): ?>
	
<div class='col-lg-6 col-lg-offset-3 alert alert-success'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> 
	<strong><?php echo $msg_succes; ?></strong> 
</div>
	
	<?php else: ?>
	
<div class='col-lg-6 col-lg-offset-3 alert alert-danger'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
	<strong><?php echo $msg_erreur; ?></strong> 
</div>

	<?php endif; ?>
