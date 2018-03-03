 <div class="footer">
 	<div class="container">
 		<div class="row">
 			<div class="col-md-3 col-sm-6">
 				<h3>A propos de nous</h3>
 				<p align="justify"> Plateforme de publication des projets informatiques, OuagaSquare se veut etre innovante. </p>
 				<ul class="social-footer list-inline">
 					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
 					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
 					<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
 					<li><a href="#"><i class="fa fa-instagram"></i></a></li>
 					<li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
 				</ul>
 			</div>
 			<div class="col-md-3 col-sm-6">
 				<h3>Commentaires</h3>
 				<ul class="list-unstyled twitter-feeds">
 					<?php $Commentaire = DB::table('commentaire')->orderBy('id','desc')->limit(2)->get(); 
 					foreach($Commentaire as $commentaire) { ?>
 					<li> <p align="justify"><?php echo str_limit($commentaire->contenu, 50); ?>, <a href="#">@<?php echo $commentaire->nom; ?></a> .
 						<?php $intl_date_formatter = new IntlDateFormatter('frc',
 							IntlDateFormatter::LONG,
 							IntlDateFormatter::NONE);?>
 						</p> <em>Depuis le {{$intl_date_formatter->format(new DateTime($commentaire->created_at))}}</em> </li>
 						<?php } ?>
 					</ul>
 				</div>
 				<div class="col-md-3 col-sm-6">
 					<h3>Recents projets</h3>
 					<?php $Projet = DB::table('projet')->orderBy('id','desc')->limit(2)->get(); 
 					foreach($Projet as $projet) { ?>
 					<div class="media">
 						<div class="media-left">
 							<a href="detail_projet<?php echo $projet->id?>" class="img-thumbnail"> <img src="img/couverture/{{$projet->avatar}}" alt="" class="media-object"  width="80"> </a>
 						</div>
 						<div class="media-body"> 
 							<?php $Categorie = DB::table('categorie')->where('id', $projet->categorie_id)->get(); 
 							foreach($Categorie as $categorie) { ?>
 							<a href="detail_categorie<?php echo $categorie->id?>" class="tag bg1">{{$categorie->resume_titre}}</a>
 							<?php } ?>
 							<h4 class="media-heading"><a href="detail_projet<?php echo $projet->id?>">{{$projet->full_titre}}</a></h4> 
 						</div>
 					</div>
 					<?php }?>
 				</div>
 				<div class="col-md-3 col-sm-6">
 					<h3>Projets populaires</h3>
 					<div class="tag-list">
 						<?php $Projet = DB::table('projet')->orderBy('id','desc')->limit(20)->get(); 
 						foreach($Projet as $projet) { ?>
 						<a href="detail_projet<?php echo $projet->id?>">{{$projet->resume_titre}}</a> 
 						<?php }?>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 	<div class="footer-copyright"> 
 		<div class="container">
 			<span>&copy; Copyright © 2017. Yanfoma En collaboration avec <a href="http://www.anptic.gov.bf/" target="_bank">ANPTIC</a> .All Rights Reserved</span>
 		</div>
 	</div>