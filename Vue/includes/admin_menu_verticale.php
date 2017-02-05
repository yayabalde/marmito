
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo RACINE_WEB; ?>admin"><i class="fa fa-dashboard fa-fw"></i> Administration generale</a>
                        </li>
                        <li>
                            <a href="<?php echo RACINE_WEB; ?>admin/commandes"><i class="fa fa-bar-chart-o fa-fw"></i> Commandes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo RACINE_WEB; ?>admin/commandes">Liste commandes</a>
                                </li>
								

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Plats<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo RACINE_WEB; ?>admin/plats">Liste des plats</a>
                                </li>
                                <li>
								<a id="ajouter_plat" href="<?php echo RACINE_WEB; ?>admin/plats/ajouter">Ajouter plat</a>
                                </li>
   
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo RACINE_WEB; ?>admin/ingredients"><i class="fa fa-files-o fa-fw"></i> Ingrédients<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo RACINE_WEB; ?>admin/ingredients">Liste ingrédients</a>
                                </li>
								<li>
								<a id="ajouter_ingredient" href="<?php echo RACINE_WEB; ?>admin/ingedients/ajouter">Ajouter ingrédient</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						 <li>
                            <a href="<?php echo RACINE_WEB; ?>admin/utilisateurs"><i class="fa fa-files-o fa-fw"></i> Utilisateurs<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo RACINE_WEB; ?>admin/utilisateurs">Liste utilisateurs</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>