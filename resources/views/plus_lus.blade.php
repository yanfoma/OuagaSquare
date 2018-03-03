<div style="height: 40px;"></div>
<div class="short-post">
	<h3 class="main-title">Plus lus</h3>
	<div class="row">
		<?php $Projet = DB::table('projet')->count('id'); 

		if($Projet == 0){

			echo "<p>Aucun projet</p>";

		}

		?>
		<?php $Projet = DB::table('projet')->orderBy('vue','desc')->limit(4)->get(); 
		foreach($Projet as $projet) { ?>
		<div class="col-sm-6 wow animated fadeInUp" data-wow-delay="0.2s">
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
						<?php $intl_date_formatter = new IntlDateFormatter('frc',
							IntlDateFormatter::LONG,
							IntlDateFormatter::NONE);?>
							<li>  Depuis le {{$intl_date_formatter->format(new DateTime($projet->created_at))}} </li>
							<li><a href=""> <i class="ti-thought"></i> {{$projet->vue}} vues</a> </li>
						</ul>
					</div>
				</div>
			</div>

			<?php } ?>
		</div>
	</div>