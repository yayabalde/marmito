<?php $this->titre = "Accuiel - Marmito"; ?>
    <section id="accueil">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            <li data-target="#myCarousel" data-slide-to="4"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active"> <img src="<?php echo CONTENU; ?>upload/photo_1.jpg" alt="photo_1"> </div>
                            <div class="item"> <img src="<?php echo CONTENU; ?>upload/photo_2.jpg" alt="photo_2"> </div>
                            <div class="item"> <img src="<?php echo CONTENU; ?>upload/photo_3.jpg" alt="photo_3"> </div>
                            <div class="item"> <img src="<?php echo CONTENU; ?>upload/photo_4.jpg" alt="photo_4"> </div>
                            <div class="item"> <img src="<?php echo CONTENU; ?>upload/photo_5.jpg" alt="photo_5"> </div>
                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>