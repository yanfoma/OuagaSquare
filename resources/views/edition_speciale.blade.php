<!--breaking slide-->
<div class="breaking-news-slide clearfix">
	<h5 class="bg1">Flash Info</h5>
	<div class="newsslider">
		<ul class="slides">
			<?php $Projet = DB::table('projet')->count('id'); 

			if($Projet == 0){

				echo "<p>Aucun projet</p>";

			}

			?>
			<?php $Projet = DB::table('projet')->orderBy('id','desc')->limit(5)->get(); 
			foreach($Projet as $projet) { ?>
			<li> <a href="detail_projet<?php echo $projet->id?>"><?php echo str_limit($projet->contenu, 100); ?></a> </li>
			<?php } ?>
		</ul>
	</div>
</div>
<!--breaking slide end-->

<!--flex slider-->
<div class="flex-slider2">
	<div class="flexslider">
		<ul class="slides">
			<?php $Projet = DB::table('projet')->count('id'); 

			if($Projet == 0){

				echo "<p>Aucun projet</p>";

			}

			?>
			<?php $Projet = DB::table('projet')->orderBy('id','desc')->limit(5)->get(); 
			foreach($Projet as $projet) { ?>
			<li>
				<a href="#" class="news-slider"> 
					<img src="img/couverture/{{$projet->avatar}}" alt="" class="img-responsive">
					<div class="news-overlay"> 
						<?php $Categorie = DB::table('categorie')->where('id', $projet->categorie_id)->get(); 
						foreach($Categorie as $categorie) { ?>
						<span class="tag bg3">{{$categorie->full_titre}}</span>
						<?php } ?>
						<h3>{{$projet->full_titre}}</h3>
						<?php $intl_date_formatter = new IntlDateFormatter('frc',
							IntlDateFormatter::LONG,
							IntlDateFormatter::NONE);?>
							<span class="date">Depuis le {{$intl_date_formatter->format(new DateTime($projet->created_at))}}</span>
							<span class="view"><i class="fa fa-eye"></i> {{$projet->vue}}</span>
							<?php $Commentaire = DB::table('commentaire')->where('projet_id', $projet->id)->count(); ?>
							<span class="comments"><i class="fa fa-comment"></i> <?php echo $Commentaire ?></span> 
						</div>
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>
