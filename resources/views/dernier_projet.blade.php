<div class="news-by_category">
	<h3 class="main-title">Projets a la Une</h3>
	<div class="row">
		<div class="col-sm-6 wow animated fadeInUp" data-wow-delay="0.2s">
			<div class="column-post">
				<?php $Projet = DB::table('projet')->count('id'); 

				if($Projet == 0){

					echo "<p>Aucun projet</p>";

				}

				?>
				<?php $Projet = DB::table('projet')->orderBy('id','desc')->limit(1)->get(); 
				foreach($Projet as $projet) { ?>
				<a href="detail_projet<?php echo $projet->id?>" class="img-thumbnail"> <img src="img/couverture/{{$projet->avatar}}" alt="" class="img-responsive"> </a>
				<div class="topic"> 
					<?php $Categorie = DB::table('categorie')->where('id', $projet->categorie_id)->get(); 
					foreach($Categorie as $categorie) { ?>
					<a href="detail_categorie<?php echo $categorie->id?>" class="tag bg4">{{$categorie->full_titre}}</a>
					<?php } ?>
					<h4><a href="detail_projet<?php echo $projet->id?>">{{$projet->full_titre}}</a></h4>
					<p align="justify"><?php echo str_limit($projet->contenu, 300); ?> </p>
					<ul class="post-tools">
						<?php $Responsable = DB::table('responsable')->where('id', $projet->responsable_id)->get(); 
						foreach($Responsable as $responsable) { ?>
						<li> Par <a href=""><strong> {{$responsable->libelle}}</strong> </a></li>
						<?php } ?>
						<?php $intl_date_formatter = new IntlDateFormatter('frc',
							IntlDateFormatter::LONG,
							IntlDateFormatter::NONE);?>
							<li>  Depuis le {{$intl_date_formatter->format(new DateTime($projet->created_at))}} </li>
							<li><a href=""> <i class="ti-thought"></i> {{$projet->vue}} vues</a> </li>
						</ul>
					</div>
					<?php }?>
				</div>
			</div>
			<div class="col-sm-6 wow animated fadeInUp" data-wow-delay="0.4s">
				<?php $Projet = DB::table('projet')->count('id'); 

				if($Projet == 0){

					echo "<p>Aucun projet</p>";

				}

				?>
				<?php $Projet = DB::table('projet')->orderBy('id','desc')->limit(4)->get(); 
				foreach($Projet as $projet) { ?>
				<div class="media">
					<div class="media-left">
						<a href="detail_projet<?php echo $projet->id?>"> <img class="media-object" src="img/couverture/{{$projet->avatar}}" width="150" alt="..."> </a>
					</div>
					<div class="media-body">
						<h4 class="media-heading"><a href="detail_projet<?php echo $projet->id?>">{{$projet->full_titre}} </a></h4>
						<ul class="post-tools">
							<?php $Responsable = DB::table('responsable')->where('id', $projet->responsable_id)->get(); 
							foreach($Responsable as $responsable) { ?>
							<li> Par <a href="detail_responsable<?php echo $responsable->id?>"><strong> {{$responsable->libelle}}</strong> </a></li>
							<?php } ?>
							<li>  Depuis le {{$intl_date_formatter->format(new DateTime($projet->created_at))}} </li>
							<li><a href=""> <i class="ti-thought"></i> {{$projet->vue}} vues</a> </li>
						</ul>
					</div>
				</div>
				<?php }?>
			</div>
		</div>
		<center><h2><a href="liste_projet" class="tag bg3" style="padding: 10px;color:#fff"> Voir tous les projets</a></h2></center>
	</div>