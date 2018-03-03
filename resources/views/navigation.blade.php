    <section class="navigation">
    	<div class="container">
    		<!-- Static navbar -->
    		<nav class="navbar navbar-default yamm">
    			<div class="navbar-header">
    				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"> 
    					<span class="sr-only">Toggle navigation</span> 
    					<span class="icon-bar"></span> 
    					<span class="icon-bar"></span> 
    					<span class="icon-bar"></span> 
    				</button>
    			</div>
    			<div id="navbar" class="navbar-collapse collapse">
    				<ul class="nav navbar-nav">
    					<li class="active"><a href="index"><i class="fa fa-home"></i></a></li>
    					<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Pages <span class="caret"></span></a>
    						<ul class="dropdown-menu">
    							<li><a href="#">Categories</a></li>
    							<li><a href="#">Executeurs</a></li>
    							<li><a href="#">Phases</a></li>
    							<li><a href="#">Responsables</a></li>
    						</ul>
    					</li>
    					<li class="dropdown  yamm-fw"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">Projets <span class="caret"></span></a>
    						<ul class="dropdown-menu">
    							<li>
    								<div class="yamm-content">
    									<div class="r">
                                            <?php $Projet = DB::table('projet')->orderBy('id','desc')->limit(4)->get(); 
                                            foreach($Projet as $projet) { ?>
                                            <div class="col-sm-3"> 
                                             <div class="column-post">
                                                <a href="detail_projet<?php echo $projet->id?>" class="img-thumbnail"> <img src="img/couverture/{{$projet->avatar}}" alt="" class="img-responsive"> </a>
                                                <div class="topic"> 
                                                   <?php $Categorie = DB::table('categorie')->where('id', $projet->categorie_id)->get(); 
                                                   foreach($Categorie as $categorie) { ?>
                                                   <a href="detail_categorie<?php echo $categorie->id?>" class="tag bg4">{{$categorie->resume_titre}}</a>
                                                   <?php } ?>
                                                   <h4><a href="detail_projet<?php echo $projet->id?>">{{$projet->full_titre}}</a></h4>
                                                   <p align="justify"><?php echo str_limit($projet->contenu, 70); ?> </p>
                                                   <ul class="post-tools">
                                                    <?php $Responsable = DB::table('responsable')->where('id', $projet->responsable_id)->get(); 
                                                    foreach($Responsable as $responsable) { ?>
                                                    <li> Par <a href="detail_responsable<?php echo $responsable->id?>"><strong> {{$responsable->libelle}}</strong> </a></li>
                                                    <?php } ?>
                                                    <?php $intl_date_formatter = new IntlDateFormatter('frc',
                                                        IntlDateFormatter::LONG,
                                                        IntlDateFormatter::NONE);?>
                                                        <li>  Depuis le {{$intl_date_formatter->format(new DateTime($projet->created_at))}} </li>
                                                        <li><a href=""> <i class="ti-thought"></i> {{$projet->vue}} vues</a> </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li><a href="planning">Planning</a></li>
                    <li><a href="contribuer">Contribuer</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                   <li>
                      <form class="nav-search">
                         <input type="text" class="form-control" placeholder="Rechercher">
                         <button type="submit" class="btn-submit"><i class="fa fa-search"></i></button>
                     </form>
                 </li>
             </ul>
         </div>
         <!--/.nav-collapse -->
     </nav>
 </div>
</section>