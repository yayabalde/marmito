<section id="activation"></section>
<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Activation de votre compte</h2> </div>
            <?php if(isset($msg_succes)): ?>
                <div class='col-lg-6 col-lg-offset-3 alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong><?php echo $msg_succes; ?></strong> </div>
                <?php else: ?>
                    <div class='col-lg-6 col-lg-offset-3 alert alert-danger'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button> <strong><?php echo $msg_erreur; ?></strong> </div>
                    <?php endif; ?>
        </div>
    </div>